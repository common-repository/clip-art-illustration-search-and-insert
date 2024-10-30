// JavaScript Document

//first, kill the ENTER key's form submit so ajax can do its job when search button is clicked...

jQuery('#cai_text').bind('keypress', function (e) {

    if (e.keyCode == 13) {

        return false;

    }



});



jQuery(function () {



    var cai_plugin_dir = jQuery('#cai_plugin_dir').val();



    //delete default text in text area on click. (Text area is used because <inputs ... /> mess up ajax when enter is pushed).



    jQuery('#cai_text').focus(function () {



        jQuery(this).val('');



    });



    //this is our AJAX system for fetching search results...



    jQuery('#cai_image_box_plugin .init_cai_search').live('click', function () {



        jQuery('#content1').append('<img alt="loading" src="' + cai_plugin_dir + '/images/ajax-loader.gif" id="cai_loading" />');



        var cai_search_term = jQuery('#cai_text').val();


        var cai_img_path = jQuery('#cai_img_path').val();


		var cai_pagination_num_rows = jQuery('#cai_pagination_num_rows').val();
		
		
		var cai_pagination_total_results = jQuery('#cai_pagination_total_results').val();


        var cai_start_row = jQuery(this).val();



        jQuery('#cai_page_nav').remove();



        jQuery('#cai_results_list').remove();



        var data = {



            action: 'init_cai_search',



            init_cai_search: cai_search_term,



            cai_img_path: cai_img_path,



            start_row: cai_start_row,
			
			
			total_results: cai_pagination_total_results,



        }



        jQuery.post(ajaxurl, data, function (result) {



            jQuery('#cai_content_results').append(result);



            jQuery('#cai_loading').remove();



        });



        return false;



    });



});



//change pointer when hovering over slider controls...



//set slider rules for showcase...



jQuery('#cai_slider_control_right').bind('mouseover mouseout', function (event) {



    if (event.type == 'mouseover') {



        jQuery(this).stop().animate({



            "right": "-8px"



        }, 'fast');



    } else {



        jQuery(this).stop().animate({



            "right": "0px"



        }, 'fast');



    }



});



jQuery('#cai_slider_control_left').bind('mouseover mouseout', function (event) {



    if (event.type == 'mouseover') {



        jQuery(this).stop().animate({



            "left": "-8px"



        }, 'fast');



    } else {



        jQuery(this).stop().animate({



            "left": "0px"



        }, 'fast');



    }



});



jQuery('#cai_slider_control_right').live('hover', function () {



    jQuery('.cai_showcase').stop().animate({



        left: '+=100px'



    }, 1500);



});



jQuery('#cai_slider_control_left').live('hover', function () {



    jQuery('.cai_showcase').stop().animate({



        left: '-=100px'



    }, 1500);



});



jQuery('#cai_slider_control_right').live('click', function () {



    jQuery('.cai_showcase').stop().animate({



        left: '+=300px'



    }, 700);



    jQuery(this).unbind('mouseleave');



});



jQuery('#cai_slider_control_left').live('click', function () {



    jQuery('.cai_showcase').stop().animate({



        left: '-=300px'



    }, 700);



});



//end slider rules



//OPTIONS menue collapse and open



jQuery('.options_drawer table').bind('mouseover mouseout', function (event) {



    if (event.type == 'mouseover') {



        jQuery('.options_drawer').stop().animate({



            "left": "0px",

			"height": "80px",



        }, 'fast');

		

    } else {

        jQuery('.options_drawer').stop().animate({

			

			"height": "28px",

            "left": "-452px",

			



        }, 'fast');



    }



});







