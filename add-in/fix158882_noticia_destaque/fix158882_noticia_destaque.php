<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
add_shortcode("fix158882_noticia_destaque", "fix158882_noticia_destaque");
function fix158882_noticia_destaque($atts, $content = null){

	$post_type = 'post';
	$args = array(
		'numberposts' => 1,
		'post_type'   => $post_type,
		// 'category'    => 'destaque',
    	'tax_query' => array(
        	array(
            	'taxonomy' => 'category',
            	'field'    => 'slug',
            	'terms'    => 'destaque'
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
			.border_red {
				border: 0px solid red;	
			}
			.fix158882_1 {
				background-size: cover;
			}

			.fix158882_1 .fix-image {
				border: 0px solid red;
				min-height: 100px;	
			}
			.fix158882_1 .fix-texto {
				background: rgba(0, 0, 0, 0.7);
				padding: 5px;
				color: white;
			}
			.fix158882_1 .fix-texto .fix-data {
				line-height: 1;
				font-size: 80%;
			}
			.fix158882_1 .fix-texto .fix-title {
				line-height: 1;
				font-weight: bold;
			}
			.fix158882_1 .fix-texto .fix-content {
				line-height: 1;
				font-weight: gray;
				padding-top: 4px;
				font-weight: 500;
			}

		</style>

		<?php foreach ($posts as $post) { ?>

			<?php 
			$post_date = date('d/m', strtotime($post->post_date));
			$post_title = $post->post_title;
			$content = $post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			$content = wp_trim_words( $content, 5 );
			$img_url = get_the_post_thumbnail_url($post->ID,'medium'); 
			?>

			<div class="fix158882_1 border_red" style="background: url('<?php echo $img_url ?>');background-size: cover;">
				<a href="<?php echo $post->guid ?>">
					<div class="fix-image border_red"  >
						
					</div>
					<div class="fix-texto border_red">
						<div class="fix-data"><?=$post_date ?></div>
						<div class="fix-title"><?=$post_title ?></div>
						<div class="fix-content"><?=$content ?></div>
					</div>
				</a>
			</div>
		<?php } ?>
	<?php
	return ob_get_clean();
}
