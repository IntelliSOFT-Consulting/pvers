<div class="designations index">
	<h2><?php echo __('Designations'); ?></h2>
	<table class="table table-stripped" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($designations as $designation): ?>
	<tr>
		<td><?php echo h($designation['Designation']['id']); ?>&nbsp;</td>
		<td><?php echo h($designation['Designation']['name']); ?>&nbsp;</td>
		<td>
			<?php 
				$categories = ['1' => 'Physician', '2' => 'Pharmacist', '3' => 'Other Health Professional', '4' => 'Lawyer', '5' => 'Consumer or other non-health professional'];
				echo (isset($categories[$designation['Designation']['category']])) ? $categories[$designation['Designation']['category']] : '<small class="muted">please set</small>'; 
			?>&nbsp;
		</td>
		<td><?php echo h($designation['Designation']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $designation['Designation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $designation['Designation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $designation['Designation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $designation['Designation']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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

