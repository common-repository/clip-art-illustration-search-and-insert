<?php
function cai_search_results($cai_search_vars){
				//this array will be created from search results for use in pages such as search page and certain ajax results.
				$image_info = array(); 
				//get initial XML results from the main result generating URL
				$search_string = 'http://www.clipartillustration.com//image_search.xml' . $cai_search_vars;
				//convert to XML for reading

				$cai_image_results = simplexml_load_file( $search_string );

			//turn results into PHP array that can be used
			
			foreach($cai_image_results as $cai_image){

			$cai_image_title['title'] = (array)$cai_image -> {'title'}; 
			$cai_image_image_number['image_number'] = (array)$cai_image -> {'image_number'}; 
			$cai_image_alt['alt'] = (array)$cai_image -> {'alt'}; 
			$cai_image_tag['tag'] = (array)$cai_image -> {'tag'}; 
			$cai_image_keywords['keywords'] = (array)$cai_image -> {'keywords'}; 
			$cai_image_description['description'] = (array)$cai_image -> {'description'}; 
			$cai_image_collections['collections'] = (array)$cai_image -> {'collections'}; 
			$cai_image_collection_img['collection_img'] = (array)$cai_image -> {'collection_img'}; 
			$cai_image_related_images['related_images'] = (array)$cai_image -> {'related_images'}; 
			$cai_image_author['author'] = (array)$cai_image -> {'author'}; 
			$cai_image_size_thumb['size_thumb'] = (array)$cai_image -> {'size_thumb'}; 
			$cai_image_size_preview['size_preview'] = (array)$cai_image -> {'size_preview'}; 
			$cai_image_size_bloggee['size_bloggee'] = (array)$cai_image -> {'size_bloggee'}; 
			$cai_image_size_small['size_small'] = (array)$cai_image -> {'size_small'}; 
			$cai_image_size_medium['size_medium'] = (array)$cai_image -> {'size_medium'}; 
			$cai_image_size_large['size_large'] = (array)$cai_image -> {'size_large'}; 
			$cai_image_page_id['page_id'] = (array)$cai_image -> {'page_id'}; 
			$cai_image_permalink['permalink'] = (array)$cai_image -> {'permalink'}; 
			$cai_image_pagination['pagination'] = (array)$cai_image -> {'pagination'}; 
			$cai_image_extensions['extensions'] = (array)$cai_image -> {'extensions'}; 
			
			//tags are a sub-array, so get this ready...
			$tags = array();

			$count = 0;
					//grab all values and plug them into above arrays...
					foreach($cai_image_keywords['keywords'] as $tag){array_push($tags, $tag);	$count++;} 

						$image_info_item = array(
						'title' => $cai_image_title['title'][0],
						'image_number' => $cai_image_image_number['image_number'][0],
						'alt' => $cai_image_alt['image_number'][0],
						'tags' => $tags[0],
						'description' => $cai_image_description['description'][0],
						'collections' => $cai_image_collections['collections'][0],
						'collection_img' => $cai_image_collection_img['collection_img'][0],
						'related_images' => $cai_image_related_images['related_images'][0],
						'author' => $cai_image_author['author'][0],
						'size_thumb' => $cai_image_size_thumb['size_thumb'][0],
						'size_preview' => $cai_image_size_preview['size_preview'][0],
						'size_bloggee' => $cai_image_size_bloggee['size_bloggee'][0],
						'size_small' => $cai_image_size_small['size_small'][0],
						'size_medium' => $cai_image_size_medium['size_medium'][0],
						'size_large' => $cai_image_size_large['size_large'][0],
						'page_id' => $cai_image_page_id['page_id'][0],
						'permalink' => $cai_image_permalink['permalink'][0],
						'pagination' => $cai_image_pagination['pagination'][0]	,
						'extensions' => $cai_image_extensions['extensions'][0]			
						);
							array_push ($image_info, $image_info_item);
						}
				return $image_info;
			}
			
