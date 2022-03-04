<?php

  function getapicsv( $request){

  $lines = testcsv();

foreach ($lines as $line) {
    $data[] = explode(',', $line);
  
}
  	if ( empty( $data ) ) {
		return new WP_REST_Response( [
			'message' => 'Nothing was found',
		], 400 );
	}
	
  return rest_ensure_response($lines);
 }

add_action( 'rest_api_init', 'define_endpoint' );

function define_endpoint(){
	
   register_rest_route( 'eventcalendaraddon', '/v1/', array(
    'methods' => 'GET',
    'callback' => 'getapicsv',
    'permission_callback' => '__return_true',
  ) );


}