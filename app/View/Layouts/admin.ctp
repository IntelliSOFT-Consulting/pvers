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

		echo $this->Html->css('jquery-ui-1.8.20.custom');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('docs');
		echo $this->Html->css('pv');
		echo $this->Html->css('compatibility_hacks');

		echo $this->Html->script('jquery-1.7.2');
		echo $this->Html->script('jquery-ui-1.8.20.custom.min');
		echo $this->Html->script('bootstrap-transition');
		echo $this->Html->script('bootstrap-alert');
		echo $this->Html->script('bootstrap-collapse');
		echo $this->Html->script('bootstrap-tooltip');
		echo $this->Html->script('bootstrap-popover');
		echo $this->Html->script('bootstrap-dropdown');
		echo $this->Html->script('jquery.autosave');
		echo $this->Html->script('pv');
		echo $this->Html->script('jquery.validate');

		echo $this->Html->meta('icon', $this->webroot.'img/favicon.ico');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->element('google-analytics');
	?>
</head>
  <body data-spy="scroll" data-target=".subnav" data-offset="50">
  <!-- Navbar
    ================================================== -->

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		  <?php echo $this->Html->link('PV Administration (restricted)', array('controller' => 'pages', 'action' => 'dashboard', 'admin' => true, 'plugin' => false ), array('class' => 'brand')); ?>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i>
				<?php
					// pr($this->Session->read('Auth.User'));
					if($this->Session->read('Auth.User')) {
						echo $this->Session->read('Auth.User.username');
					} else {
						echo "Login";
					}
				?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
				<?php if($this->Session->read('Auth.User')) { ?>
				<li>
				<?php
					echo $this->Html->link('Profile',
						array('controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id'), 'admin' => true, 'plugin' => false) , array('escape' => false));
				?>
				</li>
				<li class="divider"></li>
				<li>
				<?php
					echo $this->Html->link('Sign Out',
						array('controller' => 'users', 'action' => 'logout', 'admin' => false, 'plugin' => false) , array('escape' => false));
				?>
				</li>
			<?php } ?>
            </ul>
          </div>
		  <?php if($this->Session->read('Auth.User')) { ?>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="<?php echo $this->fetch('Dashboard') ?>">
				<?php echo $this->Html->link('<i class="icon-home icon-white"></i> Dashboard', array('controller' => 'pages', 'action' => 'dashboard', 'admin' => true, 'plugin' => false ), array('escape' => false)); ?>
			  </li>
              <li class="<?php echo $this->fetch('CMS') ?>">
				<?php echo $this->Html->link('<i class="icon-book icon-white"></i> CMS', array('controller' => 'help_infos', 'action' => 'index', 'admin' => true, 'plugin' => false ), array('escape' => false)); ?>
			  </li>

              <li class="<?php echo $this->fetch('FEEDBACK') ?>">
				<?php echo $this->Html->link('<i class="icon-comment icon-white"></i> Feedback', array('controller' => 'feedbacks', 'action' => 'index', 'admin' => true, 'plugin' => false ), array('escape' => false)); ?>
			  </li>

			  <li class="<?php echo $this->fetch('REPORTS') ?> dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list icon-white"></i> Reports<b class="caret"></b></a>
				<ul class="pull-right dropdown-menu">
					<li>
						<?php echo $this->Html->link('SADR Reports', array('controller' => 'sadrs', 'action' => 'index', 'submitted'=>'2', 'admin' => true, 'plugin' => false )); ?>
					</li>
					<li>
					<?php
						echo $this->Html->link('SADR Follow UP Reports',
							array('controller' => 'sadr_followups', 'action' => 'index', 'submitted'=>'2', 'admin' => true, 'plugin' => false ),
							array('escape' => false));
					?>
					</li>
					<li>
						<?php echo $this->Html->link('PQMP Reports', array('controller' => 'pqmps', 'action' => 'index', 'submitted'=>'2', 'admin' => true, 'plugin' => false )); ?>
					</li>
					<li class="divider"></li>
					<li>
						<?php echo $this->Html->link('File Attachments', array('controller' => 'attachments', 'action' => 'index', 'admin' => true, 'plugin' => false )); ?>
					</li>
				</ul>
			  </li>
			  <li class="<?php echo $this->fetch('USERS') ?> dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> User Management<b class="caret"></b></a>
				<ul class="pull-right dropdown-menu">
					<li>
						<?php // echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index', 'admin' => true, 'plugin' => false )); ?>
						<?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index', 'admin' => true, 'plugin' => false )); ?>
					</li>
					<li>
						<?php echo $this->Html->link('User Groups/Roles', array('controller' => 'groups', 'action' => 'index', 'admin' => true, 'plugin' => false )); ?>
					</li>
					<li class="divider"></li>
					<li class="nav-header">Permissions</li>
					<li>
						<?php echo $this->Html->link('User Roles', array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'users', 'admin' => true )); ?>
					</li>
					<li>
						<?php echo $this->Html->link('Roles Permissions', array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'ajax_role_permissions', 'admin' => true )); ?>
					</li>
					<li>
						<?php echo $this->Html->link('User Permissions', array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'user_permissions', 'admin' => true )); ?>
					</li>
				</ul>
			  </li>
            </ul>
          </div><!--/.nav-collapse -->
		  <?php } ?>
        </div>
      </div>
    </div>


	<div class="container">

      <!-- Masthead
      ================================================== -->
	    <div class="condend">
			<section id="<?php echo $this->fetch('Users') ?>">
			<?php
				echo $this->Session->flash();
				echo $this->Session->flash('auth');
				// echo $this->fetch('banner');
				echo $this->fetch('content');
			?>
			</section>
	    </div>

	  <hr>

	  <footer>
		<p>&copy; PPB 2012</p>
	  </footer>

	</div><!--/.fluid-container-->

	<?php
		echo $this->element('sql_dump');
		//echo $this->Html->script('jquery-1.7.2'); // Include jQuery library
		//echo $this->Js->writeBuffer(); // Write cached scripts
	?>

</body>
</html>
