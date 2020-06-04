<div class="frequencies view">
<h2><?php  echo __('Frequency');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($frequency['Frequency']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($frequency['Frequency']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($frequency['Frequency']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icsr Code'); ?></dt>
		<dd>
			<?php echo h($frequency['Frequency']['icsr_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($frequency['Frequency']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($frequency['Frequency']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Frequency'), array('action' => 'edit', $frequency['Frequency']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Frequency'), array('action' => 'delete', $frequency['Frequency']['id']), null, __('Are you sure you want to delete # %s?', $frequency['Frequency']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Frequencies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frequency'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr List Of Drugs'), array('controller' => 'sadr_list_of_drugs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr List Of Drug'), array('controller' => 'sadr_list_of_drugs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sadr List Of Drugs');?></h3>
	<?php if (!empty($frequency['SadrListOfDrug'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sadr Id'); ?></th>
		<th><?php echo __('Sadr Followup Id'); ?></th>
		<th><?php echo __('Administration Route Id'); ?></th>
		<th><?php echo __('Frequency Id'); ?></th>
		<th><?php echo __('Drug Name'); ?></th>
		<th><?php echo __('Brand Name'); ?></th>
		<th><?php echo __('Dose'); ?></th>
		<th><?php echo __('Route'); ?></th>
		<th><?php echo __('Frequency'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('Stop Date'); ?></th>
		<th><?php echo __('Indication'); ?></th>
		<th><?php echo __('Suspected Drug'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($frequency['SadrListOfDrug'] as $sadrListOfDrug): ?>
		<tr>
			<td><?php echo $sadrListOfDrug['id'];?></td>
			<td><?php echo $sadrListOfDrug['sadr_id'];?></td>
			<td><?php echo $sadrListOfDrug['sadr_followup_id'];?></td>
			<td><?php echo $sadrListOfDrug['administration_route_id'];?></td>
			<td><?php echo $sadrListOfDrug['frequency_id'];?></td>
			<td><?php echo $sadrListOfDrug['drug_name'];?></td>
			<td><?php echo $sadrListOfDrug['brand_name'];?></td>
			<td><?php echo $sadrListOfDrug['dose'];?></td>
			<td><?php echo $sadrListOfDrug['route'];?></td>
			<td><?php echo $sadrListOfDrug['frequency'];?></td>
			<td><?php echo $sadrListOfDrug['start_date'];?></td>
			<td><?php echo $sadrListOfDrug['stop_date'];?></td>
			<td><?php echo $sadrListOfDrug['indication'];?></td>
			<td><?php echo $sadrListOfDrug['suspected_drug'];?></td>
			<td><?php echo $sadrListOfDrug['created'];?></td>
			<td><?php echo $sadrListOfDrug['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sadr_list_of_drugs', 'action' => 'view', $sadrListOfDrug['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sadr_list_of_drugs', 'action' => 'edit', $sadrListOfDrug['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sadr_list_of_drugs', 'action' => 'delete', $sadrListOfDrug['id']), null, __('Are you sure you want to delete # %s?', $sadrListOfDrug['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sadr List Of Drug'), array('controller' => 'sadr_list_of_drugs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
