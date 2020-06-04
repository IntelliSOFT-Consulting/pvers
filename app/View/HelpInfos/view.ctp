<div class="helpInfos view">
<h2><?php  echo __('Help Info');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field Name'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['field_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field Label'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['field_label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Help Type'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['help_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Help Text'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['help_text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($helpInfo['HelpInfo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Help Info'), array('action' => 'edit', $helpInfo['HelpInfo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Help Info'), array('action' => 'delete', $helpInfo['HelpInfo']['id']), null, __('Are you sure you want to delete # %s?', $helpInfo['HelpInfo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Help Infos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Help Info'), array('action' => 'add')); ?> </li>
	</ul>
</div>
