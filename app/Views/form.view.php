<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
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
                <select id="cmbRisk" name="risk" onchange="changePayDate()">
                <option value="Select Risikostufe">Select Risikostufe</option>
                <?php
                    foreach($risklevels as $risk) { ?>
                    <option value="<?= $risk ?>"><?= $risk ?></option>
                <?php
                    } ?>
                </select>
                <span class="error">* <?php echo $riskErr;?></span>
            </div>
            <br>
            <div class="form-group">
                Zahldatum: <input type="text" name="payDate" id="payDate" disabled="disabled">
            </div>
			<br>
            <div class="form-group">
                <label for="HypoPaket"> HypoPaket: </label>
                <select id="cmbHypo" name="mortgage" onchange="onchange">
                <option value="Select HypoPaket">Select HypoPaket</option>
                <?php
                for ($i=0; $i < count($mortgagesText) ; $i++) { ?>
                    <option value="<?= $mortgages[$i] ?>"><?= $mortgagesText[$i] ?></option> 
                <?php
                    } ?>
                </select>
                <span class="error">* <?php echo $mortgageErr;?></span>
            </div>
            <br>
        </div>


    <input type="submit" name="submit" value="Erfassen">  
    <input type="button" onclick="location.href='/';"name="cancel" value="Abbrechen">  
    </form>
    <script src="public/js/app.js"></script>
    <script src="public/js/payDate.js"></script>
</body>
</html>
