<?php
    define('MAINTENANCE', ''); 
    // if(MAINTENANCE > 0 && $_SERVER[‘REMOTE_ADDR’] !=’188.YOUR.IP.HERE’)
    if(MAINTENANCE == 'moved') { 
        require('moved.php');  die(); 
    }
    if(MAINTENANCE == 'maintenance') {
        require('maintenance.php'); die(); 
    }
   

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
		

		// echo $this->Html->css('jquery-ui-1.8.20.custom');
		// echo $this->Html->css('bootstrap');
		// echo $this->Html->css('style');
		// echo $this->Html->css('bootstrap-responsive');
		
		// echo $this->Html->css('pv');
		// echo $this->Html->css('compatibility_hacks');
		// echo $this->Html->css('style-responsive');
		echo $this->AssetCompress->css('default');
		
		// echo $this->Html->script('jquery-1.7.2');
		// echo $this->Html->script('jquery-ui-1.8.20.custom.min');
		// echo $this->Html->script('bootstrap-transition');
		// echo $this->Html->script('bootstrap-alert');
		// echo $this->Html->script('bootstrap-collapse');
		// echo $this->Html->script('bootstrap-tooltip');
		// echo $this->Html->script('bootstrap-popover');
		// echo $this->Html->script('bootstrap-dropdown');
		// echo $this->Html->script('jquery.autosave');
		// echo $this->Html->script('jquery.validate');
		// echo $this->Html->script('pv');
		echo $this->AssetCompress->script('jquery-combined');
		// echo $this->Html->css('font-awesome');
		// echo $this->Html->css('font-awesome-ie7');
		echo $this->Html->meta('icon', $this->webroot.'img/favicon.ico');	

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->AssetCompress->includeJs();
		
		echo $this->element('google-analytics'); 
	?>
</head>
<body>
	<div class="container">
		<div class="art-sheet">
			<div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
			<div class="art-sheet-body">
				<?php 
					echo $this->element('home/banner');
					echo $this->Session->flash(); 
					echo $this->Session->flash('auth'); 
					echo $this->fetch('content'); 
				?>		
				<div class="cleared"></div>
					<div class="art-footer">
						<div class="art-footer-t"></div>
						<div class="art-footer-l"></div>
						<div class="art-footer-b"></div>
						<div class="art-footer-r"></div>
						<div class="art-footer-body">
							<a href="http://www.facebook.com/pages/Nairobi-Kenya/Pharmacy-and-Poisons-Board/110132515672042" class="art-rss-tag-icon" title="Facebook"></a>
							<div class="art-footer-text">
								<p>Copyright &copy; <?php echo date('Y'); ?>. All Rights Reserved.</p>
							</div>
							<div class="cleared"></div>
						</div>
					</div>
				<div class="cleared"></div>				
			</div> <!-- /art-sheet-body -->
		</div> <!-- /art-sheet -->
		<div class="cleared"></div>	
		<p class="art-page-footer"><a href="http://www.pharmacyboardkenya.org/">Website</a> Designed and Developed by PPB.</p>
	</div> <!-- /container -->


<?php 
	// echo $this->element('home/extras'); 
?>
			


	<?php 
		echo $this->element('sql_dump'); 
		//echo $this->Html->script('jquery-1.7.2'); // Include jQuery library
		//echo $this->Js->writeBuffer(); // Write cached scripts
	?>
	
</body>
</html>
