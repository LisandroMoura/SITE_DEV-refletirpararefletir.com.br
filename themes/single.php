<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: single.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Template responsável pelas seguintes singles do site:
 *           - single post_type
 *           - single resultado
 *           - single testes
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 05-07-23 - Separação das includes por papéis mais separados
 *     >> 13-07-23 - Ajuste do Erro de &nbsp U+00a0 (caractere de espaço em branco indesejado);
 *     >> 31-07-23 - Corrigido alguns warnings;
 *--------------------------------------------------------------------------------------------------------------*/
if ('resultado' == get_post_type()):
    get_template_part('template-parts/quiz/resultado-avaliacao');
endif;

$arrTags = get_the_tags() ?? [];
if(!$arrTags) $arrTags = [];

$fixedSize612 = false;
foreach ($arrTags as $key => $tag) {
    if ($tag->slug == 'frases') {
        $fixedSize612 = true;
    }
}
$retorno = function_exists('biboka_detect_Dispositivo') ? biboka_detect_Dispositivo() : ['tipo' => 'mobile']; 
$posttags = '';
$categoria = '';
$terms = get_the_category(get_the_ID());
if (isset($terms[0])) {
    foreach ($terms as $term) {
        if ($term->name != 'destaque') {
            $categoria .= $term->term_id . ',';
            $id_cat = $term->term_id;
        }
    }
}
$html         = $_GET['html'] ?? '';
$shared       = $_GET['shared'] ?? '';
$redirect     = get_permalink();
$_id_do_teste = get_post_meta( get_the_id(), '_id_do_teste', true); 


$link         = urlencode(get_permalink($_id_do_teste).'?shared=true');                       
$titulo       = get_the_title();
$texto        = limitar(get_the_excerpt(),140);                           
$texto        = stripcslashes($texto);  
$cont         = strip_tags($texto);

$avaliar = false;
if ('testes' == get_post_type()):
    if ('avaliar' == get_post_meta(get_the_ID(), '_tipo', true)) {
        $avaliar = true;
    }
endif;
get_header(); 

?>
<div class="single-page posts.php">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="page-size center-margem">
            <?php $srcImage = get_image('full'); ?>
            
            <div class="row">
                <div class="col-1 conteudo ">
                    <?php edit_post_link(__('Editar', 'biboka'), '<span class="edit-link">', '</span>'); ?>
                    <div class="content-area corpo">
                        <?php get_template_part('template-parts/single/pontuacaoHtml',null,['html' => $html]); ?>
                        <?php
                            $content = get_the_content();
                            // $content = str_replace('<img ', '<img loading="lazy" ', $content);
                            // if ($fixedSize612) {
                            //     $content = str_replace('<img ', '<img class="frases alignnone block" loading="lazy" ', $content);
                            // } else {
                            //     $content = str_replace('<img ', '<img class="alignnone block hauto" loading="lazy" ', $content);
                            // }
                            $content = str_replace(' ', ' ', $content); //ajuste do erro Erro de &nbsp U+00a0 
                            echo apply_filters('the_content', $content);
                        ?>
                        <?php if ('testes' == get_post_type()):
                            if ($avaliar) get_template_part('template-parts/quiz/loop-quiz-avaliacao');
                            else get_template_part('template-parts/quiz/loop-quiz');
                        endif; ?>
                        <?php get_template_part('template-parts/single/shared',null,[
                            'shared' => $shared,
                            'redirect' => $redirect,
                            '_id_do_teste' => $_id_do_teste,
                            'link' => $link,
                            'titulo' => $titulo,
                            'texto' => $texto,
                            'cont' => $cont,
                            ]); ?>
                    </div>

                    <?php
                        $corre_post = get_post_meta( get_the_ID(), '_corre_post', true );
                        if (strtoupper($corre_post)==="SIM"):  ?>
                            <div class="anuncio-correspondente">
                                <?php if ($retorno["tipo"]!="phone"): ?>
                                <?php get_template_part('template-parts/anuncios/anuncio-corespondente-desktop'); ?>
                                <?php else: ?>
                                <?php get_template_part('template-parts/anuncios/anuncio-corespondente-mobile'); ?>
                                <?php endif;?>
                            </div>
                    <?php endif; ?>

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
                        $tags_list = get_the_tag_list('', _x('<span>,</span>', 'Used between list items, there is a space after the comma.', 'refletir'));
                        if ($tags_list) {
                            printf('<div class="tags-links">%2$s</div>', '', $tags_list);
                        }
                        ?>
                    </div>
                </div> 
            </div> 
        </div>
        <div class="w100 block float-left estilo-container bg-cinza auto-conhecimento">
            <div class="page-size center-margem">
                <h2 class="text-center">Recomendamos para você</h2>
                <div class="recomendamos">
                    <?php
                        if (do_shortcode('[manual_related_posts]')) {
                            echo do_shortcode('[manual_related_posts]');
                        } else {
                            fn_vc_podera_gostar(get_post_type(), get_the_ID(), $categoria, $posttags, 3);
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="page-size center-margem">
            <div id="area_inferior" class="row colunas2">
                <div class="col-1">
                    <div id="quero_comentar" class="comentarios">
                        <?php if (comments_open() || get_comments_number()):
                            comments_template();
                        endif; ?>
                    </div>
                    <div id="single_rodape2">single.php</div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <div class="lazy w100 block float-left  mensagens-do-bem single" style="background-size: cover; background-color: rgb(255, 255, 255);background-color: rgb(174, 171, 190);" data-src="/wp-content/themes/refletir2023/images/bgs/bg_headerv01.jpg">
        <!-- <div class="page-size center-margem">
            <div class="icone-assine-news"></div>
            <h2 class="text-center">Mensagens do Bem</h2>
            <?php //get_template_part('template-parts/index/mensagens-do-bem'); ?>
        </div> -->
    </div>
</div>
<?php get_footer(); ?>
