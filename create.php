<?php
/**
 * We gaan contact maken met de mysql server
 */
require('config.php');

 $dsn = "mysql:host=localhost;dbname=Php-pdo-crud-2209c;charset=UTF8";

 

 try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo "De verbinding is gelukt";
     } else {
        echo "Interne server-error";
     }
 } catch (PDOException $e) {
    echo $e->getMessage();
 }

 


$sql = "INSERT INTO Persoon (ID
                            ,Voornaam
                            ,Tussenvoegsel
                            ,Achternaam
                            ,Haarkleur)
        VALUES              (NULL
                            , :voornaam
                            , :tussenvoegsel
                            , :achternaam
                            , :haarkleur);";
                                

//We bereiden de sql-query voor met de method prepare

$statement = $pdo->prepare($sql);

$statement->bindValue(':voornaam', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':tussenvoegsel', $_POST['tussen'], PDO::PARAM_STR);
$statement->bindValue(':achternaam', $_POST['lastname'], PDO::PARAM_STR);
$statement->bindValue(':haarkleur', $_POST['haarkleur'], PDO::PARAM_STR);

//wE VUREN DE sql-query AF OP DE DATABASE
$statement->execute(); 