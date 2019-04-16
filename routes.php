<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'newForm' => 'app/Controllers/FormController.php',
    'allPackages' => 'app/Controllers/PackageController.php'    
]);