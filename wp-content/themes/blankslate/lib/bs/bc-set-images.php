<?php
/**
 * BC Responsive Images
 *
 * Settings for media uploads and content extensions to take advantage of responsive images
 *
 * --- EXAMPLE ---
 * <?php
 * $image = get_field('image');
 * $img_src = wp_get_attachment_image_url( $image['id'], '' );
 * $img_srcset = wp_get_attachment_image_srcset( $image['id'], '' );
 * ?>
 * <img src="<?php echo esc_url( $img_src ); ?>"
 * srcset="<?php echo esc_attr( $img_srcset ); ?>"
 * sizes="(max-width: 480px) 100vw, (max-width: 768px) 100vw, (max-width: 1024px) 100vw, (max-width: 1280px) 100vw" alt="<?php echo $image['alt']; ?>">
 *
 *
 */

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
  $width = $size[0];
  840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
  if ( 'page' === get_post_type() ) {
    840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
  } else {
    840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
    600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
  }
  return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 100vw, (max-width: 909px) 100vw, (max-width: 984px) 100vw, (max-width: 1362px) 100vw';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 480px) 100vw, (max-width: 768px) 100vw, (max-width: 1024px) 100vw, (max-width: 1280px) 100vw';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

// function responsive_bg_img($bg_img = '') {
//   global $_wp_additional_image_sizes;
//   $srcset = $bg_img['sizes'];
//   $img_sizes = [];
//
//   foreach ($_wp_additional_image_sizes as $key => $value) {
//     $img_sizes[] = $key;
//   }
//
//   foreach ($srcset as $key => $value) {
//     //debug($key);
//     if ( in_array($key, $img_sizes ) == TRUE ) {
//       debug($value);
//     }
//   }
//
//   //debug($img_sizes);
//
//   //debug($srcset);
//   //  debug($srcset);
//
//   foreach( $image_data['sized_imagery'] AS $break_name => $img_set ) :
//
//     echo 'data-' . $break_name . '="' . $img_set['src'] . '"';
//
//   endforeach;
// }
