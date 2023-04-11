<?php
	$this->assign('PQHPT', 'active');
 ?>

      <!-- PQHPT
    ================================================== -->
    <section id="pqmpsadd">
		<h3>Poor Quality Medicinal Products Reports <small>(PINK FORMS)</small></h3>
		<p>List of the poor quality medicinal products reports that you have submitted.</p>
		<hr>
	<div class="row-fluid">
		<div class="span2 columns">
			<div class="row-fluid">
				<div class="span12">
					  <div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
						  <li class="nav-header"> </li>
						  <li class="<?php if(!isset($this->request->params['named']['submit'])) echo 'active';?>">
							<?php echo $this->Html->link('<i class="icon-book"></i> All PQHPT Reports', array('controller' => 'pqmps', 'action' => 'pqmpIndex'), array('escape' => false)); ?>
						  </li>
						  <li class="<?php if(isset($this->request->params['named']['submit']) && $this->request->params['named']['submit'] == '2') echo 'active';?>">
							<?php echo $this->Html->link('<span class="badge badge-success">1</span> Submitted',
								array('controller' => 'pqmps', 'action' => 'pqmpIndex', 'submit' => '2'), array('escape' => false)); ?>
						  </li>
						  <li class="<?php if(isset($this->request->params['named']['submit']) && $this->request->params['named']['submit'] == '0') echo 'active';?>">
							<?php echo $this->Html->link('<span class="badge badge-important">2</span> UnSubmitted',
								array('controller' => 'pqmps', 'action' => 'pqmpIndex', 'submit' => '0'), array('escape' => false)); ?>
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
										<address>
											<strong>THE PHARMACY AND POISONS BOARD</strong><br>
											Lenana Road.<br>
											<abbr title="Post Office Box">P.O. Box</abbr> 27663-00506 NAIROBI<br>
											<abbr title="Telephone Number">Tel:</abbr> (020)-2716905 / 6 Ext 114
											<abbr title="Fascimile">Fax:</abbr> (020)-2713431 / 2713409 <br>
											E-mail: <a href="mailto:#">pv@pharmacyboardkenya.org</a>
										</address>
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
					echo $this->Form->create('Pqmp', array(
						'url' => array_merge(array('action' => 'pqmpIndex'), $this->params['pass']),
						'class' => 'well',
					));
				?>

				<div class="row-fluid">
						<div class="span2 columns">
						<?php
							if (isset($this->request->params['named']['submit'])) echo $this->Form->input('submit', array('type' => 'hidden', 'value' => $this->request->params['named']['submit']));
							echo $this->Form->input('pages', array(
								'type' => 'select', 'div' => false, 'class' => 'span9', 'selected' => $this->request->params['paging']['Pqmp']['limit'],
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
						<div class="span3 columns">
						<?php
							echo $this->Form->input('brand_name',
									array('div' => false, 'id' => 'adminTitleId',
										'class' => 'span9', 'label' => array('class' => 'required', 'text' => 'Brand Name')));
						?>
						</div>
						<div class="span3 columns">
						<?php
							echo $this->Form->input('id',
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
						if(count($pqmps) >  0) { ?>
						<p>
						<?php
							echo $this->Paginator->counter(array(
							'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
											showing <span class="badge">{:current}</span> PQHPT out of
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
								<th><?php echo $this->Paginator->sort('brand_name');?></th>
						        <th><?php echo $this->Paginator->sort('reporter_date', 'Date reported'); ?></th>
						        <th><?php echo $this->Paginator->sort('modified', 'Date modified'); ?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($pqmps as $pqmp): ?>
							<tr>
								<td><?php
									if($pqmp['Pqmp']['submitted'] > 1) echo '<span class="badge badge-success">'.$pqmp['Pqmp']['id'].'</span>';
									else  echo '<span class="badge badge-important">'.$pqmp['Pqmp']['id'].'</span>';
									?>&nbsp;
								</td>
								<td><?php echo h($pqmp['Pqmp']['brand_name']); ?>&nbsp;</td>
								<td><?php echo h($pqmp['Pqmp']['reporter_date']); ?>&nbsp;</td>
								<td><?php echo h($pqmp['Pqmp']['modified']); ?>&nbsp;</td>
								<td>
									<?php
									if($pqmp['Pqmp']['submitted'] == '0') {
										if($redir == 'reporter')  echo $this->Html->link('<span class="label label-info tooltipper" title="Edit"><i class="icon-pencil icon-white"></i>Edit </span>' ,
											array('controller' => 'pqmps', 'action' => 'edit', $pqmp['Pqmp']['id']),
											array('escape' => false, 'target' => '_blank'));
									} else {
										echo $this->Html->link('<span class="label label-success tooltipper" title="View"><i class="icon-plus-sign icon-white"></i>View </span>',
											array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id']),
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
