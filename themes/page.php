<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: page.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Template responsável pelas seguintes singles do site:
 *           - page post_type
 *           - fixas e institucionais
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 13-07-23 - Ajuste do Erro de &nbsp U+00a0 (caractere de espaço em branco indesejado);
 *--------------------------------------------------------------------------------------------------------------*/
get_header(); ?>
<div class="single-page single.php">
    <div class="page-size center-margem">
        <?php while ( have_posts() ) : the_post(); ?> 
            <?php 
            //logica
            $posttags = ""; 
            $categoria =""; 
            $terms = get_the_category(get_the_ID()); 
            $titulo = get_the_title(); 
            $link = get_permalink();
            if (isset($terms[0])) {
                foreach ($terms as $term ) {            
                    if($term->name !='destaque'){
                        $categoria.=  $term->term_id.",";   
                        $id_cat = $term->term_id;
                    }                       
                }
            }
            //lógica para trazer veja mais manual ou por tag
            $bawmrp_options = get_option( 'bawmrp' ); $mostra_manual = false; 
            if(isset($bawmrp_options['in_content']))
                if ( $bawmrp_options['in_content']!='on' || apply_filters( 'stop_bawmrp', false ) ) {       
                    $tempost = bawmrp_get_related_posts( $idPost );
                    if (isset($tempost) && !empty($tempost) ) {         
                        $mostra_manual = true;
                    }                       
                } ?>
            <?php $srcImage=get_image("full");?>            
            <div class="row">                
                     <div class="col-1 conteudo ">
                    <?php edit_post_link( __( 'Editar', 'biboka' ), '<span class="edit-link">', '</span>' ); ?>    
                    <div class="content-area corpo">
                    <?php  
                        // the_content(); 
                        // 13-07-23 - Ajuste do Erro de &nbsp U+00a0 (caractere de espaço em branco indesejado);
                        $content = get_the_content();
                        $content = str_replace(' ', ' ', $content); 
                        echo apply_filters('the_content', $content);
                        ?>                          
                    </div>

                    <?php if(!getPaginasFixas()): ?>       
                        <div class="tags-da-pagina">                        
                            <div class="barra-cor">
                                <div class="bandeirinha-area tx-roxo">
                                    <div class="bandeira-a"></div>
                                    <div class="bandeira-b"></div>
                                </div>
                                <div class="texto-bandeira tx-roxo tag">
                                    Tags:
                                </div>
                            </div> 

                            <?php
                            $tags_list = get_the_tag_list( '', _x( '<span>,</span>', 'Used between list items, there is a space after the comma.', 'refletir' ) );
                            if ( $tags_list ){
                                printf( '<div class="tags-links">%2$s</div>','',$tags_list);
                            }
                         ?> 
                        </div>
                        <?php
                        $corre_post = get_post_meta( get_the_ID(), '_corre_post', true );
                        if (strtoupper($corre_post)==="SIM"):  ?>
                            <div class="anuncio-correspondente">
                                <?php if ($retorno["tipo"]!="phone"): ?>
                                    <?php get_template_part( 'template-parts/anuncios/anuncio-corespondente-desktop'); ?> 
                                <?php else: ?>
                                    <?php get_template_part( 'template-parts/anuncios/anuncio-corespondente-mobile'); ?>
                                <?php endif;?>
                            </div>
                        <?php endif; ?>                    
                    <?php endif; ?>                        
                </div><!-- corpo do conteudo -->               
            </div> <!-- row -->
       </div>    
    <?php if(!getPaginasFixas()): ?>       
        <div class="w100 block float-left estilo-container bg-cinza auto-conhecimento">         
            <div class="page-size center-margem">
                <h2 class="text-center">Recomendamos para você</h2>
                <div class="recomendamos">                 
                    <?php
                        if(do_shortcode( '[manual_related_posts]' ))
                            echo do_shortcode( '[manual_related_posts]' );
                        else
                            fn_vc_podera_gostar( get_post_type(), get_the_ID() , $categoria, $posttags,3);
                    ?>
                </div>
            </div>
        </div>
        <div class="page-size center-margem">
            <div id="area_inferior" class="row colunas2">             
                <div class="col-1">                                        
                    <div id="quero_comentar" class="comentarios">
                        <?php if (comments_open() || get_comments_number() ) :
                                comments_template();
                        endif;?>    
                    </div>
                    <div id="single_rodape2">single.php</div>                    
                </div>
            </div>
        </div>

    <?php endif; ?>   

<?php endwhile; ?>         

    <?php if(!getPaginasFixas()): ?> 
        <!-- <div class="w100 block float-left  mensagens-do-bem single">
            <div class="page-size center-margem">
                <div class="icone-assine-news"></div>   
                <h2 class="text-center">Mensagens do Bem</h2>         
                <?php //get_template_part( 'template-parts/index/mensagens-do-bem' ); ?>
            </div>
        </div> -->
    <?php endif; ?>  
</div>

<?php get_footer(); ?>