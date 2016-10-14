<?php
/**
 * ACF - Custom options page
 */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Global',
        'menu_title'    => 'Global',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Social Accounts',
        'menu_title'    => 'Social',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Contact Details',
        'menu_title'    => 'Contact',
        'parent_slug'   => 'theme-settings',
    ));
}
