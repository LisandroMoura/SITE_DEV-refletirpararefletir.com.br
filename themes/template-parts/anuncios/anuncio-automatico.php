<!-- Automatic DAS -->
<?php 
    /**
     * Política de Anúncios automáticos
     * 
     *  
     **/	
    $lanuncio = false;
    if (is_page()):
        $lanuncio = true;
        if (getPaginasFixas())
            $lanuncio = false;
    endif;
    if (is_single())
        $lanuncio = true;		
    
    if (!$lanuncio)	
        return '';			
?>
<?php if (get_option('anuncios')): ?>  
    <?php if (strtoupper(get_option('anuncios'))=== "SIM"): ?>
        <?php if(getProducao()): ?>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5900355242626023" crossorigin="anonymous"></script>
        <?php endif;?>
    <?php endif;?>
<?php endif;?>

