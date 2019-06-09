# rakhmet-task1

1. git clone https://github.com/beloofficial/rakhmet-task1.git 

2. php artisan key:generate

3. Create Database and change .env file

4. Php artisan migrate

5. php artisan passport:install --force

6. Copy «Password grant client» and paste to Postman auth\Login request

7. Php artisan db:seed

8. Php artisan serve

----------------------------------------------------------------------------------------

<-- https://www.getpostman.com/collections/6bc58072f628a2dc5d49 --> Postman

----------------------------------------------------------------------------------------

  Admin : admin@gmail.com<br>
  Password: helloworld

  Moderator: moderator:moderator@gmail.com<br>
  Password: helloworld

  User: you can create user by auth\Registration request

----------------------------------------------------------------------------------------
  Admin can ADD/UPDATE/DELETE 

  MODERATOR can UPDATE 

  UESR can use only GET methods
  
  http://127.0.0.1:8000/api/admin <--- there ADMIN can change user's role
  ----------------------------------------------------------------------------------------
  
