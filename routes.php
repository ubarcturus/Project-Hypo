<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'edit' =>'app/Controllers/EditController.php'
]);