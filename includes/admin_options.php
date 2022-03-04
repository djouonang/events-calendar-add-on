<?php

add_action('admin_menu', 'admin_option');

function admin_option() {
	
	 $page_title = 'Islamic Hijri Dates';
	 $menu_title = 'Islamic Hijri Dates';
	 $capability = 'edit_posts';
     $menu_slug = 'event_calendar';
     $function = 'event_calendar';
     $icon_url = EVENTCALENDAR_URL.'includes/media/menu_icon.png';
     $position = 20;
	 

	 add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	 
	
	
}
require_once("setting.php");