# Postsfeed

Aplikacja dotycząca zadania rekrutacyjnego firmy Grupa RBR.

# Rekomendowane wymagania

NGINX 1.21.6, PHP 8.1, MYSQL 8.29, Composer 2.2.9.

# Instalacja i uruchomienie

1. Pobranie repozytorium:

```bash
git clone https://github.com/devkacper/postsfeed.git
```

2. Instalacja pakietów composer:

```bash
composer install
```

3. Przekopiowanie pliku .env-example do .env i uzupełnienie ustawień według lokalnej konfiguracji serwera i bazy danych.

4. Uruchomienie migracji:
```bash
php artisan migrate
```

5. Wygenerowanie klucza i katalogu storage:
```bash
php artisan key:generate
php artisan storage:link
```

6. Start aplikacji:
```bash
php artisan serve
```

# Rest API

Endpointy obiektu Post:
```bash
GET     /api/post/{id}    - zwraca dane posta o podanym id.
POST    /api/post/store   - zapisuje post w bazie danych (parametry title, content, author). 
PUT     /api/update/{id}  - aktualizuje dane posta o wybranym id (parametry title, content, author).
DELETE  /api/delete/{id}  - usuwa z bazy danych post o podanym id.
```

Endpointy obiektu Comment:
```bash
GET     /api/comment/{id}   - zwraca dane komentarza o podanym id.
POST    /api/comment/store  - zapisuje komentarz w bazie danych (parametry post_id, content, author). 
PUT     /api/comment/{id}   - aktualizuje dane komentarza o wybranym id (parametry post_id, content, author).
DELETE  /api/comment/{id}   - usuwa z bazy danych komentarz o podanym id.
```

# Polecenia artisan

Dodawanie nowego użytkownika:

```bash
php artisan add:user name email password
```

Sprawdzenie ilości wykonanych akcji typu CRUD na zasobach Comment i Post:

```bash
php artisan crud:actions
```





