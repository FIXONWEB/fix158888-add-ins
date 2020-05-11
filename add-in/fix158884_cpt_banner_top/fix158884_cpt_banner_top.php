<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
add_shortcode("fix_cpt_banner_top", "fix_cpt_banner_top");
function fix_cpt_banner_top($atts, $content = null){
	extract(shortcode_atts(array(
		"qtd" => '1',
		"post_type" => 'fix_cpt_banner_top',
		"category" => '',
		"height" => '200px'
	), $atts));


	$args = array(
		'numberposts' => 1,
		'post_type'   => $post_type,
		// 'category'    => 'destaque',
    	// 'tax_query' => array(
     //    	array(
     //        	'taxonomy' => 'fix_cpt_textos_cat',
     //        	'field'    => 'slug',
     //        	'terms'    => $category
     //    	)
    	// )

		// 'tax_query' => array(
  //       	array(
  //           	'taxonomy' => 'clientes',
  //           	'field'    => 'slug',
  //           	'terms'    => $cliente
  //       	)
  //   	)
	);

	$posts = get_posts( $args );

	ob_start();
	?>
		<style type="text/css">
			.border_red {
				border: 0px solid red;	
				/*background-color: red;*/
			}
			.fix158883_1 {
				background-size: contain;
			}

			.fix158883_1 .fix-image {
				border: 0px solid red;
				min-height: 120px;	
			}
			.fix158883_1 .fix-texto {
				/*background: rgba(0, 0, 0, 0.7);*/
				padding: 5px;
				/*color: white;*/
			}
			.fix158883_1 .fix-texto .fix-data {
				line-height: 1;
				font-size: 80%;
			}
			.fix158883_1 .fix-texto .fix-title {
				line-height: 1;
				font-weight: bold;
			}
			.fix158883_1 .fix-texto .fix-content {
				line-height: 1;
				font-weight: gray;
				padding-top: 4px;
				font-weight: 500;
			}

		</style>

		<?php foreach ($posts as $post) { ?>

			<?php 
			// $post_date = date('d/m', strtotime($post->post_date));
			$post_title = $post->post_title;
			// $content = $post->post_content;
			// $content = apply_filters('the_content', $content);
			// $content = str_replace(']]>', ']]&gt;', $content);
			// $content = wp_trim_words( $content, 5 );
			$img_url = get_the_post_thumbnail_url($post->ID,'full'); 
			$url = get_post_meta( $post->ID, 'fix_cpt_texto_url', true );
			?>
			<a href="<?php echo $url; ?>">
				<div class="fix158883_1 border_red" style="height:<?=$height ?>;background: url('<?php echo $img_url ?>');background-size: 100% 100%;" >

				</div>
			</a>
		<?php } ?>
	<?php
	return ob_get_clean();
}
