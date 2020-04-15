<div class="row-fluid" style="margin-bottom: 9px;">	
	<div class="span2 columns">
		<div class="row-fluid">
			<div class="span12">
				  <div class="well" style="padding: 8px 0;">
					<ul class="nav nav-list">
					  <li class="nav-header"><i class="icon-glass"></i>  Filter Options </li>
					  <li class="divider"></li>
					  <li>
						<?php echo $this->Html->link('<i class="icon-book"></i> Users', 
									array('controller' => 'users', 'action' => 'index', 'admin' => true, 'plugin' => false), 
									array('escape' => false)); ?>
					  </li>
					  <li>
						<?php echo $this->Html->link('<i class="icon-tag"></i> Groups', 
									array('controller' => 'groups', 'action' => 'index', 'admin' => true, 'plugin' => false), 
									array('escape' => false)); ?>
					  </li>					 
					  <li class="divider"></li>
					  <li class="nav-header">Permissions</li>
						<li>
							<?php echo $this->Html->link('<i class="icon-tag"></i> User Roles', array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'users', 'admin' => true ),
								array('escape' => false)); ?> 
						</li>
						<li>
							<?php echo $this->Html->link('<i class="icon-tag"></i> Roles Permissions', 
								array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'ajax_role_permissions', 'admin' => true ),
								array('escape' => false)); ?> 
						</li>
						<li class="active">
							<?php echo $this->Html->link('<i class="icon-tag"></i> User Permissions', array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'user_permissions', 'admin' => true ),
								array('escape' => false)); ?> 
						</li>					  
					</ul>
				  </div> <!-- /well -->					  
			</div><!--/span-->
		</div><!--/row-->	
	</div> <!-- /span5 -->
	
	
	<div class="span10 columns">						
		<div class="row-fluid">	
		<?php 
		echo $this->element('design/header');
		?>

		<?php 
		echo $this->element('Acos/links');
		?>

		<?php
		echo $this->element('design/footer');
		?>
		</div>
	</div>
</div>