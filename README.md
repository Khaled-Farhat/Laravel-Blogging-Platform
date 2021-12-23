## Laravel Blogging Platform
The platform allows you to manage articles, comments, tags, categories, and users for a blogging platform.
The project was written in PHP with the Laravel Framework and Bootstrap Library.

## How to use
1. Run `git clone https://github.com/Khaled-Farhat/Laravel-Blogging-Platform` to clone the repository.
2. Run `composer install` to install composer dependencies.
3. Copy `.env.example` to `.env` and edit the database credentials there.
4. Run `php artisan key:generate` to generate an app encryption key.
5. Run `php artisan migrate` to migrate the database.
6. [Optional] Run `php artisan db:seed --class=DummyDataSeeder` if you want to create some dummy data.

Launch the main URL. You can log in to the admin panel using the default credentials: `admin@blog.test` - `password`.

## Screenshots
![home](https://github.com/Khaled-Farhat/Laravel-Blogging-Platform/blob/main/screenshots/home.png?raw=true)


![article-show](https://github.com/Khaled-Farhat/Laravel-Blogging-Platform/blob/main/screenshots/article-show.png?raw=true)


![admin-articles](https://github.com/Khaled-Farhat/Laravel-Blogging-Platform/blob/main/screenshots/admin-articles.png?raw=true)


![admin-article-comments](https://github.com/Khaled-Farhat/Laravel-Blogging-Platform/blob/main/screenshots/admin-article-comments.png?raw=true)


![admin-users](https://github.com/Khaled-Farhat/Laravel-Blogging-Platform/blob/main/screenshots/admin-users.png?raw=true)
