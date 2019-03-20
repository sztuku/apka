
    
    

    

<?php



if($_SESSION['status']==TRUE)
{
    $mail=
    mysqli_fetch_assoc(mysqli_query($connection,'SELECT `email` 
    FROM `users` WHERE `login`="'.$_SESSION['userlogin'].'" '))['email'];
    
    
    
    echo '
    <a id="logout" href="index.php?page=home&logout=TRUE" ><img src="page/logout1.png"></a>
  
    <div id=logwindow style="display:block !important;">
    <a id="changepassword" href="index.php?page=changepassw" ><img src="page/changepassw.png"></a>
    <img src="page/avatar1.png" >
      
   <input value="'.$_SESSION['userlogin'].'" disabled>
   <input value="'.$mail.'" disabled>';

   if($_SESSION['userid']==1){
    echo '<a  id="history" href="index.php?page=showdb"><img src="page/db.png"></a> ';
   }else
   {
   echo '<a  id="history" href="index.php?page=showdb"><img src="page/history.png"></a> ';
   }

    echo '</div>
    <a id="back" href="index.php?page=home">&#8592;</a>
   ';



  
        
}else
{
    header('Location: index.php?page=home');
}









?>
 
 
