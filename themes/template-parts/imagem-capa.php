<?php 
while ( have_posts() ) : the_post(); 
	$category = get_the_category();
	$first = end($category);
	$id_cat_pai = isset($first->category_parent) ? (($first->category_parent == 0) ? $first->term_id : $first->category_parent)	
										  : 0;
	$categoria = get_the_category_by_ID($id_cat_pai) ? get_the_category_by_ID($id_cat_pai) : 'reflexao';
	$categoria = (isset($categoria) && $categoria != '' && is_wp_error($categoria)) ? 'reflexao' : $categoria ;
	switch ($categoria) {
		case 'Reflexão':
			$cor = 'reflexao';
			break;
		case 'Religião':
			$cor = 'religiao';
			break;
		case 'Diversão':
			$cor = 'diversao';
			break;
		case 'Sentimentos':
			$cor = 'sentimentos';
			break;
		default:
			$cor = 'reflexao';
			break;
	}
	$posttags = get_the_tags();
	if ($posttags) {
		foreach ($posttags as $tag) {
			if ($tag->name == 'Saúde') {
				$cor = 'saude';
			}
		}
	}
	?>
	<?php
	$retorno = function_exists('biboka_detect_Dispositivo') ? biboka_detect_Dispositivo() : ['tipo' => 'mobile']; 	
	if ($retorno['tipo'] == 'pc') $srcImageMob = get_image('only_full');
	else $srcImageMob = get_image_mob();
	?>
	<div id="outside" class="noabsolute">
		<div class="item-capa-single">
			<div class="img-area lazy" data-src="<?php echo $srcImageMob; ?>" style="background-color:#fff ;height:480px;">
				<div class="box-image">
					<div class="content-area-image">
						<div class="tabcel">
							<?php if(!getPaginasFixas()): ?>
							<div class="barra-cor">
								<div class="bandeirinha-area tx-<?php echo $cor; ?>">
									<div class="bandeira-a"></div>
									<div class="bandeira-b"></div>
								</div>
								<div class="texto-bandeira tx-<?php echo $cor; ?>">
									<?php echo $categoria; ?>
								</div>
							</div>
							<?php endif; ?>
							<div class="col1">
								<h1 itemprop="name"><?php echo get_the_title(); ?></h1>
							</div>
							<?php if(!getPaginasFixas()): ?>
							<div class="col2">
								<div class="header-single header-entry">
									<ul class="entry-meta linha_com_dois">
										<li class="single-data">
											<span class="icone-data-publicao"></span>
											<?php echo entry_date(); ?>
										</li>
										<li class="single-autor">
											<span class="icone-autor-publicacao"></span>
											<?php
											printf('<span class="author vcard"><a class="url fn n rosa" href="#"  title="%2$s" rel="author">%3$s</a></span>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_attr(sprintf(__('View all posts by %s', 'biboka'), get_the_author())), get_the_author());
											?>
										</li>
									</ul>

								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
