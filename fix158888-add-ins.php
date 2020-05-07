<?php
/**
 * Plugin Name:     FIXONWEB Add-Ins
 * Plugin URI:      https://github.com/fixonweb/fix158888-add-ins
 * Description:     Assessoria de configurações e recursos adicionais sob demanda do suporte tecnico
 * Author:          FIXONWEB
 * Author URI:      https://github.com/fixonweb
 * Text Domain:     fix158888
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Fix158888
 */

// Your code starts here.

require 'plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/FIXONWEB/fix158888-add-ins',
	__FILE__, 
	'fix158888-add-ins/fix158888-add-ins'
);
