<div class="sadrListOfDrugs view">
<h2><?php  echo __('Sadr List Of Drug');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sadr'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sadrListOfDrug['Sadr']['id'], array('controller' => 'sadrs', 'action' => 'view', $sadrListOfDrug['Sadr']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drug Name'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['drug_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['dose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['route']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Frequency'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['frequency']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stop Date'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['stop_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indication'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['indication']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suspected Drug'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['suspected_drug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sadrListOfDrug['SadrListOfDrug']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sadr List Of Drug'), array('action' => 'edit', $sadrListOfDrug['SadrListOfDrug']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sadr List Of Drug'), array('action' => 'delete', $sadrListOfDrug['SadrListOfDrug']['id']), null, __('Are you sure you want to delete # %s?', $sadrListOfDrug['SadrListOfDrug']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr List Of Drugs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr List Of Drug'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
