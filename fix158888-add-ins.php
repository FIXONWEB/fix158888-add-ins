<?php
/**
 * Plugin Name:     FIXONWEB Add-Ins
 * Plugin URI:      https://github.com/fixonweb/fix158888-add-ins
 * Description:     Assessoria de configurações e recursos adicionais sob demanda do suporte tecnico
 * Author:          FIXONWEB
 * Author URI:      https://github.com/fixonweb
 * Text Domain:     fix158888
 * Domain Path:     /languages
 * Version:         1.0.12
 *
 * @package         Fix158888
 */


/*
1.0.10 - background-size: cover; na noticia destaque
1.0.11 - background-size: contain; na noticia destaque
1.0.12 - background-repeat: no-repeat na noticia destaque
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require 'plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker('https://github.com/FIXONWEB/fix158888-add-ins', __FILE__, 'fix158888-add-ins/fix158888-add-ins');
require 'functions.php';

function fix158888__file__(){return __FILE__;}
function fix158888_plugin_file(){return plugin_dir_path( __FILE__ );}

add_action('wp_enqueue_scripts', "fix158888_enqueue_scripts");
function fix158888_enqueue_scripts(){
    wp_enqueue_script( 'jquery-validate-min', plugin_dir_url( __FILE__ ) . '/js/jquery.validate.min.js', array( 'jquery' )  );
}


function fix158888_banner_1_por_pagina( $query ) {
    if ( ! is_admin() && $query->is_main_query() && (get_post_type()=='cptbc' ) ) {
        $query->set( 'posts_per_page', 1 );
        return;
    }
}
add_action( 'pre_get_posts', 'fix158888_banner_1_por_pagina', 1 );


/*

@media (min-width: 800px) {
	.fix_col_h180 {
		height:180px;
		overflow: hidden;
	}
	.fix_col_h160 {
		height:160px;
		overflow: hidden;
	}

	.fix_col_h100 {
		height:100px;
		overflow: hidden;
	}
	.fix_col_h200 {
		height:200px;
		overflow: hidden;
	}
	.fix_col_h320 {
		height:320px;
		overflow: hidden;
	}

	.fix_col_h420 {
		height:420px;
		overflow: hidden;
	}

	.fix_col_h500 {
		height:500px;
		overflow: hidden;
	}
	.fix_col_h480 {
		height:480px;
		overflow: hidden;
	}
}
*/