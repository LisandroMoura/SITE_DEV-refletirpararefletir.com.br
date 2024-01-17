<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: Hooks.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Hooks específicos no wordpress para a template
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *     >> 04-07-23 - Inserido o host: 54.236.148.144
 *--------------------------------------------------------------------------------------------------------------*/
/*Retornar 404 para o robô do google*/
if (!function_exists('return_404_to_robot')):
    function return_404_to_robot()
    {
        global $wp_query;
        $set404 = true;
        //imagem
        if (is_attachment()) {
            $wp_query->set_404();
            status_header(404);
        }
        //autor
        if (is_author()) {
            $wp_query->set_404();
            status_header(404);
        }

        $host = $_SERVER['HTTP_HOST'];
        if ($host == '34.201.8.98') {
            $wp_query->set_404();
            status_header(404);
        }

        if ($host == '54.236.148.144') {
            $wp_query->set_404();
            status_header(404);
        }

        //26-06-2017 (Retornar 404 par arquivos padrão do thema)
        if (is_archive()) {
            if (!is_tag() && !is_category()) {
                if (get_query_var('year') || get_query_var('monthnum')) {
                    $wp_query->set_404();
                }
                status_header(404);
            }
        }
    }
endif;
add_action('template_redirect', 'return_404_to_robot');
add_post_type_support('page', 'excerpt');
