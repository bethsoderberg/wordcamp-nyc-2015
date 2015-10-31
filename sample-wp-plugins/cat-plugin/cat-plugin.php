<?php
/*
Plugin Name: Plugin for All Cats Are Awesome
Plugin URI: http://www.slideshare.net/bethsoderberg
Description: This plugin handles non-theme related custom functionality.
Author: Beth Soderberg, CHIEF
Author URI: http://agencychief.com
Version: 1.0
*/


/*
 * Disable Deactivation of Vital Plugins
 */

// add_filter( 'plugin_action_links', 'kitten_disable_plugin_actions', 10, 4 );

// function kitten_disable_plugin_actions( $actions, $plugin_file, $plugin_data, $context ) {

//   // removes edit link for all plugins
//   if ( array_key_exists( 'edit', $actions ) )
//     unset( $actions['edit'] );

//   // removes deactivate link for selected plugins
//   $plugins = array( 'advanced-custom-fields/acf.php' );

//   if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, $plugins ))
//     unset( $actions['deactivate'] );
//   return $actions;
// }
 

/*
 * Removing Dashboard Widgets
 */

// function kitten_dashboard_widgets() {
//   remove_meta_box(
//     'dashboard_quick_press', // ID of element to remove
//     'dashboard', // type of screen
//     'side' // context
//   );
// }

// add_action( 'wp_dashboard_setup', 'kitten_dashboard_widgets' );


/*
 * Adding Dashboard Widgets
 */

// function kitten_db_widget_content( $post, $callback_args ) {
//   echo "I'm a dashboard widget!"; // widget content
// }

// function kitten_add_db_widgets() {
//   wp_add_dashboard_widget(
//     'dashboard_widget', // ID of element
//     'Our Shiny Dashboard Widget', // widget name
//     'kitten_db_widget_content' // callback to function that displays content
//   );
// }

// add_action('wp_dashboard_setup', 'kitten_add_db_widgets' );


/*
 * Removing Top Level Menu Items
 */

// function kitten_remove_menus(){
//   remove_menu_page( 'edit.php' );                   //Posts
//   remove_menu_page( 'edit-comments.php' );          //Comments
//   remove_menu_page( 'themes.php' );                 //Appearance
//   remove_menu_page( 'plugins.php' );                //Plugins
//   remove_menu_page( 'users.php' );                  //Users
//   remove_menu_page( 'tools.php' );                  //Tools
//   remove_menu_page( 'options-general.php' );        //Settings
// }

// add_action( 'admin_menu', 'kitten_remove_menus' );

/*
 * Removing Second Level Menu Items
 */

// function kitten_remove_submenus() {
//   remove_submenu_page( 
//     'index.php', // menu slug
//     'index.php' // submenu slug
//   );
//   remove_submenu_page( 
//     'index.php', 
//     'update-core.php' 
//   );
// }

// add_action( 'admin_menu', 'kitten_remove_submenus', 999 );


/*
 * Adding Menu Items
 */

// function kitten_add_home_to_menu() {
//   $homepage_id = get_option( 'page_on_front' );
//   add_menu_page(
//     'Homepage', // page title
//     'Homepage', // menu title
//     'edit_pages', // user capability
//     'post.php?post=' . $homepage_id . '&action=edit', // menu slug
//     false, // don't need a callback function since the page already exists
//     'dashicons-admin-home', // menu icon
//     4 // menu position - right below dashboard
//   );
// }

// add_action( 'admin_menu', 'kitten_add_home_to_menu' );


/*
 * Remove the Things that will Never be Used
 */

function kitten_remove_extras() {
  remove_post_type_support( 
    'page', // post type
    'comments' // feature being removed
  );
}

add_action( 'init', 'kitten_remove_extras' );


/*
 * Remove Contextual Help Tab
 */

// function kitten_remove_contextual_help() {
//   $screen = get_current_screen();
//   $screen->remove_help_tabs();
// }

// add_action( 'admin_head', 'kitten_remove_contextual_help' );


/* 
 * Explain the Featured Image Metabox
 */

// add_filter( 'admin_post_thumbnail_html', 'kitten_explain_featured_image');

// function kitten_explain_featured_image( $content ) {
//   return $content .= '<p>The Featured Image will be associated with this content throughout 
//   the website. Click the link above to add or change the image for this post. </p>';
// }


/* 
 * Remove Unneeded Editor Options
 */

