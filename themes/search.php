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
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;   
global $wp_query; 
get_header();
$col=1;
?>	
<div class="search-page default-page  search.php ">
    <div class="page-size center-margem">
        <div class="w100 single">
            <?php if ( have_posts() ) : 
                 //id_da Tag
                ?>
                <header class="page-header">
                    <p class="w100 text-center block mt-60 mb-20 font18">
                    Foram encontrado(s) <b><font class="font20 rosa"><?php echo $wp_query->found_posts; ?></font></b> resultados relacionados ao termo <font class="rosa bold"> " <?php echo get_search_query(); ?> "</font>
                    </p>
                    <p class="align-center text-center">
                        <i><strong>Super Dica:</strong> Use aspas duplas <strong>" "</strong> para ser mais específico na pesquisa.</i>
                    </p>
                </header> 

                <?php 
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
            <?php else: ?>
                <header class="page-header">
                    <p class="w100 text-center block mt-60 mb-20 font18">
                    Não encontramos nenhuma referência em nossos bancos de dados sobre o termo: <font class="rosa bold"> " <?php echo get_search_query(); ?> "</font>
                    </p>
                    </br>
                    </br></br>
                    <p class="align-center text-center">
                        <i><strong>Super Dica!</strong> Use aspas duplas <strong>" "</strong> para ser mais específico na pesquisa.</i>
                    </p>
                </header> 
                <div class="div-search-form align-center text-center mb-60">
                    <?php get_search_form(); ?>
                </div>
                <div class="w100 block caixa">  
                    <?php get_template_part( 'template-parts/index/publicacoes' ); ?>
                </div>
            <?php endif; ?>
            <ul class="publicacoes core col<?php echo $col; ?>">
                <?php
                    $cont = 0;
                    $nreg = 0;
                ?>
                <?php while ( have_posts() ) : the_post(); ?>                     
                    <?php $cont++; $nreg++; ?>
                    <?php $srcImage=get_image("thumb"); $classe_final="";
                    if($nreg == $wp_query->posts_per_page || $nreg == $wp_query->post_count || $nreg == $wp_query->found_posts)
                        $classe_final="casse-final";
                    ?>
                    <li class=" item-<?php echo $cont . ' ' . $classe_final; ?>">                   
                        <div id="post-<?php echo get_the_ID(); ?>" class="w100">
                            <a class="cimg" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                <img alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="simg" src="<?php echo $srcImage ?>">
                            </a>                        
                        </div> 
                        <div class="texto">
                            <?php echo categoriaInHtml(get_the_ID()); ?>                            
                            <p class="font18"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                <?php echo get_the_title(); ?>
                            </a></p>
                        </div>                
                    </li>
                    <?php if($cont==$nitensPorColuna&& $col!=3):
                        $col++;    
                        echo '</ul><ul class="publicacoes core col'.$col.'">';
                        $cont=0; 
                    endif; ?>
                <?php endwhile; ?>
            </ul>
             <div class="caixa mb-60 container-da-paginacao">
                <div class="w100 text-center ">
                    <?php $posts_per_page = get_option('posts_per_page'); ?>
                    <?php navegacao_paginada($paged,$posts_per_page); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>