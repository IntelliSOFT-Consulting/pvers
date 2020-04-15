<?php
	$this->assign('FEEDBACK', 'active');
 ?>

      <!-- CMS
    ================================================== -->
	<h3>FEEDBACK <small>User Feedback from the front end. <br/><span class="label label-important">NOTE:</span> Where a report ID is included, the feedback was given after the user submitted a report.</small></h3>
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
							<?php echo $this->Html->link('<i class="icon-book"></i> FEEDBACK',
									array('controller' => 'feedbacks', 'action' => 'index', 'admin' => true),
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
					echo $this->Form->create('Feedback', array(
						'url' => array_merge(array('action' => 'admin_index'), $this->params['pass']),
						'class' => 'well',
					));
				?>
				<div class="row-fluid">
					<div class="span2 columns">
					<?php
						echo $this->Form->input('pages', array(
							'type' => 'select', 'div' => false, 'class' => 'span9', 'selected' => $this->request->params['paging']['Feedback']['limit'],
							'empty' => true,
							'options' => array(
												5=>5,
												10=>10,
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
					<div class="span4 columns">
					<?php
						echo $this->Form->input('feedback',
								array('div' => false, 'id' => 'adminTitleId', 'type' => 'text',
									'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Feedback / Email / Phone No.')));
					?>
					</div>

					<div class="span4 columns">
					<?php
						echo $this->Form->input('start_date',
							array('div' => false, 'type' => 'text', 'class' => 'input-small', 'after' => '-to-', 'id' => 'SadrStartDate',
								  'label' => array('class' => 'required', 'text' => 'Report Created Dates'), 'placeHolder' => 'Start Date'));
						echo $this->Form->input('end_date',
							array('div' => false, 'type' => 'text', 'class' => 'input-small', 'id' => 'SadrEndDate',
								   'after' => '<a style="font-weight:normal" onclick="$(\'#SadrStartDate\').val(\'\');	$(\'#SadrEndDate\').val(\'\');
												$(\'#adminTitleId\').val(\'\');" >	<em>clear</em></a>',
								  'label' => false, 'placeHolder' => 'End Date'));
					?>
					</div>
					<div class="span2">
						<br/>
						<?php
							echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
								'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
							));
						?>
					</div>
				</div>
			<?php echo $this->Form->end(); ?>

				<div class="row-fluid">
					<?php
						if(count($feedbacks) >  0) { ?>
					<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
										showing <span class="badge">{:current}</span> Feedbacks out of
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
								<th style="width:3%">#</th>
								<th><?php echo $this->Paginator->sort('id');?></th>
								<th><?php echo $this->Paginator->sort('email', "Email / Phone No.");?></th>
								<th><?php echo $this->Paginator->sort('feedback', "Message");?></th>
								<th><?php echo $this->Paginator->sort('sadr_id');?></th>
								<th><?php echo $this->Paginator->sort('pqmp_id');?></th>
								<th><?php echo $this->Paginator->sort('created');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$counder = ($this->request->paging['Feedback']['page'] - 1) * $this->request->paging['Feedback']['limit'];
						foreach ($feedbacks as $feedback): ?>
							<tr>
								<td ><p class="tablenums"><?php $counder++; echo $counder;?>.</p></td>
								<td><?php echo h($feedback['Feedback']['id']); ?>&nbsp;</td>
								<td><?php echo h($feedback['Feedback']['email']); ?>&nbsp;</td>
								<td><?php echo h($feedback['Feedback']['feedback']); ?>&nbsp;</td>
								<td><?php
									if($feedback['Feedback']['sadr_id']) echo $this->Html->link('<span class="label label-info tooltipper" title="View">'.$feedback['Feedback']['sadr_id'].' </span>' ,
												array('controller' => 'sadrs', 'action' => 'view', $feedback['Feedback']['sadr_id']),
												array('escape' => false, 'target' => '_blank'));
									?>&nbsp;</td>
								<td><?php
									if($feedback['Feedback']['pqmp_id']) echo $this->Html->link('<span class="label label-info tooltipper" title="View">'.$feedback['Feedback']['pqmp_id'].' </span>' ,
												array('controller' => 'pqmps', 'action' => 'view', $feedback['Feedback']['pqmp_id']),
												array('escape' => false, 'target' => '_blank'));
									?>&nbsp;</td>
								<td><?php echo h($feedback['Feedback']['created']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link('<span class="label label-success tooltipper" title="View"><i class="icon-plus-sign icon-white"></i> </span>',
											array('action'=>'view', $feedback['Feedback']['id']), array('escape' => false)); ?>&nbsp;
									<?php echo $this->Form->postLink(__('<span class="label label-important tooltipper" title="Delete"><i class="icon-trash icon-white"></i> </span>'),
											array('action' => 'delete', $feedback['Feedback']['id']), array('escape' => false), __('Are you sure you want to Delete the Feedback Number %s?', $feedback['Feedback']['id'])); ?>&nbsp;
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
