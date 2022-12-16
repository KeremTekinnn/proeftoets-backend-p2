<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP PDO CRUD</title>
</head>
<body>
    <H1>PHP PDO CRUD</H1>

    <form action="create.php" method="post">

        <label for="firstname">Voornaam:</label> <br>
        <input type="text" name="firstname" id="firstname">  <br>
        <br>
        <label for="tussen">Tussenvoegsel:</label> <br>
        <input type="text" name="tussen" id="tussen">  <br>
        <br>
        <label for="lastname">Achternaam:</label> <br>
        <input type="text" name="lastname" id="lastname">  <br>
        <br>
        <label for="haarkleur">Haarkleur:</label> <br>
        <input type="text" name="haarkleur" id="haarkleur">  <br>
        <input type="submit" value="Vestuur!">

    </form>
</body>
</html>