jQuery(document).ready(function () {



    jQuery('.cai_thumb_image').live('mouseover mouseout', function (event) {



        if (event.type == 'mouseover') {



            jQuery(this).stop().animate({



                "opacity": "1.0",



                "top": "-30px"



            }, "100");



        } else {



            jQuery(this).stop().animate({



                "opacity": "0.5",



                "top": "0px"



            }, "500");



        }



    });



    jQuery(function () {



        //clicked images go to editor:



        jQuery('.cai_thumb_image').live('click', function () {



            //define variable from clicked image: 



            var clickedImage = jQuery(this).attr("id");



            //now use that variable to access image info for editor window insert:



            var cai_img_num = jQuery('#' + clickedImage + '_num').val();


			var cai_img_permalink = jQuery('#' + clickedImage + '_permalink').val();
			
			
            var cai_img_alt = jQuery('img#' + clickedImage + '').attr('alt');



            var cai_img_src = jQuery('img#' + clickedImage + '').attr('src');



            var cai_img_w = jQuery('img#' + clickedImage + '').attr('width');



            var cai_img_h = jQuery('img#' + clickedImage + '').attr('height');



            var cai_go_fetch = jQuery('#cai_go_fetch').val();



            var cai_upload_dir = jQuery('#cai_upload_dir').val();



            var cai_img_path = jQuery('#cai_img_path').val();



            var cai_img_align = jQuery('input:radio[name=cai_img_align]:checked').val();



            var cai_img_credit = jQuery('input:radio[name=cai_img_credit]:checked').val();



            //control credit type to artist...



            if (cai_img_credit == 'cai_link_credit') {



                //employ wordpress's centering method for <p> and <img />



                if (cai_img_align == 'alignleft') {



                    var cai_img_a_align = 'left'



                } else if (cai_img_align == 'aligncenter') {



                    var cai_img_a_align = 'center'



                } else if (cai_img_align == 'alignright') {



                    var cai_img_a_align = 'right'



                } else {



                    var cai_img_a_align = 'left'



                }



                cai_img_to_post = '<p style="text-align: ' + cai_img_a_align + '"><a class="' + cai_img_align + '" title="' + cai_img_alt + '" href="' + cai_img_permalink + '"><img alt="' + cai_img_alt + '" height="' + cai_img_h + '" width="' + cai_img_w + '" src="' + cai_img_path + '/' + cai_img_num + '.jpg" /></a></p>'



            } else if (cai_img_credit == 'cai_copyright_credit') {



                cai_img_to_post = '[caption id="" align="' + cai_img_align + '" width="150" caption="© ClipArtIllustration.com"]<img alt="' + cai_img_alt + '" height="' + cai_img_h + '" width="' + cai_img_w + '" src="' + cai_img_path + '/' + cai_img_num + '.jpg" />[/caption]'



            } else if (cai_img_credit == 'cai_both_credit') {



                cai_img_to_post = '[caption id="" align="' + cai_img_align + '" width="150" caption="© ClipArtIllustration.com"]<a title="' + cai_img_alt + '" href="http://www.clipartillustration.com/' + cai_img_num + '/royalty-free-image.php"><img alt="' + cai_img_alt + '" height="' + cai_img_h + '" width="' + cai_img_w + '" src="' + cai_img_path + '/' + cai_img_num + '.jpg" /></a>[/caption]'



            } else {



                cai_img_to_post = '[caption id="" align="' + cai_img_align + '" width="150" caption="© ClipArtIllustration.com"]<a title="' + cai_img_alt + '" href="http://www.clipartillustration.com/' + cai_img_num + '/royalty-free-image.php"><img alt="' + cai_img_alt + '" height="' + cai_img_h + '" width="' + cai_img_w + '" src="' + cai_img_path + '/' + cai_img_num + '.jpg" /></a>[/caption]'



            }



            var data = {



                action: 'fetch_pic',



                image_num: cai_img_num,



            }



            jQuery.post(ajaxurl, data, function (result) {



                //define html content to be inserted:



                var cai_image = cai_img_to_post;



                //send variable information to editing window...	



                window.send_to_editor(cai_image);



                window.location.hash = 'postdivrich';



            });



        });



    });



});