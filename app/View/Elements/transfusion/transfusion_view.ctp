<?php
	$ichecked = "&#x2611;";
    $nchecked = "&#x2610;";
?>
<div id="printAreade">
				<div class="formbackt">

				<table style="width: 100%;">
					<tr>
						<td><p><b>(FOM20/MIP/PMS/SOP/001)</b></p></td>
					</tr>
					<tr>
						<td style="text-align: center;">
							<div class="babayao" style="text-align: center;">
		                    <h5>MINISTRY OF HEALTH</h5>
		                    <h5>PHARMACY AND POISONS BOARD</h5>
		                    <h5>P.O. Box 27663-00506 NAIROBI</h5>
		                    <h5>Tel: +254 709 770 100/+254 709 770 xxx (Replace xxx with extension)</h5>
		                    <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
		                    <h5 style="color: red;">ADVERSE TRANSFUSION REACTION FORM </h5>
		                    </div>
						</td>
					</tr>
				</table><br>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td><p style="text-warning">In the event of a severe reaction following transfusion of blood or blood products please complete this form and send it to the laboratory with the specimens listed below.</p></td>
					</tr>
				</table>
				<hr>


				<table style="width: 100%;">
					<tr>
						<td colspan="4"><h4 style="text-align: center; color: #884805;">PATIENT INFORMATION</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;">Patient Name</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['patient_name'] ?>	</strong></td>
						<td style="width: 25%;">GENDER </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['gender'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">DATE OF BIRTH</td>
						<td style="width: 25%;"><strong>
							<?php 
								echo $transfusion['Transfusion']['date_of_birth'];
								if(!empty($transfusion['Transfusion']['age_years'])) echo '<br>'.$transfusion['Transfusion']['age_years'].' years';
							?></strong>
						</td>
						<td style="width: 25%;">Patient No. </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['patient_phone'] ?>		</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;"> Diagnosis </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['diagnosis'] ?>	</strong></td>
						<td style="width: 25%;"> Obstetric History </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['obstetric_history'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Ward </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['ward'] ?>	</strong></td>
						<td style="width: 25%;">Previous Transfusion</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['previous_transfusion'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Pre-transfusion HB </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['pre_hb'] ?>	</strong></td>
						<td style="width: 25%;"> </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['transfusion_comment'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Reason for transfusion </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['transfusion_reason'] ?>	</strong></td>
						<td style="width: 25%;">Previous Reactions</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['previous_reactions'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Current Medications</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['current_medications'] ?>	</strong></td>
						<td style="width: 25%;"> </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reaction_comment'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="4"><h4 style="text-align: center; color: #884805;">REACTION INFORMATION</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;"><label class="required"><strong>Type of reaction</label> </td>
						<td style="width: 25%;">	</td>
						<td style="width: 25%;">Renal</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reaction_renal'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> General </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reaction_general'] ?>	</strong></td>
						<td style="width: 25%;"> Haematological </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reaction_haematological'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Dermatological </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reaction_dermatological'] ?>	</strong></td>
						<td style="width: 25%;"> Others (Specify) </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reaction_other'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>


				<table style="width: 100%;">
					<tr>
						<td colspan="6"><h5 style="text-align: center;">Vital Signs</h5> </td>
					</tr>
					<tr>
						<td colspan="2">At Start </td>
						<td colspan="2">During (15min)</td>
						<td colspan="2">At Stop </td>
					</tr>
					<tr>
						<td style="width: 15%;"> BP </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['vital_start_bp'] ?>	</strong></td>
						<td style="width: 15%;"> BP </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['vital_during_bp'] ?>	</strong></td>
						<td style="width: 15%;"> BP </td>
						<td><strong><?php echo $transfusion['Transfusion']['vital_stop_bp'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 15%;"> T </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['vital_start_t'] ?>	</strong></td>
						<td style="width: 15%;"> T </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['vital_during_t'] ?>	</strong></td>
						<td style="width: 15%;"> T </td>
						<td><strong><?php echo $transfusion['Transfusion']['vital_stop_t'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 15%;"> P </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['vital_start_p'] ?>	</strong></td>
						<td style="width: 15%;"> P </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['vital_during_p'] ?>	</strong></td>
						<td style="width: 15%;"> P </td>
						<td><strong><?php echo $transfusion['Transfusion']['vital_stop_p'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 15%;"> R </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['vital_start_r'] ?>	</strong></td>
						<td style="width: 15%;"> R </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['vital_during_r'] ?>	</strong></td>
						<td style="width: 15%;"> R </td>
						<td><strong><?php echo $transfusion['Transfusion']['vital_stop_r'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">COMPONENT INFORMATION</h4> </td>
					</tr>
				</table>
			  	<table  style="width: 100%;" class="table table-bordered table-condensed table-pvborder">
	                <thead>
	                  <tr>
	                    <th></th>
	                    <th style="width: 35%"> <label class="required">Type of component</label></th>
	                    <th> <label>Pint No.</label></th>
	                    <th> Expiry Date</th>
	                    <th> Volume Transfused </th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <?php
	                  	$i = 0;
	                     foreach ($transfusion['Pint'] as $listOfPint): 
	                  ?>
	                  <tr>
	                    <td><?= $i+1; ?></td>
	                    <td><?php echo $listOfPint['component_type'];?></td>
	                    <td><?php echo $listOfPint['pint_no'];?></td>
	                    <td><?php echo $listOfPint['expiry_date'];?></td>
	                    <td><?php echo $listOfPint['volume_transfused'];?></td>          
	                  </tr>
	                
	                <?php endforeach; ?>

	                </tbody>
          		</table>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;"> Name of Nurse/Doctor </td>
						<td><strong><?php echo $transfusion['Transfusion']['nurse_name'] ?>	</strong></td>
					</tr>
					<tr>
						<td> 
							<h5>Specimens required by the laboratory </h5>
		                    <ol>
		                        <li>10mls post-transfusion whole blood from patient from plain bottle </li>
		                        <li>2mls of blood in EDTA bottle </li>
		                        <li>10mls First Void Urine </li>
		                        <li>The blood that reacted together with the attached transfusion set </li>
		                        <li>All empty blood bags of already transfused unit </li>
		                    </ol>
                     	</td>
					</tr>					
				</table>
				 <hr>

				 <table style="width: 100%;">
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">LAB INVESTIGATION: (Transfusion manager)</h4> </td>
					</tr>
				</table>

				<table style="width: 100%;">
					<tr>
						<td colspan="4"><h4 style="text-align: center; color: #884805;">Incident information</h4> </td>
					</tr>
					<tr>
						<td></td>
						<td>Recipient’s blood supernatant:</td>
						<td></td>
						<td>Donor blood supernatant:</td>
					</tr>
					<tr>
						<td style="width: 25%;"> Hemolysis </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['lab_hemolysis'] ?>	</strong></td>
						<td style="width: 25%;"> Agglutination </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['donor_hemolysis'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> If present  </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['lab_hemolysis_present'] ?>	</strong></td>
						<td style="width: 25%;"> Age of donor pack </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['donor_age'] ?>	</strong></td>
					</tr>
					<tr><td colspan="4"><h5 class='controls'>Recipient’s blood:</h5></td></tr>
					<tr>
						<td style="width: 25%;"> Agglutination </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['recipient_blood'] ?>	</strong></td>
						<td style="width: 25%;"> Culture donor pack </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['culture_donor_pack'] ?>	</strong></td>
					</tr>
				</table>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="2"><h5>Haematological results</h5></td>
						<td colspan="2"><h5>Film</h5></td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td style="width: 15%;"> WBC </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['hae_wbc'] ?>	</strong></td>
						<td style="width: 15%;"> RBC </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['film_rbc'] ?>	</strong></td>
						<td style="width: 15%;">Culture recipient blood</td>
						<td><strong><?php echo $transfusion['Transfusion']['culture_recipient_blood'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 15%;"> HB </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['hae_hb'] ?>	</strong></td>
						<td style="width: 15%;"> WBC </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['film_wbc'] ?>	</strong></td>
						<td style="width: 15%;"> </td>
						<td> </td>
					</tr>
					<tr>
						<td style="width: 15%;"> RBC </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['hae_rbc'] ?>	</strong></td>
						<td style="width: 15%;"> WBC </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['film_plt'] ?>	</strong></td>
						<td style="width: 15%;"> </td>
						<td> </td>
					</tr>
					<tr>
						<td style="width: 15%;"> HCT </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['hae_hct'] ?>	</strong></td>
						<td style="width: 15%;"> </td>
						<td> </td>
						<td style="width: 15%;"> </td>
						<td> </td>
					</tr>
					<tr>
						<td style="width: 15%;"> MCV </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['hae_mcv'] ?>	</strong></td>
						<td style="width: 15%;"> </td>
						<td> </td>
						<td style="width: 15%;"> </td>
						<td> </td>
					</tr>
					<tr>
						<td style="width: 15%;"> MCH </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['hae_mch'] ?>	</strong></td>
						<td style="width: 15%;"> </td>
						<td> </td>
						<td style="width: 15%;"> </td>
						<td> </td>
					</tr>
					<tr>
						<td style="width: 15%;"> MCHC </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['hae_mchc'] ?>	</strong></td>
						<td style="width: 15%;"> </td>
						<td> </td>
						<td style="width: 15%;"> </td>
						<td> </td>
					</tr>
					<tr>
						<td style="width: 15%;"> PLT </td>
						<td style="width: 15%;"><strong><?php echo $transfusion['Transfusion']['hae_plt'] ?>	</strong></td>
						<td style="width: 15%;"> </td>
						<td> </td>
						<td style="width: 15%;"> </td>
						<td> </td>
					</tr>
				</table>
				 <hr>

				 <table style="width: 100%;">
					<tr>
						<td colspan="2"><h5>If negative (inconclusive results in 8) set up compatibility with enzyme treated cells</h5> </td>				
						<td style="width: 25%;"> Urinalysis </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['urinalysis'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Result </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['negative_result'] ?>	</strong></td>
						<td style="width: 25%;"> Evaluation </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['evaluation'] ?>	</strong></td>
					</tr>
					<tr>
						<td colspan="2"><h5>In case of blood group O transfused to A or B or AB individual: Establish from the donor unit </h5> </td>				
						<td style="width: 25%;"> Was the adverse reaction related to transfusion? </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['adverse_reaction'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Anti A titres  </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['anti_a'] ?>	</strong></td>
						<td style="width: 25%;">  </td>
						<td style="width: 25%;"> </td>
					</tr>
					<tr>
						<td style="width: 25%;"> Anti B titres </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['anti_b'] ?>	</strong></td>
						<td style="width: 25%;">  </td>
						<td style="width: 25%;"> </td>
					</tr>
				</table>
				<hr>

				 <table style="width: 100%;">
					<tr>
						<td colspan="2"><h4 style="color: #884805;">8. Compatibility testing recipient serum (pretransfusion sample) and donor cells (pack)</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;"> Saline Rt </td>
						<td><strong><?php echo $transfusion['Transfusion']['compatible_saline_rt'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Saline 37 </td>
						<td><strong><?php echo $transfusion['Transfusion']['compatible_saline_ii'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> AHG </td>
						<td><strong><?php echo $transfusion['Transfusion']['compatible_ahg'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Albumin 37 </td>
						<td><strong><?php echo $transfusion['Transfusion']['compatible_albumin'] ?>	</strong></td>
					</tr>
				</table>
				<hr>

				<?php if (count($transfusion['Attachment']) > 0) { ?>
				<table  class="change_order_items" style="width: 100%;">
					<tbody>
					  <tr id="attachmentsTableHeader">
						<th>#</th>
						<th class="required" style="width : 30%;"><label class="required">FILE</label></th>
						<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
					  </tr>
					<?php
						$i = 1;
						foreach ($transfusion['Attachment'] as $attachment): ?>
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
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_name'] ?></strong></td>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Designation']['name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_email'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_phone'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;">Date</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_date'] ?></strong></td>
					</tr>
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">If Person Submitting is Different from Reporter</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;">Name</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_name_diff'] ?></strong></td>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_designation_diff'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_email_diff'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_phone_diff'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;">Date</td>
						<td style="width: 25%;"><strong><?php echo $transfusion['Transfusion']['reporter_date_diff'] ?></strong></td>
					</tr>
				</table>
				 <hr>

				</div> <!-- /art-sheet -->
			</div> <!-- /art-sheet -->