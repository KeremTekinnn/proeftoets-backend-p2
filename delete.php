<?php

echo "Delete says Hoi Howdy id: " . $_GET ['id'];

//voeg de verbindingsgegevens toe
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$$dbName;charset=UTF8";

try{
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo "Verbinding is gelukt";
    } else {
        echo "Interne server-error"; 
    }
    var_dump($pdo);
} catch(PDOException $e) {
    $e->getMessage();
}

//Maak een delete query voor het verwijderen van een record
$sql = "DELETE FROM Persoon
        WHERE Id = :Id";

 //Bereid de query voor om de placeholder te vervangen coor een id-waarde
$statement = $pdo->prepare($sql);

//Vervang de placeholder voor een id-waarde
$statement->bindValue(':Id', $_GET ['id'], PDO::PARAM_INT);

//Voer de query uit 
$result = $statement->execute();

if ($result) {
    echo "Het record is verwijderd";
    header('Refresh:3; url=read.php');
} else {
    echo "Het record is niet verwijderd"
    header('Refresh:3; url=read.php');
}

