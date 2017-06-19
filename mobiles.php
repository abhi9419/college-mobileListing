<?php
  $ref = $_GET['ref'];
   $ref_x_file = "xml/".$ref.".xml";
   $ref_ximg_file = "images/".$ref.".png";
   if(file_exists($ref_x_file) && file_exists($ref_ximg_file))
    {
	  $xml = simplexml_load_file($ref_x_file);
	  $ref_x_vid = "xml/".$ref."_video.xml";
	  $xml_v = simplexml_load_file($ref_x_vid);
	  $xml = $xml->mobile;
	  $real_v_count=0;
       foreach($xml_v->video as $vid_count)
	     {
		   if($vid_count->a!="")
		     $real_v_count++;
		 }
	  $title = $xml->mobile_name;
	  $description = "Find full details of ".$title." with video,images and reviews";
	  $keywords = $title;
	  require("helper/header.php");
	  require("helper/navigation_top.php");
	  echo"<style>#sharethis{text-align:center;}</style>";
	  echo" <div id=\"home_page_wrap\">
      <table>
	   <tr>
	      <td id=\"col_nav_side\"><div id=\"moz\">";
		     
			   require("helper/navigation.php");
			
		  echo"</div></td>
		  <td id=\"col_con_adj\"><div id=\"moz1\">
		    <div id=\"sharethis\">
			  <span class='st_sharethis_large' displayText='ShareThis'></span>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_googleplus_large' displayText='Google +'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
<span class='st_digg_large' displayText='Digg'></span>
<span class='st_wordpress_large' displayText='WordPress'></span>
<span class='st_fblike_large' displayText='Facebook Like'></span>
			</div>
		  
		      <link rel=\"stylesheet\" href=\"css/jquery-ui.css\" />
                       <style>
   					   #jq_tabs li a{
                                     font-size:0.6em;
                                   }
                                 </style>";
						echo"<div id=\"product_wrapper\">
                       <div id=\"jq_tabs\">
                         <ul>
						    <li><a href=\"#detail_product\">Detail</a></li>";
							  
							  if($real_v_count!=0)
							echo"<li><a href=\"#video_product\">Videos</a></li>";
							echo"<li><a href=\"#images_product\">Images</a></li>
							<li><a href=\"#buy_product\">Buy</a></li>
							
						 </ul>
						  <div id=\"detail_product\"><div id=\"all_detail_wrap\">"; 
						    require("helper/product_detail.php");
						  echo"</div></div>";
						  if($real_v_count!=0){
						  echo"<div id=\"video_product\">";
						    foreach($xml_v->video as $video)
							 {
							   echo"<center><div id=\"video_detail_content\"><iframe src=\"http://www.youtube.com/embed/".$video->a."\" width=\"550\" height=\"330\"></iframe></div></center><hr>";
							 }
						 echo "</div>";}
						  echo"<div id=\"images_product\">";
						    foreach($xml->image as $xml1)
                               {
							        
							        $img_s = "images/".$xml1->a;
									
									 if(file_exists($img_s)){
                                    echo"<center><div id=\"image_detail_content\"><img src=\"images/".$xml1->a."\" ></div></center><hr>";}
                 
                               }
						  echo"</div>
						  <div id=\"buy_product\">";
						       $buy = "buy/".$ref.".php";
							   if(file_exists($buy)){
                                     
			                           $fopen = fopen($buy,"r");
			                            $fread = fread($fopen,filesize($buy));
			                                echo$fread;
			                                 fclose($fopen);   
							  }
                              else{							  
						     echo"<div id=\"construction_error\"><img src=\"images/construct.jpg\"></div>";
						  }echo"</div>
						  
						</div></div></div>
		  </td>
	   </tr>
    </table>
   </div>";
   
	  
	  
	  
	 require("helper/footer.php"); 
	}
	else
	{
	  header("Location:index.php");
	}
?>