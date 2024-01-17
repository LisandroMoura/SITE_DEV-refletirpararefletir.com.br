<?php $classe = ""; 
$retorno = function_exists('biboka_detect_Dispositivo') ? biboka_detect_Dispositivo() : ['tipo' => 'mobile']; 
if ($retorno['tipo']!="pc")$classe = "mobile"; ?>
<div class="area-do-menu <?php echo $classe; ?>">
<div class="corpo-do-menu">
<div class="imagem-do-menu">
<a title="Refletir">
	<!-- ● Projeto2023Mar01 - LCP e CLS das fabulas pequenas 16-03-23 -->
<img alt="Refletir para refletir" width="132" height="57" src="<?php bloginfo( 'template_url' ); ?>/images/logo.png">
</a>
</div>
<ul class="menu">
<li class="title tx-reflexao">
<a class="refle">REFLEXÃO
<div class="sinal_de_mais tx-reflexao"><span class="sinal_a"></span><span class="sinal_b"></span></div>
</a>
<ul class="sub-menu">
<li><a href="<?php echo get_bloginfo('url');?>/category/reflexao">Toda a categoria</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/tag/editorial">Editorias e Dicas</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/tag/noticias-do-bem">Notícias do Bem</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/tag/saude/">Saúde</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/testes">Testes (Quiz)</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/tag/frases">Frases</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/tag/textos-reflexivos">Textos</a></li>

</ul><!-- sub-menu -->
</li>
<li class="title tx-diversao">
<a>DIVERSÃO
<div class="sinal_de_mais tx-diversao"><span class="sinal_a"></span><span class="sinal_b"></span></div>
</a>
<ul class="sub-menu">
<li><a href="<?php echo get_bloginfo('url');?>/category/diversao">Toda a categoria</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/tag/conversas-de-whatsapp/">Conversas de Whatsapp</a></li> 
<li><a href="<?php echo get_bloginfo('url');?>/tag/tirinhas/">Tirinhas</a></li> 
<li><a href="<?php echo get_bloginfo('url');?>/tag/ilustracoes/">Ilustrações</a></li> 
<li><a href="<?php echo get_bloginfo('url');?>/tag/frases-engracadas/">Frases de Humor</a></li> 
<li><a href="<?php echo get_bloginfo('url');?>/tag/textos-humor/">Textos Engraçados</a></li> 
<li><a href="<?php echo get_bloginfo('url');?>/tag/bichinhos/">Bichinhos</a></li> 
</ul>
</li>
<li class="title tx-sentimentos">
<a>SENTIMENTOS
<div class="sinal_de_mais tx-sentimentos"><span class="sinal_a"></span><span class="sinal_b"></span></div></a>
<ul class="sub-menu">
<li><a href="<?php echo get_bloginfo('url');?>/category/sentimentos">Toda a categoria</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/amizade/">Amizade</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/romance/">Romance</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/familia/">Família</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/comemoracoes/">Comemorações</a></li>
</ul><!-- sub-menu -->
</li>
<li class="title tx-religiao">
<a>RELIGIÃO
<div class="sinal_de_mais tx-religiao"><span class="sinal_a"></span><span class="sinal_b"></span></div></a>
<ul class="sub-menu">
<li><a href="<?php echo get_bloginfo('url');?>/category/religiao">Toda a categoria</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/deus/">Deus</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/jesus/">Jesus</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/catolica/">Católica</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/evangelica/">Evangélica</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/espirita/">Espírita</a></li>
<li><a href="<?php echo get_bloginfo('url');?>/category/espiritualistas/">Espiritualistas</a></li>
</ul><!-- sub-menu -->
</li>
</ul> <!--menu-->

<!-- <div class="enviar-conteudo">
	<a href="<?php echo get_bloginfo('url');?>/sugestoes/">Envie seu material</a>
</div> -->


</div> <!-- nav-content -->

<div class="menu-mobile-fechar"></div> 
</div> <!-- area-do-menu -->