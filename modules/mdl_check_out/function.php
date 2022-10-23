
<?php
class Model
{
	static function viewhome()
	{
		global $database;
		global $ariacms;
		if (isset($_SESSION['orderCart'])) {
		
			switch ($_POST['btnSubmit']) {
				case 'Place order':
					$name     = $_POST['fullname'];
					$phone    = $_POST['phone'];
					$address  = $_POST['address'];
					$email    = $_POST['email'];
					$content  = $_POST['content'];
					$total  = $_POST['total'];
					$row = new stdClass;
					$row->id = null;
					$row->name = $name;
					$row->phone = $phone;
					$row->email = $email;
					$row->address = $address;
					$row->content = $content;
					$row->status = "new";
					$row->date_created  = time();
					if ($id_order = $database->insertObject("e4_order_list", $row, "id")) {
						$row = new stdClass;
						foreach ($_SESSION['orderCart'] as $productID => $qt) {
							$item = $ariacms->selectOne('e4_posts', 'id', '=', $productID);
							$row->id = NULL;
							$row->order_id   = $id_order;
							$row->product_id = $productID;
							$row->quantity    = $qt;
							$row->price  	 = $item["product_sale"];
							$row->date_created = time();
							$database->insertObject('e4_order_product', $row, 'id');
						}
						unset($_SESSION['orderCart']);
						$ariacms->sendMail($to_email, $to_name, $subject, $content_mail);
						$ariacms->redirect("Gửi đơn hàng thành công. Chúng tôi sẽ liên hệ lại cho quý khách sớm nhất.", $ariacms->web_information->actual_link . "trang-chu.html");
					} else {
						echo $database->stderr();
					}
					break;
				default:
					View::viewhome();
					break;
			}
		}else {
			$ariacms->redirect("Giỏ hàng trống.", "javascript:history.back()");
		}
	}
}


?>
