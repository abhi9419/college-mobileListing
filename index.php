<?php
  $title = "Perfecto Mobile";
  $description = "Find All Mobiles here and check the latest price of the different devices";
  $keywords = "Apple,samsung,htc,motorola,finder,instant mobile finder";  
   
   require_once("helper/constants.php");
   require("helper/header.php");
   require("helper/navigation_top.php");
   $xml1 = simplexml_load_file("xml/samsunggalaxys4.xml");
   $xml1 = $xml1->mobile;
   $xml2 = simplexml_load_file("xml/htcone.xml");
   $xml2 = $xml2->mobile;
   $xml3 = simplexml_load_file("xml/nokialumia920.xml");
   $xml3 = $xml3->mobile;
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
		       <h7> <div id="main_section_heading">Best Device from Samsung</div></h7><br>
	            <div id="main_brand_samsung" class="all_main_brand">
                    <div id="main_brand_samsung_image">
					   <img src="images/samsunggalaxys4main.png">
					</div>
					<div id="main_brand_samsung_detail">
					                     <div id="sub_os" class="main_sub_detail">&#10039; <?php echo$xml1->os; ?></div>
									    <div id="sub_cpu" class="main_sub_detail">&#10039; <?php echo$xml1->cpu; ?></div>
										<div id="sub_pcamera" class="main_sub_detail">&#10039; <?php echo$xml1->pcamera; ?></div>
										<div id="sub_ram" class="main_sub_detail">&#10039; <?php echo$xml1->ram; ?> RAM</div>
										<div id="sub_screen_type" class="main_sub_detail">&#10039; <?php echo$xml1->screen_type; ?></div>
										<div id="sub_screen_type" class="main_sub_detail"><a href="mobiles.php?ref=<?php echo$xml1->short_name;?>">More Details..... </a></div>
					</div>
				 </div>	<br><br>
				  <h7> <div id="main_section_heading">Best Device from HTC</div></h7><br>
                   <div id="main_brand_htc" class="all_main_brand">
                    <div id="main_brand_htc_image">
					   <img src="images/htconemain.png">
					</div>
					<div id="main_brand_htc_detail">
					                     <div id="sub_os" class="main_sub_detail">&#10039; <?php echo$xml2->os; ?></div>
									    <div id="sub_cpu" class="main_sub_detail">&#10039; <?php echo$xml2->cpu; ?></div>
										<div id="sub_pcamera" class="main_sub_detail">&#10039; <?php echo$xml2->pcamera; ?></div>
										<div id="sub_ram" class="main_sub_detail">&#10039; <?php echo$xml2->ram; ?> RAM</div>
										<div id="sub_screen_type" class="main_sub_detail">&#10039; <?php echo$xml2->screen_type; ?></div>
										<div id="sub_screen_type" class="main_sub_detail"><a href="mobiles.php?ref=<?php echo$xml2->short_name;?>">More Details..... </a></div>
					</div>
				 </div>		
                  <br><br>
				  <h7> <div id="main_section_heading">Best Device from Nokia</div></h7><br>
                   <div id="main_brand_nokia" class="all_main_brand">
                    <div id="main_brand_nokia_image">
					   <img src="images/nokialumia920main.png">
					</div>
					<div id="main_brand_nokia_detail">
					                     <div id="sub_os" class="main_sub_detail">&#10039; <?php echo$xml3->os; ?></div>
									    <div id="sub_cpu" class="main_sub_detail">&#10039; <?php echo$xml3->cpu; ?></div>
										<div id="sub_pcamera" class="main_sub_detail">&#10039; <?php echo$xml3->pcamera; ?></div>
										<div id="sub_ram" class="main_sub_detail">&#10039; <?php echo$xml3->ram; ?> RAM</div>
										<div id="sub_screen_type" class="main_sub_detail">&#10039; <?php echo$xml3->screen_type; ?></div>
										<div id="sub_screen_type" class="main_sub_detail"><a href="mobiles.php?ref=<?php echo$xml3->short_name;?>">More Details..... </a></div>
					</div>
				 </div>						 
		    </div> 
		  </td>
	   </tr>
    </table>	
 </div>
<?php
  require("helper/footer.php");
?>
