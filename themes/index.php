<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage biboka
 * @since biboka 1.0
 */
get_header(); ?>
		<div class="w100 block float-left estilo-container bg-cinza novidades">
			<div class="page-size center-margem">
				<h2 class="text-center">Espia as novidades!</h2>
				<?php get_template_part( 'template-parts/index/publicacoes-no-js' ); ?>
			</div>	
		</div>
		<div class="w100 block float-left aqui-voce-encontra estilo-container">
			<div class="page-size center-margem">
				<h2 class="text-center">Aqui você encontra: algo muito legal</h2>				
				<ul class="items-circulares">	
					<li>
						<div class="area_img">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/testes" title="Testes de persaonalidade">			
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/testes_de_personalidade.png" width="132" height="119" alt="Testes de personalidade">
							</a>
						</div>
						<div class="area_txt">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/testes" title="Testes de persaonalidade">
								<span class="label">Testes de personalidade</span>
								<span class="label-mobile">Testes</span>
							</a>									
						</div>		
					</li>
					<li>
						<div class="area_img">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/frases" title="Frases">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/frases.png" width="132" height="119"  alt="Frases">	
							</a>
						</div>
						<div class="area_txt">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/frases" title="Frases	">
								<span class="label">Frases</span>
								<span class="label-mobile">Frases</span>
							</a>									
						</div>		
					</li>
					<li>
						<div class="area_img">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/motivacao-profissional" title="Produtividade">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/produtividade.png" width="132" height="119" alt="Produtividade">	
							</a>
						</div>
						<div class="area_txt">
							<a rel="nofollow" href="<?php bloginfo( 'url' ); ?>/tag/motivacao-profissional" title="Produtividade	">
								<span class="label">Produtividade</span>
								<span class="label-mobile">Produção</span>
							</a>									
						</div>		
					</li>
					<li class="quebra3">
						<div class="area_img">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/ilustracoes" title="Ilustrações">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/ilustracoes.png" width="132" height="119"  alt="Ilustrações">	
							</a>
						</div>
						<div class="area_txt">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/ilustracoes" title="Ilustrações	">
								<span class="label">Ilustrações</span>
								<span class="label-mobile">Ilustras</span>
							</a>									
						</div>		
					</li>
					<li>
						<div class="area_img">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/conversas-de-whatsapp" title="Conversas de Whatsapp">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/conversas_whats.png" width="132" height="119"  alt="Conversas de Whatsapp">	
							</a>
						</div>
						<div class="area_txt">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/conversas-de-whatsapp" title="Conversas de Whatsapp">
								<span class="label">Conversas de Whatsapp</span>
								<span class="label-mobile">Zapzap</span>
							</a>									
						</div>		
					</li>
					
					<li>
						<div class="area_img">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/editorial" title="Auto Conhecimento">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/auto_conhecimento.png" width="132" height="119"  alt="Auto Conhecimento">	
							</a>
						</div>
						<div class="area_txt">
							<a rel="nofollow"  href="<?php bloginfo( 'url' ); ?>/tag/editorial" title="Auto Conhecimento">
								<span class="label">Auto Conhecimento</span>
								<span class="label-mobile">Dicas</span>
							</a>									
						</div>		
					</li>
				</ul>
			</div>
		</div>

		<div class="w100 block float-left estilo-container bg-cinza ilustracoes ">
			<div class="page-size center-margem">
				<div class="icone-tirinhas"></div>
				<h2 class="text-center">Novas ilustrações</h2>
				<?php
				$args   = array('post_type' => 'post','posts_per_page' => '3', 'tag__in' =>  array('2062,2120'), 'showposts' => '3','posts_per_archive_page' => '3','order'=> 'DESC');
				//Tags 2062 (tirinhas) e 2120(ilustrações)
				$tirinhas = new WP_Query($args); $cont= 0;?>
				<?php if ( $tirinhas->have_posts() ) : ?>	
					<?php if ( $tirinhas->have_posts() ) : while ($tirinhas->have_posts() ) : $tirinhas->the_post(); ?>
						<?php $srcImage=get_image("thumb");?>
						<?php $cont++; ?>
						<ul class="publicacoes ilustracoes col<?php echo $cont;?>">				
							<li>				
								<div class="area_da_img">
									<a class="cimg" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
										<img alt="<?php echo get_the_title(); ?>"  width="375" height="246" title="<?php echo get_the_title(); ?>" class="simg lazy-hidden"  data-src="<?php echo $srcImage ?>">
									</a>
								</div>
								<div class="texto">
									<?php echo categoriaInHtml($tirinhas->ID); ?>								
									<p class="font18">
										<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?> </a>
									</p>
								</div>
							</li>
						</ul>               
					<?php endwhile; wp_reset_query();   else: endif; ?>
				<?php endif; ?>
			</div>	
		</div>
		<!-- <div class="w100 block float-left mensagens-do-bem">
			<div class="page-size center-margem">
				<div class="icone-assine-news"></div>	
				<h2 class="text-center">Mensagens do Bem</h2>		
				<?php //get_template_part( 'template-parts/index/mensagens-do-bem' ); ?>
			</div>
		</div> -->
		<div class="w100 block float-left estilo-container bg-cinza noticias-do-bem">
			<div class="page-size center-margem">
				<h2 class="text-center">Notícias&Boas ações</h2>
				<?php get_template_part( 'template-parts/index/noticias-do-bem-no-js' ); ?>
			</div>	
		</div>
		<div class="w100 block float-left frase-do-dia">		
			<div class="page-size center-margem">
				<h2 class="text-center">Frase do dia</h2>	
					<ul class="w100 mt-3 float-left">		
				        <?php $_P_DIA_DO_ANO = intval(date('z'));
				              $args  = array(
				            'post_type'                 => 'preconteudo',                               
				            'category__in'            	=> array(1287,1296),  //frase do dia
				            'order'                     => 'DESC',
				            'post_status'               => 'publish',
				            'orderby'                   => 'date' ,                
				            'posts_per_page'            => '1')
				            ;            
				            $count  	= 0;  $i=0; 
				            $qry5  		= new WP_Query( $args); 
				            $temp_table = array();
				            if ( $qry5->have_posts() ) : while ( $qry5->have_posts() ) : $qry5->the_post();
				                $count++; $i=0;
				                $frases = explode(chr(10), get_the_content());
				                $linha = array();
				                foreach ($frases as $frase ) {
				                	$aux = str_replace(chr(10), '', $frase);
				                	$linha = explode(";", $aux);
				                	$temp_table[$i] = array( 	                		
				                		'ordem'		=> $linha[0],
				                		'descricao' => $linha[1],
				                		'autor'		=> $linha[2],
				                		'data'		=> $linha[3]                		                		
				            		);
				            		$i++;
				                }	                
				                $frase_escolhida=0;
				                foreach ($temp_table as $registro) {	                	
				                	if (date('d/m/Y') === trim($registro['data'])) {
				                		$frase_escolhida = $registro['descricao'];
				                		$autor_escolhido = $registro['autor'];
				                	}
				                	$ano = substr($registro['data'], 6, 4);
				                	$mes = substr($registro['data'], 3, 2);
				                	$dia = substr($registro['data'], 0, 2);
				                	$data = $ano . '-' . $mes . '-' . $dia;

				                	/*	!importante: caso o dia do ano em questão não possua uma 
				                	  	data cadastrada no sistema, a lógica pegará a frase relacionada ao dia do ano.
				                	*/
				                	if(date('z') === date('z', strtotime($data)) ){
				                		if(!$frase_escolhida){
				                			$frase_escolhida = $registro['descricao'];
				                			$autor_escolhido = $registro['autor'];
				                		}
				                	}                	          	
				                }

				                if ($frase_escolhida) {                                     
				                    $_aspa = array('ini' => '&#8220;' , 'fim' => '&#8221;');
				                    $link = get_permalink($post->ID);
				                    echo '<li class="frase-capa">';                    
				                    echo '<input type="hidden" class="dia-da-frase" value="'.$_P_DIA_DO_ANO.'"/>';                    
				                    echo "<p>";
				                    echo $_aspa['ini'] . $frase_escolhida . $_aspa['fim'];
				                    echo "</p>";
				                    echo '<div class="autor">';
				                        echo "<a>";  
				                        echo $autor_escolhido;	                        
				                        echo "</a>";
				                        } 
				                    echo '</div>';                 
				              echo '</li>';                        
				            endwhile; wp_reset_query(); else: endif;
				        ?>        
				</ul>
			</div>	
		</div>
		<div class="w100 block float-left estilo-container bg-cinza auto-conhecimento">			
			<div class="page-size center-margem">							
				<h2 class="text-center">Auto Conhecimento</h2>
				<?php
				$args   = array('post_type' => 'post','posts_per_page' => '3', 'tag__in' =>  array('1166'), 'showposts' => '3','posts_per_archive_page' => '3','order'=> 'DESC');
				//Tags 166 (editoruial)
				$editorial = new WP_Query($args); $cont= 0;?>

				<?php if ( $editorial->have_posts() ) : ?>	
					<?php if ( $editorial->have_posts() ) : while ($editorial->have_posts() ) : $editorial->the_post(); ?>
						<?php $srcImage=get_image("thumb");?>
						<?php $cont++; ?>
						<ul class="publicacoes auto-conhecimento col<?php echo $cont;?>">				
							<li>				
								<div class="area_da_img">
									<a class="cimg" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
										<img alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"  width="375" height="246"  class="simg lazy-hidden" data-src="<?php echo $srcImage ?>">
									</a>
								</div>
								<div class="texto">
									<?php $category = get_the_category(); $cor="";?>
									<div class="category w100 bold tx-<?php echo $category[0]->slug; ?>">
										<?php
											echo categoriaInHtml($editorial->ID);				                           
				                        ?>
									</div>
									<p class="font18">
										<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?> </a>
									</p>
								</div>
							</li>
						</ul>               
					<?php endwhile; wp_reset_query();   else: endif; ?>
				<?php endif; ?>
			</div>
		</div>		
		<div class="w100 block float-left caixinha-do-bem">			
			<div class="page-size center-margem">
				<?php get_template_part( 'template-parts/index/caixinha-do-bem' ); ?>				
			</div>	
		</div>
		<div class="w100 block float-left aqui-voce-encontra estilo-container">
			<div class="page-size center-margem">
				<h2 class="text-center">Frases:</h2>
				<ul class="items-circulares">	
					<li>
						<div class="area_img">
							<a href="<?php bloginfo( 'url' ); ?>/frases-para-status" title="Status">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/status.png"  width="139" height="139"  alt="Status">	
							</a>
						</div>
						<div class="area_txt">
							<a href="<?php bloginfo( 'url' ); ?>/frases-para-status" title="Status">
								<span class="label">Status</span>
								<span class="label-mobile">Status</span>
							</a>									
						</div>		
					</li>
					<li>
						<div class="area_img">
							<a href="<?php bloginfo( 'url' ); ?>/tag/depressao" title="Para depressão">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/para_depressao.png"  width="139" height="139"  alt="Para depressão">	
							</a>
						</div>
						<div class="area_txt">
							<a href="<?php bloginfo( 'url' ); ?>/tag/depressao" title="Para depressão">
								<span class="label">Para depressão</span>
								<span class="label-mobile">Depressão</span>
							</a>									
						</div>		
					</li>
					<li>
						<div class="area_img">
							<a href="<?php bloginfo( 'url' ); ?>/tag/frases-de-amor" title="De amor">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/de_amor.png"  width="139" height="139"  alt="De amor">	
							</a>
						</div>
						<div class="area_txt">
							<a href="<?php bloginfo( 'url' ); ?>/tag/frases-de-amor" title="De amor">
								<span class="label">De amor</span>
								<span class="label-mobile">De amor</span>
							</a>									
						</div>		
					</li>
					<li class="quebra3">
						<div class="area_img">
							<a href="<?php bloginfo( 'url' ); ?>/tag/motivacao-profissional" title="Motivacionais">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/motivacionais.png"  width="139" height="139"  alt="Motivacionais">	
							</a>
						</div>
						<div class="area_txt">
							<a href="<?php bloginfo( 'url' ); ?>/tag/motivacao-profissional" title="Motivacionais">
								<span class="label">Motivacionais</span>
								<span class="label-mobile">Motiva!</span>
							</a>									
						</div>		
					</li>
					<li>
						<div class="area_img">
							<a href="<?php bloginfo( 'url' ); ?>/tag/frases-inteligentes" title="Inteligentes">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/inteligentes.png"  width="139" height="139"  alt="Inteligentes">	
							</a>
						</div>
						<div class="area_txt">
							<a href="<?php bloginfo( 'url' ); ?>/tag/frases-inteligentes" title="Inteligentes">
								<span class="label">Inteligentes</span>
								<span class="label-mobile">Inteligentes</span>
							</a>									
						</div>		
					</li>
					
					<li>
						<div class="area_img">
							<a href="<?php bloginfo( 'url' ); ?>/tag/frases-engracadas" title="Engraçadas">
								<img class="lazy-hidden inline-block" data-src="<?php bloginfo( 'template_url' ); ?>/images/engracadas.png"  width="139" height="139"  alt="Engraçadas">	
							</a>
						</div>
						<div class="area_txt">
							<a href="<?php bloginfo( 'url' ); ?>/tag/frases-engracadas" title="Engraçadas">
								<span class="label">Engraçadas</span>
								<span class="label-mobile">Engraçadas</span>
							</a>									
						</div>		
					</li>
				</ul>
			</div>
		</div>		
		<div class="w100 block float-left estilo-container bg-cinza classicos">			
			<div class="page-size center-margem">							
				<h2 class="text-center">Clássicos do Refletir</h2>
				<?php
				$args = array(
				'post_type'              => 'post',        
				'order'                  => 'DESC' ,                  
				'tipo-classico'          => 'classicos',
				'posts_per_page'         => '3',                                 
				'ignore_sticky_posts'    => 3,
				
				);
				$classicos = new WP_Query($args); $cont= 0;?>
				<?php if ( $classicos->have_posts() ) : ?>	
					<?php if ( $classicos->have_posts() ) : while ($classicos->have_posts() ) : $classicos->the_post(); ?>
						<?php $srcImage=get_image("thumb");?>
						<?php $cont++; ?>
						<ul class="publicacoes classicos col<?php echo $cont;?>">				
							<li>				
								<div class="area_da_img">
									<a class="cimg" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
										<img alt="<?php echo get_the_title(); ?>"  width="375" height="246" title="<?php echo get_the_title(); ?>" class="simg lazy-hidden" data-src="<?php echo $srcImage ?>">
									</a>
								</div>
								<div class="texto">
									<?php echo categoriaInHtml($classicos->ID); ?>									
									<p class="font18">
										<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?> </a>
									</p>
								</div>
							</li>
						</ul>               
					<?php endwhile; wp_reset_query();   else: endif; ?>
				<?php endif; ?>
			</div>
		</div>
<?php get_footer(); ?>