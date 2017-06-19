<style>

#help_confirm{
        font-size:30px;
       font-weight:bold;
       font-style:italic;
       color:purple; 
       text-shadow:rgb(244,170,66) 3px 3px 3px;    


}

#help_confirm a {
  
       font-size:30px;
       font-weight:bold;
       }
</style>



<?php
   if(isset($_POST['feedback_button'])){
  $title = "Apology";
  $description = "";
  $keywords = "";
  require("helper/header.php");
  require("helper/navigation_top.php");
     echo"<br><br><br><br>";
  print("<center><div id=\"help_confirm\" >Something went wrong while you were submitting your request<br>Please try again</div></center>");
echo"<br><br><br><br>";
}
else
{ 
 
  header("Location:contact_us.php");
}
?>
<?php
   require("helper/footer.php");
?>