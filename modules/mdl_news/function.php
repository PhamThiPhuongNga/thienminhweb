<?php
class Model
{

	public static function news_list()
	{
		global $database;
		global $ariacms;
        
		$maxRows1 = $ariacms->web_information->posts_per_page; 
   
		if(trim($ariacms->getParaUrl('?curPg')) != '' && trim($ariacms->getParaUrl('?curPg')) != 'undefined'){
			$page = trim($ariacms->getParaUrl('?curPg'));
		}else if($_POST["page"]){
			$page = $_POST["page"];
		}
		else{
			$page =1;
		}

		$curPg = ($page > 0) ? $page : 1;

		$curRow = ($curPg - 1) * $maxRows1;
		$limit = " LIMIT " . $curRow . "," . $maxRows1 . " ";
		$query = "SELECT COUNT(*) total FROM e4_posts WHERE post_type = 'post'";
		$database->setQuery($query);
		$totalRows = $database->loadRow();
        
		$count = $totalRows['total'];


		$query = "SELECT a.*, b.fullname FROM e4_posts a 
		JOIN e4_users b ON a.user_created = b.id
		WHERE a.post_type = 'post' AND a.post_status = 'active'
		order by a.id desc ".$limit;
		$database->setQuery($query);
		$news = $database->loadObjectList();

		View::news_list($news,$count,$maxRows1);
	}
	public static function news_taxonomy()
	{
		global $ariacms;
		global $database;
		

		$task = $ariacms->getParam("task");
		/** Get category information */
		$query = "SELECT a.*, GROUP_CONCAT('',b.id) submenu  FROM e4_term_taxonomy a 
		LEFT JOIN (SELECT id, parent FROM e4_term_taxonomy) b ON a.id = b.parent OR a.id = b.id
		WHERE a.url_part = '" . $task . "' AND a.status = 'active' 
		GROUP BY a.id";
		$database->setQuery($query);
		$category = $database->loadRow(); 
        //echo $category['submenu'];die;
        
		$maxRows1 = $ariacms->web_information->posts_per_page; 
   
		if(trim($ariacms->getParaUrl('?curPg')) != '' && trim($ariacms->getParaUrl('?curPg')) != 'undefined'){
			$page = trim($ariacms->getParaUrl('?curPg'));
		}else if($_POST["page"]){
			$page = $_POST["page"];
		}
		else{
			$page =1;
		}

		$curPg = ($page > 0) ? $page : 1;

		$curRow = ($curPg - 1) * $maxRows1;
		$limit = " LIMIT " . $curRow . "," . $maxRows1 . " ";
		
		$query = "SELECT count FROM e4_term_taxonomy Where id IN (" . $category['submenu'] . ") " ;
		$database->setQuery($query);
		$totalRows = $database->loadRow();
        
		$count = $totalRows['count'];
		//echo $count;
		/** Get all product with condition filter and store in category */
		$query = "SELECT a.*, c.fullname FROM e4_posts a 
		JOIN e4_users c ON a.user_created = c.id
		JOIN (SELECT b.object_id FROM e4_term_relationships b JOIN e4_term_taxonomy c ON b.term_taxonomy_id = c.id AND c.id IN (" . $category['submenu'] . ") WHERE b.object_type = 'post') t ON a.id = t.object_id
		JOIN e4_term_relationships d ON d.object_id = a.id 
		WHERE a.post_type = 'post'
		GROUP BY a.id
		order by a.id desc ".$limit;
		$database->setQuery($query);
		$news = $database->loadObjectList();
		View::news_taxonomy($news, $category,$count,$maxRows1);
	}
}
