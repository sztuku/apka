
    
  

  
<?php 




 if($_SESSION['userid']==1){
    echo '<a  id="history" href="index.php?page=showdb" style="float:right; margin-right: 14%; margin-top: -1%;"><img src="page/db.png"></a> ';
   }else
   {
   echo '<a  id="history" href="index.php?page=showdb" style="float:right; margin-right: 8%; margin-top: -1%;"><img src="page/history.png"></a> ';
   }

   echo ' <a id="back" href="index.php?page=home">&#8592;</a>';

   echo '<form id="chngdata" action="index.php?page=showelements" method="POST">
  
   <input id="zmien" type="text" name="Idzamowienia" placeholder="Znajdz zamowienia" autofocus>

    <button id="szukaj"  ><img src="page/search.png"></button>
   
    </form>';

  if($_SESSION['status']==TRUE && $_SESSION['userid']==1)
  {
   
       if($_SESSION['status']==FALSE)
        {
        header('Location: index.php?page=home');
        }
      

      if(!isset($_POST['Idzamowienia']))
      {
        $aktualneId = $_GET['Id'];
        $_POST['Idzamowienia']=$aktualneId;
      }else
      {
          $aktualneId= $_POST['Idzamowienia'];
         

      }       
      echo '<table class="blueTable" style="width:8%; margin-left:46%;"><th>Aktualne Id:</th><th> '.$_POST['Idzamowienia'].' </th></table>';



      $zamowienia = mysqli_query($connection,'SELECT `Item`,`Ilosc`,`userid` FROM
      `lista` WHERE 
      `Id_zamowienia`="'.$aktualneId.'"');

      if(mysqli_num_rows($zamowienia)<=0)
      {
          echo '<span style="color:red; margin-left:35%; font-size:40px;position:absolute; top:5%;">Nie Istnieje zamowienia o takim id</span>';
          

      }else
      {
          echo '<table class="blueTable"><th>Rzecz</th>
          <th>Ilość</th>
         
          <th>Id_klienta</th>' ;
            while($zamowieniaValue = mysqli_fetch_assoc($zamowienia))
        {
            echo ' 
            <tr> <td>'.$zamowieniaValue['Item'].'</td>
            <td>  '.$zamowieniaValue['Ilosc'].'</td> 
            
            <td>'.$zamowieniaValue['userid'].'</td></tr>';
            
        }echo '</table><table class="blueTable">';

        
            $komdozam = mysqli_query($connection,'SELECT * FROM `idzamowienia` WHERE `Id`="'.$aktualneId.'"');

            $c = mysqli_fetch_assoc($komdozam);

            echo '<th>'.$c['data'].'</th>';
            echo mysqli_error($connection);
        }echo '</table>';

      
      

  }else
  {
  

    if($_SESSION['status']==FALSE)
    {
      
    header('Location: index.php?page=home');
    }
  

  if(!isset($_POST['Idzamowienia']))
  {
    $aktualneId = $_GET['Id'];
  }else
  {
      $aktualneId= $_POST['Idzamowienia'];
  }       

    
  $zamowienia = mysqli_query($connection,'SELECT `Item`,`Ilosc` FROM
  `lista` WHERE 
  `Id_zamowienia`="'.$aktualneId.'" &&
    `userid`="'.$_SESSION['userid'].'"');

    if(mysqli_num_rows($zamowienia)<=0)
    {
        echo '<span style="color:red;">Nie posiadasz zamowienia o takim id</span>';
        

    }else
    {
        echo '<table class="blueTable"><th>Rzecz</th>
        <th>Ilość</th>
       ' ;
          while($zamowieniaValue = mysqli_fetch_assoc($zamowienia))
      {
          echo ' 
          <tr> <td>'.$zamowieniaValue['Item'].'</td>
          <td>  '.$zamowieniaValue['Ilosc'].'</td> 
          </tr>';
          
      }echo '</table><table class="blueTable"><th> DATA </th>';

      
          $komdozam = mysqli_query($connection,'SELECT * FROM `idzamowienia` WHERE `Id`="'.$aktualneId.'"');

          $c = mysqli_fetch_assoc($komdozam);

          echo '<th>'.$c['data'].'</th>';
          echo mysqli_error($connection);
      }echo '</table>';

    
    
echo '<button id="print" ><img src="page/print.png" alt="DRUKUJ"></button>';

  }



 






  
 
    
 

