<?php
	$this->assign('REPORTS', 'active');
  	// $this->Html->script('jquery.ui.tabs', array('inline' => false));
	$this->Html->script('jqprint.0.3', array('inline' => false));
	$this->Html->script('jquery.jeditable', array('inline' => false));
	// pr($this->request->url);
?>
      <!-- SADR
    ================================================== -->
	<h3>SUSPECTED ADVERSE DRUG REACTION REPORTS<small> Filter, Search, and export SADR Reports</small></h3>
		<hr>
		<?php // echo $this->Ajax->submit('Submit', array('url'=> array('controller'=>'ajax', 'action'=>'edit'), 'update' => 'post')); ?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">
			<?php
				$aC = $bC = $cC = $dC = $eC = $fC = $gC = $submitted = '';
				if (isset($this->request->params['named']['submitted'])) {
					if($this->request->params['named']['submitted'] == '2') {
						echo 'Submitted'; $bC = 'active';
					} else if($this->request->params['named']['submitted'] == '3' ){
						echo 'Exported'; $cC = 'active';
					} else if ($this->request->params['named']['submitted'] == '0' ){
						echo 'UnSubmitted'; $dC = 'active';
					} else if ($this->request->params['named']['submitted'] == '6' ){
						echo 'Archived'; $eC = 'active';
					} else if ($this->request->params['named']['submitted'] == '5' ){
						echo 'Imported'; $fC = 'active';
					} else if ($this->request->params['named']['submitted'] == '1' ){
						echo 'Info Request'; $gC = 'active';
					} else {
						echo 'All'; $aC = 'active';
					}
					$submitted = $this->request->params['named']['submitted'];
				} else {
					echo 'All'; $aC = 'active';
				}
			?>
			Reports</a>
		</li>
	</ul>

	<div id="tabs-1">
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
										array('controller' => 'sadrs', 'action' => 'index', 'admin' => true),
										array('escape' => false)); ?>
						  </li>
						  <li class="divider"></li>
						  <li class="<?php echo $bC; ?>">
							<?php echo $this->Html->link('<span class="badge badge-success">1</span> SUBMITTED',
										array('controller' => 'sadrs', 'action' => 'index', 'submitted'=>'2', 'admin' => true),
										array('escape' => false)); ?>
						  </li>
						  <li class="<?php echo $dC; ?>">
							<?php
								echo $this->Html->link('<span class="badge badge-important">2</span> UNSUBMITTED',
										array('controller' => 'sadrs', 'action' => 'index',  'submitted'=>'0', 'admin' => true),
										array('escape' => false));
							?>
						  </li>
						  <li class="<?php echo $cC; ?>">
							<?php
								echo $this->Html->link('<span class="badge badge-warning">3</span> EXPORTED (E2B)',
										array('controller' => 'sadrs', 'action' => 'index',  'submitted'=>'3', 'admin' => true),
										array('escape' => false));
							?>
						  </li>
						  <li class="<?php echo $fC; ?>">
							<?php
								echo $this->Html->link('<span class="badge badge-info">4</span> IMPORTED (XML)',
										array('controller' => 'sadrs', 'action' => 'index',  'submitted'=>'5', 'admin' => true),
										array('escape' => false));
							?>
						  </li>
						  <li class="<?php echo $gC; ?>">
							<?php
								echo $this->Html->link('<span class="badge badge-inverse">5</span> INFO REQUEST',
										array('controller' => 'sadrs', 'action' => 'index',  'submitted'=>'1', 'admin' => true),
										array('escape' => false));
							?>
						  </li>
						  <li class="divider"></li>
						  <li class="<?php echo $eC; ?>">
							<?php
								echo $this->Html->link('<span class="badge">6</span> ARCHIVED',
										array('controller' => 'sadrs', 'action' => 'index',  'submitted'=>'6', 'admin' => true),
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
						echo $this->Form->create('Sadr', array(
							'url' => array_merge(array('action' => 'admin_index'), $this->params['pass']),
							'class' => 'well',
						));
					?>
					<div class="row-fluid">
						<div class="span1 columns">
						<?php
							echo $this->Form->input('submitted', array('type' => 'hidden', 'value' => $submitted));
							echo $this->Form->input('pages', array(
								'type' => 'select', 'div' => false, 'class' => 'span12', 'selected' => $this->request->params['paging']['Sadr']['limit'],
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
						</div>	<div class="span2 columns">
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
							echo $this->Form->input('report_title',
									array('div' => false, 'id' => 'adminTitleId',
										'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Report Title')));
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
								array('div' => false, 'type' => 'text', 'class' => 'input-small', 'after' => '-to-',
									  'label' => array('class' => 'required', 'text' => 'Report Created Dates'), 'placeHolder' => 'Start Date'));
							echo $this->Form->input('end_date',
								array('div' => false, 'type' => 'text', 'class' => 'input-small',
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
								// echo $this->Form->submit("<i class='icon-search icon-white'></i> Search",
									// array('div' => 'control-group', 'class' => 'btn btn-inverse'));
								echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
									'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
								));
							?>
						</div>
						<div class="span4">
							<?php
								echo $this->Html->link('<i class="icon-download"></i> Download Excel', '#', array(
										'class' => 'btn', 'onclick' => '$(this).attr(\'href\', window.location.href + \'.xls\');',
										'div' => false, 'escape' => false,
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
				<?php echo $this->Form->end(); ?>

				<div class="row-fluid">

					<?php
						if(count($sadrs) >  0) { ?>
					<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
										showing <span class="badge">{:current}</span> SADRS out of
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
								<?php if ($cC !== '' || $bC !== ''|| $fC !== '') { ?><th><?php echo $this->Paginator->sort('vigiflow_id', 'Vigiflow ID');?></th><?php } ?>
								<th><?php echo $this->Paginator->sort('id', 'Report ID');?></th>
								<th><?php echo $this->Paginator->sort('report_title');?></th>
								<th><?php echo $this->Paginator->sort('created', 'Date Created');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$counder = ($this->request->paging['Sadr']['page'] - 1) * $this->request->paging['Sadr']['limit'];
						foreach ($sadrs as $sadr):
						?>
							<tr>
								<td ><p class="tablenums"><?php $counder++; echo $counder;?>.</p></td>
								<?php if ($cC !== '' || $bC !== '' || $fC !== '') { ?>
								<td>
									<span class="jeditable tooltipper" title="Click to edit" style="background-color: #C9EEFF;" id="<?php echo $sadr['Sadr']['id'];?>"><?php
										if($sadr['Sadr']['vigiflow_id']) echo h($sadr['Sadr']['vigiflow_id']);
									?></span>
								</td>
								<?php } ?>
								<td><?php
									if($sadr['Sadr']['submitted'] == '2') echo '<span class="badge badge-success">'.$sadr['Sadr']['id'].'</span>';
									elseif ($sadr['Sadr']['submitted'] == '5') echo '<span class="badge badge-info">'.$sadr['Sadr']['id'].'</span>';
									elseif ($sadr['Sadr']['submitted'] == '0') echo '<span class="badge badge-important">'.$sadr['Sadr']['id'].'</span>';
									elseif ($sadr['Sadr']['submitted'] == '3') echo '<span class="badge badge-warning">'.$sadr['Sadr']['id'].'</span>';
									elseif ($sadr['Sadr']['submitted'] == '1') echo '<span class="badge badge-inverse">'.$sadr['Sadr']['id'].'</span>';
									elseif ($sadr['Sadr']['submitted'] == '6') echo '<span class="badge">'.$sadr['Sadr']['id'].'</span>';

									?>&nbsp;
								</td>
								<td><?php echo h($sadr['Sadr']['report_title']); ?>&nbsp;</td>
								<td><?php echo h($sadr['Sadr']['created']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link('<span class="label label-success tooltipper" title="View"><i class="icon-plus-sign icon-white"></i> </span>', '#',
											array('id' => $sadr['Sadr']['id'], 'class' => 'tabCreator', 'escape' => false)); ?>&nbsp;
									<?php echo $this->Html->link('<span class="label label-info tooltipper" title="Edit"><i class="icon-pencil icon-white"></i> </span>' ,
											array('controller' => 'sadrs', 'action' => 'edit', $sadr['Sadr']['id']),
											array('escape' => false, 'target' => '_blank')); ?>&nbsp;
									<?php echo $this->Html->link('<span class="label label-success tooltipper" title="Download XML">XML</span>' ,
											array('controller' => 'sadrs', 'action' => 'view', 'ext' => 'xml', $sadr['Sadr']['id']),
											array('escape' => false)); ?>&nbsp;
									<?php echo $this->Html->link('<span class="label label-info tooltipper" title="Download E2B">E2B</span>' ,
											array('controller' => 'sadrs', 'action' => 'download', 'admin' => false, 'ext' => 'xml', $sadr['Sadr']['id']),
											array('escape' => false)); ?>&nbsp;
									<?php echo $this->Html->link('<span class="label label-warning tooltipper" title="Request for Info"><i class="icon-envelope icon-white"></i></span>' ,
											array('controller' => 'sadrs', 'action' => 'reply', $sadr['Sadr']['id']),
											array('escape' => false, 'target' => '_blank')); ?>&nbsp;|&nbsp;
									<?php
										if(!$eC) {
											echo $this->Form->postLink(__('<span class="label tooltipper" title="Archive"><i class="icon-folder-close icon-white"></i> </span>'),
											array('action' => 'archive', $sadr['Sadr']['id']), array('escape' => false), __('Are you sure you want to Archive the SADR Report Number %s?', $sadr['Sadr']['id']));
										}?>&nbsp;
									<?php echo $this->Form->postLink(__('<span class="label label-important tooltipper" title="Delete"><i class="icon-trash icon-white"></i> </span>'),
											array('action' => 'delete', $sadr['Sadr']['id']), array('escape' => false), __('Are you sure you want to Delete the SADR Report Number %s?', $sadr['Sadr']['id'])); ?>&nbsp;

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
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('.jeditable').editable('/sadrs/vigiflowlink/', {
		 indicator : 'Saving...',
         tooltip   : 'Click to edit...',
		 placeholder : '_________',
		 id   : 'data[Sadr][id]',
         name : 'data[Sadr][vigiflow_id]',
		 cssclass : 'input-small'
	});
	// ___________________________________ $( "#tabs" ).tabs();___________________________________________________
	var $tabs = $( "#tabs").tabs({
		tabTemplate: "<li><a href='#{href}'>#{label}</a> <span class='ui-icon ui-icon-close'>Remove Tab</span></li>",
		add: function(event, ui) {
			$tabs.tabs('select', '#' + ui.panel.id);
		},
		// select: function(event, ui) {
			// if ($(ui.panel).text() == '')
				// $(ui.panel).html('Loading...');
			// return true;
		// },
		select: function (e, ui) {
		 var $panel = $(ui.panel);

		 if ($panel.is(":empty")) {
			 $panel.append("<div class='ui-autocomplete-loading' style='width:90px'>Loading...</div>")
		 }
		},
		load: function(event, ui) {
			$(ui.panel).delegate('a', 'click', function(event) {
				$(this).parents('li').siblings().attr('class','');
				$(this).parents('li').attr('class','active')
				if(this.name !== 'downloadPDF') {
					$('#showAreade').load(this.href);
					event.preventDefault();
				}
			});
		}
	});

	$('.tabCreator').click(function () {
		var tab_title = "SADR " + this.id;
		$tabs.tabs( "add", '/admin/sadrs/view/'+this.id, tab_title );
	});

	$( "#tabs span.ui-icon-close" ).live( "click", function() {
		var index = $( "li", $tabs ).index( $( this ).parent() );
		$tabs.tabs( "remove", index );
	});


	//_____________________________________________END TABS SECTION________________________________________________


});
</script>
