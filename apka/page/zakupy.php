
 
  <?php




  if(isset($_GET['error']))
  {
    if( $_GET['error']==TRUE)
    {
    echo '
    <script type="text/javascript">

    alert("Nie dodałeś nic do listy!");
  
  </script>
    ';
    }
  }


   if ( !isset($_SESSION['status']) || $_SESSION['status']==FALSE || @$_GET['logout']==TRUE) {
    echo ' <div id="cien"> </div>
    <div id=logwindow>

    <img src="page/avatar1.png" >
      <form action="index.php?page=logowanie" method="POST">
      
        <input id="logwin" type="text" name="login"  placeholder="Login"  required autofocus><br/>
        <input type="password" name="password"  placeholder="Hasło"  required><br/>
        <button class="logBtn" id="logIn"  >ZALOGUJ</button>
        <span id="closelogwindow">&#215;</span>
       


      </form>
      <button id="regBtn" class="logBtn"><a href="index.php?page=registration">ZAŁÓŻ KONTO</a></button>
    </div>
    
    
    <script src="page/jumpwindow.js"></script>
    ';

   }
   
    
    
     
      
echo '<div id="browse">
    <button id="clear"><i class="fa fa-trash-o"  ></i></button>
    <input type="text" id="wejscie" autocomplete="off" >
    <button id="add"><i  >+</i></button>
</div>  
<script type="text/javascript">
pole.focus();
</script>
    
    <form id="form" action="index.php?page=lista" method="POST">
    
        <div id="container">
          <ol id="lista"></ol>
        </div>';
    

   
   


    if(isset($_GET['logout']))
    {
      $logout=$_GET['logout'];
      if($logout=='TRUE')
      {
        $_SESSION['status']=FALSE;
        
        
      }
    
    }
        

    if($_SESSION['status']==TRUE)
    {
      echo '<div id="loglink">
       <a id="account" href="index.php?page=account"><img src="page/avatar1.png"></a>
       <span id="userlogin">'.$_SESSION['userlogin'].' </span>
        <button id="wyslij"  ><img src="page/shoppingcart1.png"></button></div>';

    }else{
      echo '<div id="unloglink">
      <a id="logbtn" >Zaloguj się </a> 
    </div> ';
    }

           
echo  '</form>';

 
   ?>
 

