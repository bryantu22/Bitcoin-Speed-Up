<?php

// Main website configuration options

$site_config = array(
	'website_url' => '',
	'website_name' => 'BITCOIN SPEED UP',
	'default_title' => 'Bitcoin transaction accelerator',
	'default_description' => '',
	'default_keywords' => '',
	'default_image' => 'img.png'
	);

$btc = array(
	'address' => ''
);

if(isset($_GET['version'])) {
	echo 'v1.0';
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
