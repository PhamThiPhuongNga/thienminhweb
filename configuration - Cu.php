<?php
error_reporting(E_ALL & ~E_NOTICE);
// Database configuration:";
$ariaConfig_server = "localhost";
$ariaConfig_username = "newwaytech_cong";
$ariaConfig_password = "Newwaytech@123";
$ariaConfig_database = "newwaytech_cong";
// Site Configuration:
$ariaConfig_sitename = "steam/";
$ariaConfig_template = "buno";
// Set Language
if (!isset($_SESSION['steam_lang'])) {
  $_SESSION['steam_lang'] = "vi";
}
$ariaConfig_language = $_SESSION['steam_lang'];
