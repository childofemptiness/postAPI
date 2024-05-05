# postAPP

Это приложение позволяет создавать/просматривать/изменять/удалять посты в соответствии с принципами RESTful API

## Технологии

- **Backend**: Laravel
- **Контейнеризация**: Docker
- **Веб-сервер**: Nginx
- **База данных**: PostgreSQL

## Начало работы

Этот раздел поможет вам настроить проект для разработки и тестирования на вашем локальном компьютере.

### Предварительные условия

Убедитесь, что у вас установлены Docker и Docker Compose. Проверить наличие и версии можно, выполнив:

```bash
docker --version
docker-compose --version
```

### Установка и запуск

1. **Клонирование репозитория**

```bash
git clone https://github.com/childofemptiness/postAPI
cd репозиторий
```

2. **Настройка переменных среды**

Скопируйте пример файла с переменными окружения и, если необходимо, настройте их под вашу систему.

```bash
cp .env.example .env
```

3. **Запуск контейнеров**

```bash
docker-compose up -d
```

4. **Установка зависимостей**

```bash
docker-compose exec app composer install
```

5. **Генерация ключа приложения**

```bash
docker-compose exec app php artisan key:generate
```

6. **Миграции и сиды базы данных**

```bash
docker-compose exec app php artisan migrate --seed
```

Теперь ваш проект должен быть доступен по адресу http://localhost.

## Работа с APP

Получение списка постов

### Пример запроса

```http
GET /posts/
```

**Ответ:**

```json
{
  "id": 1,
  "title": "Hello World",
  "updated_at": "2020-10-15T07:20:42.000000Z",
  "content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
}
```
Получение кокретного поста

### Пример запроса

```http
GET /posts/{post}
```
**Ответ:**

```json
[
    {
        "id": 8,
        "created_at": "2024-03-23T19:52:06.000000Z",
        "updated_at": "2024-03-23T19:52:06.000000Z",
        "title": "Александр Пушкин — Я помню чудное мгновенье (Керн)",
        "content": "Я помню чудное мгновенье:...жизнь, и слезы, и любовь."
    },
    {
        "id": 9,
        "created_at": "2024-03-23T20:08:12.000000Z",
        "updated_at": "2024-03-23T20:08:12.000000Z",
        "title": "Eminem - Lose Yourself, Part 1",
        "content": "[Intro]\nLook, if you had one shot or one opportunity...opportunity comes once in a lifetime, yo\nYou better"
    },
    {
        "id": 10,
        "created_at": "2024-03-23T20:08:46.000000Z",
        "updated_at": "2024-03-23T20:08:46.000000Z",
        "title": "Eminem - Lose Yourself, Part 2",
        "content": "[Verse 2]\nHis soul's escaping through...lifetime, yo\nYou better"
    }
]
```

Создание нового поста

### Пример запроса

```http
POST /posts
```
**Ответ:**

```json
{
    "title": "Test 3", 
    "content": "Test post 3", 
    "updated_at": "2024-03-24T20:41:10.000000Z", 
    "created_at": "2024-03-24T20:41:10.000000Z", 
    "id": 14
}
```
Изменение поста

### Пример запроса

```http
PUT/PATCH /posts{post}
```
**Ответ:**

```json
{
    "id": 14, 
    "created_at": "2024-03-24T20:41:10.000000Z", 
    "updated_at": "2024-03-24T20:47:17.000000Z", 
    "title": "Test 3", 
    "content": "Test test post 3",
}
```

Удаление поста

### Пример запроса

```http
DELETE /posts/{post}
```
**Ответ:**

```json
204 No Content
```

## Тестирование

Для запуска тестов выполните:

```bash
docker-compose exec app php artisan test
```

## Развертывание

Переведите настройки проекта в режим production, в частности файл .env, настройте сервер. Выполните миграции для подготовки базы данных. Наконец запустите контейнеры:

```bash
docker-compose -f docker-compose.prod.yml up -d
```

## Вклад в разработку

Если вы хотите внести свой вклад в проект, следуйте этим шагам:

1. Форкните репозиторий
2. Создайте свою Feature ветку (`git checkout -b feature/AmazingFeature`)
3. Сделайте коммиты своих изменений (`git commit -m 'Add some AmazingFeature'`)
4. Отправьте ветку на GitHub (`git push origin feature/AmazingFeature`)
5. Откройте Pull Request

## Лицензия

Данный проект распространяется под лицензией MIT.

## Благодарности

- [Laravel](https://laravel.com/)
- [Docker](https://www.docker.com/)
- [Nginx](https://nginx.org/)
- [PostgreSQL](https://www.postgresql.org/)
