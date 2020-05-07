<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
require 'plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/FIXONWEB/fix158888-add-ins',
	__FILE__, 
	'fix158888-add-ins/fix158888-add-ins'
);
