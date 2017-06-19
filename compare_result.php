<?php

  if(isset($_POST['comp1_button'])){
      $first = $_POST['name1'];
      $second = $_POST['name2'];
        $firstv = "xml/".$first."_video.xml";
         $secondv = "xml/".$second."_video.xml";
		$first = "xml/".$first.".xml";
         $second = "xml/".$second.".xml";
		 
        $xml = simplexml_load_file($first);
	   $xml = $xml->mobile;
       $xml1 = simplexml_load_file($second);
	 $xml1 = $xml1->mobile;
	 
	 $xml2 = simplexml_load_file($firstv);
	   $xml2 = $xml2->video;
       $xml3 = simplexml_load_file($secondv);
	 $xml3 = $xml3->video;
	  
	 }
	 else
	 {
	   header("Location:compare.php");
	 }
	 ?>
<?php
$title = "Compare";
  $description = "";
  $keywords = "";
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
<?php
echo"<div id=\"compare_result\">";
      require("helper/compare_table_maker.php");
  
  echo"</div></div>";
  ?>
  </td>
	   </tr>
    </table></div>
	<?php
require("helper/footer.php");

?>
