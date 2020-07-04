<div class="suspectedDrugs view">
<h2><?php echo __('Suspected Drug'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sae'); ?></dt>
		<dd>
			<?php echo $this->Html->link($suspectedDrug['Sae']['id'], array('controller' => 'saes', 'action' => 'view', $suspectedDrug['Sae']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generic Name'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['generic_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['dose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($suspectedDrug['Route']['name'], array('controller' => 'routes', 'action' => 'view', $suspectedDrug['Route']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indication'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['indication']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date From'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['date_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date To'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['date_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Therapy Duration'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['therapy_duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction Abate'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['reaction_abate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction Reappear'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['reaction_reappear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['deleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['deleted_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($suspectedDrug['SuspectedDrug']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Suspected Drug'), array('action' => 'edit', $suspectedDrug['SuspectedDrug']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Suspected Drug'), array('action' => 'delete', $suspectedDrug['SuspectedDrug']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $suspectedDrug['SuspectedDrug']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Suspected Drugs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Suspected Drug'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saes'), array('controller' => 'saes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sae'), array('controller' => 'saes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
