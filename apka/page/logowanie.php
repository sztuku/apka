
  
  
    
    
    

    

<?php
echo '<div id=logwindow style="display:block;">

<img src="page/avatar1.png" >
  <form action="index.php?page=home" method="POST">
  
    <input id="logwin" type="text" name="login"  placeholder="Login"  required autofocus><br/>
    <input type="password" name="password"  placeholder="Hasło"  required><br/>
    <button class="logBtn" id="logIn"  >ZALOGUJ</button>
   


  </form>
  <button id="regBtn" class="logBtn"><a href="index.php?page=registration">ZAŁÓŻ KONTO</a></button>
</div>';



echo ' <a id="back" href="index.php?page=home">&#8592;</a>';
if(isset($_POST['login'])&&isset($_POST['password']))
{
$login=$_POST['login'];

$hashpassw = sha1($_POST['password']);


if(mysqli_num_rows(mysqli_query($connection,'SELECT * FROM `users` WHERE `login`="'.$login.'" && `haslo`="'.$hashpassw.'"'))>0)
{

$_SESSION['status']=TRUE;
$_SESSION['userid']=mysqli_fetch_assoc(mysqli_query($connection,'SELECT `Id` FROM `users` WHERE `login`="'.$login.'" && `haslo`="'.$hashpassw.'"'))['Id'];
header('Location: index.php?page=home');
$_SESSION['userlogin']=$login;

}else if(mysqli_num_rows(mysqli_query($connection,'SELECT * FROM `users` WHERE `login`="'.$login.'"'))>0 ) {
  echo '<span id="wrongpassw" style="color:red;">Złe hasło</span>';

  $_SESSION['status']=FALSE;
  
}else{
echo '<span id="wronglogin" style="color:red;">Nie istnieje taki uzytkownik</span>';

  $_SESSION['status']=FALSE;
}

}






?>
 
 

