<?php
add_action( 'rest_api_init', function () {
	register_rest_route( 'venues/v1', '/list', array(
		'methods' => 'GET',
		'callback' => 'getVenues',
	) );
} );

 function getVenues($data){
      $jobs=new WP_Query(array('post_type'=>'venue','posts_per_page'=>20));
$posts=array();
if($jobs->have_posts()){

      while($jobs->have_posts()){
$jobs->the_post();
//$skills=get_the_terms(get_the_ID(),'skill');
$cats=get_the_terms(get_the_ID(),'venue_type');
$catdata="";
if($cats){
foreach($cats as $cat){ 
   $catdata=$catdata.",".$cat->name;

  }
}else{
  $catdata="not";
}


 
    $prod=array();
    $prod['id']=get_the_ID();
    $prod['title']=get_the_title();
     $image =wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'full' );
    
    $prod['image']=$image[0];
    $prod['address']=get_post_meta(get_the_ID(),"venue_city",true);
   // $prod['purpose']=get_post_meta(get_the_ID(),"venue_purpose",true);
    $prod['capacity']=get_post_meta(get_the_ID(),"venue_capacity",true);
   // $prod['email']=get_post_meta(get_the_ID(),"venue_email",true);
    

   // $prod['exp']=get_field('experience',get_the_ID());
    
   // $prod['date']=get_the_date();
   // $prod['content']=get_the_excerpt();
    //$prod['category']=trim($catdata,",");
   
    $posts[]=$prod;
    }
    return $posts;
  }
     
}
 //post by id

add_action( 'rest_api_init', function () {
  register_rest_route( 'venues/v1', '/venue-details', array(
    'methods' => 'GET',
    'callback' => 'getVenue',
  ) );
} );

 function getVenue($data){
     if(!isset($_GET['id'])){
       return array('status'=>422);
     }
     $id=$_GET['id'];
      $jobs=new WP_Query(array('post_type'=>'venue','p'=>$id));
$posts=array();
if($jobs->have_posts()){

      while($jobs->have_posts()){
$jobs->the_post();
//$skills=get_the_terms(get_the_ID(),'skill');
$cats=get_the_terms(get_the_ID(),'venue_type');
$catdata="";
foreach($cats as $cat){ 
   $catdata=$catdata.",".$cat->name;

  }


 
    $prod=array();
    $prod['id']=get_the_ID();
    $prod['about']=get_the_content();
    $prod['title']=get_the_title();
    $prod['image']=get_the_post_thumbnail( get_the_ID(), 'full' );
    $prod['address']=get_post_meta(get_the_ID(),"venue_location",true);
    $prod['purpose']=get_post_meta(get_the_ID(),"venue_purpose",true);
    $prod['phone']=get_post_meta(get_the_ID(),"venue_phone",true);
     $prod['capacity']=get_post_meta(get_the_ID(),"venue_capacity",true);
       $prod['fcapacity']=get_post_meta(get_the_ID(),"venue_fcapacity",true);
         $prod['youtube']=get_post_meta(get_the_ID(),"venue_youtube",true);
           $prod['rooms']=get_post_meta(get_the_ID(),"venue_rooms",true);
    $prod['email']=get_post_meta(get_the_ID(),"venue_email",true);
    $imgs=explode(",",get_post_meta(get_the_ID(),"some_custom_gallery",true));
     $images=array();
     foreach($imgs as $k){
      //print_r(wp_get_attachment_url($k));
      if(wp_get_attachment_url($k)){
      $images[]=wp_get_attachment_url($k);
       }
     }
      $prod['gallery']=$images;
      $prod['amenities']=unserialize(get_post_meta(get_the_ID(),"venue_amenities",true));
      $prod['services']=unserialize(get_post_meta(get_the_ID(),"venue_services",true));
      $prod['map']=get_post_meta(get_the_ID(),"venue_map",true);
      $prod['pricing']=get_post_meta(get_the_ID(),"venue_pricing",true);
      $prod['date']=get_the_date();
   // $prod['content']=get_the_excerpt();
      $prod['category']=trim($catdata,",");
   
    $posts=$prod;
    }
    return $posts;
  }
     
}





?>