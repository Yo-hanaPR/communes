<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Minimum Requirements to Run the Project
1. PHP 8.2 or higher
2. XAMPP installed. You can download it from the following link. https://www.apachefriends.org/es/download.html
3. Composer installed. You can download it from the following link https://getcomposer.org/download/


## Project Installation Instructions
1. Clone the project repository
Open your terminal in the directory where you want to locate the project, and execute GIT CLONE https://github.com/Yo-hanaPR/communes.git
2. Navigate to the project folder.
Once the project is cloned, navigate to the project folder using the command cd communes
3. Set up a database for your project. Create an empty database named mydb. You can do this from the terminal or using a database management tool like PHPMYADMIN.
4. Tell Laravel which database to use
In the .env file, locate the variable
DB_DATABASE and set it to mydb
5. Create the database tables
Run the migrations on your database using the command php artisan migrate
6. Go to the project folder.
Into your console, get to the project folder and run **php artisan serve**
8. Create Fake Data
Run **php artisan db:seed** to seed your database with Communes and Regions
7. You're done. You can now access your system.
You can use a cliente like POSTMAN to access this API.



## System Usage
The system will generate a token upon login. This token will be unique and non-repeating and will have a lifespan of one hour. After this time, the token will not be valid to access the services [],[],[].
You can consume the application endpoints to perform operations such as creating customers, querying customer information, and deleting customer information.

## API endpoints

1. **Customer registration** 
(POST) : http://localhost:8000/registry

**expected parameters**
 'dni': This is a required field. Must be maximum 45 character long. 
 'id_reg':  This is a required field. It's a numeric field. It could be a random number between 1 and 10. It specifies the commune region ID. If there aren't a commune associated with this region, request will be rejected.
 'id_com': This is a required field. It's a numeric field. It could be a random number between 1 and 10. It specifies the commune ID wich you want to associate to this user. If there aren't a commune with that ID, request will be rejected.
 'email': This is a required field. Must be maximum 120 character long.
 'name': This is a required field. Must be maximum 45 character long.
 'last_name': This is a required field. Must be maximum 45 character long.
 'address': This is a required field. Must be maximum 255 character long.
 'date_reg': This is a required field. Must be in the format YYYY-MM-DD hh:ii:ss.
 'status': This is a required field. Must be between the values A, I, TRASH


The customer will be created only if the commune you want to associate already exists in the database. If the indicated commune does not exist or is not associated with the indicated region, the system will throw an error "You cannot register the user because there is no commune associated with the indicated region".


2. ## Customer List

(GET): http://localhost:8000/customer-list


**expected parameters**
None. It returns a list of all the customers registered in the platform.

3. ## Customer Detail
(GET) http://localhost:8000/customer/

**expected parameters**
{
    "dni":"< dni >",
    "email":"< email >"
}

You can query the information about a particular customer by indicating his email and dni in the object above.


4. ## Delete Customer
(DELETE) http://localhost:8000/delete-customer/

**expected parameters**

{
    "dni":"< dni >"
}

You can soft delete the information about a user by sending the object above with the customer dni number.
In POSTMAN please open the BODY tab, select RAW, select data type JSON and paste the parameter. Then click SEND. 
