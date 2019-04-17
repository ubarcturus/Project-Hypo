<?php 
require 'app/Controllers/ValidatingController.php';
require 'app/Model/Rental.php';
$nameErr = $phoneErr = $refundErr = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $phone = $refundStatus = "";
    if(isNameValid())
    {
        $name = test_input($_POST["name"]);
    }
    else
    {
        $nameErr = "Name wird benötigt";
    }

    if(isPhoneValid())
    {
        $phone = test_input($_POST["phone"]);
    }
    else
    {
        $phoneErr = "Die Telefonnummer ist nicht im richtigem Format";
    }

    if(isRefundValid())
    {
        $refundStatus = $_POST["paymentStatus"];
    }
    else
    {
        $refundErr = "Der Status ist nicht möglich, nur 0 für offen oder 1 für zurückgezahlt";
    }

    if(empty($nameErr) && empty($phoneErr) && empty($refundErr))
    {
        $rental = new Rental();
        $rental->name = $_POST['name']?? '';
        $rental->email = $_POST['email']?? '';
        $rental->phone = $_POST['phone']?? '';
        $rental->mortgage = $_POST['mortgage']?? '';
        $rental->refundStatus = $_POST['paymentStatus']?? '';
        
        $rental->update($_GET['id']);
        header("Location: /allPackages");
    }
}