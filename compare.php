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
<div id="compare_section">
<form action="compare.php" method="POST">
 <div id="compare_getbrand">
<select name="option1" id="compare_option1">
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
<select name="option2" id="compare_option2">
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
<input type="submit" name="comp_button" id="compare_opt_button" value="Go..">
</form>
</div>
<?php
 
 if(isset($_POST['comp_button']))
  {
    $first = $_POST['option1'];
    $second = $_POST['option2'];
    //if(file_exists('xml/$first.xml') && file_exists('xml/$second.xml')){
    $xml1 = simplexml_load_file("xml/$first.xml");
    $xml2 = simplexml_load_file("xml/$second.xml");
    //if(!($xml2 && $xml1))
     //{header("Location:under.php");
	//   die();}    
    
    echo"<form action=\"compare_result.php\" method=\"POST\">";
     echo"<div id=\"compare_getname\">";
      echo"<select name=\"name1\" id=\"compare_name1\">";
      foreach($xml1->mobile as $xml1)
         {							    $imgref = "images/".$xml1->short_name.".png";
					              if(file_exists($imgref)){

            echo"<option value=\"".$xml1->short_name."\">".$xml1->mobile_name."</option>";
               }
			}
      echo"</select>"; 
      echo"<select name=\"name2\" id=\"compare_name2\">";
       foreach($xml2->mobile as $xml2)
         {
		    							    $imgref = "images/".$xml2->short_name.".png";
					              if(file_exists($imgref)){

            echo"<option value=\"".$xml2->short_name."\">".$xml2->mobile_name."</option>";
                       }
			}
         
      echo"</select>";    
      echo"<input type=\"submit\" name=\"comp1_button\" id=\"name_opt_button\" value=\"Compare\">";
    echo"</form>";
  }
   echo"</div>";
  ?>
</div>
</div>
</td>
	   </tr>
    </table></div>
<?php
require("helper/footer.php");

?>
  
