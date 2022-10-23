
<?php
class Model
{
	static function viewhome()
	{
		global $database;
		global $ariacms;
			$selected= $_REQUEST['wishlist_pr'];
			switch ($_REQUEST['product_actions']) {
				case 'add':
					
					foreach ($selected as $ID=>$value) {
						if (!isset($_SESSION['orderCart'])) {
							$_SESSION['orderCart'] = array();
						}
						$_SESSION['orderCart'][$value] += 1;
					}
					View::viewhome();
					break;
				case 'remove':
					foreach ($selected as $ID=>$value) {
						unset($_SESSION['orderWishlist'][$value]);
					}
					View::viewhome();
					break;
					
				default:
					View::viewhome();
					break;
			}
	}
}


?>