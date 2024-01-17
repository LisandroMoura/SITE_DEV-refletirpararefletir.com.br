<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: shared.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Template responsável pelp texto refazer o teste
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 05-07-23 - Separação das includes por papéis mais separados
 *--------------------------------------------------------------------------------------------------------------*/
if ('resultado' != get_post_type()) return ;
$_id_do_teste     = $args["_id_do_teste"] ?? false;
$shared     = $args["shared"] ?? false;
$link       = $args["link"] ?? "null";
$srcImage   = $args["srcImage"] ?? "null";
$titulo     = $args["titulo"] ?? "null";
$cont       = $args["cont"] ?? "null";
$redirect   = $args["redirect"] ?? "null";
?>
<?php if($shared == 'true'): ?>
<h3 class="que-tal-fazer-o-teste">
    <a href="<?php echo get_permalink($_id_do_teste); ?>" class="bt-fazer-o-teste">Fazer o teste!</a>
</h3>
<?php else: ?>
<div class="que-tal-compartilhar-o-teste">
    <?php
    echo '<a rel="nofollow" target="_blank" href="https://www.facebook.com/dialog/feed?app_id=183867158420383&link=' . $link . '&picture=' . $srcImage . '&name=' . $titulo . '&caption=Refletir%20para%20Refletir&description=' . $cont . '&redirect_uri=' . $redirect . '/&display=popup">';
    ?>
    <img data-src="<?php bloginfo('template_url'); ?>/images/gostou_do_resultado.webp"
        alt="Gostou do Resultado? então compartilha!" width="459" height="113"
        class="lazy-hidden">
    </a>
    <a href="<?php echo get_permalink($_id_do_teste); ?>" class="bt-fazer-o-teste">Refazer o teste!</a>
</div>
<?php endif; ?>