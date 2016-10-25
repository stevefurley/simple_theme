<?php

//Refers to the original image sizes on the acf fields
$imgLocations = $imgFeild['sizes'];

//select what you would like included in the source set
$thumbnail = $imgLocations['thumbnail'];
$mega = $imgLocations['mega'];
$large  = $imgLocations['large'];

//create the new sourceset
$sourceSet = $thumbnail . ' 400w, ' .  $mega . ' 767w, ' . $large . ' 900w, ';

//No idea very annoying but needs it
$img_src =    wp_get_attachment_image_url( $img, 'large' );
//sets the alt text if available
$img_alt_text = get_post_meta( $img, '_wp_attachment_image_alt', true);

?>

<?php if( $sourceSet ){ ?>

  <img
  class='responsive-image'
  src="<?php echo esc_attr($large); ?>"
  srcset="<?php echo esc_attr( $sourceSet ); ?>"
  sizes="(max-width: 400px) 400px, (max-width: 767px) 767px,(max-width: 900px) 900px,(max-width: 1200px) 1400px"
  alt="<?php echo $img_alt_text ?>"
  />

  <?php } ?>
