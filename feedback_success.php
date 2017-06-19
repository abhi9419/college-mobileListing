<?php
session_start();
 if(isset($_SESSION['feed_confirm'])){
$title = "Feedback";
  $description = "";
  $keywords = "";
//destroying the session
  $_SESSSION=array();
  session_destroy();
echo "<style>

#feedback_confirm{
          
       left:400px;
       font-size:30px;
       font-weight:bold;
       
       color:blue;    


}
</style>";
  require("helper/header.php");
  require("helper/navigation_top.php");
  echo"<br><br><br><br>";
  print("<center><div id=\"feedback_confirm\" >Thanks for providing your valuable feedback<br></div></center>");
   echo"<br><br><br><br>";
require("helper/footer.php");
}
else
{ 
 
  header("Location:contact_us.php");
}
?>
