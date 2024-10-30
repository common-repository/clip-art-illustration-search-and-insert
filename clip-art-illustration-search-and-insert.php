<?php



/*



Plugin Name: Free Clip Art Illustration Image Search / Insert



Plugin URI: http://www.clipartillustration.com/wordpress-plugin-free-clip-art-illustration-search-from-clipartillustration-com/



Description: Searches for and inserts illustrations to your post. Images are from ClipArtIllustration.com. Streamlined/animated jQuery interface helps you find your images fast, then click-insert to post with desired alignment. Fun to use.



Author: Leo Blanchette



Version: 1.8



Author URI: http://www.clipartillustration.com



License: GPL2







*/



//Special thanks to Rilwis of http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html. His tutorial really helped get this thing off the ground.



//get custom CSS:



//set paths to CSS



function admin_register_head()



{



	$siteurl = get_option( 'siteurl' );



	$urlcss  = $siteurl . '/wp-content/plugins/' . basename( dirname( __FILE__ ) ) . '/styles.css';



	echo "<link rel='stylesheet' type='text/css' href='$urlcss' />\n\n";



}



//set up jQuery



wp_enqueue_script( 'myscript', '/wp-content/plugins/' . basename( dirname( __FILE__ ) ) . '/js.js', array(



	 'jquery' 



), '1.0', true );



// register in admin area...



add_action( 'admin_head', 'admin_register_head' );



$cai_meta_box = array(



	 'id' => 'cai-meta-box',



	'title' => 'Clip Art Illustration and Image Finder',



	'page' => 'post',



	'wp_page' => 'page',



	'context' => 'normal',



	'priority' => 'high',



	'fields' => array ()



);



//we are going to use WP ajax system.



add_action( 'wp_ajax_init_cai_search', 'fetch_pics' );



add_action( 'wp_ajax_fetch_pic', 'go_fetch' );



function fetch_pics()



{



	include( 'fetch_pics.php' );



	die();



}



function go_fetch()



{



	$upload_dir = wp_upload_dir();

	

	include( 'go_fetch.php' );



	die();



}



// Add the meta box



add_action( 'admin_menu', 'cai_add_box' );



function cai_add_box()



{



	global $cai_meta_box;



	add_meta_box( $cai_meta_box['id'], $cai_meta_box['title'], 'cai_show_box', $cai_meta_box['wp_page'], $cai_meta_box['context'], $cai_meta_box['priority'] );



	add_meta_box( $cai_meta_box['id'], $cai_meta_box['title'], 'cai_show_box', $cai_meta_box['page'], $cai_meta_box['context'], $cai_meta_box['priority'] );



}



function cai_show_box()



{



	$cai_basename    = basename( dirname( __FILE__ ) );



	$cai_go_fetch    = '/wp-content/plugins/' . basename( dirname( __FILE__ ) ) . '/go_fetch.php';



	$cai_server_path = WP_PLUGIN_DIR . '/' . str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) );



	$cai_plugin_dir  = '/wp-content/plugins/' . basename( dirname( __FILE__ ) );



	$upload_dir = wp_upload_dir();





	include_once( 'box_structure.php' );



	echo '<div id="content1"><div id="cai_content_results">';





}



?>