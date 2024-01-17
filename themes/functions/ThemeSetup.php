<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: ThemeSetup.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Hooks específicos para o Setup da template
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *--------------------------------------------------------------------------------------------------------------*/
if (!function_exists('refletir_setup')):
    function refletir_setup()
    {
        add_theme_support('html5', ['search-form', 'comment-form', 'comment-list']);
        add_theme_support( 'post-thumbnails' );
        add_image_size('mobile', 404, 480, true);
        // Load default block styles.
        add_theme_support('wp-block-styles');

        // Add support for responsive embeds.
        add_theme_support('responsive-embeds');
    }
endif;
add_action('after_setup_theme', 'refletir_setup');