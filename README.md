# simpleinventory

How to Setup This Project :
1. Clone this project https://github.com/Ridloyanuar/simpleinventory.git
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. In the .env file, add database information to allow Laravel to connect to the database
6. php artisan migrate
7. php artisan db:seed --class=UserSeeder
8. php artisan serve (to run project)

Login Information :
username : admin
password : 12345678

