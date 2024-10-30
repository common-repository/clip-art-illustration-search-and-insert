<div id="cai_image_box_plugin">
	<table class="cai_search_table">
		<tbody>
			<tr>
				<th id="cai_search_td" scope="row"><label for="cai_text">Search Illustrations</label></th>
				<td id="cai_search_field_td"><input type="text" style="width:97%" value="orange man" id="cai_text" name="cai_text"></td>
				<td><input type="submit" value="search_images" name="cai_search" class="init_cai_search button-primary"></td>
			</tr>
		</tbody>
	</table>
		

	<div id="content1">
		<div id="cai_content_results">
			<input type="hidden" value="<?php echo $cai_go_fetch; ?>" id="cai_go_fetch">
			<input type="hidden" value="<?php echo $cai_plugin_dir; ?>" id="cai_plugin_dir">
			<input type="hidden" value="<?php echo $cai_server_path; ?>/illustrations" id="cai_upload_dir">
			<input type="hidden" value="<?php echo $upload_dir['url']; ?>" id="cai_img_path">
			<div class="cai_slider_control_container" style="top: 0px;"> <img width="64" height="64" src="/wp-content/plugins/<?php echo $cai_basename; ?>/images/arrow_left.png" id="cai_slider_control_left" class="cai_slider_control" alt="Left Scroller"><img width="64" height="64" src="/wp-content/plugins/<?php echo $cai_basename; ?>/images/arrow_right.png" id="cai_slider_control_right" class="cai_slider_control" alt="Right Scroller"> </div>
		
				<div class="options_drawer expander">
				<table class="cai_align_options options_drawer">
					<tbody>
						<tr>
							<th scope="row" class="cai_img_align_th">Alignment:</th>
							<td><input type="radio" name="cai_img_align" id="cai_alignnone" checked="checked" value="alignnone" class="cai_align_buttons">
								<label for="cai_alignnone" class="cai_align cai_image-align-none-label">none</label></td>
							<td><input type="radio" name="cai_img_align" id="cai_alignleft" value="alignleft" class="cai_align_buttons">
								<label for="cai_alignleft" class="cai_align cai_image-align-left-label">left</label></td>
							<td><input type="radio" name="cai_img_align" id="cai_aligncenter" value="aligncenter" class="cai_align_buttons">
								<label for="cai_aligncenter" class="cai_align cai_image-align-center-label">center</label></td>
							<td><input type="radio" name="cai_img_align" id="cai_alignright" value="alignright" class="cai_align_buttons">
								<label for="cai_alignright" class="cai_align cai_image-align-right-label">right</label></td></tr><tr class="credits">
							<th scope="row" class="cai_img_align_th">Credit:</th>
							<td><input type="radio" name="cai_img_credit" id="cai_link_credit"  checked="checked" value="cai_link_credit" class="cai_option_buttons">
								<label for="cai_link_credit" class="cai_credit">Link</label></td>
							<td><input type="radio" name="cai_img_credit" id="cai_copyright_credit" value="cai_copyright_credit" class="cai_option_buttons">
								<label for="cai_copyright_credit" class="cai_credit">&copy Notice</label></td>
							<td><input type="radio" name="cai_img_credit" id="cai_copyright_both" value="cai_both_credit" class="cai_option_buttons">
								<label for="cai_copyright_credit" class="cai_credit">Both</label></td>
						</tr>
					</tbody>
				</table>
			</div>
		
		</div>
		<div id="cai_results_list">
			<p><img width="351" height="161" src="/wp-content/plugins/<?php echo $cai_basename; ?>/images/header.jpg" alt="True inspiration: ClipArtIllustration.com is your creative partner." class="alignright"></p>
			<h4>Welcome to the ClipArtIllustration.com free image plugin, by Leo Blanchette</h4>
			<p>Thank you for using my wordpress plugin. This plugin makes it really really easy to use my illustrations.</p>
			<p><strong>How to use the image swiper:</strong></p>
			<ol>
				<li>Enter your keywords. Example: <strong>Orange Man</strong></li>
				<li>Push "search_images" button.</li>
				<li>Scroll through results using image scroller and click page numbers below for more 20/option results.</li>
				<li>Choose your alignment type (none, left, center, or right) and click the image. It will insert into your post automatically.</li>
			</ol>
			<p><em>Please keep the image backlink or copyright notice intact per <a href="http://www.clipartillustration.com/clipartillustrationeula.php" title="ClipArtIllustration EULA" target="_blank">image use guidelines.</a></em>.</p>
		</div>
	
	</div>
	
</div>
	<p><a target="_blank" title="visit website..." href="http://www.clipartillustration.com/"><em>visit</em> <strong>ClipArtIllustration.com</strong> </a></p>