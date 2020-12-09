<div class="subCounties view">
<h2><?php echo __('Sub County'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subCounty['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $subCounty['County']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub County Name'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['sub_county_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County Name'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['county_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['Province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pop 2009'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['Pop_2009']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RegVoters'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['RegVoters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AreaSqKms'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['AreaSqKms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CAWards'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['CAWards']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MainEthnicGroup'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['MainEthnicGroup']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sub County'), array('action' => 'edit', $subCounty['SubCounty']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sub County'), array('action' => 'delete', $subCounty['SubCounty']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $subCounty['SubCounty']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Counties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub County'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
	</ul>
</div>
