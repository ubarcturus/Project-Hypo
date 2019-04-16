<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'editform' =>'app/Controllers/EditController.php'
]);