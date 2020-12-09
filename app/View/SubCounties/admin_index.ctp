<div class="subCounties index">
	<h2><?php echo __('Sub Counties'); ?></h2>
	<table class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('county_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_county_name'); ?></th>
			<th><?php echo $this->Paginator->sort('county_name'); ?></th>
			<th><?php echo $this->Paginator->sort('Province'); ?></th>
			<th><?php echo $this->Paginator->sort('Pop_2009'); ?></th>
			<th><?php echo $this->Paginator->sort('RegVoters'); ?></th>
			<th><?php echo $this->Paginator->sort('AreaSqKms'); ?></th>
			<th><?php echo $this->Paginator->sort('CAWards'); ?></th>
			<th><?php echo $this->Paginator->sort('MainEthnicGroup'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($subCounties as $subCounty): ?>
	<tr>
		<td><?php echo h($subCounty['SubCounty']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subCounty['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $subCounty['County']['id'])); ?>
		</td>
		<td><?php echo h($subCounty['SubCounty']['sub_county_name']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['county_name']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['Province']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['Pop_2009']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['RegVoters']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['AreaSqKms']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['CAWards']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['MainEthnicGroup']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['created']); ?>&nbsp;</td>
		<td><?php echo h($subCounty['SubCounty']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subCounty['SubCounty']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subCounty['SubCounty']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subCounty['SubCounty']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $subCounty['SubCounty']['id']))); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Sub County'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
	</ul>
</div>
