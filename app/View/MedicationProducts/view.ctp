<div class="medicationProducts view">
<h2><?php echo __('Medication Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medication'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medicationProduct['Medication']['id'], array('controller' => 'medications', 'action' => 'view', $medicationProduct['Medication']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generic Name I'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['generic_name_i']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Name I'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['product_name_i']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dosage Form I'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['dosage_form_i']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dosage I'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['dosage_i']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer I'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['manufacturer_i']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Strength I'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['strength_i']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Container I'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['container_i']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generic Name Ii'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['generic_name_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Name Ii'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['product_name_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dosage Form Ii'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['dosage_form_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dosage Ii'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['dosage_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer Ii'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['manufacturer_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Strength Ii'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['strength_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Container Ii'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['container_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifed'); ?></dt>
		<dd>
			<?php echo h($medicationProduct['MedicationProduct']['modifed']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medication Product'), array('action' => 'edit', $medicationProduct['MedicationProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medication Product'), array('action' => 'delete', $medicationProduct['MedicationProduct']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $medicationProduct['MedicationProduct']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Medication Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medication Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medications'), array('controller' => 'medications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medication'), array('controller' => 'medications', 'action' => 'add')); ?> </li>
	</ul>
</div>
