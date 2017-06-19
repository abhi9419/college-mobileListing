<?php
  $ref = strtolower($title);
  require("helper/header.php");
  require("helper/navigation_top.php");
  $min=-1;
  $max=-1;
  $imin="Min";
  $imax="Max";
  ?>
  
    <style>
      #<?php echo$ref; ?>_side{
                        background:#585858;
                        
                        }
      #<?php echo$ref; ?>_side a{
        color:white;
        font-weight:bold;
        font-style:italic;
         
 }
   </style>
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
		     <div id="range">
<?php			
			if(isset($_POST['pricesort_button']))
				  {
                      $min = $_POST['minprice'];
                      $max = $_POST['maxprice'];
                       //echo$min."<br>".$max;
					   if($min<0)
					      $min=-1;
						  else
						   $imin = $min;
					    if($max<0)
						  $min=-1;
						  else
						   $imax = $max;
						  
						
				  }
				  
	?>		    <form action="" method="POST">
				   <table>
				     <tr>
					    <td>
						   <legend id="sortheading">Select Mobile from Price Range : </legend>
						</td>
					    <td>
						   <legend>Min : </legend><input type="text" id="maxsort" placeholder="<?php echo$imin; ?>" name="minprice" required>
						</td>
						<td>
						    <legend>Max : </legend><input type="text" id="maxsort" placeholder="<?php echo$imax; ?>" name="maxprice" required>
						</td>
						<td><input type="submit" id="pricesort_button" name="pricesort_button">
						</td>
					 </tr>
				   </table>
				</form>
			 </div><br>
			  
			 <?php
			     if($min==-1 || $max==-1){
			     $load_xml = "xml/".$ref.".xml";
				  $xml = simplexml_load_file("$load_xml");
				  $all=$android=$windows=$symbian=$ios=$other=$lt2=0;
				  $t25=$ft8=$mt8=$scamera=$bluetooth=$flash=0;
				  $wifi=$gps=$dualsim=$singlesim=$blackberry=0;
				  foreach($xml->mobile as $xml1)
				   {
				      $imgref = "images/".$xml1->short_name.".png";
					  if(file_exists($imgref))
					   {
					      $all++;
						  if(strtolower($xml1->os)=="android")
						    $android++;
						  if(strtolower($xml1->os)=="windows")
						    $windows++;
						   if(strtolower($xml1->os)=="ios")
						    $ios++;
							if(strtolower($xml1->os)=="symbian")
						    $symbian++;
							if(strtolower($xml1->os)=="other")
						    $other++;
							if(strtolower($xml1->os)=="blackberry")
						    $blackberry++;
							if(strtolower($xml1->scamera)=="lt2")
						    $lt2++;
							if(strtolower($xml1->scamera)=="2t5")
						    $t25++;
							if(strtolower($xml1->scamera)=="5t8")
						    $ft8++;
							if(strtolower($xml1->scamera)=="mt8")
						    $mt8++;
							if(strtolower($xml1->sscamera)=="yes")
						    $scamera++;
							if(strtolower($xml1->sflash)=="yes")
						    $flash++;
							if(strtolower($xml1->sbluetooth)=="yes")
						    $bluetooth++;
							if(strtolower($xml1->swifi)=="yes")
						    $wifi++;
							if(strtolower($xml1->sgps)=="yes")
						    $gps++;
							if(strtolower($xml1->ssim)=="1")
						    $singlesim++;
							if(strtolower($xml1->ssim)=="2")
						    $dualsim++;
							
					   }
				   }
			     
			      echo"<link rel=\"stylesheet\" href=\"css/jquery-ui.css\" />
                       <style>
   					   #jq_tabs li a{
                                     font-size:0.6em;
                                   }
                                 </style>";
						if($all!=0){
						
                       echo"<div id=\"jq_tabs\">
                         <ul>
							<li><a href=\"#brand_main_load\">".$title." Mobile</a></li>";
							  if($android!=0)
                                   echo"<li><a href=\"#brand_android_load\">Android</a></li>";
                              if($windows!=0)
								   echo"<li><a href=\"#brand_windows_load\">Windows</a></li>";
							  if($ios!=0)
							       echo"<li><a href=\"#brand_ios_load\">iOS</a></li>";
							  if($symbian!=0)
							       echo"<li><a href=\"#brand_symbian_load\">Symbian</a></li>";
							  if($other!=0)
                                   echo"<li><a href=\"#brand_other_load\">Other Os</a></li>";
							  if($lt2!=0)
                                   echo"<li><a href=\"#brand_lt2_load\">Camera &lt; 2MP</a></li>";
							  if($t25!=0)
	                               echo"<li><a href=\"#brand_2t5_load\">Camera 2MP - 5MP</a></li>";
							  if($ft8!=0)
	                               echo"<li><a href=\"#brand_5t8_load\">Camera 5MP - 8MP</a></li>";
							  if($mt8!=0)   
								   echo"<li><a href=\"#brand_mt8_load\">Camera &gt; 8MP</a></li>";
							  if($scamera!=0)
                                   echo"<li><a href=\"#brand_scamera_load\">Secondary Camera</a></li>";
							  if($flash!=0)
	                               echo"<li><a href=\"#brand_flash_load\">Flash</a></li>";
							  if($bluetooth!=0)
	                               echo"<li><a href=\"#brand_bluetooth_load\">Bluetooth</a></li>";
							  if($wifi!=0)
                                   echo"<li><a href=\"#brand_wifi_load\">Wi-fi</a></li>";
							  if($gps!=0)
                                   echo"<li><a href=\"#brand_gps_load\">GPS</a></li>";
							  if($dualsim!=0)
	                               echo"<li><a href=\"#brand_dualsim_load\">Dual Sim</a></li>";
							  if($singlesim!=0)
	                               echo"<li><a href=\"#brand_singlesim_load\">Single Sim</a></li>";
                          echo"</ul>";
					
					//all brands
					if($all!=0)
					 {
					    echo"<div id=\"brand_main_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref)){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
	          				 
				      //android

                        if($android!=0)
					 {
					    echo"<div id=\"brand_android_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Android Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="android"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }					  
					 
			                //windows
							
							if($windows!=0)
					  {
					    echo"<div id=\"brand_windows_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Windows Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="windows"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
                         
			                     //ios
							
							if($ios!=0)
					  {
					    echo"<div id=\"brand_ios_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="ios"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					 
					         //symbian
							
							if($symbian!=0)
					  {
					    echo"<div id=\"brand_symbian_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Symbian Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="symbian"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					 
					         //other
							
							if($other!=0)
					  {
					    echo"<div id=\"brand_other_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Other Os Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="other"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //lt2
							
							if($lt2!=0)
					  {
					    echo"<div id=\"brand_lt2_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Camera &lt; 2MP</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->scamera)=="lt2"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //2t5
							
							if($t25!=0)
					  {
					    echo"<div id=\"brand_2t5_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Camera 2MP - 5MP</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->scamera)=="2t5"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //5t8
							
							if($ft8!=0)
					  {
					    echo"<div id=\"brand_5t8_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Camera 5MP - 8MP</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->scamera)=="5t8"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //mt8
							
							if($mt8!=0)
					  {
					    echo"<div id=\"brand_mt8_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Camera &gt; 8MP</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->scamera)=="mt8"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //sec. camera
							
							if($scamera!=0)
					  {
					    echo"<div id=\"brand_scamera_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Secondary Camera</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->sscamera)=="yes"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //flash
							
							if($flash!=0)
					  {
					    echo"<div id=\"brand_flash_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Flash</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->sflash)=="yes"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //sbluetooth
							
							if($bluetooth!=0)
					  {
					    echo"<div id=\"brand_bluetooth_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Bluetooth</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->sbluetooth)=="yes"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //gps
							
							if($gps!=0)
					  {
					    echo"<div id=\"brand_gps_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with GPS</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->sgps)=="yes"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //wifi
							
							if($wifi!=0)
					  {
					    echo"<div id=\"brand_wifi_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Wi-Fi</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->swifi)=="yes"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //single sim
							
							if($singlesim!=0)
					  {
					    echo"<div id=\"brand_singlesim_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Single Sim</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->ssim)=="1"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //dual sim
							
							if($dualsim!=0)
					  {
					    echo"<div id=\"brand_dualsim_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Dual Sim</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->ssim)=="2"){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					 
					 
					 
					 
			 }
			 else
			  {
			    echo"Sorry No mobile of this brand is uploaded yet";
			  }
			    
				
				
				
				}
				else{
				  $load_xml = "xml/".$ref.".xml";
				  $xml = simplexml_load_file("$load_xml");
				  $all=$android=$windows=$symbian=$ios=$other=$lt2=0;
				  $t25=$ft8=$mt8=$scamera=$bluetooth=$flash=0;
				  $wifi=$gps=$dualsim=$singlesim=$blackberry=0;
				  foreach($xml->mobile as $xml1)
				   {
				      $imgref = "images/".$xml1->short_name.".png";
					  if(file_exists($imgref) && $xml1->price>=$min && $xml1->price<=$max)
					   {
					      $all++;
						  if(strtolower($xml1->os)=="android")
						    $android++;
						  if(strtolower($xml1->os)=="windows")
						    $windows++;
						   if(strtolower($xml1->os)=="ios")
						    $ios++;
							if(strtolower($xml1->os)=="symbian")
						    $symbian++;
							if(strtolower($xml1->os)=="other")
						    $other++;
							if(strtolower($xml1->os)=="blackberry")
						    $blackberry++;
							if(strtolower($xml1->scamera)=="lt2")
						    $lt2++;
							if(strtolower($xml1->scamera)=="2t5")
						    $t25++;
							if(strtolower($xml1->scamera)=="5t8")
						    $ft8++;
							if(strtolower($xml1->scamera)=="mt8")
						    $mt8++;
							if(strtolower($xml1->sscamera)=="yes")
						    $scamera++;
							if(strtolower($xml1->sflash)=="yes")
						    $flash++;
							if(strtolower($xml1->sbluetooth)=="yes")
						    $bluetooth++;
							if(strtolower($xml1->swifi)=="yes")
						    $wifi++;
							if(strtolower($xml1->sgps)=="yes")
						    $gps++;
							if(strtolower($xml1->ssim)=="1")
						    $singlesim++;
							if(strtolower($xml1->ssim)=="2")
						    $dualsim++;
							
					   }
				   }
			     
			      echo"<link rel=\"stylesheet\" href=\"css/jquery-ui.css\" />
                       <style>
   					   #jq_tabs li a{
                                     font-size:0.6em;
                                   }
                                 </style>";
						if($all!=0){
						
                       echo"<div id=\"jq_tabs\">
                         <ul>
							<li><a href=\"#brand_main_load\">".$title." Mobile</a></li>";
							  if($android!=0)
                                   echo"<li><a href=\"#brand_android_load\">Android</a></li>";
                              if($windows!=0)
								   echo"<li><a href=\"#brand_windows_load\">Windows</a></li>";
							  if($ios!=0)
							       echo"<li><a href=\"#brand_ios_load\">iOS</a></li>";
							  if($symbian!=0)
							       echo"<li><a href=\"#brand_symbian_load\">Symbian</a></li>";
							  if($other!=0)
                                   echo"<li><a href=\"#brand_other_load\">Other Os</a></li>";
							  if($lt2!=0)
                                   echo"<li><a href=\"#brand_lt2_load\">Camera &lt; 2MP</a></li>";
							  if($t25!=0)
	                               echo"<li><a href=\"#brand_2t5_load\">Camera 2MP - 5MP</a></li>";
							  if($ft8!=0)
	                               echo"<li><a href=\"#brand_5t8_load\">Camera 5MP - 8MP</a></li>";
							  if($mt8!=0)   
								   echo"<li><a href=\"#brand_mt8_load\">Camera &gt; 8MP</a></li>";
							  if($scamera!=0)
                                   echo"<li><a href=\"#brand_scamera_load\">Secondary Camera</a></li>";
							  if($flash!=0)
	                               echo"<li><a href=\"#brand_flash_load\">Flash</a></li>";
							  if($bluetooth!=0)
	                               echo"<li><a href=\"#brand_bluetooth_load\">Bluetooth</a></li>";
							  if($wifi!=0)
                                   echo"<li><a href=\"#brand_wifi_load\">Wi-fi</a></li>";
							  if($gps!=0)
                                   echo"<li><a href=\"#brand_gps_load\">GPS</a></li>";
							  if($dualsim!=0)
	                               echo"<li><a href=\"#brand_dualsim_load\">Dual Sim</a></li>";
							  if($singlesim!=0)
	                               echo"<li><a href=\"#brand_singlesim_load\">Single Sim</a></li>";
                          echo"</ul>";
					
					//all brands
					if($all!=0)
					 {
					    echo"<div id=\"brand_main_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref)  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
	          				 
				      //android

                        if($android!=0)
					 {
					    echo"<div id=\"brand_android_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Android Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="android"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }					  
					 
			                //windows
							
							if($windows!=0)
					  {
					    echo"<div id=\"brand_windows_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Windows Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="windows"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }

                       //ios
							
					if($ios!=0)
					  {
					    echo"<div id=\"brand_ios_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="ios"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					 
					         //symbian
							
							if($symbian!=0)
					  {
					    echo"<div id=\"brand_symbian_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Symbian Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="symbian"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					 
					         //other
							
							if($other!=0)
					  {
					    echo"<div id=\"brand_other_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Other Os Mobiles</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->os)=="other"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //lt2
							
							if($lt2!=0)
					  {
					    echo"<div id=\"brand_lt2_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Camera &lt; 2MP</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->scamera)=="lt2"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //2t5
							
							if($t25!=0)
					  {
					    echo"<div id=\"brand_2t5_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Camera 2MP - 5MP</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->scamera)=="2t5"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //5t8
							
							if($ft8!=0)
					  {
					    echo"<div id=\"brand_5t8_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Camera 5MP - 8MP</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->scamera)=="5t8"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //mt8
							
							if($mt8!=0)
					  {
					    echo"<div id=\"brand_mt8_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Camera &gt; 8MP</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->scamera)=="mt8"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //sec. camera
							
							if($scamera!=0)
					  {
					    echo"<div id=\"brand_scamera_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Secondary Camera</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->sscamera)=="yes"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //flash
							
							if($flash!=0)
					  {
					    echo"<div id=\"brand_flash_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Flash</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->sflash)=="yes"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //sbluetooth
							
							if($bluetooth!=0)
					  {
					    echo"<div id=\"brand_bluetooth_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Bluetooth</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->sbluetooth)=="yes"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //gps
							
							if($gps!=0)
					  {
					    echo"<div id=\"brand_gps_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with GPS</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->sgps)=="yes"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //wifi
							
							if($wifi!=0)
					  {
					    echo"<div id=\"brand_wifi_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Wi-Fi</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->swifi)=="yes"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //single sim
							
							if($singlesim!=0)
					  {
					    echo"<div id=\"brand_singlesim_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Single Sim</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->ssim)=="1"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 
					         //dual sim
							
							if($dualsim!=0)
					  {
					    echo"<div id=\"brand_dualsim_load\" class=\"brand_section\">";
                              echo"<div id=\"main_section_heading\">".$title." Mobiles with Dual Sim</div>";
                            foreach($xml->mobile as $device)
                             {
							    $imgref = "images/".$device->short_name.".png";
					              if(file_exists($imgref) && strtolower($device->ssim)=="2"  && $device->price>=$min && $device->price<=$max){
                                echo"<hr><div class=\"brand_section_item\">
                                      <table>
                                        <tr>
                                           <td><span id=\"brand_section_item_image\"><a href=\"mobiles.php?ref=".$device->short_name."\"><img class=\"main_page_images\" src=\"images/noimage.png\" data-original=\"images/".$device->short_name.".png\" ></a></span></td>
										   
                                            <td><span id=\"brand_section_item_name\"><a href=\"mobiles.php?ref=".$device->short_name."\">".$device->mobile_name."</a></span></td>
											
                                             <td><span id=\"brand_section_item_price\">Rs ".$device->price."</span></td>
											 
                                             <td><span id=\"brand_section_item_os\"> Os&rarr;".$device->os."</span></td>
											 
                                             <td><span id=\"brand_section_item_detail\"><a href=\"mobiles.php?ref=".$device->short_name."\">Details</a></span></td>            
                                         <tr>
                                      </table>
                                     </div>";}
                               } 
                           echo"</div>";
					 }
					 	 
			 }
			 else
			  {
			    echo"Sorry,Mobiles of this price range is not available.Please,try other options";
			  }
				}
			 ?>
		  </td>
		  </div>
	   </tr>
    </table>
	<div id="go_to_top">
	    <a href="#full_wrap">Top</a>
	  </div>
   </div>
   
  <?php  
  
  require("helper/footer.php");
  ?>