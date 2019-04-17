<!DOCTYPE html>
<?php 
    require 'app/Model/Rental.php';
    $pdo = connectToDatabase();

    $sql = $pdo->query('SELECT * FROM user');
    $sqlMortgage = $pdo->query('SELECT * FROM mortgages');
    $allMortgages = [];
    $icon = '';
    while($row = $sqlMortgage->fetch())
    {
        array_push($allMortgages, $row['package']);
    }
    $rental = new Rental();
  
?>

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
        <?php
            while ($row = $sql->fetch())
            {
                echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $allMortgages[$row['fk_mortgages']] . '</td>';
                    echo '<td>' . $row['rentDate'] . '</td>';
                    if ($rental->checkPayDate($row['payDate'])) {
                        $icon = '💸';
                    }
                    else
                    {
                        $icon = '🚨';
                    }
                    echo '<td>' . $icon . '</td>';
                    echo '<td><input type="button" onclick="location.href=\'/editForm&id=' . $row['id'] .'\';" value="Bearbeiten" /></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <br>
    <br>
     <input class="btn-primary" onclick="location.href='/';" type="button" value="zurück zur Startseite"> 
<script src="public/js/app.js"></script>
</body>
</html>