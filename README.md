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

![](https://raw.githubusercontent.com/Khaled-Farhat/Laravel-Blogging-Platform/master/screenshots/home.png)


![](https://raw.githubusercontent.com/Khaled-Farhat/Laravel-Blogging-Platform/master/screenshots/article-show.png)


![](https://raw.githubusercontent.com/Khaled-Farhat/Laravel-Blogging-Platform/master/screenshots/admin-articles.png)


![](https://raw.githubusercontent.com/Khaled-Farhat/Laravel-Blogging-Platform/master/screenshots/admin-article-comments.png)


![](https://raw.githubusercontent.com/Khaled-Farhat/Laravel-Blogging-Platform/master/screenshots/admin-users.png)
