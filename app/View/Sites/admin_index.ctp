<?php 
	$this->assign('CMS', 'active');
?>
      <!-- CMS
    ================================================== -->
	<h3>Content Management System <small>(Sites)</small></h3>
		<hr>

<div class="row-fluid" style="margin-bottom: 9px;">	
	<div class="span2 columns">
		<div class="row-fluid">
			<div class="span12">
				  <?php echo $this->element('admin/contentmenu')?>
				  
			</div><!--/span-->
		</div><!--/row-->	
	</div> <!-- /span5 -->

	<div class="span10 columns">
		<?php
			echo $this->Html->link('Add A Site', array('controller' => 'sites', 'action' => 'add', 'admin' => true ), array('class' => 'btn btn-info'));
		?>
		<div class="row-fluid">		
					
			<?php
				if(count($sites) >  0) { ?>
			<p>
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>, 
								showing <span class="badge">{:current}</span> drugs out of 
								<span class="badge badge-inverse">{:count}</span> total, starting on record <span class="badge">{:start}</span>, 
								ending on <span class="badge">{:end}</span>')
				));
			?>	
			</p>
			<div class="pagination">
				<ul>
				<?php
					echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
					echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active'));
					echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false ));
				?>
				</ul>
			</div>	
			<hr>
				<table  class="table table-striped">		
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id', 'ID');?></th>
						<th><?php echo $this->Paginator->sort('description');?></th>
						<th><?php echo $this->Paginator->sort('created');?></th>
						<th><?php echo $this->Paginator->sort('modified');?></th>
						<th><?php echo __('Actions');?></th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($sites as $site): ?>
					<tr>
						<td><?php echo h($site['Site']['id']); ?>&nbsp;</td>
						<td><?php echo h($site['Site']['description']); ?>&nbsp;</td>
						<td><?php echo h($site['Site']['created']); ?>&nbsp;</td>
						<td><?php echo h($site['Site']['modified']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link('<span class="label label-info"><i class="icon-pencil icon-white"></i> Edit</span>' , 
									array('controller' => 'sites', 'action' => 'edit', $site['Site']['id']), array('escape' => false)); ?>&nbsp;
							<?php echo $this->Form->postLink(__('<span class="label label-important"><i class="icon-trash icon-white"></i> Delete</span>'), 
									array('action' => 'delete', $site['Site']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $site['Site']['id'])); ?>&nbsp;
						</td>
					</tr>
				<?php endforeach; ?>		
				</tbody>
				</table>
				<?php } else { ?>
					<p>There were no reports that met your search criteria.</p>
				<?php } ?>	
		</div> <!-- /row-fluid -->
	</div>
</div>
