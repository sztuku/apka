

   



    

  
<?php 
$loop = $_POST['loop'];

$_SESSION['loop'] = $_POST['loop'];




if($_SESSION['status']==TRUE)
{
  echo '<div id="loglink">
       <a id="account" href="index.php?page=account"><img src="page/avatar1.png"></a>
       <span id="userlogin">'.$_SESSION['userlogin'].' </span>
        </div>
        <a id="back" href="index.php?pagehome">&#8592;</a>';
      
}else
{
  echo '<div id=loglink>
  <a href="index.php?page=logowanie">Zaloguj się do listy</a>
</div> ';
}


  
  

  if(isset($_POST['toGet0']) && isset($_POST['countWindow0']) && !empty($_POST['toGet0']))
  {
    echo '
  <table class="blueTable">  
    <th>Rzecz</th>
    <th>Ilość</th>
    ';

    
       
  mysqli_query($connection,'INSERT INTO idzamowienia SET  Id=NULL, `User_id`="'.$_SESSION['userid'].'"   ');
     
        
    
  $printId = mysqli_insert_id($connection);

  }
  
  
  
 

for ($i = 0; $i < ($loop+1); $i++) 
{

  if(!isset($_POST['toGet'.$i]) || !isset($_POST['countWindow'.$i]) || empty($_POST['toGet'.$i]) )
  {
   if( empty($_POST['toGet'.($loop-1)]) )
   { 
     header('Location: index.php?page=home&error=TRUE');
    
   
   }
    
    
    continue;
    
  } else{

  


  
 
  echo '<tr> <td>'.$_POST['toGet'.$i].'</td><td>  '.$_POST['countWindow'.$i].'</td></tr>';

  

  



  
  if($_POST['toGet'.$i] && $_POST['countWindow'.$i]) { 
       
     
    
        

 $ins = mysqli_query($connection,'INSERT INTO lista SET  Item="'.$_POST['toGet'.$i].'", Ilosc="'.$_POST['countWindow'.$i].'" , Id_zamowienia="'.$printId.'" ,`userid`="'.$_SESSION['userid'].'"'); 

      
       
$komdozam = mysqli_query($connection,'SELECT * FROM `idzamowienia` WHERE `Id`="'.$printId.'"');

$c = mysqli_fetch_assoc($komdozam);


 echo mysqli_error($connection);

      
       
  }
  } 
  

  

}

if(isset($_POST['toGet0']) && isset($_POST['countWindow0']) && !empty($_POST['toGet0']) )
{
  echo '<table class="blueTable"> <th>'.date("Y-m-d H:i:s").'</th></tr>';
}


echo '
</table><br> 
<button id="print" ><img src="page/print.png" alt="DRUKUJ"></button>';


?>


