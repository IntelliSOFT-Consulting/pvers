<div class="aefis index">
	<h2><?php echo __('Aefis');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('county_id');?></th>
			<th><?php echo $this->Paginator->sort('sub_county_id');?></th>
			<th><?php echo $this->Paginator->sort('designation_id');?></th>
			<th><?php echo $this->Paginator->sort('report_type');?></th>
			<th><?php echo $this->Paginator->sort('name_of_institution');?></th>
			<th><?php echo $this->Paginator->sort('institution_code');?></th>
			<th><?php echo $this->Paginator->sort('patient_name');?></th>
			<th><?php echo $this->Paginator->sort('ip_no');?></th>
			<th><?php echo $this->Paginator->sort('date_of_birth');?></th>
			<th><?php echo $this->Paginator->sort('ward');?></th>
			<th><?php echo $this->Paginator->sort('gender');?></th>
			<th><?php echo $this->Paginator->sort('date_of_onset_of_reaction');?></th>
			<th><?php echo $this->Paginator->sort('description_of_reaction');?></th>
			<th><?php echo $this->Paginator->sort('action_taken');?></th>
			<th><?php echo $this->Paginator->sort('outcome');?></th>
			<th><?php echo $this->Paginator->sort('reporter_name');?></th>
			<th><?php echo $this->Paginator->sort('reporter_email');?></th>
			<th><?php echo $this->Paginator->sort('reporter_phone');?></th>
			<th><?php echo $this->Paginator->sort('submitted');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($aefis as $aefi): ?>
	<tr>
		<td><?php echo h($aefi['Aefi']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aefi['User']['name'], array('controller' => 'users', 'action' => 'view', $aefi['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aefi['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $aefi['County']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aefi['SubCounty']['sub_county_name'], array('controller' => 'sub_counties', 'action' => 'view', $aefi['SubCounty']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aefi['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $aefi['Designation']['id'])); ?>
		</td>
		<td><?php echo h($aefi['Aefi']['report_type']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['name_of_institution']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['institution_code']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['ip_no']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['date_of_birth']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['ward']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['gender']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['date_of_onset_of_reaction']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['description_of_reaction']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['action_taken']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['outcome']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['reporter_name']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['reporter_email']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['reporter_phone']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['submitted']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['created']); ?>&nbsp;</td>
		<td><?php echo h($aefi['Aefi']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aefi['Aefi']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aefi['Aefi']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aefi['Aefi']['id']), null, __('Are you sure you want to delete # %s?', $aefi['Aefi']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Aefi'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Counties'), array('controller' => 'sub_counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub County'), array('controller' => 'sub_counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
