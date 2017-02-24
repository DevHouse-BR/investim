<?
header('Cache-Control: no-cache');
header('Pragma: no-cache');
echo('<?xml version="1.0" encoding="utf-8"?>' . chr(10));
?>
<slideshow>	
	<preferences kenBurnsMode="random" controlAlpha="50" controlAutoHide="true" controlDelay="3" controlLineWidth="2" controlRoundedCorners="10"/>
	<album thumbnail="http://www.investim.com.br/images/slides/album.jpg" title="Investim" description="Amostra de Imagens" imagePath="http://www.investim.com.br/images/slides" thumbnailPath="http://www.investim.com.br/images/slides">
<?	
$d = dir("images/slides");
while (false !== ($arquivo = $d->read())) {
	if(($arquivo != ".") && ($arquivo != "..") && ($arquivo != "album.jpg"))
    echo(chr(9) . chr(9) . '<img src="' . $arquivo.'"/>' . chr(10));
}
$d->close();
?>	</album>	
</slideshow>