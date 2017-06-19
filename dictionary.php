<?php
 if(isset($_GET['ref']))
  {
    $term = $_GET['ref'];
	$xml = simplexml_load_file("xml/dict.xml");
	foreach($xml->letter as $xml1)
	 {
	   if($term == $xml1->name|| $term == strtolower($xml1->name))
	    {
		  $name = $xml1->name;
		  $content = $xml1->content;
		  $video = $xml1->video;
		  break;
		}
	 }
	  $title = $name;
	  $description = "Full description of the term ".$name;
	  $keywords = $title.",".strtolower($title);
	  require("helper/header.php");
	  require("helper/navigation_top.php");
	  echo"<div id=\"home_page_wrap\">
      <table>
	   <tr>
	      <td id=\"col_nav_side\"><div id=\"moz\">";
		     
			   require("helper/navigation.php");
			
		  echo"</div></td>
		  <td id=\"col_con_adj\">";
		    echo"<div id=\"moz1\"><div id=\"main_dict_wrap\">";
			    echo"<link rel=\"stylesheet\" href=\"css/jquery-ui.css\" />
                       <style>
   					   #jq_tabs li a{
                                     font-size:0.6em;
                                   }
                                 </style>";						
                       echo"<div id=\"jq_tabs\">
                         <ul>
						    <li><a href=\"#dict_content_load\">Content</a></li>";
						     	    $d_img1 = "images/".strtolower($title)."1.png";
								$d_img2 = "images/".strtolower($title)."2.png";
                         					if(file_exists($d_img1) || file_exists($d_img2))
							echo"<li><a href=\"#dict_images_load\">Images</a></li>";
							  if($video!="")
							echo"<li><a href=\"#dict_video_load\">Videos</a></li>";
							echo"<li><a href=\"#dict_comment_load\">Comment</a></li>";
						 echo"</ul>
						    <div id=\"dict_content_load\">";
							   echo"<div id=\"dict_heading\">".$name."</div><br>";
							   echo$content;							  
							echo"</div>";
							  if(file_exists($d_img1) || file_exists($d_img2)){
							echo"<div id=\"dict_images_load\">";
						
								 if(file_exists($d_img1))
								  {
								     echo"<div id=\"dict_heading\">".$name."</div><br>";
								     echo"<center><img src=\"$d_img1\"></center>";  
								  }
								  if(file_exists($d_img2))
								  {
								     echo"<br><hr><br><center><img src=\"$d_img2\"></center>";
								  }
							echo"</div>";}
							if($video!=""){
							echo"<div id=\"dict_video_load\">";
							   echo"<div id=\"dict_heading\">".$name."</div><br>";
							   echo"<center><div id=\"video_detail_content\"><iframe src=\"http://www.youtube.com/embed/".$video."\" width=\"550\" height=\"330\"></iframe></div></center><hr>";
                        	echo"</div>";}
							
							echo"<div id=\"dict_comment_load\">";
							echo"</div>";
						 echo"</div>";
			echo"</div></div>";
		 echo" </td>
	   </tr>
    </table>
	</div>";
	  
	  require_once("helper/footer.php");
  }
  else
  {
    header("Location:mobile_dict.php");

  }
?>
