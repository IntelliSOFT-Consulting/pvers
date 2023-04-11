<?php
/**
 * @var \App\View\AppView $this
 */
  $this->Html->script('list_of_drugs', array('inline' => false));
?>
    <div class="row-fluid">
      <div class="span12">
        <h5 style="text-align: center;">List all medicines being currently used by the patient including OTC, and herbal products (* Tick the suspected medicine) <button type="button" class="btn btn-small" id="addListOfDrug" title="click to add row"><i class="icon-plus"></i></button>
                        </h5>
      </div>
    </div>

	<div class="row-fluid">
		<div class="span12">
		    <table id="buildyourform"  class="table table-bordered  table-condensed table-pvborder">
				<thead>
				  <tr>
					<th colspan="2" class="required tooltipper"
						title="This is the generic name"
						data-content="">
						<label class="help-block required">	(include OTC and herbals)  </label>
						<span class="label label-info">INN/ Generic Name</span>
					</th>
					<th style="width: 9%;">Brand Name <span style="color:red;">*</span></th>
					<th style="width: 7%;">Batch/ Lot No.<span style="color:red;">*</span></th>
					<th style="width: 7%;">Manufacturer<span style="color:red;">*</span></th>
					<th colspan="2" style="width: 13%;" class="required"
						title="Dosage"
						data-content="">
						<label class="required">DOSE <span style="color:red;">*</span></label>
					</th>
					<th colspan="2" class="required" style="width: 15%;">
						<label class="required">ROUTE AND FREQUENCY <span style="color:red;">*</span></label>
					</th>
					<th style="width: 23%;" colspan="2">
						<h6>Treatment Period <span class="help-block required">	(dd-mm-yyyy) </span></h6>
						<label class="required pull-left">Start Date <span style="color:red;">*</span></label>					
					    <span class="pull-right" style="padding-right: 10px;">Stop Date</span></th>
					<th style="width: 5%;" >
						<label>INDICATION </label>
					</th>
					<th colspan="2" style="width: 8%;" class="required tooltipper"
						title="Drug suspected to cause reaction"
						data-content="At least one option must be selected<br>">
						 <h6 class="required">TICK (&#x2713;)  <br/> SUSPECTED DRUG(S) <span style="color:red;">*</span></h6>
						 <label class="help-block required">(select at least one) </label>
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
					<td>
						<?php
							echo $this->Form->input('SadrListOfDrug.0.batch_no', array(
														'label' => false, 'between' => false,
														'after' => false, 'class' => 'span11',));
						?>
					</td>
					<td>
						<?php
							echo $this->Form->input('SadrListOfDrug.0.manufacturer', array(
														'label' => false, 'between' => false,
														'after' => false, 'class' => 'span11',));
						?>
					</td>
					<td  data-title="Dose *">
						<?php
							echo $this->Form->input('SadrListOfDrug.0.dose', array(
													   'label' => false, 'between' => false,
														'error' => array('attributes' => array( 'class' => 'help-block')),
														'class' => 'span11 autosave-ignore',));
						?>
					</td>
					<td style="border-left:0px;" >
						<?php
							echo $this->Form->input('SadrListOfDrug.0.dose_id', array(
											'empty' => true, 'label' => false, 'between' => false, 'class' => 'span12 autosave-ignore',
											'type' => 'select',
											'error' => array('attributes' => array( 'class' => 'help-block')),
											'options' => $dose,
											));
						?>
					</td>
					<td  data-title="Route *"><?php
							echo $this->Form->input('SadrListOfDrug.0.route_id', array(
											'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
											'type' => 'select',
											'error' => array('attributes' => array( 'class' => 'help-block')),
											'options' => $routes,
											));
						?>
					</td>
					<td  data-title="Frequency *"><?php
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
								'type' => 'text', 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
									'error' => array('attributes' => array( 'class' => 'help-block')),
							));
						?>
					</td>
					<td data-title="Date Stopped (dd-mm-yyyy)">
						<?php
							echo $this->Form->input('SadrListOfDrug.0.stop_date', array(
								'type' => 'text', 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
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
					<td data-title="Add a Drug - "> </td>
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
					<td>
						<?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.batch_no', array(
														'label' => false, 'between' => false,
														'after' => false, 'class' => 'span11',));
						?>
					</td>
					<td>
						<?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.manufacturer', array(
														'label' => false, 'between' => false,
														'after' => false, 'class' => 'span11',));
						?>
					</td>
					<td  data-title="Dose *">
						<?php
							echo $this->Form->input('SadrListOfDrug.'.$i.'.dose', array(
														'label' => false, 'between' => false,
														'error' => array('attributes' => array( 'class' => 'help-block')),
														'class' => 'span11 autosave-ignore',));
						?>
					</td>
					<td style="border-left:0px;">
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
		  <?php

echo $this->Form->input('sample', array(
	// create a hidden input with the same name as the input
	'type' => 'hidden',
	'id' => 'sample',
	'value' => 'dammy',
	'class' => 'autosave-ignore',
));
?>
		</div><!--/span-->
	</div><!--/row-->
	<hr>
