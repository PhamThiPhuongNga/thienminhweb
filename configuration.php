<?php

error_reporting(E_ALL & ~E_NOTICE);

// Database configuration:";

$ariaConfig_server = "localhost";

$ariaConfig_username = "root";

$ariaConfig_password = "";

$ariaConfig_database = "thienminh";

// Site Configuration:

$ariaConfig_sitename = "";

$ariaConfig_template = "assets";

// Set Language

if (!isset($_SESSION['steam_lang'])) {

  $_SESSION['steam_lang'] = "vi";

}

$ariaConfig_language = $_SESSION['steam_lang'];


