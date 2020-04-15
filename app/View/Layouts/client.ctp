<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('pv', 'PV');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon', $this->webroot.'img/favicon.ico');	
		
		echo $this->Html->meta(array("name"=>"viewport", "content"=>"width=device-width,  initial-scale=1.0"));
		echo $this->Html->meta(array("name"=>"description", "content"=>"this is the description"));
		echo $this->Html->meta(array("name"=>"author", "content"=>"Intellisoft"));
		
		//echo $this->Html->css('bootstrap_002');

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('jquery-ui-1.8.20.custom');
		echo $this->Html->css('pv');
		echo $this->Html->css('whmcs');

		//echo $this->Html->css('font-awesome');
		echo $this->Html->css('css');
		echo $this->Html->css('ssdnodes');
		echo $this->Html->css('ssdnodes-responsive');
		echo $this->Html->css('theme');
		
		echo $this->Html->script('jquery-1.7.2');
		echo $this->Html->script('jquery-ui-1.8.20.custom.min');
		echo $this->Html->script('bootstrap-alert');
		echo $this->Html->script('bootstrap-collapse');
		echo $this->Html->script('bootstrap-tooltip');
		echo $this->Html->script('bootstrap-popover');
		echo $this->Html->script('bootstrap-typeaheadM');
		echo $this->Html->script('jquery.autosave');
		echo $this->Html->script('pv');
	  
		echo $this->Html->meta('icon', $this->webroot.'img/favicon.ico');	

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
		
<?php 
	echo $this->element('home/navbar'); 
	echo $this->fetch('banner'); 
?>
	<div class="container">
		<div class="row">
			<?php 
				echo $this->Session->flash(); 
				echo $this->Session->flash('auth');
				echo $this->fetch('content'); 
			?>			
		</div><!--/ row -->	
	</div> <!-- /container -->

<?php 
	echo $this->element('home/extras'); 
?>
			
<div id="footer">
	<div class="inner">
		<div class="container">
			<div class="row">
				<div id="footer-copyright" class="span4">
					<p>&copy; PPB 2012</p>
				</div> <!-- /span4 -->
				
				<div id="footer-terms" class="span8">
				</div> <!-- /span8 -->
			</div> <!-- /row -->
		</div> <!-- /container -->
	</div> <!-- /inner -->
</div> <!-- /footer -->


	<?php 
		echo $this->element('sql_dump'); 
		//echo $this->Html->script('jquery-1.7.2'); // Include jQuery library
		//echo $this->Js->writeBuffer(); // Write cached scripts
	?>
	
</body>
</html>
