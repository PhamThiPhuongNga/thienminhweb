<?php
global $database;
global $ariacms;
global $params;
$query = "SELECT * FROM e4_posts WHERE post_type = 'post' and post_status = 'active' ORDER BY id desc LIMIT 0, 3";
$database->setQuery($query);
$posts = $database->loadObjectList();

$query = "SELECT * FROM e4_term_taxonomy WHERE taxonomy = 'product_group' AND position = 'home' AND status = 'active' AND count > 0 ORDER BY e4_term_taxonomy.order LIMIT 1,3 ";
$database->setQuery($query);
$taxonomies = $database->loadObjectList();

$query = "SELECT c.groups, a.*
		FROM e4_posts a
			JOIN (
				SELECT t1.object_id, GROUP_CONCAT(' ', t2.id) AS groups
					FROM e4_term_relationships t1 
					JOIN ( SELECT id from e4_term_taxonomy WHERE taxonomy = 'product_group' AND position = 'home' AND status = 'active' LIMIT 1,3 ) t2 ON t1.term_taxonomy_id = t2.id GROUP BY t1.object_id
				) c ON a.id = c.object_id
		WHERE a.post_type = 'product' AND a.post_status = 'active'
		order by a.id desc
		";
$database->setQuery($query);
$products = $database->loadObjectList();

$query = "SELECT a.* from e4_web_home a where a.parent > 0 and `icon` = 1 ORDER BY `a`.`order` limit 0,2 ";
$database->setQuery($query);
$home_config_details = $database->loadObjectList();
?>
<div class="container">
	<div class="vc_row wpb_row vc_row-fluid">
		<?php foreach($home_config_details as $home_config_detail){?>
		<style>
			@media(max-width:768px) and (min-width:320px){
			.vc_row .klb_xs_vc_custom_1544605181183{padding-left:15px !important;}
			}
		</style>
			<div class="wpb_column vc_column_container vc_col-sm-6">
				<div class="vc_column-inner vc_custom_1544605181180 klb_xs_vc_custom_1544605181183">
					<div class="wpb_wrapper">
						<div class="wpb_single_image wpb_content_element vc_align_left">
							<figure class="wpb_wrapper vc_figure"> 
								<a href="<?=$home_config_detail->link?>" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
									<img width="605" height="350" src="<?=$home_config_detail->image?>" class="vc_single_image-img attachment-full" alt="" loading="lazy" srcset="<?=$home_config_detail->image?> 605w, <?=$home_config_detail->image?> 300w, <?=$home_config_detail->image?> 600w" sizes="(max-width: 605px) 100vw, 605px" />
								</a> 
							</figure>
						</div>
					</div>
				</div>
			</div>
		<?php }?>
	</div>
</div>