<?php
//variaveis
$tabela_classificacao=[];
$classificacao="";
$nome_class="";
$campos="";

if(isset($_POST['nperguntas']))
    //receber os dados em um array
    for ($i=1; $i <= $_POST['nperguntas']; $i++) {    
        $campos=[
        'npergunta'  => $i,
        'valor' => $_POST['pergunta_'.$i],
        'classifica' => $_POST['classificacao_'.$i],
        'nome' => $_POST['nome_class_'.$i]
        ];   
        array_push($tabela_classificacao,$campos);             
    }
$soma = [];
$nome_aux=[];
$nome=[];

foreach ($tabela_classificacao as $key => $value) { 
    if(isset($soma[$value['classifica']]))
        $soma[$value['classifica']]+=$value['valor'];
    else
        $soma[$value['classifica']]=$value['valor'];

    if  (!array_key_exists($value['classifica'], $nome_aux)) 
        $nome[$value['classifica']] = $value['nome'];
    $nome_aux = array(
        $value['classifica']=>$value['nome']
    );
}
//if(isset($_POST)) dd($_POST);
$valorMaior=0;
$resultadoMaior="";
arsort($soma);
$registros=0;
$resultadoSecundario='';
$tabela_html=[];
$campos=[];

foreach ($soma as $key => $value) {
    $registros++;    
    $campos=[
        'Tipo' => $key,
        'valor' => $value,
        'nome'  => $nome[$key],
    ];
    array_push($tabela_html,$campos);
    if($value> $valorMaior){
        $valorMaior = $value;
        $resultadoMaior=$key;
    }
    else{
        if ($registros==2)
            $resultadoSecundario=$key;
    }
}
//debug($tabela_html);
$tipoResultado = get_post_meta( get_the_ID(), 'tipo-resultado', true );
$redirect  = get_post_meta( get_the_ID(), 'redirect', true );

if( $tipoResultado ==='combo')
    $resultado = get_post_meta( get_the_ID(), $resultadoMaior . '-' .$resultadoSecundario, true );
else
    $resultado = get_post_meta( get_the_ID(), $resultadoMaior, true );
// echo 'Maior:'. $resultadoMaior . ' Menor:'. $resultadoSecundario . '-Redirect:' .  $redirect . '-Resultado:' . $resultado . '-Tipo1' . $tipoResultado .'-Tipo2' . $resultadoSecundario;
// echo  $resultadoMaior . '-' .$resultadoSecundario;

if($redirect=='true' && $resultado ){
     
    $html="";
    foreach ($tabela_html as $key => $value) {
        $html.= $value['nome'] . ":" . $value['valor'] . ";";        
    }
    header("Location:  $resultado/?html=$html");

}
    

//lógica para pegar o maior valor = ok
//agora a lógica do resultado
?>
