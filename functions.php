<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
require 'plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/FIXONWEB/fix158888-add-ins',
	__FILE__, 
	'fix158888-add-ins/fix158888-add-ins'
);

function fix158888_load_modules($directory, $recursive = true, $listDirs = false, $listFiles = true, $exclude = '') {
    $arrayItems = array();
    $skipByExclude = false;
    $handle = opendir($directory);
    if ($handle) {
        while (false !== ($file = readdir($handle))) {
        preg_match("/(^(([\.]){1,2})$|(\.(svn|git|md))|(Thumbs\.db|\.DS_STORE))$/iu", $file, $skip);
        if($exclude){
            preg_match($exclude, $file, $skipByExclude);
        }
        if (!$skip && !$skipByExclude) {
            if (is_dir($directory. DIRECTORY_SEPARATOR . $file)) {
                if($recursive) {
                    $arrayItems = array_merge($arrayItems, fix158888_load_modules($directory. DIRECTORY_SEPARATOR . $file, $recursive, $listDirs, $listFiles, $exclude));
                }
                if($listDirs){
                    $file = $directory . DIRECTORY_SEPARATOR . $file;
                    $arrayItems[] = $file;
                }
            } else {
                if($listFiles){
                    $file = $directory . DIRECTORY_SEPARATOR . $file;
                    $arrayItems[] = $file;
                }
            }
        }
    }
    closedir($handle);
    }
    return $arrayItems;
}

$path_modules = plugin_dir_path( __FILE__ )."add-in";
$dire = fix158888_load_modules($path_modules);
sort($dire);
foreach ($dire as $key => $value) {
	$extensao = substr($value, -4) ;
	if($extensao=='.php') require_once($value);;
}
