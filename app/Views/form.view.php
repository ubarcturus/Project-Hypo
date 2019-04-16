<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <?php
        $nameErr = $emailErr = $phoneErr = $riskErr = "";
        $name = $email = $phone = $risklvl = "";
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

            if($_POST["risk"] == "Select Risikostufe")
            {
                
            }
            else
            {

            }

            if($_POST["mortgage"] == "Select HypoPaket")
            {
                
            }
            else
            {

            }

            if(!empty($name) && !empty($email) && )
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

    <form method="post" action="">  
    <div class="editRental">
		<h1 class="form-title">Neuer Antrag</h1>
		* benötigte Felder
		<br>
		<br>
            <div class="form-group">
                Name: <input type="text" name="name" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span>
            </div>
            <br>
            <div class="form-group">
                Email: <input type="text" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
            </div>
            <br>
            <div class="form-group">
                Telefon: <input type="text" name="phone" value="<?php echo $phone;?>">
                <span class="error"> <?php echo $phoneErr;?></span>
            </div>
            <br>
            <div class="form-group">
                <label for="Risikostufe"> Risikostufe: </label>
                <select id="cmbRisk" name="risk" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
                <option value="0">Select Risikostufe</option>
                <?php
                    foreach($risklevels as $risk) { ?>
                    <option value="<?= $risk ?>"><?= $risk ?></option>
                <?php
                    } ?>
                </select>
            </div>
			<br>
            <div class="form-group">
                <label for="HypoPaket"> HypoPaket: </label>
                <select id="cmbHypo" name="mortgage" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
                <option value="0">Select HypoPaket</option>
                <?php
                    foreach($mortgages as $mortgage) { ?>
                    <option value="<?= $mortgage ?>"><?= $mortgage ?></option>
                <?php
                    } ?>
                </select>
            </div>
            <br>
        </div>


    <input type="submit" name="submit" value="Submit">  
    </form>
    <script src="public/js/app.js"></script>
</body>
</html>
