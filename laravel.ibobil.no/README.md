## Ibobil Back End Server

Installation Guide
- Navigate to the folder
- Install the dependencies via composer ( composer install )
- Create database in mysql ( CREATE DATABASE ibobil; )
- Copy the .env.example file and rename it to .env file ( cp .env.example .env )
- Open the .env file and change the DB_DATABASE, DB_USERNAME and DB_PASSWORD with your created database.
- Generate encryption key ( php artisan key:generate )
- Generate jwt secret key ( php artisan jwt:secret )
- Cache Configuration Settings ( php artisan config:cache )
- Migrate the Database ( php artisan migrate )
- Seed the database ( php artisan db:seed )
- php artisan migrate:fresh --seed
- Run the server ( php artisan serve )
- Run your Vue app
