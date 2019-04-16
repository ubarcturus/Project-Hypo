<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'editform' =>'app/Controllers/EditController.php',
    'newForm' => 'app/Controllers/FormController.php',
    'allPackages' => 'app/Controllers/PackageController.php'    

]);