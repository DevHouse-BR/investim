<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');

class PropertiesControllerRates extends JController
{ 
    
	
	function __construct()
	{
		parent::__construct();		
		$this->registerTask( 'add'  , 	'edit' );
		$this->registerTask( 'apply',	'save' );
		$this->registerTask( 'saveRateProduct',	'save' );
		$this->registerTask( 'AddRate',	'save' );
		$this->registerTask('save2new',		'save');
		$this->registerTask( 'unpublish', 	'publish');			

$this->cid 		= JRequest::getVar( 'cid', array(0), '', 'array' );
JArrayHelper::toInteger($this->cid, array(0));

		if(JRequest::getCmd('task') == 'orderup'){
		$this->orderSection( $this->cid[0], -1);
		}elseif(JRequest::getCmd('task') == 'orderdown'){
		$this->orderSection( $this->cid[0], 1);
		}
		
	}	

	

	function publish()
	{
$this->TableName = JRequest::getCmd('table');	
$cid		= JRequest::getVar( 'cid', array(), '', 'array' );
$this->publish	= ( $this->getTask() == 'publish' ? 1 : 0 );		
	
		JArrayHelper::toInteger($cid);
		if (count( $cid ) < 1)		{
			$action = $publish ? 'publish' : 'unpublish';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		$this->cids = implode( ',', $cid );
		
		$query = 'UPDATE #__properties_rates'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$link = 'index.php?option=com_properties&view=rates';
		$this->setRedirect($link, $msg);		
	}



	
	
	
		
	function saveorder(  )
	{		
		
	$component_name = 'properties';
	$TableName = 'rates';
	$option = JRequest::getVar('option');	
	$cid	= JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);
	
	$model =& $this->getModel( 'rates' );
		if ($model->setOrder($cid)) {
			$msg = JText::_( 'New ordering saved' );
		} else {
			$msg = $model->getError();
		}
	
	

		$link = 'index2.php?option='.$option.'&view='.$TableName;
		$this->setRedirect($link, $msg);
}
	

	function orderSection( $uid, $inc)
	{	
	$this->TableName = 'rates';
	global $mainframe;	
	JRequest::checkToken() or jexit( 'Invalid Token' );
	$model = $this->getModel('rates');		
	$db			=& JFactory::getDBO();
	$row		=& JTable::getInstance($this->TableName,'Table');
	$row->load( $uid );
	$row->move( $inc );			
	$msg = JText::_( 'New ordering saved' );
	$link = 'index.php?option=com_properties&view=rates';
		$this->setRedirect($link, $msg);
	}

	/**	 * display the edit form	 */
	
	function edit()
	{
	$this->TableName = JRequest::getVar('table');
		JRequest::setVar( 'view', 'rates' );
		JRequest::setVar( 'layout', 'form' );
		
		JRequest::setVar('TableName', $this->TableName);
		parent::display();
	}

	/**
	 * save a record (and redirect to main page)	 */
	function save()
	{
	jimport('joomla.filesystem.folder');	
	$model = $this->getModel('rates');
				
$post = JRequest::get( 'post' );
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$AutoCoord=$params->get('AutoCoord',0);


$text = JRequest::getVar( 'text', '', 'post', 'string', JREQUEST_ALLOWRAW );
	$text		= str_replace( '<br>', '<br />', $text );		
	$post['text'] = $text;

			
	if ($model->store($post,'rates')) {	

$LastModif = $model->getLastModif();
	
if(JRequest::getVar('id')){ $id = JRequest::getVar('id');}else{$id = $LastModif;}
if(JRequest::getVar('product_id')){ $product_id = JRequest::getVar('product_id');}
$msg='Saved  Rate '.$this->TableName.' : '.$LastModif.' !  ';
				switch (JRequest::getCmd( 'task' ))
		{
			case 'apply':
				$this->setRedirect( 'index.php?option=com_properties&view=rates&layout=form&task=edit&cid[]='.$id);	
				break;
				
			case 'save':
			$returnproductid	= JRequest::getInt( 'returnproductid',0,'post' );
			if($returnproductid){
			$this->setRedirect(JRoute::_('index.php?option=com_properties&view=products&layout=form&task=edit&cid[]='.$returnproductid.'&slide=0', false));
			}else{
				$this->setRedirect( 'index.php?option=com_properties&view=rates');	
			}
				break;
				
			case 'save2new':
			
			
			$returnproductid	= JRequest::getInt( 'returnproductid',0,'post' );
			if($returnproductid){
			$this->setRedirect(JRoute::_('index.php?option=com_properties&view=rates&layout=form&task=edit&productid='.$returnproductid, false));
			}else{
			
			
				$this->setRedirect(JRoute::_('index.php?option=com_properties&view=rates&layout=form&task=edit', false));
	$msg.=' You can add new rate.';
	
	
			}
			
				break;	
				
			case 'saveRateProduct':
				$this->setRedirect(JRoute::_('index.php?option=com_properties&view=products&layout=form&task=edit&cid[]='.$product_id.'&slide=0', false));
	$msg.=' You can add new rate.';
				break;	
			
			case 'AddRate':
				$this->ShowListRates();
	
				break;	
						
		}
$this->setMessage( JText::_( $msg ) );	
			
		} else {
			$msg = JText::_( 'Error Saving Greeting' );
			$msg .=  'err'.$this->Err;
		}


	}

