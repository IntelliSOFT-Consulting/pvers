<?php 
	$this->assign('CMS', 'active');
 ?>

      <!-- CMS
    ================================================== -->
	<h3>Content Management System <small>(ROUTES)</small></h3>
		<p>Search for the content that you wish to modify and change accordingly.</p>	
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
					echo $this->Form->create('Route', array(
						'url' => array_merge(array('action' => 'admin_index', 'admin' => true), $this->params['pass']),
						'class' => 'well',
					));
				?>
				<div class="row-fluid">
					<div class="span2 columns">
					<?php
						echo $this->Html->link('Add A Route', array('controller' => 'routes', 'action' => 'add', 'admin' => true ), array('class' => 'btn btn-info'));
					?>
					</div>
					<div class="span6 columns">
					<?php
						echo $this->Form->input('name', array('div' => false, 'class' => 'span10', 'label' => array('class' => 'required', 'text' => 'Name')));
					?>
					</div>
					<div class="span4 columns">
					<p class="muted">Search on any field.</p>
					<?php	
						// echo $this->Form->submit(__('Search', true), array('div' => 'control-group', 'class' => 'btn btn-inverse'));
						echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
									'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
								));
						echo $this->Form->end();
					?>
					</div>
				</div>
				
				<div class="row-fluid">		
					
					<?php
						if(count($routes) >  0) { ?>
					<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>, 
										showing <span class="badge">{:current}</span> records out of 
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
								<th><?php echo $this->Paginator->sort('id');?></th>
								<th><?php echo $this->Paginator->sort('value');?></th>
								<th><?php echo $this->Paginator->sort('name');?></th>
								<th><?php echo $this->Paginator->sort('icsr_code');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($routes as $route): ?>
							<tr>
								<td><?php echo h($route['Route']['id']); ?>&nbsp;</td>
								<td><?php echo h($route['Route']['value']); ?>&nbsp;</td>
								<td><?php echo h($route['Route']['name']); ?>&nbsp;</td>
								<td><?php echo h($route['Route']['icsr_code']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link('<span class="label label-info"><i class="icon-pencil icon-white"></i> Edit</span>' , 
											array('controller' => 'routes', 'action' => 'edit', $route['Route']['id']), array('escape' => false)); ?>&nbsp;
									<?php echo $this->Form->postLink(__('<span class="label label-important"><i class="icon-trash icon-white"></i> Delete</span>'), 
											array('action' => 'delete', $route['Route']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?>&nbsp;
								</td>
							</tr>
						<?php endforeach; ?>		
						</tbody>
						</table>
						<?php } else { ?>
							<p>There were no reports that met your search criteria.</p>
						<?php } ?>	
				</div> <!-- /row-fluid -->
			</div> <!-- /span6 -->
		
	   </div> <!-- /row-fluid -->
