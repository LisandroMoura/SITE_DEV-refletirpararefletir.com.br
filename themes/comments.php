<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * O texto: 
 *  * Seu comentário está aguardando moderação. Esta é uma pré-visualização, seu comentário ficará visível assim que for aprovado.
 *  está no arquivo de tradução do wordpress pt_BR.po
 */
 
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
 
	if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( ! have_comments() ) : ?>
<div class="comments-title">
    <div class="comments-icone lazy"
        style="
		background-position-x: 0px;
		background-position-y: -87px;	
		 background-color:#fff;"
        data-src="/wp-content/themes/refletir2023/images/elementos/elementos2019.webp"></div>
    <div class="comments-label">
        <h3>Comentários</h3>
    </div>
</div>
<?php endif; ?>

<?php if ( have_comments() ) : ?>
<div class="comments-title">
    <div class="comments-icone lazy"
        style="
		background-position-x: 0px;
		background-position-y: -87px;	
		 background-color:#fff;" data-src="/wp-content/themes/refletir2023/images/elementos/elementos2019.webp"></div>
    <?php
    printf(_nx('<div class=comments-label> <h3>Comentário (%1$s)</h3></div>', '<div class=comments-label> <h3>Comentários (%1$s)</h3></div>', get_comments_number(), 'comments title', 'biboka'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
    ?>
</div>

<ol class="comment-list">
    <?php
    wp_list_comments([
        'style' => 'ol',
        'short_ping' => true,
        'avatar_size' => 64,
    ]);
    ?>
</ol><!-- .comment-list -->


<div class="clear"></div>
<div class="comment-navigation">
    <div class="older"><?php previous_comments_link(); ?></div>
    <div class="newer"><?php next_comments_link(); ?></div>
</div>
<?php else : // this is displayed if there are no comments so far ?>

<?php if ( comments_open() ) : ?>
<!-- If comments are open, but there are no comments. -->

<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments">Commentários fechados.</p>

<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">



    <div class="cancel-comment-reply">
        <small><?php cancel_comment_reply_link(); ?></small>
    </div>

    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    <p>You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

        <?php if ( is_user_logged_in() ) : ?>

        <p class="logadocomo">Você está logado como: <a
                href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a
                href="<?php echo wp_logout_url(get_permalink()); ?>" title="Sair">sair &raquo;</a></p>

        <p>
            <textarea name="comment" id="comment" cols="100" rows="10" tabindex="4" placeholder="Deixe seu recado :)"
                aria-label="Deixe seu recado :)"></textarea>
        </p>


        <?php else : //this is where we setup the comment input forums ?>

        <div class="campo nome">
            <input type="text"  class="requerid" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22"
                tabindex="1" <?php if ($req) {
                    echo "aria-required='true'";
                } ?> placeholder="Nome (*)" />
        </div>
        <div class="campo email">
            <input type="text"  class="requerid" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22"
                tabindex="2" <?php if ($req) {
                    echo "aria-required='true'";
                } ?> placeholder="Email (*)" />
        </div>
        <div>
            <textarea name="comment" class="requerid" id="comment" cols="100" rows="10" tabindex="4" placeholder="Deixe seu recado :)"
                aria-label="Deixe seu recado :)"></textarea>
        </div>
        <?php endif; ?>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
        
        <div id="validateForm"></div>

        <p class="campos_obrigatorios"><span>O seu email <strong>não será</strong> publicado. Campos com * são
                obrigatórios ;)</span></p>
        <p><input name="enviarForm" type="submit" id="enviarForm" tabindex="5" value="Comentar!" /></p>
    </form>
    <?php endif; // If registration required and not logged in ?>
</div>

<script src="<?php echo bloginfo('template_url'); ?>/js/formValidate.min.js" defer></script>
<?php endif; // if you delete this the sky will fall on your head ?>
