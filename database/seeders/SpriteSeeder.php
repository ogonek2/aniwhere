<?php

namespace Database\Seeders;

use App\Models\Anime;
use App\Models\Sprite;
use App\Models\DiscussionGroup;
use App\Models\Discussion;
use Illuminate\Database\Seeder;

class SpriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем первые 10 аниме
        $animeList = Anime::limit(10)->get();
        
        if ($animeList->isEmpty()) {
            $this->command->warn('No anime found. Please run: php artisan anime:fetch --limit=10');
            return;
        }

        // Создаем спрайты
        for ($i = 0; $i < 5; $i++) {
            $animeForSprite = $animeList->random(min(3, $animeList->count()));
            
            $sprite = Sprite::create([
                'title_ukrainian' => 'Спрайт ' . ($i + 1) . ': ' . $animeForSprite->first()->title_ukrainian,
                'description_ukrainian' => 'Група обговорень про ' . $animeForSprite->pluck('title_ukrainian')->implode(', '),
                'image_url' => $animeForSprite->first()->image_url,
            ]);

            // Привязываем аниме к спрайту
            $sprite->anime()->attach($animeForSprite->pluck('id'));

            // Создаем группы обсуждений для спрайта
            for ($j = 0; $j < 2; $j++) {
                $group = DiscussionGroup::create([
                    'sprite_id' => $sprite->id,
                    'title_ukrainian' => 'Група обговорень ' . ($j + 1) . ' для ' . $sprite->title_ukrainian,
                    'description_ukrainian' => 'Опис групи обговорень про ' . $animeForSprite->first()->title_ukrainian,
                    'discussions_count' => 0,
                ]);

                // Создаем обсуждения в группе
                for ($k = 0; $k < 3; $k++) {
                    Discussion::create([
                        'discussion_group_id' => $group->id,
                        'title_ukrainian' => 'Обговорення ' . ($k + 1) . ' в групі ' . $group->title_ukrainian,
                        'content_ukrainian' => 'Контент обговорення про ' . $animeForSprite->first()->title_ukrainian . '. Це тестове обговорення для демонстрації функціоналу.',
                        'replies_count' => rand(0, 50),
                        'last_reply_at' => now()->subHours(rand(1, 24)),
                    ]);
                }

                // Обновляем счетчик обсуждений
                $group->update([
                    'discussions_count' => $group->discussions()->count()
                ]);
            }
        }

        $this->command->info('Sprites seeded successfully!');
    }
}
