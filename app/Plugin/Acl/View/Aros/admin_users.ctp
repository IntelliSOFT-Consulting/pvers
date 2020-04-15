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
						<li class="active">
							<?php echo $this->Html->link('<i class="icon-tag"></i> User Roles', array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'users', 'admin' => true ),
								array('escape' => false)); ?> 
						</li>
						<li>
							<?php echo $this->Html->link('<i class="icon-tag"></i> Roles Permissions', 
								array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'ajax_role_permissions', 'admin' => true ),
								array('escape' => false)); ?> 
						</li>
						<li>
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
			echo $this->element('Aros/links');
		?>
			<?php
			echo $this->Form->create('User', array('url' => array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'admin_users')));
			echo __d('acl', 'name');
			echo '<br/>';
			echo $this->Form->input($user_display_field, array('label' => false, 'div' => false));
			echo ' ';
			echo $this->Form->end(array('label' =>__d('acl', 'filter'), 'div' => false));
			echo '<br/>';
			?>
			<table border="0" cellpadding="5" cellspacing="2">
			<tr>
				<?php
				$column_count = 1;
				
				$headers = array($this->Paginator->sort($user_display_field, __d('acl', 'name')));
				
				foreach($roles as $role)
				{
					$headers[] = $role[$role_model_name][$role_display_field];
					$column_count++;
				}
				
				echo $this->Html->tableHeaders($headers);
				
				?>
				
			</tr>
			<?php
			foreach($users as $user)
			{
				$style = isset($user['Aro']) ? '' : ' class="line_warning"';
				
				echo '<tr' . $style . '>';
				echo '  <td>' . $user[$user_model_name][$user_display_field] . '</td>';
				
				foreach($roles as $role)
				{
				   if(isset($user['Aro']) && $role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
				   {
					   echo '  <td>' . $this->Html->image('/acl/img/design/tick.png') . '</td>';
				   }
				   else
				   {
					   $title = __d('acl', 'Update the user role');
					   echo '  <td>' . $this->Html->link($this->Html->image('/acl/img/design/tick_disabled.png'), '/admin/acl/aros/update_user_role/user:' . $user[$user_model_name][$user_pk_name] . '/role:' . $role[$role_model_name][$role_pk_name], array('title' => $title, 'alt' => $title, 'escape' => false)) . '</td>';
				   }
				}
				
				//echo '  <td>' . (isset($user['Aro']) ? $this->Html->image('/acl/img/design/tick.png') : $this->Html->image('/acl/img/design/cross.png')) . '</td>';
				
				echo '</tr>';
			}
			?>
			<tr>
				<td class="paging" colspan="<?php echo $column_count ?>">
					<?php echo $this->Paginator->numbers(); ?>
				</td>
			</tr>
			</table>


			<?php
			if($missing_aro)
			{
			?>
				<div style="margin-top:20px">
				
				<p class="warning"><?php echo __d('acl', 'Some users AROS are missing. Click on a role to assign one to a user.') ?></p>
				
				</div>
			<?php
			}
			?>

			<?php
			echo $this->element('design/footer');
			?>
			</div>
		</div>
</div>