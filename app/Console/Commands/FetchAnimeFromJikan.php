<?php

namespace App\Console\Commands;

use App\Models\Anime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FetchAnimeFromJikan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anime:fetch {--limit=100 : Number of anime to fetch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch anime data from Jikan API and save to database with Ukrainian translation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $limit = (int) $this->option('limit');
        $this->info("Fetching {$limit} anime from Jikan API...");

        $page = 1;
        $fetched = 0;
        $bar = $this->output->createProgressBar($limit);
        $bar->start();

        while ($fetched < $limit) {
            try {
                $response = Http::timeout(30)
                    ->withoutVerifying() // Отключаем проверку SSL для локальной разработки
                    ->get("https://api.jikan.moe/v4/top/anime", [
                        'page' => $page,
                        'limit' => min(25, $limit - $fetched), // Jikan API limit per page
                    ]);

                if (!$response->successful()) {
                    $this->error("Failed to fetch page {$page}");
                    break;
                }

                $data = $response->json();
                
                if (empty($data['data'])) {
                    break;
                }

                foreach ($data['data'] as $animeData) {
                    if ($fetched >= $limit) {
                        break;
                    }

                    // Проверяем, существует ли уже аниме с таким mal_id
                    $existingAnime = Anime::where('mal_id', $animeData['mal_id'])->first();
                    
                    if ($existingAnime) {
                        $this->warn("Anime {$animeData['mal_id']} already exists, skipping...");
                        continue;
                    }

                    // Переводим на украинский
                    $titleUk = $this->translateToUkrainian($animeData['title'] ?? '');
                    $synopsisUk = $this->translateToUkrainian($animeData['synopsis'] ?? '');

                    // Получаем жанры
                    $genres = [];
                    if (isset($animeData['genres']) && is_array($animeData['genres'])) {
                        foreach ($animeData['genres'] as $genre) {
                            $genres[] = $this->translateToUkrainian($genre['name'] ?? '');
                        }
                    }

                    // Получаем студии
                    $studios = [];
                    if (isset($animeData['studios']) && is_array($animeData['studios'])) {
                        foreach ($animeData['studios'] as $studio) {
                            $studios[] = $studio['name'] ?? '';
                        }
                    }

                    // Сохраняем в БД
                    Anime::create([
                        'mal_id' => $animeData['mal_id'],
                        'title_original' => $animeData['title'] ?? null,
                        'title_ukrainian' => $titleUk,
                        'synopsis_original' => $animeData['synopsis'] ?? null,
                        'synopsis_ukrainian' => $synopsisUk,
                        'type' => $animeData['type'] ?? null,
                        'episodes' => $animeData['episodes'] ?? null,
                        'status' => $animeData['status'] ?? null,
                        'aired_from' => isset($animeData['aired']['from']) ? date('Y-m-d', strtotime($animeData['aired']['from'])) : null,
                        'aired_to' => isset($animeData['aired']['to']) ? date('Y-m-d', strtotime($animeData['aired']['to'])) : null,
                        'rating' => $animeData['rating'] ?? null,
                        'score' => $animeData['score'] ?? null,
                        'scored_by' => $animeData['scored_by'] ?? null,
                        'rank' => $animeData['rank'] ?? null,
                        'popularity' => $animeData['popularity'] ?? null,
                        'members' => $animeData['members'] ?? null,
                        'favorites' => $animeData['favorites'] ?? null,
                        'image_url' => $animeData['images']['jpg']['large_image_url'] ?? $animeData['images']['jpg']['image_url'] ?? null,
                        'genres' => json_encode($genres),
                        'studios' => json_encode($studios),
                    ]);

                    $fetched++;
                    $bar->advance();

                    // Задержка для избежания rate limit (Jikan API имеет лимит 3 запроса в секунду)
                    usleep(400000); // 0.4 секунды
                }

                $page++;

                // Если данных больше нет, выходим
                if (count($data['data']) < 25) {
                    break;
                }

            } catch (\Exception $e) {
                $this->error("Error fetching page {$page}: " . $e->getMessage());
                break;
            }
        }

        $bar->finish();
        $this->newLine();
        $this->info("Successfully fetched and saved {$fetched} anime!");
    }

    /**
     * Translate text to Ukrainian using Google Translate API (free version)
     */
    private function translateToUkrainian(string $text): string
    {
        if (empty($text)) {
            return '';
        }

        try {
            // Используем бесплатный Google Translate API через веб-интерфейс
            // Для production лучше использовать официальный API с ключом
            $response = Http::timeout(10)
                ->withoutVerifying() // Отключаем проверку SSL для локальной разработки
                ->get('https://translate.googleapis.com/translate_a/single', [
                    'client' => 'gtx',
                    'sl' => 'en', // source language
                    'tl' => 'uk', // target language (Ukrainian)
                    'dt' => 't',
                    'q' => $text,
                ]);

            if ($response->successful()) {
                $result = $response->json();
                if (isset($result[0][0][0])) {
                    return $result[0][0][0];
                }
            }
        } catch (\Exception $e) {
            // Если перевод не удался, возвращаем оригинальный текст
            $this->warn("Translation failed for: " . Str::limit($text, 50));
        }

        return $text;
    }
}
