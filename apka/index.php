<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="page/zakupy.css" type="text/css" />
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>S*J*P*D </title> <!--szybkozłączki ja pierdole działa -->
  </head>
  <body>
 
  <?php
   session_start();

  
$connection = mysqli_connect('localhost', 'root', '') 
or die('Brak połączenia z serwerem MySQL'); 
$db = mysqli_select_db( $connection , 'lista') 
or die('Nie mogę połączyć się z bazą danych'); 

if(!isset($_GET['page']))
{
    $page="home";
}else
{    
$page=$_GET['page'];
}

switch($page)
{
    case "home":
        include 'page/zakupy.php';
        break;

    case "account":
        include 'page/account.php';
        break;

    case "logowanie":
        include 'page/logowanie.php';
        break;

    case "registration":
        include 'page/registration.php';
        break;

    case "lista":
        include 'page/lista.php';
        break;

    case "changepassw":
        include 'page/changepassw.php';
        break;
        
    case "showdb":
        include 'page/showdb.php';
        break;

    case "showelements":
        include 'page/showelements.php';
        break;

}


?>

   <script src="page/zakupy.js"></script>
   <script src="page/lista.js"></script>
    
  </body>
</html>
