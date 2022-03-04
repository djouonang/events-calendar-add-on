<?php

function downloadFiles( ) {

 // get_rest_url( null, 'eventcalendaraddon/v1' );
}

//downloadFiles();

function event_calendar() {
  if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
   upload_csv();
    
         }
$query = file_get_contents(EVENTCALENDAR_DIR."includes/csv/csv.txt");

 $attachment_url = wp_get_attachment_url($query);

		  ?>
       
     <div class="wrap">
  <form   action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
 <div class="settings-form-wrap">
<h3 >General Settings</h3>

            <br/><br/> 

 <div class="form-control">
            <a class="btn text-primaryy"  href="<?php echo $attachment_url; ?>">Download csv</a> 
 </div>
    
            <br/><br/><br/>
             <div class="m360_upload_dates_section">
    <label for="uploadinfo">Upload CSV:</label>
	<input type="file" name="uploadinfo" accept=".csv" class="inputfile" autofocus />
		 </div>
			<br/><br/>
  <button  class="text-primaryy" name="submit_form" type="submit">Save Settings</button>
</div>
</form>
</div>

<?php 
     }