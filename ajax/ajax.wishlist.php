<?php
session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');
// Include Configuration File
if (file_exists("../configuration.php")) {
	require_once("../configuration.php");
} else {
	echo "Missing Configuration File";
	exit();
}
// Include Language File
if (file_exists("../languages/lang." . $ariaConfig_language . ".php")) {
	require_once("../languages/lang." . $ariaConfig_language . ".php");
} else {
	echo "Missing Language File";
	exit();
}
// Include Params File
if (file_exists("../params/params." . $ariaConfig_language . ".php")) {
	include("../params/params." . $ariaConfig_language . ".php");
} else {
	echo "Missing Params File";
	exit();
}
// Include Database Controller
if (file_exists("../include/database.php")) {
	include("../include/database.php");
} else {
	echo "Missing Database File";
	exit();
}
// Include System File
if (file_exists("../include/ariacms.php")) {
	include	("../include/ariacms.php");
} else {
	echo "Missing System File";
	exit();
}


$pid = trim($_REQUEST["pid"]);

$quantity1 = (trim($_REQUEST["quantity1"]) != '' && trim($_REQUEST["quantity1"]) != 'undefined') ? trim($_REQUEST["quantity1"]) : 1;
$type = trim($_REQUEST['type']);

switch ($type) {
	case 'add':
		if ($pid != '') {
			if (!isset($_SESSION['orderWishlist'])) {
				$_SESSION['orderWishlist'] = array();
			}
			$_SESSION['orderWishlist'][$pid] +=$quantity1;
		}
		break;
	case 'edit':
		foreach ($_SESSION['orderWishlist'] as $productID => $value) {
			if ($productID == $pid) {
				$_SESSION['orderWishlist'][$productID] = $quantity1;
			}
		}
		break;
	case 'delete':
		if ($pid) {
			foreach ($_SESSION['orderWishlist'] as $productID => $value) {
				if ($productID == $pid) {
					unset($_SESSION['orderWishlist'][$productID]);
				}
			}
		} else {
			unset($_SESSION['orderWishlist']);
		}
		break;
		$database = new database($ariaConfig_server, $ariaConfig_username, $ariaConfig_password, $ariaConfig_database);
		$ariacms = new ariacms();

}?>
