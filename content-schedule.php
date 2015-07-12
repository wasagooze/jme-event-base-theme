<?php


  $location = get_the_terms(get_the_ID(), 'location')[0];
  $day = get_the_terms(get_the_ID(), 'day')[0];
  $start_time = get_the_terms(get_the_ID(), 'start_time')[0];  
  $end_time = get_the_terms(get_the_ID(), 'end_time')[0];

?>

<dl class="schedule-info">  
  <?php if ($location != null): ?>
    <dt class="where">Where:</dt>
    <dd><?php echo $location->name; ?></dd>
  <?php endif; ?>

  <?php if ($day != null): ?>    
    <dt class="when">When:</dt>
    <dd><?php echo $day->name; ?></dd>
  <?php endif; ?>

  <?php if ($start_time != null): ?>
    <dt>Start Time:</dt>
    <dd><?php echo $start_time->name; ?></dd>
  <?php endif; ?>

  <?php if ($end_time != null): ?>
    <dt>End Time:</dt>
    <dd><?php echo $end_time->name; ?></dd>
  <?php endif; ?>

</dl>