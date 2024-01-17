<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: Filters.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Filtros no wordpress aplicados especificamente para essa template
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *--------------------------------------------------------------------------------------------------------------*/
/*Não mostrar os tipos de posts especificos na busca*/
if (!function_exists('query_post_type')):
    function query_post_type($query)
    {
        if (is_tag()) {
            $post_type = ['post', 'textos', 'frases', 'testes'];
            if (isset($query->query_vars['post_type']))
            if ($query->query_vars['post_type'] != 'arvore'):
                $query->set('post_type', $post_type);
                return $query;
            endif;
        }
    }
endif;
add_filter('pre_get_posts', 'query_post_type');


/*remove a página de author default do Wordpress*/
if (!function_exists('remove_author_pages_link')):
    function remove_author_pages_link($content)
    {
        return get_option('home');
    }
endif;
add_filter('author_link', 'remove_author_pages_link');