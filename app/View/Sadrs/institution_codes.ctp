<?php 
	$this->assign('SADR', 'active');
 ?>

      <!-- SADR
    ================================================== -->
    <section id="sadrsadd">
		
	<div class="row-fluid">	
		<div class="span3 columns">
			<div class="row-fluid">
				<div class="span12">
					  <div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
						  <li class="nav-header"> </li>
						  <li class="active">
							<?php echo $this->Html->link('<i class="icon-book"></i> Institution Reports (SADR)', array('controller' => 'sadrs', 'action' => 'institutionCodes'), array('escape' => false)); ?>
						  </li>
						  <li>
							<?php echo $this->Html->link('<i class="icon-tag"></i> SADR Reports', array('controller' => 'sadrs', 'action' => 'sadrIndex'), array('escape' => false)); ?>
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

		<div class="span9 columns">				
			<div class="row-fluid">	
				<?php if ($this->Session->read('Auth.User.institution_code')) { ?>
				<h3>Suspected Adverse Drug Reaction Reporting Form Reports <small>(YELLOW FORMS)</small></h3>
				<p>List of the suspected adverse drug for your institution, code <?php echo $this->Session->read('Auth.User.institution_code')?>.</p>	
				<hr>
					<?php
						if(count($sadrs) >  0) { ?>
					
						<table  class="table table-striped">		
						<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('report_title');?></th>
								<th><?php echo $this->Paginator->sort('created');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($sadrs as $sadr): ?>
							<tr>
								<td><?php echo h($sadr['Sadr']['report_title']); ?>&nbsp;</td>
								<td><?php echo h($sadr['Sadr']['created']); ?>&nbsp;</td>
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
					<?php } else { ?>
						<p>Sorry, you have not provided us with an institution code. Please 
							<?php echo $this->Html->link('update', array('controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id')), array('class' => 'btn btn-info')); ?>
							your registration details with the correct institution code.</p>
					<?php } ?>
				</div> <!-- /row-fluid -->
			</div> <!-- /span6 -->
		
	   </div> <!-- /row-fluid -->
	</section>