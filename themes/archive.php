<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, biboka
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage biboka
 * @since biboka 1.0
 */
global $wp_query; 
$nreg=0;
$id_da_tag="";
 $col=1;
get_header(); ?>	
<div class="w100 block float-left default-page">
    <div class="page-size center-margem">
        <div class="w100 single archive.php"> 
            <?php if ( have_posts() ) : ?>
                <?php                
                //id_da Tag
                if (is_tag()):
                    $tags = get_terms( array('taxonomy' => 'post_tag', 'slug' => $wp_query->query_vars["tag"],));
                    foreach($tags as $tag) {                                                                
                        $id_da_tag= $tag->term_id;
                }
                endif;
                $paginaAtual     = (get_query_var('paged')) ? get_query_var('paged') : 1;        
                $max_num_pages   = $wp_query->max_num_pages;
                $posts_per_page  = (get_query_var('posts_per_page')) ? get_query_var('posts_per_page') : 30; 
                $nitensPorColuna = 10;
                if (intval($max_num_pages) == intval($paginaAtual)):                    
                    $npages  = intval(ceil($wp_query->found_posts / 30));                
                    $resto = $posts_per_page * ($npages-1);
                    $resto = $wp_query->found_posts - $resto;
                    $nitensPorColuna = intval(ceil ($resto/3));
                endif;                
                ?>
                <header class="page-header caixa mt-60">                            
                    <?php if ('testes' == get_post_type() && !is_tag()) :
                        $obj = get_post_type_object( 'testes' );
                        $description = esc_html( $obj->labels->description);
                        echo '<div class="taxonomy-description"><p>'. $description .'</p></div>';
                    ?>
                    <?php else: ?>
                        <?php the_archive_description( '<div class="taxonomy-description">','</div>');?>
                    <?php endif; ?>
                </header>
            <?php endif; ?>
            <ul class="publicacoes core col<?php echo $col; ?>">
                <?php $cont=0; $ncont=0; ?>
                <?php while ( have_posts() ) : the_post(); ?>                     
                    <?php 
                        
                        $cont++; $nreg++; $ncont++;
                        $srcImage=get_image("thumb"); $classe_final="";                    

                        if($nreg == $wp_query->posts_per_page || 
                           $nreg == $wp_query->post_count || 
                           $nreg == $wp_query->found_posts)
                           $classe_final="casse-final";
                    ?>
                    <li class=" item-<?php echo $cont . ' ' . $classe_final; ?>">                   
                        <div id="post-<?php echo get_the_ID(); ?>" class="w100">
                            <a class="cimg" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                <img alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" width="375" height="246" class="block lazy-hidden simg" data-src="<?php echo $srcImage ?>">
                            </a>                        
                        </div> 
                        <div class="texto">
                            <?php echo categoriaInHtml(get_the_ID()); ?>                            
                            <p class="font18"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                <?php echo get_the_title(); ?>
                            </a></p>
                        </div>                
                    </li>
                    <?php 
                        if($cont==$nitensPorColuna&& $col!=3):
                        $col++;
                        echo '</ul><ul class="publicacoes core col'.$col.'">';
                        $cont=0;
                    endif; ?>
                <?php endwhile; ?>
            </ul>
            <?php
            $category                = get_the_category();  
            if(isset($category[0])){
                $catName                 = $category[0]->slug;
                $first                   = end($category);
                $id_cat_pai              = $first->category_parent;
                $aux                     = get_category_parents($category[0]->term_id, false, ',', true);    
            }
            else{
                $catName                 = "Reflexão";
                $first                   = null;
                $id_cat_pai              = 1;
                $aux                     = null;    
            } 
            if(is_array($aux)){$aux1 = explode("," , $aux);}

            if(isset($aux1[0])) $catName    = $aux1[0];            
            if($id_da_tag):
                $args  = array(
                   'post_type'           => 'arvore', //'category_name' => $vai,       
                   'tag__in'             => $id_da_tag, 
                   'ignore_sticky_posts' => 1,
                   'post_status'         => 'publish',  'orderby' => 'date' , 'posts_per_page'    => '1');
                $arvs = new WP_Query( $args);                        
                if ($arvs->have_posts() ) : while ( $arvs->have_posts() ) : $arvs->the_post();                 
                    $class_titulo = get_the_title();
                    $category     = get_the_category();
                    if(isset($category[0]))
                        $first        = end($category);                    
                endwhile; wp_reset_query(); else: endif;
            endif;
            ?>
            <div class="caixa mb-60">
                <?php 
                    if(isset($category[0]))
                        echo arvoreDeTags($id_cat_pai, $category[0]->term_id, "bgbranco");
                ?>                
            </div>
            <div class="caixa mb-60 container-da-paginacao">
                <div class="w100 text-center">
                    <?php $posts_per_page = get_option('posts_per_page'); ?>
                    <?php navegacao_paginada($paged,$posts_per_page); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>