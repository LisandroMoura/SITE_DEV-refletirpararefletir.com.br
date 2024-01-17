<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: Auxiliares.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Funções auxiliares excclusivas da template
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *--------------------------------------------------------------------------------------------------------------*/
if (!function_exists('getPaginasFixas')):
    function getPaginasFixas()
    {
        $lreturn = false;
        $arr = ['9465', '6350', '9460', '9463', '8750', '15631'];
        if (is_page($arr)):
            $lreturn = true;
        endif;
        return $lreturn;
    }
endif;

if (!function_exists('getTipoDePagina')):
    function getTipoDePagina($var = null)
    {
        $tipoDePagina = 'default';
        $arr = ['9465', '6350', '9460', '9463', '8750', '15631'];
        $teste = false;

        if (is_attachment() || is_author() || is_archive() || is_tag() || is_category() || is_404() || is_search()) {
            $tipoDePagina = 'archive';
        }

        if (is_single()) {
            $tipoDePagina = 'single';
        } elseif (is_page()) {
            $tipoDePagina = 'page';
        }

        if (is_page($arr)) {
            $tipoDePagina = 'fixa';
        }

        if ('testes' == get_post_type()) {
            $tipoDePagina = 'testes';
        }

        if ('frases' == get_post_type()) {
            $tipoDePagina = 'single';
        }

        if ('textos' == get_post_type()) {
            $tipoDePagina = 'single';
        }

        if (is_home() || is_front_page()) {
            $tipoDePagina = 'default';
        }

        return $tipoDePagina;
    }
endif;

if (!function_exists('entry_date')):
    function entry_date()
    {
        if (has_post_format(['chat', 'status'])) {
            $format_prefix = _x('%1$s on %2$s', '1: post format name. 2: date', 'refletir');
        } else {
            $format_prefix = '%2$s';
        }
        $date = sprintf(
            '<span class="date"><a href="#" title="%2$s" rel="bookmark"><time class="entry-date date updated" itemprop="dateModified" datetime="%3$s">%4$s</time></a></span>',
            esc_url(get_permalink()),
            esc_attr(sprintf(__('Permalink to %s', 'refletir'), the_title_attribute('echo=0'))),
            //esc_attr( get_the_date( 'd/m/y' ) ),
            esc_attr(get_the_date('Y-m-d H:i:s')),
            esc_html(sprintf($format_prefix, get_post_format_string(get_post_format()), get_the_date('d.m.Y'))),
        );
        return $date;
    }
endif;

if (!function_exists('get_image')):
    function get_image($tipo)
    {
        $srcImage = '';
        if (has_post_thumbnail()) {
            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
            if (isset($large_image_url[0])) {
                $srcImage = $large_image_url[0];
            }
        }

        if ($tipo === 'only_full') {
            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
            if (isset($large_image_url[0])) {
                $srcImage = $large_image_url[0];
                return $srcImage;
            }
        }

        if ($tipo != 'thumb'):
            if (has_post_thumbnail()) {
                $retorno = function_exists('biboka_detect_Dispositivo') ? biboka_detect_Dispositivo() : ['tipo' => 'mobile']; 
                if ($retorno['tipo'] == 'phone') {
                    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'mobile');
                    if (!$large_image_url) {
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                    }
                } else {
                    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                }
                if (isset($large_image_url[0])) {
                    $srcImage = $large_image_url[0];
                }
            }
        endif;
        return $srcImage;
    }
endif;

if (!function_exists('get_image_mob')):
    /*Busca moblile images*/
    function get_image_mob()
    {
        $mob_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'mobile');
        $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

        $srcImage = $mob_image_url ?? $full_image_url;
        
        if (isset($mob_image_url[0])) {
            $srcImage = $mob_image_url[0];
        }

        if(isset($full_image_url[0]))
            if ($srcImage == $full_image_url[0]):
                $med_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
                $srcImage = $med_image_url[0];
            endif;
            
        $imagem1 = class_exists("BibokaMultiplasImagens") ? BibokaMultiplasImagens::get_post_thumbnail_url(get_post_type(), 'img1-page') : null;
        if ($imagem1) {
            $srcImage = $imagem1;
        }
        return $srcImage;
    }
endif;

if (!function_exists('getProducao')):
    function getProducao()
    {
        $host = $_SERVER['HTTP_HOST'];
        if ($host != 'www.refletirpararefletir.com.br' && $host != 'refletirpararefletir.com.br') {
            $l = false;
        } else {
            $l = true;
        }
        return $l;
    }
endif;

