<?php
$error=array();
if(isset($_POST['feedback_button']))
{
   //when form is submitted
    if(empty($_POST['email']) || empty($_POST['message']))
     {
       //when email or message not given
       $error['imcomplete_error'] = "Please fill in all the fields";


      }
     else
      {
        //when email and message are provided
        require_once('lib/recaptchalib.php');

        // ENTER YOUR PRIVATE KEY.
        $privatekey = "bacxyz";
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

                                if (!$resp->is_valid)
                                {
                                     //when the CAPTCHA was entered incorrectly
                                    $error['captcha_error'] = "The text you entered did'nt match the image";
                                    
                                } 

                              else 
                              {
                                // when captcha entered correctly 
                  
                                require_once("lib/config.php"); 

                                //cleaning the inputs
                                $email=mysql_real_escape_string($_POST['email']);
                                $message=mysql_real_escape_string($_POST['message']);

                                $insert_query="INSERT INTO ".DB_NAME.".feedback (email,message)".
                                              " VALUES('$email','$message')" ;
                  
                                //execute query
                                if(mysql_query($insert_query))
                                  {
                                     //if data correctly inserted into database
                                     session_start();
                                     $_SESSION['feed_confirm']=1;
                                     


                                    header("Location:feedback_success.php");
                                  }
                                else{
                                      session_start();
                                      $_SESSION['error']=1; 

                                      header("Location:apology.php");
                                    }    

                                }// else clause when correct captcha entered

     }  //end of else(which executes when email and message are filled
} //end of if statement when form is filled



?>



<?php
$title = "Contact Us";
  $description = "Contact us to get more help";
  $keywords = "";
  require("helper/header.php");
  require("helper/navigation_top.php");
  $style = "css/style_main.css";
  echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"$style\">";
?>
   <div id="contact_section">
  
   <div id="contact_sub_section">
         <center><h3 id="contact_heading">Contact Us</h3><center><br>
         <div class="contact_sub_section_title">Contact Adminstration</div>
		 <div class="contact_sub_section_address">admin@perfectomobile.com</div>
         <div class="contact_sub_section_title">Report Error</div>
         <div class="contact_sub_section_address">error_report@perfectomobile.com</div>			 
   </div><hr>
   <div id="feedback_section">
     <center><h3 id="contact_heading">FeedBack</h3><center><br>
   <form action="contact_us.php" method="POST">
      <div id="emailf_help_me" class="main_help_text_div"><span class="brand_help_me_field_name">Email &rarr;</span><span class="brand_help_me_field_name">


      <input type="email" maxlength="100" id="emailf_name_selection"  class="email_help_input" required name="email"
       <?php

           if(isset($_POST['email']))
         {
           print("value=\"".$_POST['email']."\""); 
         }   
         ?>></span></div>
       <div id="feed_help_me" class="main_help_text_div">




      <table><tr>
       <td class="brand_help_me_field_name">Feedback &rarr;</td><td class="brand_help_me_field_name">

       <textarea maxlength="500" id="feed_name_selection" class="feed_help_input" required rows="8" cols="5" name="message">
              <?php if(isset($_POST['message'])){print($_POST['message']);}?></textarea></td>
      </tr></table>
      </div>

       <div id="captcha_feedback" class="main_help_text_div">
        
<?php

//printing captcha
require_once('lib/recaptchalib.php');
$publickey="6LfnFt4SAAAAANDIaj4F_0eaOI-w6-CMOxNmaZ7S";
echo recaptcha_get_html($publickey);

?>


<?php
   if(isset($error['captcha_error']))
     print("<span class=\"error\">".$error['captcha_error']."</span>   ");
?>
    
</div>    
    <div id="help_me_button"><input type="submit" id="help_button" value="Help Us.!" name="feedback_button"></div>
   </form>
   </div>
   
  </div>
  
  <?php require("helper/footer.php");
  
?>
