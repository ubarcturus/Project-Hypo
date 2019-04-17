<?php
function isNameValid()
{
    if(empty($_POST["name"]))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function isEmailValid()
{
    if(empty($_POST["name"]))
    {
        return false;
    }
    else
    {
        if(strpos($_POST["email"], '@'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

function isPhoneValid()
{
    if(preg_match('/^[0-9\/ +-]*$/', $_POST["phone"]))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isRiskValid()
{
    if(htmlentities($_POST["risk"]) == "Select Risikostufe")
    {
        return false;
    }
    else
    {
        return true;
    }
}

function isMortgageValid()
{
    if(htmlentities($_POST["mortgage"]) == "Select HypoPaket")
    {
        return false;
    }
    else
    {
        return true;
    }
}

function isRefundValid()
{
    if(htmlentities($_POST["paymentStatus"]) == "0" || htmlentities($_POST["paymentStatus"]) == "1")
    {
        return true;
    }
    else
    {
        return false;
    }
}

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>