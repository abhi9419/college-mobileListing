<?php
  $xml2 = simplexml_load_file('xml/nokia.xml');
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
<div id="os_main_load" class="os_section">
 <h7> <div id="main_section_heading">Symbian Mobiles</div></h7>
      <?php     foreach($xml2->mobile as $device)
      { $imgref = "images/".$device->short_name.".png";
        if(strtolower($device->os)=="symbian" && file_exists($imgref))
       {
        echo"<div class=\"brand_section_item\">
       <table>
          <tr>
            <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
            <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
            <td><span id=\"brand_section_item_os\">".$device->os."</span></td>
            <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
          <tr>
       </table>
    </div><hr>";
    }}
   
     ?>
</div>
</div>

</td>
	   </tr>
    </table>
	<div id="go_to_top">
	    <a href="#full_wrap">Top</a>
	  </div>
 </div>