	/** remove record(s)	 */
	function remove()
	{
	
		$model = $this->getModel('rates');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
		} else {
$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
foreach($cids as $cid) {

			$msg .= JText::_( 'Borrado type : '.$cid );
			
}			
		}

		$this->setRedirect( 'index.php?option=com_properties&view=rates', $msg );
	}

	/**	 * cancel editing a record */
	function cancel()
	{
	$this->TableName = JRequest::getCmd('table');
		$msg = JText::_( 'Operation Cancelled' );
		
		$returnproductid	= JRequest::getInt( 'returnproductid',0,'post' );
			
			if($returnproductid){
			$this->setRedirect(JRoute::_('index.php?option=com_properties&view=products&layout=form&task=edit&cid[]='.$returnproductid.'&slide=0', false));
			}else{
			
		$this->setRedirect( 'index.php?option=com_properties&view=rates', $msg );
			}
	}	


	
	
	function ShowListRates($msg='')
		{
		$productid=JRequest::getVar('productid');		
		echo $msg;
		$db 	=& JFactory::getDBO();	
		$query = ' SELECT r.*'			
			. ' FROM #__properties_rates as r'			
			. ' WHERE r.productid = '.$productid	
			. ' order by r.validfrom '
			;		
        $db->setQuery($query);   

		$Rates = $db->loadObjectList();
		
		?>
		
		<div style="width:100%; float:left;border: 1px solid #CCCCCC;">
		
		<form action="index.php" method="post" name="adminFormListRates">

<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'NUM' ); ?>
			</th>
			<th  width="5%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->rates ); ?>);" />
			</th>
            <th  class="title">
				<?php echo JText::_( 'Property'); ?>
			</th>
			<th  class="title">
				<?php echo JText::_( 'Rate Title'); ?>
			</th>
            
            <th  class="title">
				<?php echo JText::_( 'From'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'To'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'Rate x day'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'Week Only'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'week'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'Rate x week'); ?>
			</th>
            
            <th width="5%" align="center">
				<?php echo JText::_( 'Published'); ?>
			</th>	
           	<th width="5%" align="center">
				<?php echo JText::_( 'Delete' ); ?>
			</th>				
			<th width="1%" nowrap="nowrap">
				<?php echo JText::_( 'ID' ); ?>
			</th>
		</tr>
	</thead>
    
    
