<?php
  $facebook = '';
  $twitter = '';
  $tumblr = '';
?>

  <ul class="social">
  <?php if ( $facebook != '') : ?>
    <li><a href="<?php echo $facebook; ?>" class="fb" rel="me" target="_blank">Facebook</a></li>
  <?php endif; ?>
  <?php if ( $twitter != '') : ?>
    <li><a href="http://twitter.com/<?php echo $twitter; ?>" class="tw" rel="me" target="_blank">Twitter</a></li>
  <?php endif; ?>
  <?php if ( $tumblr != '') : ?>
    <li><a href="http://<?php echo $tumblr; ?>.tumblr.com/" class="tumblr" rel="me" target="_blank">Tumblr</a></li>
  <?php endif; ?>
  </ul>