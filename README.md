# Laravel_Final_Project

Each page is a different blade.php view which can be found in the resources/views
Each controllers must have different files unless if their roles are just the same, can be found in app/http/controllers
Each model must have different files unless if their roles are just the same, can be found in app/http/models
When you decide to migrate a new table, it can be found in the database/migrations
Lastly, for the main control point of the app which is the web.php, it can be found in the routes folder.

Import the crud sql text file(found in the folder that you will be cloning)
    --Process in Creating the Current App--
    1. Create a preparation of several blade.php files in which each file is another page 
    2. Within those files, when you create a button you have to enclose them in a form function from HTML by which then you 
    proceed to specify an action in which that action will be used as a basis on the web.php file and then also specify its method whether POST or GET. (For example: /login)
    3. Design the webpage by your taste
    4. Afterwards, you then test whether or not the form action button works

        --Test--
            Open web.php
            Create a controller based on the function you are creating (php artisan make:controller viewdashboard)(NOTE: you have to import the model here as well)-> afterwards you
            then create a model object in which it will be used as a basis for all informations to be passed as well as bcrypting the password to prevent public exposure.
            Within that dashboard controller you then make a test function(test()) just returning a text.
            Then you go back to the web.php and create a route for that function and import the created controller.
            Create a route for the action you specified in the form function (route::post('/login',[viewdashboard::class, 'test']))
            Then you go back to the blade.php file and test whether or not the button works by clicking

    5. Once you have confirmed that it works, we then proceed to the next steps by which since the button now works, within those controllers that you have made, you can then create their designed roles whether or not to retrieve or pass in information.
    6. For example, if you have a login button, you then create a function within.
    7. After modifying your controller file, next is to create a model php in which here this is used to determine what to pass or pull on from the database. (php artisan make:model RegisteredUsers).
    8. Then you go back to the controller and specify the model you have created.
    9. Inside the controller, you can declare an object by which in this case we can consider as the database and then declare to fill or pull it with your desired info.
    10. NOTE: in web.php file, import all controllers that you will be using
            : in the controllers, import all models that you will be using
            : in the models, declare an object from the table

    NOTE: Make different files from one another to prevent possible disruptions of other people's progress. Make sure to use XAMPP. 
