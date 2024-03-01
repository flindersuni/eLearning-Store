<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">What do the different workday colours mean?</h4>
        </div>
        <div class="modal-body">
          
 


			
			
<?php ///////////// table
echo "<table class = 'table table-hover'>";	 
echo "<tr>";
echo "<td>Green background with black text indicates staff member is working at Flinders that day eg</td><td class='success'><span style='color:#000000;'>Mon</td></span>
	  <tr>
	  <td>Green background with blue text indicates staff member is working at home that day eg</td><td class='success'><span style='color:#0000ee;'>WFH</td></span>
	  <tr>
	  <td>White background with no text indicates staff member doesn't work that day eg</td><td class='deafult'><span style='color:#ee0000;'></td></span>
      <tr>
	  <td>Red background with red text indicates staff member is on sick leave that day eg</td><td class='danger'><span style='color:#ee0000;'>Sick</td></span>
      <tr>
	  <td>Red background with black text indicates staff member is on rec leave that day eg</td><td class='danger'><span style='color:#0000ee;'>Rec</td></span>
      <tr>";
echo "</tr>";
echo "</table>\n";
			
/////////////// ?>

        </div>
      </div>
      
    </div>
  </div>
  
  <!-- end modal  -->

