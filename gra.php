<?php
session_start();
if(!isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))
{
header('Location: index.php');
exit();
} //cos
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gra przegladarkowa</title>
</head>
<body>    
<?php
echo "<ap>Witaj ".$_SESSION['user'].'!<a href="logout.php">wyloguj się</a></p>';
echo "<br><p><b>Drewno</b><p>".$_SESSION['drewno']."<br><p><b>Kamień</b><p>".$_SESSION['kamien'];
echo "<br><p><b>email: </b><p>".$_SESSION['email'];
echo "<br><p><b>Dni Premium</b><p>".$_SESSION['dnipremium'];
?>
</body>
</html>