	<?php
		Configure::load('appwide');
		$root = Configure::read('Domain.root');
		// debug($help_infos);
	?>
<div class="art-header">
	<div class="art-header-clip">
		<div class="art-header-center">
			<div class="art-header-png"></div>
			<div class="art-header-jpeg"></div>
		</div>
	</div>
	<div class="art-headerobject"></div>
	<div class="art-logo">
		<h1 class="art-logo-name"><a href="<?php echo $root; ?>" id="header_title">Pharmacy and Poisons Board</a>&nbsp;&nbsp; 
			<span style="font-size: 13pt;" class="pull-right visible-desktop"  id="header_subtitle">Pharmacovigilance electronic reporting system</span></h1>
		<h2 class="art-logo-text" id="header_caption">Ensuring Safety, Quality and Efficacy of Medicines</h2>
	</div>
</div>

<div class="cleared reset-box"></div>

<div class="art-nav">
	<div class="art-nav-l"></div>
	<div class="art-nav-r"></div>
	<div class="art-nav-outer">
		<ul class="art-hmenu pull-right">
			<li>				
				<?php 
					// pr($this->Session->read('Auth.User'));
					if($this->Session->read('Auth.User')) {						
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">
						<i class="icon-user"></i> '.$this->Session->read('Auth.User.username').'</span>', 
							array('controller' => 'users', 'action' => 'changePassword') , array('escape' => false)); 
					} else {
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t"><i class="icon-user"></i> Login</span>', 
						array('controller' => 'users', 'action' =>  'Login') , array('escape' => false)); 
					}
				?>
			</li>
			<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>
			<?php if($this->Session->read('Auth.User')) { ?>
				<li>
				<?php 	
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">Logout</span>', 
						array('controller' => 'users', 'action' => 'logout', 'admin' => false) , array('escape' => false)); 
				?>				
				</li>
				<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>
			<?php } else { ?>
				<li>
				<?php 	
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">Register</span>', 
						array('controller' => 'users', 'action' => 'Register') , array('escape' => false)); 
				?>				
				</li>
				<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>			
			<?php } ?>
		</ul>
		
		<ul class="art-hmenu">
			<li><?php 	echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t"> <i class="icon-home"></i> Home</span>', '/', 
						array('escape' => false)); ?></li>
			<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>
			<li>
				<?php 	
						// echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">Report SADR</span>', 
						// array('controller' => 'sadrs', 'action' => 'add') , array('escape' => false)); 
				?>			
			</li>
			<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>
			<li>
				<?php 	
						// echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">Report PQMP</span>', 
						// array('controller' => 'pqmps', 'action' => 'add') , array('escape' => false)); 
				?>			
			</li>
			<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>
			<li>
				<?php 	
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">AEFI</span>', 
						array('controller' => 'aefis', 'action' => 'add') , array('escape' => false)); 
				?>			
			</li>
			<li>
				<?php 	
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">Devices</span>', 
						array('controller' => 'devices', 'action' => 'add') , array('escape' => false)); 
				?>			
			</li>
			<li>
				<?php 	
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">Medication Error</span>', 
						array('controller' => 'medications', 'action' => 'add') , array('escape' => false)); 
				?>			
			</li>
			<li>
				<?php 	
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">Transfusion</span>', 
						array('controller' => 'transfusions', 'action' => 'add') , array('escape' => false)); 
				?>			
			</li>
			<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>
			
			<?php if ($this->Session->read('Auth.User')) { ?>
				<li>
					<?php 	
						echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t"><i class="icon-book"></i> My Reports<b class="caret" style="vertical-align: super"></b></span>', 
							'#' , array('escape' => false)); 
					?>						
					<ul>
						<li class="r">
							<?php 	
								echo $this->Html->link('<span>SADR Reports</span>', 
								array('controller' => 'sadrs', 'action' => 'sadrIndex') , array('escape' => false)); 
							?>
						</li>
						<li>
							<?php 	
								echo $this->Html->link('<span>SADR Follow UP reports</span>', 
								array('controller' => 'sadr_followups', 'action' => 'followupIndex') , array('escape' => false)); 
							?>
						</li>
						<li>
							<?php 	
								echo $this->Html->link('<span>PQMP Reports</span>', 
								array('controller' => 'pqmps', 'action' => 'pqmpIndex') , array('escape' => false)); 
							?>
						</li>
						<li>
							<?php 	
								echo $this->Html->link('<span>AEFI Reports</span>', 
								array('controller' => 'aefis', 'action' => 'aefiIndex') , array('escape' => false)); 
							?>
						</li>
					</ul>
				</li>
				<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>
			<?php } ?>			
				<li>
					<?php 	
							echo $this->Html->link('<span class="l"></span><span class="r"></span> <span class="t">Feedback</span>', 
							array('controller' => 'feedbacks', 'action' => 'add') , array('escape' => false)); 
					?>			
				</li>
				<li class="art-hmenu-li-separator"><span class="art-hmenu-separator"> </span></li>
		</ul>

	</div>
</div>
<div class="cleared reset-box"></div>
