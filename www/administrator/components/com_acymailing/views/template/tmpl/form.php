<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;ctrl=template" method="post" name="adminForm" autocomplete="off" enctype="multipart/form-data">
	<table class="adminform">
		<tr>
			<td width="50%" valign="top">
				<table class="adminform">
					<tr>
						<td>
							<label for="name">
								<?php echo JText::_( 'TEMPLATE_NAME' ); ?>
							</label>
						</td>
						<td>
							<input type="text" name="data[template][name]" id="name" class="inputbox" size="50" value="<?php echo $this->escape(@$this->template->name); ?>" />
						</td>
					</tr>
					<tr>
						<td>
				        	<label for="published">
				          	<?php echo JText::_( 'PUBLISHED' ); ?>
				        	</label>
						</td>
						<td>
							<?php echo JHTML::_('select.booleanlist', "data[template][published]" , '',@$this->template->published); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label for="default">
			          		<?php echo JText::_( 'DEFAULT' ); ?>
			        		</label>
						</td>
						<td>
							<?php echo JHTML::_('select.booleanlist', "data[template][premium]" , '',@$this->template->premium); ?>
						</td>
					</tr>
					<tr>
						<td>
						<label for="bgcolor">
			          		<?php echo JText::_( 'BACKGROUND_COLOUR' ); ?>
		        		</label>
						</td>
						<td>
							<input type="text" name="styles[color_bg]" id="color" onchange="applyColorExample()" onfocus='document.getElementById("colordiv").style.display = "block"' class="inputbox" size="10" value="<?php echo $this->escape(@$this->template->styles['color_bg']); ?>" />
							<input disabled="disabled" size="10" style='background-color:<?php echo @$this->template->styles['color_bg']; ?>' id='colorexample'/>
							<div id='colordiv' style='display:none;position:absolute;background-color:white;border:1px solid grey'><?php echo $this->colorBox->display(); ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<label for="description">
								<?php echo JText::_( 'DESCRIPTION' ); ?>
							</label>
						</td>
						<td>
							<textarea id="description" name="editor_description" cols="60" rows="10"><?php echo @$this->template->description; ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<label for="subject">
								<?php echo JText::_( 'SUBJECT' ); ?>
							</label>
						</td>
						<td>
							<input id="subject" name="data[template][subject]" class="inputbox" size="80" value="<?php echo $this->escape(@$this->template->subject); ?>" />
						</td>
					</tr>
				</table>
			</td>
			<td>
				<fieldset class="adminform" width="100%">
					<legend><?php echo JText::_( 'STYLES' );?> </legend>
					<table width="100%">
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['tag_h1']);?>">Title h1</span></td>
							<td><input type="text" size="30" name="styles[tag_h1]" value="<?php echo $this->escape(@$this->template->styles['tag_h1']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['tag_h2']);?>">Title h2</span></td>
							<td><input type="text" size="30" name="styles[tag_h2]" value="<?php echo $this->escape(@$this->template->styles['tag_h2']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['tag_h3']);?>">Title h3</span></td>
							<td><input type="text" size="30" name="styles[tag_h3]" value="<?php echo $this->escape(@$this->template->styles['tag_h3']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['tag_h4']);?>">Title h4</span></td>
							<td><input type="text" size="30" name="styles[tag_h4]" value="<?php echo $this->escape(@$this->template->styles['tag_h4']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['tag_h5']);?>">Title h5</span></td>
							<td><input type="text" size="30" name="styles[tag_h5]" value="<?php echo $this->escape(@$this->template->styles['tag_h5']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['tag_h6']);?>">Title h6</span></td>
							<td><input type="text" size="30" name="styles[tag_h6]" value="<?php echo $this->escape(@$this->template->styles['tag_h6']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['tag_a']);?>">Link a</span></td>
							<td><input type="text" size="30" name="styles[tag_a]" value="<?php echo $this->escape(@$this->template->styles['tag_a']); ?>"/></td>
						</tr>
						<tr>
							<td><ul style="<?php echo $this->escape(@$this->template->styles['tag_ul']);?>"><li style="<?php echo $this->escape(@$this->template->styles['tag_li']);?>">ul</li><li style="<?php echo $this->escape(@$this->template->styles['tag_li']);?>">li</li></ul></td>
							<td><input type="text" size="30" name="styles[tag_ul]" value="<?php echo $this->escape(@$this->template->styles['tag_ul']); ?>"/>
							<br/><input type="text" size="30" name="styles[tag_li]" value="<?php echo $this->escape(@$this->template->styles['tag_li']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['acymailing_unsub']);?>"><?php echo JText::_('STYLE_UNSUB'); ?></span></td>
							<td><input type="text" size="30" name="styles[acymailing_unsub]" value="<?php echo $this->escape(@$this->template->styles['acymailing_unsub']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['acymailing_content']);?>"><?php echo JText::_('CONTENT_AREA'); ?></span></td>
							<td><input type="text" size="30" name="styles[acymailing_content]" value="<?php echo $this->escape(@$this->template->styles['acymailing_content']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['acymailing_title']);?>"><?php echo JText::_('CONTENT_HEADER'); ?></span></td>
							<td><input type="text" size="30" name="styles[acymailing_title]" value="<?php echo $this->escape(@$this->template->styles['acymailing_title']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['acymailing_readmore']);?>"><?php echo JText::_('CONTENT_READMORE'); ?></span></td>
							<td><input type="text" size="30" name="styles[acymailing_readmore]" value="<?php echo $this->escape(@$this->template->styles['acymailing_readmore']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo $this->escape(@$this->template->styles['acymailing_online']);?>"><?php echo JText::_('STYLE_VIEW'); ?></span></td>
							<td><input type="text" size="30" name="styles[acymailing_online]" value="<?php echo $this->escape(@$this->template->styles['acymailing_online']); ?>"/></td>
						</tr>
						<?php unset($this->template->styles['acymailing_unsub']); unset($this->template->styles['acymailing_content']); unset($this->template->styles['acymailing_title']); unset($this->template->styles['acymailing_readmore']); unset($this->template->styles['acymailing_online']);
						unset($this->template->styles['tag_a']);unset($this->template->styles['tag_ul']);unset($this->template->styles['tag_li']);unset($this->template->styles['tag_h1']);unset($this->template->styles['tag_h2']);unset($this->template->styles['tag_h3']);unset($this->template->styles['tag_h4']);
						unset($this->template->styles['tag_h5']);unset($this->template->styles['tag_h6']);unset($this->template->styles['color_bg']);
						if(!empty($this->template->styles)){
							foreach($this->template->styles as $className => $style){
							?>
								<tr>
								<td><span style="<?php echo $this->escape($style);?>"><?php echo $className ?></span></td>
								<td><input type="text" size="30" name="styles[<?php echo $className; ?>]" value="<?php echo $this->escape($style); ?>"/></td>
								</tr>
							<?php
							}
						}?>
						<tr>
					</table>
					<div id="divstyle"></div>
					<a href="javascript:void(0);" onclick='addStyle()'><?php echo JText::_('ADD_STYLE'); ?></a>
				</fieldset>
			</td>
		</tr>
	</table>
	<fieldset class="adminform" width="100%">
		<legend><?php echo JText::_( 'HTML_VERSION' ); ?></legend>
		<?php echo $this->editor->display(); ?>
	</fieldset>
	<fieldset class="adminform" >
		<legend><?php echo JText::_( 'TEXT_VERSION' ); ?></legend>
		<textarea style="width:100%" rows="20" name="data[template][altbody]" id="altbody" ><?php echo @$this->template->altbody; ?></textarea>
	</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="cid[]" value="<?php echo @$this->template->tempid; ?>" />
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="ctrl" value="template" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>