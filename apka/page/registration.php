

<?php


$connection = mysqli_connect('localhost', 'root', '') 
or die('Brak połączenia z serwerem MySQL'); 
$db = mysqli_select_db( $connection , 'lista') 
or die('Nie mogę połączyć się z bazą danych'); 

echo ' <a id="back" href="index.php?page=home">&#8592;</a>';

echo'<div id=registrationwindow>
<img src="page/regavatar.png" >
<form action="index.php?page=registration" method="POST">
  <input type="text" name="login" minlength="3" placeholder="Login"  required autofocus><br/>
  <input type="text" name="email" placeholder="Email"  required><br/>
  <input type="password" name="password" minlength="3" placeholder="Hasło"  required><br/>
  <input type="password" name="passwordcheck"  minlength="3" placeholder="Powtórz hasło"  required><br/>
  <button class="logBtn" id="logIn">ZAREJESTRUJ MNIE</button>
  

</form>
<a href="index.php?page=registration"></a>
</div>
';





if($_SESSION['status']==TRUE)
{
header('Location: index.php?page=home');
}



$sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';


if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']))
{
$login=$_POST['login'];
$email=$_POST['email'];
$password=$_POST['password'];
$passwordcheck=$_POST['passwordcheck'];


    if(mysqli_num_rows(mysqli_query($connection,'SELECT * FROM `users` WHERE `login`="'.$login.'" '))==0)
    {
        if(preg_match($sprawdz, $email))
        {
            if(mysqli_num_rows(mysqli_query($connection,'SELECT * FROM `users` WHERE `email`="'.$email.'" '))==0)
            {
                if($password==$passwordcheck)
                {
                    
                    mysqli_query($connection,'INSERT INTO `users` SET  Id=NULL, `login` = "'.$login.'", `haslo`="'. sha1($password).'",`email`="'.$email.'"');
                    $_SESSION['status']=TRUE;
                    $_SESSION['userid']=mysqli_fetch_assoc(mysqli_query($connection,'SELECT `Id` FROM `users` WHERE `login`="'.$login.'" && `haslo`="'.sha1($password).'"'))['Id'];
                    header('Location: index.php?page=home');
                    $_SESSION['userlogin']=$login;





                }else
                {
                    echo '<span id="passworderror"> hasla sie nie zgadzaja</span>';
                }
            }else
            {
                echo '<span id="emailerror">mail zajety</span>';
            }
        }else
        {
        echo '<span id="emailerror">Adres e-mail nieprawidłowy</span>';
        }
    }else
    {
        echo '<span id="loginerror">Login zajety</span>';
    }
}








?>
 
 
