<?php 
	$this->assign('CMS', 'active');
 ?>

      <!-- CMS
    ================================================== -->
	<h4>MedDRA Dictionary v. 23.0 </h4>
	<div class="row-fluid" style="margin-bottom: 9px;">	
		<div class="span0 columns">
			<div class="row-fluid">
				<div class="span12">
					  <?php //echo $this->element('admin/contentmenu')?>
					  
				</div><!--/span-->
			</div><!--/row-->	
		</div> <!-- /span5 -->

		<div class="span11 columns">
				<?php 	
					echo $this->Form->create('Meddra', array(
						'url' => array_merge(array('action' => 'admin_index', 'admin' => true), $this->params['pass']),
						'class' => 'well',
					));
				?>
				<div class="row-fluid">
					<div class="span2 columns">
					<?php
						// echo $this->Html->link('Add A Meddra', array('controller' => 'meddras', 'action' => 'add', 'admin' => true ), array('class' => 'btn btn-info'));
					?>
					</div>
					<div class="span6 columns">
					<?php
						echo $this->Form->input('llt_name', array('div' => false, 'class' => 'span10', 'label' => array('class' => 'required', 'text' => 'LLT Name')));
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
						if(count($meddras) >  0) { ?>
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
								<th><?php echo $this->Paginator->sort('id', 'LLT Code');?></th>
								<th><?php echo $this->Paginator->sort('pt_code');?></th>
								<th><?php echo $this->Paginator->sort('llt)name', 'Low Level Term');?></th>
								<th><?php echo $this->Paginator->sort('llt_currency');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($meddras as $meddra): ?>
							<tr>
								<td><?php echo h($meddra['Meddra']['id']); ?>&nbsp;</td>
								<td><?php echo h($meddra['Meddra']['pt_code']); ?>&nbsp;</td>
								<td><?php echo h($meddra['Meddra']['llt_name']); ?>&nbsp;</td>
								<td><?php echo h($meddra['Meddra']['llt_currency']); ?>&nbsp;</td>
								<td>
									
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
