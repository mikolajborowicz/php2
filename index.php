<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Osadnicy - gra przeglądarkowa</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    
<h2>Tylko martwi ujrzeli koniec wojny - Platon</h2><br>

<a href="rejestracja.php">Zarejestruj się</a>
    <!-- frormularz wysyłający w paczce login i haslo do panel.php -->

<form action="zaloguj.php" method="post">
<p>Login: </p> 
<input type="text" name="login">
<br><br>
<p>Hasło: </p>
<input type="password" name="haslo">
<br><br>

<input type="submit" value="zatwierdź">
</form>


<?php
if(isset($_SESSION['blad'])){
    echo $_SESSION['blad'];
}
?>
  
</body>
</html>