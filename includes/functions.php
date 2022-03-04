<?php
  
  function csv_the_id($file_id) {
  
  
      $myfile = fopen(EVENTCALENDAR_DIR."includes/csv/csv.txt", "w") or die("Unable to open file!");
$txt = $file_id;
fwrite($myfile, $txt);
     fclose($myfile);
  
  }

 

function testcsv(){
  $myfileid = file_get_contents(EVENTCALENDAR_DIR."includes/csv/csv.txt");
  	  $attachment_url = get_attached_file($myfileid);

  $csvFile = file_get_contents($attachment_url);
  
    $lines = explode ('#', $csvFile);

    return $lines;
  }




/*
function deletecsv(){
  $myfileid = file_get_contents(EVENTCALENDAR_DIR."includes/csv/csv.txt");
  	  $attachment_url = get_attached_file($myfileid);
 unlink($attachment_url);
  
  }
*/
 function upload_csv() {
  
  	require_once( ABSPATH . 'wp-load.php');

if($_FILES['uploadinfo']['name']) {
	
	//  deletecsv();
    //validate the file
	
    $new_file_name = strtolower($_FILES['uploadinfo']['tmp_name']);
	
    //can't be larger than 270 KB 
    if($_FILES['uploadinfo']['size'] > (270000)) {
      //wp_die generates a visually appealing message element
      wp_die('Your file size is to large.');
    }
    else {
      //the file has passed the test
      //These files need to be included as dependencies when on the front end.
      require_once( ABSPATH . 'wp-admin/includes/image.php' );
      require_once( ABSPATH . 'wp-admin/includes/file.php' );
      require_once( ABSPATH . 'wp-admin/includes/media.php' );
       
      // Let WordPress handle the upload.
      // Remember, 'upload' is the name of our file input in our form above.
      $file_id = media_handle_upload( 'uploadinfo', 0 );
     csv_the_id($file_id);
     
      
      if( is_wp_error( $file_id ) ) {
         wp_die('Error loading file!');
      } else{
   $success = '<div class="alert alert-info">CSV submitted successfully</div>';
           echo $success;
  }
    }

} else{
   $error = '<div class="alert alert-danger">No file uploaded</div>';
           echo $error;
  }
  
  }


  function getIslamicDate ($date, $mode=0) {
	global $ISLAMIC_DATE;

	if ($mode == 1) {
    	 
		$i_date = @substr($ISLAMIC_DATE[$date][0], -2);
        
		if ($i_date == " 1"){
			if ($ISLAMIC_DATE[$date][1] == '1') { // Wiladat link
				return '<a class="no-circle" href="/'.$ISLAMIC_DATE[$date][3].'" ><span class="wiladat" title="'.$ISLAMIC_DATE[$date][2].'">'.$ISLAMIC_DATE[$date][0].'</a></span>';
			} elseif ($ISLAMIC_DATE[$date][1] == '2') { // Shahadat link
				return '<a class="no-circle" href="/'.$ISLAMIC_DATE[$date][3].'" ><span class="wafat" title="'.$ISLAMIC_DATE[$date][2].'">'.$ISLAMIC_DATE[$date][0].'</a></span>';
			} else {
				return $ISLAMIC_DATE[$date][0];
			}
		} else {
			if ((@$ISLAMIC_DATE[$date][1] == '1')) { // Wiladat link
				return '<a class="no-circle" href="/'.$ISLAMIC_DATE[$date][3].'" ><span class="wiladat" title="'.$ISLAMIC_DATE[$date][2].'">'.$i_date.'</a></span>';
			} elseif (@$ISLAMIC_DATE[$date][1] == '2') { // Shahadat link
				return '<a class="no-circle" href="/'.$ISLAMIC_DATE[$date][3].'" ><span class="wafat" title="'.$ISLAMIC_DATE[$date][2].'">'.$i_date.'</a></span>';
			} else {
				return $i_date;
			}
		}
	} else {
		return @$ISLAMIC_DATE[$date][0];
	}
}


function getIslamicMonth ($month, $year) {
	global $ISLAMIC_DATE;

	$dates = explode('-', tribe_get_month_view_date());
	$year = $dates[0];

	if ($month == "January") {
		$mm = '01';
		$dd = '31';
	} elseif ($month == "February") {
		$mm = '02';
		$dd = '28';
	} elseif ($month == "March") {
		$mm = '03';
		$dd = '31';
	} elseif ($month == "April") {
		$mm = '04';
		$dd = '30';
	} elseif ($month == "May") {
		$mm = '05';
		$dd = '31';
	} elseif ($month == "June") {
		$mm = '06';
		$dd = '30';
	} elseif ($month == "July") {
		$mm = '07';
		$dd = '31';
	} elseif ($month == "August") {
		$mm = '08';
		$dd = '31';
	} elseif ($month == "September") {
		$mm = '09';
		$dd = '30';
	} elseif ($month == "October") {
		$mm = '10';
		$dd = '31';
	} elseif ($month == "November") {
		$mm = '11';
		$dd = '30';
	} elseif ($month == "December") {
		$mm = '12';
		$dd = '31';
	} else {
		return $month;
	}

	$date1 = $year.'-'.$mm.'-01';
	$date2 = $year.'-'.$mm.'-'.$dd;

	$string1 = substr($ISLAMIC_DATE[$date1][0], 0, -2);
	$string2 = substr($ISLAMIC_DATE[$date2][0], 0, -2);

	if ($string1 == $string2) {
		return $string1;
	} else {
		return $string1."/".$string2;
	}
}

function getOccasionURL($date){
	global $ISLAMIC_DATE;

	return 0;
	
	if ($ISLAMIC_DATE[$date] != ""){
		return "/".$ISLAMIC_DATE[$date][3];
	} else {
		return;
	}
}