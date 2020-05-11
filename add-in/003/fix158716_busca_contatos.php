<?php
defined( 'ABSPATH' ) or die();
add_shortcode("fix158888_form_busca_contatos", "fix158888_form_busca_contatos");
function fix158888_form_busca_contatos($atts, $content = null){

	ob_start();
	?>
		<style type="text/css">
			.fix158888fbc .border_red, .fix158888fbc.border_red {
				border:0px solid red;
			}
			.fix158888fbc {
				display: grid;
				grid-template-columns: 2fr 1fr;
			}
			.fix158888fbc .col1 {
				padding: 20px;
			}
			.fix158888fbc .col1 input {
				min-width: 100%;
				border: 1px solid gray;
				color: black; 
				padding: 5px 5px;
				font-size: 12px;
				line-height: 1;
				min-height: 20px;
			}
			.fix158888fbc .col1 label {
				color: black;
			}
			.fix158888fbc .col2 {
				align-self: center;	
				justify-self: center;
			}
			.fix158888fbc .col2 button {
				padding: 6px 20px;
				color: white;
				background-color: #3f79c6;
			}
			.fix158888fbc .field {
				margin-bottom: 10px;
			}
			.fix158888fbc_form_title {
				color: #3f79c6;
				font-size: 120%;
				font-weight: bold;
				margin-left: 20px;
				line-height: 1;
			}
			

		</style>
		<div class="fix158888fbc_form_title">Busca de contatos</div>
		<form id="fix158888fbc_form" action="#" method="POST">

			<div class="fix158888fbc border_red">

				<div class="col1 border_red">
					<div class="field">
						<div><label for="fix158888fbc_nome">Nome</label></div>
						<div><input type="text" name="" id="fix158888fbc_nome"></div>
					</div>
					<div class="field">
						<div><label for="fix158888fbc_mail">E-mail</label></div>
						<div><input type="text" name="fix158888fbc_mail" id="fix158888fbc_mail"></div>
					</div>
					<div class="field">
						<div><label for="fix158888fbc_depto">Departamento</label></div>
						<div><input type="text" name="fix158888fbc_depto" id="fix158888fbc_depto"></div>
					</div>

				</div>
				<div class="col2 border_red">
					<button>Buscar</button>	
				</div>
			</div>
		</form>
		<script type="text/javascript">
			jQuery(function($){
				$('#fix158888fbc_form').on('submit',function(e){
					e.preventDefault();
					console.log('fix158888fbc_form');
				});
			});
		</script>
	<?php
	return ob_get_clean();
}

