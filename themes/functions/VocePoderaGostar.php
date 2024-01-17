<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: VocePoderaGostar.php
 * Autor: liZi by_pandora.io
 * Objetivo: Função de relacionados - usado na single e nas pages
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *--------------------------------------------------------------------------------------------------------------*/
if (!function_exists('categoriaInHtml')):
    function categoriaInHtml($idPost)
    {
        $category = get_the_category($idPost);
        $catSlug  = "reflexao";
        if(isset($category[0]))
            $catSlug  =$category[0]->slug;
        $cont = '<div class="publicacao-categoria w100 bold tx-' . $catSlug  . '">';
        $categories_list = get_the_category_list(_x(', ', 'Categorias do refletir.', 'refletir'), '', $idPost);
        if ($categories_list) {
            $cont .= '<span class="cat-links tx-' . $catSlug  . '">';
            $cont .= $categories_list;
            $cont .= '</span>';
        }
        $cont .= '</div>';
        return $cont;
    }
endif;

if (!function_exists('fn_vc_podera_gostar')):
    function fn_vc_podera_gostar($post_type, $id, $categoria, $tag, $nReg)
    {
        if ("resultado" == $post_type)
            $post_type = "testes";

        //tratamento das tags  
        $tags = wp_get_post_tags($id);
        $tag_ids= [];
        if ($tags) {
            $tag_ids = array();
            foreach ($tags as $individual_tag)
                $tag_ids[] = $individual_tag->term_id;
        }
        //Tentar buscar as tags primeiramente.
        $args = array(
            'post_type' => $post_type,
            'order' => 'DESC',
            'orderby ' => 'rand',
            'tag__in' => $tag_ids,
            'post__not_in' => array($id),
            'posts_per_page' => $nReg,
            'showposts' => $nReg,
            'ignore_sticky_posts' => $nReg
        );
        $podera = new WP_Query($args);
        // iniciar as variaveis da temp;
        $temptable = array();
        $falta = 0;
        $x = 0;
        $srcImage = "";
        $buscamais = false;
        //1º teste: verificar com as tags
        /*------------------------------------------------------------------    
        ------------------------------------------------------------------ */
        if ($podera->have_posts()):
            while ($podera->have_posts()):
                $podera->the_post();
                if (has_post_thumbnail()) {
                    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
                    if (!$large_image_url)
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'mobile');
                    if (!$large_image_url)
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                    if (!$large_image_url)
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    if (isset($large_image_url[0]))
                        $srcImage = $large_image_url[0];
                }
                $x++;
                $temptable[$x] = array(
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                    'image' => $srcImage,
                    'link' => get_permalink()
                );
            endwhile;
            wp_reset_query();
        else:
        endif;
        // Fim do 1º teste: verificar com as tags
        /*------------------------------------------------------------------    
        ------------------------------------------------------------------ */
        //testar se a tempTable está setadas, se sim testar para ver se o numero de registro esta Ok
        if (isset($temptable)) {
            if (count($temptable) < $nReg) {
                $buscamais = true;
                $falta = $nReg - count($temptable);
            }
        }
        //caso a temp Não estiver Setada, buscar por Categorias
        if (!isset($temptable))
            $buscamais = true;
        $idJatem = array($id);
        if (isset($temptable) && $falta > 0):
            $idJatem = array($id);
            foreach ($temptable as $campos) {
                array_push($idJatem, $campos['id']);
            }
        endif;
        // 2º teste: verificar por categorias
        /*------------------------------------------------------------------    
        ------------------------------------------------------------------ */
        //verificar a quantidade que falta buscar 
        if ($buscamais) {
            if ($falta == 0)
                $falta = $nReg;
            $args = array(
                'post_type' => 'post',
                'order' => 'ASC',
                'post__not_in' => $idJatem,
                'cat' => $categoria,
                'posts_per_page' => $falta,
                'showposts' => $falta
            );
            $podera = new WP_Query($args);
            if ($podera->have_posts()):
                while ($podera->have_posts()):
                    $podera->the_post();
                    if (has_post_thumbnail()) {
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
                        if (!$large_image_url)
                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'mobile');
                        if (!$large_image_url)
                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                        if (!$large_image_url)
                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                        if (isset($large_image_url[0]))
                            $srcImage = $large_image_url[0];
                    }

                    $x++;
                    $temptable[$x] = array(
                        'id' => get_the_ID(),
                        'title' => get_the_title(),
                        'image' => $srcImage,
                        'link' => get_permalink()
                    );
                endwhile;
                wp_reset_query();
            else:
            endif;
        }
        // Fim do 2º teste: verificar por categorias
        /*------------------------------------------------------------------    
        ------------------------------------------------------------------ */
        ?>
        <?php if (isset($temptable)): $cont=0; ?>
            <?php foreach ($temptable as $campos) { ?>
                <?php $cont++; ?>
                <ul class="publicacoes recomendado col<?php echo $cont; ?>">
                    <li>
                        <div class="area_da_img">
                            <a class=" lazy-hidden cimg" href="<?php echo $campos['link']; ?>" title="<?php echo $campos['title']; ?>">
                                <img alt="<?php echo $campos['title']; ?>" title="<?php echo $campos['title']; ?>"
                                    class="block simg lazy-hidden" width="375" height="246" data-src="<?php echo $campos['image'] ?>">
                            </a>
                        </div>
                        <div class="texto">
                            <?php echo categoriaInHtml($campos['id']); ?>
                            <p class="font18">
                                <a href="<?php echo $campos['link']; ?>" title="<?php echo $campos['title']; ?>"><?php echo $campos['title']; ?> </a>
                            </p>
                        </div>
                    </li>
                </ul>
            <?php } ?>
        <?php endif;
    }
endif;