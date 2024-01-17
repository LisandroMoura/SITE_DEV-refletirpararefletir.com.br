#!/usr/bin/env php
<?php
/**--------------------------------------------------------------------------------------------------------------
 * Nome: Artisan.php
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Responsável por mescar ao PHP os arquivos compilads/gerados pelo artisan 
 * Doc: Echo Cores em PHP no cli bash: 
 *      - https://stackoverflow.com/questions/34034730/how-to-enable-color-for-php-cli 
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatorar a compilação de JS/CSS
 *     >> 19-06-23  - Criação do programa
 *--------------------------------------------------------------------------------------------------------------*/
require __DIR__ . '/vendor/autoload.php';

class Artisan
{
    protected $tipo;
    protected $config;
    protected $pathTemplate;

    public function __construct(string $tipo = null)
    {
        $this->tipo = $tipo;
        $this->pathTemplate = "/home/ubuntu/repositorio/refletir.projeto/2023/wp-content/themes/refletir2023";
    }

    public function run(string $var = null)
    {
        # Arquivos gerados pelo Artisan.js
        $files = [
            'style' => $this->pathTemplate . '/css/style.min.css',
            'single' => $this->pathTemplate . '/css/single.min.css',
            'archive' => $this->pathTemplate . '/css/archive.min.css',
            'testes' => $this->pathTemplate . '/css/testes.min.css',
            'fixa' => $this->pathTemplate . '/css/fixa.min.css',
            //Others Files
            // 'single_frases' => $this->pathTemplate . '/css/single_frases.min.css',
            // 'single_textos' => $this->pathTemplate . '/css/single_textos.min.css',
            // 'single_testes' => $this->pathTemplate . '/css/singlsingle_testes.min.css',
            // 'page_fixas' => $this->pathTemplate . '/css/page_fixas.min.css',
            // 'search' => $this->pathTemplate . '/css/search.min.css',
            // '404' => $this->pathTemplate . '/css/404.min.css',
        ];

        $i = 0;
        $nome = array_keys($files);

        foreach ($files as $file_css) {
            if ($this->testaArquivo($file_css)):
                $conteudo = $this->importarArquivos($nome[$i], $file_css);
                if ($conteudo):
                    $arquivoCriado = $this->criarArquivos($nome[$i], $conteudo);
                endif;
            else:
                $this->message(' Arquivo não encontrado: ' . $file_css);
            endif;
            $i++;
        }

        $this->message(' Css`s merged to PHP');
    }

    public function testaArquivo($caminho)
    {
        if (file_exists($caminho)) {
            return true;
        } else {
            return false;
        }
    }

    public function importarArquivos($nome, $caminho)
    {
        $conteudo = '';
        $trimmed = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($trimmed as $file) {
            $conteudo .= $file;
        }

        return $conteudo;
    }

    public function criarArquivos($nome, $conteudo)
    {
        
        $arquivo = $this->pathTemplate . '/css/artisan/' . $nome . '.min.css.php';

        ($myfile = fopen($arquivo, 'w')) or die('Unable to open file!');
        $txt = '<style><?php get_template_part("webfont_css.min");?>' . $conteudo . '/<style>';
        fwrite($myfile, $txt);
        fclose($myfile);

        return true;
    }
    function message($message) :void {
        echo "──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────";
        echo "\e[32m" ;
        echo("\n\r");
        echo " - Artisan say: ". $message  ;
        echo "\e[39m" ;
        echo("\n\r");
        echo "──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────";
        echo("\n\r");
    }
}
$artisan = new Artisan();
$artisan->run();
?>
