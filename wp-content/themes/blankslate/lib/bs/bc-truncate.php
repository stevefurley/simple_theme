<?php
/**
 * 	Function to strip the posts content. Called within the loop
 *
 * for example <p><?php bc_truncate_posts( 20, false ); ?></p>
 **/
function bc_truncate_posts( $amount, $read_more_link='read more' ) {

	echo balanceTags(wp_trim_words( do_shortcode(get_the_content()), $amount, '…<a href="'.get_permalink().'">'.$read_more_link.'</a>' ), true);

}


/**
 * Same as above but shortens the title
 * for example  <a href="<?php the_permalink(); ?>"><?php echo ShortenText(get_the_title()); ?></a>
 **/

function ShortenText($text) { // Function name ShortenText
  $chars_limit = 26; // Character length
  $chars_text = strlen($text);
  $text = $text." ";
  $text = substr($text,0,$chars_limit);
  $text = substr($text,0,strrpos($text,' '));

  if ($chars_text > $chars_limit)
     { $text = $text."..."; } // Ellipsis
     return $text;
}