<tbody>
	<?php
	$k = 0;
	for ($i=0, $n=count( $Rates ); $i < $n; $i++)
	{
		$row = &$Rates[$i];
	
$link 		= JRoute::_( 'index.php?option=com_properties&view=rates&layout=form&task=edit&productid='.$productid.'&cid[]='. $row->id);	
		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		$published 	= JHTML::_('grid.published', $row, $i );
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center">
				<?php //echo $this->paginationRate->getRowOffset( $i ); ?>
			</td>
			<td align="center">
				<?php echo $checked; ?>
			</td>
            <td align="center">
				<?php echo $row->productid;?>
			</td>
			<td>

				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Rate' );?>::<?php echo $row->name; ?>">
			<?php
			echo '<a href="'.$link.'" >'.$row->title.'</a>';
			 //echo '<a href="#" onclick="ShowAddRate('.$product_id.','.$row->id.')">'.$row->title.'</a>';?>	               
				</span>
				<?php
			//}
			?>
			</td>            
            <td align="center">
				<?php echo $row->validfrom;?>
			</td>
            <td align="center">
				<?php echo $row->validto;?>
			</td>
            <td align="center">
				<?php echo $row->rateperday;?>
			</td>
            <td align="center">
				<?php echo $row->weekonly;?>
			</td>
            <td align="center">
				<?php echo $row->week;?>
			</td>
            <td align="center">
				<?php echo $row->rateperweek;?>
			</td>
			<td align="center">
            <div id="progressPA"></div>
            <div id="publishAjax<?php echo $row->id;?>">            
            <?php
		
		$img 	= $row->published ? 'tick.png' : 'publish_x.png';		
			
			 echo '<a href="#" onclick="publishAjax('.$row->id.','.$row->published.')"><img src="'.JURI::base().'images/'.$img.'" /></a>';?>	
            
				<?php //echo $published;?>
            </div>
			</td>	
            
            <td align="center">
            <div id="progressDA"></div>
            <div id="deleteAjax<?php echo $row->id;?>">            
            <?php
		
		$img = 'publish_x.png';		
			
			 echo '<a href="#" onclick="deleteAjax('.$row->id.')"><img src="'.JURI::base().'images/'.$img.'" /></a>';?>	
            
				<?php //echo $published;?>
            </div>
			</td>	
            
                		
			<td align="center">
				<?php echo $row->id; ?>
			</td>
		</tr>
		<?php
			$k = 1 - $k;
		}
		?>
	</tbody>     

<tfoot>
    <tr>
      <td colspan="13"><?php //echo $this->paginationRate->getListFooter(); ?></td>
    </tr>
  </tfoot>
</table>

	<input type="hidden" name="option" value="com_properties" />
     <input type="hidden" name="view" value="" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="rates" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>

</div>
<div style="clear:both"></div>
		
		
		
		
		
		
<?php		
		}
	


/** remove record(s)	 */
	function removeAjax()
	{
	$rateid = JRequest::getVar( 'rateid' );
		$model = $this->getModel('rates');
		if(!$model->deleteAjax($rateid)) {
			$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
		} else {
			$msg = JText::_( 'Rate Deleted' );
			
		}

		echo $msg;//$this->ShowListRates($msg);
	}



