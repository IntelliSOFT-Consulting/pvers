<div class="autoDrugs view">
<h2><?php echo __('Auto Drug'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DrugName'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['drugName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DrugCode'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['drugCode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsGeneric'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['isGeneric']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsPreferred'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['isPreferred']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CountryOfSales'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['countryOfSales']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ActiveIngredients'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['activeIngredients']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Atcs'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['atcs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($autoDrug['AutoDrug']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Auto Drug'), array('action' => 'edit', $autoDrug['AutoDrug']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Auto Drug'), array('action' => 'delete', $autoDrug['AutoDrug']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $autoDrug['AutoDrug']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Auto Drugs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto Drug'), array('action' => 'add')); ?> </li>
	</ul>
</div>
