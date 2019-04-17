<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verleih bearbeiten</title>
	<link rel="stylesheet" href="public/css/app.css">
</head>
<body>
	<div class="editRental">
		<h1 class="form-title">Verleih bearbeiten</h1>
		* benötigte Felder
		<br>
		<br>
        <form method="post" action="/update?id=<?= $idURL ?>"> 
            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" value="<?= $name ?? '' ?>" type="text" id="name" name="name">
                <span class="error"><?php echo $nameErr;?></span>
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" for="email">Email-Adresse</label>
                <input class="form-control" type="email" id="email" name="email" value="<?= $email ?? '' ?>">
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" for="phone">Telefonnummer</label>
                <input class="form-control" type="text" id="phone" name="phone" value="<?= $phone ?? '' ?>">
                <span class="error"><?php echo $phoneErr;?></span>
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" name="risk" for="risk-level">Risikostufe</label>
				<select>
                    <?php
                    foreach($risklevels as $risk) { 
                        if($risk == $risklvl)
                        {
                ?>
                    <option value="<?= $risk ?>" disabled = "disabled" selected="selected"><?= $risk ?></option>
                <?php
                    }
                    else
                    {
                ?>
                <option value="<?= $risk ?>" disabled = "disabled" ><?= $risk ?></option>
                <?php
                    }
                } 
                ?>
				</select>
            </div>
			<br>
            <div class="form-group">
                <label class="form-label" name="mortgageLabel" for="hypo-package">Hypo-Paket</label>
				<select name="mortgage" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
                <?php
                    for($i=0;$i < count($mortgagesText); $i++) { 
                        if($mortgages[$i] == $selectedMortgage)
                        {
                ?>
                    <option value="<?= $mortgages[$i] ?>" selected="selected"><?= $mortgagesText[$i] ?></option>
                <?php
                    }
                    else
                    {
                ?>
                <option value="<?= $mortgages[$i] ?>" ><?= $mortgagesText[$i] ?></option>
                <?php
                    }
                } 
                ?>
				</select>
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" for="paymanetStatus">Rückzahlungsstatus</label>
                <input class="form-control" type="text" id="paymentStatus"name="paymentStatus" value="<?= $reStatus ?? '' ?>">
            </div>
        </div>
		<br>
		<div class="form-actions">
        <input class="btn-edit" type="submit" value="Ändern"> 
	   <input class="btn-edit" onclick="location.href='/allPackages';"type="button" value="Abbrechen">
       </form>
	</div>
<script src="public/js/app.js"></script>
</body>
</html>