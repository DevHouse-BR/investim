<?php defined('_JEXEC') or die('Restricted access');
require('conectar_mysql.php');
$id = explode(":", trim($_GET["id"]));
$id = $id[0];
$query = "SELECT * FROM jos_properties_products WHERE id = " . $id;
$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
$registro = mysql_fetch_array($result, MYSQL_ASSOC);

$query = "SELECT * FROM jos_properties_images WHERE product_id = " . $id . " ORDER BY id";
$result2 = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());

?>
<h3><?=$registro["name"]?></h3>
<?

if(mysql_num_rows($result2)>0){
	$mainframe->addCustomHeadTag('<link href="multibox.css" rel="stylesheet" type="text/css" />');
	$mainframe->addCustomHeadTag('<script type="text/javascript" src="multibox.js"></script>');
	$mainframe->addCustomHeadTag('<script type="text/javascript" src="overlay.js"></script>');
	?>
	<script type="text/javascript">
		var box = {};
		window.addEvent('load', function(){
			box = new MultiBox('mb', {descClassName: 'multiBoxDesc', useOverlay: true});
		});
	</script>
	<?
	$rout_image = 'images/properties/images/'.$id.'/';
	$rout_thumb = 'images/properties/images/thumbs/'.$id.'/';
	$i = 0;
	echo('<h4>Imagens</h4>');
	while($imagens = mysql_fetch_array($result2, MYSQL_ASSOC)){
		?>
		<a href="<?=$rout_image . $imagens["name"]?>" class="mb" title="<?php echo str_replace('"',' ', $registro["name"]); ?>" id="p<?=$i?>">
		<img src="<?=$rout_thumb . $imagens["name"]?>" alt="<?php echo str_replace('"',' ',$registro["name"]); ?>"/></a>
		<div style="display:none" class="multiBoxDesc p<?=$i?>"></div>
		<?
		$i++;
	}
}

?>
<br />
<br />
<br />
<br />
<h4>Informações</h4>

