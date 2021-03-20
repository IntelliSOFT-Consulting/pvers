<div class="padrListOfMedicines view">
<h2><?php echo __('Padr List Of Medicine'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($padrListOfMedicine['PadrListOfMedicine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Padr'); ?></dt>
		<dd>
			<?php echo $this->Html->link($padrListOfMedicine['Padr']['id'], array('controller' => 'padrs', 'action' => 'view', $padrListOfMedicine['Padr']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Name'); ?></dt>
		<dd>
			<?php echo h($padrListOfMedicine['PadrListOfMedicine']['product_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer'); ?></dt>
		<dd>
			<?php echo h($padrListOfMedicine['PadrListOfMedicine']['manufacturer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiry Date'); ?></dt>
		<dd>
			<?php echo h($padrListOfMedicine['PadrListOfMedicine']['expiry_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($padrListOfMedicine['PadrListOfMedicine']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($padrListOfMedicine['PadrListOfMedicine']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($padrListOfMedicine['PadrListOfMedicine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifed'); ?></dt>
		<dd>
			<?php echo h($padrListOfMedicine['PadrListOfMedicine']['modifed']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Padr List Of Medicine'), array('action' => 'edit', $padrListOfMedicine['PadrListOfMedicine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Padr List Of Medicine'), array('action' => 'delete', $padrListOfMedicine['PadrListOfMedicine']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $padrListOfMedicine['PadrListOfMedicine']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Padr List Of Medicines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Padr List Of Medicine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Padrs'), array('controller' => 'padrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Padr'), array('controller' => 'padrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
