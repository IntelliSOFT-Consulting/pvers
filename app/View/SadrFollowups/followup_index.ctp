<?php
	$this->assign('SADR', 'active');
 ?>

      <!-- SADR
    ================================================== -->
    <section id="sadrsadd">
		<h3>Suspected Adverse Drug Reaction Reporting Form Follow Up Reports <small>(YELLOW FORMS)</small></h3>
		<p>List of the suspected adverse drug follow up reports that you have submitted.</p>
		<hr>
	<div class="row-fluid">
		<div class="span2 columns">
			<div class="row-fluid">
				<div class="span12">
					  <div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
						  <li class="nav-header"> </li>
						  <li class="<?php if(!isset($this->request->params['named']['submitted'])) echo 'active';?>">
							<?php echo $this->Html->link('<i class="icon-book"></i> All SADR Follow Up Reports', array('action' => 'followupIndex'), array('escape' => false)); ?>
						  </li>
						  <li class="<?php if(isset($this->request->params['named']['submitted']) && $this->request->params['named']['submitted'] == '2') echo 'active';?>">
							<?php echo $this->Html->link('<span class="badge badge-success">1</span> Submitted',
								array('action' => 'followupIndex', 'submitted' => '2'), array('escape' => false)); ?>
						  </li>
						  <li class="<?php if(isset($this->request->params['named']['submitted']) && $this->request->params['named']['submitted'] == '0') echo 'active';?>">
							<?php echo $this->Html->link('<span class="badge badge-important">2</span> UnSubmitted',
								array('action' => 'followupIndex', 'submitted' => '0'), array('escape' => false)); ?>
						  </li>
						  <li class="divider"></li>
						  <li>
								<?php echo $this->Html->link('<i class="icon-flag"></i>Your Feedback', array('controller' => 'feedbacks', 'action' => 'add'), array('escape' => false)); ?>
						   </li>
						</ul>
					  </div> <!-- /well -->

					  <div class="accordion" id="accordion2">
						<div class="accordion-group">
						  <div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							  HELPFUL TIPS
							</a>
						  </div>
						  <div id="collapseThree" class="accordion-body collapse">
							<div class="accordion-inner">
								  <!-- Headings & Paragraph Copy -->
								  <div class="row-fluid">
									<div class="span12">
									  <h3>Searching</h3>
									  <p>There are some helpful pointers that PPB may like to offer here.</p>

									</div>

								  </div>

							</div>
						  </div>
						</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->

		</div> <!-- /span5 -->

		<div class="span10 columns">
				<?php
					echo $this->Form->create('SadrFollowup', array(
						'url' => array_merge(array('action' => 'followupIndex'), $this->params['pass']),
						'class' => 'well',
					));
				?>

				<div class="row-fluid">
						<div class="span2 columns">
						<?php
							if (isset($this->request->params['named']['submitted'])) echo $this->Form->input('submitted', array('type' => 'hidden', 'value' => $this->request->params['named']['submitted']));
							echo $this->Form->input('pages', array(
								'type' => 'select', 'div' => false, 'class' => 'span9', 'selected' => $this->request->params['paging']['SadrFollowup']['limit'],
								'empty' => true,
								'options' => array(
													1=>1,
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
						<div class="span3 columns">
						<?php
							echo $this->Form->input('description_of_reaction',
									array('div' => false, 'id' => 'adminTitleId', 'type' => 'text',
										'class' => 'span9', 'label' => array('class' => 'required', 'text' => 'Description of Reaction')));
						?>
						</div>
						<div class="span3 columns">
						<?php
							echo $this->Form->input('sadr_id',
								array('div' => false, 'id' => 'adminSearchId',
										'type' => 'text', 'class' => 'span9', 'label' => array('class' => 'required', 'text' => 'Report ID')));
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
														$(\'#adminSearchId\').val(\'\');	$(\'#adminTitleId\').val(\'\');" >
													<em>clear</em></a>',
									  'label' => false, 'placeHolder' => 'End Date'));
						?>
						</div>
					</div>
					<hr>
					<div class="row-fluid">
						<div class="span4">
							<?php
								echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
									'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
								));
							?>
						</div>
						<div class="span4">
							<?php
								echo $this->Html->link('<i class="icon-download"></i> Download Excel', '#', array(
										'class' => 'btn', 'onclick' => '$(this).attr(\'href\', window.location.href + \'.xls\');',
										'div' => false,  'escape' => false,
									));
							?>
						</div>
						<div class="span4">
							<?php
								echo $this->Html->link('<i class="icon-download"></i> Download XML', '#', array(
										'class' => 'btn', 'onclick' => '$(this).attr(\'href\', window.location.href + \'.xml\');',
										'div' => false,  'escape' => false,
									));
							?>
						</div>
					</div>
				<?php echo $this->Form->end(); ?> <br/>

				<div class="row-fluid">

					<?php
						if(count($SadrFollowups) >  0) {
						?>
						<p>
						<?php
							echo $this->Paginator->counter(array(
							'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
											showing <span class="badge">{:current}</span> SADR Follow Ups out of
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
								<th><?php echo $this->Paginator->sort('id');?></th>
								<th><?php echo $this->Paginator->sort('description_of_reaction');?></th>
								<th><?php echo $this->Paginator->sort('sadr_id');?></th>
								<th><?php echo $this->Paginator->sort('created');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($SadrFollowups as $sadrFollowup): ?>
							<tr>
								<td><?php
									if($sadrFollowup['SadrFollowup']['submitted'] >= 1) echo '<span class="badge badge-success">'.$sadrFollowup['SadrFollowup']['id'].'</span>';
									else  echo '<span class="badge badge-important">'.$sadrFollowup['SadrFollowup']['id'].'</span>';
									?>&nbsp;
								</td>
								<td><?php echo h($sadrFollowup['SadrFollowup']['description_of_reaction']); ?>&nbsp;</td>
								<td><?php echo h($sadrFollowup['SadrFollowup']['sadr_id']); ?>&nbsp;</td>
								<td><?php echo h($sadrFollowup['SadrFollowup']['created']); ?>&nbsp;</td>
								<td>
									<?php
									if($sadrFollowup['SadrFollowup']['submitted'] == '0') {
										echo $this->Html->link('<span class="label label-info tooltipper" title="Edit"><i class="icon-pencil icon-white"></i>Edit </span>' ,
											array('action' => 'edit', $sadrFollowup['SadrFollowup']['id']),
											array('escape' => false, 'target' => '_blank'));
									} else {
										echo $this->Html->link('<span class="label label-success tooltipper" title="View"><i class="icon-plus-sign icon-white"></i>View </span>',
											array('action' => 'view', $sadrFollowup['SadrFollowup']['id']),
											array('escape' => false, 'target' => '_blank'));
									}?>&nbsp;
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
	</section>
