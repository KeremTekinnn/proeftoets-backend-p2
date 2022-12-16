<?php


require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo "De verbinding is gelukt";
    } else {
        echo "Interne server-error";
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}
/**
  * Maak een select wuery die alle record uit de tabel Persoon haalt
  */

  $sql = "SELECT * FROM Persoon";

 
  $statement = $pdo->prepare($sql);
  
  $statement->execute();
  
  $result = $statement->fetchAll(PDO::FETCH_OBJ);

  //var_dump($result);

  $rows = "";
  foreach ($result as $info) {
    $rows .=  "<tr>
    <td>$info->Id</td>
    <td>$info->Voornaam</td>
    <td>$info->Tussenvoegsel</td>
    <td>$info->Achternaam</td>
    <td>$info->Haarkleur</td>
    <td>
        <a href='delete.php?id=$info->Id'>
        <img src='img/b_drop.png' alt= 'kruis'>    
        </a>
    </td>
    <td>
        <img src='img/b_edit.png' alt= 'potlood'>    
    </td>";
  }
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
<h3>Persoonsgegevens</h3>
<table border="1">
    <thead>
        <th>Id</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?= $rows; ?>
    </tbody>
</table>
</body>
</html>
