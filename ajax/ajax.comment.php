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



$id = trim($_REQUEST["id"]);
$rating = (trim($_REQUEST["rating"]) != '' && trim($_REQUEST["rating"]) != 'undefined') ? trim($_REQUEST["rating"]) : 5;
$content = (trim($_REQUEST["content"]) != '' && trim($_REQUEST["content"]) != 'undefined') ? trim($_REQUEST["content"]) : "";
$name = (trim($_REQUEST["name"]) != '' && trim($_REQUEST["name"]) != 'undefined') ? trim($_REQUEST["name"]) : "";
$mail = (trim($_REQUEST["mail"]) != '' && trim($_REQUEST["mail"]) != 'undefined') ? trim($_REQUEST["mail"]) : "";
/*
$type = trim($_REQUEST['type']);
switch ($type) {
	case 'add':
		if ($pid != '') {
			if (!isset($_SESSION['orderCart'])) {
				$_SESSION['orderCart'] = array();
			}
			$_SESSION['orderCart'][$pid] += $quantity;
		}
		break;
	case 'edit':
		foreach ($_SESSION['orderCart'] as $productID => $value) {
			if ($productID == $pid) {
				$_SESSION['orderCart'][$productID] = $quantity;
			}
		}
		break;
	case 'delete':
		if ($pid) {
			foreach ($_SESSION['orderCart'] as $productID => $value) {
				if ($productID == $pid) {
					unset($_SESSION['orderCart'][$productID]);
				}
			}
		} else {
			unset($_SESSION['orderCart']);
		}
		break;
}
*/


	$database = new database($ariaConfig_server, $ariaConfig_username, $ariaConfig_password, $ariaConfig_database);
	$ariacms = new ariacms();
	$params = new params();
	
	$row = new stdClass;
	$row->id 		= NULL;
	$row->post_id = $id;
	$row->name = $name;
	$row->mail = $mail;
	$row->content = $content;
	$row->rating = $rating;
	$row->date_comment = time();
	
	$query = "SELECT * FROM `e4_posts` where id = ".$id;
	$database->setQuery($query);
	$product = $database->loadRow();
	
	if ($database->insertObject('e4_comment', $row, 'id')) {
		
		$row = new stdClass;
		$row->id =$id ;
		$row->rating = ($rating + $product['rating']*$product['comment_count'])/($product['comment_count']+1);
		$row->comment_count = $product['comment_count']+1;
		$database->updateObject('e4_posts', $row, 'id');
	}

	$query = "SELECT * FROM `e4_comment` where post_id = ".$id." order by id asc";
	$database->setQuery($query);
	$comments = $database->loadObjectList();
	$comment_count =count($comments);

?>

				<div id="review">
					<h2 class="woocommerce-Reviews-title">
						<?= $comment_count?> review for <span><?= $product[$params->title]?></span> 
					</h2>
					<?php if($comment_count>0){?>
					<ol class="commentlist">
						<?php foreach($comments as $comment){?>
						<li class="review byuser comment-author-sinan bypostauthor even thread-even depth-1" id="li-comment-3"> 
							<div id="comment" class="comment_container"> 
								<img src="<?= $ariacms->actual_link ?>upload//mac-dinh.jpg" alt="" data-wpfc-original-srcset="<?= $ariacms->actual_link ?>upload//mac-dinh.jpg 2x" class="avatar avatar-60 photo" height="60" width="60" loading="lazy" srcset="<?= $ariacms->actual_link ?>upload//mac-dinh.jpg 2x"> 
																
								<div class="comment-text"> 
									<div class="star-rating" role="img" aria-label="Rated <?= $comment->rating?> out of 5">
										<span style="width:<?= ($comment->rating/5)*100?>%">Rated <strong class="rating"><?= $comment->rating?></strong> out of 5</span>
									</div>
									<p class="meta"> 
										<strong class="woocommerce-review__author"><?= $comment->name?></strong> 
											<span class="woocommerce-review__dash">–</span> 
											<time class="woocommerce-review__published-date" datetime="2018-12-17T10:49:57+03:00"><?= $ariacms->unixToDate($comment->date_comment, "/") . " " . $ariacms->unixToTime($comment->date_comment, ":") ?></time>
									</p> 
									<div class="description">
										<p><?= $comment->content?></p>
									</div>
								</div>
							</div>
						</li>
						<?php }?>
					</ol>
					
					<?php }
					?>
				</div>
				

