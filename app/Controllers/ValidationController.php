    <?php
        $pdo = connectToDatabase();
        $sqlmortgages = $pdo->query('SELECT * FROM mortgages');
        $sqlrisklvl = $pdo->query('SELECT * FROM risk');

        $nameErr = $emailErr = $phoneErr = $riskErr = $mortgageErr = "";
        $name = $email = $phone = $risklvl = $mortgagePacket = "";
        $risklevels = [];
        while($row = $sqlrisklvl->fetch()){
            //$risklevels->push($row['id']);
            array_push($risklevels, $row['id']);
        }

        $mortgages = [];
        while($row = $sqlmortgages->fetch()){
            //$mortgages->push($row['id']);
            array_push($mortgages, $row['id']);
        }

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
                $riskErr = "Es muss eine Risikostufe ausgewählt werden"; 
            }
            else
            {
                $risklvl = htmlentities($_POST["risk"]);
            }

            if(htmlentities($_POST["mortgage"]) == "Select HypoPaket")
            {
                $mortgageErr = "Es muss ein HypoPaket ausgewählt werden";
            }
            else
            {
                $mortgagePacket = htmlentities($_POST["mortgage"]);
            }

            if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($riskErr) && empty($mortgageErr))
            {
                $rental = new Rental();
                $rental->name =$_POST['name']?? '';
                $rental->email =$_POST['email']?? '';
                $rental->phone =$_POST['phone']?? '';
                $rental->risklvl =$_POST['risk']?? '';
                $rental->mortgage =$_POST['mortgage']?? '';
                $rental->rentDate = date("Y.m.d");
                switch ($rental->risklvl) {
                    case '1':
                        $rental->payDate= date("Y.m.d", strtotime( " + 360 days"));
                        var_dump( $rental->rentDate);
                        break;
                    case '2':
                        $rental->payDate= date("Y-m-d", strtotime( " + 180 days"));
                        var_dump( $rental->payDate);
                        break;
                    case '3':
                        $rental->payDate= date("Y.m.d", strtotime( " + 0 days"));
                        var_dump( $rental->payDate);
                        break;
                    case '4':
                        $rental->payDate= date("Y.m.d", strtotime( " - 120 days"));
                        var_dump( $rental->payDate);
                        break;
                    case '5':
                        $rental->payDate= date("Y.m.d", strtotime( " - 240 days"));
                        var_dump( $rental->payDate);
                        break;
                    
                    default:
                        break;
                }
                $rental->create();
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