if (!function_exists('arvoreDeTags')):
    function arvoreDeTags($pai, $filho, $bg)
    {
        $lista = '';
        $count = 0;
        $nomecor ="";
        $class_titulo ="";

        wp_reset_query();
        //if ($pai && $filho) {
        $args = [
            'post_type' => 'arvore', //'category_name'   => $vai,
            'category__in' => $filho,
            'ignore_sticky_posts' => 1,
            'post_status' => 'publish',
            'orderby' => 'date',
            'posts_per_page' => '1',
        ];
        $arv = new WP_Query($args);
        if (!$arv->have_posts()) {
            $args = [
                'post_type' => 'arvore', //'category_name'   => $vai,
                'category__in' => $pai,
                'ignore_sticky_posts' => 1,
                'post_status' => 'publish',
                'orderby' => 'date',
                'posts_per_page' => '1',
            ];
            $arv = new WP_Query($args);
        }
        //}
        if ($arv->have_posts()):
            while ($arv->have_posts()):
                $arv->the_post();
                $count++;
                $class_titulo = get_the_title();
                $_content = $arv->get_the_content();
                $cor = get_post_meta(get_the_ID(), 'cor', true);
                $nomecor = get_post_meta(get_the_ID(), 'nome', true);
                $args = [
                    'smallest' => 8,
                    'largest' => 22,
                    'unit' => 'pt',
                    'number' => 45,
                    'format' => 'flat',
                    'separator' => "\n",
                    'post_type' => 'arvore',
                    'orderby' => 'name',
                    'taxonomy' => 'category',
                    'order' => 'ASC',
                    'exclude' => null,
                    'include' => null,
                    //'topic_count_text_callback' => default_topic_count_text,
                    'link' => 'view',
                    'echo' => true,
                    'child_of' => null, // see Note!
                ];

                $tabela_tags = get_the_tags();
                if ($tabela_tags) {
                    // 1 RE-Ordenar a tabela pelo numero de itens
                    $ii = 0;
                    $menor_valor = 0;
                    $tabela_temp = $tabela_tags;
                    foreach ($tabela_temp as $registro) {
                        $name[$ii] = $registro->name;
                        $contar[$ii] = $registro->count;
                        $ii++;
                    }
                    //ordenar a temp pelo valor de cont
                    array_multisort($contar, SORT_DESC, $name, SORT_ASC, $tabela_temp);
                    $ii = 0;
                    foreach ($tabela_temp as $registro) {
                        if ($ii == 0) {
                            $maior_valor = $registro->count;
                        }
                        $ii++;
                        $menor_valor = $registro->count;
                    }
                }
                //aplicar os indices
                $indice[0] = $menor_valor;
                $indice[25] = $maior_valor * 0.25;
                $indice[50] = $maior_valor * 0.5;
                $indice[75] = $maior_valor * 0.75;
                $indice[100] = $maior_valor;

                if ($tabela_tags) {
                    $linhas="";
                    foreach ($tabela_tags as $registro) {
                        $size = $registro->count;
                        if ($registro->count <= $indice[100]) {
                            $stilo = 'font-size:30px; font-weight:400;';
                        }
                        if ($registro->count <= $indice[75]) {
                            $stilo = 'font-size:24px; font-weight:400;';
                        }
                        if ($registro->count <= $indice[50]) {
                            $stilo = 'font-size:18px; font-weight:400;';
                        }
                        if ($registro->count <= $indice[25]) {
                            $stilo = 'font-size:12px; font-weight:400;';
                        }
                        $linhas .= '<li> <a href="' . get_bloginfo('url') . '/tag/' . $registro->slug . '" style="' . $stilo . '">' . $registro->name . ' </a></li>';
                    };
                }
                $lista = '<ul class="arvore-de-tags">' . $linhas . '</ul>';
                if ($_content) {
                    $lista = $_content;
                }
            endwhile;
            wp_reset_query();
        else:
        endif;
        $return =
            '<div class="float-left w100 ' .
            $bg .
            '">
        <div class="tags-da-pagina archive">
                    <div class="bandeirinha-area tx-' .
            $nomecor .
            '">
                      <div class="bandeira-a"></div>
                      <div class="bandeira-b"></div>
                    </div>
                    <div class="texto-bandeira tx-roxo tag">
                      Tags: ' .
            $class_titulo .
            '
                    </div>
        </div>' .
            $lista .
            '</div>';
        if ($lista) {
            return $return;
        } else {
            return '';
        }
    }
endif;

if (!function_exists('limitar')):
    function limitar($_conteudo, $_tamanho)
    {
    //1) Tratamento mais fundo caracter por carcter            
    $contaLetra = 0;
    $x = 0;
    $_retorno="";
    $_texto_quebrado = explode(' ', $_conteudo);
    foreach ($_texto_quebrado as $tq) {
        $_texto = $_texto_quebrado[$x] . ' ';
        //echo $_texto_quebrado[$x] . '<br />'; 
        $x++;
        for ($i = 0; $i < strlen($tq); $i++) {
        //echo '<br>'.$tq[$i];
        $contaLetra++;
        }
        if ($contaLetra <= $_tamanho)
        $_retorno .= $_texto;
        else {
        $_retorno .= '...';
        return $_retorno;
        }
    }
    return $_retorno;
    }
endif;

if (!function_exists('navegacao_paginada')) :
    function navegacao_paginada($page, $posts_per_page)
    {
        global $wp_query;
        $big = 999999999;
        $paginaAtual = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $max_num_pages = $wp_query->max_num_pages;
        echo
        '<div class="paginacao">' .
        paginate_links(
            array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=' . $page,
            'current' => max(1, $page),
            'total' => ceil($wp_query->found_posts / $posts_per_page)
            )
        ) . '</div>';
    }
endif;