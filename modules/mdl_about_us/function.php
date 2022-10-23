
<?php
class Model
{
  static function viewhome()
  {
    global $database;
    global $ariacms;
    
    echo $task = $ariacms->getParam("task");die;
		/** Get detail information in e4_posts table */
		$query = "SELECT GROUP_CONCAT('',d.id) taxonomy, a.*, b.fullname,d.title_vi as danhmuc_vi,d.title_en as danhmuc_en FROM e4_posts a 
				JOIN e4_users b ON a.user_created = b.id 
				LEFT JOIN e4_term_relationships c ON a.id = c.object_id
				LEFT JOIN e4_term_taxonomy d ON d.id = c.term_taxonomy_id
			WHERE a.url_part = '$task' AND a.post_status = 'active' 
			GROUP BY a.id ";

      //View::viewhome();

    }
  }



?>