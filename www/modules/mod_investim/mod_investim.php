<?php defined('_JEXEC') or die('Restricted access'); 


require("conectar_mysql.php");
$query = "
SELECT p.id,
p.alias,
p.ref,
p.name,
l.name as local,
l.alias as locality,
p.extra67 as faturamento,
p.extra71,
p.cid,
cat.alias as category,
c.alias as country,
p.sid,
s.alias as state,
p.lid,
p.cyid 
FROM jos_properties_products p
INNER JOIN jos_properties_locality l ON l.id = p.lid
INNER JOIN jos_properties_country c ON c.id = p.cyid
INNER JOIN jos_properties_state s ON s.id = p.sid
INNER JOIN jos_properties_category cat ON cat.id = p.cid
WHERE p.published = 1
AND p.featured = 1
ORDER BY name ASC";
$result = mysql_query($query) or die("Erro de conex�o ao banco de dados: " . mysql_error());
?>
<table width="100%" border="0">
<tr bgcolor="#999999" style="color:#FFF">
	<td style="padding-left:3px;">Ref.</td>
	<td style="padding-left:3px;">Nome</td>
	<td style="padding-left:3px;">Local</td>
	<td style="padding-left:3px;">Faturamento Anual</td>
	<td style="padding-left:3px;">Pre&ccedil;o de Venda</td>
</tr>
<?
if(mysql_num_rows($result) == 0){
	echo('<tr><td colspan="5">Nenhuma empresa a venda no momento.</td></tr>');
}

while($pr = mysql_fetch_array($result, MYSQL_ASSOC)){
	$link = "index.php?option=com_properties&view=properties&task=showproperty&cyid=" . $pr['cyid'] . ":" . $pr["country"] . "&sid=" . $pr["sid"] . ":" . $pr["state"] . "&lid=" . $pr["lid"] . ":" . $pr["locality"] . "&cid=" . $pr["cid"] . ":" . $pr["category"] . "&id=" . $pr["id"] . ":" . $pr["alias"] . "&Itemid=19";
	?>
	<tr>
		<td style="padding-left:3px;">
			<a href="<?=$link?>">
				<?=$pr['ref']?>
			</a>
		</td>
		<td style="padding-left:3px;">
			<a href="<?=$link?>">
				<?=$pr['name']?>
			</a>
		</td>
		<td style="padding-left:3px;"><?=$pr['local']?></td>
		<td align="right" style="padding-right:5px;"><div style="float:left">R$</div><?
			$faturamento = $pr['faturamento'];
			$faturamento = str_replace(".", "",$faturamento);
			$faturamento = (float) str_replace(",", ".",$faturamento);
			$faturamento = $faturamento * 12;
			$faturamento = number_format($faturamento, 2, ',', '.');
			echo($faturamento);
			?>
		</td>
		<td align="right" style="padding-right:5px;"><div style="float:left">R$</div><?
			$preco = $pr['extra71'];
			$preco = str_replace(".", "",$preco);
			$preco = (float) str_replace(",", ".",$preco);
			$preco = number_format($preco, 2, ',', '.');
			echo($preco);
			?>
		</td>
	</tr><?
}
?>
</table>
<br />
<?
//require("desconectar_mysql.php");
?>