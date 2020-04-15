<?php 
	$this->assign('REPORTS', 'active');
?>
      <!-- ATTACHMENT
    ================================================== -->
	<h3>SADR AND PQMP FILE ATTACHMENTS<small> Filter, Search, and download Attachments</small></h3>
		<hr>
<div class="row-fluid" style="margin-bottom: 9px;">	
	<div class="span2 columns">
		<div class="row-fluid">
			<div class="span12">
				  <div class="well" style="padding: 8px 0;">
					<ul class="nav nav-list">
					  <li class="nav-header"><i class="icon-glass"></i>  Filter Options </li>
					  <li class="divider"></li>
					  <li class="active">
						<?php echo $this->Html->link('<i class="icon-book"></i> All ATTACHMENTS', 
									array('controller' => 'attachments', 'action' => 'index', 'admin' => true), 
									array('escape' => false)); ?>
					  </li>
					  <li class="divider"></li>
					</ul>
				  </div> <!-- /well -->					  
			</div><!--/span-->
		</div><!--/row-->	
	</div> <!-- /span5 -->

	<div class="span10 columns">
				<?php 	
					echo $this->Form->create('Attachment', array(
						'url' => array_merge(array('action' => 'admin_index'), $this->params['pass']),
						'class' => 'well',
					));
				?>
				<div class="row-fluid">	
					<div class="span2 columns">
					<?php
						echo $this->Form->input('pages', array(
							'type' => 'select', 'div' => false, 'class' => 'span9', 'selected' => $this->request->params['paging']['Attachment']['limit'],
							'empty' => true, 
							'options' => array(
												20=>20,
												30 => 30,
												50 => 50,
												70 => 70,
												100 => 100,
												), 
							'label' => array('class' => 'control-label required', 'text' => 'Pagination'),
						));
					?>
					</div>	
					<div class="span3 columns">
					<?php
						echo $this->Form->input('basename', 
								array('div' => false, 'class' => 'span10', 'label' => array('class' => 'required', 'text' => 'File Name')));
					?>
					</div>
					<div class="span4 columns">
					<?php	
						echo $this->Form->input('start_date', 
							array('div' => false, 'type' => 'text', 'class' => 'input-small', 'after' => '-to-',
								  'label' => array('class' => 'required', 'text' => 'Report Created Dates'), 'placeHolder' => 'Start Date'));
						echo $this->Form->input('end_date', 
							array('div' => false, 'type' => 'text', 'class' => 'input-small', 
								   'after' => '<a style="font-weight:normal" onclick="$(\'#AttachmentStartDate\').val(\'\');	$(\'#AttachmentEndDate\').val(\'\');
													$(\'#AttachmentBasename\').val(\'\');" >										
												<em>clear</em></a>',
								  'label' => false, 'placeHolder' => 'End Date'));
					?>
					</div>
					<div class="span3">
					<p class="muted">Search on any field.</p>
						<?php	
							// echo $this->Form->submit(__('Search', true), array('div' => 'control-group', 'class' => 'btn btn-inverse'));
							echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
									'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
								));
						?>
					</div>
				</div>
				<?php echo $this->Form->end(); ?>
				<hr>
				
			
			<div class="row-fluid">	
		
				<?php
					if(count($attachments) >  0) { ?>
				<p>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>, 
									showing <span class="badge">{:current}</span> ATTACHMENTS out of 
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
					<table  class="table table-striped">		
					<thead>
						<tr>
							<th style="width:3%">#</th>
							<th><?php echo $this->Paginator->sort('id', 'File ID');?></th>
							<th><?php echo $this->Paginator->sort('basename', 'File Name');?></th>
							<th><?php echo $this->Paginator->sort('sadr_id');?></th>
							<th><?php echo $this->Paginator->sort('pqmp_id');?></th>
							<th><?php echo $this->Paginator->sort('created', 'Date Created');?></th>
							<th><?php echo __('Actions');?></th>
						</tr>
					</thead>
					<tbody>
					<?php
					$counder = ($this->request->paging['Attachment']['page'] - 1) * $this->request->paging['Attachment']['limit']; 
					foreach ($attachments as $attachment): ?>
						<tr>
							<td ><p class="tablenums"><?php $counder++; echo $counder;?>.</p></td>
							<td><?php echo '<span class="badge badge-success">'.$attachment['Attachment']['id'].'</span>'; ?>&nbsp;</td>
							<td><?php echo h($attachment['Attachment']['basename']); ?>&nbsp;</td>
							<td><?php 
								if($attachment['Attachment']['sadr_id']) echo $this->Html->link('<span class="label label-info tooltipper" title="View">'.$attachment['Attachment']['sadr_id'].' </span>' , 
											array('controller' => 'sadrs', 'action' => 'view', $attachment['Attachment']['sadr_id']), 
											array('escape' => false, 'target' => '_blank'));
								?>&nbsp;</td>
							<td><?php 
								if($attachment['Attachment']['pqmp_id']) echo $this->Html->link('<span class="label label-info tooltipper" title="View">'.$attachment['Attachment']['pqmp_id'].' </span>' , 
											array('controller' => 'sadrs', 'action' => 'view', $attachment['Attachment']['pqmp_id']), 
											array('escape' => false, 'target' => '_blank'));
								?>&nbsp;</td>
							<td><?php echo h($attachment['Attachment']['created']); ?>&nbsp;</td>		
							<td>
								<?php echo $this->Html->link('<span class="label label-warning tooltipper" title="Download"><i class="icon-download-alt icon-white"></i> Download</span>' , 
											array('controller' => 'attachments', 'action' => 'download', $attachment['Attachment']['id']), 
											array('escape' => false)); ?>&nbsp;
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