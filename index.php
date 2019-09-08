<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Osadnicy - gra przeglądarkowa</title>
    <link rel="stylesheet" href="main.css">
        <!-- javascript -->

        <script>
        var dzisiaj = new Date();
        
        var dzien = dzisiaj.getDate();
        var miesiac = dzisiaj.getMonth()+1;
        if(miesiac<10){
            miesiac="0"+miesiac;
        }
        var rok = dzisiaj.getFullYear();
        var godzina = dzisiaj.getHours();
        if(godzina<10){
            godzina="0"+godzina;
        }
        var minuta = dzisiaj.getMinutes();
        if(minuta<10){
            minuta="0"+minuta;
        }
        var sekunda = dzisiaj.getSeconds();
        if(sekunda<10){
            sekunda="0"+sekunda;
        }
        </script>
</head>
<body>
    
<h2>Tylko martwi ujrzeli koniec wojny - Platon</h2><br>
<div id="zegar"></div>



<script type="text/javascript">
 document.getElementById("zegar").innerHTML = dzien+"/"+miesiac+"/"+rok+" | "+godzina+":"+minuta+":"+sekunda;
</script>





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