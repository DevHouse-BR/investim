<?php defined('_JEXEC') or die('Restricted access'); ?>
<?
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
CAST(REPLACE(p.extra71, '.', '') AS DECIMAL) as valor_venda,
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
WHERE p.published = 1";

$string = "";
if($_REQUEST["executa"] == "busca"){
	$string .= "&executa=busca";
	if(strlen($_REQUEST["query"])>0){
		$query .= " AND (p.name LIKE '%%%" . $_REQUEST["query"] . "%%%' OR p.ref LIKE '%%%" . $_REQUEST["query"] . "%%%') ";
		$string .= "&query=" .  $_REQUEST["query"];
	}
	if(strlen($_REQUEST["cid"])>0){
		$query .= " AND p.cid = " . $_REQUEST["cid"];
		$string .= "&cid=" .  $_REQUEST["cid"];
	}
	if(strlen($_REQUEST["sid"])>0){
		$query .= " AND p.sid = " . $_REQUEST["sid"];
		$string .= "&sid=" .  $_REQUEST["sid"];
	}
	if(strlen($_REQUEST["lid"])>0){
		$query .= " AND p.lid = " . $_REQUEST["lid"];
		$string .= "&lid=" .  $_REQUEST["lid"];
	}
	if(strlen($_REQUEST["extra71"])>0){
		$valor = $_REQUEST["extra71"];
		
		switch($valor){
			case "1":
				$query .= " AND SUBSTRING_INDEX(REPLACE(p.extra71, '.', ''), ',', 2) < 100000 ";
				break;
			case "2":
				$query .= " AND SUBSTRING_INDEX(REPLACE(p.extra71, '.', ''), ',', 2) >= 100000 AND SUBSTRING_INDEX(REPLACE(p.extra71, '.', ''), ',', 2) <= 500000";
				break;
			case "3":
				$query .= " AND SUBSTRING_INDEX(REPLACE(p.extra71, '.', ''), ',', 2) >= 500000 AND SUBSTRING_INDEX(REPLACE(p.extra71, '.', ''), ',', 2) <= 1000000";
				break;
			case "4":
				$query .= " AND SUBSTRING_INDEX(REPLACE(p.extra71, '.', ''), ',', 2) > 1000000 ";
				break;
		}
		
		$string .= "&extra71=" .  $_REQUEST["extra71"];
	}
	$query .= " ORDER BY valor_venda ASC";
}
else{
	$query .= " ORDER BY name ASC";
}

if(!isset($num_registro_pagina)) $num_registro_pagina = 30;
			
if(strlen($_GET["pagina"]) == 0) $pagina = 1;
else $pagina = $_GET["pagina"];

$limite = ($num_registro_pagina * ($pagina -1));
$query_limit = " LIMIT " . $limite . "," . $num_registro_pagina;


$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());

$quantidade = mysql_num_rows($result);

$query .= $ordem . $query_limit;

$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
?>



<h1>Empresas a Venda</h1>

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
<br><div style="text-align:right;font-size:10px"><span style="color:#FF0000"><?=$quantidade?></span>&nbsp;Registros Encontrados</div>
<br />
<div style="width: 100%; text-align: center;">
<?	make_user_page_nums($quantidade, $string, 'index.php' , $num_registro_pagina, $pagina, 10); ?>
</div>
<br />
<br />
<br />
<br />
<?
//require("desconectar_mysql.php");

function make_user_page_nums($total_results, $print_query, $page_name, $results_per_page, $page, $max_pages_to_show) {
	
	/* PREV LINK: print a Prev link, if the page number is not 1 */
	if($page != 1) {
		$pageprev = $page - 1;
		echo '<a href="' . $page_name . '?pagina=' . $pageprev . $print_query . '"><img align="absmiddle" title="Voltar" border="0" src="images/voltar2.gif"></a> ';
	}
	
	/* get the total number of pages that are needed */
	
	$showpages = round($max_pages_to_show/2);
	$numofpages = $total_results/$results_per_page;
	
	if ($numofpages > $showpages ) { 
		$startpage = $page - $showpages ;
	}
	else { 
		$startpage = 0; 
	}
	
	if ($startpage < 0){
		$startpage = 0; 
	}
	
	if ($numofpages > $showpages ) {
		$endpage = $page + $showpages; 
	}
	else { 
		$endpage = $showpages; 
	}
	
	if ($endpage > $numofpages){ 
		$endpage = $numofpages; 
	}
	
	/* loop through the page numbers and print them out */
	for($i = $startpage; $i < $endpage; $i++) {
		/* if the page number in the loop is not the same as the page were on, make it a link */
		$real_page = $i + 1;
		if ($real_page!=$page){
			echo " <a class=\"menu\" href=\"".$page_name."?pagina=".$real_page.$print_query."\">".$real_page."</a> ";
			/* otherwise, if the loop page number is the same as the page were on, do not make it a link, but rather just print it out */
		}
		else {
			if($page != 1) echo "<b class=\"menu\" style=\"color: #FF0000;\">".$real_page."</b>";
			elseif($page < $numofpages) echo "<b class=\"menu\" style=\"color: #FF0000;\">".$real_page."</b>";
		}
	}
	
	/* NEXT LINK -If the totalrows - $results_per_page * $page is > 0 (meaning there is a remainder), print the Next button. */
	if(($total_results-($results_per_page*$page)) > 0){
		$pagenext = $page + 1;
		echo ' <a href="' . $page_name . '?pagina=' . $pagenext . $print_query . '"><img align="absmiddle" title="Avançar" border="0" src="images/avancar.gif"></a>';
	}
}
?>