<?php defined('_JEXEC') or die('Restricted access'); 
ini_set("allow_url_fopen", 1);
ini_set("allow_url_include", 1);
require("conectar_mysql.php");

$q = "";
$cid = "";
$sid = "";
$lid = "";
$extra71 = "";

if($_POST["executa"] == "busca"){
	if(strlen($_POST["query"])>0){
		$q = $_POST["query"];
	}
	if(strlen($_POST["cid"])>0){
		$cid = $_POST["cid"];
	}
	if(strlen($_POST["sid"])>0){
		$sid = $_POST["sid"];
	}
	if(strlen($_POST["lid"])>0){
		$lid = $_POST["lid"];
	}
	if(strlen($_POST["extra71"])>0){
		$extra71 = $_POST["extra71"];
	}	
}
?>

<script language="javascript">
	function mudaCidades(estado){
		if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else{ // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}		
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4){
				document.getElementById('div_cidade').innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET",'components/com_vendas/cidades.php?sid=' + estado,true);
		xmlhttp.send(null);		
	}
	
	function limpaFiltros(){
		document.getElementById('query').value = "";
		document.getElementById('cid').value = "";
		document.getElementById('sid').value = "";
		document.getElementById('lid').value = "";
		document.getElementById('extra71').value = "0";
		document.getElementById('form_busca_empresas').submit();
	}
</script>
<style type="text/css">
	#div_cidade select{
		width: 100%;
	}
</style>
<form id="form_busca_empresas" action="index.php?option=com_properties&view=properties&cid=0&tid=0&Itemid=29" method="post">
<input type="hidden" name="executa" value="busca" />
<table width="100%">
	<tr>
		<td width="12%">
			Palavra Chave
		</td>
		<td width="15%">
			Setor de Atividade
		</td>
		<td width="20%">
			Estado
		</td>
		<td width="20%">
			Cidade
		</td>
		<td width="33%">
			Valor de Venda
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" style="width:92%" name="query" id="query" maxlength="10" value="<?=$q?>" />
		</td>
		<td>
			<select style="width:100%" name="cid" id="cid" onchange="mudaAtividades(this.value)">
			<option value="">Selecione</option>
			<?php
			$query = "SELECT id, name FROM jos_properties_category ORDER BY name";
			$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
				echo('<option value="' . $registro["id"] . '"');
				if($registro["id"] == $cid) echo(" selected");
				echo('>' . $registro["name"] . '</option>');
			}
			?>
			</select>
		</td>
		<td>
			<select style="width:100%" name="sid" id="sid" onchange="mudaCidades(this.value)">
			<option value="">Selecione</option>
			<?php
			$query = "SELECT id, name FROM jos_properties_state ORDER BY name";
			$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
				echo('<option value="' . $registro["id"] . '"');
				if($registro["id"] == $sid) echo(" selected");
				echo('>' . $registro["name"] . '</option>');
			}
			?>
			</select>
		</td>
		<td>
			<div id="div_cidade" style="margin:0px">
				<? if($sid) {
					if($_SERVER['REQUEST_URI'] != "/index.php") $a = explode("/", $_SERVER['REQUEST_URI']);
					else $a = array("", "", "");
					
					if($a[1] != "") $a = "/" . $a[1];
					
					$url = "http://" . $_SERVER["HTTP_HOST"]. $a . "/components/com_vendas/cidades.php?sid=" . $sid;
					
					$url = "http://www.investim.com.br/components/com_vendas/cidades.php?sid=" . $sid;
					
					if((int)$lid != 0) $url .= "&lid=" . $lid;
					
					echo(utf8_encode(file_get_contents($url)));
				} 
				else{ ?>
					<select style="width:100%" name="lid" id="lid">
						<option value="">Selecione</option>
					</select>
				<? } ?>
			</div>
		</td>
		<td>
			<select style="width:100%" name="extra71" id="extra71">
				<option value="0"<? if($extra71 == "0") echo(' selected'); ?>>Selecione</option>
				<option value="1"<? if($extra71 == "1") echo(' selected'); ?>>até R$ 100.000,00</option>
				<option value="2"<? if($extra71 == "2") echo(' selected'); ?>>De R$ 100.000,00 à R$ 500.000,00</option>
				<option value="3"<? if($extra71 == "3") echo(' selected'); ?>>De R$ 500.000,00 à R$ 1.000.000,00</option>
				<option value="4"<? if($extra71 == "4") echo(' selected'); ?>>Acima de R$ 1.000.000,00</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" value="Pesquisar" />&nbsp;<input type="button" value="Limpar" onclick="limpaFiltros();" />
		</td>
	</tr>
</table>
</form>

<?
//require("desconectar_mysql.php");
?>