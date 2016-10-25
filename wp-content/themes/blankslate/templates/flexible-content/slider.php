<?php $slider_options = get_sub_field('slider_options');
debug($slider_options);
$pageWidth = 'container';
if(in_array('full', $slider_options)) {
  $pageWidth = '';
}
?>
<div class='<?php echo $pageWidth;?>'>
  <?php if( have_rows('add_new_slides') ): ?>

    <div class="slider-container">

      <?php while( have_rows('add_new_slides') ): the_row();

      // vars

      $slider_title = get_sub_field('slider_title');
      $slider_image = get_sub_field('slider_image');
      $slider_description = get_sub_field('slider_description');

      ?>
      <div class='my-content'>
        <img src='<?php print $slider_image['sizes']['slider']; ?>'>
      </div>
    <?php endwhile; ?>

  </div>
</div>
<?php endif; ?>
