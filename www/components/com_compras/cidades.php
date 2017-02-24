<?php
require('../../conectar_mysql.php');
header('Content-Type: text/html; charset=iso-8859-1');
?>
<select name="locality">
	<?php
	$query = "SELECT id, name FROM jos_properties_locality WHERE parent=" . trim($_GET['sid']) . " ORDER BY name";
	$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
	while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
		echo('<option value="' . $registro["name"] . '"');
		if($registro["name"] == $_GET["locality"]) echo(" selected");
		echo('>' . $registro["name"] . '</option>');
	}
	?>
</select>
<?
require('../../desconectar_mysql.php');
?>