		</div><!-- #sitemain -->
	</div><!-- #main -->		
		<div class="lazy w100 block float-left rede-de-amigos"
		style="background-size: cover; background-color: rgb(246, 237, 240);" data-src="/wp-content/themes/refletir2023/images/bgs/bg_rodape.jpg"
		>			
	    	<div class="page-size center-margem">
	    		<ul>
	    			<li>
						<div class="icone-coracao lazy"
						style="background-position-x: -305px;background-position-y: -49px;"
						data-src="/wp-content/themes/refletir2023/images/elementos/elementos.webp"
						></div>
						<div class="titulo"><span class="preto">Sigam-me</span> <strong class="rosa">os bons!</strong></div>							
						<div class="area-redes">
							<ul>
								<li class="face"><a href="https://www.facebook.com/RefletirParaRefletir" target="blank" rel="nofollow">Facebook</a></li>
								<li class="pinterest mc"><a href="http://www.pinterest.com/refletir" target="blank">Pinterest</a></li>		                
								<li class="instagram"><a href="https://www.instagram.com/refletirpararefletir/" target="blank" rel="nofollow">Instagram</a></li>			                
							</ul>
						</div>							    		
	    			</li>
	    		</ul>	    		
			</div>
			<div class="links-rodape-esquerda">
				<ul class='menu-footer'>                
		                <li><a rel="nofollow" href="<?php echo get_bloginfo('url');?>/sobre-nos">Sobre nós</a>|</li>
		                <li><a rel="nofollow" href="<?php echo get_bloginfo('url');?>/contato">Contato</a>|</li>
		                <li><a rel="nofollow" href="<?php echo get_bloginfo('url');?>/politica-de-privacidade">Política de privacidade</a>|</li>
		                <li><a rel="nofollow" href="<?php echo get_bloginfo('url');?>/termos-de-uso">Termos de uso</a></li>              
		        </ul>
	        </div>
	        <div class="rodape-direita">
				<div class="copyr">
				<span>© 2012 - 2023 Refletir para Refletir.</span><span>Todos os direitos reservados.</span>
				</div>
	        </div>
		</div>		
	</div><!-- #page -->		
</div> <!-- #body -->

<div id="consent-popup" class="hidden closed">
	<div class="wrapper-consent-popup">
		<div class="wrapper-consent-popup-text">
			Utilizamos cookies essenciais e tecnologias semelhantes de acordo com a nossa <a href="/politica-de-privacidade">Política de Privacidade.</a> Ao continuar navegando, você concorda com essas condições.
		</div>
		<div class="wrapper-consent-popup-bt">
			<a id="btConsent" href="#">Ok </a>
		</div>
	</div>
</div>
<?php wp_footer(); ?>	
<?php include('.env'); ?>

<script src="<?php echo bloginfo( 'template_url' ); ?>/js/bundle.js?ver=<?php echo $ENV_VER;?>" defer  ></script>

<?php if ('testes' == get_post_type() ) : ?>
	<?php if('avaliar' == get_post_meta( get_the_ID(), '_tipo', true )): ?>		
	<?php else: ?>	
		<script src="<?php echo bloginfo( 'template_url' ); ?>/js/testes.min.js" defer ></script>		
	<?php endif; ?>	
<?php endif; ?>

</body>
</html>
