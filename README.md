
## About Blog Management

1.Download as .zip and install the below mentioned commands on the order.
2.composer install
4.Import DB file named 'blog_management.sql' from the project folder to your local, renamed the .env.example file to .env file, enter the correct db details there. 
then run these commands:
   -> php artisan cache:clear
   -> php artisan config:clear
   -> php artisan key:generate
5.Import the tables by using the migration command:
   ->php artisan migrate
5.Finally run the project by using this command 'php artisan server'.
6.To perform a UnitTest run the below commands on order : 
   -> php artisan db:seed --class=UserSeeder
   -> php artisan db:seed --class=PostSeeder
   ->php artisan test


