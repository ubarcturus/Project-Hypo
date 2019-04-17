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
            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" value="<?= $name ?? '' ?>" type="text" id="name" name="name">*
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" for="email">Email-Adresse</label>
                <input class="form-control" type="email" id="email" name="email">*
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" for="phone">Telefonnummer</label>
                <input class="form-control" type="text" id="phone" name="phone">
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" for="risk-level">Risikostufe</label>
				<select>

				</select>	*
            </div>
			<br>
            <div class="form-group">
                <label class="form-label" for="hypo-package">Hypo-Paket</label>
				<select>
	
				</select>	*
            </div>
            <br>
            <div class="form-group">
                <label class="form-label" for="paymanetStatus">Rückzahlungsstatus</label>
                <input class="form-control" type="text" id="paymentStatus" disabled = "disabled"name="paymentStatus">
            </div>
        </div>
		<br>
		<div class="form-actions">
        <input class="btn-primary" type="submit" value="Ändern"> 
	   <input class="btn-primary" onclick="location.href='/allPackages';"type="button" value="Abbrechen">
	</div>
<script src="public/js/app.js"></script>
</body>
</html>