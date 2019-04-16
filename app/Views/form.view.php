<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
   <?php require 'app/Controllers/ValidationController.php';?>
    <h2>Neuer Antrag</h2>
    <p><span class="error">* benötigtes Feld</span></p>
    <form method="post" action="">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>

    Email: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    Telefon: <input type="text" name="phone" value="<?php echo $phone;?>">
    <span class="error"> <?php echo $phoneErr;?></span>
    <br><br>

    <label for="Risikostufe"> Risikostufe: </label>
    <select id="cmbRisk" name="Make" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
     <option value="0">Select Risikostufe</option>
     <option value="1">Risikostufe 1</option>
     <option value="2">Risikostufe 2</option>
     <option value="3">Risikostufe 3</option>
     <option value="2">Risikostufe 4</option>
     <option value="3">Risikostufe 5</option>
    </select>
    <br><br>

    <label for="HypoPaket"> HypoPaket: </label>
    <select id="cmbHypo" name="Make" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
     <option value="0">Select HypoPaket</option>
     <option value="1">HypoPaket 1</option>
     <option value="2">HypoPaket 2</option>
     <option value="3">HypoPaket 3</option>
     <option value="2">HypoPaket 4</option>
     <option value="3">HypoPaket 5</option>
    </select>
    <br><br>

    <input type="submit" name="submit" value="Submit">  
    </form>
    <script src="public/js/app.js"></script>
</body>
</html>
