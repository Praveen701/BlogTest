
## About Blog Management

- Download the project as .zip file and extract on your local host on htdocs and follow the instructions below.
- composer install
- Import DB file named 'blog_management.sql' from the project folder to your local, renamed the .env.example file to .env file, enter the correct db details there. 
then run these commands:
   -> php artisan cache:clear
   -> php artisan config:clear
   -> php artisan key:generate
- Import the tables by using the migration command:
   ->php artisan migrate
- Finally run the project by using this command 'php artisan server'.
- To perform a UnitTest run the below commands on order : 
   -> php artisan db:seed --class=UserSeeder
   -> php artisan db:seed --class=PostSeeder
   ->php artisan test


