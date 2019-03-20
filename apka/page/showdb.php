

  
<?php 








$way = "ASC";
if(!isset($_GET['way']))
{
$to="D";
}




if($_SESSION['status']==FALSE)
{
header('Location: index.php?page=home');
}

if(isset($_GET['way']) && $_GET['way']=="D" )
{

  
 $way ="DESC";  
 $to="A";
  

} else if(isset($_GET['way']) && $_GET['way']=="A" )
{
   $way = "ASC";
   $to="D";
}
if(!isset($_GET['way']))
{
   $sort="A";
}else
{
   $sort=$_GET['way'];
}

if($_SESSION['status']==TRUE && $_SESSION['userid']==1)
{
echo '<form id="chngdata" action="index.php?page=showelements" method="POST">
  
<input id="zmien" type="text" name="Idzamowienia" placeholder="Znajdz zamowienia" >

 <button id="szukaj"  ><img src="page/search.png"></button>

 </form>';
}

echo '<table class="blueTable">  
    <th><a href="index.php?page=showdb&sortby=Id&way='.$to.'">Idzmowieni</a></th>

    <th><a href="index.php?page=showdb&sortby=data&way='.$to.'">Data</a></th>
    ';


  $connection = mysqli_connect('localhost', 'root', '') 
  or die('Brak połączenia z serwerem MySQL'); 
  $db = mysqli_select_db( $connection , 'lista') 
  or die('Nie mogę połączyć się z bazą danych'); 
 

if(!isset($_GET['sortby']))
{
$sortby = 'id';
}else
{
$sortby = $_GET['sortby'];
}





if($_SESSION['status']==TRUE && $_SESSION['userid']==1)
{

   echo '<th><a href="index.php?page=showdb&sortby=User_id&way='.$to.'">Id_użytkownika</a></th>';
   echo '<div id="loglink">
       <a id="account" href="index.php?page=account"><img src="page/avatar1.png"></a>
       <span id="userlogin">'.$_SESSION['userlogin'].' </span>
        </div>
        <a id="back" href="index.php?page=home">&#8592;</a>';
   $sql = 'SELECT COUNT(*) FROM `idzamowienia` ';
   $result = mysqli_query($connection,$sql);
   $r = mysqli_fetch_row($result);
   $numrows = $r[0];

  
   $rowsperpage = 10;
  
   $totalpages = ceil($numrows / $rowsperpage);

   if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
      $currentpage = (int) $_GET['currentpage'];
   } else {
      $currentpage = 1;
   } 

   if ($currentpage > $totalpages) {
      $currentpage = $totalpages;
   } 
   if ($currentpage < 1) {
      $currentpage = 1;
   } 

   $offset = ($currentpage - 1) * $rowsperpage;
   

   $sql = 'SELECT `Id`,`data`,`User_id` FROM `idzamowienia`  
   ORDER BY '.$sortby.'  '.$way.'  
   LIMIT '.$offset.', '.$rowsperpage.' ';

   $result = mysqli_query($connection,$sql);

   while ($list = mysqli_fetch_assoc($result)) {
      echo '<tr> 
      <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['Id'].'<a/></td>

      <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['data'].'<a/></td> 
      <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['User_id'].'<a/></td> 
      </tr>';
   } 

   $range = 3;

   echo "<div id='znaczki'>";
   if ($currentpage > 1) {
      echo " <a href='index.php?page=showdb&currentpage=1&way=".$sort."&sortby=".$sortby."'><<</a> ";
      $prevpage = $currentpage - 1;
      echo " <a href='index.php?page=showdb&currentpage=$prevpage&way=".$sort."&sortby=".$sortby."'><</a> ";
   }  


   for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
      if (($x > 0) && ($x <= $totalpages)) {
         if ($x == $currentpage) {
            echo " [<b>$x</b>] ";
         } else {
            echo " <a href='index.php?page=showdb&currentpage=$x&way=".$sort."&sortby=".$sortby."'>$x</a> ";
         }
      }  
   } 

   if ($currentpage != $totalpages) {
      $nextpage = $currentpage + 1;
      echo " <a href='index.php?page=showdb&currentpage=$nextpage&way=".$sort."&sortby=".$sortby."'>></a> ";
      echo " <a href='index.php?page=showdb&currentpage=$totalpages&way=".$sort."&sortby=".$sortby."'>>></a> ";
   } 
   echo "</div>";
 
}else

{

   echo '<div id="loglink">
   <a id="account" href="index.php?page=account"><img src="page/avatar1.png"></a>
   <span id="userlogin">'.$_SESSION['userlogin'].' </span>
    </div>
    <a id="back" href="index.php?page=home">&#8592;</a>';

      $sql = 'SELECT COUNT(*) FROM `idzamowienia` WHERE `User_id`="'.$_SESSION['userid'].'"';
      $result = mysqli_query($connection,$sql);
      $r = mysqli_fetch_row($result);
      $numrows = $r[0];

     
      $rowsperpage = 10;
     
      $totalpages = ceil($numrows / $rowsperpage);

         if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
            $currentpage = (int) $_GET['currentpage'];
      } else {
            $currentpage = 1;
      } 

         if ($currentpage > $totalpages) {
            $currentpage = $totalpages;
      } 
         if ($currentpage < 1) {
            $currentpage = 1;
      } 

         $offset = ($currentpage - 1) * $rowsperpage;

         $sql = 'SELECT `Id`,`data` FROM `idzamowienia`  
      WHERE `User_id`="'.$_SESSION['userid'].'"
      ORDER BY '.$sortby.'  '.$way.'  
      LIMIT '.$offset.', '.$rowsperpage.' ';

      $result = mysqli_query($connection,$sql);

         while ($list = mysqli_fetch_assoc($result)) {
            echo '<tr> 
         <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['Id'].'<a/></td>
         
         <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['data'].'<a/></td> 
         </tr>';
      } 

            $range = 3;

         echo "<div id='znaczki'>";
      if ($currentpage > 1) {
       
         echo " <a href='index.php?page=showdb&currentpage=1&way=".$sort."&sortby=".$sortby."'><<</a> ";
            $prevpage = $currentpage - 1;
            echo " <a href='index.php?page=showdb&currentpage=$prevpage&way=".$sort."&sortby=".$sortby."'><</a> ";
      }  

   
      for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
            if (($x > 0) && ($x <= $totalpages)) {
               if ($x == $currentpage) {
                  echo " [<b>$x</b>] ";
               } else {
                  echo " <a href='index.php?page=showdb&currentpage=$x&way=".$sort."&sortby=".$sortby."'>$x</a> ";
            }
         }  
      } 

         if ($currentpage != $totalpages) {
            $nextpage = $currentpage + 1;
            echo " <a href='index.php?page=showdb&currentpage=$nextpage&way=".$sort."&sortby=".$sortby."'>></a> ";
            echo " <a href='index.php?page=showdb&currentpage=$totalpages&way=".$sort."&sortby=".$sortby."'>>></a> ";
      } 
      echo "</div>";
}
?>
</table><br> 
    


   
  </body>
</html>
