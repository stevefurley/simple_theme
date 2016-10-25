<?php get_header(); ?>
<section id="content" role="main">
  <?php

// check if the flexible content field has rows of data
if( have_rows('flexible_content') ):

     // loop through the rows of data
    while ( have_rows('flexible_content') ) : the_row();

        if( get_row_layout() == 'slider' ):

        	include locate_template('templates/flexible-content/slider.php');


        elseif( get_row_layout() == 'download' ):

        	$file = get_sub_field('file');

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>
<div class='container'>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'entry' ); ?>
  <?php comments_template(); ?>
  <?php endwhile; endif; ?>
  <?php get_template_part( 'nav', 'below' ); ?>
</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
  //Need to provide the field and id to make responsive images work then include the template
  $imgFeild = get_field('homepage_image');
  $img = $imgFeild['id'];

  include locate_template('templates/images/six-nine.php');
  ?>
