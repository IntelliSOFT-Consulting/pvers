	<div class="row-fluid">
		<div class="span12">
		    <table id="buildyourform"  class="table table-bordered  table-condensed table-pvborder">
				<thead>
				  <tr>
					<th colspan="2" style="width: 25%;" class="required <?php echo $help_infos['drug_name']['help_type']?>"
						title="<?php echo $help_infos['drug_name']['title'] ?>"
						data-content="<?php echo $help_infos['drug_name']['content']?>">
						<label class="required"><?php echo $help_infos['drug_name']['field_label'].' <span style="color:red;">*</span>'?></label>
						<label class="help-block required">	<?php echo $help_infos['drug_name']['help_text']?> </label>
						<span class="label label-info">Generic Name</span>
					</th>
					<th style="width: 7%;">BRAND NAME</th>
					<th colspan="2" style="width: 13%;" class="required <?php echo $help_infos['dose']['help_type']?>"
						title="<?php echo $help_infos['dose']['title'] ?>"
						data-content="<?php echo $help_infos['dose']['content']?>">
						<label class="required"><?php echo $help_infos['dose']['field_label'].' <span style="color:red;">*</span>'?></label>
						<label class="help-block required">	<?php echo $help_infos['dose']['help_text']?> </label>
					</th>
					<th colspan="2" style="width: 23%;" class="required <?php echo $help_infos['route_and_frequency']['help_type']?>"
						title="<?php echo $help_infos['route_and_frequency']['title'] ?>"
						data-content="<?php echo $help_infos['route_and_frequency']['content']?>">
						<label class="required"><?php echo $help_infos['route_and_frequency']['field_label'].' <span style="color:red;">*</span>'?></label>
						<label class="help-block required">	<?php echo $help_infos['route_and_frequency']['help_text']?> </label>
					</th>
					<th style="width: 10%;" class="required <?php echo $help_infos['date_started']['help_type']?>"
						title="<?php echo $help_infos['date_started']['title'] ?>"
						data-content="<?php echo $help_infos['date_started']['content']?>">
						<label class="required"><?php echo $help_infos['date_started']['field_label'].' <span style="color:red;">*</span>'?></label>
						<label class="help-block required">	<?php echo $help_infos['date_started']['help_text']?> </label>
					</th>
					<th style="width: 10%;">DATE STOPPED<p class="help-block">	(dd-mm-yyyy) </p></th>
					<th style="width: 7%;" >
						<label>INDICATION </span></label>
					</th>
					<th colspan="2" style="width: 10%;" class="required <?php echo $help_infos['suspected_drug']['help_type']?>"
						title="<?php echo $help_infos['suspected_drug']['title'] ?>"
						data-content="<?php echo $help_infos['suspected_drug']['content']?>">
						 <label class="required">TICK (&#x2713;)  <br/> SUSPECTED DRUG(S) <span style="color:red;">*</span></label>
						 <label class="help-block required"><?php echo $help_infos['suspected_drug']['help_text']?> </label>
						<?php
							echo $this->Form->input('list', array('type' => 'hidden', 'value' => ''));
							echo $this->Form->error('Sadr.list', array('wrap' => 'span', 'class' => 'control-group required error'));
						?>
					</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>1</td>
					<td data-title="Generic Name *"><?php
							 echo $this->Form->input('SadrListOfDrug.0.id')  ;

							echo $this->Form->input('SadrListOfDrug.0.drug_name', array(
									'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 autoComblete autosave-ignore',
									'error' => array('attributes' => array( 'class' => 'help-block')),
									'data-items' => '4',  'autocomplete'=> 'off',
							));
						?>
					</td>
					<td data-title="Brand Name">
						<?php
							echo $this->Form->input('SadrListOfDrug.0.brand_name', array(
														'label' => false, 'between' => false,
														'after' => false, 'class' => 'span11 autoComblete2 autosave-ignore',));
						?>
					</td>
					<td  data-title="Dose *" style="width: 5%;">
						<?php
							echo $this->Form->input('SadrListOfDrug.0.dose', array(
													   'label' => false, 'between' => false,
														'error' => array('attributes' => array( 'class' => 'help-block')),
														'class' => 'span11 autosave-ignore',));
						?>
					</td>
					<td style="width: 10%; border-left:0px;" >
						<?php
							echo $this->Form->input('SadrListOfDrug.0.dose_id', array(
											'empty' => true, 'label' => false, 'between' => false, 'class' => 'span12 autosave-ignore',
											'type' => 'select',
											'error' => array('attributes' => array( 'class' => 'help-block')),
											'options' => $dose,
											));
						?>
					</td>
					<td  data-title="Route *" style="width: 14%;"><?php
							echo $this->Form->input('SadrListOfDrug.0.route_id', array(
											'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
											'type' => 'select',
											'error' => array('attributes' => array( 'class' => 'help-block')),
											'options' => $routes,
											));
						?>
					</td>
					<td  data-title="Frequency *" style="width: 9%;"><?php
							echo $this->Form->input('SadrListOfDrug.0.frequency_id', array(
											'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
											'type' => 'select',
											'options' => $frequency,
											'error' => array('attributes' => array( 'class' => 'help-block')),
											));
						?>
					</td>
					<td data-title="Date Started (dd-mm-yyyy) *">
						<?php
							echo $this->Form->input('SadrListOfDrug.0.start_date', array(
								'type' => 'text', 'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 autosave-ignore',
									'error' => array('attributes' => array( 'class' => 'help-block')),
							));
						?>
					</td>
					<td data-title="Date Stopped (dd-mm-yyyy)">
						<?php
							echo $this->Form->input('SadrListOfDrug.0.stop_date', array(
								'type' => 'text', 'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 autosave-ignore',
								'error' => array('attributes' => array( 'class' => 'help-block')),
							));
						?>
					</td>
					<td data-title="Indication">
						<?php
						// echo $this->Form->input('SadrListOfDrug.0.indication', array(
						// 		'label' => false, 'between' => false,
						// 		'after' => false, 'class' => 'span9 autosave-ignore',
						// 		));
								echo $this->Form->input('SadrListOfDrug.0.indication', array(
									'label' => false, 'between' => false, 'after' => false, 'class' => 'span11',
									'error' => array('attributes' => array( 'class' => 'help-block'))
							));
						?>
					</td>
					<td data-title="Suspected Drug?">
						<?php
							echo $this->Form->input('SadrListOfDrug.0.suspected_drug', array(
									'type' => 'checkbox', 'class' => 'autosave-ignore',
									'label' => false, 'between' => false, 'after' => false,
									'between' => '<label class="checkbox">',
									'after' => '</label>',)
							);
						?>
					</td>
					<td data-title="Add a Drug - "><button type="button" class="btn-mini" id="add" title="click to add row"><i class="icon-plus"></i></button></td>
				  </tr>
				  <?php
					if (!empty($this->request->data['SadrListOfDrug'])) {
						for ($i = 1; $i <= count($this->request->data['SadrListOfDrug'])-1; $i++) { 	?>
				  <tr>
					<td><?php echo $i+1; ?></td>
					<td data-title="Generic Name *"><?php
							 echo $this->Form->input('SadrListOfDrug.'.$i.'.id') ;

							echo $this->Form->input('SadrListOfDrug.'.$i.'.drug_name', array(
									'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 autoComblete autosave-ignore',
									'error' => array('attributes' => array( 'class' => 'help-block')),
									'data-items' => '4', 'autocomplete'=> 'off',
							));
						?>
					</td>
					<td data-title="Brand Name">
						<?php echo $this->Form->input('SadrListOfDrug.'.$i.'.brand_name', array(
														'label' => false, 'between' => false,
														'after' => false, 'class' => 'span11 autoComblete2 autosave-ignore',));
						?>
					</td>
					<td  data-title="Dose *" style="width: 5%;">
						<?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.dose', array(
														'label' => false, 'between' => false,
														'error' => array('attributes' => array( 'class' => 'help-block')),
														'class' => 'span11 autosave-ignore',));
						?>
					</td>
					<td style="width: 10%; border-left:0px;">
						<?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.dose_id', array(
											'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
											'type' => 'select',
											'error' => array('attributes' => array( 'class' => 'help-block')),
											'options' => $dose,
											));
						?>
					</td>
					<td data-title="Route *"><?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.route_id', array(
										'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
										'type' => 'select',
										'options' => $routes,
										'error' => array('attributes' => array( 'class' => 'help-block')),
								));
						?>
					</td>
					<td data-title="Frequency *"><?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.frequency_id', array(
									'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
									'type' => 'select',
									'options' => $frequency,
									'error' => array('attributes' => array( 'class' => 'help-block')),
								));

					?>
					</td>
					<td data-title="Date Started (dd-mm-yyyy) *">
						<?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.start_date', array(
								'type' => 'text', 'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 date-pick-from autosave-ignore',
									'error' => array('attributes' => array( 'class' => 'help-block')),
							));
						?>
					</td>
					<td data-title="Date Stopped (dd-mm-yyyy)">
						<?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.stop_date', array(
								'type' => 'text', 'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 date-pick-to autosave-ignore',
									'error' => array('attributes' => array( 'class' => 'help-block')),
							));
						?>
					</td>
					<td data-title="Indication">
						<?php
						// echo $this->Form->input('SadrListOfDrug.'.$i.'.indication', array(
						// 		'label' => false, 'between' => false,
						// 		'after' => false, 'class' => 'span9 autosave-ignore',));
						echo $this->Form->input('SadrListOfDrug.'.$i.'.indication', array(
									'label' => false, 'between' => false, 'after' => false, 'class' => 'span11',
									'error' => array('attributes' => array( 'class' => 'help-block'))
							));
						// echo $this->Form->input('SadrListOfDrug.$i.indication', array(
						// 	'label' => false, 'between' => false, 'after' => false, 'class' => 'span11 autoComblete autosave-ignore',
						// 	'error' => array('attributes' => array( 'class' => 'help-block')),
						// 	'data-items' => '4',  'autocomplete'=> 'off',
						// 	));
						?>
					</td>
					<td data-title="Suspected Drug?">
						<?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.suspected_drug', array(
									'type' => 'checkbox', 'class' => 'autosave-ignore',
									'label' => false, 'between' => false, 'after' => false,
									'between' => '<label class="checkbox">',
									'after' => '</label>',)
							);
						?>
					</td>
					<td data-title="Remove Drug - ">
						<button  type="button" class="btn-mini removeTr" title="click here to delete row"
									id="<?php if (isset($this->request->data['SadrListOfDrug'][$i]['id'])) { echo $this->request->data['SadrListOfDrug'][$i]['id']; } ?>" >
							<i class="icon-minus"></i>
						</button>
					</td>
				  </tr>
				  <?php } } ; ?>

				</tbody>
		  </table>
		</div><!--/span-->
	</div><!--/row-->
	<hr>
