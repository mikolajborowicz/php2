<?php
session_start();

//jeśli nie ma hasła i loginu powrót do index.php
if(!isset(($_POST['login']))||!isset($_POST['haslo']))
{
    header('Location: index.php');
    exit();
}

//nawiązywanie połaczenia za pomocą obiektu
require_once "connect.php";
// @ wycisza raporty o błędach 
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);


 
if($polaczenie->connect_errno!=0)
{
    echo "Error".$polaczenie->connect_errno;
}  
else
{//przypadek, jeśli jesteśmy połączeni z bazą
    $login=$_POST["login"];
    $haslo=$_POST["haslo"];

    //zabezpieczenie przed wstrzykiwaniem SQL
    $login=htmlentities($login, ENT_QUOTES,"UTF-8");
   


    if($rezultat=@$polaczenie->query(
    sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
    mysqli_real_escape_string($polaczenie,$login))))
    {
        $ile_userow=$rezultat->num_rows;
        if($ile_userow>0)
        {
            $wiersz = $rezultat->fetch_assoc();

            $_SESSION['zalogowany']= true;

            if(password_verify($wiersz['pass']))
            {
                $_SESSION['id']= $wiersz['id'];
                $_SESSION['user']= $wiersz['user'];
                $_SESSION['email']= $wiersz['email'];
                $_SESSION['drewno']= $wiersz['drewno'];
                $_SESSION['kamien']= $wiersz['kamien'];
                $_SESSION['zboze']= $wiersz['zboze'];
                $_SESSION['dnipremium']= $wiersz['dmipremium'];
            
                unset($_SESSION['blad']);
                $rezultat->close();
                header('Location: gra.php');
            }
            else
            {
                $_SESSION['blad']='<span style="color=red">Nieprawidłowy login lub hasło</span>';
                header('Location: index.php');
            }
        }
        else 
        {
            $_SESSION['blad']='<span style="color=red">Nieprawidłowy login lub hasło</span>';
            header('Location: index.php');
        }

    }  
}
$polaczenie->close();

?>