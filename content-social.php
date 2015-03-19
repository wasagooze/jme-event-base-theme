
<?php 
  // get relevant metadata

  $id = get_the_ID();
  $website = get_post_meta( $id, 'attraction_website', true ); 
  $facebook = get_post_meta( $id, 'attraction_facebook', true ); 
  $twitter = get_post_meta( $id, 'attraction_twitter', true);
  $tumblr = get_post_meta($id, 'attraction_tumblr', true);
  $etsy = get_post_meta($id, 'attraction_etsy', true);
  $bandcamp = get_post_meta($id, 'attraction_bandcamp', true);
  $reverb = get_post_meta($id, 'attraction_reverbnation', true);
  $pinterest = get_post_meta($id, 'attraction_pinterest', true);
  $deviantart = get_post_meta($id, 'attraction_deviantart', true);
  $instagram = get_post_meta($id, 'attraction_instagram', true);
?>

<ul class="social">
  <?php if ( $website != '') : ?>
    <li><a href="<?php echo $website; ?>" class="web" rel="me" target="_blank">Website</a></li>
  <?php endif; ?>
  <?php if ( $facebook != '') : ?>
    <li><a href="<?php echo $facebook; ?>" class="fb" rel="me" target="_blank">Facebook</a></li>
  <?php endif; ?>
  <?php if ( $twitter != '') : ?>
    <li><a href="http://twitter.com/<?php echo $twitter; ?>" class="tw" rel="me" target="_blank">Twitter</a></li>
  <?php endif; ?>
  <?php if ( $tumblr != '') : ?>
    <li><a href="http://<?php echo $tumblr; ?>.tumblr.com/" class="tumblr" rel="me" target="_blank">Tumblr</a></li>
  <?php endif; ?>
  <?php if ( $etsy != '') : ?>
    <li><a href="<?php echo $etsy; ?>" class="etsy" rel="me" target="_blank">Etsy</a></li>
  <?php endif; ?>
  <?php if ( $bandcamp != '') : ?>
    <li><a href="<?php echo $bandcamp; ?>" class="bandcamp" rel="me" target="_blank">Bandcamp</a></li>
  <?php endif; ?>
  <?php if ( $reverb != '') : ?>
    <li><a href="<?php echo $reverb; ?>" class="reverb" rel="me" target="_blank">ReverbNation</a></li>
  <?php endif; ?>
  <?php if ( $pinterest != '') : ?>
    <li><a href="<?php echo $pinterest; ?>" class="pinterest" rel="me" target="_blank">Pinterest</a></li>
  <?php endif; ?>
  <?php if ( $deviantart != '') : ?>
    <li><a href="<?php echo $deviantart; ?>" class="deviantart" rel="me" target="_blank">DeviantArt</a></li>
  <?php endif; ?>
   <?php if ( $instagram != '') : ?>
    <li><a href="<?php echo $instagram; ?>" class="instagram" rel="me" target="_blank">Instagram</a></li>
  <?php endif; ?>
</ul>