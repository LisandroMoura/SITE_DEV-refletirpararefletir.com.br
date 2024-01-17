<script>   
/* <![CDATA[ */
<?php
    $post_type = array('post','textos','autores','frases', 'testes');
        $args = array(
            'post_type'              => $post_type,        
            'order'                  => 'DESC' ,                              
            'posts_per_page'         => '6',
            'showposts'              => '6',
            'posts_per_archive_page' => '6',
            'ignore_sticky_posts'    => 6,   
            'meta_query' => array(
                   array(
                       'key'    => '_view_home',
                       'value'  => '1',
                       'compare'=> 'IN',
                )
            )
        );
        $coluna=0;
        $cont=0;

        ?>        
        var novidades = new Array ();novidades[1] = new Array ();novidades[2] = new Array ();novidades[3] = new Array ();        
        <?php $qry = new WP_Query( $args); ?>
        <?php if ( $qry->have_posts() ) : while ( $qry->have_posts() ) : $qry->the_post(); ?>   
            <?php $cont++;?>
            <?php $srcImage=get_image("thumb");?>
            <?php $tagStr = "tag";?>
            <?php $coluna++;?>  
                <?php                 
                $category = get_the_category();                                                    
                $categories_list  = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'refletir'));
               // 2) CORES_NAS_TAGS: colocar o ID do post no span da categoria
                if ( $categories_list  ) {
                    $corTag = "tx-".$category[0]->slug;
                }
                ?>                          
                novidades[<?php echo $coluna;?>].push(
                    Array(                        
                        <?php echo $cont; ?>, 
                        <?php echo get_the_ID(); ?>, 
                        "<?php echo get_permalink(); ?>", 
                        "<?php echo limitar(get_the_title(), 140); ?>", 
                        "<?php echo $srcImage ?>", 
                        '<?php echo $categories_list; ?>',
                        "<?php echo $corTag; ?>"
                        )
                );        
            <?php if ($coluna==3) $coluna=0;?>            
        <?php endwhile; else: endif; ?>        
        <?php wp_reset_query(); ?>  
        /* ]]> */
 </script>
<div class="saca"><ul class="novidades publicacoes col1"></ul><ul class="novidades publicacoes col2"></ul><ul class="novidades publicacoes col3"></ul></div>