if ( isset( $_POST['init_cai_search'] ) ) {
	
	$search_term = trim( $_POST[ 'init_cai_search' ] );
	
	if ( !empty( $_POST[ 'start_row' ] ) && is_numeric( $_POST[ 'start_row' ] ) ) {
		
		$start_row = $_POST[ 'start_row' ];
		if(!empty($_POST['total_results'])){$total_results = $_POST[ 'total_results' ];} else {unset($_POST['total_results']);}
		
	} //!empty( $_POST[ 'start_row' ] ) && is_numeric( $_POST[ 'start_row' ] )
	

	if ( !empty( $search_term ) ) {
		
		//where we get the pixelized goods...
						
	if(!empty($_POST[ 'start_row' ]) && $_POST[ 'start_row' ]!== 'search_images'){$pagination_params = '&rows=' . $start_row*20 . '-20-' . $total_results;} else {$pagination_params = '';}


		$cai_search_vars = '?keywords=' . urlencode($search_term) . '&msm_network=true' . $pagination_params;
			
		//get images - 
		
	    $images_array = cai_search_results($cai_search_vars);
							
			
		//now display the pictures in an orderly and obedient fashion...
		//set up counter...
		
		$cai_count        = 0;
		
		echo '<div id="cai_results_list">';
		
		//echo '<hr />';
		
		$search_specs = explode( '-', $images_array[0]['pagination'] );
		
		
		$cai_results = $image_array->{'cai_num_results'};
		
				//print_r($cai_results);
				
		$css_        = array();
		
		echo '<div class="cai_showcase_container"><div class="cai_showcase">';
		
		echo '<input type="hidden" id="cai_pagination_num_rows" value="' . $search_specs[1] . '" />';
		echo '<input type="hidden" id="cai_pagination_total_results" value="' . $search_specs[2] . '" />';
				
		foreach ( $images_array as $image ) {
			
			//development: uncomment below to generate css classes for positioning showcase items...	
			/*if($cai_count < 1){$cai_count = 0;} else {}		
			$cai_row_pos = $cai_count*165;			
			$css= '.cai_offset_' . $cai_count . ' {position: absolute;	top: 30px; left: ' . $cai_row_pos . 'px;	}	';
        	array_push($css_, $css);*/
			//we're going to use a counter to set id's for the images, just in case we need the image number amount

			$cai_pic_count = $cai_count;
			

			//define variables from the xlm object...	
			$image_number   = $images_array[$cai_count]['image_number'];
			
			$description    = $images_array[$cai_count]['title'];
			
			$thumbnail_attr = $images_array[$cai_count]['size_thumb'];
			
			$url_path       = $images_array[$cai_count]['permalink'];
			
			$cai_count++;
			
			//produce the image...
			
			if ( $cai_count <= 20 ) {
				
				echo '<div class="cai_offset_' . $cai_pic_count . ' cai_pic_box"><img class="cai_thumb_image" id="cai_' . $cai_count . '" ' . $thumbnail_attr . ' alt="' . $description . '" src="http://www.clipartillustration.com/msm_rf_content/' . $image_number . 'thumbnail.jpg" />';
							
				
				echo '<input type="hidden" id="cai_' . $cai_count . '_permalink" value="' . $url_path . '" /><input type="hidden" id="cai_' . $cai_count . '_num" value="' . $image_number . '" /></div>';
				
			} //$cai_count <= 20

			else {
			}
		} //$image_array as $image
		
		echo '</div></div>';
		
	} //!empty( $search_term )
	
	echo '</div>';
	
	//now we go through the tedious and annoying task of pagination...
	
	echo '<div id="cai_page_nav" class="tablenav"><div class="tablenav-pages">';
	
	echo '<p class="cai_sum_results">Results:' . $search_specs[2] . '</p>';
	$cycle_limit = $search_specs[2] / 20;
	$cycle_count = 0;
	$start_row   = 0;
	while ( $cycle_count <= $cycle_limit ) {

		$start_row++;

		echo '<input class="init_cai_search" type="submit" name="' . $start_row*20 . '" value="' . $cycle_count . '" />';

		$row_calc = $start_row * 20;

		$cycle_count++;

	} //$cycle_count <= $cycle_limit

	echo '</div></div>';

	/*	//development: uncomment below to generate css classes for positioning showcase items...

	foreach ($css_ as $class){

	

	echo $class . '<br />';

	

	}*/

} //isset( $_POST )?>