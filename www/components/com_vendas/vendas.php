<?php
defined('_JEXEC') or die('Restricted access');
ini_set("allow_url_fopen", 1);
ini_set("allow_url_include", 1);
require('conectar_mysql.php');
$name = "";

if($_POST["task"] == "salvar"){
	$name = $_POST["name"];
	$extra50 = $_POST["extra50"];
	$extra51 = $_POST["extra51"];
	$extra52 = $_POST["extra52"];
	$address = $_POST["address"];
	$extra53 = $_POST["extra53"];
	$extra54 = $_POST["extra54"];
	$sid = $_POST["sid"];
	$lid = $_POST["lid"];
	$cyid = $_POST["cyid"];
	$type = $_POST["type"];
	$extra55 = $_POST["extra55"];
	$extra56 = $_POST["extra56"];
	$extra57 = $_POST["extra57"];
	$extra58 = $_POST["extra58"];
	$extra59 = $_POST["extra59"];
	$extra60 = $_POST["extra60"];
	$cid = $_POST["cid"];
	$extra61 = $_POST["extra61"];
	$extra81 = $_POST["extra81"];
	$extra62 = $_POST["extra62"];
	$extra82 = $_POST["extra82"];
	$extra83 = $_POST["extra83"];
	$extra63 = $_POST["extra63"];
	$extra84 = $_POST["extra84"];
	$extra64 = $_POST["extra64"];
	$extra65 = $_POST["extra65"];
	$extra66 = $_POST["extra66"];
	$extra67 = $_POST["extra67"];
	$extra68 = $_POST["extra68"];
	$extra69 = $_POST["extra69"];
	$extra70 = $_POST["extra70"];
	$extra1 = $_POST["extra1"];
	$extra85 = $_POST["extra85"];
	$extra71 = $_POST["extra71"];
	$extra86 = $_POST["extra86"];
	$extra72 = $_POST["extra72"];
	$extra87 = $_POST["extra87"];
	$captcha_code = $_POST["captcha_code"];
	
	$erros = array();
	
	if($name == "") $erros[] = array('field' => 'name', 'errormsg'=>'Por favor informe um título para a sua empresa');
	if($extra50 == "") $erros[] = array('field' => 'extra50', 'errormsg'=>'Por favor informe a Razão social da sua empresa');
	if($extra51 == "") $erros[] = array('field' => 'extra51', 'errormsg'=>'Por favor informe o CNPJ da sua empresa');
	if($extra52 == "") $erros[] = array('field' => 'extra52', 'errormsg'=>'Por favor informe o nome do responsável da sua empresa');
	if($address == "") $erros[] = array('field' => 'address', 'errormsg'=>'Por favor informe o endereço da sua empresa');
	if($extra54 == "") $erros[] = array('field' => 'extra54', 'errormsg'=>'Por favor informe o bairro da sua empresa');
	if($sid == "") $erros[] = array('field' => 'sid', 'errormsg'=>'Por favor informe o estado da sua empresa');
	if($lid == "") $erros[] = array('field' => 'lid', 'errormsg'=>'Por favor informe a cidade da sua empresa');
	if($extra55 == "") $erros[] = array('field' => 'extra55', 'errormsg'=>'Por favor informe o telefone da sua empresa');
	if($extra56 == "") $erros[] = array('field' => 'extra56', 'errormsg'=>'Por favor informe o email de contato da sua empresa');
	if($extra59 == "") $erros[] = array('field' => 'extra59', 'errormsg'=>'Por favor informe a constituição da sua empresa');
	if($extra60 == "") $erros[] = array('field' => 'extra60', 'errormsg'=>'Por favor informe a tributação da sua empresa');
	if($cid == "") $erros[] = array('field' => 'cid', 'errormsg'=>'Por favor informe o setor de atividade da sua empresa');
	if($type == "") $erros[] = array('field' => 'type', 'errormsg'=>'Por favor informe a atividade da sua empresa');
	if($extra64 == "") $erros[] = array('field' => 'extra64', 'errormsg'=>'Por favor informe o volume de vendas anuais da sua empresa');
	if($extra65 == "") $erros[] = array('field' => 'extra65', 'errormsg'=>'Por favor informe o volume de vendas anuais da sua empresa');
	if($extra66 == "") $erros[] = array('field' => 'extra66', 'errormsg'=>'Por favor informe o volume de vendas anuais da sua empresa');
	if($extra67 == "") $erros[] = array('field' => 'extra67', 'errormsg'=>'Por favor informe o faturamento mensal médio da sua empresa');
	if($extra68 == "") $erros[] = array('field' => 'extra68', 'errormsg'=>'Por favor informe o lucro bruto da sua empresa');
	if($extra69 == "") $erros[] = array('field' => 'extra69', 'errormsg'=>'Por favor informe a margem de lucro da sua empresa');
	
	if (is_cnpj($extra51)) {
		$extra51 = formatarCPF_CNPJ($extra51, true);
	} 
	else{ 
		 $erros[] = array('field' => 'extra51', 'errormsg'=>'Informe um CNPJ válido');
	}
	
	if (!validaEmail($extra56)) {
		$erros[] = array('field' => 'extra56', 'errormsg'=>'O e-mail inserido é válido');
	}
	
	require('captcha/securimage.php');
	$securimage = new Securimage();
	$securimage->expiry_time = 1200;
	if ($securimage->check($captcha_code) == false) {
		$erros[] = array('field' => 'captcha_code', 'errormsg'=>'O código de segurança não está correto');
	}
	
	if(count($erros) >0){
		$erros = json_encode($erros);
	}
	else{
		$query = "INSERT INTO jos_properties_products (name, extra1, extra50, extra51, extra52, address, extra53, extra54, sid, lid, cyid, extra55, extra56, extra57, extra58, extra59, extra60, cid, type, extra61, extra81, extra62, extra82, extra83, extra63, extra84, extra64, extra65, extra66, extra67, extra68, extra69, extra70, extra85, extra71, extra86, extra72, extra87, published) VALUES ('";
		$query .= $name ."','";
		$query .= $extra1 ."','";
		$query .= $extra50 ."','";
		$query .= $extra51 ."','";
		$query .= $extra52 ."','";
		$query .= $address ."','";
		$query .= $extra53 . "', '";
		$query .= $extra54 . "', '";
		$query .= $sid . "', '";
		$query .= $lid . "', '";
		$query .= $cyid . "', '";
		$query .= $extra55 . "', '";
		$query .= $extra56 . "', '";
		$query .= $extra57 . "', '";
		$query .= $extra58 . "', '";
		$query .= $extra59 . "', '";
		$query .= $extra60 . "', '";
		$query .= $cid . "', '";
		$query .= $type . "', '";
		$query .= $extra61 . "', '";
		$query .= $extra81 . "', '";
		$query .= $extra62 . "', '";
		$query .= $extra82 . "', '";
		$query .= $extra83 . "', '";
		$query .= $extra63 . "', '";
		$query .= $extra84 . "', '";
		$query .= $extra64 . "', '";
		$query .= $extra65 . "', '";
		$query .= $extra66 . "', '";
		$query .= $extra67 . "', '";
		$query .= $extra68 . "', '";
		$query .= $extra69 . "', '";
		$query .= $extra70 . "', '";
		$query .= $extra85 . "', '";
		$query .= $extra71 . "', '";
		$query .= $extra86 . "', '";
		$query .= $extra72 . "', '";
		$query .= $extra87 . "', '";		
		$query .= $published . "')";
		
		$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . $query . mysql_error());
		if($result){
			
			$sql = mysql_query("SELECT LAST_INSERT_ID();") or die("Erro ao atualizar registros no Banco de dados: " . $query . mysql_error());
			$registro = mysql_fetch_row($sql);
			$id = $registro[0];
			
			require_once(JPATH_CONFIGURATION . DS . 'configuration.php' );
			
			$CONFIG = new JConfig();
			
			$mailSender =& JFactory::getMailer();
			$mailSender ->addRecipient($CONFIG->mailfrom);
			$mailSender ->setSender(array($CONFIG->mailfrom, $CONFIG->fromname));
			$mailSender ->setSubject("Notificação: Cadastro de Empresa a Venda");

			$body = "Uma empresa foi cadastrada no sistema.\nAcesse o link e publique ou remova o cadastro:\n\n";
			$body .="http://" . $_SERVER["HTTP_HOST"] . "/administrator/index.php?option=com_properties&view=products&layout=form&task=edit&cid[]=" . $id;
			

			$mailSender ->setBody($body);
			
			if (!$mailSender ->Send()){
				
			}
			else{
				?>
				<table width="100%">
					<tr>
						<td width="32"><img src="images/apply_f2.png" align="absmiddle" /></td>
						<td valign="top"><h3>Sua solicitação será analisada pelos nossos atendentes e em breve entraremos em contato. Obrigado!</h3></td>
					</tr>
				</table>
				
				<?
				return;
			}
		}
	}
}


