<?php
 $title = "Help Me";
  $description = "We help you to select the best device for your requirement.You can even connect to facebook to get help.";
  $keywords = "help,choose mobile,select mobile,instant mobile finder,mobile finder";
  require("helper/header.php");
  require("helper/navigation_top.php");
?>  
  <div id="home_page_wrap">
      <table>
	   <tr>
	      <td id="col_nav_side">
		    <div id="moz">
		     <?php
			   require("helper/navigation.php");
			 ?>
			 </div>
		  </td>
		  <td id="col_con_adj">
		  <div id="moz1">
  <div id="help_me_all_section">
    <h2 id="main_section_heading">Help Me!!!!!</h2>  
	   
		<div id="mobile_finder" class="help_class">
		<span id="help_all_detail">This is the fastest way to find a mobile.Just choose what you want 
		and get the results Instantly..
		</span>
		<a href="mobile_finder.php">Instant Mobile Finder</a>
		</div>
   </div>
   </div>
    </td>
	   </tr>
    </table>
<?php
 require("helper/footer.php");
?>
