<?php

 if(isset($_POST['find_button'])){
       $yn = 'yn';
      $brand = $_POST['option1'];
      $price = $_POST['option2'];
	  $os = $_POST['option3'];
	  $camera = $_POST['option4'];
	  $scamera = $_POST['option5'];
	   if($_POST['option5'] == $yn)
	    {
		  $scamera1 = 'no';
		  $scamera  = 'yes';
		}
	   else
	     $scamera1 = $scamera;
	  $flash = $_POST['option6'];
	    if($_POST['option6'] == $yn)
	    {
		  $flash1 = 'no';
		  $flash  = 'yes';
		}
	   else
	     $flash1 = $flash;
	  $gps = $_POST['option7'];
	    if($_POST['option7'] == $yn)
	    {
		  $gps1 = 'no';
		  $gps  = 'yes';
		}
	   else
	     $gps1 = $gps;
	  $wifi = $_POST['option8'];
	   if($_POST['option8'] == $yn)
	    {
		  $wifi1 = 'no';
		  $wifi  = 'yes';
		}
	   else
	     $wifi1= $wifi;
	  $bluetooth = $_POST['option9'];
	  if($_POST['option9'] == $yn)
	    {
		  $bluetooth1 = 'no';
		  $bluetooth  = 'yes';
		}
	   else
	     $bluetooth1 = $bluetooth;
	  $sim = $_POST['option10'];
	   if($_POST['option5'] == $yn)
	    {
		  $sim1 = 1;
		  $sim  = 2;
		}
	   else
	     $sim1 = $sim;
	  $count=0;
	   $xml = simplexml_load_file("xml/$brand.xml");
	  }
	  else
	  { 
	    header("Location:mobile_finder.php");
	  }
  $title = "Mobile Finder";
  $description = "Finds the best mobile for you according to the choice";
  $keywords = "";
  require("helper/header.php");
  require("helper/navigation_top.php");
  

   echo"<div id=\"home_page_wrap\">
      <table>
	   <tr>
	      <td id=\"col_nav_side\"><div id=\"moz\">";
		  require("helper/navigation.php");
		     
		  echo"</div></td>
		  <td id=\"col_con_adj\"><div id=\"moz1\">
  <div id=\"finder_result_section\">
       <h2 id=\"main_section_heading\">
	     Mobile finder Results
	   </h2>";
	     foreach($xml->mobile as $xml)
		  {
		     $imgref = "images/".$xml->short_name.".png";
		     if(($xml->price <= $price) && (strtolower($xml->os) == $os) && ($xml->scamera==$camera) && file_exists($imgref))
			 {
			   if(($xml->sscamera==$scamera || $xml->sscamera==$scamera1) && ($xml->swifi==$wifi || $xml->swifi==$wifi1) && ($xml->sbluetooth==$bluetooth || $xml->sbluetooth==$bluetooth1))
			   {
			     if(($xml->ssim==$sim || $xml->ssim==$sim1) && ($xml->sgps==$gps || $xml->sgps==$gps1) && ($xml->sflash==$flash || $xml->sflash==$flash1))
				 {
				   // echo"<li class=\"result_line\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$xml->mobile_name."</a></li>";
				   echo"<div class=\"brand_section_item\">
       <table>
          <tr>
            <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$xml->short_name."\"><img src=\"images/".$xml->short_name.".png\" width=\"128\" height=\"128\"></a></span></td>
            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$xml->short_name."\">".$xml->mobile_name."</a></span></td>
            <td><span id=\"brand_section_item_price\">Rs ".$xml->price."</span></td>
            <td><span id=\"brand_section_item_os\"> Os&rarr;".$xml->os."</span></td>
            <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$xml->short_name."\">Details</a></span></td>            
          <tr>
       </table>
    </div>";
				   $count++;
				 }
			   }
			 }
		  }
		   if($count==0)
		    echo"<a href=\"mobile_finder.php\">Sorry There are no such mobile.Please try again</a>";
	       else
		    echo"<a href=\"mobile_finder.php\">Try Once Again</a>";
	   ?>  
   </div>
   </div>
   </td>
	   </tr>
    </table></div>
<?php
 require("helper/footer.php");
?>
