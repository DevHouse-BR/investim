<?php
/**
* @package   yoo_explorer Template
* @version   1.5.2 2010-01-03 14:20:02
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.mootools');

// include config	
include_once(dirname(__FILE__).'/config.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<link rel="apple-touch-icon" href="<?php echo $template->url ?>/apple_touch_icon.png" />
</head>

<body id="page" class="yoopage <?php echo $this->params->get('columns'); ?> <?php echo $this->params->get('itemcolor'); ?> <?php echo $this->params->get('toolscolor'); ?>">

	<?php if($this->countModules('absolute')) : ?>
	<div id="absolute">
		<jdoc:include type="yoomodules" name="absolute" />
	</div>
	<?php endif; ?>

	<div id="page-body">
		<div class="wrapper">

			<div id="header">

				<div id="toolbar">
				
					<?php if($this->params->get('date')) : ?>
					<div id="date">
						<?php echo JHTML::_('date', 'now', JText::_('DATE_FORMAT_LC')) ?>
					</div>
					<?php endif; ?>
				
					<?php if($this->countModules('toolbarleft')) : ?>
					<div class="left">
						<jdoc:include type="yoomodules" name="toolbarleft" style="yoo" />
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('toolbarright')) : ?>
					<div class="right">
						<jdoc:include type="yoomodules" name="toolbarright" style="yoo" />
					</div>
					<?php endif; ?>
					
				</div>

				<div id="headerbar">
				
					<?php if($this->countModules('headerleft')) : ?>
					<div class="left">
						<jdoc:include type="yoomodules" name="headerleft" style="yoo" />
					</div>
					<?php endif; ?>
					
					<?php if($this->countModules('headerright')) : ?>
					<div class="right">
						<jdoc:include type="yoomodules" name="headerright" style="yoo" />
					</div>
					<?php endif; ?>
					
				</div>

				<div id="menubar">
					<div class="menubar-2">
						<div class="menubar-3"></div>
					</div>
				</div>

				<?php if($this->countModules('logo')) : ?>		
				<div id="logo">
					<jdoc:include type="yoomodules" name="logo" />
				</div>
				<?php endif; ?>

				<?php if($this->countModules('menu')) : ?>
				<div id="menu">
					<jdoc:include type="yoomodules" name="menu" style="yoo" />
				</div>
				<?php endif; ?>

				<?php if($this->countModules('search')) : ?>
				<div id="search">
					<jdoc:include type="yoomodules" name="search" />
				</div>
				<?php endif; ?>
	
				<?php if ($this->countModules('banner')) : ?>
				<div id="banner">
					<jdoc:include type="yoomodules" name="banner" />
				</div>
				<?php endif; ?>

			</div>
			<!-- header end -->

			<div class="wrapper-body">
			
				<div class="wrapper-t1">
					<div class="wrapper-t2">
						<div class="wrapper-t3"></div>
					</div>
				</div>

				<div class="wrapper-1">
					<div class="wrapper-2">
						<div class="wrapper-3">

							<?php if ($this->countModules('top + topblock')) : ?>
							<div class="wrapper-inner-1">
								<div class="wrapper-inner-2">
									<div id="top">
	
										<?php if($this->countModules('topblock')) : ?>
										<div class="topblock width100 float-left">
											<jdoc:include type="yoomodules" name="topblock" style="yoo" />
										</div>
										<?php endif; ?>
							
										<?php if ($this->countModules('top')) : ?>
											<jdoc:include type="yoomodules" name="top" wrapper="topbox float-left" layout="<?php echo $this->params->get('top'); ?>" style="yoo" />
										<?php endif; ?>
	
									</div>
								</div>	
							</div>
							<div class="wrapper-inner-b1"><div class="wrapper-inner-b2"><div class="wrapper-inner-b3"></div></div></div>
							<!-- top end -->
							<?php endif; ?>
				
							<div class="wrapper-inner-1">
								<div class="wrapper-inner-2">
									<div id="middle">
										<div id="middle-expand">

											<div id="main">
												<div id="main-shift">

													<?php if ($this->countModules('maintop')) : ?>
													<div id="maintop">
														<jdoc:include type="yoomodules" name="maintop" wrapper="maintopbox float-left" layout="<?php echo $this->params->get('maintop'); ?>" style="yoo" />									
													</div>
													<!-- maintop end -->
													<?php endif; ?>
					
													<div id="mainmiddle">
														<div id="mainmiddle-expand">
														
															<div id="content">
																<div id="content-shift">
																
																	<?php if ($this->countModules('breadcrumbs')) : ?>
																	<div id="breadcrumbs">
																		<div class="breadcrumbs-1">
																			<div class="breadcrumbs-2">
																				<div class="breadcrumbs-3">
																					<jdoc:include type="yoomodules" name="breadcrumbs" />
																				</div>
																			</div>
																		</div>
																	</div>
																	<?php endif; ?>
																
																	<?php if ($this->countModules('contenttop')) : ?>
																	<div id="contenttop">
																		<jdoc:include type="yoomodules" name="contenttop" wrapper="contenttopbox float-left" layout="<?php echo $this->params->get('contenttop'); ?>" style="yoo" />
																	</div>
																	<!-- contenttop end -->
																	<?php endif; ?>

																	<div class="floatbox">
																		<jdoc:include type="message" />
																		<jdoc:include type="component" />
																	</div>
										
																	<?php if ($this->countModules('contentbottom')) : ?>
																	<div id="contentbottom">
																		<jdoc:include type="yoomodules" name="contentbottom" wrapper="contentbottombox float-left" layout="<?php echo $this->params->get('contentbottom'); ?>" style="yoo" />
																	</div>
																	<!-- mainbottom end -->
																	<?php endif; ?>
																
																</div>
															</div>
															<!-- content end -->
															
															<?php if($this->countModules('contentleft')) : ?>
															<div id="contentleft">
																<jdoc:include type="yoomodules" name="contentleft" style="yoo" />
															</div>
															<?php endif; ?>
															
															<?php if($this->countModules('contentright')) : ?>
															<div id="contentright">
																<jdoc:include type="yoomodules" name="contentright" style="yoo" />
															</div>
															<?php endif; ?>
															
														</div>
													</div>
													<!-- mainmiddle end -->
			
													<?php if ($this->countModules('mainbottom')) : ?>
													<div id="mainbottom">
														<jdoc:include type="yoomodules" name="mainbottom" wrapper="mainbottombox float-left" layout="<?php echo $this->params->get('mainbottom'); ?>" style="yoo" />
													</div>
													<!-- mainbottom end -->
													<?php endif; ?>
												
												</div>
											</div>
											
											<?php if($this->countModules('left')) : ?>
											<div id="left">
												<jdoc:include type="yoomodules" name="left" style="yoo" />
											</div>
											<?php endif; ?>
											
											<?php if($this->countModules('right')) : ?>
											<div id="right">
												<jdoc:include type="yoomodules" name="right" style="yoo" />
											</div>
											<?php endif; ?>

										</div>
									</div>
	
								</div>	
							</div>
							<div class="wrapper-inner-b1<?php if (!$this->countModules('bottom')) echo "-last"; ?>"><div class="wrapper-inner-b2"><div class="wrapper-inner-b3"></div></div></div>
	
							<?php if ($this->countModules('bottom + bottomblock')) : ?>
							<div class="wrapper-inner-1">
								<div class="wrapper-inner-2">
									<div id="bottom">
									
										<?php if ($this->countModules('bottom')) : ?>
											<jdoc:include type="yoomodules" name="bottom" wrapper="bottombox float-left" layout="<?php echo $this->params->get('bottom'); ?>" style="yoo" />
										<?php endif; ?>
										
										<?php if($this->countModules('bottomblock')) : ?>
										<div class="bottomblock width100 float-left">
											<jdoc:include type="yoomodules" name="bottomblock" style="yoo" />
										</div>
										<?php endif; ?>
										
									</div>
								</div>	
							</div>
							<div class="wrapper-inner-b1-last"><div class="wrapper-inner-b2"><div class="wrapper-inner-b3"></div></div></div>
							<!-- bottom end -->
							<?php endif; ?>
						
							<div id="footer">
								<a class="anchor" href="#page"></a>
								<jdoc:include type="yoomodules" name="footer" />
							</div>
							<!-- footer end -->
						
						</div>
					</div>
				</div>

				<div class="wrapper-b1">
					<div class="wrapper-b2">
						<div class="wrapper-b3"></div>
					</div>
				</div>

			</div>

		</div>
	</div>

	<div class="wrapper">
		<jdoc:include type="yoomodules" name="debug" />
	</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-15730222-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>