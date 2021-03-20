<div class="authorities view">
<h2><?php echo __('Authority'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($authority['Authority']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mah Name'); ?></dt>
		<dd>
			<?php echo h($authority['Authority']['mah_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mah Company Name'); ?></dt>
		<dd>
			<?php echo h($authority['Authority']['mah_company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mah Company Address'); ?></dt>
		<dd>
			<?php echo h($authority['Authority']['mah_company_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mah Company Telephone'); ?></dt>
		<dd>
			<?php echo h($authority['Authority']['mah_company_telephone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mah Company Email'); ?></dt>
		<dd>
			<?php echo h($authority['Authority']['mah_company_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo h($authority['Authority']['product']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Master Mah'); ?></dt>
		<dd>
			<?php echo h($authority['Authority']['master_mah']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Authority'), array('action' => 'edit', $authority['Authority']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Authority'), array('action' => 'delete', $authority['Authority']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $authority['Authority']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Authorities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Authority'), array('action' => 'add')); ?> </li>
	</ul>
</div>
