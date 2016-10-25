<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$joinsargs = array(
  'post_type' => 'joined',
  'post_status' => 'publish',
  'posts_per_page' => 18,
  'paged' => $paged,
  'orderby' => 'title',
  'order'   => 'ASC',
);



$we_are_f_rated_main_text = get_field('we_are_f_rated_main_text');

?>

<?php get_header(); ?>

<!--  main -->
<main role="main">
  <!-- Header section -->
  <?php get_template_part('templates/section-highlighted'); ?>
  <!-- /section -->

  <!-- film cats section -->
  <section>
    <div class="row">
      <div class="col-12 island-top island-quatcolor text-center">
        <?php if($we_are_f_rated_main_text):?>

          <h2 class="island-bottom-half"><?php echo $we_are_f_rated_main_text; ?></h2>
        <?php endif; ?>
        <div class="row more-content">
          <div class='results overflow'>
            <?php

            $wp_query = new WP_Query($joinsargs);
            if( $wp_query->have_posts() ) :

              ?>
              <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <?php
                $sizes  = set_sizes_small($post->ID);
                $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                $img_src = wp_get_attachment_image_url($post_thumbnail_id, 'small' );

                ?>
                <div class="col-12 col-6-m col-4-l teaser">

                  <span class="overlay"></span>

                  <img src="/<?php echo esc_url( $img_src ); ?>" style="width:100%"
                  srcset="<?php echo esc_attr( $sizes ); ?>">
                  <div class="title">
                    <h3><?php the_title(); ?></h3>
                  </div>
                </div>


              <?php endwhile; ?>
            </div>

            <div class='max-pages none '>
              <?php $number_of_pages = $wp_query->max_num_pages; ?>
              <?php echo $wp_query->max_num_pages;?>
            </div>
            <?php if($number_of_pages > 1):?>
              <a class='center-element block island clear load-more text-center' href='<?php echo $current_url="//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>page/1/'>Load More</a>
            <?php endif; ?>
          <?php endif; wp_reset_query(); ?>

        </div>
      </div>
    </div>
  </section>
  <!-- /section -->


</main>


<?php get_footer(); ?>
