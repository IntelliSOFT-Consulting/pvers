<div class="listOfDevices view">
<h2><?php echo __('List Of Device'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device'); ?></dt>
		<dd>
			<?php echo $this->Html->link($listOfDevice['Device']['id'], array('controller' => 'devices', 'action' => 'view', $listOfDevice['Device']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand Name'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['brand_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serial No'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['serial_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Common Name'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['common_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['manufacturer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacture Date'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['manufacture_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiry Date'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['expiry_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($listOfDevice['ListOfDevice']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit List Of Device'), array('action' => 'edit', $listOfDevice['ListOfDevice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete List Of Device'), array('action' => 'delete', $listOfDevice['ListOfDevice']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $listOfDevice['ListOfDevice']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List List Of Devices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New List Of Device'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
