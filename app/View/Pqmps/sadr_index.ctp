<?php 
	$this->assign('PQMP', 'active');
 ?>

      <!-- PQMP
    ================================================== -->
    <section id="pqmpsadd">
		<h3>Poor Quality Medicinal Products Reports <small>(PINK FORMS)</small></h3>
		<p>List of the poor quality medicinal products reports that you have submitted.</p>	
		<hr>
	<div class="row-fluid">	
		<div class="span3 columns">
			<div class="row-fluid">
				<div class="span12">
					  <div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
						  <li class="nav-header"> </li>
						  <li class="active">
							<?php echo $this->Html->link('<i class="icon-book"></i> PQMP Reports', array('controller' => 'pqmps', 'action' => 'pqmpIndex'), array('escape' => false)); ?>
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
							  HELPFUL NOTES
							</a>
						  </div>
						  <div id="collapseThree" class="accordion-body collapse in">
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

		<div class="span9 columns">
				<?php 	
					echo $this->Form->create('Pqmp', array(
						'url' => array_merge(array('action' => 'pqmpIndex'), $this->params['pass']),
						'class' => 'well',
					));
				?>
				<div class="row-fluid">	
					<div class="span4 columns">
					<?php
						echo $this->Form->input('brand_name', array('div' => false, 'class' => 'span7', 'label' => array('class' => 'required', 'text' => 'Brand Name')));
					?>
					</div>
					<div class="span4 columns">
					<?php	
						echo $this->Form->input('id', array('div' => false, 'type' => 'text', 'class' => 'span7', 'label' => array('class' => 'required', 'text' => 'Report ID')));
					?>
					</div>
					<div class="span4 columns">
					<p class="muted">Search by any one field.</p>
					<?php	
						echo $this->Form->submit(__('Search', true), array('div' => 'control-group', 'class' => 'btn btn-inverse'));
						echo $this->Form->end();
					?>
					</div>
				</div>
				
				<div class="row-fluid">	
			
					<?php
						if(count($pqmps) >  0) { ?>
					
						<table  class="table table-striped">		
						<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('id');?></th>
								<th><?php echo $this->Paginator->sort('brand_name');?></th>
								<th><?php echo $this->Paginator->sort('created');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($pqmps as $pqmp): ?>
							<tr>
								<td><?php echo h($pqmp['Pqmp']['id']); ?>&nbsp;</td>
								<td><?php echo h($pqmp['Pqmp']['brand_name']); ?>&nbsp;</td>
								<td><?php echo h($pqmp['Pqmp']['created']); ?>&nbsp;</td>
								<td><?php echo $this->Html->link('View' , array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id'])); ?>&nbsp;</td>
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
						<p>
						<?php
							echo $this->Paginator->counter(array(
							'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
							));
						?>	
						</p>
						<?php } else { ?>
							<p>There were no reports that met your search criteria.</p>
						<?php } ?>	
				</div> <!-- /row-fluid -->
			</div> <!-- /span6 -->
		
	   </div> <!-- /row-fluid -->
	</section>