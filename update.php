<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);
    exit();
}

//echo $_GET['Id'];
//Voeg de verbindingsgegevens toe in config.php
require('config.php');

//Maak de data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";


try{
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
       //  echo "Er is een verbinding met de database";
    }else {
            echo "Interne server error!";
        }
    
} catch(PDOException $e )
 {
    echo $e->getMessage();
 }

 //Maak een sql-query voor de database
 $sql = "SELECT ID
                ,Voornaam
                ,Tussenvoegsel
                ,Achternaam
                ,Haarkleur
            FROM Persoon
            WHERE Id = :Id";

// Maak de sql-query klaar om de $_GET['Id'] waarde te koppelen aan de placeholder :Id
$statement = $pdo->prepare($sql);

//Koppel de waarde $GET_['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

//Voer de query uit
$statement->execute();

//Haal het resultaat op met fetch en stop het object in de variabele $result
$result = $statement->fetch(PDO::FETCH_OBJ);

//var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>PHP PDO CRUD</h1>
    
    <form action="update.php" method="post">

        <label for="firstname">Voornaam:</label><br>
        <input type="text" name="firstname" id="firstname" value="<?= $result->Voornaam;; ?>"><br>
        <br>
        <label for="infix">Tussenvoegsel:</label><br>
        <input type="text" name="infix" id="infix value="<?= $result->Tussenvoegsel; ?>"><br>
        <br>
        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname" value="<?= $result->Achternaam; ?>"><br>
        <br>
        <label for="haircolor">Haarkleur:</label><br>
        <input type="text" name="haircolor" id="haircolor" value="<?= $result->Haarkleur; ?>"><br>
        <br>
        <input type="submit" value="Verstuur!">        

    </form>
</body>
</html>