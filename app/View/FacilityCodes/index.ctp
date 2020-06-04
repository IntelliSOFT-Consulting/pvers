<div class="facilityCodes index">
	<h2><?php echo __('Facility Codes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('facility_code');?></th>
			<th><?php echo $this->Paginator->sort('facility_name');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('owner');?></th>
			<th><?php echo $this->Paginator->sort('province');?></th>
			<th><?php echo $this->Paginator->sort('district');?></th>
			<th><?php echo $this->Paginator->sort('division');?></th>
			<th><?php echo $this->Paginator->sort('location');?></th>
			<th><?php echo $this->Paginator->sort('sub_location');?></th>
			<th><?php echo $this->Paginator->sort('constituency');?></th>
			<th><?php echo $this->Paginator->sort('nearest_town');?></th>
			<th><?php echo $this->Paginator->sort('keph_level');?></th>
			<th><?php echo $this->Paginator->sort('plot_number');?></th>
			<th><?php echo $this->Paginator->sort('open_24hrs');?></th>
			<th><?php echo $this->Paginator->sort('open_weekends');?></th>
			<th><?php echo $this->Paginator->sort('beds');?></th>
			<th><?php echo $this->Paginator->sort('cots');?></th>
			<th><?php echo $this->Paginator->sort('operational_status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($facilityCodes as $facilityCode): ?>
	<tr>
		<td><?php echo h($facilityCode['FacilityCode']['id']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['facility_code']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['facility_name']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['type']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['owner']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['province']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['district']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['division']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['location']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['sub_location']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['constituency']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['nearest_town']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['keph_level']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['plot_number']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['open_24hrs']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['open_weekends']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['beds']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['cots']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['operational_status']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['created']); ?>&nbsp;</td>
		<td><?php echo h($facilityCode['FacilityCode']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $facilityCode['FacilityCode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $facilityCode['FacilityCode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $facilityCode['FacilityCode']['id']), null, __('Are you sure you want to delete # %s?', $facilityCode['FacilityCode']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Facility Code'), array('action' => 'add')); ?></li>
	</ul>
</div>
