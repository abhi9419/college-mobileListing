<div id="compare_result_section">
<table>
  <tr>
     <th>Specification</th>
     <th><?php echo$xml->mobile_name;?></th>
     <th><?php echo$xml1->mobile_name;?></th>
  </tr>
   <tr>
     <th><?php echo"Price(Rs)";?></th>
     <td class="compare_prop"><?php echo$xml->price;?></td>
     <td class="compare_prop"><?php echo$xml1->price;?></td>
  </tr>
  <tr>
     <th><?php echo"Price(Rs)";?></th>
     <td class="compare_prop"><?php echo$xml->price;?></td>
     <td class="compare_prop"><?php echo$xml1->price;?></td>
  </tr>
  <tr>
     <th><?php echo"OS";?></th>
     <td class="compare_prop"><?php echo$xml->os;?></td>
     <td class="compare_prop"><?php echo$xml1->os;?></td>
  </tr>
  <tr>
     <th><?php echo"CPU";?></th>
     <td class="compare_prop"><?php echo$xml->cpu;?></td>
     <td class="compare_prop"><?php echo$xml1->cpu;?></td>
  </tr>
  <tr>
     <th><?php echo"Primary camera";?></th>
     <td class="compare_prop"><?php echo$xml->pcamera;?></td>
     <td class="compare_prop"><?php echo$xml1->pcamera;?></td>
  </tr>
  <tr>
     <th><?php echo"Secondary Camera";?></th>
     <td class="compare_prop"><?php echo$xml->scamera;?></td>
     <td class="compare_prop"><?php echo$xml1->scamera;?></td>
  </tr>
  <tr>
     <th><?php echo"RAM";?></th>
     <td class="compare_prop"><?php echo$xml->ram;?></td>
     <td class="compare_prop"><?php echo$xml1->ram;?></td>
  </tr>
  <tr>
     <th><?php echo"Dimension";?></th>
     <td class="compare_prop"><?php echo$xml->dimension;?></td>
     <td class="compare_prop"><?php echo$xml1->dimension;?></td>
  </tr>
  <tr>
     <th><?php echo"Weight";?></th>
     <td class="compare_prop"><?php echo$xml->weight;?></td>
     <td class="compare_prop"><?php echo$xml1->weight;?></td>
  </tr>
  <tr>
     <th><?php echo"Resolution";?></th>
     <td class="compare_prop"><?php echo$xml->resolution;?></td>
     <td class="compare_prop"><?php echo$xml1->resolution;?></td>
  </tr>
  <tr>
     <th><?php echo"Screen";?></th>
     <td class="compare_prop"><?php echo$xml->screen_type;?></td>
     <td class="compare_prop"><?php echo$xml1->screen_type;?></td>
  </tr>
  <tr>
     <th><?php echo"Flash";?></th>
     <td class="compare_prop"><?php echo$xml->flash;?></td>
     <td class="compare_prop"><?php echo$xml1->flash;?></td>
  </tr>
  <tr>
     <th><?php echo"Bluetooth";?></th>
     <td class="compare_prop"><?php echo$xml->bluetooth;?></td>
     <td class="compare_prop"><?php echo$xml1->bluetooth;?></td>
  </tr>
  <tr>
     <th><?php echo"Wi-fi";?></th>
     <td class="compare_prop"><?php echo$xml->wifi;?></td>
     <td class="compare_prop"><?php echo$xml1->wifi;?></td>
  </tr>
  <tr>
     <th><?php echo"GPS";?></th>
     <td class="compare_prop"><?php echo$xml->gps;?></td>
     <td class="compare_prop"><?php echo$xml1->gps;?></td>
  </tr>
  <tr>
     <th><?php echo"Pick Or Drop";?></th>
     <td class="compare_prop"><?php echo$xml->wbuy;?></td>
     <td class="compare_prop"><?php echo$xml1->wbuy;?></td>
  </tr>
   <?php
      if(!($xml2->a=="") && !($xml3->a=="")){
  echo"<tr>
     <th>Video</th>
     <td id=\"compare_video\"><iframe src=\"http://www.youtube.com/embed/".$xml2->a."\" width=\"350\" height=\"180\"></iframe></td>
     <td id=\"compare_video\"><iframe src=\"http://www.youtube.com/embed/".$xml3->a."\" width=\"350\" height=\"180\"></iframe></td>
  </tr>";}
  ?>
</table>

</div>