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
<h3><?=$registro["name"]?></h3><br />
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
	echo('<h4>Imagens</h4><hr />');
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
<br /><br />
<h4>Informações</h4>
<hr />
<style type="text/css">
	td.label {
		font-weight:bold;
		background-image:url(components/com_properties/includes/img/icon-16-checkin.png);
		background-repeat:no-repeat;
		background-position:left top;
		padding-left:22px;
	}
	table.tabela td{
		vertical-align:top;
		padding-top:3px;
		padding-bottom:3px;
	}
</style>
<table width="100%" cellspacing="4" class="tabela">
	<tr>
		<td class="label" width="260">Estado:</td>
		<td><?php
			$query = "SELECT id, name FROM jos_properties_state WHERE id=" . $registro["sid"];
			$result2 = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			$registro2 = mysql_fetch_array($result2, MYSQL_ASSOC);
			echo($registro2["name"]);
			?>
		</td>
	</tr>
	<tr>
		<td class="label">Cidade:</td>
		<td><?php
			$query = "SELECT id, name FROM jos_properties_locality WHERE id=" . $registro["lid"];
			$result2 = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			$registro2 = mysql_fetch_array($result2, MYSQL_ASSOC);
			echo($registro2["name"]);
			?>
		</td>
	</tr>
	<tr>
		<td class="label">País:</td>
		<td><?php
			$query = "SELECT id, name FROM jos_properties_country WHERE id=" . $registro["cyid"];
			$result2 = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			$registro2 = mysql_fetch_array($result2, MYSQL_ASSOC);
			echo($registro2["name"]);
			?>
		</td>
	</tr>
	<? if($registro["extra59"] != ""):?>
	<tr>
		<td class="label">Constituição:</td>
		<td>
			<?=$registro["extra59"]?>
		</td>
	</tr>
	<? endif; ?>
	<? if($registro["extra60"] != ""):?>
	<tr>
		<td class="label">Tributação:</td>
		<td>
			<?=$registro["extra60"]?>
		</td>
	</tr>
	<? endif; ?>
	<? if($registro["cid"] != 0):?>
	<tr>
		<td class="label">Setor de Atividade:</td>
		<td>
			<?php
			$query = "SELECT id, name FROM jos_properties_category WHERE id=" . $registro["cid"];
			$result2 = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			$registro2 = mysql_fetch_array($result2, MYSQL_ASSOC);
			echo($registro2["name"]);
			?>
		</td>
	</tr>
	<? endif; ?>
	<? if($registro["type"] != 0):?>
	<tr>
		<td class="label">Atividade:</td>
		<td>
			<?php
			$query = "SELECT id, name FROM jos_properties_type WHERE id=" . $registro["type"];
			$result2 = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			$registro2 = mysql_fetch_array($result2, MYSQL_ASSOC);
			echo($registro2["name"]);
			?>
		</td>
	</tr>
	<? endif; ?>
	<? if($registro["extra81"] != ""):?>
	<tr>
		<td class="label">Lista de Ativos e Equipamentos:</td>
		<td><?=$registro["extra81"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra62"] != ""):?>
	<tr>
		<td class="label">Valor do Estoque a Preço de Custo:</td>
		<td>R$ <?=$registro["extra62"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra82"] != ""):?>
	<tr>
		<td class="label">Linha de Produtos:</td>
		<td><?=$registro["extra82"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra83"] != ""):?>
	<tr>
		<td class="label">Linha de Serviços:</td>
		<td><?=$registro["extra83"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra63"] != ""):?>
	<tr>
		<td class="label">Ano de Fundação:</td>
		<td><?=$registro["extra63"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra84"] != ""):?>
	<tr>
		<td class="label">Motivo da Venda:</td>
		<td><?=$registro["extra84"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra64"] != ""):?>
	<tr>
		<td class="label" rowspan="3">Volume de Vendas Anuais (3 últimos anos):</td>
		<td><?=date("Y", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-3))?> R$ <?=$registro["extra64"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra65"] != ""):?>
	<tr>
		<td><?=date("Y", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-2))?> R$ <?=$registro["extra65"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra66"] != ""):?>
	<tr>
		<td><?=date("Y", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-1))?> R$ <?=$registro["extra66"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra67"] != ""):?>
	<tr>
		<td class="label">Faturamento Mensal Médio:</td>
		<td>R$ <?=$registro["extra67"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra68"] != ""):?>
	<tr>
		<td class="label">Lucro Bruto:</td>
		<td>R$ <?=$registro["extra68"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra69"] != ""):?>
	<tr>
		<td class="label">Margem de Lucro:</td>
		<td><?=$registro["extra69"]?> %</td>
	</tr>
	<? endif; ?>
	<? if($registro["extra70"] != ""):?>
	<tr>
		<td class="label">Lucro Líquido Médio:</td>
		<td>R$ <?=$registro["extra70"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra1"] != ""):?>
	<tr>
		<td class="label">Imóvel:</td>
		<td><?
			if($registro["extra1"] == '1') echo('Próprio');
			else echo('Alugado');
			?>
		</td>
	</tr>
	<? endif; ?>
	<? if($registro["extra85"] != ""):?>
	<tr>
		<td class="label">Endividamento:</td>
		<td><?=$registro["extra85"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra71"] != ""):?>
	<tr>
		<td class="label">Preço de Venda:</td>
		<td>R$ <?=$registro["extra71"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra86"] != ""):?>
	<tr>
		<td class="label">Condições de Venda ou de Participação na Empresa:</td>
		<td><?=$registro["extra86"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra72"] != ""):?>
	<tr>
		<td class="label">Número de Funcionários:</td>
		<td><?=$registro["extra72"]?></td>
	</tr>
	<? endif; ?>
	<? if($registro["extra87"] != ""):?>
	<tr>
		<td class="label">Diferencial do Negócio:</td>
		<td><?=$registro["extra87"]?></td>
	</tr>
	<? endif; ?>
</table>
<br />
<br />
<br />

<h4>Contato</h4>
<hr />

Contate a Investim<br />
<a href="mailto: contato@investim.com.br">contato@investim.com.br</a>
<h3>55 - (47) 8825 7874 - (47) 3435 7058</h3><br />
<script language="javascript">
	function fazSubmit(){
		document.getElementById("contact_text").value = "Telefone: " + document.getElementById("telefone").value + "\n\n\n" + document.getElementById("contact_text").value;
		document.getElementById("emailForm").submit();
	}
</script>
 
<form onsubmit="return fazSubmit();" action="index.php?option=com_contact&amp;view=contact&amp;id=1&amp;Itemid=25" method="post" name="emailForm" id="emailForm">
<fieldset>
		<legend>Para saber mais sobre essa Empresa</legend>


		<div>
			<label class="label-top" for="contact_name">
				&nbsp;Digite seu Nome:
			</label><br />
			<input type="text" name="name" id="contact_name" size="30" class="inputbox" value="" />
		</div>

		<div>
			<label class="label-top" for="contact_email">
				&nbsp;Endereço de E-mail:
			</label><br />
			<input type="text" id="contact_email" name="email" size="30" value="" class="inputbox required validate-email" maxlength="100" />
		</div>
		<div>
			<label class="label-top" for="telefone">
				&nbsp;Telefone:
			</label><br />

			<input type="text" name="telefone" id="telefone" size="30" class="inputbox" value="" />
		</div>
		<div>
			<label class="label-top" for="contact_text">
				&nbsp;Digite sua Mensagem:
			</label><br />
			<textarea cols="50" rows="10" name="text" id="contact_text" class="inputbox required"></textarea>
		</div>
		
				<div>

			<input type="checkbox" name="email_copy" id="contact_email_copy" value="1"  />
			<label for="contact_email_copy">
				Enviar cópia dessa mensagem para seu endereço de e-mail.			</label>
		</div>
				
		<div>
			<button class="button validate" type="submit">Enviar</button>
		</div>

</fieldset>
<input type="hidden" name="subject" id="contact_subject" value="Formulário Informação Empresa: <?=$registro["ref"]?>" />
<input type="hidden" name="option" value="com_contact" />
<input type="hidden" name="view" value="contact" />
<input type="hidden" name="id" value="1" />
<input type="hidden" name="task" value="submit" />
<input type="hidden" name="aeea8ff7fc052ab46d775527d2c27ef7" value="1" /></form>


<br />
<br />
<br />
<br />
<br />
<br />

<!--<img src="components/com_properties/includes/img/icon-16-checkin.png" />-->