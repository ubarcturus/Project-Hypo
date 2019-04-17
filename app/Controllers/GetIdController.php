<?php
$idURL = $_GET['id'];
$pdo = connectToDatabase();
$sqlmortgages = $pdo->query('SELECT * FROM mortgages');
$sqlrisklvl = $pdo->query('SELECT * FROM risk');

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

$sql = $pdo->query('SELECT * FROM user');
while($row = $sql->fetch())
{
    
    if($row['id'] == $idURL)
    {
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phoneNumber'];
        $risklvl = $row['fk_risk'];
        $selectedMortgage = $row['fk_mortgages'];
        $reStatus = $row['refundStatus'];
    }
}

