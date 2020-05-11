<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
add_shortcode("fix158881_ultimas_noticias", "fix158881_ultimas_noticias");
function fix158881_ultimas_noticias($atts, $content = null){

	$post_type = 'post';
	$args = array(
		'numberposts' => 4,
		'post_type'   => $post_type,
    	'tax_query' => array(
        	array(
            	'taxonomy' => 'category',
            	'field'    => 'slug',
            	'terms'    => 'noticias-principais'
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
				font-size: 90%;	
			}
			.fix158881_1 {
				display: grid;
				grid-template-columns: 80px 1fr;
				grid-column-gap: 10px;
				grid-row-gap: 10px;
				/*padding: 10px;*/
			}

			.fix158881_1 .fix-image {
				border: 1px solid silver;
				height: 60px;
				background-size: cover;
			}
			.fix158881_1 .fix-texto {

			}
			.fix158881_1 .fix-texto .fix-data {
				color: #3a6b96;
				line-height: 1;
			}
			.fix158881_1 .fix-texto .fix-title {
				line-height: 1;
				color: #3a6b96;
				font-weight: bold;
			}
			.fix158881_1 .fix-texto .fix-content {
				line-height: 1;
				color: #727874;
				font-weight: gray;
				padding-top: 4px;
				font-weight: 500;
			}

		</style>

		<?php $i=0; ?>
		<?php foreach ($posts as $post) { ?>

			<?php 
			$post_date = date('d/m', strtotime($post->post_date));
			$post_title = $post->post_title;
			$content = $post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			$content = wp_trim_words( $content, 9 );
			// $img_url = get_the_post_thumbnail_url($post->ID,'full'); 
			$img_url = get_the_post_thumbnail_url($post->ID,'medium'); 
			// $img_url = wp_get_attachment_url($post->ID, 'medium' );

			// echo "img_url: $img_url";
			?>

			<?php if($i) echo '<div style="height:10px;"></div>'; ?>
			<a href="<?php echo $post->guid ?>">
				<div class="fix158881_1 border_red">
					<div class="fix-image border_red" style="background-image: url('<?php echo $img_url ?>');" >
						
					</div>
					<div class="fix-texto border_red">
						<div class="fix-data"><?=$post_date ?></div>
						<div class="fix-title"><?=$post_title ?></div>
						<div class="fix-content"><?=$content ?></div>
					</div>
				</div>
			</a>
			<?php $i++; ?>
		<?php } ?>
	<?php
	return ob_get_clean();
}
