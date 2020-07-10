<?php 

add_action('admin_enqueue_scripts', 'fwds_scripts');
function fwds_scripts() {

   //https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js
// wp_register_style('boot-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css');
// wp_enqueue_style('boot-css');

wp_register_style('boot-css', plugins_url('js/myplugin.css', __FILE__));
wp_enqueue_style('boot-css');

wp_register_script('form-core', "https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js",array("jquery"));
 wp_enqueue_script('form-core');





}

add_action( 'admin_enqueue_scripts', 'misha_scripts_for_gallery' );
function misha_scripts_for_gallery(){
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-widget');
	wp_enqueue_script('jquery-ui-sortable');
 
	if ( ! did_action( 'wp_enqueue_media' ) )
		wp_enqueue_media();
 
	wp_enqueue_script('my_scripts', '... /my_scripts.js', array('jquery','jquery-ui-sortable') );
	 wp_register_script('slidesjs_core', plugins_url('js/custom-js.js', __FILE__),array("jquery"));
 wp_enqueue_script('slidesjs_core');
}

?>