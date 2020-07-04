<div class="concomittantDrugs view">
<h2><?php echo __('Concomittant Drug'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sae'); ?></dt>
		<dd>
			<?php echo $this->Html->link($concomittantDrug['Sae']['id'], array('controller' => 'saes', 'action' => 'view', $concomittantDrug['Sae']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generic Name'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['generic_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['dose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($concomittantDrug['Route']['name'], array('controller' => 'routes', 'action' => 'view', $concomittantDrug['Route']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indication'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['indication']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date From'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['date_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date To'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['date_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['deleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['deleted_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($concomittantDrug['ConcomittantDrug']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Concomittant Drug'), array('action' => 'edit', $concomittantDrug['ConcomittantDrug']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Concomittant Drug'), array('action' => 'delete', $concomittantDrug['ConcomittantDrug']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $concomittantDrug['ConcomittantDrug']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Concomittant Drugs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concomittant Drug'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saes'), array('controller' => 'saes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sae'), array('controller' => 'saes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
