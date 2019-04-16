<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <h2>Alle Verleihe</h2>
    <table class="oversight">
        <tr>
            <th>Name</th>
            <th>Packet</th> 
            <th>Datum</th>
            <th>Status</th>
            <th>Bearbeiten</th>
        </tr>
        <tr>
            <td>Gerry</td>
            <td>Packet 1</td> 
            <td>32.13.2019</td>
            <td>Happyface<td>
            <input type="button" onclick="location.href='/editForm';" value="Bearbeiten" />
        </tr>
        <tr>
            <td>Philipp</td>
            <td>Packet 2</td> 
            <td>1.1.0000</td>
            <td>Sadface<td>
            <input type="button" onclick="location.href='/editForm';" value="Bearbeiten" />
        </tr>
    </table>
    <br>
    <br>
     <input class="btn-primary" onclick="location.href='/';" type="button" value="zurück zur Startseite"> 
<script src="public/js/app.js"></script>
</body>
</html>
