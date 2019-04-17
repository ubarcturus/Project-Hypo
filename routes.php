<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'editForm' =>'app/Controllers/EditController.php',
    'newForm' => 'app/Controllers/FormController.php',
    'allPackages' => 'app/Controllers/PackageController.php',
    'update' => 'app/Controllers/UpdateController.php'
]);