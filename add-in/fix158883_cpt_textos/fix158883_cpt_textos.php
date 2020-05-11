<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
add_shortcode("fix_cpt_textos", "fix_cpt_textos");
function fix_cpt_textos($atts, $content = null){
	extract(shortcode_atts(array(
		"qtd" => '1',
		"post_type" => 'fix_cpt_textos',
		"category" => '',
		"height" => '110px',
		"style" => '',
		"style_itens" => ''
		
	), $atts));

	$post_type = 'fix_cpt_textos';
	$args = array(
		'numberposts' => $qtd,
		'post_type'   => $post_type,
		// 'category'    => 'destaque',
    	'tax_query' => array(
        	array(
            	'taxonomy' => 'fix_cpt_textos_cat',
            	'field'    => 'slug',
            	'terms'    => $category
        	)
    	)
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
			.fix158883_1_border_red {
				border-bottom: 0px solid red;	
			}
			.fix158883_1 {
				/*background-size: cover;*/
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
		<div style="overflow: hidden; <?php echo $style ?>">
			<?php foreach ($posts as $post) { ?>

				<?php 
				// $post_date = date('d/m', strtotime($post->post_date));
				$post_title = $post->post_title;
				// $content = $post->post_content;
				// $content = apply_filters('the_content', $content);
				// $content = str_replace(']]>', ']]&gt;', $content);
				// $content = wp_trim_words( $content, 5 );
				// $img_url = get_the_post_thumbnail_url($post->ID,'medium'); 
				$url = get_post_meta( $post->ID, 'fix_cpt_texto_url', true );
				?>

				<div style="<?=$style_itens ?>" class="fix158883_1 fix158883_1_border_red">
					<div class="fix-texto fix158883_1_border_red">
						<div class="fix-title">
							<a style="display:block;height: <?=$height ?>;" href="<?= $url ?>"><?=$post_title ?></a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php
	return ob_get_clean();
}
/*
FERRAMENTAS

[fix_cpt_textos 
height="60px" 
category="ferramentas" 
style="background-color:#dbece2;height:480px;" 
qtd="10" 
style_itens="height:50px;border-bottom: 1px solid gray;color:#2e8f89;"
]

[fix_cpt_textos 
category="utilidades" 
style="height:180px;background-color:#e8e6f3;color:#9a94bd;" 
qtd=3 
height=20px
]

SISTEMAS

[fix_cpt_textos 
category="sistemas" 
style="height:180px;background-color:#e3f0d6;color:#9a94bd;"
qtd=3 
height=25px
style_itens="height:50px;border-bottom: 1px solid gray;"
]

CURSOS E EVENTOS
#45a785
#d9ede2

[fix_cpt_textos 
category="cursos-e-eventos" 
style="height:180px;background-color:#d9ede2;"
style_itens="height:30px;border-bottom: 1px solid #45a785;"
]


[image-carousel]


*/