<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: MostrarNaindex.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Função que cria o campo mostrar na index para custom pages como Textos e Frases, pois
 *           os mesmos não possuem o campo ignore_sticky_posts.
 *           PS: posts não precisa disso, pois existe a função "Sticky_posts" 
 *           com a opção "ignore_sticky_posts" no Wp_query
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *--------------------------------------------------------------------------------------------------------------*/
if (!function_exists('createCustomField')):
  function createCustomField()
  {
    $post_id = get_the_ID();
    if (
      get_post_type($post_id) === 'arvore'        ||
      get_post_type($post_id) === 'pergunta'      ||
      get_post_type($post_id) === 'slider'        ||
      get_post_type($post_id) === 'preconteudo'   ||
      get_post_type($post_id) === 'resultado'
    ) {
      return;
    }
    $value = get_post_meta($post_id, '_view_home', true);
    wp_nonce_field('my_custom_nonce_' . $post_id, 'my_custom_nonce');
    echo '<div class="misc-pub-section misc-pub-section-last">';
    echo '<label style="color: #fff;font-size: 14px;font-weight: 400;background: #69a02e;padding: 5px 10px;margin-bottom: 20px;display: block;margin: 20px auto 30px auto;width: 136px;"><input type="checkbox" value="1"';
    checked($value, true, true);
    echo 'name="_view_home" />Custom mostrar na index</label>';
    echo '</div>';
  }
endif;
add_action('post_submitbox_misc_actions', 'createCustomField');


if (!function_exists('saveCustomField')):
function saveCustomField($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (
    !isset($_POST['my_custom_nonce']) ||
    !wp_verify_nonce($_POST['my_custom_nonce'], 'my_custom_nonce_' . $post_id)
  ) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }
  if (isset($_POST['_view_home'])) {
    update_post_meta($post_id, '_view_home', $_POST['_view_home']);
  } else {
    delete_post_meta($post_id, '_view_home');
  }
}
endif;
add_action('save_post', 'saveCustomField');
