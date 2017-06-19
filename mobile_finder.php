<?php
  $title = "Mobile Finder";
  $description = "Finds best mobile for you according to the choice given";
  $keywords = "";
  require("helper/header.php");
  require("helper/navigation_top.php");

?>
<?php
           function space($num){
			     for($i=0;$i<$num;$i++)
				   echo"&nbsp;";}
			 ?>
   <div id="home_page_wrap">
      <table>
	   <tr>
	      <td id="col_nav_side">
		     <?php
			   require("helper/navigation.php");
			 ?>
		  </td>
		  <td id="col_con_adj">
  <div id="mobile_finder_section">
      <h2 id="main_section_heading">Mobile finder</h2>
	  <div id="mobile_finder_main">
	    <form action="mobile_finder_result.php" method="POST">
            <div id="finder_brand">
			 <span id="finder_topic">Brand :</span>
			 <?php
			    echo space(15);
				?>
			<select name="option1" id="finder_option1">
            <option value="samsung">Samsung</option>
            <option value="nokia">Nokia</option>
            <option value="apple">Apple</option>
            <option value="lg">Lg</option>
            <option value="blackberry">Blackberry</option>
            <option value="htc">HTC</option>
            <option value="sony">Sony Ericcson</option>
            <option value="motorola">Motorola</option>
            <option value="asus">Asus</option>
            <option value="lava">Lava</option>
            <option value="karbonn">Karbonn</option>
            <option value="micromax">Micromax</option>
			<option value="xolo">Xolo</option>
            </select>
			</div>
			<div id="finder_price">
			<span id="finder_topic">Price :</span>
			<?php
			    echo space(18);
				?>
			<select name="option2" id="finder_option2">
			<option value="5000">Less Than 5000</option>
            <option value="10000">Less Than 10000</option>
            <option value="15000">Less Than 15000</option>
            <option value="20000">Less Than 20000</option>
            <option value="22000">Less Than 22000</option>
            <option value="26000">Less Than 26000</option>
            <option value="30000">Less Than 30000</option>
            <option value="150000">No Limit</option>
			</select>
			</div>
			<div id="finder_os">
			<span id="finder_topic">Os :</span>
			<?php
			    echo space(25);
				?>
			<select name="option3" id="finder_option3">
			
			<option value="android">Android</option>
            <option value="windows">Windows</option>
            <option value="ios">iOS</option>
            <option value="blackberry">Blacberry</option>
            <option value="symbian">Symbian</option>
            <option value="other">Other</option>
			</select>
			</div>
			<div id="finder_camera">
			<span id="finder_topic">Camera :</span>
			<?php
			    echo space(11);
				?>
			<select name="option4" id="finder_option4">
			<option value="lt2">Less Than 2MP</option>
            <option value="2t5">2MP - 5MP</option>
            <option value="5t8">5MP - 8MP</option>
            <option value="mt8">More Than 8MP</option>
			</select>
			</div>
			<div id="finder_scamera">
			<span id="finder_topic">Sec. Camera :</span>
				<select name="option5" id="finder_option5">
			<option value="yes">Present</option>
            <option value="no">Absent</option>
			<option value="yn">Not Intersted</option>
			</select>
			</div>
			<div id="finder_flash">
			<span id="finder_topic">Flash :</span>
			<?php
			    echo space(17);
				?>
			<select name="option6" id="finder_option6">
			<option value="yes">Present</option>
            <option value="no">Absent</option>
			<option value="yn">Not Intersted</option>
			</select>
			</div>
			<div id="finder_gps">
			<span id="finder_topic">Gps :</span>
			<?php
			    echo space(22);
				?>
			<select name="option7" id="finder_option7">
			<option value="yes">Present</option>
            <option value="no">Absent</option>
			<option value="yn">Not Intersted</option>
			</select>
			</div>
			<div id="finder_wifi">
			
			<span id="finder_topic">Wi-Fi :</span>
			<?php
			    echo space(17);
				?>
			<select name="option8" id="finder_option8">
			<option value="yes">Present</option>
            <option value="no">Absent</option>
			<option value="yn">Not Intersted</option>
			</select>
			</div>
			<div id="finder_blue">
			<span id="finder_topic">Bluetooth :</span>
			<?php
			    echo space(7);
				?>
			<select name="option9" id="finder_option9">
			<option value="yes">Present</option>
            <option value="no">Absent</option>
			<option value="yn">Not Intersted</option>
			</select>
			</div>
			<div id="finder_sim">
			<span id="finder_topic">Sim :</span>
			<?php
			    echo space(22);
				?>
			<select name="option10" id="finder_option10">
			<option value="1">Single Sim</option>
            <option value="2">Dual Sim</option>
			<option value="yn">Not Intersted</option>
			</select>
			</div>
			<div id="find_button_div">
			 <span id="finder_topic">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="submit" name="find_button" id="find_opt_button" value="Find..">
              </form>
			  </div>
	  </div>
   </div>
    </td>
	   </tr>
    </table></div>
<?php
 require("helper/footer.php");
?>
