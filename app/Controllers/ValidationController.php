    <?php
        $nameErr = $emailErr = $phoneErr = $riskErr = $mortgageErr = "";
        $name = $email = $phone = $risklvl = $mortgagePacket = "";
        $risklevels = ['Risikostufe 1', 'Risikostufe 2', 'Risikostufe 3', 'Risikostufe 4'];
        $mortgages = ['HypoPaket 1', 'HypoPaket 2', 'HypoPaket 3', 'HypoPaket 4'];

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

            if(htmlentities($_POST["risk"]) == "Select Risikostufe")
            {
                $riskErr = "Es muss eine Risikostufe ausgeählt werden"; 
            }
            else
            {
                $risklvl = htmlentities($_POST["risk"]);
            }

            if(htmlentities($_POST["mortgage"]) == "Select HypoPaket")
            {
                $mortgageErr = "Es muss eine Risikostufe ausgeählt werden";
            }
            else
            {
                $mortgagePacket = htmlentities($_POST["mortgage"]);
            }

            if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($riskErr) && empty($mortgageErr))
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