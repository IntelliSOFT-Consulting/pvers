<div class="whoDrugs view">
<h2><?php  echo __('Who Drug');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MedId'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['MedId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drug Record Number'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['drug_record_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sequence No 1'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['sequence_no_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sequence No 2'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['sequence_no_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sequence No 3'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['sequence_no_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sequence No 4'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['sequence_no_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generic'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['generic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drug Name'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['drug_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Specifier'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['name_specifier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Market Authorization Number'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['market_authorization_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Market Authorization Date'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['market_authorization_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Market Authorization Withdrawal Date'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['market_authorization_withdrawal_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marketing Authorization Holder'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['marketing_authorization_holder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source Code'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['source_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source Country'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['source_country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source Year'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['source_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Type'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['product_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Group'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['product_group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Create Date'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['create_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Changed'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['date_changed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($whoDrug['WhoDrug']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Who Drug'), array('action' => 'edit', $whoDrug['WhoDrug']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Who Drug'), array('action' => 'delete', $whoDrug['WhoDrug']['id']), null, __('Are you sure you want to delete # %s?', $whoDrug['WhoDrug']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Who Drugs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Who Drug'), array('action' => 'add')); ?> </li>
	</ul>
</div>
