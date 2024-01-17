<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage biboka
 * @since biboka 1.0
 */



get_header(); ?>	
<div class="default-page  page-sem-sidebar.php ">

    <div class="w100 page-sem-sidebar page404 ">             
		<div class="page-size center-margem">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'OPS, não encontramos!', 'biboka' ); ?></h1>
			</header>

			<div class="page-wrapper ">
				<div class="page-content">
					<h2 class="mb-30">O que você está procurando?</h2>
					<p>Parece que o conteúdo digitado não existe, ou foi removido de nosso sistema. </br>
					Utilize a barra de pesquisa abaixo ou clique <a class="rosa" href="<?php bloginfo('url'); ?>">aqui</a> para visitar a página inicial do site e conhecer o material incrível que separamos para você.</p>
					<p>
						<i><strong>Super Dica!</strong> Use aspas duplas <strong>" "</strong> para ser mais específico na pesquisa.</i>
					</p>
					<div class="div-search-form">
						<?php get_search_form(); ?>
					</div>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->			
		</div>
    </div>
    
</div>
<?php get_footer();?>
