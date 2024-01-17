<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: Anuncios.php
 * Autor: liZi by_pandora.io
 * Objetivo: Hooks de Anuncios da template
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 04-07-23 - Criação do arquivo, tirado do functions.php
 *--------------------------------------------------------------------------------------------------------------*/
/*Regra de negócio para anuncios automáticos*/
if (!function_exists('saiFora')):
    function saiFora()
    {
        $saifora = false;
        //Se tem anuncios automáticos:
        if (strtoupper(get_option('anuncios')) === 'SIM'):
            //anuncios normais saem
            $saifora = true;

            // Se os anuncios do corpo GLOBAL LIGADO,
            if (strtoupper(get_option('anuncios_corpo')) === 'SIM'):
                //anuncios normais ficam
                $saifora = false;
            endif;

            //Se no POST, desligarmos o anuncio no corpo - SaiFora
            if (strtoupper(get_post_meta(get_the_ID(), '_anuncio_junto', true)) === 'NAO') {
                $saifora = true;
            }

            //Se no POST, OBRIGARMOS o anuncio do corpo  aparecer - Mostra
            if (strtoupper(get_post_meta(get_the_ID(), '_anuncio_junto', true)) === 'SIM') {
                $saifora = false;
            }
        endif;

        return $saifora;
    }
endif;

if (!function_exists('ads_in_article')):
    function ads_in_article($atts, $content = null)
    {
        if (saiFora()) return '';
        if (getProducao()):
            $return = '<div class="caixa center-margem anuncio-box"><div class="w100 block"><script refer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-5900355242626023" data-ad-slot="3159839050"></ins><script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script></div></div>';
        else:
            $return = '';
            // $return = '<div class="caixa center-margem anuncio-box"><div class="w100 block demo"style="display:inline-block;width:336px;height:280px;max-width:100%;">slot=3159839050 anuncio.php anuncio anuncio anuncio anuncio anu anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio</div></div>';
        endif;
        return $return;
    }
endif;
add_shortcode('ads_in_article', 'ads_in_article');


if (!function_exists('ads_in_article2')):
function ads_in_article2($atts, $content = null)
    {
        if (saiFora()) return '';
        if (getProducao()):
            $return = '<div class="caixa center-margem anuncio-box"><div class="w100 block"><script refer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-5900355242626023" data-ad-slot="9136749841"></ins><script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script></div></div>';
        else:
            $return = '<div class="caixa center-margem anuncio-box"><div class="w100 block demo" style="display:inline-block;width:336px;height:280px;max-width:100%;">slot=9136749841 anuncio.php anuncio anuncio anuncio anuncio anu anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio</div></div>';
        endif;
        return $return;
    }
endif;
add_shortcode('ads_in_article2', 'ads_in_article2');


if (!function_exists('ads_in_article3')):
    function ads_in_article3($atts, $content = null)
    {
        if (saiFora()) return '';

        if (getProducao()):
            $return = '<div class="caixa center-margem anuncio-box"><div class="w100 block"><script refer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-5900355242626023" data-ad-slot="8271224880"></ins><script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script></div></div>';
            return $return;
        else:
            $return = '<div class="caixa center-margem anuncio-box"><div class="w100 block demo" style="display:inline-block;width:336px;height:280px;max-width:100%;">slot=8271224880 anuncio.php anuncio anuncio anuncio anuncio anu anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio</div></div>';
        endif;
    }
endif;
add_shortcode('ads_in_article3', 'ads_in_article3');

/*ShortCode para inserir publicidade no corpo da publicação*/
if (!function_exists('ads')):
    function ads($atts, $content = null)
    {
        if (saiFora()) return '';

        if (getProducao()):
            $return = '<div class="caixa mb-60 center-margem anuncio-box"><div class="w100 block"><script refer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-5900355242626023" data-ad-slot="4715446390"></ins><script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script></div></div>';
        else:
            $return = '<div class="caixa mb-60 center-margem anuncio-box"><div class="w100 block demo" style="display:inline-block;width:336px;height:280px;max-width:100%;">slot=4715446390 anuncio.php anuncio anuncio anuncio anuncio anu anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio</div></div>';
        endif;
        return $return;
    }
endif;
add_shortcode('ads', 'ads');

/*ShortCode para inserir publicidade lateral no inicio da publicação*/
if (!function_exists('anuncio_left')):
    function anuncio_left($atts, $content = null)
    {
        if (saiFora()) return '';

        if (getProducao()):
            $return = '<div class="anuncio-left"><div class="w100 block"><script refer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-5900355242626023" data-ad-slot="4715446390"></ins><script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script></div></div>';
        else:
            $return = '<div class="anuncio-left"><div class="w100 block demo" style="display:inline-block;width:336px;height:280px;max-width:100%;">slot=4715446390 anuncio.php anuncio anuncio anuncio anuncio anu anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio nuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio</div></div>';
            $return = '';
        endif;
        return $return;
    }
endif;
add_shortcode('anuncio_left', 'anuncio_left');

/*ShortCode para inserir publicidade longa no fim da publicação*/
if (!function_exists('anuncio_barra')):
    function anuncio_barra($atts, $content = null)
    {
        if (saiFora()) return '';

        $retorno = function_exists('biboka_detect_Dispositivo') ? biboka_detect_Dispositivo() : ['tipo' => 'mobile']; 

        if (getProducao()):
            if ($retorno['tipo'] != 'pc') {
                $return = '<div class="anuncio-barra"><div class="w100 block"><script refer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-5900355242626023" data-ad-slot="4715446390"></ins><script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script></div></div>';
            } else {
                $return = '<div class="anuncio-barra"><div class="w100 block"><script refer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-5900355242626023" data-ad-slot="9894195198"></ins><script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script></div></div>';
            }
        else:
            if ($retorno['tipo'] != 'pc') {
                $return = '<div class="w100 block demo" style="display:inline-block;width:336px;height:280px;max-width:100%;"> slot=4715446390 anuncio.php anuncio anuncio anuncio anuncio anuanuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio</div>';
            } else {
                $return = '<div class="demo" style="display:inline-block;width:728px;height:90px">slot=4715446390 anuncio-barra.php anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anunci anuncio-barra.php anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anunci  anuncio-barra.php anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anunci  anuncio-barra.php anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anuncio anunci </div>';
            }
        endif;
        return $return;
    }
endif;
add_shortcode('anuncio_barra', 'anuncio_barra');
