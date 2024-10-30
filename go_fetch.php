<?php
//this is the script that grabs the image from my site and puts it on yours

if ( isset( $_POST['image_num'] ) && is_numeric( $_POST['image_num'] ) ) {	

//"pluginpath.php" contains your upload path. It is recorded from your wordpress admin, but is invisible to public.					

	$img_number  = $_POST[ 'image_num' ];

	$cai_image   = 'http://www.clipartillustration.com/msm_rf_content/' . $img_number . 'thumbnail.jpg';	
	
	$img_to_save = $upload_dir['path'] . '/' . $img_number . '.jpg';	

	copy( $cai_image, $img_to_save );}  else { } ?>