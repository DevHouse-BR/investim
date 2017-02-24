<?php
/**
 * @package Akeeba
 * @copyright Copyright (C) 2009 Nicholas K. Dionysopoulos. All rights reserved.
 *
 * Modelled after the work done by RocketWerx
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

// Schema modification -- BEGIN

/*
$db =& JFactory::getDBO();
$sql = "";
$db->setQuery($sql);
$db->query(); // This might fail with error 1060, if the column already exists, but I don't really care!
*/

// Schema modification -- END

?>
<h1>Akeeba Installation</h1>
<p>Welcome to Akeeba!<br />
Before doing anything more, please read the manual, available on-line on
our official site's <a
	href="http://www.akeebabackup.com/documentation/akeeba-for-joomla/">Documentation
section</a>. Should you have any questions, comments or need some help,
do not hesitate to post on our <a href="http://www.akeebabackup.com/support/forum.html">support
forum</a>.</p>
<p>The next step after installation is taking a look at the component's
<a
	href="<?php echo JURI::base() ?>index.php?option=com_akeeba&view=config">configuration</a>
pages. Once you have checked your
configuration, go ahead and <a
	href="<?php echo JURI::base() ?>index.php?option=com_akeeba&view=cpanel">apply
inclusion and exclusion filters</a> or skip right through to <a
	href="<?php echo JURI::base() ?>index.php?option=com_akeeba&view=backup">taking
your first site backup</a>. Remember, you can always get on-line help
for the Akeeba page you are currently viewing by clicking on the
help icon in the top left corner of that page.</p>
