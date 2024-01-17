<style>div.biboka-resultado{display: none;}</style>
<?php

$id_do_teste=get_the_ID();
/*******************************************************
//ANUNCIOS EM TESTES: 08/06/18 LM
*******************************************************/
//preparar aqui os dados ref ao anúncio do teste:
/***************************************************/
$anuncio_teste 		   = get_post_meta( get_the_ID(), '_anuncio_teste', true );
$anuncio_entre  	   = get_post_meta( get_the_ID(), '_anuncio_entre', true );
$pergutas_com_anuncio  = array_map( 'trim', explode( ',', $anuncio_entre ) );
$strDoAnuncio		   = '<div class="caixa center-margem anuncio-box"><div class="w100 block"><script async defer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:block; text-align:center;"data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-INSERT_HERE" data-ad-slot="3159839050"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div></div>';
if(!getProducao()):
$strDoAnuncio='
 <div class="anuncio-quadrado center-margem ">        
        <div class="w100 block demo"
        style="display:inline-block;width:336px;height:280px">
        anuncio.php anuncio anuncio anuncio anuncio anu
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        anuncio anuncio anuncio anuncio anuncio anuncio 
        
        </div>
    </div>';
endif;
/***************************************************/
$args = array(
	'post_type'  => 'pergunta',                 
	'meta_query' => array(
	       array(
	           'key' 	=> '_id_do_teste',
	           'value' 	=> array($id_do_teste),
	           'compare'=> 'IN',
	       )
	),
	'order'                  => 'ASC',        
	'posts_per_page'         => '999',           
	'showposts'              =>  999,
	'posts_per_archive_page' => '999'
);
$tt_pergunta = array();
$nperguntas=0;
$x=0;
$qry_pergunta = new WP_Query( $args);

if ( $qry_pergunta->have_posts() ) { if ( $qry_pergunta->have_posts() ) : while ( $qry_pergunta->have_posts() ) : $qry_pergunta->the_post(); 
	$nperguntas++;
	$pergunta_com_anuncio_print="";

	$ordem = get_post_meta( get_the_ID(), '_ordem', true ); 
    $r_a   = get_post_meta( get_the_ID(), '_r_a'  , true );
    $r_b   = get_post_meta( get_the_ID(), '_r_b'  , true );
    $r_c   = get_post_meta( get_the_ID(), '_r_c'  , true );
    $r_d   = get_post_meta( get_the_ID(), '_r_d'  , true );
    $r_e   = get_post_meta( get_the_ID(), '_r_e'  , true );
    $r_f   = get_post_meta( get_the_ID(), '_r_f'  , true );
    $r_g   = get_post_meta( get_the_ID(), '_r_g'  , true );       

    $perguntaID		= get_the_ID();
    $perguntaTitulo = get_the_title();
	$conteudo 	    = get_the_content();
	
	$linhas = explode(chr(13), $conteudo);
	//asort($linhas);//print_r($linhas);

	/*******************************************************
	//ANUNCIOS EM TESTES: 08/06/18 LM
	/*****************************************/
	// lógica para adptar se vai ter anuncios
	if (strtoupper($anuncio_teste)==="SIM"): 		
		//se o teste vai ter anuncio
		foreach ($pergutas_com_anuncio as $perg) {	
			$perg = (int) $perg ;
			if( $perg === $nperguntas-1)	
				$pergunta_com_anuncio_print="SIM";						
		}
	endif;	


	/*****************************************/
	foreach ($linhas as $linha) {		
		if ($x>0) $checked = ''; else $checked = 'checked';
	 	$numero = substr($linha, 0,3);
	 	$numero = str_replace(')','',$numero); 
	 	$numero = str_replace(' ','',$numero); 
	 	$texto 	= str_replace(substr($linha, 0,3), '', $linha);
	 	$numero = strtolower($numero);
	 	$numero = str_replace(' ','',$numero); 
	 	$numero = str_replace(chr(10),'',$numero); 	 					 	
	 	$name 	= 'pergunta-' .  $nperguntas; 					
		$value	=  get_post_meta( get_the_ID(), '_r_'. $numero  , true );
	 	$input 	= '<input class="biboka_quiz_questoes" type="radio" id="'.$name.'" name="'.$name.'" value="'.$value.'" '. $checked .' ><span>'. $numero .')</span> <label>' . $texto .'</label>' ;					
		
	    $tt_pergunta[$x]		= array (
		    'ordem'			 	=>  $ordem, 
		    'valor'				=>  $value,	    		
    		'perguntaID' 		=>  $perguntaID, 
    		'numerodaPergunta' 	=>  $nperguntas, 
    		'descricao' 		=>  $perguntaTitulo,

    		/*******************************************************
			//ANUNCIOS EM TESTES: 08/06/18 LM */			
    		'temAnuncio'		=>  $pergunta_com_anuncio_print,    		
    		'input' 			=>  $input) ;
	    $x++ ;
 	} 	
	
endwhile; wp_reset_query(); else: endif; } 
$nlinha = 0 ;
echo '<div id="regua"></div>';
$i=0;
foreach($tt_pergunta as $campos) { 	

	if ($nlinha===0) {		
		echo '<ul class="biboka_quiz" id="lista-pergunta-'.$campos['ordem'].'" data-question_id="' . $campos['numerodaPergunta']. '" data-type="single">';									
		echo '<h2> ' . $campos['numerodaPergunta'] . ') ' . $campos['descricao'] . '</h2>' ;        
	}
	
	else if ($perguntaAtual != $campos['perguntaID']) {			
		echo '</ul>';
		/*******************************************************
		//ANUNCIOS EM TESTES: 08/06/18 LM*/	
		if($campos['temAnuncio']=="SIM") 
			echo $strDoAnuncio; 

		
		echo '<ul class="biboka_quiz" id="lista-pergunta-'.$campos['numerodaPergunta'].'" data-question_id="' . $campos['numerodaPergunta']. '" data-type="single">';									
		echo '<h2> ' . $campos['numerodaPergunta'] . ') ' . $campos['descricao'] . '</h2>' ;               
	}
	echo '<li class="biboka_quiz_li" data-pos="'. $nlinha.'">';
	echo  $campos['input'] ;  
	echo '</li>';
    $i++;
    $nlinha++;
    $perguntaAtual= $campos['perguntaID'];    
}
echo '</ul>';
echo '<input type="button" id="terminar" name="terminar" value="Terminar Teste" class="bibokaQuiz_button wpProQuiz_QuestionButton">';
echo '<br />';
/********
BUSCAR OS RESULTADOS
*******/
$args = array(
	'post_type'  => 'resultado',                 
	'order'      => 'ASC',
	'meta_query' => array(
	       array(
	           'key' 	=> '_id_do_teste',
	           'value' 	=> array($id_do_teste),
	           'compare'=> 'IN',
	       )
	)
);
$qry_resultado = new WP_Query( $args);
if ( $qry_resultado->have_posts() ) {
	if ( $qry_resultado->have_posts() ) : while ( $qry_resultado->have_posts() ) : $qry_resultado->the_post(); 						
		$srcImage=get_image("full");
		echo '<div class="biboka-resultado" id="resultado-'.trim(get_post_meta( get_the_id(), '_valor'  , true )).'">';		
		echo '<a href="'.get_permalink().'" class="bt-ver-resultado">ver resultado</a>';				
		echo '</div>';
	endwhile; wp_reset_query(); else: endif; 	
}
?>