<?php
global $ariacms;
 $t="";
$page =$page =(trim($ariacms->getParaUrl('?t')) != '' && trim($ariacms->getParaUrl('?t')) != 'undefined') ? trim($ariacms->getParaUrl('?t')) : "";
if($_POST['btn'] or $page != ""){
 $t = "list";
}
else{
	$t="";
}

switch (true) {
	case ($t== 'list'):
		Model::product_list();
		break;
	default:
		Model::product_taxonomy();
		break;
}
