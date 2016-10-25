<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" type="text/css" href="/wp-content/themes/blankslate/assets/dist/css/styles.css" />
  <script type="text/javascript" src="/wp-content/themes/blankslate/assets/dist/js/jquery.min.js"></script>
  <script type="text/javascript" src="/wp-content/themes/blankslate/assets/dist/js/slick.min.js"></script>
  <script type="text/javascript" src="/wp-content/themes/blankslate/assets/dist/js/scripts.js"></script>
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/blankslate/assets/dist/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/blankslate/assets/dist/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/blankslate/assets/dist/img/apple-touch-icon-114x114.png">


  <style type="text/css">
  /*-- styling for backgrounbd colors --*/
  .c1 {
    background-color: <?php the_field('body_background_colour', 'option'); ?>;
  }
  .c2{
    background-color: <?php the_field('header_background_colour', 'option'); ?>;
  }
  .c3{
    background-color: <?php the_field('header_menu_link_colours', 'option'); ?>;
  }
  .c4{
    background-color: <?php the_field('footer_background_colour', 'option'); ?>;
  }
  .c5{
    background-color: <?php the_field('below_footer_copyright_background', 'option'); ?>;
  }
  </style>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> class='c1'>
  <!-- body wrapper -->
  <div id="wrapper" class="<?php pageWidth(); ?> no-padding">

    <header id="header" role="banner" class=' c2 island-half overflow'>
      <div class='container'>
        <section id="branding" class='left'>
          <i class="fa fa-blind" aria-hidden="true"></i>
          <div id="site-title"><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?></div>
          <div id="site-description"><?php bloginfo( 'description' ); ?></div>
        </section>
        <nav id="header-menu" role="navigation" class='none block-m right-m'>
          <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </nav>
      </div>
    </header>

    <div id="container" class=' clear '>
