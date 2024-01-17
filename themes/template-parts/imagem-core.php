<?php 
	if(getPaginasFixas()): return; endif; 
		$srcImageMob=get_image_mob();
		if (is_category()){
			switch (single_cat_title('',false)) {
				case 'Reflexão':
					$busca_img 		= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_reflexao.webp";
					$srcImageMob 	= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_reflexao_mob.webp";
					break;
				case 'Sentimentos':
					$busca_img 		= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_sentimentos.webp";
					$srcImageMob 	= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_sentimentos_mob.webp";
					break;
				case 'Diversão':
					$busca_img 		= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_divercao.webp";
					$srcImageMob 	= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_divercao_mob.webp";
					break;
				case 'Religião':
					$busca_img 		= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_religiao.webp";
					$srcImageMob 	= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_religiao_mob.webp";
					break;
				default:
					$busca_img 		= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_reflexao.webp";
					$srcImageMob 	= "/wp-content/themes/refletir2023/images/bgs/refletir_capa_reflexao_mob.webp";
					break;
			}
		}
		$srcImage=get_bloginfo( 'url' )."/wp-content/uploads/2017/10/archive.jpg";

		if (is_search())
			$srcImage=get_bloginfo( 'url' )."/wp-content/uploads/2017/10/search.jpg";
		else if (is_tag())
			$srcImage=get_bloginfo( 'url' )."/wp-content/uploads/2017/10/tags2.jpg";       	

		if(isset($busca_img))
			if($busca_img) $srcImage=$busca_img;		
			
		if (is_404())	
			$srcImageMob=get_bloginfo( 'template_url' )."/images/bgs/archive_mob.jpg";

		if (is_tag())
			$srcImageMob=get_bloginfo( 'template_url' )."/images/bgs/tags2_mob.jpg";

		if (is_search())
			$srcImageMob=get_bloginfo( 'template_url' )."/images/bgs/search_mob.jpg";

	?>    
    <div id="outside">
        <div class="item-capa-single">
        	<div class="img-area">
                <img data-src="<?php echo $srcImage; ?> " width="1160" height="480" alt="<?php the_archive_title(); ?>" class="block lazy-hidden w100 maior_que_768">
                <img data-src="<?php echo $srcImageMob; ?> " width="404" height="480" alt="<?php the_archive_title(); ?>" class="block lazy-hidden menor_que_768">				
				<div class="box-image">
                	<div class="content-area-image">
                		<div class="tabcel">
							<div class="col1">
								<h1>
									<?php if ( have_posts() ) : ?>                
										<?php if (is_search()): ?>
											Resultados da pesquisa para o termo: <span><?php echo get_search_query(); ?></span>								
										<?php else: 
											if ('testes' == get_post_type() && !is_tag()) echo '<span>Testes (Quiz)</span>';
											else the_archive_title('<span>','</span>');																			
										endif;?>									
									<?php else: ?>	
										<?php if (is_search()): ?>
											Termo: <span><?php echo get_search_query(); ?></span> não encontrado			
										<?php endif; ?>
									<?php endif; ?>
									<?php if(is_404()): ?>
										404: Página não encontrada!			
									<?php endif;?>
								</h1>
							</div>
                		</div>
					</div>						
				</div>
			</div>		
        </div>           
    </div>
    <div class="top-single"></div>
