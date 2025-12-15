# ANIWHERE - Аніме Форум

Laravel проект з Vue 3 та Vite для аніме форуму.

## Структура бази даних

### Моделі:
- **Anime** - Аніме з Jikan API
- **Sprite** - Спрайт (група обговорень), до якого прив'язано кілька аніме
- **DiscussionGroup** - Група обговорень, прив'язана до спрайта
- **Discussion** - Окреме обговорення в групі

### Зв'язки:
- Sprite hasMany Anime (many-to-many через `anime_sprite`)
- Sprite hasMany DiscussionGroup
- DiscussionGroup belongsTo Sprite
- DiscussionGroup hasMany Discussion
- Discussion belongsTo DiscussionGroup

## Установка

1. Установите зависимости:
```bash
composer install
npm install
```

2. Настройте `.env` файл:
```bash
cp .env.example .env
php artisan key:generate
```

3. Настройте базу данных в `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aniwhere
DB_USERNAME=root
DB_PASSWORD=
```

4. Запустите миграции:
```bash
php artisan migrate
```

5. Получите данные об аниме из Jikan API:
```bash
php artisan anime:fetch --limit=100
```

6. Создайте тестовые спрайты и обсуждения:
```bash
php artisan db:seed --class=SpriteSeeder
```

7. Запустите dev сервер:
```bash
npm run dev
php artisan serve
```

## Структура проекта

### Backend:
- `app/Models/` - Модели Eloquent
- `app/Http/Controllers/Api/` - API контроллеры
- `app/Console/Commands/` - Artisan команды
- `database/migrations/` - Миграции базы данных
- `database/seeders/` - Сидеры для тестовых данных

### Frontend:
- `resources/js/components/` - Vue компоненты
- `resources/css/app.css` - Стили Tailwind CSS

## API Endpoints

### Anime:
- `GET /api/anime` - Список аниме
- `GET /api/anime/{id}` - Конкретное аниме
- `GET /api/anime/top/{limit}` - Топ аниме

### Sprites:
- `GET /api/sprites` - Список спрайтов
- `GET /api/sprites/{id}` - Конкретный спрайт с аниме и группами обсуждений
- `POST /api/sprites` - Создать новый спрайт

### Discussion Groups:
- `GET /api/sprites/{spriteId}/discussion-groups` - Группы обсуждений спрайта
- `GET /api/sprites/{spriteId}/discussion-groups/{groupId}` - Конкретная группа
- `POST /api/sprites/{spriteId}/discussion-groups` - Создать группу обсуждений

### Discussions:
- `GET /api/discussion-groups/{groupId}/discussions` - Обсуждения в группе
- `GET /api/discussion-groups/{groupId}/discussions/{discussionId}` - Конкретное обсуждение
- `POST /api/discussion-groups/{groupId}/discussions` - Создать обсуждение

## Команды

- `php artisan anime:fetch --limit=100` - Получить аниме из Jikan API
- `php artisan db:seed --class=SpriteSeeder` - Создать тестовые спрайты

## Использование

1. После получения аниме из API, создайте спрайты через API или сидер
2. К каждому спрайту можно привязать несколько аниме
3. Для каждого спрайта можно создать несколько групп обсуждений
4. В каждой группе можно создать несколько обсуждений
