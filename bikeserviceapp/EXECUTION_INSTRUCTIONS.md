
<!-- -- Clone the Repository -->

git clone https://github.com/Anusuyasethuraman/bikeserviceapp.git

cd bikeserviceapp

<!-- Install Dependencies -->

composer install

<!-- Configure Environment Variables -->

## .env ## DATABASE

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bikeserviceapp
DB_USERNAME=root
DB_PASSWORD=

## MAILER (CHANGE THE MAIL DATA )

 MAIL_MAILER=log
 MAIL_SCHEME=null
 MAIL_HOST=127.0.0.1
 MAIL_PORT=2525
 MAIL_USERNAME=null
 MAIL_PASSWORD=null
 MAIL_FROM_ADDRESS="hello@example.com"
 MAIL_FROM_NAME="${APP_NAME}"

<!-- Run Migrations & Seeders -->

# migration
php artisan migrate 

# seeders
php artisan db:seed --class=ServiceSeeder  (services table data )
php artisan db:seed --class=AdminSeeder    (one admin  data static)

<!-- Start Laravel Server -->

php artisan serve

