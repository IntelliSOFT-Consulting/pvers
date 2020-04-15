<?php
	$this->assign('CMS', 'active');
 ?>

      <!-- CMS
    ================================================== -->
	<h3>Content Management System <small>(INCLUDING FORM DATA)</small></h3>
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
					echo $this->Form->create('HelpInfo', array(
						'url' => array_merge(array('action' => 'admin_index', 'admin' => true), $this->params['pass']),
						'class' => 'well',
					));
				?>
				<div class="row-fluid">
					<div class="span8 columns">
					<?php
						echo $this->Form->input('field_name', array('div' => false, 'class' => 'span10', 'label' => array('class' => 'required', 'text' => 'Label / Title / Content / help_text')));
					?>
					</div>
					<div class="span4 columns">
					<p class="muted">Search on any field.</p>
					<?php
						// echo $this->Form->submit(__('Search', true), array('div' => 'control-group', 'class' => 'btn btn-inverse'));
						echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
									'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
								));
						echo ' &nbsp; ';
						echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => 'index'), array('class' => 'btn', 'escape' => false));
						echo $this->Form->end();
					?>
					</div>
				</div>

				<div class="row-fluid">

					<?php
						if(count($helpInfos) >  0) { ?>
						<p>
						<?php
							echo $this->Paginator->counter(array(
							'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
											showing <span class="badge">{:current}</span> Content out of
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
								<th colspan="2"><?php echo $this->Paginator->sort('field_label');?></th>
								<th><?php echo $this->Paginator->sort('title');?></th>
								<th><?php echo $this->Paginator->sort('content');?></th>
								<th><?php echo $this->Paginator->sort('help_text');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($helpInfos as $helpInfo): ?>
							<tr>
								<td><?php echo h($helpInfo['HelpInfo']['id']); ?>&nbsp;</td>
								<td><?php echo h($helpInfo['HelpInfo']['field_label']); ?>&nbsp;</td>
								<td><?php echo h($helpInfo['HelpInfo']['title']); ?>&nbsp;</td>
								<td><?php echo h($helpInfo['HelpInfo']['content']); ?>&nbsp;</td>
								<td><?php echo h($helpInfo['HelpInfo']['help_text']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link('<span class="label label-info"><i class="icon-pencil icon-white"></i> Edit</span>' ,
											array('controller' => 'help_infos', 'action' => 'edit',  $helpInfo['HelpInfo']['id']), array('escape' => false)); ?>&nbsp;</td>
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
