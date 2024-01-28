
## About Blog Management

1.Download as .zip and install the below mentioned commands on the order.
2.composer install
3.npm install && npm run dev
4.Import DB file named 'blogs.sql' on your local, renamed the .env.example file to .env file, enter the correct db details there. 
then run these commands:
   -> php artisan cache:clear
   ->php artisan config:clear
5.Run the migrations commands:
   ->php artisan migrate
5.php artisan server.
6.To perform a UnitTest run the below commands on order : 
   -> php artisan db:seed --class=UserSeeder
   -> php artisan db:seed --class=PostSeeder
   ->php artisan test