// function kitten_remove_color_button($buttons) {
//   $remove = 'forecolor'; //Remove text color selector
  
//   if ( ( $key = array_search($remove,$buttons) ) !== false )
//     unset($buttons[$key]);//Find the array key and then unset
  
//   return $buttons;
// }

// add_filter('mce_buttons_2','kitten_remove_color_button');

/*
 * Add New Editor Styles - Style Button
 */

// function kitten_add_style_button($buttons) {
//   array_unshift($buttons, 'styleselect'); //Add style selector to the toolbar
//   return $buttons;
// }

// add_filter('mce_buttons_2','kitten_add_style_button');


/*
 * Add New Editor Styles - Custom Styles
 */

// function kitten_insert_style_formats( $init_array ) {  
//   $style_formats = array(  
//     array(  
//       'title' => 'Intro', // label 
//       'block' => 'span', // HTML wrapper 
//       'classes' => 'intro', // class
//       'wrapper' => true, // does it have a wrapper?
//     ), // Each array child has it's own settings
//   );  
  
//   $init_array['style_formats'] = json_encode( $style_formats ); // Insert array into 'style_formats'
  
//   return $init_array;  
// } 

// add_filter( 'tiny_mce_before_init', 'kitten_insert_style_formats' );


/*
 * Add new Quick Tags to the Text Editor
 */

/*function kitten_add_quicktags() {
  if (wp_script_is('quicktags')){
    ?>
      <script type="text/javascript">
        QTags.addButton( 'eg_paragraph', 'p', '<p>', '</p>', 'p', 'Paragraph tag', 1 );
        QTags.addButton( 'eg_hr', 'hr', '<hr />', '', 'h', 'Horizontal rule line', 201 );
        QTags.addButton( 'eg_pre', 'pre', '<pre lang="php">', '</pre>', 'q', 'Preformatted text tag', 111 );
      </script>
    <?php
  }
}

add_action( 'admin_print_footer_scripts', 'kitten_add_quicktags' );*/


/*
 * Register Cat Custom Post Type & Set Custom Post Type Labels
 */

function add_kitten_post_type() {
  $labels = array(
    'name'               => __( 'Cats', 'post type general name' ),
    'singular_name'      => __( 'Cat', 'post type singular name' ),
    'menu_name'          => __( 'Cats', 'admin menu' ),
    'name_admin_bar'     => __( 'Cat', 'add new on admin bar' ),
    'add_new'            => __( 'Add New', 'cat' ),
    'add_new_item'       => __( 'Add New Cat' ),
    'new_item'           => __( 'New Cat' ),
    'edit_item'          => __( 'Edit Cat' ),
    'view_item'          => __( 'View Cat' ),
    'all_items'          => __( 'All Cats' ),
    'search_items'       => __( 'Search Cats' ),
    'parent_item_colon'  => __( 'Parent Cats:' ),
    'not_found'          => __( 'No cats found.' ),
    'not_found_in_trash' => __( 'No cats found in Trash.' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_admin_bar'  => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'cat' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 17,
    'menu_icon'          => 'dashicons-heart',
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );

  register_post_type( 'cats', $args );
}

add_action( 'init', 'add_kitten_post_type' );

/*
 * Register Cat Custom Post Type & Set Custom Post Type Labels
 */
function kitten_title_text_input ( $title ) {
  if ( get_post_type() == 'cats' ) {
    $title = __( 'Enter cat name here' );
  }
  
  return $title;
}

add_filter( 'enter_title_here', 'kitten_title_text_input' );


/*
 * Modify Footer Branding - Replace "Thank you for creating with WordPress"
 */

// function kitten_footer_admin_left () { 
//   echo 'Made for you by <a href="http://agencychief.com">CHIEF</a>'; 
// } 
 
// add_filter('admin_footer_text', 'kitten_footer_admin_left');


/*
 * Modify Footer Branding - Remove version number
 */

// function kitten_footer_admin_right() {
//   remove_filter( 'update_footer', 'core_update_footer' ); 
// }

// add_action( 'admin_menu', 'kitten_footer_admin_right' );


/*
 * Remove WordPress Logo From Header
 */

// function kitten_remove_admin_logo( $wp_admin_bar ) {
//   $wp_admin_bar->remove_node( 'wp-logo' );
// }

// add_action( 'admin_bar_menu', 'kitten_remove_admin_logo', 11 );

