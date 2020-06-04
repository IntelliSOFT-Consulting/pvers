  <!-- SADR FOLLOW UPS
================================================== -->
<section id="sadrsadd">  
<div class="row-fluid">
	<div class="span12">	
		<ul class="nav nav-tabs">
			<li><?php 
					$edit = ($submitted['Sadr']['submitted']==2) ? 'view' : 'edit';
					echo $this->Html->link('Initial Report ID: '.$submitted['Sadr']['id'], array('controller' => 'sadrs', 'action' => $edit, $submitted['Sadr']['id'])); ?> </a></li>
			<li class="active"><?php 
				echo $this->Html->link('Follow Ups ('.count($SadrFollowups).')', 
					array('controller' => 'SadrFollowups', 'action' => 'sadrIndex', $this->request->params['pass'][0])); 
				?>
			</li>
		</ul>
		<?php // pr($this->request->params['pass'][0]); ?>
		<div class="page-header">
			<h3>SADR Report NO: <?php echo $this->request->params['pass'][0] ?></h3>
		</div>
		
		<?php
			if(count($SadrFollowups) >  0) { ?>
		
		<table  class="table table-striped">		
		<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('description_of_reaction');?></th>
					<th><?php echo $this->Paginator->sort('created');?></th>
					<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($SadrFollowups as $SadrFollowup): ?>
			<tr>
				<td><?php echo h($SadrFollowup['SadrFollowup']['id']); ?>&nbsp;</td>
				<td><?php echo h($SadrFollowup['SadrFollowup']['description_of_reaction']); ?>&nbsp;</td>
				<td><?php echo h($SadrFollowup['SadrFollowup']['created']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link('view', array('controller' => 'sadr_followups', 'action' => 'view',$SadrFollowup['SadrFollowup']['id'] )); ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>		
		</tbody>
		</table>
		<div class="pagination">
			<ul>
			<?php
				echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
				echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active'));
				echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false ));
			?>
			</ul>
		</div>		
		<p>
		<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
		?>	
		</p>
		<?php } else { ?>
		<p>You have not submitted any Follow up Report on this SADR</p>
		<?php echo $this->Html->link('Back to initial SADR', array('controller'=>'sadrs', 'action' => $edit, $submitted['Sadr']['id'])) ?>
		<?php } ?>
	</div>
</div>
</section>
