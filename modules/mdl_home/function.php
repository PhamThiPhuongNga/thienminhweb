<?php
class Model
{
	static function viewhome()
	{
		global $database;
		$query = "SELECT * FROM e4_term_taxonomy WHERE taxonomy = 'product_category' AND position = 'home' AND status = 'active' ORDER BY e4_term_taxonomy.order LIMIT 0,5";
		$database->setQuery($query);
		$taxonomies = $database->loadObjectList();

		$query = "SELECT a.* from e4_web_home a where a.parent = 0 order by a.order ";
		$database->setQuery($query);
		$home_configs = $database->loadObjectList();

		$query = "SELECT a.* from e4_web_home a where a.parent > 0 order by a.order ";
		$database->setQuery($query);
		$home_config_details = $database->loadObjectList();
		View::viewhome($taxonomies, $home_configs, $home_config_details);
	}
}
