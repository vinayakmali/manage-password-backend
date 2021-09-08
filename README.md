# laravel_8_crud
This is a simple laravel 8 CRUD app.
The repository is the code to one of my article on **Dev.to**, [Laravel 8 CRUD App, A simple guide](https://dev.to/kingsconsult/laravel-8-crud-bi9) the article will teach you how to create a CRUD app on Laravel 8, the method is applicable to Laravel 6 and also Laravel 7 

## How to install and run on your local system
1. git clone https://github.com/Kingsconsult/laravel_8_crud.git
2. cd laravel_8_crud/
3. composer install
4. npm install
5. cp .env.example .env
6. php artisan key:generate
7. Add your database config in the .env file (you can check my articles on how to achieve that)
8. php artisan migrate
9. php artisan serve (if the server opens up, http://127.0.0.1:8000,  then we are good to go)
![localhost](https://res.cloudinary.com/kingsconsult/image/upload/v1600705305/laravel%208%20modal/4_pp7r76.png)
10. Navigate to http://127.0.0.1:8000/login

##Project Details

This Laravel assignment having two main components as below

1. Business

In this buiness module business owner can quickly singup and publish the business on the portal in 4 steps. Quick signup steps as belows

• Enter business name http://127.0.0.1:8000/business/create

• Select the business type

• Select business action

• Enter email id

On signup verification email will be sent to the business owner.

Business owner can edit the business info like business type, business action and the working hours as required.

On the publishing the business the unique URL will be generated for each business.

2. User

User can send the enquiry to the business owner by clicking on the business action button also can select the timings which is suitable for the user.

To send enquiry user need to provide the name, email, email.

The business owner ad the user will receive the copy of enquiry on emai


## Operations
1. Create a project
2. View a project
3. Edit a project
4. Delete a project
5. View all projects