?>
<style type="text/css">
	form.formvendas div{
		margin:0px;
	}
	form.formvendas select{
		width:30%;
	}
	table.formtable td{
		vertical-align:top;
		padding-top:4px;
		padding-bottom:4px;
	}
	form.formvendas label{
		margin:0px;
	}
	#cabec_erros{
		font-weight:bold;
		color:#F00;
	}
</style>
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
	
	function mudaAtividades(categoria){
		if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else{ // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}		
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4){
				document.getElementById('div_atividades').innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET",'components/com_vendas/atividades.php?cid=' + categoria,true);
		xmlhttp.send(null);		
	}
	function imposeMaxLength(Object, MaxLen){
		return (Object.value.length <= MaxLen);
	}
	
	function MascaraCNPJ(cnpj){
		switch(cnpj.value.length){
			case 2: cnpj.value += ".";
				break;
			case 6: cnpj.value += ".";
				break;
			case 10: cnpj.value += "/";
				break;
			case 15: cnpj.value += "-";
				break;
		}
	}
	
	function moeda(z){  
		v = z.value;
		v=v.replace(/\D/g,"");  //permite digitar apenas números
		v=v.replace(/[0-9]{12}/,"inválido");   //limita pra máximo 999.999.999,99
		v=v.replace(/(\d{1})(\d{8})$/,"$1.$2");  //coloca ponto antes dos últimos 8 digitos
		v=v.replace(/(\d{1})(\d{5})$/,"$1.$2");  //coloca ponto antes dos últimos 5 digitos
		v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2");        //coloca virgula antes dos últimos 2 digitos
		z.value = v;
	}

</script>
<h1>Cadastre sua Empresa para Venda</h1>
<p>Cadastre sua empresa para venda tratamos com extremo sigilo as informações. Não revelamos a identidade da sua empresa enquanto não houver o momento oportuno, avaliado através de nosso procedimento de venda.</p>
<div id="cabec_erros" style="visibility:hidden"><p>Existem problemas no preenchimento do formulário. Verifique os campos em vermelho.</p></div>
<form method="post" action="index.php?option=com_vendas&Itemid=23"  class="formvendas">
<input type="hidden" name="task" value="salvar" />
<input type="hidden" name="option" value="com_vendas" />
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
		<td><input type="text" name="extra51" id="extra51" onkeypress="return MascaraCNPJ(this);" maxlength="18" value="<?=$extra51?>" style="width:300px" /><span id="erro_extra51"></span></td>
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
					/*if($_SERVER['REQUEST_URI'] != "/index.php") $a = explode("/", $_SERVER['REQUEST_URI']);
					else $a = array("", "", "");
					
					if($a[1] != "") $a = "/" . $a[1];
					
					$url = "http://" . $_SERVER["HTTP_HOST"]. $a . "/components/com_vendas/cidades.php?sid=" . $sid;*/
					
					$url = "http://www.investim.com.br/components/com_vendas/cidades.php?sid=" . $sid;
					
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
					/*if($_SERVER['REQUEST_URI'] != "/index.php") $a = explode("/", $_SERVER['REQUEST_URI']);
					else $a = array("", "", "");
					
					if($a[1] != "") $a = "/" . $a[1];
					
					$url = "http://" . $_SERVER["HTTP_HOST"]. $a . "/components/com_vendas/atividades.php?cid=" . $cid;*/
					
					$url = "http://www.investim.com.br/components/com_vendas/atividades.php?cid=" . $cid;
					
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
		<td>R$ <input type="text" name="extra62" value="<?=$extra62?>" maxlength="14" onkeyup="moeda(this);" /></td>
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
		<td><?=date("Y", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-3))?>: R$ <input type="text" name="extra64" id="extra64" value="<?=$extra64?>" maxlength="14" onkeyup="moeda(this);" /><span id="erro_extra64"></span></td>
	</tr>
	<tr>
		<td><?=date("Y", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-2))?>: R$ <input type="text" name="extra65" id="extra65" value="<?=$extra65?>" maxlength="14" onkeyup="moeda(this);" /><span id="erro_extra65"></span><div id="label_extra65"></div></td>
	</tr>
	<tr>
		<td><?=date("Y", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-1))?>: R$ <input type="text" name="extra66" id="extra66" value="<?=$extra66?>" maxlength="14" onkeyup="moeda(this);" /><span id="erro_extra66"></span><div id="label_extra66"></div></td>
	</tr>
	<tr>
		<td><div id="label_extra67">Faturamento Mensal Médio (*):</div></td>
		<td>R$ <input type="text" name="extra67" id="extra67" value="<?=$extra67?>" maxlength="14" onkeyup="moeda(this);" /><span id="erro_extra67"></span></td>
	</tr>
	<tr>
		<td><div id="label_extra68">Lucro Bruto (*):</div></td>
		<td>R$ <input type="text" name="extra68" id="extra68" value="<?=$extra68?>" maxlength="14" onkeyup="moeda(this);" /><span id="erro_extra68"></span></td>
	</tr>
	<tr>
		<td><div id="label_extra69">Margem de Lucro (*):</div></td>
		<td>% <input type="text" name="extra69" id="extra69" value="<?=$extra69?>" maxlength="3" /><span id="erro_extra69"></span></td>
	</tr>
	<tr>
		<td>Lucro Líquido Médio:</td>
		<td>R$ <input type="text" name="extra70" value="<?=$extra70?>"  maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td>Imóvel:</td>
		<td><input type="radio" name="extra1" value="1"<? if($extra1 == "1") echo(" checked"); ?> />&nbsp;Próprio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="extra1" value="2"<? if($extra1 == "2") echo(" checked"); ?> />&nbsp;Alugado</td>
	</tr>
	<tr>
		<td>Endividamento:</td>
		<td><textarea type="text" name="extra85" maxlength="14" /><?=$extra85?></textarea></td>
	</tr>
	<tr>
		<td>Preço de Venda:</td>
		<td>R$ <input type="text" name="extra71" value="<?=$extra71?>" maxlength="14" onkeyup="moeda(this);" /></td>
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
</form>
<script language="javascript">
<? if(isset($erros)){
		echo('var erros = ' . $erros . ";");  ?>
			document.getElementById('cabec_erros').style.visibility = '';
			for(var i = 0; i < erros.length; i++){
				var campo = document.getElementById(erros[i].field);
				var errormsg = erros[i].errormsg;

				document.getElementById("label_" + erros[i].field).style.color = "#FF0000";
				campo.style.borderColor = "#FF0000";
				document.getElementById("erro_" + erros[i].field).style.color = "#FF0000";
				document.getElementById("erro_" + erros[i].field).innerHTML = '<br />' + errormsg;
			}
	<?	}
	?>
