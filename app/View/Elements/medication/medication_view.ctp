<?php
	$ichecked = "&#x2611;";
    $nchecked = "&#x2610;";
?>
<div id="printAreade">
				<div class="formbackm">

				<table style="width: 100%;">
					<tr>
						<td><p><b>(FOM21/MIP/PMS/SOP/001)</b></p></td>
					</tr>
					<tr>
						<td style="text-align: center;">
							<?php
		                        echo $this->Html->image('coa.png', array('alt' => 'COA'));
		                    ?>
		                    <h4>MINISTRY OF HEALTH</h4>
		                    <h4>PHARMACY AND POISONS BOARD</h4>
		                    <h4>P.O. Box 27663-00506 NAIROBI</h4>
		                    <h4>Tel: (020)-3562107 Ext 114, 0720 608811, 0733 884411 Fax: (020) 2713431/2713409</h4>
		                    <h4><b>Email:</b> pv@pharmacyboardkenya.org</h4>
		                    <h4 style="color: red;">MEDICATION ERROR REPORTING FORM </h4>
						</td>
					</tr>
				</table><br>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 45%;"></td>
						<td style="width: 15%;">REPORT ID/Type: </td>
						<td style="width: 15%;"><strong><?php echo $medication['Medication']['id'];  ?></strong></td>
					</tr>
				</table>
				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">Date of Event</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['date_of_event'] ?>	</strong></td>
						<td style="width: 25%;">Time of Event </td>
						<td style="width: 25%;"><strong><?php 
							// echo $medication['Medication']['time_of_event'] 
							if(isset($medication['Medication']['time_of_event']['hour'])) echo $medication['Medication']['time_of_event']['hour'].':';
							if(isset($medication['Medication']['time_of_event']['min'])) echo $medication['Medication']['time_of_event']['min'];
						?>	</strong></td>
					</tr>
				</table>
				 <hr>
				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">NAME OF INSTITUTION/ ORGANZIATION</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['name_of_institution'] ?>	</strong></td>
						<td style="width: 25%;">INSTITUTION CODE </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['institution_code'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Contact/Tel No.</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['institution_contact'] ?></strong></td>
						<td style="width: 25%;">CONTACT </td>
						<td style="width: 25%;"><strong><?php echo $medication['County']['county_name'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="4"><h4 style="text-align: center; color: #884805;">PATIENT INFORMATION</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;">Patient Initials</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['patient_name'] ?>	</strong></td>
						<td style="width: 25%;">GENDER </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['gender'] ?>		</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">DATE OF BIRTH</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['date_of_birth'];?></strong></td>
						<td style="width: 25%;">PHONE NUMBER </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['patient_phone'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Age in years </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['age_years'] ?>	</strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
					</tr>				
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="4"><h4 style="text-align: center; color: #884805;">Details on the medication error</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;"> Ward </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['ward'] ?>	</strong></td>
						<td style="width: 25%;">Clinic</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['clinic'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Pharmacy </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['pharmacy'] ?>	</strong></td>
						<td style="width: 25%;">Accident & Emergency/Casualty </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['accident'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Others</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['location_other'] ?>	</strong></td>
						<td style="width: 25%;"> </td>
						<td style="width: 25%;"> </td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td>Please describe the error. Include description/ sequence of events and work environment (e.g. change of shift, short staffing, during peak hours). </td>
					</tr>
					<tr>
						<td><strong><?php echo $medication['Medication']['description_of_error'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>


				<table style="width: 100%;">
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">In which process did the error occur?</h4> </td>
					</tr>
					<tr>
						<td style="width: 15%;"> In which process did the error occur? </td>
						<td style="width: 15%;"><strong>
							<?php echo $medication['Medication']['process_occur'] ?>	
							<?php echo $medication['Medication']['process_occur_specify'] ?>	
						</strong></td>
						<td colspan="2"> 
							Did the error reach the patient? <br>
							<strong><?php echo $medication['Medication']['reach_patient'] ?>	</strong> <br>
							Was the correct medication, dose or dosage form administered to or taken by the patient? <br>
							<strong><?php echo $medication['Medication']['correct_medication'] ?>	</strong>
						</td>
						<td colspan="2"> Describe the direct result on the patient (e.g. death, type of harm, additional patient monitoring e.g. BP, heart rate, glucose level etc) <br>
							<strong><?php echo $medication['Medication']['direct_result'] ?>	</strong>
						</td>						
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td><h4 style="text-decoration: underline;">Please tick the appropriate Error Outcome Category (Tick one appropriate box below)</h4> </td>
					</tr>
					<tr>
						<td><strong><?php echo $medication['Medication']['outcome'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="2"><h4 style="text-decoration: underline;">Indicate the possible error cause(s) and contributing factor(s) below (Tick the appropriate box(es)</h4> </td>
					</tr>
					<tr>
						<td style="width: 50%">
							<h5>Staff factors</h5>
							<p> <?php echo ($medication['Medication']['error_cause_inexperience']   ? $ichecked : $nchecked ); ?> Inexperienced personnel</p>
							<p> <?php echo ($medication['Medication']['error_cause_knowledge']   ? $ichecked : $nchecked ); ?> Inadequate knowledge </p>
							<p> <?php echo ($medication['Medication']['error_cause_distraction']   ? $ichecked : $nchecked ); ?> Distraction </p>
							<h5>Medication related</h5>
							<p> <?php echo ($medication['Medication']['error_cause_sound']   ? $ichecked : $nchecked ); ?> Sound alike medication </p>
							<p> <?php echo ($medication['Medication']['error_cause_medication']   ? $ichecked : $nchecked ); ?> Look alike medication </p>
							<p> <?php echo ($medication['Medication']['error_cause_packaging']   ? $ichecked : $nchecked ); ?> Look alike packaging </p>
							<h5>Work and environment</h5>
							<p> <?php echo ($medication['Medication']['error_cause_workload']   ? $ichecked : $nchecked ); ?> Heavy workload </p>
							<p> <?php echo ($medication['Medication']['error_cause_peak']   ? $ichecked : $nchecked ); ?> Peak hour </p>
							<p> <?php echo ($medication['Medication']['error_cause_stock']   ? $ichecked : $nchecked ); ?> Stock arrangements/storage problem </p>
						</td>
						<td>							
							<h5>Task and technology</h5>
							<p> <?php echo ($medication['Medication']['error_cause_procedure']   ? $ichecked : $nchecked ); ?> Failure to adhere to work procedure </p>
							<p> <?php echo ($medication['Medication']['error_cause_abbreviations']   ? $ichecked : $nchecked ); ?> Use of abbreviations </p>
							<p> <?php echo ($medication['Medication']['error_cause_illegible']   ? $ichecked : $nchecked ); ?> Illegible prescriptions </p>
							<p> <?php echo ($medication['Medication']['error_cause_inaccurate']   ? $ichecked : $nchecked ); ?> Patient information/record unavailable/ inaccurate </p>
							<p> <?php echo ($medication['Medication']['error_cause_labelling']   ? $ichecked : $nchecked ); ?> Wrong labelling/instruction on dispensing envelope or bottle/container </p>
							<p> <?php echo ($medication['Medication']['error_cause_computer']   ? $ichecked : $nchecked ); ?> Incorrect computer entry </p>
							<p> <?php echo ($medication['Medication']['error_cause_other']   ? $ichecked : $nchecked ); ?> Others </p>
							<p> <?php echo $medication['Medication']['error_cause_specify']; ?>  </p>
						</td>
					</tr>
				</table>
				 <hr>

				 <table style="width: 100%;">
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">Product details: Please complete the following for products involved. Click Add for additional products </h4> </td>
					</tr>
				</table>
			  	<table  style="width: 100%;" class="table table-bordered table-condensed table-pvborder">
	                <thead>
	                  <tr>
	                  	<th></th>
	                    <th style="width: 35%"> <label class="required">Product Description</label></th>
	                    <th> <label>Product No. 1 (intended)</label></th>
	                    <th> Product No. 2 (error)</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <?php
	                  	$i = 0;
	                     foreach ($medication['MedicationProduct'] as $medicaTionProduct): 
	                  ?>
	                  
	                  <tr>
	                    <td rowspan="8" class="sailor"><?= $i+1; ?></td>
	                    <td>
	                        Generic name (active ingredient)
	                    </td>
	                    <td>
	                        <?php
	                          echo $medicaTionProduct['generic_name_i'];
	                        ?>
	                    </td>                    
	                    <td>
	                        <?php
	                        echo $medicaTionProduct['generic_name_ii'];
	                        ?>
	                    </td> 
	                    <td rowspan="8">
	                        
	                    </td>
	                  </tr>
	                  <tr>
	                    <td>Brand/ Product Name</td>
	                    <td>
	                        <?php
	                          echo $medicaTionProduct['product_name_i'];
	                        ?>
	                    </td>                    
	                    <td>
	                        <?php
	                        echo $medicaTionProduct['product_name_ii'];
	                        ?>
	                    </td> 
	                  </tr>
	                  <tr>
	                    <td>Dosage form</td>
	                    <td>
	                        <?php
	                          echo $medicaTionProduct['dosage_form_i'];
	                        ?>
	                    </td>                    
	                    <td>
	                        <?php
	                        echo $medicaTionProduct['dosage_form_ii'];
	                        ?>
	                    </td> 
	                  </tr>
	                  <tr>
	                    <td>Dose, frequency, duration, route</td>
	                    <td>
	                        <?php
	                          echo $medicaTionProduct['dosage_i'];
	                        ?>
	                    </td>                    
	                    <td>
	                        <?php
	                        echo $medicaTionProduct['dosage_ii'];
	                        ?>
	                    </td> 
	                  </tr>
	                  <tr>
	                    <td colspan="3"><p><i>Please fill below if error involved look alike (similar) product packaging</i></p></td>
	                  </tr>
	                  <tr>
	                    <td>Manufacturer</td>
	                    <td>
	                        <?php
	                          echo $medicaTionProduct['manufacturer_i'];
	                        ?>
	                    </td>                    
	                    <td>
	                        <?php
	                        echo $medicaTionProduct['manufacturer_ii'];
	                        ?>
	                    </td> 
	                  </tr>
	                  <tr>
	                    <td>Strength/concentration</td>
	                    <td>
	                        <?php
	                          echo $medicaTionProduct['strength_i'];
	                        ?>
	                    </td>                    
	                    <td>
	                        <?php
	                        echo $medicaTionProduct['strength_ii'];
	                        ?>
	                    </td> 
	                  </tr>
	                  <tr>
	                    <td>Type and size of container</td>
	                    <td>
	                        <?php
	                          echo $medicaTionProduct['container_i'];
	                        ?>
	                    </td>                    
	                    <td>
	                        <?php
	                        echo $medicaTionProduct['container_ii'];
	                        ?>
	                    </td> 
	                  </tr>
	                
	                <?php endforeach; ?>

	                </tbody>
          		</table>
				<hr>
				

				<table style="width: 100%;">
					<tr>
						<td>Suggest any recommendations, or describe policies or procedures you instituted or plan to institute to prevent future similar errors. If available, kindly attach an investigational report e.g. Root Cause Analysis (RCA)</td>
					</tr>
					<tr>
						<td><strong><?php echo $medication['Medication']['direct_result'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<?php if (count($medication['Attachment']) > 0) { ?>
				<table  class="change_order_items" style="width: 100%;">
					<tbody>
					  <tr id="attachmentsTableHeader">
						<th>#</th>
						<th class="required" style="width : 30%;"><label class="required">FILE</label></th>
						<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
					  </tr>
					<?php
						$i = 1;
						foreach ($medication['Attachment'] as $attachment): ?>
						<tr>
							<td style="width: 10%;"><?php echo $i++;?></td>
							<td>
								<a href="<?php echo $root?>attachments/download/<?php echo $attachment['id']; ?>"><?php echo __($attachment['basename']);?></a>
							</td>
							<td><?php echo $attachment['description'];?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<?php } ;?>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">Name of Person Reporting</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_name'] ?></strong></td>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $medication['Designation']['name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_email'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_phone'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;">Date</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_date'] ?></strong></td>
					</tr>
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">If Person Submitting is Different from Reporter</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;">Name</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_name_diff'] ?></strong></td>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_designation_diff'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_email_diff'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_phone_diff'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;">Date</td>
						<td style="width: 25%;"><strong><?php echo $medication['Medication']['reporter_date_diff'] ?></strong></td>
					</tr>
				</table>
				 <hr>

				</div> <!-- /art-sheet -->
			</div> <!-- /art-sheet -->