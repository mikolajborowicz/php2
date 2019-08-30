<?php
session_start();
if(isset($_POST['email']))
{
    
    $wszystko_OK=true; // flaga

    // Po kolei będą sparwdzne dane z formularza :

    //sprawdzenie długości nicka
    $nick=$_POST['nick'];
    if(strlen($nick)<3||strlen($nick)>20)
    {
        $wszystko_OK=false;
        $_SESSION['e_nick']="błąd musi posiadać od 3 do 20 znaków";
    }
    //sprawdzenie znaków w niku 
    if(ctype_alnum($nick)==false)
    {
        $wszystko_OK=false;
        $_SESSION['e_nick']="błąd musi posiadać tylko znaki alfanumeryczne";
    }

    //sprawdzenie adresu email
    $email=$_POST['email'];
    $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
    if(filter_var($emailB, FILTER_VALIDATE_EMAIL)==false||($email!=$emailB))
    {
    $_SESSION['e_email']="email musi zawierać @ i zanaki alfanumeryczne";
        $wszystko_OK=false;
    }
    
    //sprawdzenie hasła 
    $pass=$_POST['pass'];
    $rep_pass=$_POST['rep_pass'];
    if($pass!=$rep_pass)
    {
        $wszystko_OK=false;
        $_SESSION['e_pass']="hasła nie są zgodne";  
    }
    if(!ctype_alnum($pass))
    {
        $wszystko_OK=false;
        $_SESSION['e_pass']="hasło musi mieć znaki alfanumeryczne";  
    }

    {
        $wszystko_OK=false;
        $_SESSION['e_pass']="hasła nie są zgodne";  
    }
    if(strlen($pass)<8||strlen($pass)>20)
    {
        $wszystko_OK=false;
        $_SESSION['e_pass']="błąd musi posiadać od 8 do 20 znaków";
    }
    $pass_hash=password_hash($pass, PASSWORD_DEFAULT);

    echo $_POST['regulamin'];
    exit();

    if($wszystko_OK=true)
    {
        //dodajemy gracza do bazy
        echo "udana walidacja";
        exit(); 
    }    
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
 <link rel="stylesheet" href="style/main.css">
    <script src="htt    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Osadnicy - załóż darmowe konto</title>
   ps://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    
    <!-- formularz przetwarzający dane i wysyłający metodą post -->
    <form metod="post">

    <p>Nickname:</p><input type="text" name="nick"><br>
<?php
if(isset($_SESSION['e_nick']))
{
    echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
    unset($_SESSION['e_nick']);
}
?>

    <p>Email:</p> <input type="text" name="email"><br>
<?php if(isset($_SESSION['e_email']))
{
    echo "<div>".$_SESSION['e_email']."</div>";
    unset($_SESSION['e_email']);
}?>
    
    <p>Password: </p> <input type="password" name="pass"><br>
<?php if(isset($_SESSION['e_pass']))
{
    echo '<div>'.$_SESSION['e_pass'].'</div>';
    unset($_SESSION['e_pass']);
}?>
    <p>Repeat password: </p> <input type="password" name="rep_pass"><br>
    <label>
    <input type="checkbox" name="regulamin">Akceptuję regulamin
    </label>
    <!-- Captha -->
    <div class="g-recaptcha" data-sitekey="6LdH57QUAAAAAEEN82BZQRLr7gB8m-_wMvZ-i1GZ"></div>
    <input type="submit" value="zarejestruj się">
    </form>

</body>
</html>