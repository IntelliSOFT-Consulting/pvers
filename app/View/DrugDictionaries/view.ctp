<div class="drugDictionaries view">
<h2><?php  echo __('Drug Dictionary');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($drugDictionary['DrugDictionary']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drug Name'); ?></dt>
		<dd>
			<?php echo h($drugDictionary['DrugDictionary']['drug_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($drugDictionary['DrugDictionary']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($drugDictionary['DrugDictionary']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Drug Dictionary'), array('action' => 'edit', $drugDictionary['DrugDictionary']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Drug Dictionary'), array('action' => 'delete', $drugDictionary['DrugDictionary']['id']), null, __('Are you sure you want to delete # %s?', $drugDictionary['DrugDictionary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Drug Dictionaries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Drug Dictionary'), array('action' => 'add')); ?> </li>
	</ul>
</div>
