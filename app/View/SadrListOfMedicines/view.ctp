<div class="sadrListOfMedicines view">
<h2><?php echo __('Sadr List Of Medicine'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sadr'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sadrListOfMedicine['Sadr']['id'], array('controller' => 'sadrs', 'action' => 'view', $sadrListOfMedicine['Sadr']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sadr Followup'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sadrListOfMedicine['SadrFollowup']['id'], array('controller' => 'sadr_followups', 'action' => 'view', $sadrListOfMedicine['SadrFollowup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sadrListOfMedicine['Dose']['name'], array('controller' => 'doses', 'action' => 'view', $sadrListOfMedicine['Dose']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sadrListOfMedicine['Route']['name'], array('controller' => 'routes', 'action' => 'view', $sadrListOfMedicine['Route']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Frequency'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sadrListOfMedicine['Frequency']['name'], array('controller' => 'frequencies', 'action' => 'view', $sadrListOfMedicine['Frequency']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drug Name'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['drug_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand Name'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['brand_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Batch No'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['batch_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['manufacturer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['dose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stop Date'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['stop_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indication'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['indication']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suspected Drug'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['suspected_drug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sadrListOfMedicine['SadrListOfMedicine']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sadr List Of Medicine'), array('action' => 'edit', $sadrListOfMedicine['SadrListOfMedicine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sadr List Of Medicine'), array('action' => 'delete', $sadrListOfMedicine['SadrListOfMedicine']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sadrListOfMedicine['SadrListOfMedicine']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr List Of Medicines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr List Of Medicine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr Followups'), array('controller' => 'sadr_followups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr Followup'), array('controller' => 'sadr_followups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doses'), array('controller' => 'doses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dose'), array('controller' => 'doses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Frequencies'), array('controller' => 'frequencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frequency'), array('controller' => 'frequencies', 'action' => 'add')); ?> </li>
	</ul>
</div>
