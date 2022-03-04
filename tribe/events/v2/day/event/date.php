<?php
/**
 * View: Day View - Single Event Date
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/day/event/date.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @since 4.9.9
 * @since 5.1.1 Move icons into separate templates.
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 * @version 5.1.1
 */
use Tribe__Date_Utils as Dates;

$event_date_attr = $event->dates->start->format( Dates::DBDATEFORMAT );

 $event_id = get_the_ID();
?>
<div class="tribe-events-calendar-day__event-datetime-wrapper tribe-common-b2">
	<?php $this->template( 'day/event/date/featured' ); ?>
	<time class="tribe-events-calendar-day__event-datetime" datetime="<?php echo esc_attr( $event_date_attr ); ?>">
		<?php echo $event->schedule_details->value(); ?>
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
   
	<?php $this->template( 'day/event/date/meta', [ 'event' => $event ] ); ?>
</div>