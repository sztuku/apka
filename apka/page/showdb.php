

  
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

   // number of rows to show per page
   $rowsperpage = 10;
   // find out total pages
   $totalpages = ceil($numrows / $rowsperpage);

   // get the current page or set a default
   if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
      // cast var as int
      $currentpage = (int) $_GET['currentpage'];
   } else {
      // default page num
      $currentpage = 1;
   } // end if

   // if current page is greater than total pages...
   if ($currentpage > $totalpages) {
      // set current page to last page
      $currentpage = $totalpages;
   } // end if
   // if current page is less than first page...
   if ($currentpage < 1) {
      // set current page to first page
      $currentpage = 1;
   } // end if

   // the offset of the list, based on current page 
   $offset = ($currentpage - 1) * $rowsperpage;
   

   // get the info from the db 
   $sql = 'SELECT `Id`,`data`,`User_id` FROM `idzamowienia`  
   ORDER BY '.$sortby.'  '.$way.'  
   LIMIT '.$offset.', '.$rowsperpage.' ';

   $result = mysqli_query($connection,$sql);

   // while there are rows to be fetched...
   while ($list = mysqli_fetch_assoc($result)) {
      // echo data
      echo '<tr> 
      <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['Id'].'<a/></td>

      <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['data'].'<a/></td> 
      <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['User_id'].'<a/></td> 
      </tr>';
   } // end while

   /******  build the pagination links ******/
   // range of num links to show
   $range = 3;

   // if not on page 1, don't show back links
   echo "<div id='znaczki'>";
   if ($currentpage > 1) {
      // show << link to go back to page 1
      echo " <a href='index.php?page=showdb&currentpage=1&way=".$sort."&sortby=".$sortby."'><<</a> ";
      // get previous page num
      $prevpage = $currentpage - 1;
      // show < link to go back to 1 page
      echo " <a href='index.php?page=showdb&currentpage=$prevpage&way=".$sort."&sortby=".$sortby."'><</a> ";
   } // end if 

   // loop to show links to range of pages around current page

   for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
      // if it's a valid page number...
      if (($x > 0) && ($x <= $totalpages)) {
         // if we're on current page...
         if ($x == $currentpage) {
            // 'highlight' it but don't make a link
            echo " [<b>$x</b>] ";
         // if not current page...
         } else {
            // make it a link
            echo " <a href='index.php?page=showdb&currentpage=$x&way=".$sort."&sortby=".$sortby."'>$x</a> ";
         } // end else
      } // end if 
   } // end for

   // if not on last page, show forward and last page links        
   if ($currentpage != $totalpages) {
      // get next page
      $nextpage = $currentpage + 1;
      // echo forward link for next page 
      echo " <a href='index.php?page=showdb&currentpage=$nextpage&way=".$sort."&sortby=".$sortby."'>></a> ";
      // echo forward link for lastpage
      echo " <a href='index.php?page=showdb&currentpage=$totalpages&way=".$sort."&sortby=".$sortby."'>>></a> ";
   } // end if
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

      // number of rows to show per page
      $rowsperpage = 10;
      // find out total pages
      $totalpages = ceil($numrows / $rowsperpage);

      // get the current page or set a default
      if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
         // cast var as int
         $currentpage = (int) $_GET['currentpage'];
      } else {
         // default page num
         $currentpage = 1;
      } // end if

      // if current page is greater than total pages...
      if ($currentpage > $totalpages) {
         // set current page to last page
         $currentpage = $totalpages;
      } // end if
      // if current page is less than first page...
      if ($currentpage < 1) {
         // set current page to first page
         $currentpage = 1;
      } // end if

      // the offset of the list, based on current page 
      $offset = ($currentpage - 1) * $rowsperpage;

      // get the info from the db 
      $sql = 'SELECT `Id`,`data` FROM `idzamowienia`  
      WHERE `User_id`="'.$_SESSION['userid'].'"
      ORDER BY '.$sortby.'  '.$way.'  
      LIMIT '.$offset.', '.$rowsperpage.' ';

      $result = mysqli_query($connection,$sql);

      // while there are rows to be fetched...
      while ($list = mysqli_fetch_assoc($result)) {
         // echo data
         echo '<tr> 
         <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['Id'].'<a/></td>
         
         <td> <a  class="rowhref" href="index.php?page=showelements&Id='.$list['Id'].'">'.$list['data'].'<a/></td> 
         </tr>';
      } // end while

      /******  build the pagination links ******/
      // range of num links to show
      $range = 3;

      // if not on page 1, don't show back links
      echo "<div id='znaczki'>";
      if ($currentpage > 1) {
         // show << link to go back to page 1 
         echo " <a href='index.php?page=showdb&currentpage=1&way=".$sort."&sortby=".$sortby."'><<</a> ";
         // get previous page num
         $prevpage = $currentpage - 1;
         // show < link to go back to 1 page
         echo " <a href='index.php?page=showdb&currentpage=$prevpage&way=".$sort."&sortby=".$sortby."'><</a> ";
      } // end if 

      // loop to show links to range of pages around current page

      for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
         // if it's a valid page number...
         if (($x > 0) && ($x <= $totalpages)) {
            // if we're on current page...
            if ($x == $currentpage) {
               // 'highlight' it but don't make a link
               echo " [<b>$x</b>] ";
            // if not current page...
            } else {
               // make it a link
               echo " <a href='index.php?page=showdb&currentpage=$x&way=".$sort."&sortby=".$sortby."'>$x</a> ";
            } // end else
         } // end if 
      } // end for

      // if not on last page, show forward and last page links        
      if ($currentpage != $totalpages) {
         // get next page
         $nextpage = $currentpage + 1;
         // echo forward link for next page 
         echo " <a href='index.php?page=showdb&currentpage=$nextpage&way=".$sort."&sortby=".$sortby."'>></a> ";
         // echo forward link for lastpage
         echo " <a href='index.php?page=showdb&currentpage=$totalpages&way=".$sort."&sortby=".$sortby."'>>></a> ";
      } // end if
      echo "</div>";
}
?>
</table><br> 
    


    <script src="lista.js"></script>
  </body>
</html>
