<?php 
	$this->assign('SADR', 'active'); 
	$this->Html->script('bootstrap-tab', array('inline' => false));
	$this->Html->script('jqprint.0.3', array('inline' => false));
 ?>

  <!-- FOLLOW UPS EDIT
================================================== -->
<section id="followupsedit">  
	<div class="row-fluid">
	<div class="span12">		
	<?php			
		echo $this->Session->flash(); ?>

		  <div class="styled_title"><h3>FOLLOW UP REPORT NO : <?php echo $sadrsFollowup['SadrFollowup']['id'] ?></h3></div>
		  <p>To view the initial report click on the next tab labeled <span class="label label-info">Initial Report</span> </p>
		<hr>		
		  <div class="tabbable" style="margin-bottom: 18px;">
			<ul class="nav nav-tabs">
			  <li><a id="viewSadr" href="#tab2" data-toggle="tab">Initial Report <?php echo $sadrsFollowup['SadrFollowup']['sadr_id'] ?></a></li>
			  <li class="active"><a href="#tab1" data-toggle="tab">Follow UP report <?php echo $sadrsFollowup['SadrFollowup']['id'] ?></a></li>
			</ul>
			<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
			  <div class="tab-pane active" id="tab1">
				<p>Follow up report contents.</p>
				
				<!-- REAL SADR FOLLOW UP FORM-->
				<div class="form-actions">
					<div class="row-fluid">
						<div class="span4">
							<?php							
								echo $this->Html->link('Download PDF', array('action'=>'download', 'ext'=> 'pdf', $sadrsFollowup['SadrFollowup']['id']), 
															array('class' => 'btn btn-primary mapop', 'title'=>'Download PDF', 
															'data-content' => 'Download the pdf version of the report',));
							?>	
						</div>
						<div class="span4">
							<?php									
									echo $this->Form->button('Print Report', array('type' => 'button', 'class'=>'btn btn-inverse btnPrint' ,
															'onclick' => '$(\'#printAreade\').jqprint(); '
															));
							?>
						</div>
						<div class="span4">
							<?php									
									if($sadrsFollowup['SadrFollowup']['submitted'] > 1) {
										echo $this->Html->link('Edit Report', '#', array(
											'name' => 'continueEditing',
											'class' => 'btn mapop disabled',
											'id' => 'SadrContinueReport', 'title'=>'Submitted Report!', 
											'data-content' => 'This report has been submitted to PPB and cannot be edited',
											'div' => false,
										));
									} else {									
										echo $this->Html->link('Edit Report', array('action' => 'edit', $sadrsFollowup['SadrFollowup']['id']), array(
											'name' => 'continueEditing',
											'class' => 'btn mapop',
											'id' => 'SadrContinueReport', 'title'=>'Edit Report', 
											'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
											'div' => false,
										));
									}
							?>
						</div>
					</div>
				</div>
				<div id="printAreade" class="vformback">
					<?php echo $this->Form->input('sadr_id', array('type' => 'hidden', 'value' => $sadrsFollowup['SadrFollowup']['sadr_id'], 'id' => 'SadrFollowupSadrId')); ?>
					<div class="row-fluid">
						<div class="span12">
							<div class="control-group">
								<h3>Report ID: <?php echo $sadrsFollowup['SadrFollowup']['id'] ?></h3>
							</div>
						</div>
					</div><!--/row-->
					<hr>
					
					<div class="row-fluid">
						<div class="span8">
							<div class="control-group">
								<label class="control-label required" for="SadrDescriptionOfReaction"><strong>BRIEF DESCRIPTION OF REACTION:</strong></label>
								<div class="control-label">
									<?php echo $sadrsFollowup['SadrFollowup']['description_of_reaction'] ?>
								</div>
							</div>
						</div>
						<div class="span4">
							<div class="control-group">
								<h3>Initial Report ID: </h3><p><?php echo $sadrsFollowup['SadrFollowup']['sadr_id'] ?></p>
							</div>
						</div>
					</div><!--/row-->
					<hr>
					
					<div class="row-fluid">
						<div class="span12">
							<table class="table table-bordered  table-condensed table-pvborder" id="buildyourform">
								<thead>
								  <tr>
									<th class="required" style="width: 25%;" colspan="2">
										LIST OF <em>ALL</em> DRUGS USED IN THE  
										LAST 3 MONTHS PRIOR TO REACTION. 
										IF PREGNANT, INDICATE THE DRUGS USED 
										DURING THE 1st TRIMESTER <br>						
										 <label>(include OTC and herbals)</label>					
									</th>
									<th style="width: 9%;">BRAND NAME</th>
									<th class="required" style="width: 8%;"><label class="required">DOSE</label></th>
									<th class="required" style="width: 23%;" colspan="2">ROUTE AND FREQUENCY<label></label></th>
									<th class="required" style="width: 10%;">DATE STARTED<label class="help-block required">	(dd-mm-yyyy) </label></th>
									<th style="width: 10%;">DATE STOPPED<p class="help-block">	(dd-mm-yyyy) </p></th>
									<th style="width: 10%;">INDICATION</th>
									<th class="required" style="width: 10%;">
										 <label class="required">TICK (&#x2713;)  <br> SUSPTECTED DRUG(S)</label>
									</th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$i = 1;
									foreach ($sadrsFollowup['SadrListOfDrug'] as $sadrListOfDrug): ?>
									<tr>
										<td><?php echo $i++;?></td>
										<td><?php echo $sadrListOfDrug['drug_name'];?></td>
										<td><?php echo $sadrListOfDrug['brand_name'];?></td>
										<td><?php echo $sadrListOfDrug['dose'].' - '.$dose[$sadrListOfDrug['dose_id']];?></td>
										<td><?php echo $routes[$sadrListOfDrug['route_id']];?></td>
										<td><?php echo $frequency[$sadrListOfDrug['frequency_id']];?></td>
										<td><?php echo $sadrListOfDrug['start_date'];?></td>
										<td><?php echo $sadrListOfDrug['stop_date'];?></td>
										<td><?php echo $sadrListOfDrug['indication'];?></td>
										<td><?php if ($sadrListOfDrug['suspected_drug'] == 1) { echo "<strong>&#x2713;</strong>" ;} ?></td>
									</tr>
								<?php endforeach; ?>				  
								</tbody>
						  </table>
						</div><!--/span-->
					</div><!--/row-->
					<hr>
				
					<div class="row-fluid">					
						<div class="span12">
							<h5>OUTCOME:</h5>	<br>							
							<?php echo $sadrsFollowup['SadrFollowup']['outcome'] ?>
						</div><!--/span-->
					</div><!--/row-->
					<hr>
				
					<div class="row-fluid">
						<div class="span12">
							<h4>
								Do you have files that you would like to attach?: 
							</h4>
							<table class="table table-bordered  table-condensed table-pvborder" id="buildattachmentsform">
								<thead>
								  <tr id="attachmentsTableHeader">
									<th>#</th>
									<th class="required" style="width : 30%;"><label class="required">FILE</label></th>
									<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$i = 1;
									foreach ($sadrsFollowup['Attachment'] as $attachment): ?>
									<tr>
										<td><?php echo $i++;?></td>
										<td>
										<a href="<?php echo $root?>attachments/download/<?php echo $attachment['id']; ?>"><?php echo __($attachment['basename']);?></a>
										</td>
										<td><?php echo $attachment['description'];?></td>
									</tr>
								<?php endforeach; ?>					  
								</tbody>
						  </table>
						</div><!--/span-->
					</div><!--/row-->
				</div>
				<!-- REAL SADR FOLLOW UP FORM-->				
				
				
			  </div>
			  <div class="tab-pane" id="tab2">
				<?php 
					// echo $this->Html->link('Go to Initial Report', array('controller' => 'sadrs', 'action' => 'view', $sadrsFollowup['SadrFollowup']['sadr_id']), 
								// array('class' => 'btn btn-info')); 
				?>
				<?php echo $this->Html->image('indicator.gif', array('id' => 'loading')); ?>
				<div id="sadrViewContentpane"></div>
			  </div>
			</div>
		  </div> <!-- /tabbable -->

		</div>
	</div>
</section>