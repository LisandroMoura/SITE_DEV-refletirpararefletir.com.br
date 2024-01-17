<?php
echo '<style>div.biboka-resultado{display: none;}</style>';
$id_do_teste=get_the_ID();
/*******************************************************
//ANUNCIOS EM TESTES: 08/06/18 LM
*******************************************************/
//preparar aqui os dados ref ao anúncio do teste:
/***************************************************/
$anuncio_teste 		   = get_post_meta( get_the_ID(), '_anuncio_teste', true );
$anuncio_entre  	   = get_post_meta( get_the_ID(), '_anuncio_entre', true );
$pergutas_com_anuncio  = array_map( 'trim', explode( ',', $anuncio_entre ) );
$strDoAnuncio		   = '<div class="caixa center-margem anuncio-box"><div class="w100 block"><script async defer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:block; text-align:center;"data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-5900355242626023" data-ad-slot="3159839050"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div></div>';
/***************************************************/
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
	$x++ ;		    
	$ordem = get_post_meta( get_the_ID(), '_ordem', true ); 
    $r_a   = get_post_meta( get_the_ID(), '_r_a'  , true );
    $r_b   = get_post_meta( get_the_ID(), '_r_b'  , true );
    $r_c   = get_post_meta( get_the_ID(), '_r_c'  , true );
    $r_d   = get_post_meta( get_the_ID(), '_r_d'  , true );
    $r_e   = get_post_meta( get_the_ID(), '_r_e'  , true );
    $r_f   = get_post_meta( get_the_ID(), '_r_f'  , true );
    $r_g   = get_post_meta( get_the_ID(), '_r_g'  , true );  

	$cor   = get_post_meta( get_the_ID(), '_cor'  , true );           

    $perguntaID		= get_the_ID();
    $perguntaTitulo = get_the_title();
	$conteudo 	    = get_the_content();
	$label = '<div class="col1">' . $nperguntas . ') '.$perguntaTitulo . '</div>';
	$name 	= 'pergunta_' .  $nperguntas; 				
	/*
	$input 	= '<div class="col2">
	<select class="biboka_quiz_select" id="'.$name.'" name="'.$name.'" required">
	<option value="1">*Escolha</option><option value="1">Discordo totalmente</option><option value="2">Discordo parcialmente</option><option value="3">Concordo parcialmente</option><option value="4">Concordo totalmente</option></select>
	<input type="hidden" class="valida" value="" name="result_pergunta_'.$nperguntas.'" id="result_pergunta_'.$nperguntas.'"/>
	</div>';
	*/

	$input 	= '<div class="col2">
	<select class="biboka_quiz_select" id="'.$name.'" name="'.$name.'" required">
	<option value="1">*Escolha</option><option value="1">Discordo totalmente</option><option value="2">Discordo parcialmente</option><option value="3">Concordo parcialmente</option><option value="4">Concordo totalmente</option></select>	
	</div>';

	$linha  = $label. $input ;


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


	$numero = 0;
	$value	= get_post_meta( get_the_ID(), '_r_'. $numero  , true );

	$classificacao	= "";
	$terms  		= get_the_terms(get_the_ID(), 'classificacao');
    if ($terms) 
        foreach ( $terms as $term ) {        	
            $classificacao   =  $term->slug;
            $nome_class      =  $term->name;
    }
	$tt_pergunta[$x]		= array (
	    'ordem'			 	=>  $ordem, 
	    'cor'			 	=>  $cor, 
	    'valor'				=>  $value,	    		
		'perguntaID' 		=>  $perguntaID, 
		'numerodaPergunta' 	=>  $nperguntas, 
		'descricao' 		=>  $perguntaTitulo,
		/*******************************************************
		//ANUNCIOS EM TESTES: 08/06/18 LM */			
		'temAnuncio'		=>  $pergunta_com_anuncio_print,    		    		
		'classificacao'		=>  $classificacao, 	    		
		'nome_class'		=>  $nome_class, 	    		
		'input' 			=>  $linha
	);	
	
endwhile; wp_reset_query(); else: endif; } 
$nlinha = 0 ;
$formulario= get_post_meta( get_the_ID(), 'formulario', true );
if($formulario)
	echo '<form action="' . get_bloginfo('url') . $formulario .'" method="post">';

echo '<ul class="biboka_quiz avaliacao">';
echo '<input type="hidden"  name="idDoTeste" id="idDoTeste" data="'.$id_do_teste.'" value="'.$id_do_teste.'" />'; 
echo '<input type="hidden"  name="nperguntas" id="nperguntas" data="'.$nperguntas.'" value="'.$nperguntas.'" />'; 

$i=0;
foreach($tt_pergunta as $campos) { 
	$nlinha++;
	if($i % 2)
		$cor = "#fff";
	else
		$cor = $campos['cor'];

	if ($cor === '')
		$cor = "#f9f9f9";

	
		/*******************************************************
		//ANUNCIOS EM TESTES: 08/06/18 LM*/	
		if($campos['temAnuncio']=="SIM") {
			echo '</ul>';
			echo $strDoAnuncio;
			echo '<ul class="biboka_quiz avaliacao">';	
		}
	
	echo '<li class="biboka_quiz_li"  nome_class="'.$campos['nome_class'].'" classificacao="'.$campos['classificacao'].'"  id="lista-pergunta-'.$campos['ordem'].'" data-question_id="' . $campos['numerodaPergunta']. '" style="background:'.$cor.';" data-pos="'. $nlinha.'">';
	echo '<input type="hidden" class="valida" value="'.$campos['classificacao'].'" name="classificacao_'. $campos['numerodaPergunta']. '" id="classificacao_'. $campos['numerodaPergunta'].'">';
	echo '<input type="hidden" class="valida" value="'.$campos['nome_class'].'" name="nome_class_'. $campos['numerodaPergunta']. '" id="nome_class_'. $campos['numerodaPergunta'].'">';
	echo  $campos['input'] ;  
	echo '</li>';
	

    $i++;    
    $perguntaAtual= $campos['perguntaID'];    
}
echo '<input type="submit" name="terminar" id="terminar_avaliacao" value="Terminar Teste" class="bibokaQuiz_button wpProQuiz_QuestionButton">';
echo '</ul>';

if($formulario)
	echo '</form>';
echo '<div id="resultado" class="w100 caixa"></div>';
/********************************************
BUSCAR OS RESULTADOS
*********************************************/
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
