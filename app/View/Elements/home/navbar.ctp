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
		  <div class="btn-group pull-right">
            <a class="btn btn-large dropdown-toggle" data-toggle="dropdown" href="#">
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
				<?php
					if(!$this->Session->read('Auth.User')) {				
				?>
				<li>
					<?php 
							echo $this->Html->link('Log in', array('controller' => 'users', 'action' => 'login'));
					?>
				</li>
				<li class="divider"></li>
				<li>
					<?php 
							echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register'));
					?>
				</li>
				<?php
					} else {		
				?>
				<li><a href="#">Sign Out</a></li>
				<?php
					}
				?>
            </ul>
          </div>
          <div class="nav-collapse collapse">            
			<ul class="nav">
				<li class="<?php echo $this->fetch('Home') ?>">
					<?php echo $this->Html->link('Home', '/pages/home');?>
				</li>
				<li class="<?php echo $this->fetch('SADR') ?>">
					<?php echo $this->Html->link('SADR', array('controller' => 'sadrs', 'action' => 'add'));?>
				</li>
				<li class="<?php echo $this->fetch('PQMP') ?>">
					<?php echo $this->Html->link('PQMP', array('controller' => 'pqmps', 'action' => 'add'));?>
				</li>
			    </ul>
          </div>
        </div>
      </div>
    </div>