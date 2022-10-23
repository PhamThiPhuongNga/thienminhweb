
<?php
class Model
{
	static function viewhome()
	{
		global $database;
		global $ariacms;
		// if (isset($_POST['update_cart'])){
		// 	echo "<script>alert ('Cập nhật giá thành công');</script>";
		// }
		//if (isset($_SESSION['orderCart'])) {
			switch ($_POST['btnSubmit']) {
				case 'sendOder':
					$name     = $_POST['txtName'];
					$phone    = $_POST['txtPhone'];
					$address  = $_POST['txtAddress'];
					$email    = $_POST['txtEmail'];
					$content  = $_POST['txtContent'];
					$total  = $_POST['total'];
					$row = new stdClass;
					$row->id = null;
					$row->id_thanhvien = $_SESSION['member']['id'];
					$row->name = $name;
					$row->phone = $phone;
					$row->email = $email;
					$row->address = $address;
					$row->content = $content;
					$row->tong_gia = $total;
					$row->date_created  = time();
					if ($id_order = $database->insertObject("e4_order_list", $row, "id")) {
						$row1 = new stdClass;
						// echo $id_order;die;
						foreach ($_SESSION['orderCart'] as $productID => $qt) {
							$item = $ariacms->selectOne('e4_posts', 'id', '=', $productID);
							$row1->id = NULL;
							$row1->order_id   = $id_order;
							$row1->product_id = $productID;
							$row1->so_luong    = $qt;
							$row1->gia_ban  	 = $item["product_sale"];
							$row1->date_created = time();
							$row1->status = 0;
							$database->insertObject('e4_order_product', $row1, 'id');
							

						}
						unset($_SESSION['orderCart']);
						$to_name = $ariacms->web_information->name_vi;
						$to_email = $ariacms->web_information->admin_email;
						$subject = "Bạn nhận được đơn hàng từ hệ thống";
						$content_mail = "Thông tin chi tiết: <br />";
						$content_mail .= "Tên : " . $name . "<br />";
						$content_mail .= "Điện thoại: " . $phone . "<br />";
						$content_mail .= "Địa chỉ: " . $address . "<br />";
						$content_mail .= "Email: " . $email . "<br />";
						$content_mail .= "Nội dung: " . $content . "<br />";
						$content_mail .= "Tổng tiền hàng: " . $ariacms->formatPrice($total) . "<br />";
						$ariacms->sendMail($to_email, $to_name, $subject, $content_mail);
						$ariacms->redirect("Gửi đơn hàng thành công. Chúng tôi sẽ liên hệ lại cho quý khách sớm nhất.", $ariacms->web_information->actual_link . "cart.html");
					} else {
						echo $database->stderr();
					}
					break;
				default:
					View::viewhome();
					break;
			}
		// }else {
		// 	$ariacms->redirect("Giỏ hàng trống.", "javascript:history.back()");
		// }
	}
}


?>