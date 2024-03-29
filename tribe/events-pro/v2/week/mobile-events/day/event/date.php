<?php
/**
 * View: Week View - Mobile Event Date
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/week/mobile-events/day/event/date.php
 *
 * See more documentation about our views templating system.
 *
 * @link https://evnt.is/1aiy
 *
 * @since 5.0.0
 * @since 5.1.1 Moved icons out to separate templates.
 *
 * @var WP_Post $event The event post object, decorated with additional properties by the `tribe_get_event` function.
 *
 * @see tribe_get_event() for the additional properties added to the event post object.
 *
 * @version 5.1.1
 */

   $event_id = get_the_ID();

?>
<div class="tribe-events-pro-week-mobile-events__event-datetime-wrapper tribe-common-b2">
	<?php $this->template( 'week/mobile-events/day/event/date/featured', [ 'event' => $event ] ); ?>
	<time
		class="tribe-events-pro-week-mobile-events__event-datetime"
		datetime="<?php echo esc_attr( $event->dates->start_display->format( 'c' ) ); ?>"
	>
		<?php echo $event->schedule_details->escaped(); // Already escaped. ?>
	</time>
  
   
   <?php 
          $event_start_date = tribe_get_start_time ( $event_id, 'Y-m-d');

 $event_start_month = tribe_get_start_time ( $event_id, 'F');

$event_end_date = tribe_get_end_time ( $event_id, 'Y-m-d');

$event_end_month = tribe_get_end_time ( $event_id, 'F');

$event_start_time = tribe_get_start_time ( $event_id, 'h:i a');

$event_end_time = tribe_get_end_time ( $event_id, 'h:i a');

if($event_start_date == $event_end_date){
	
  echo '<h2 style ="font-size: 12px">Islamic date:&nbsp;'.getIslamicDate($event_start_date, 1).' &nbsp;'.getIslamicMonth($event_start_month, '2022').'</h2>';
  
}elseif(($event_start_date !== $event_end_date) && ($event_start_month !== $event_end_month)){
  
echo '<h2 style ="font-size: 12px">Islamic date:&nbsp;From&nbsp;'.getIslamicDate($event_start_date, 1).' &nbsp;'.getIslamicMonth($event_start_month, '2022').'- &nbsp;'.getIslamicDate($event_end_date, 1).' &nbsp;'.getIslamicMonth($event_end_month, '2022').'</h2>';  
 }else{
  
echo '<h2 style ="font-size: 12px">Islamic date:&nbsp;From&nbsp;'.getIslamicDate($event_start_date, 1).' &nbsp;'.getIslamicMonth($event_start_month, '2022').'- &nbsp;'.getIslamicDate($event_enddate, 1).' &nbsp;'.getIslamicMonth($event_start_month, '2022').'</h2>';  
 }


echo '<h2 style ="font-size: 12px">From:&nbsp;'.$event_start_time.'&nbsp;-&nbsp;'.$event_end_time.'</h2>';  

 ?>
	<?php $this->template( 'week/mobile-events/day/event/date/recurring', [ 'event' => $event ] ); ?>
</div>