<?php defined('_JEXEC') or die('Restricted access'); ?>
<?
require("conectar_mysql.php");

$query = "SELECT * FROM jos_properties_profiles WHERE published = 1 ORDER BY icq DESC";

$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
?>

<h1>Investidores</h1>

<table width="100%" border="0">
<tr bgcolor="#999999" style="color:#FFF">
	<td style="padding-left:3px;">Ref.</td>
	<td style="padding-left:3px;">Setor de Atividade</td>
	<td style="padding-left:3px;">Local de Preferência</td>
	<td style="padding-left:3px;">Valor a ser investido</td>
	<td style="padding-left:3px;">Descrição</td>
</tr>
<?
if(mysql_num_rows($result) == 0){
	echo('<tr><td colspan="5">Nenhum investidor cadastrado no momento.</td></tr>');
}

while($pr = mysql_fetch_array($result, MYSQL_ASSOC)){
	?>
	<tr>
		<td style="padding-left:3px;">
			<?=$pr['id']?>
		</td>
		<td style="padding-left:3px;">
			<?=$pr['info']?>
		</td>
		<td style="padding-left:3px;"><?=$pr['web']?></td>
		<td style="padding-left:3px;"><?=$pr['icq']?></td>
		<td style="padding-left:3px;"><?=$pr['bio']?></td>
	</tr><?
}
?>
</table>