function publishAjax()
	{
$productid	= JRequest::getVar( 'productid' );
$change		= JRequest::getVar( 'change' );
$this->publish	= ( $change == 0 ? 1 : 0 );		
	
		
		$query = 'UPDATE #__properties_rates'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $productid .' )'		
		;			
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		
	//$link = 'index.php?option=com_properties&view=rates';
	//	$this->setRedirect($link, $msg);
	
	
	$img 	= $change ? 'publish_x.png' : 'tick.png';			
			 echo '<a href="#" onclick="publishAjax('.$productid.','.$this->publish.')"><img src="'.JURI::base().'images/'.$img.'" /></a>';
		
	
	 
	 
	}
	
	
	
	
		
	
	
		
	
	function ShowAddRate()
		{

		$product_id=JRequest::getVar('product_id');
		$rate_id=JRequest::getVar('rate_id');		
		
		if($rate_id){
		$db 	=& JFactory::getDBO();	
		$query = ' SELECT r.*'			
			. ' FROM #__properties_rates as r'			
			. ' WHERE r.id = '.$rate_id			
			;		
        $db->setQuery($query);   
		$this->rate = $db->loadObject();
		}
		
		?>

        
        <form action="index.php" method="post" name="adminFormAddRate" id="adminFormAddRate">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Rate Details' ); ?></legend>
		<table class="adminlist">        
        
        <thead>
		<tr>
						
			<th class="title">
				<?php echo JText::_('Rate Title'); ?>
			</th>
            
            <th  class="title">
				<?php echo JText::_('From'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_('To'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_('Rate x day'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_('Week Only'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_('week'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_('Rate x week'); ?>
			</th>
            
             					
			
		</tr>
	</thead>
    
 	<tbody>   

         <tr>			
			<td>            
            <input class="text_area" type="text" name="title" id="title" size="20" maxlength="255" value="<?php echo $this->rate->title; ?>" />
				
			</td>
		
        	<td>      
      <?php echo JHTML::_('calendar', $this->rate->validfrom, 'validfrom', 'validfrom', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'10',  'maxlength'=>'10')); ?>      
 			</td>
        	
            <td>    
      <?php echo JHTML::_('calendar', $this->rate->validto, 'validto', 'validto', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'10',  'maxlength'=>'10')); ?>
			</td>
        
			<td>
				<input class="text_area" type="text" name="rateperday" id="rateperday" size="10" maxlength="250" value="<?php echo $this->rate->rateperday;?>" />
			</td>
			<td>
<?php $weekonly0 = $this->rate->weekonly ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $weekonly1 = $this->rate->weekonly ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="weekonly" id="weekonly0" value="0" <?php echo $weekonly0;?> type="radio">
	<label for="weekonly0"><?php echo JText::_( 'No' ); ?></label>
	<input name="weekonly" id="pweekonly1" value="1" <?php echo $weekonly1;?> type="radio">
	<label for="weekonly"><?php echo JText::_( 'Yes' ); ?></label>  
			</td>
				
			<td>
						<input class="text_area" type="text" name="week" id="week" size="10" maxlength="5" value="<?php echo $this->rate->week; ?>" />
			</td>
				
			<td>
						<input class="text_area" type="text" name="rateperweek" id="rateperweek" size="10" maxlength="5" value="<?php echo $this->rate->rateperweek; ?>" />
			</td>
            
			

				</tr>
                <tr>
                <td colspan="8"> 
                <?php echo '<a href="#" onclick="AddRate()">'.JText::_( 'Save Rate' ).'</a>';?>
              
               </td>
               </tr>            
	</table>
	</fieldset>
</div>
<div class="clr"></div>
<input type="hidden" name="option" value="com_properties" />
<input type="hidden" name="table" value="rates" />
<input type="hidden" name="id" value="<?php echo $this->rate->id; ?>" />

<input type="hidden" name="controller" value="rates" />

<input name="published" id="published" value="1" type="hidden" />
<input name="volver" id="volver" value="product" type="hidden" />
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />     
</form>
        
        <?php
		}
	


function AddRate()
		{
		$product_id=JRequest::getVar('product_id');
		$rate_id=JRequest::getVar('rate_id');		
		
		echo 'rate added';
		exit;
		
		JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}


function addWeekRange()
	{
	$productid=JRequest::getVar('productid');
	
	
	
	$db 	=& JFactory::getDBO();	
		$query = ' SELECT r.*'			
			. ' FROM #__properties_rates as r'			
			. ' WHERE r.productid = '.$productid	
			. ' order by r.validfrom '
			;		
        $db->setQuery($query);   

		$Rates = $db->loadObjectList();
		
		if($Rates){
		$msg='This property have rates, need delete all rates to add new week range ';
		}else{
		
$model = $this->getModel('rates');

	
	/*
	$first_day  = mktime(0, 0, 0, 1  , 1, 2010);
	for($s=1;$s<=7;$s++)
		{		
		if(date('w',mktime(0, 0, 0, 1  , $s, 2010))==6)
			{			
			$first_saturday = date('Y-m-d',mktime(0, 0, 0, 1, $s, 2010));		
			}	
		}
		*/
		
		
		$first_saturday = date('Y-m-d',mktime(0, 0, 0, 4, 24, 2010));
		$fs=explode('-',$first_saturday);
	//	echo $fs[0].' '.$fs[1].' '.$fs[2];
//	echo '<br> '.date('d-m-Y',$first_day);
	
	$year = 1;
	$seven=7;
	$next_saturday = $first_saturday;
	$salir = 0;
	
	//while ($year <= 2010) {
	while ($salir <= 0) {
	//echo '<br>'.date('d-m-Y',mktime(0, 0, 0, $fs[0]  , $fs[1]+$seven, $fs[2]));
	$rate_from = $next_saturday;
	
	$rate_from_spanish = date('d/m',strtotime($rate_from));
	
	$fs=explode('-',$next_saturday);
	
	$next_saturday = date('Y-m-d',mktime(0, 0, 0, $fs[1], $fs[2]+$seven  , $fs[0]));	
	
	$rate_to = date('Y-m-d',mktime(0, 0, 0, $fs[1], $fs[2]+$seven-1  , $fs[0]));
	
	$next_saturday_spanish = date('d/m',strtotime($next_saturday));
	
	echo '<br><b>'.$rate_from.'  :  '.$rate_to.'</b>' ;
	//echo '<br><b>'.$next_saturday.'</b>' ;
	
	$post['id']='';
	$post['title']=$rate_from_spanish.' - '.$next_saturday_spanish;
	$post['validfrom']=$rate_from;
	$post['validto']=$rate_to;
	$post['weekonly']=1;
	$post['published']=1;
	$post['productid']=$productid;
	$post['rateperweek']=111;
	
	if ($model->store($post,'rates')) {	
	echo 'guardados'.$productid;
	
	
	}
	if($rate_from=='2010-09-18'){$salir=1;}
	$year =  date('Y',mktime(0, 0, 0, $fs[1], $fs[2]+$seven  , $fs[0]));
	
		
	//$year++;
	}

$msg='Saved  Rates ';
}
if(JRequest::getVar('return')){
$this->setRedirect( 'index.php?option=com_properties&view=rates&productid='.$productid,$msg);
}else{
$this->setRedirect( 'index.php?option=com_properties&view=products&layout=form&task=edit&cid[]='.$productid,$msg);	
}
	
	
	}





function saveRatesList()
	{
	$productid=JRequest::getVar('productid');
	$filter_product_comment = JRequest::getVar( 'filter_product_comment','','post' );
	echo $filter_product_comment;
	$post=JRequest::get('post');
	print_r($post);
	
	$productid = JRequest::getVar( 'productid','','post' );
	
	$prices = JRequest::getVar( 'price','','post' );
	
	print_r($prices);
	
	$model = $this->getModel('rates');
	
	foreach($prices as $p => $val)
		{
		echo $p.' '.$val.'<br>';
		$data['id']=$p;
		$data['rateperweek']=$val;
		if ($model->store($data,'rates')) {	
		}
		}
		

	$this->setRedirect( 'index.php?option=com_properties&view=rates&productid='.$filter_product_comment);
	
	
	
	//require('aaa');
	}
	
	
	function addRatesList()
	{
	$productid=JRequest::getVar('productid');
	
	$post=JRequest::get('post');
	$ratelistid=$post['ratelistid'];
	
	
	$saverate['productid']=$post['productid'];
	//print_r($post);
	
	echo 'Rates added';
	echo '<br>';
	echo '<br>';
	
	$model = $this->getModel('rates');
	
	jimport('joomla.filesystem.file');
	$rates_file = JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_properties'.DS. 'rates_list'.DS.$ratelistid;
	$gestor = fopen($rates_file, "r");
	if($gestor)
		{
		$x=0;
	while (!feof($gestor)) {
	$bufer = fgets($gestor, 4096);
	//print_r($bufer);
	$result=explode(';',$bufer);
	$from=$result[1];
	$to=$result[2];
	
	$from_spanish=explode('/',$from);
	$to_spanish=explode('/',$to);
	
	
	
	//echo '<b>'.$from_spanish[2].'-'.$from_spanish[1].'-'.$from_spanish[0].'</b><br>';
	//echo '<b>'.$to_spanish[2].'-'.$to_spanish[1].'-'.$to_spanish[0].'</b><br>';
	
	$saverate['title']=$result[0];
	$saverate['validfrom']=$from_spanish[2].'-'.$from_spanish[1].'-'.$from_spanish[0];
	$saverate['validto']=$to_spanish[2].'-'.$to_spanish[1].'-'.$to_spanish[0];
	$saverate['rateperweek']=$result[3];
	$saverate['weekonly']=1;
	$saverate['published']=1;
	$saverate['ordering']=$x;
	$x++;
	
	if ($model->store($saverate,'rates')) {	
	echo $saverate['title'].'    '.$saverate['validfrom'].'    '.$saverate['validto'].'    '.$saverate['rateperweek'].'<br>';
		}
	
	
	}	
		}
	fclose ($gestor);	
		
		/*
		echo '<pre>';
		print_r($saverate);
		echo '</pre>';
		*/
	echo '<a href="index.php?option=com_properties&view=rates&productid='.$productid.'">Return Rates</a>';	
	//require('aa');
	
	}
	
	
	
	
}
?>