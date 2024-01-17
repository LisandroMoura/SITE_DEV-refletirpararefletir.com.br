<?php

// if(!getProducao()) require __DIR__ . '/vendor/autoload.php';
/**--------------------------------------------------------------------------------------------------------------
 * Nome: header.php
 * Autor: liZi by_pandora.io
 * Objetivo: arquivo responsável pelo header da template
 * Doc:
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 15-06-23  - Inserido o padrão de comentário de cabeçalhos que temos no fraseteca
 * 					- Removido a chamada para o FoiClonado
 * 					- Remover códigos comentados
 *					- identação melhor do código
 *					- tirei variáveis que não eram necessárias
 *					- Mudado o nome do metodo GetPaginasNoIndex para PluguinDadosEstruturadosGetPaginasNoIndex
 *					- Mudei lá nos pluguins também o nome do methodo
 *--------------------------------------------------------------------------------------------------------------*/
?>
<!DOCTYPE html><html  lang="pt_br">
	<head>
		<?php if (getProducao()): get_template_part('template-parts/seo/google-analytics'); endif; ?>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php
		/** ---------
		 * Start Code block
		 */
		if (function_exists('hasDadosEstruturados')):
			if (class_exists('MetaTags')):
				if (!PluguinDadosEstruturadosGetPaginasNoIndex()): 
					$metaTags = new MetaTags('google');
					$metaTags->facebook();
					$metaTags->pinterest();
					$escreveNoindex = false;
				endif;
				if (is_search()) $escreveNoindex = $metaTags->validaNoindex('is_search');
				if (is_404()) $escreveNoindex = $metaTags->validaNoindex('is_404');
				if ('resultado' == get_post_type()):
					$noindex = get_post_meta(get_the_ID(), 'noindex', true);
					if ($noindex == 'true') echo '<meta name="robots" content="noindex,follow" />';
				endif;
				if (PluguinDadosEstruturadosGetPaginasNoIndex()) $escreveNoindex = true;
				if (!$escreveNoindex):
					$schema = get_post_meta(get_the_id(), '_schema', true);
					if ($schema != 'artigo' && $schema != '') $dados = new DadosEstruturados($schema);
					else $dados = new DadosEstruturados('artigo');
				endif;
			endif;
		endif;
		$tipoDePagina = getTipoDePagina(); 
		switch ($tipoDePagina) {
			case 'default':
				$styleCSS = '/css/artisan/style.min.css';
				break;
			case 'page':
				$styleCSS = '/css/artisan/single.min.css';
				break;
			case 'testes':
				$styleCSS = '/css/artisan/testes.min.css';
				break;
			case 'fixa':
				$styleCSS = '/css/artisan/fixa.min.css';
				break;
			case 'texto':
				$styleCSS = '/css/artisan/single.min.css';
				break;
			case 'frase':
				$styleCSS = '/css/artisan/single.min.css';
				break;
			case 'single':
				$styleCSS = '/css/artisan/single.min.css';
				break;
			case 'archive':
				$styleCSS = '/css/artisan/archive.min.css';
				break;
		}
		// dd($tipoDePagina , $styleCSS);	

		$pageClass='';
		if (is_search()) $pageClass='class="search"'; 
		if (is_404())  $pageClass='class="page_404"' ;
		if (is_page()) $pageClass='class="page_class"'; 
		?>
		<?php get_template_part($styleCSS); ?>

		<!-- <link rel="stylesheet" href="<?php echo bloginfo( 'template_url' )?>/css/artisan/_archive.min.css"> -->
		
		<meta name="p:domain_verify" content="6765b34436553b2d47ee89f3c8e02a5e" />
		
		<?php wp_head(); get_template_part('template-parts/anuncios/anuncio-automatico');?>
	</head>
	<body itemscope itemtype="http://schema.org/WebPage" <?php body_class(); ?> >
		<div id="body" <?php echo $pageClass; ?>>
			<div id="page" class="hfeed site hfull">
				<?php get_template_part('template-parts/menu'); ?>
				<div class="pai caixa w100 area-imagem">
					<?php get_template_part('template-parts/header/cabecalho-do-site'); ?>
					<?php if (is_single() || is_page()) : get_template_part('template-parts/imagem-capa'); endif; ?>
					<?php if (is_search() || is_tag() || is_category() || is_archive() || is_404()) : get_template_part('template-parts/imagem-core'); endif; ?>
				</div>
				<div id="main" class="w100">
					<div class="site-main">