</script>
<?
//require('desconectar_mysql.php');




function is_cnpj($str) { 
	if (!preg_match('|^(\d{2,3})\.?(\d{3})\.?(\d{3})\/?(\d{4})\-?(\d{2})$|', $str, $matches))
		return false;

	array_shift($matches);
	$str = implode('', $matches);

	if (strlen($str) > 14)
		$str = substr($str, 1);

	$sum1 = 0;
	$sum2 = 0;
	$sum3 = 0;
	$calc1 = 5;
	$calc2 = 6;

	for ($i=0; $i <= 12; $i++) {
		$calc1 = ($calc1 < 2) ? 9 : $calc1;
		$calc2 = ($calc2 < 2) ? 9 : $calc2;

		if ($i <= 11)
			$sum1 += $str[$i] * $calc1;

		$sum2 += $str[$i] * $calc2;
		$sum3 += $str[$i];
		$calc1--;
		$calc2--;
	}

	$sum1 %= 11;
	$sum2 %= 11;

	return ($sum3 && $str[12] == ($sum1 < 2 ? 0 : 11 - $sum1) && $str[13] == ($sum2 < 2 ? 0 : 11 - $sum2)) ? $str : false;
}


function formatarCPF_CNPJ($campo, $formatado = true){
	//retira formato
	$codigoLimpo = ereg_replace("[' '-./ t]",'',$campo);
	// pega o tamanho da string menos os digitos verificadores
	$tamanho = (strlen($codigoLimpo) -2);
	//verifica se o tamanho do código informado é válido
	if ($tamanho != 9 && $tamanho != 12){
		return false;
	}

	if ($formatado){
		// seleciona a máscara para cpf ou cnpj
		$mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##'; 

		$indice = -1;
		for ($i=0; $i < strlen($mascara); $i++) {
			if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
		}
		//retorna o campo formatado
		$retorno = $mascara;

	}else{
		//se não quer formatado, retorna o campo limpo
		$retorno = $codigoLimpo;
	}

	return $retorno;

}


// Define uma função que poderá ser usada para validar e-mails usando regexp
function validaEmail($email) {
	$conta = "^[a-zA-Z0-9\._-]+@";
	$domino = "[a-zA-Z0-9\._-]+.";
	$extensao = "([a-zA-Z]{2,4})$";
	
	$pattern = $conta.$domino.$extensao;
	
	if (ereg($pattern, $email))	return true;
	else return false;
}
?>