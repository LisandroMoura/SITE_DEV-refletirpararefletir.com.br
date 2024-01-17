<?php /**--------------------------------------------------------------------------------------------------------------
 * Nome: pontuacaoHtml.php
 * Autor: liZi by_pandora.io
 * Objetivo: Template responsável pela pontuação dos testes (quanto o tipo de teste permite)
 * Doc: 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatoramento do refletir 2023
 *     >> 05-07-23 - Separação das includes por papéis mais separados
 *--------------------------------------------------------------------------------------------------------------*/
$html = $args["html"] ?? false;
if (!$html) return ;
$x=0;
$tt_pontuacao = [];
$pontos = explode(';', $html);
foreach ($pontos as $ponto) {
    $aux = explode(':', $ponto);
    if ($aux[0]):
        $x++;
        if (isset($aux[1]))
            $tt_pontuacao[$x] = [
                'class' => strip_tags($aux[0]),
                'valor' => strip_tags($aux[1]),
            ];
        else 
            $tt_pontuacao[$x] = [
                'class' => strip_tags($aux[0]),
                'valor' => "0",
            ];
    endif;
}
$sortArray = [];
foreach ($tt_pontuacao as $tt) {
    foreach ($tt as $key => $value) {
        if (!isset($sortArray[$key])) {
            $sortArray[$key] = [];
        }
        $sortArray[$key][] = strip_tags($value);
    }
}
$orderby = 'valor'; //change this to whatever key you want from the array
array_multisort($sortArray[$orderby], SORT_DESC, $tt_pontuacao);

$head = get_post_meta(get_the_id(), 'texto_previa_resultado', true) ? get_post_meta(get_the_id(), 'texto_previa_resultado', true) : '';
//texto_previa_resultado
$head .= '<div class="resultado-avaliacao w100 float-left block mt-0 mb-0">
                        <h2>Seu resultado:</h2>
                        <p>Confira a sua pontuação no teste.</p>
                        <table><tr><td class=head>Tipo</td><td class=head>Pontos</td><tr>';
$footer = "
                        </table></div>";
$corpo = '';
foreach ($tt_pontuacao as $tt_pontos) {
    $corpo .= '<tr>';
    $corpo .= '<td class=linha>';
    $corpo .= $tt_pontos['class'];
    $corpo .= '</td>';
    $corpo .= '<td class="linha valor">';
    $corpo .= $tt_pontos['valor'];
    $corpo .= '</td>';
    $corpo .= '<tr>';
}
//ver a possibilidade de dar um sanitize aqui
$sanitize = $head . $corpo . $footer;

// echo filter_var($sanitize, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
echo $sanitize;
?>