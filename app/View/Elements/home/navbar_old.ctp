
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<?php echo $this->Html->link('PPB', array('controller' => 'pages', 'action' => 'home'), array('class' => 'brand'));?>
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="<?php echo $this->fetch('Home') ?>">
						<?php echo $this->Html->link('Home', '/pages/home');?>
					</li>
					<li class="<?php echo $this->fetch('SADR') ?>">
						<?php echo $this->Html->link('SADR', array('controller' => 'sadrs', 'action' => 'add'));?>
					</li>
					<li class="<?php echo $this->fetch('PQMP') ?>">
						<?php echo $this->Html->link('PQMP', array('controller' => 'pqmps', 'action' => 'add'));?>
					</li>
					<li class="<?php echo $this->fetch('LOGIN') ?>">
						<?php 
							// pr($this->Session->read('Auth.User'));
							if(!$this->Session->read('Auth.User')) {
								echo $this->Html->link('Log in/ Register', array('controller' => 'users', 'action' => 'login'));
							} else {
								echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
							}
						?>
					</li>
			    </ul>
			</div><!--/.nav-collapse -->	
		</div> <!-- /container -->
	</div> <!-- /navbar-inner -->
</div> <!-- /navbar -->