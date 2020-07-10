<?php

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'venue_gallery', 'Venue Required Fields', 'cd_meta_box_cb', 'venue', 'normal', 'high' );
}


function misha_gallery_field( $name, $value = '' ) {
 
	$html = '<div><ul class="misha_gallery_mtb">';
	/* array with image IDs for hidden field */
	$hidden = array();
 
 
	if( $images = get_posts( array(
		'post_type' => 'attachment',
		'orderby' => 'post__in', /* we have to save the order */
		'order' => 'ASC',
		'post__in' => explode(',',$value), /* $value is the image IDs comma separated */
		'numberposts' => -1,
		'post_mime_type' => 'image'
	) ) ) {
 
		foreach( $images as $image ) {
			$hidden[] = $image->ID;
			$image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
			//$image_src="\'$image_src[0]\'";
			$html .= '<li data-id="' . $image->ID .  '" class="gallery-item"><img src="' .$image_src[0].'"></span><a href="#" class="misha_gallery_remove">×</a></li>';
		}
 
	}
 
	$html .= '</ul><div style="clear:both"></div></div>';
	$html .= '<input type="hidden" name="'.$name.'" value="' . join(',',$hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';
 
	return $html;
}

function cd_meta_box_cb()
{


	global $post;
	$status=$post->post_status;
	$ID=$post->ID;
   
    ?>




<div class="row">
	<div class="panel panel-default bootform">
		


 <form method="post" enctype="multipart/form-data">
  <div class="col-md-12">

<?php

  $meta_key = 'some_custom_gallery';
	echo misha_gallery_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );

 
 ?>

  
  </div>
  <div class="col-md-12">
  	<label>People Sitting Capacity  </label>
      <input type="number" class="form-control" id="capacity" name="capacity" value="<?php echo get_post_meta($ID,'venue_capacity') ? get_post_meta($ID,'venue_capacity',true) :'';  ?>"  required multiple placeholder="Capacity of Venue"/>
  </div>
  <div class="col-md-12">
  	<label>People Floating Capacity  </label>
      <input type="number" class="form-control" id="capacity" name="fcapacity" value="<?php echo get_post_meta($ID,'venue_fcapacity') ? get_post_meta($ID,'venue_fcapacity',true) :'';  ?>"  required multiple placeholder="Capacity of Venue"/>
  </div>
  <div class="col-md-12">
  	<label>No of Rooms  </label>
      <input type="number" class="form-control" id="capacity" name="rooms" value="<?php echo get_post_meta($ID,'venue_rooms') ? get_post_meta($ID,'venue_rooms',true) :'';  ?>"  required multiple placeholder="No of Rooms"/>
  </div>

  <div class="col-md-12">
  	<label>City </label>
     

     <input type="text" class="form-control" id="city" name="city" value="<?php echo get_post_meta($ID,'venue_city') ? get_post_meta($ID,'venue_city',true) :'';  ?>"  required multiple placeholder="City"/>
  </div>
  <div class="col-md-12">
  	<label>Location </label>
     

      <?php 
     $txt=get_post_meta($ID,'venue_location') ? get_post_meta($ID,'venue_location',true) :'';
  	wp_editor( $txt, "location" ,array('teeny'=>true,'default_editor'=>true,'media_buttons'=>false)); ?>
  </div>
<div class="col-md-12">
  	<label>Map Url </label>
      <input type="url" class="form-control" id="loc" name="map" value="<?php echo get_post_meta($ID,'venue_map') ? get_post_meta($ID,'venue_map',true) :'';  ?>"  required multiple placeholder="Google Map Url"/>
  </div>

  <div class="col-md-12">
  	<label>Venue Video Url </label>
      <input type="url" class="form-control" id="loc" name="youtube" value="<?php echo get_post_meta($ID,'venue_youtube') ? get_post_meta($ID,'venue_youtube',true) :'';  ?>"  required multiple placeholder="Video Url"/>
  </div>

  <div class="col-md-12">
  	<label>Food Type and Pricing  </label>
      
      <?php 
     $txt=get_post_meta($ID,'venue_pricing') ? get_post_meta($ID,'venue_pricing',true) :'';
  	wp_editor( $txt, "pricing" ,array('teeny'=>true,'default_editor'=>true,'media_buttons'=>false)); ?>
  </div>
  <div class="col-md-12">
  	<label>Suitable For </label>
  	<?php 
     $txt=get_post_meta($ID,'venue_purpose') ? get_post_meta($ID,'venue_purpose',true) :'';
  	wp_editor( $txt, "purpose" ,array('teeny'=>true,'default_editor'=>true,'media_buttons'=>false)); ?>

  </div>
  <div class="col-md-12">
  	<label>Amenities </label> 
  	<?php 
     $values=unserialize(get_post_meta($ID,'venue_amenities',true));
if(!$values){
       	$values=array();
       }

  	  ?>
<label class="container">AC
  <input type="checkbox" class="form-control" id="rooms1" <?php if(in_array("AC", $values)) { echo "checked"; } ?> name="amenities[]" multiple value="AC"/>
  <span class="checkmark"></span>
</label>

<label class="container">Catering
  <input type="checkbox" class="form-control" id="rooms2" name="amenities[]" <?php if(in_array("Catering", $values)) { echo "checked"; } ?> multiple value="Catering"/>
  <span class="checkmark"></span>
</label>

<label class="container">Stage
  <input type="checkbox" class="form-control" id="rooms2o" name="amenities[]" <?php if(in_array("Stage", $values)) { echo "checked"; } ?> multiple value="Stage"/>
  <span class="checkmark"></span>
</label>
<label class="container">Decor
  <input type="checkbox" class="form-control" id="rooms2" name="amenities[]" <?php if(in_array("Decor", $values)) { echo "checked"; } ?> multiple value="Decor"/>
  <span class="checkmark"></span>
</label>
<label class="container">Wifi
  <input type="checkbox" class="form-control" id="rooms34" name="amenities[]" <?php if(in_array("Wifi", $values)) { echo "checked"; } ?> multiple value="Wifi"/>
  <span class="checkmark"></span>
</label>
<label class="container">Screen
  <input type="checkbox" class="form-control" id="rooms35" name="amenities[]" <?php if(in_array("Screen", $values)) { echo "checked"; } ?> multiple value="Screen"/>
  <span class="checkmark"></span>
</label>


  </div>
 <div class="col-md-12">
  	<label>Services </label>

	<?php 
     $values=unserialize(get_post_meta($ID,'venue_services',true));
       if(!$values){
       	$values=array();
       }
  	  ?>
  	<label class="container">Parking
  <input type="checkbox" class="form-control" id="rooms88" name="services[]" <?php if(in_array("Parking", $values)) { echo "checked"; } ?> multiple value="Parking"/>
  <span class="checkmark"></span>
</label>
<label class="container">DJ
  <input type="checkbox" class="form-control" id="rooms89" name="services[]" <?php if(in_array("DJ", $values)) { echo "checked"; } ?> multiple value="DJ"/>
  <span class="checkmark"></span>
</label>
<label class="container">Photography
  <input type="checkbox" class="form-control" id="rooms90" name="services[]" multiple <?php if(in_array("Photography", $values)) { echo "checked"; } ?> value="Photography"/>
  <span class="checkmark"></span>
</label>
<label class="container">Bar
  <input type="checkbox" class="form-control" id="rooms09" name="services[]" <?php if(in_array("Bar", $values)) { echo "checked"; } ?> multiple value="Bar"/>
  <span class="checkmark"></span>
</label>
</div>
<div class="col-md-12">
  	<label>Contact Phone </label>
      <input type="text" class="form-control" id="rooms880" value="<?php echo get_post_meta($ID,'venue_phone') ? get_post_meta($ID,'venue_phone',true) :'';  ?>" name="phone"  required multiple placeholder="Phone"/>
  </div>

  <div class="col-md-12">
  	<label>Contact Email </label>

      <input type="email" class="form-control" id="rooi" name="email" value="<?php echo get_post_meta($ID,'venue_email') ? get_post_meta($ID,'venue_email',true) :'';  ?>"  required multiple placeholder="Email"/>
  </div>
  


  
 
 </form>
 </div>
 
 </div>

    <?php  
}
?>