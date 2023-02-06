<?php
	$this->assign('REPORTS', 'active');
	$this->Html->script('jqprint.0.3', array('inline' => false));
?>
      <!-- PQHPT
    ================================================== -->
	<h3>POOR QUALITY MEDICINAL PRODUCTS REPORTS<small> Filter, Search, and export PQHPT Reports</small></h3>
		<hr>
		<?php
			$aC = $bC = $dC = $eC = $fC = $gC = $submitted = '';
			if (isset($this->request->params['named']['submitted'])) {
				if($this->request->params['named']['submitted'] == '2') {
					$bC = 'active';
				} else if ($this->request->params['named']['submitted'] == '0' ){
					$dC = 'active';
				} else if ($this->request->params['named']['submitted'] == '6' ){
					$eC = 'active';
				} else if ($this->request->params['named']['submitted'] == '5' ){
					$fC = 'active';
				} else if ($this->request->params['named']['submitted'] == '1' ){
					$gC = 'active';
				} else {
					$aC = 'active';
				}
				$submitted = $this->request->params['named']['submitted'];
			} else {
				 $aC = 'active';
			}
		?>

	<div class="row-fluid" style="margin-bottom: 9px;">
		<div class="span2 columns">
			<div class="row-fluid">
				<div class="span12">
					  <div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
						  <li class="nav-header"><i class="icon-glass"></i>  Filter Options </li>
						  <li class="divider"></li>
						  <li class="<?php echo $aC; ?>">
							<?php echo $this->Html->link('<i class="icon-book"></i> All REPORTS',
										array('controller' => 'pqmps', 'action' => 'index', 'admin' => true),
										array('escape' => false)); ?>
						  </li>
						  <li class="divider"></li>
						  <li class="<?php echo $bC; ?>">
							<?php echo $this->Html->link('<span class="badge badge-success">1</span> SUBMITTED',
										array('controller' => 'pqmps', 'action' => 'index', 'submitted'=>'2', 'admin' => true),
										array('escape' => false)); ?>
						  </li>
						  <li class="<?php echo $dC; ?>">
							<?php
								echo $this->Html->link('<span class="badge badge-important">2</span> UNSUBMITTED',
										array('controller' => 'pqmps', 'action' => 'index',  'submitted'=>'0', 'admin' => true),
										array('escape' => false));
							?>
						  </li>
						  <li class="<?php echo $fC; ?>">
							<?php
								echo $this->Html->link('<span class="badge badge-info">3</span> IMPORTED(XML)',
										array('controller' => 'pqmps', 'action' => 'index',  'submitted'=>'5', 'admin' => true),
										array('escape' => false));
							?>
						  </li>
						  <li class="<?php echo $gC; ?>">
							<?php
								echo $this->Html->link('<span class="badge badge-inverse">4</span> INFO REQUEST',
										array('controller' => 'pqmps', 'action' => 'index',  'submitted'=>'1', 'admin' => true),
										array('escape' => false));
							?>
						  </li>
						  <li class="divider"></li>
						  <li class="<?php echo $eC; ?>">
							<?php
								echo $this->Html->link('<span class="badge">5</span> ARCHIVED',
										array('controller' => 'pqmps', 'action' => 'index',  'submitted'=>'6', 'admin' => true),
										array('escape' => false));
							?>
						  </li>
						  <li class="divider"></li>
						</ul>
					  </div> <!-- /well -->
				</div><!--/span-->
			</div><!--/row-->
		</div> <!-- /span5 -->

		<div class="span10 columns">
					<?php
						echo $this->Form->create('Pqmp', array(
							'url' => array_merge(array('action' => 'admin_index'), $this->params['pass']),
							'class' => 'well',
						));
					?>
					<div class="row-fluid">
						<div class="span1 columns">
						<?php
							echo $this->Form->input('submitted', array('type' => 'hidden', 'value' => $submitted));
							echo $this->Form->input('pages', array(
								'type' => 'select', 'div' => false, 'class' => 'span12', 'selected' => $this->request->params['paging']['Pqmp']['limit'],
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
						<div class="span2 columns">
						<?php
							echo $this->Form->input('device', array(
								'type' => 'select', 'div' => false, 'class' => 'span12',	'empty' => true,
								'options' => array(
													0=>'Web',
													1=>'Web Imported',
													2=>'Mobile Web',
													3 => 'Desktop App',
													4 => 'Mobile App',
													),
								'label' => array('class' => 'control-label required', 'text' => 'Device'),
							));
						?>
						</div>
						<div class="span3 columns">
						<?php
							echo $this->Form->input('brand_name',
									array('div' => false, 'id' => 'adminTitleId',
										'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Brand Name')));
						?>
						</div>
						<div class="span2 columns">
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
						<div class="span3">
							<?php
								echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
									'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
								));
							?>
						</div>
						<div class="span3">
							<?php
								echo $this->Html->link('<i class="icon-download"></i> Download Excel', '#', array(
										'class' => 'btn', 'onclick' => '$(this).attr(\'href\', window.location.href + \'.xls\');',
										'div' => false, 'escape' => false,
									));
							?>
						</div>
						<div class="span3">
							<?php
								echo $this->Html->link('<i class="icon-download"></i> Download Filtered Excel', '#', array(
										'class' => 'btn', 'onclick' => '$(this).attr(\'href\', window.location.href + \'/filt:2\'+ \'.xls\');',
										'div' => false, 'escape' => false,
									));
							?>
						</div>
						<div class="span3">
							<?php
								echo $this->Html->link('<i class="icon-download"></i> Download XML', '#', array(
										'class' => 'btn', 'onclick' => '$(this).attr(\'href\', window.location.href + \'.xml\');',
										'div' => false,  'escape' => false,
									));
							?>
						</div>
					</div>
				<?php echo $this->Form->end(); ?>

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
								<th style="width:3%">#</th>
								<th><?php echo $this->Paginator->sort('id', 'Report ID');?></th>
								<th><?php echo $this->Paginator->sort('brand_name');?></th>
								<th><?php echo $this->Paginator->sort('created', 'Date Created');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$counder = ($this->request->paging['Pqmp']['page'] - 1) * $this->request->paging['Pqmp']['limit'];
						foreach ($pqmps as $pqmp):
						?>
							<tr>
								<td ><p class="tablenums"><?php $counder++; echo $counder;?>.</p></td>
								<td><?php
									if($pqmp['Pqmp']['submitted'] == '2') echo '<span class="badge badge-success">'.$pqmp['Pqmp']['id'].'</span>';
									elseif ($pqmp['Pqmp']['submitted'] == '5') echo '<span class="badge badge-info">'.$pqmp['Pqmp']['id'].'</span>';
									elseif ($pqmp['Pqmp']['submitted'] == '0') echo '<span class="badge badge-important">'.$pqmp['Pqmp']['id'].'</span>';
									elseif ($pqmp['Pqmp']['submitted'] == '3') echo '<span class="badge badge-warning">'.$pqmp['Pqmp']['id'].'</span>';
									elseif ($pqmp['Pqmp']['submitted'] == '1') echo '<span class="badge badge-inverse">'.$pqmp['Pqmp']['id'].'</span>';
									elseif ($pqmp['Pqmp']['submitted'] == '6') echo '<span class="badge">'.$pqmp['Pqmp']['id'].'</span>';

									?>&nbsp;
								</td>
								<td><?php echo h($pqmp['Pqmp']['brand_name']); ?>&nbsp;</td>
								<td><?php echo h($pqmp['Pqmp']['created']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link('<span class="label label-success tooltipper" title="View"><i class="icon-plus-sign icon-white"></i> </span>',
											array('action' => 'view', $pqmp['Pqmp']['id']),
											array('escape' => false, 'target' => '_blank')); ?>&nbsp;
									<?php echo $this->Html->link('<span class="label label-info tooltipper" title="Edit"><i class="icon-pencil icon-white"></i> </span>' ,
											array('controller' => 'pqmps', 'action' => 'edit', $pqmp['Pqmp']['id']),
											array('escape' => false, 'target' => '_blank')); ?>&nbsp;
									<?php echo $this->Html->link('<span class="label label-success tooltipper" title="Download XML">XML</span>' ,
											array('controller' => 'pqmps', 'action' => 'view', 'ext' => 'xml', $pqmp['Pqmp']['id']),
											array('escape' => false)); ?>&nbsp;
									<?php echo $this->Html->link('<span class="label label-warning tooltipper" title="Request for info"><i class="icon-envelope icon-white"></i></span>' ,
											array('controller' => 'pqmps', 'action' => 'reply', $pqmp['Pqmp']['id']),
											array('escape' => false, 'target' => '_blank')); ?>&nbsp;|&nbsp;
									<?php
										if(!$eC) {
											echo $this->Form->postLink(__('<span class="label tooltipper" title="Archive"><i class="icon-folder-close icon-white"></i> </span>'),
											array('action' => 'archive', $pqmp['Pqmp']['id']), array('escape' => false), __('Are you sure you want to Archive the PQHPT Report Number %s?', $pqmp['Pqmp']['id']));
										}?>&nbsp;
									<?php echo $this->Form->postLink(__('<span class="label label-important tooltipper" title="Delete"><i class="icon-trash icon-white"></i> </span>'),
											array('action' => 'delete', $pqmp['Pqmp']['id']), array('escape' => false), __('Are you sure you want to Delete the PQHPT Report Number %s?', $pqmp['Pqmp']['id'])); ?>&nbsp;

								</td>
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
						<?php } else { ?>
							<p>There were no reports that met your search criteria.</p>
						<?php } ?>
				</div> <!-- /row-fluid -->
			</div> <!-- /span6 -->

	   </div> <!-- /row-fluid -->
