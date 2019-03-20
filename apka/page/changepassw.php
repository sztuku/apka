

    

<?php



if($_SESSION['status']==FALSE)
{
    header('Location: index.php?page=home');
}else
{
    



echo '<div id=logwindow style="display:block;">

<img src="page/avatar1.png" >
  <form action="index.php?page=changepassw" method="POST">
  
    <input type="text" name="login"  placeholder="'.$_SESSION['userlogin'].'"  disabled><br/>
    <input type="password" name="newpassword"  minlength="3"  placeholder="Nowe hasło" required><br/>
    <input type="password" name="secondpassword"  minlength="3" placeholder="Powtórz hasło"   required><br/>
    
   
 <button id="logIn" class="logBtn"><a href="index.php?page=changepassw">Zmień hasło</a></button>

  </form>
 
</div>';
}



echo ' <a id="back" href="index.php?page=account">&#8592;</a>';


if(isset($_POST['newpassword']) && isset($_POST['secondpassword']))
{
    $newpassword=$_POST['newpassword'];
    $secondpassword=$_POST['secondpassword'];
    

    if($newpassword==$secondpassword)
    {
        
       
        mysqli_query($connection,'UPDATE `users` SET `haslo`="'.sha1($newpassword).'" WHERE `login`="'.$_SESSION['userlogin'].'"');
        header('Location: index.php?page=home&logout=TRUE');
    }else
    {
        echo '<span style="    color: red;
        position: absolute;
        right: 41%;
        top: 10%;
        z-index: 3;
        font-size: 25px;
        font-weight: bold;">Podane hasła się różnią!</span>';
    }

}






?>
 
 