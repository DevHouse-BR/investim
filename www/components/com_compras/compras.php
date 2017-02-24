<?php
defined('_JEXEC') or die('Restricted access');
require('conectar_mysql.php');
$name = "";

if($_POST["task"] == "salvar"){
	$name = $_POST["name"];
	$company = $_POST["company"];
	$state = $_POST["state"];
	$locality = $_POST["locality"];
	$country = $_POST["country"];
	$phone = $_POST["phone"];
	$mobile = $_POST["mobile"];
	$email = $_POST["email"];
	$skype = $_POST["skype"];
	$ymsgr = $_POST["ymsgr"];
	$icq = $_POST["icq"];
	$blog = $_POST["blog"];
	$web = $_POST["web"];
	$info = $_POST["info"];
	$bio = $_POST["bio"];
	$captcha_code = $_POST["captcha_code"];
		
	$erros = array();
	
	if($name == "") $erros[] = array('field' => 'name', 'errormsg'=>'Por favor informe um responsável');
	if($company == "") $erros[] = array('field' => 'company', 'errormsg'=>'Por favor informe a empresa');
	if($state == "") $erros[] = array('field' => 'state', 'errormsg'=>'Por favor informe o estado em que reside');
	if($locality == "") $erros[] = array('field' => 'locality', 'errormsg'=>'Por favor informe a cidade em que reside');
	if($country == "") $erros[] = array('field' => 'country', 'errormsg'=>'Por favor informe o país que reside');
	if($phone == "") $erros[] = array('field' => 'phone', 'errormsg'=>'Por favor informe o seu telefone de contato');
	if($mobile == "") $erros[] = array('field' => 'mobile', 'errormsg'=>'Por favor informe o seu celular de contato');
	if($email == "") $erros[] = array('field' => 'email', 'errormsg'=>'Por favor informe o seu email de contato');
	//if($skype == "") $erros[] = array('field' => 'skype', 'errormsg'=>'Por favor informe o seu id do Skype');
	//if($ymsgr == "") $erros[] = array('field' => 'ymsgr', 'errormsg'=>'Por favor informe o seu MSN');
	if($icq == "") $erros[] = array('field' => 'icq', 'errormsg'=>'Por favor informe o valor que pretende investir');
	if($web == "") $erros[] = array('field' => 'web', 'errormsg'=>'Por favor informe a cidade da sua preferência para fazer o investimento');
	
	
	if (!validaEmail($email)) {
		$erros[] = array('field' => 'email', 'errormsg'=>'O e-mail inserido é válido');
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
		$query = "INSERT INTO jos_properties_profiles (name, company, state, locality, country, phone, mobile, email, skype, ymsgr, icq, blog, web, info, bio) VALUES ('";
		$query .= $name ."','";
		$query .= $company ."','";
		$query .= $state ."','";
		$query .= $locality ."','";
		$query .= $country ."','";
		$query .= $phone ."','";
		$query .= $mobile ."','";
		$query .= $email . "', '";
		$query .= $skype . "', '";
		$query .= $ymsgr . "', '";
		$query .= $icq . "', '";
		$query .= $blog . "', '";
		$query .= $web . "', '";
		$query .= $info . "', '";
		$query .= $bio . "')";
		
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
			$mailSender ->setSubject("Notificação: Cadastro de Investidor");

			$body = "Um investidor efetuou o cadastro no sistema.\nAcesse o link e verifique os dados:\n\n";
			$body .="http://" . $_SERVER["HTTP_HOST"] . "/administrator/index.php?option=com_properties&view=profiles&layout=form&task=edit&cid[]=" . $id;			

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
	function imposeMaxLength(Object, MaxLen){
		return (Object.value.length <= MaxLen);
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
<h1>Seja um Investidor</h1>
<p>Cadastre-se como investidor e logo entraremos em contato oferecendo o que temos de melhor em investimentos para seu maior retorno. Suas informações serão tratadas com  o maior sigilo e discrição.</p>
<div id="cabec_erros" style="visibility:hidden"><p>Existem problemas no preenchimento do formulário. Verifique os campos em vermelho.</p></div>
<form method="post" action="index.php"  class="formvendas">
<input type="hidden" name="task" value="salvar" />
<input type="hidden" name="option" value="com_compras" />
<table width="100%" class="formtable">
	<tr>
		<td><div id="label_name">Responsável (*):</div></td>
		<td><input type="text" name="name" id="name" maxlength="50" value="<?=$name?>" style="width:300px" /><span id="erro_name"></span></td>
	</tr>
	<tr>
		<td width="180"><div id="label_company">Nome da Empresa (*):</div></td>
		<td><input type="text" name="company" id="company" maxlength="255" value="<?=$company?>" style="width:300px" /><span id="erro_company"></span></td>
	</tr>
	<tr>
		<td><div id="label_state">Estado (*):</div></td>
		<td>
			<select name="state" id="state">
				<option value="">Selecione</option>
				<?php
				$query = "SELECT id, name FROM jos_properties_state ORDER BY name";
				$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
				while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo('<option value="' . $registro["name"] . '"');
					if($registro["name"] == $state) echo(" selected");
					echo('>' . $registro["name"] . '</option>');
				}
				?>
			</select><span id="erro_state"></span>
		</td>
	</tr>
	<tr>
		<td width="180"><div id="label_locality">Cidade (*):</div></td>
		<td><input type="text" name="locality" id="locality" maxlength="50" value="<?=$locality?>" style="width:300px" /><span id="erro_locality"></span></td>
	</tr>
	<tr>
		<td><div id="label_country">País (*):</div></td>
		<td>
			<select name="country" id="country">
				<option value="">Selecione</option>
				<?php
				$query = "SELECT id, name FROM jos_properties_country ORDER BY name";
				$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
				while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo('<option value="' . $registro["name"] . '"');
					if($registro["name"] == $country) echo(" selected");
					echo('>' . $registro["name"] . '</option>');
				}
				?>
			</select><span id="erro_country"></span>
		</td>
	</tr>
	<tr>
		<td><div id="label_phone">Telefone (*):</div></td>
		<td><input type="text" name="phone" id="phone" value="<?=$phone?>" maxlength="20" /><span id="erro_phone"></span></td>
	</tr>
	<tr>
		<td><div id="label_phone">Celular (*):</div></td>
		<td><input type="text" name="mobile" id="mobile" value="<?=$mobile?>" maxlength="20" /><span id="erro_mobile"></span></td>
	</tr>
	<tr>
		<td><div id="label_email">Email (*):</div></td>
		<td><input type="text" name="email" id="email" value="<?=$email?>" maxlength="50" style="width:300px" /><span id="erro_email"></span></td>
	</tr>
	<tr>
		<td><div id="label_skype">Skype:</div></td>
		<td><input type="text" name="skype" id="skype" value="<?=$skype?>" maxlength="30" style="width:300px" /><span id="erro_skype"></span></td>
	</tr>
	<tr>
		<td><div id="label_ymsgr">MSN:</div></td>
		<td><input type="text" name="ymsgr" id="ymsgr" value="<?=$ymsgr?>" maxlength="30" style="width:300px" /><span id="erro_ymsgr"></span></td>
	</tr>
	<tr>
		<td><div id="label_icq">Valor do investimento que pretende realizar (*):</div></td>
		<td>R$ <input type="text" name="icq" id="icq" value="<?=$icq?>" maxlength="14" onkeyup="moeda(this);" style="width:300px" /><span id="erro_icq"></span></td>
	</tr>
	<tr>
		<td> Você está contando com capital de terceiros?:</td>
		<td><input type="radio" name="blog" value="1"<? if($blog == "1") echo(" checked"); ?> />&nbsp;Sim&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="blog" value="2"<? if($blog == "2") echo(" checked"); ?> />&nbsp;Não</td>
	</tr>
	<tr>
		<td><div id="label_web">Cidade Preferencial (*):</div></td>
		<td><input type="text" name="web" id="web" value="<?=$web?>" maxlength="255" style="width:300px" /><span id="erro_web"></span></td>
	</tr>
	<tr>
		<td>Setor de Atividade do seu interesse:</td>
		<td><textarea type="text" id="info" name="info" style="width:300px" onKeyPress="return imposeMaxLength(this, 255);" /><?=$info?></textarea></td>
	</tr>
	<tr>
		<td>Descrição:</td>
		<td><textarea type="text" id="bio" name="bio" style="width:300px" /><?=$bio?></textarea></td>
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