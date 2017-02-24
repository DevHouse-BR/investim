<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
   <div>
  <?php echo $this->tabs->startPane( 'mail_tab');?>
    <?php echo $this->tabs->startPanel(JText::_( 'LISTS' ), 'mail_receivers');?>
		<?php if(empty($this->lists)){
				echo JText::_('LIST_CREATE');
			}else{
				echo JText::_('LIST_RECEIVERS');
		?>
		<table class="adminlist" cellpadding="1" width="100%">
			<thead>
				<tr>
					<th class="title">
						<?php echo JText::_('LIST_NAME'); ?>
					</th>
					<th class="title">
						<?php echo JText::_('RECEIVE'); ?>
					</th>
				</tr>
			</thead>
			<tbody>
		<?php
				$k = 0;
				$filter_list = JRequest::getInt( 'filter_list');
				if(empty($filter_list)) $filter_list=JRequest::getInt('listid');
				$i = 0;
				foreach($this->lists as $row){
		?>
				<tr class="<?php echo "row$k"; ?>">
					<td>
						<?php echo '<div class="roundsubscrib rounddisp" style="background-color:'.$row->color.'"></div>'; ?>
						<?php
						$text = '<b>'.JText::_('ID').' : </b>'.$row->listid;
						$text .= '<br/>'.str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->description);
						$title = str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->name);
						echo JHTML::_('tooltip', $text, $title, 'tooltip.png', $title);
						?>
					</td>
					<td align="center" nowrap="nowrap">
						<?php echo JHTML::_('select.booleanlist', "data[listmail][".$row->listid."]" , '',(bool) ($row->mailid OR (empty($row->mailid) AND $filter_list == $row->listid) OR (empty($this->mail->mailid) AND count($this->lists) == 1)),JText::_('JOOMEXT_YES'),JText::_('JOOMEXT_NO')); ?>
					</td>
				</tr>
		<?php
					$k = 1-$k;
					$i++;
				}
				if(count($this->lists)>3){
			?>
			<tr><td></td><td align="center" nowrap="nowrap">
						<script language="javascript" type="text/javascript">
							function updateStatus(statusval){
								<?php foreach($this->lists as $row){?>
								window.document.getElementById('data[listmail][<?php echo $row->listid; ?>]'+statusval).checked = true;
								<?php } ?>
							}
						</script>
						<input type="radio" onclick="updateStatus(0);" name="selectalllists" id="selectalllists0" value="0" />
						<label for="selectalllists0"><?php echo JText::_('NONE'); ?></label>
						<input type="radio" onclick="updateStatus(1);" name="selectalllists" id="selectalllists1" value="1" />
						<label for="selectalllists1"><?php echo JText::_('ALL'); ?></label>
					</td></tr>
			<?php } ?>
			</tbody>
		</table>
    <?php } echo $this->tabs->endPanel(); ?>
 	<?php echo $this->tabs->startPanel(JText::_( 'ATTACHMENTS' ), 'mail_attachments');?>
    <?php if(!empty($this->mail->attach)){?>
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'ATTACHED_FILES' ); ?></legend>
      <?php
	      	foreach($this->mail->attach as $idAttach => $oneAttach){
	      		$idDiv = 'attach_'.$idAttach;
	      		echo '<div id="'.$idDiv.'">'.$oneAttach->filename.' ('.(round($oneAttach->size/1000,1)).' Ko)';
	      		echo $this->toggleClass->delete($idDiv,$this->mail->mailid.'_'.$idAttach,'mail');
				echo '</div>';
	      	}
		?>
		</fieldset>
    <?php } ?>
    <div id="loadfile">
    	<input type="file" size="30" name="attachments[]" />
    </div>
    <a href="javascript:void(0);" onclick='addFileLoader()'><?php echo JText::_('ADD_ATTACHMENT'); ?></a>
    	<?php echo JText::sprintf('MAX_UPLOAD',$this->values->maxupload);?>
    <?php echo $this->tabs->endPanel(); echo $this->tabs->startPanel(JText::_( 'SENDER_INFORMATIONS' ), 'mail_sender');?>
		<table width="100%" class="paramlist admintable">
			<tr>
		    	<td class="paramlist_key">
		    		<?php echo JText::_( 'FROM_NAME' ); ?>
		    	</td>
		    	<td class="paramlist_value">
		    		<input class="inputbox" type="text" name="data[mail][fromname]" size="40" value="<?php echo $this->escape(@$this->mail->fromname); ?>" />
		    	</td>
		    </tr>
			<tr>
		    	<td class="paramlist_key">
		    		<?php echo JText::_( 'FROM_ADDRESS' ); ?>
		    	</td>
		    	<td class="paramlist_value">
		    		<input class="inputbox" type="text" name="data[mail][fromemail]" size="40" value="<?php echo $this->escape(@$this->mail->fromemail); ?>" />
		    	</td>
		    </tr>
		    <tr>
				<td class="paramlist_key">
					<?php echo JText::_( 'REPLYTO_NAME' ); ?>
		    	</td>
		    	<td class="paramlist_value">
		    		<input class="inputbox" type="text" name="data[mail][replyname]" size="40" value="<?php echo $this->escape(@$this->mail->replyname); ?>" />
		    	</td>
		    </tr>
		    <tr>
				<td class="paramlist_key">
					<?php echo JText::_( 'REPLYTO_ADDRESS' ); ?>
		    	</td>
		    	<td class="paramlist_value">
		    		<input class="inputbox" type="text" name="data[mail][replyemail]" size="40" value="<?php echo $this->escape(@$this->mail->replyemail); ?>" />
		    	</td>
			</tr>
		</table>
<?php echo $this->tabs->endPanel(); echo $this->tabs->endPane(); ?>
  </div>