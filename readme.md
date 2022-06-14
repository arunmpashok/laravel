

## Step by step setting the project

````
composer require "laravelcollective/html"

composer update
````

- Download [Bootstrap](http://getbootstrap.com/docs/4.0/getting-started/download/) and put it in public folder.


- Set database configuration at `.env`. This project use `example` database.
````
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example
DB_USERNAME=root
DB_PASSWORD=
````

- Create table
````
php artisan migrate 
````

- 