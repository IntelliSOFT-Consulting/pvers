<div class="authorities index">
	<h2><?php echo __('Authorities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('mah_name'); ?></th>
			<th><?php echo $this->Paginator->sort('mah_company_name'); ?></th>
			<th><?php echo $this->Paginator->sort('mah_company_address'); ?></th>
			<th><?php echo $this->Paginator->sort('mah_company_telephone'); ?></th>
			<th><?php echo $this->Paginator->sort('mah_company_email'); ?></th>
			<th><?php echo $this->Paginator->sort('product'); ?></th>
			<th><?php echo $this->Paginator->sort('master_mah'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($authorities as $authority): ?>
	<tr>
		<td><?php echo h($authority['Authority']['id']); ?>&nbsp;</td>
		<td><?php echo h($authority['Authority']['mah_name']); ?>&nbsp;</td>
		<td><?php echo h($authority['Authority']['mah_company_name']); ?>&nbsp;</td>
		<td><?php echo h($authority['Authority']['mah_company_address']); ?>&nbsp;</td>
		<td><?php echo h($authority['Authority']['mah_company_telephone']); ?>&nbsp;</td>
		<td><?php echo h($authority['Authority']['mah_company_email']); ?>&nbsp;</td>
		<td><?php echo h($authority['Authority']['product']); ?>&nbsp;</td>
		<td><?php echo h($authority['Authority']['master_mah']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $authority['Authority']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $authority['Authority']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $authority['Authority']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $authority['Authority']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Authority'), array('action' => 'add')); ?></li>
	</ul>
</div>
