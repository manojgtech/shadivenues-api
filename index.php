<<<<<<< HEAD
<?php 
/* 
Plugin Name: ShadiVenues 
Plugin URI: https://e-baba.in/ 
Description: Slider Component for WordPress 
Version: 1.0 
Author: Manoj Kumar  
Author URI: https://e-baba.in/ 
License: GPLv2 or later 

*/

include( plugin_dir_path( __FILE__ ) . 'inc/scripts.php');
include( plugin_dir_path( __FILE__ ) . 'inc/post-type.php');
include( plugin_dir_path( __FILE__ ) . 'inc/metabox.php');
include( plugin_dir_path( __FILE__ ) . 'apis/restapi.php');




    add_action("save_post","savepost_meta");

    function savepost_meta($post_id){
    
     if ( !current_user_can( 'edit_post', $post_id )){
     	return;
     }


if ( isset($_POST['some_custom_gallery']) ) {        
    update_post_meta($post_id, 'some_custom_gallery', sanitize_text_field( $_POST['some_custom_gallery']));      
  } 


     if ( isset($_POST['capacity']) ) {        
    update_post_meta($post_id, 'venue_capacity', sanitize_text_field( $_POST['capacity']));      
  } 

       if ( isset($_POST['fcapacity']) ) {        
    update_post_meta($post_id, 'venue_fcapacity', sanitize_text_field( $_POST['fcapacity']));      
  } 


     if ( isset($_POST['rooms']) ) {        
    update_post_meta($post_id, 'venue_rooms', sanitize_text_field( $_POST['rooms']));      
  } 


  if ( isset($_POST['city']) ) {        
    update_post_meta($post_id, 'venue_city', sanitize_text_field( $_POST['city']));      
  }  


  if ( isset($_POST['location']) ) {        
    update_post_meta($post_id, 'venue_location', sanitize_text_field( $_POST['location']));      
  }  

  if ( isset($_POST['map']) ) {        
    update_post_meta($post_id, 'venue_map', sanitize_text_field( $_POST['map']));      
  } 

  if ( isset($_POST['youtube']) ) {        
    update_post_meta($post_id, 'venue_youtube', sanitize_text_field( $_POST['youtube']));      
  } 
  if ( isset($_POST['pricing']) ) {        
    update_post_meta($post_id, 'venue_pricing', sanitize_text_field( $_POST['pricing']));      
  } 
  if ( isset($_POST['purpose']) ) {        
    update_post_meta($post_id, 'venue_purpose', sanitize_text_field( $_POST['purpose']));      
  } 
  if ( isset($_POST['phone']) ) {        
    update_post_meta($post_id, 'venue_phone', sanitize_text_field( $_POST['phone']));      
  } 
  if ( isset($_POST['email']) ) {        
    update_post_meta($post_id, 'venue_email', sanitize_text_field( $_POST['email']));      
  } 

  if ( isset($_POST['amenities']) ) {    
  $data=serialize($_POST['amenities']);    
    update_post_meta($post_id, 'venue_amenities',$data );      
  } 

  if ( isset($_POST['services']) ) {    
  $data=serialize($_POST['services']);    
    update_post_meta($post_id, 'venue_services',$data );      
  } 
  

    }



    //add scripts

wp_insert_term( "Mini Halls", 'venue_type', array('slug'=>'mini-hall') );
wp_insert_term( "Banquet Halls", 'venue_type', array('slug'=>'banquet') );
wp_insert_term( "Part Halls", 'venue_type', array('slug'=>'party-hall') );
wp_insert_term( "Resorts & Farmhouse", 'venue_type', array('slug'=>'resorts') );

=======
<?php 
/* 
Plugin Name: ShadiVenues 
Plugin URI: https://e-baba.in/ 
Description: Slider Component for WordPress 
Version: 1.0 
Author: Manoj Kumar  
Author URI: https://e-baba.in/ 
License: GPLv2 or later 

*/

include( plugin_dir_path( __FILE__ ) . 'inc/scripts.php');
include( plugin_dir_path( __FILE__ ) . 'inc/post-type.php');
include( plugin_dir_path( __FILE__ ) . 'inc/metabox.php');
include( plugin_dir_path( __FILE__ ) . 'apis/restapi.php');




    add_action("save_post","savepost_meta");

    function savepost_meta($post_id){
    
     if ( !current_user_can( 'edit_post', $post_id )){
     	return;
     }


if ( isset($_POST['some_custom_gallery']) ) {        
    update_post_meta($post_id, 'some_custom_gallery', sanitize_text_field( $_POST['some_custom_gallery']));      
  } 


     if ( isset($_POST['capacity']) ) {        
    update_post_meta($post_id, 'venue_capacity', sanitize_text_field( $_POST['capacity']));      
  } 

       if ( isset($_POST['fcapacity']) ) {        
    update_post_meta($post_id, 'venue_fcapacity', sanitize_text_field( $_POST['fcapacity']));      
  } 


     if ( isset($_POST['rooms']) ) {        
    update_post_meta($post_id, 'venue_rooms', sanitize_text_field( $_POST['rooms']));      
  } 


  if ( isset($_POST['city']) ) {        
    update_post_meta($post_id, 'venue_city', sanitize_text_field( $_POST['city']));      
  }  


  if ( isset($_POST['location']) ) {        
    update_post_meta($post_id, 'venue_location', sanitize_text_field( $_POST['location']));      
  }  

  if ( isset($_POST['map']) ) {        
    update_post_meta($post_id, 'venue_map', sanitize_text_field( $_POST['map']));      
  } 

  if ( isset($_POST['youtube']) ) {        
    update_post_meta($post_id, 'venue_youtube', sanitize_text_field( $_POST['youtube']));      
  } 
  if ( isset($_POST['pricing']) ) {        
    update_post_meta($post_id, 'venue_pricing', sanitize_text_field( $_POST['pricing']));      
  } 
  if ( isset($_POST['purpose']) ) {        
    update_post_meta($post_id, 'venue_purpose', sanitize_text_field( $_POST['purpose']));      
  } 
  if ( isset($_POST['phone']) ) {        
    update_post_meta($post_id, 'venue_phone', sanitize_text_field( $_POST['phone']));      
  } 
  if ( isset($_POST['email']) ) {        
    update_post_meta($post_id, 'venue_email', sanitize_text_field( $_POST['email']));      
  } 

  if ( isset($_POST['amenities']) ) {    
  $data=serialize($_POST['amenities']);    
    update_post_meta($post_id, 'venue_amenities',$data );      
  } 

  if ( isset($_POST['services']) ) {    
  $data=serialize($_POST['services']);    
    update_post_meta($post_id, 'venue_services',$data );      
  } 
  

    }



    //add scripts

wp_insert_term( "Mini Halls", 'venue_type', array('slug'=>'mini-hall') );
wp_insert_term( "Banquet Halls", 'venue_type', array('slug'=>'banquet') );
wp_insert_term( "Part Halls", 'venue_type', array('slug'=>'party-hall') );
wp_insert_term( "Resorts & Farmhouse", 'venue_type', array('slug'=>'resorts') );

>>>>>>> 8325aaa7b856f7a520e67d3726de12cf6ad5de19
 ?>