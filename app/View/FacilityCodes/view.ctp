<div class="facilityCodes view">
<h2><?php  echo __('Facility Code');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facility Code'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['facility_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facility Name'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['facility_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['owner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['district']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['division']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Location'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['sub_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Constituency'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['constituency']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nearest Town'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['nearest_town']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keph Level'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['keph_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plot Number'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['plot_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open 24hrs'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['open_24hrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open Weekends'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['open_weekends']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Beds'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['beds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cots'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['cots']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operational Status'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['operational_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($facilityCode['FacilityCode']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Facility Code'), array('action' => 'edit', $facilityCode['FacilityCode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Facility Code'), array('action' => 'delete', $facilityCode['FacilityCode']['id']), null, __('Are you sure you want to delete # %s?', $facilityCode['FacilityCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Facility Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facility Code'), array('action' => 'add')); ?> </li>
	</ul>
</div>
