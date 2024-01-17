<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: LazyLoad.php
 * Autor: liZi by_pandora.io
 * Objetivo: Aplicar LazyLoad no corpo das publicações
 *           ps: verificar se o methodo wp_get_attachment_image_attributes está funcionando, acho que não
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *--------------------------------------------------------------------------------------------------------------*/
 
if (!function_exists('my_lazyload_content_images')):
    function my_lazyload_content_images($content)
    {
        $content = preg_replace('/(<img.+)(src)/Ui', '$1data-$2', $content);
        $content = preg_replace('/(<img.+)(srcset)/Ui', '$1data-$2', $content);
        return $content;
    }
endif;
add_filter('widget_text', 'my_lazyload_content_images');

// Replace the image attributes in Post Listing, Related Posts, etc.
if (!function_exists('my_lazyload_attachments')):
    function my_lazyload_attachments($atts, $attachment)
    {
        $atts['data-src'] = $atts['src'];
        unset($atts['src']);

        if (isset($atts['srcset'])) {
            $atts['data-srcset'] = $atts['srcset'];
            unset($atts['srcset']);
        }

        return $atts;
    }
endif;
add_filter('wp_get_attachment_image_attributes', 'my_lazyload_attachments', 10, 2);
