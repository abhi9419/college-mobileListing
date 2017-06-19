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
               <div id="dict_term_list">
			      <?php
				     $xml = simplexml_load_file("xml/dict.xml");
					  for($i=0;$i<26;$i++)
					   {
					     $tot_let[$i]=0;
					   }
					   foreach($xml->letter as $xml1)
					    {
						   $first_c = strtolower(substr($xml1->name,0,1));
                           $tot_let[ord($first_c)-97]++;						   
						}					   
					   echo"<link rel=\"stylesheet\" href=\"css/jquery-ui.css\" />
                       <style>
   					   #jq_tabs li a{
                                     font-size:0.6em;
                                   }
                                 </style>
						<div id=\"jq_tabs\">
						  <ul>";
						  for($i=0;$i<26;$i++)
						   {
						     if($tot_let[$i]!=0)
							  {
							    $char = chr($i+97);
								$char1 = strtoupper($char);
							    echo"<li><a href=\"#dict_".$char."_load\">".$char1."</a></li>";
							  }
						   }
						   echo"</ul>";
						   
						    for($i=0;$i<26;$i++)
						   {
						     if($tot_let[$i]!=0)
							  {
							    $char = chr($i+97);
								$char1 = strtoupper($char);
							    echo"<div id=\"dict_".$char."_load\" class=\"dict_term_class_load\">";
								  echo"<ol>";
								    foreach($xml->letter as $xml2)
									 {
									    if(strtolower(substr($xml2->name,0,1))==strtolower($char))
										 {
										    echo"<a href=\"dictionary.php?ref=".strtolower($xml2->name)."\"><li>".$xml2->name."</li></a><br>";
										 }
									 }
									 echo"</ol>";
								echo"</div>";
							  }
						   }
						    	
				   ?>
			    </div>
           </div>
		   </div>
		   </td>
	   </tr>
    </table>