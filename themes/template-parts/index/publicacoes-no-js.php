<!-- <div class="area-anuncio"><?php //get_template_part( 'template-parts/anuncios/anuncio-grande' ); 
                            ?></div> -->

<ul class="novidades publicacoes-no-js col1">
    <?php
    $post_type = array('post', 'textos', 'autores', 'frases', 'testes');
    $args = array(
        'post_type'              => $post_type,
        'order'                  => 'DESC',
        'posts_per_page'         => '6',
        'showposts'              => '6',
        'posts_per_archive_page' => '6',
        'ignore_sticky_posts'    => 6,
        'meta_query' => array(
            array(
                'key'    => '_view_home',
                'value'  => '1',
                'compare' => 'IN',
            )
        )
    );

    ?>
   
    <?php $qry = new WP_Query($args); $cont=0; ?>
    <?php if ($qry->have_posts()) : while ($qry->have_posts()) : $qry->the_post(); ?>
            <?php $cont++; ?>
            <?php $srcImage = get_image("thumb"); ?>
            <li>
                <div class="area_da_img">
                    <a class="cimg" href="<?php echo get_permalink(); ?>" title="<?php echo limitar(get_the_title(), 80); ?> ">
                        <span class="load"></span>
                        <img alt="<?php echo limitar(get_the_title(), 80); ?> " width="375" height="246" class="simg lazy-hidden" data-src="<?php echo $srcImage ?>">
                    </a>
                </div>
                <div class="texto">
                    <div class="publicacao-categoria w100 bold tx-para-refletir">
                        <?php
                        $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'refletir'));
                        if ($categories_list) {
                            printf(
                                '<span class="cat-links">%2$s</span>',
                                _x('Categories', 'Used before category names.', 'refletir'),
                                $categories_list
                            );
                        }
                        ?>
                    </div>
                    <p class="font18">
                        <a href="<?php echo get_permalink(); ?>" title="<?php echo limitar(get_the_title(), 80); ?> "><?php echo limitar(get_the_title(), 80); ?> </a>
                    </p>
                </div>
            </li>
    <?php endwhile;
    else : endif; ?>
    <?php wp_reset_query(); ?>
</ul>