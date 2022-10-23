<?php
class Model
{
	static function detail()
	{
		global $ariacms;
		global $database;
		$task = $ariacms->getParam("task");
		/** Get detail information in e4_posts table */
		$query = "SELECT GROUP_CONCAT('',d.id) taxonomy, a.*, b.fullname,d.title_vi as danhmuc_vi,d.title_en as danhmuc_en FROM e4_posts a 
				JOIN e4_users b ON a.user_created = b.id 
				LEFT JOIN e4_term_relationships c ON a.id = c.object_id
				LEFT JOIN e4_term_taxonomy d ON d.id = c.term_taxonomy_id
			WHERE a.url_part = '$task' AND a.post_status = 'active' 
			GROUP BY a.id ";
		$database->setQuery($query);
		$detail = $database->loadRow();
		/** Get all meta information of detail */
		$query = "SELECT * FROM e4_posts_meta WHERE post_id = " . $detail['id'];
		$database->setQuery($query);
		$metas = $database->loadObjectList();
		if ($metas) {
			foreach ($metas as $meta) {
				$detail[$meta->meta_key] = $meta->meta_value;
			}
		}
		switch ($detail['post_type']) {
			case 'post':
				/** Get taxonomies for posts */
				$query = "SELECT a.*, count(b.parent) submenu FROM e4_term_taxonomy a 
						LEFT JOIN (SELECT parent FROM e4_term_taxonomy) b ON a.id = b.parent
					WHERE a.status = 'active' AND a.taxonomy NOT LIKE '%product_%'
					GROUP BY a.id
					ORDER BY a.taxonomy, a.parent, a.order ";
				$database->setQuery($query);
				$taxonomies = $database->loadObjectList();
				/** Get related news with detail */
				$query = "SELECT a.* FROM e4_posts a 
						JOIN  e4_term_relationships b ON b.term_taxonomy_id IN (" . $detail['taxonomy'] . ") AND a.id = b.object_id
					WHERE a.url_part != '$task' AND a.post_status = 'active' AND a.post_type = 'post'
					GROUP BY a.id
					ORDER BY a.id desc LIMIT 0,5 ";
				$database->setQuery($query);
				$news_relateds = $database->loadObjectList();
				/** Push date to view detail news */
				View::detail_news($detail, $taxonomies, $news_relateds);
				break;
			case 'product':
				$query = "SELECT a.* FROM e4_posts a 
						JOIN  e4_term_relationships b ON b.term_taxonomy_id IN (" . $detail['taxonomy'] . ") AND a.id = b.object_id
					WHERE a.url_part != '$task' AND a.post_status = 'active' AND a.post_type = 'product'
					GROUP BY a.id
					ORDER BY a.id desc LIMIT 0,5 ";
				$database->setQuery($query);
				$product_relateds = $database->loadObjectList();

				$images = $ariacms->selectAll('e4_posts_image', 'object_id=' . $detail['id'], '');
				/** Push data to view detail product */
				View::detail_product($detail, $product_relateds, $images);
				break;
			default:
				$ariacms->redirect('Have no information in Database', 'javascript:history.back()');
				break;
		}
	}
}
