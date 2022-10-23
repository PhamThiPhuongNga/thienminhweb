<?php
global $database;
global $ariacms;
global $params;
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
?>