<table width="100%" class="formtable">
	<tr>
		<td width="180"><div id="label_name">Título (*):</div></td>
		<td><input type="text" name="name" id="name" maxlength="255" value="<?=$name?>" style="width:300px" /><span id="erro_name"></span></td>
	</tr>
	<tr>
		<td><div id="label_extra50">Razão Social (*):</div></td>
		<td><input type="text" name="extra50" id="extra50" maxlength="255" value="<?=$extra50?>" style="width:300px" /><span id="erro_extra50"></span></td>
	</tr>
	<tr>
		<td><div id="label_extra51">CNPJ (*):</div></td>
		<td><input type="text" name="extra51" id="extra51" maxlength="255" value="<?=$extra51?>" style="width:300px" /><span id="erro_extra51"></span></td>
	</tr>
	<tr>
		<td><div id="label_extra52">Responsável (*):</div></td>
		<td><input type="text" name="extra52" id="extra52" maxlength="255" value="<?=$extra52?>" style="width:300px" /><span id="erro_extra52"></span></td>
	</tr>
	<tr>
		<td><div id="label_address">Endereço (*):</div></td>
		<td><textarea type="text" id="address" name="address" style="width:300px" onKeyPress="return imposeMaxLength(this, 255);" /><?=$address?></textarea><span id="erro_address"></span></td>
	</tr>
	<tr>
		<td>Complemento:</td>
		<td><input type="text" name="extra53" maxlength="255"  value="<?=$extra53?>" style="width:300px" /></td>
	</tr>
	<tr>
		<td><div id="label_extra54">Bairro (*):</div></td>
		<td><input type="text" name="extra54" id="extra54" maxlength="255" value="<?=$extra54?>" style="width:300px" /><span id="erro_extra54"></span></td>
	</tr>
	<tr>
		<td><div id="label_sid">Estado (*):</div></td>
		<td>
			<select name="sid" id="sid" onchange="mudaCidades(this.value)">
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
			</select><span id="erro_sid"></span>
		</td>
	</tr>
	<tr>
		<td><div id="label_lid">Cidade (*):</div></td>
		<td>
			<div id="div_cidade" style="margin:0px">
				<? if($sid) {
					if($_SERVER['REQUEST_URI'] != "/index.php") $a = explode("/", $_SERVER['REQUEST_URI']);
					else $a = array("", "", "");
					
					if($a[1] != "") $a = "/" . $a[1];
					
					$url = "http://" . $_SERVER["HTTP_HOST"]. $a . "/components/com_vendas/cidades.php?sid=" . $sid;
					
					if((int)$lid != 0) $url .= "&lid=" . $lid;
					
					echo(utf8_encode(file_get_contents($url)));
				} 
				else{ ?>
					<select name="lid" id="lid">
						<option value="">Selecione</option>
					</select>
				<? } ?>
			</div>
			<span id="erro_lid"></span>
		</td>
	</tr>
	<tr>
		<td><div id="label_cyid">País (*):</div></td>
		<td>
			<select name="cyid" id="cyid">
				<option value="">Selecione</option>
				<?php
				$query = "SELECT id, name FROM jos_properties_country ORDER BY name";
				$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
				while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo('<option value="' . $registro["id"] . '"');
					if($registro["id"] == $cyid) echo(" selected");
					echo('>' . $registro["name"] . '</option>');
				}
				?>
			</select><span id="erro_cyid"></span>
		</td>
	</tr>
	<tr>
		<td><div id="label_extra55">Telefone (*):</div></td>
		<td><input type="text" name="extra55" id="extra55" value="<?=$extra55?>" maxlength="255" style="width:300px" /><span id="erro_extra55"></span></td>
	</tr>
	<tr>
		<td><div id="label_extra56">Email (*):</div></td>
		<td><input type="text" name="extra56" id="extra56" value="<?=$extra56?>" maxlength="255" style="width:300px" /><span id="erro_extra56"></span></td>
	</tr>
	<tr>
		<td>Skype:</td>
		<td><input type="text" name="extra57" value="<?=$extra57?>" maxlength="255" style="width:300px" /></td>
	</tr>
	<tr>
		<td>MSN:</td>
		<td><input type="text" name="extra58" value="<?=$extra58?>" maxlength="255" style="width:300px" /></td>
	</tr>
	<tr>
		<td><div id="label_extra59">Constituição (*):</div></td>
		<td>
			<select name="extra59" id="extra59">
				<option value="">Selecione</option>
				<option value="Sociedade Simples"<? if($extra59 == "Sociedade Simples") echo(" selected"); ?>>Sociedade Simples</option>
				<option value="Sociedade Limitada"<? if($extra59 == "Sociedade Limitada") echo(" selected"); ?>>Sociedade Limitada</option>
				<option value="Sociedade Anônima"<? if($extra59 == "Sociedade Anônima") echo(" selected"); ?>>Sociedade Anônima</option>
			</select><span id="erro_extra59"></span>
		</td>
	</tr>
	<tr>
		<td><div id="label_extra60">Tributação (*):</div></td>
		<td>
			<select name="extra60" id="extra60">
				<option value="">Selecione</option>
				<option value="Simples"<? if($extra60 == "Simples") echo(" selected"); ?>>Simples</option>
				<option value="Lucro Presumido"<? if($extra60 == "Lucro Presumido") echo(" selected"); ?>>Lucro Presumido</option>
				<option value="Lucro Real"<? if($extra60 == "Lucro Real") echo(" selected"); ?>>Lucro Real</option>
			</select><span id="erro_extra60"></span>
		</td>
	</tr>
	<tr>
		<td><div id="label_cid">Setor de Atividade (*):</div></td>
		<td>
			<select name="cid" id="cid" onchange="mudaAtividades(this.value)">
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
			</select><span id="erro_cid"></span>
		</td>
	</tr>
	<tr>
		<td><div id="label_type">Atividade (*):</div></td>
		<td>
			<div id="div_atividades" style="margin:0px">
			<? if($cid) {
					if($_SERVER['REQUEST_URI'] != "/index.php") $a = explode("/", $_SERVER['REQUEST_URI']);
					else $a = array("", "", "");
					
					if($a[1] != "") $a = "/" . $a[1];
					
					$url = "http://" . $_SERVER["HTTP_HOST"]. $a . "/components/com_vendas/atividades.php?cid=" . $cid;
					
					if((int)$type != 0) $url .= "&type=" . $type;
					
					echo(utf8_encode(file_get_contents($url)));
				} 
				else{ ?>
					<select name="type" id="type">
						<option value="">Selecione</option>
					</select>
				<? } ?>
			</div><span id="erro_type"></span>
		</td>
	</tr>
	<tr>
		<td>Homepage:</td>
		<td><input type="text" name="extra61" value="<?=$extra61?>" maxlength="255" style="width:300px" /><span id="erro_extra61"></span></td>
	</tr>
	<tr>
		<td>Lista de Ativos e Equipamentos:</td>
		<td><textarea type="text" name="extra81" maxlength="255" style="width:300px" /><?=$extra81?></textarea></td>
	</tr>
	<tr>
		<td>Valor do Estoque a Preço de Custo:</td>
		<td><input type="text" name="extra62" value="<?=$extra62?>" maxlength="255" style="width:300px" /></td>
	</tr>
	<tr>
		<td>Linha de Produtos:</td>
		<td><textarea type="text" name="extra82" maxlength="255" /><?=$extra82?></textarea></td>
	</tr>
	<tr>
		<td>Linha de Serviços:</td>
		<td><textarea type="text" name="extra83" maxlength="255" style="width:300px" onKeyPress="return imposeMaxLength(this, 255);" /><?=$extra83?></textarea></td>
	</tr>
	<tr>
		<td>Ano de Fundação:</td>
		<td><input type="text" name="extra63" value="<?=$extra63?>" /></td>
	</tr>
	<tr>
		<td>Motivo da Venda:</td>
		<td><textarea type="text" name="extra84" maxlength="255" style="width:300px" onKeyPress="return imposeMaxLength(this, 255);" /><?=$extra84?></textarea></td>
	</tr>
	<tr>
		<td rowspan="3"><div id="label_extra64">Volume de Vendas Anuais (3 últimos anos) (*):</div></td>
		<td><input type="text" name="extra64" id="extra64" value="<?=$extra64?>" /><span id="erro_extra64"></span></td>
	</tr>
	<tr>
		<td><input type="text" name="extra65" id="extra65" value="<?=$extra65?>" /><span id="erro_extra65"></span><div id="label_extra65"></div></td>
	</tr>
	<tr>
		<td><input type="text" name="extra66" id="extra66" value="<?=$extra66?>" /><span id="erro_extra66"></span><div id="label_extra66"></div></td>
	</tr>
	<tr>
		<td><div id="label_extra67">Faturamento Mensal Médio (*):</div></td>
		<td><input type="text" name="extra67" id="extra67" value="<?=$extra67?>" /><span id="erro_extra67"></span></td>
	</tr>
	<tr>
		<td><div id="label_extra68">Lucro Bruto (*):</div></td>
		<td><input type="text" name="extra68" id="extra68" value="<?=$extra68?>" /><span id="erro_extra68"></span></td>
	</tr>
	<tr>
		<td><div id="label_extra69">Margem de Lucro (*):</div></td>
		<td><input type="text" name="extra69" id="extra69" value="<?=$extra69?>" /><span id="erro_extra69"></span></td>
	</tr>
	<tr>
		<td>Lucro Líquido Médio:</td>
		<td><input type="text" name="extra70" value="<?=$extra70?>" /></td>
	</tr>
	<tr>
		<td>Imóvel:</td>
		<td><input type="radio" name="extra1" value="1"<? if($extra1 == "1") echo(" checked"); ?> />&nbsp;Próprio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="extra1" value="2"<? if($extra1 == "2") echo(" checked"); ?> />&nbsp;Alugado</td>
	</tr>
	<tr>
		<td>Endividamento:</td>
		<td><textarea type="text" name="extra85" maxlength="255" /><?=$extra85?></textarea></td>
	</tr>
	<tr>
		<td>Preço de Venda:</td>
		<td><input type="text" name="extra71" value="<?=$extra71?>" /></td>
	</tr>
	<tr>
		<td>Condições de Venda ou de  Participação na Empresa:</td>
		<td><textarea type="text" name="extra86" maxlength="255" style="width:300px" onKeyPress="return imposeMaxLength(this, 255);" /><?=$extra86?></textarea></td>
	</tr>
	<tr>
		<td>Número de Funcionários:</td>
		<td><input type="text" name="extra72" value="<?=$extra72?>" /></td>
	</tr>
	<tr>
		<td>Qual o diferencial do seu negócio:</td>
		<td><textarea type="text" name="extra87" maxlength="255" style="width:300px" onKeyPress="return imposeMaxLength(this, 255);" /><?=$extra87?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><img id="siimage" align="left" style="padding-right: 5px; border: 0" src="captcha/securimage_show.php?sid=<?php echo md5(time()) ?>" /></td>
	</tr>
	<tr>
		<td><div id="label_captcha_code">Informe o Código da Imagem:</div></td>
		<td><input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" /><span id="erro_captcha_code"></span></td>
	</tr>
	<tr>
		<td colspan="2"><hr /></td>
	</tr>
	<tr>
		<td></td>
		<td><img src="templates/investim/images/hand.png" align="absmiddle" />&nbsp;<input type="submit" value="Enviar" /></td>
	</tr>
</table>

<img src="components/com_properties/includes/img/icon-16-checkin.png" />


<a href="portifolio/alfa.jpg" title="Alfa Eletro" id="p1" class="mb">Alfa Eletro</a>
<?
/*
lightbox['.$Product->id.']
<a href="<?php echo $rout_image.$image->name; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->name); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>" height="<?php echo $HeightThumbsDetail; ?>" src="<?php echo $rout_thumb.$image->name; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
*/
?>