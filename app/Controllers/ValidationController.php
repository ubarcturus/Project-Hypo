    <?php
        require 'app/Controllers/ValidatingController.php';
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
        $mortgagesText = [];
        while($row = $sqlmortgages->fetch()){
            //$mortgages->push($row['id']);
            array_push($mortgages, $row['id']);
            array_push($mortgagesText, $row['package']);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isNameValid())
            {
                $name = test_input($_POST["name"]);
            }
            else
            {
                $nameErr = "Name wird benötigt";
            }

            if(isEmailValid())
            {
                $email = test_input($_POST["email"]);
            }
            else
            {
                $emailErr = "Email braucht ein @ Zeichen";   
            }

            if(isPhoneValid())
            {
                $phone = test_input($_POST["phone"]);
            }
            else
            {
                $phoneErr = "Die Telefonnummer ist nicht im richtigem Format";
            }

            if(isRiskValid())
            {
                $risklvl = htmlentities($_POST["risk"]);
            }
            else
            {
                $riskErr = "Es muss eine Risikostufe ausgewählt werden"; 
            }

            if(isMortgageValid())
            {
                $mortgagePacket = htmlentities($_POST["mortgage"]);
            }
            else
            {
                $mortgageErr = "Es muss ein HypoPaket ausgewählt werden";
            }

            if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($riskErr) && empty($mortgageErr))
            {
                $rental = new Rental();
                $rental->name =$_POST['name']?? '';
                $rental->email =$_POST['email']?? '';
                $rental->phone =$_POST['phone']?? '';
                $rental->risklvl =$_POST['risk']?? '';
                $rental->mortgage =$_POST['mortgage']?? '';
                var_dump($rental->mortgage);
                $rental->rentDate = date("Y.m.d");
                switch ($rental->risklvl) {
                    case '1':
                        $rental->payDate= date("Y.m.d", strtotime(" + 840 days"));
                        break;
                    case '2':
                        $rental->payDate= date("Y-m-d", strtotime(" + 660 days"));
                        break;
                    case '3':
                        $rental->payDate= date("Y.m.d", strtotime(" + 480 days"));
                        break;
                    case '4':
                        $rental->payDate= date("Y.m.d", strtotime(" + 360 days"));
                        break;
                    case '5':
                        $rental->payDate= date("Y.m.d", strtotime(" + 240 days"));
                        break;
                    default:
                        break;
                }
                $rental->create();
             //   header("Location: /");
            }
        }
    ?>