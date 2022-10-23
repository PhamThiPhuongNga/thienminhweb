<?php
global $ariacms;
switch (true) {
	case ($ariacms->getParam("task") != 'dang-nhap'):
		Model::viewhome();
		break;
	default:
		Model::dangNhap();
		break;
}
