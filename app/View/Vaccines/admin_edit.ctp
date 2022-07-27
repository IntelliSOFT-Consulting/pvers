<?php 
	$this->assign('CMS', 'active');
?>

      <!-- CMS
    ================================================== -->
	<h3>Vaccines <small>(EDIT VACCINE)</small></h3>

<div class="row-fluid" style="margin-bottom: 9px;">	
	<div class="span2 columns">
		<div class="row-fluid">
			<div class="span12">
				  <?php echo $this->element('admin/contentmenu')?>				  
			</div><!--/span-->
		</div><!--/row-->	
	</div> <!-- /span5 -->
	<div class="span10 columns">
		<div class="vaccines form">
		<?php echo $this->Form->create('Vaccine'); ?>
			<fieldset>
				<legend><?php echo __('Edit Vaccine'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('vaccine_name');
				echo $this->Form->input('description');				
				echo $this->Form->input('health_program', array( 'type' => 'select', 'options' => ['Malaria program' => 'Malaria program', 'National Vaccines and immunisation program' => 'National Vaccines and immunisation program', 
					'Neglected tropical diseases program' => 'Neglected tropical diseases program', 'MNCAH Priority Medicines' => 'MNCAH Priority Medicines', 'TB program' => 'TB program', 
					'NASCOP program' => 'NASCOP program', 'Cancer/Oncology program' => 'Cancer/Oncology program'], 'empty' => true,
					'label' => array('class' => 'control-label', 'text' => 'Public Health Program'),
					'class'=>'input-xlarge'));	
			?>
			</fieldset>
			<?php echo $this->Form->end(array(
				'label' => 'Submit',
				'value' => 'Save',
				'class' => 'btn btn-primary',
				'id' => 'VaccineEditSave',  
				'div' => array(
					'class' => 'form-actions',
				)
			));?>
		</div>
	</div>
</div>
