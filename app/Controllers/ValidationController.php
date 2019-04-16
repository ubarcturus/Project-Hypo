<?php
        $nameErr = $emailErr = $phoneErr = "";
        $name = $email = $phone = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST["name"]))
            {
                $nameErr = "Name wird benötigt";
            }
            else
            {
                $name = test_input($_POST["name"]);
            }

            if(empty($_POST["email"]))
            {
                $emailErr = "Email wird benötigt";
            }
            else
            {
                if(strpos($_POST["email"], '@'))
                {
                    $email = test_input($_POST["email"]);
                }
                else
                {
                    $emailErr = "Email braucht ein @ Zeichen";
                }
            }

            if(!empty($_POST["phone"]))
            {
                if(preg_match('/^[0-9\/ +-]*$/', $_POST["phone"]))
                {
                    $phone = test_input($_POST["phone"]);
                }
                else
                {
                    $phoneErr = "Die Telefonnummer ist nicht im richtigem Format";
                }
            }

            if(!empty($phone) && !empty($name) && !empty($email))
            {

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