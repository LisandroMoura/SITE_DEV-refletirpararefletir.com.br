<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: Seguranca.php
 * Autor: liZi by_pandora.io
 * Objetivo: Função relacionadas a segurança do templade wordpress
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *--------------------------------------------------------------------------------------------------------------*/
// Filtro para remover os codigos html dos comentarios,
add_filter('pre_comment_content', 'wp_specialchars');

// remover a versão do WP no html principal
if (!function_exists('remove_wp_version')): 
    function remove_wp_version() {return '';}
endif;
add_filter('the_generator', 'remove_wp_version');

//mudar a mensagem de login que explica se o usuário erro a senha ou o email
if (!function_exists('failed_login')): 
    function failed_login()
    {
        return 'Opa! Seu usuário ou talvez a sua senha esteja incorreta.';
    }
endif;
add_filter('login_errors', 'failed_login');


// removendo itens de menus para usuários não admin
if (!function_exists('remove_menus')): 
    function remove_menus()
    {
        if (current_user_can('edit_pages')) return;
        remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
        remove_menu_page('index.php'); // Dashboard
        remove_menu_page('edit.php?post_type=frases'); // Dashboard
        remove_menu_page('edit.php?post_type=textos'); // Dashboard
        remove_menu_page('edit.php?post_type=testes'); // Dashboard
        remove_menu_page('edit.php?post_type=preconteudo'); // Dashboard
        remove_menu_page('edit.php?post_type=slider'); // Dashboard
        remove_menu_page('edit.php?post_type=arvore'); // Dashboard
        remove_menu_page('edit.php?post_type=pergunta'); // Dashboard
        remove_menu_page('edit.php?post_type=resultado'); // Dashboard
        // remove_menu_page('edit.php'); // Posts
        remove_menu_page('upload.php'); // Media
        remove_menu_page('link-manager.php'); // Links
        remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('edit-comments.php'); // Comments
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
    }
endif;
add_action('admin_menu', 'remove_menus');

//removendo dashboard para usuários não admin
if (!function_exists('wpse52752_remove_dashboard')): 
    function wpse52752_remove_dashboard()
    {
        global $current_user, $menu, $submenu;
        // get_currentuserinfo();
        wp_get_current_user();

        if (!in_array('administrator', $current_user->roles)) {
            reset($menu);
            $page = key($menu);
            while (__('Dashboard') != $menu[$page][0] && next($menu)) {
                $page = key($menu);
            }
            if (__('Dashboard') == $menu[$page][0]) {
                unset($menu[$page]);
            }
            reset($menu);
            $page = key($menu);
            while (!$current_user->has_cap($menu[$page][1]) && next($menu)) {
                $page = key($menu);
            }
            if (preg_match('#wp-admin/?(index.php)?$#', $_SERVER['REQUEST_URI']) && 'index.php' != $menu[$page][2]) {
                wp_redirect(get_option('siteurl') . '/wp-admin/edit.php');
            }
        }
    }
endif;
add_action('admin_menu', 'wpse52752_remove_dashboard');
