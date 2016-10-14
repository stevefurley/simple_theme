<?php
/**
 * bc return the protected name
 *
 * @package BC Base Theme
 * @since BC Base Theme 0.0.0
 *
 * @param (str) $protected_page the value given in the post edit screen
 * @return (str) the slug of the page with trailing slash
 */
if( function_exists('get_field')) {

  function bc_get_protected_name_slug( $protected_page, $post_type = 'page' ) {

    $args = array(
      'post_type' => $post_type,
      'meta_query' => array(
        array(
          'key' => 'protected_name',
          'value' => $protected_page,
        ),
      ),
      'fields' => 'ids',
    );
    $protect_name_query = new WP_Query( $args );
    if( $protect_name_query->post_count >= 1 ) :

    $the_parent = trailingslashit(basename(get_permalink($protect_name_query->posts[0])));

    endif;

    return $the_parent;
  }


  /**
 * bc return the protected name query obj
 *
 * @package bc
 * @since bc 3.0.0
 *
 * @param (str) $protected_page the value given in the post edit screen
 * @return (str) the query obj for loop in templates
 */
  function bc_get_protected_name_query_obj( $protected_page, $post_type = 'page' ) {

    $args = array(
      'post_type' => $post_type,
      'meta_query' => array(
        array(
          'key' => 'protected_name',
          'value' => $protected_page,
        ),
      ),
    );
    $protect_name_query = new WP_Query( $args );
    if ( false != $protect_name_query->have_posts() )
    {
      return $protect_name_query;
    }

    return false;
  }

  /**
 * Automatio tempalte loading for posts that have a protected name and 
 * a matching template file in the custom directory
 */
  function site_create_custom_templating( $template ) {

    $title = false;

    if( is_post_type_archive() ) :

    $post_type = get_post_type();        
    $post_type_obj = get_post_type_object( $post_type );    

    $protected = bc_get_protected_name_query_obj( $post_type_obj->labels->name, 'page' );

    if( false != $protected ) :
    $title = get_field( 'protected_name', $protected->post->ID );
    endif;

    elseif( is_home() ) :

    $page_for_posts_id = get_option('page_for_posts' );
    $title = get_field( 'protected_name', $page_for_posts_id );

    elseif( is_singular() ) :

    $title =  get_field( 'protected_name' );

    endif;


    if( false != $title ) :            

    $new_template = locate_template( array( 'templates/custom-pages/'.sanitize_title($title).'.php' ) );

    if ( false != $new_template ) :
    return $new_template ;
    endif;

    endif;

    return $template;
  }
  add_action( 'template_include', 'site_create_custom_templating' );
}
