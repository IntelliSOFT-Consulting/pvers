<?php
        echo $this->Session->flash();
        echo $this->Form->create('Transfusion', array(
            'type' => 'file',
            'class' => 'form-horizontal',
            'inputDefaults' => array(
                'div' => array('class' => 'control-group'),
                'label' => array('class' => 'control-label required'),
                'between' => '<div class="controls">',
                'after' => '</div>',
                'class' => '',
                'format' => array('before', 'label', 'between', 'input', 'after','error'),
                'error' => array('attributes' => array( 'class' => 'controls help-block')),
             ),
        ));
    ?>
    <div class="row-fluid">
        <div class="span10 formbackt">

            <?php
                echo $this->Form->input('id', array());
                echo $this->Form->input('Transfusion.report_type', array('type' => 'hidden'));
            ?>
            <p><b>(FOM20/MIP/PMS/SOP/001)</b></p>
            <div class="row-fluid">
                <div class="span12" style="text-align: center;">
                    <?php
                        echo $this->Html->image('coa.png', array('alt' => 'COA'));
                    ?>
                    <h5>MINISTRY OF HEALTH</h5>
                    <h5>PHARMACY AND POISONS BOARD</h5>
                    <h5>P.O. Box 27663-00506 NAIROBI</h5>
                    <h5>Tel: (020)-3562107 Ext 114, 0720 608811, 0733 884411 Fax: (020) 2713431/2713409</h5>
                    <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
                    <h5 style="color: red;">ADVERSE TRANSFUSION REACTION FORM </h5>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span6">
                <p class="controls" id="transfusion_edit_tip"> <span class="label label-important">Tip:</span> Fields marked with <span style="color:red;">*</span> are mandatory</p>
                </div>
                <div class="span6" id="transfusion_edit_form_id">
                  <h5> <?php    echo  'Form ID: '.$this->data['Transfusion']['reference_no']; ?></h5>                  
                </div>
            </div><!--/row-->
            
            <div class="row-fluid">
                <div class="span12">
                    <p style="text-warning">In the event of a severe reaction following transfusion of blood or blood products please complete this form and send it to the laboratory with the specimens listed below.</p>
                </div>
            </div>
            <hr>

            <h4 style="text-align: center; color: #884805;">PATIENT INFORMATION</h4>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('patient_name', array(
                            'label' => array('class' => 'control-label required', 'text' =>  'Patient Name <span style="color:red;">*</span>'),                          
                        ));
                    ?>
                    <div class="well-mine" style="background-color: #f0f099;">
                    <?php
                        echo $this->Form->input('date_of_birth', array('type' => 'text', 'class' => 'date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'DATE OF BIRTH'),));
                    ?>
                    <h5 class="controls">--OR--</h5>
                    <?php
                        echo $this->Form->input('age_years', array('label' => array('class' => 'control-label required', 'text' => 'Age in years'), ));

                    ?>
                    </div>
                   
                </div><!--/span-->
                <div class="span6">
                    <?php                    

                        echo $this->Form->input('gender', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
                            'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">GENDER <span style="color:red;">*</span></label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="TransfusionGender_" name="data[Transfusion][gender]"> <label class="radio inline">',
                            'after' => '</label>',
                            'options' => array('Male' => 'Male'),
                        ));

                        echo $this->Form->input('gender', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
                            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio inline">',
                            'after' => '</label> <label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.gender, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
                                        <em class="accordion-toggle">clear!</em></a> </label>
                                        </div> </div>',
                            'options' => array('Female' => 'Female'),
                        ));
                        echo $this->Form->input('patient_phone', array(
                            'label' => array('class' => 'control-label required', 'text' =>  'Patient No.'),                          
                        ));

                    ?>
                </div><!--/span-->
            </div><!--/row-->
                <hr>

            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('diagnosis', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Diagnosis'),
                            'after'=>'<p class="help-block">  </p></div>',
                        ));
                        echo $this->Form->input('ward', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Ward'),
                        ));
                        echo $this->Form->input('pre_hb', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Pre-transfusion HB'),
                        ));
                        echo $this->Form->input('transfusion_reason', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Reason for transfusion'),
                        ));
                        echo $this->Form->input('current_medications', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Current Medications'),
                        ));
                    ?>
                </div>
                <div class="span6">
                    <?php
                        echo $this->Form->input('obstetric_history', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Obstetric History'),
                            'after'=>'<p class="help-block"> (N/A, Gravid.., Para...)) </p></div>',
                        ));
                        
                        echo $this->Form->input('previous_transfusion', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'previous_transfusion',
                            'before' => '<div class="control-group">  <div>  <label class="control-label required">Previous Transfusion</label> </div>
                                            <div class="controls"> <input type="hidden" value="" id="DeviceKnownAllergy_" name="data[Transfusion][previous_transfusion]"> <label class="radio inline">',
                            'after' => '</label>',
                            'options' => array('Yes' => 'Yes'),
                            'onclick' => '$("#TransfusionTransfusionComment").removeAttr("disabled")',
                        ));
                        echo $this->Form->input('previous_transfusion', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'previous_transfusion',
                            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio inline">',
                            'after' => '</label> <a class="button"
                                        onclick="$(\'.previous_transfusion\').removeAttr(\'checked\'); $(\'#TransfusionTransfusionComment\').attr(\'disabled\',\'disabled\');" >
                                        <em class="accordion-toggle">clear!</em></a>  </div> </div>',
                            'options' => array('No' => 'No'),
                            'onclick' => '$("#TransfusionTransfusionComment").attr("disabled","disabled")',
                        ));

                        echo $this->Form->input('transfusion_comment', array(
                                                    'label' => array('class' => 'control-label', 'text' => 'Comment'),
                                                    'rows' => 1, 'label' => false, 'disabled' => true, 'placeholder' => 'Comment',
                                                ));
                        
                        echo $this->Form->input('previous_reactions', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'previous_reactions',
                            'before' => '<div class="control-group">  <div>  <label class="control-label required">Previous Reactions</label> </div>
                                            <div class="controls"> <input type="hidden" value="" id="DeviceKnownAllergy_" name="data[Transfusion][previous_reactions]"> <label class="radio inline">',
                            'after' => '</label>',
                            'options' => array('Yes' => 'Yes'),
                            'onclick' => '$("#TransfusionReactionComment").removeAttr("disabled")',
                        ));
                        echo $this->Form->input('previous_reactions', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'previous_reactions',
                            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio inline">',
                            'after' => '</label> <a class="button"
                                        onclick="$(\'.previous_reactions\').removeAttr(\'checked\'); $(\'#TransfusionReactionComment\').attr(\'disabled\',\'disabled\');" >
                                        <em class="accordion-toggle">clear!</em></a>  </div> </div>',
                            'options' => array('No' => 'No'),
                            'onclick' => '$("#TransfusionReactionComment").attr("disabled","disabled")',
                        ));

                        echo $this->Form->input('reaction_comment', array(
                                                    'label' => array('class' => 'control-label', 'text' => 'Comment'),
                                                    'rows' => 1, 'label' => false, 'disabled' => true, 'placeholder' => 'Comment',
                                                ));
                    ?>
                </div>
            </div>
            <hr>

            <h4 style="text-align: center; color: #884805;">REACTION INFORMATION</h4>
            <div class="row-fluid">
                <div class="span6">
                    <div style="padding-left: 15px;">
                    <div class="required"><label class="required"><strong>Type of reaction</strong></label></div> 
                    <?php
                        echo $this->Form->input('reaction_general', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_general',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            General</label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][reaction_general]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Fever' => 'Fever'),
                        )); 
                        echo $this->Form->input('reaction_general', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_general',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Chills/Rigors' => 'Chills/Rigors')
                        )); 
                        echo $this->Form->input('reaction_general', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_general',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Flushing' => 'Flushing')
                        ));
                        echo $this->Form->input('reaction_general', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reaction_general',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.reaction_general\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Nausea/ Vomiting' => 'Nausea/ Vomiting'),
                        ));

                        echo $this->Form->input('reaction_dermatological', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_dermatological',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Dermatological</label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionDermatological_" name="data[Transfusion][reaction_dermatological]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Urticaria' => 'Urticaria'),
                        )); 
                        echo $this->Form->input('reaction_dermatological', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reaction_dermatological',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.reaction_dermatological\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Other skin rash' => 'Other skin rash'),
                        ));

                        echo $this->Form->input('reaction_cardiac', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_cardiac',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Cardiac/Respiratory</label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][reaction_cardiac]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Chest pain' => 'Chest pain'),
                        )); 
                        echo $this->Form->input('reaction_cardiac', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_cardiac',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Dyspnoea' => 'Dyspnoea')
                        )); 
                        echo $this->Form->input('reaction_cardiac', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_cardiac',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Hypotension' => 'Hypotension')
                        ));
                        echo $this->Form->input('reaction_cardiac', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reaction_cardiac',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.reaction_cardiac\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Tachycardia' => 'Tachycardia'),
                        ));
                    ?>
                    </div>
                </div>
                <div class="span6">
                    <?php
                        echo $this->Form->input('reaction_renal', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_renal',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Renal </label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][reaction_renal]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Haemoglobinuria- Dark urine' => 'Haemoglobinuria- Dark urine'),
                        )); 
                        echo $this->Form->input('reaction_renal', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_renal',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Oliguria' => 'Oliguria')
                        ));
                        echo $this->Form->input('reaction_renal', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reaction_renal',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.reaction_renal\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Anuria' => 'Anuria'),
                        ));

                        echo $this->Form->input('reaction_haematological', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_haematological',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Haematological </label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][reaction_haematological]"> <label class="radio inline">',
                          'after' => '</label>
                            <span class="help-inline" style="padding-top: 5px;"><a  onclick="$(\'.reaction_haematological\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span></div> </div>',
                          'options' => array('Unexplained bleeding' => 'Unexplained bleeding'),
                        )); 

                        echo $this->Form->input('reaction_other', array(
                            'rows' => 2, 'label' => array('class' => 'control-label required', 'text' => 'Others (Specify)'),
                        ));
                    ?>
                </div>
            </div>
            <hr>

            <h5 style="text-align: center;">Vital Signs</h5>
            <div class="row-fluid">
                <div class="span4">
                    <div class="controls"><label> At Start </label></div>
                    <?php
                        echo $this->Form->input('vital_start_bp', array(
                            'label' => array('class' => 'control-label required', 'text' => 'BP'),
                        ));
                        echo $this->Form->input('vital_start_t', array(
                            'label' => array('class' => 'control-label required', 'text' => 'T'),
                        ));
                        echo $this->Form->input('vital_start_p', array(
                            'label' => array('class' => 'control-label required', 'text' => 'P'),
                        ));
                        echo $this->Form->input('vital_start_r', array(
                            'label' => array('class' => 'control-label required', 'text' => 'R'),
                        ));
                    ?>
                </div>
                <div class="span4">
                    <div class="controls"><label> During (15min) </label></div>
                    <?php
                        echo $this->Form->input('vital_during_bp', array(
                            'label' => array('class' => 'control-label required', 'text' => 'BP'),
                        ));
                        echo $this->Form->input('vital_during_t', array(
                            'label' => array('class' => 'control-label required', 'text' => 'T'),
                        ));
                        echo $this->Form->input('vital_during_p', array(
                            'label' => array('class' => 'control-label required', 'text' => 'P'),
                        ));
                        echo $this->Form->input('vital_during_r', array(
                            'label' => array('class' => 'control-label required', 'text' => 'R'),
                        ));
                    ?>
                </div>
                <div class="span4">
                    <div class="controls"><label> At Stop </label></div>
                    <?php
                        echo $this->Form->input('vital_stop_bp', array(
                            'class' => 'span10', 'label' => array('class' => 'control-label required', 'text' => 'BP'),
                        ));
                        echo $this->Form->input('vital_stop_t', array(
                            'class' => 'span10', 'label' => array('class' => 'control-label required', 'text' => 'T'),
                        ));
                        echo $this->Form->input('vital_stop_p', array(
                            'class' => 'span10', 'label' => array('class' => 'control-label required', 'text' => 'P'),
                        ));
                        echo $this->Form->input('vital_stop_r', array(
                            'class' => 'span10', 'label' => array('class' => 'control-label required', 'text' => 'R'),
                        ));
                    ?>
                </div>
            </div>
            <hr>

            <!-- <h4 style="text-align: center;  color: #884805;">COMPONENT INFORMATION</h4> -->
            <?php echo $this->element('multi/list_of_pints');?>

            <div class="row-fluid">
                <div class="span12">
                    <?php                        
                        echo $this->Form->input('nurse_name', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Name of Nurse/Doctor'),
                        ));
                    ?>
                    <h5>Specimens required by the laboratory </h5>
                    <ol>
                        <li>10mls post-transfusion whole blood from patient from plain bottle </li>
                        <li>2mls of blood in EDTA bottle </li>
                        <li>10mls First Void Urine </li>
                        <li>The blood that reacted together with the attached transfusion set </li>
                        <li>All empty blood bags of already transfused unit </li>
                    </ol>
                </div>
            </div>
            <hr>

            
            <div class="row-fluid">
                <div class="span12">
                    <h4 style="text-decoration: underline; color: #884805; text-align: center;">LAB INVESTIGATION: (Transfusion manager)</h4>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                <?php
                    echo "<h4 class='controls'>Recipient’s blood supernatant:</h4>";
                    echo $this->Form->input('lab_hemolysis', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'lab_hemolysis',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Hemolysis </label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][lab_hemolysis]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Present' => 'Present'),
                        )); 
                    echo $this->Form->input('lab_hemolysis', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'lab_hemolysis',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Absent' => 'Absent')
                        ));
                    echo $this->Form->input('lab_hemolysis', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'lab_hemolysis',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.lab_hemolysis,.lab_hemolysis_present\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>
                                </div> </div>',
                          'options' => array('Equivocal' => 'Equivocal'),
                        ));

                    echo $this->Form->input('lab_hemolysis_present', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'lab_hemolysis_present',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            If present </label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][lab_hemolysis_present]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Mild' => 'Mild'),
                        )); 
                    echo $this->Form->input('lab_hemolysis_present', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'lab_hemolysis_present',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Moderate' => 'Moderate')
                        ));
                    echo $this->Form->input('lab_hemolysis_present', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'lab_hemolysis_present',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.lab_hemolysis_present\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>
                                </div> </div>',
                          'options' => array('Marked' => 'Marked'),
                        ));

                    echo "<h4 class='controls'>Recipient’s blood:</h4>";
                    echo $this->Form->input('recipient_blood', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'recipient_blood',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Agglutination </label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][recipient_blood]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Present' => 'Present'),
                        ));
                    echo $this->Form->input('recipient_blood', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'recipient_blood',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.recipient_blood\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>
                                </div> </div>',
                          'options' => array('Absent' => 'Absent'),
                        ));
                ?>
                    <div class="row-fluid">
                      <div class="span6">
                        <?php
                            echo "<h4 class='controls'>Haematological results:</h4>";
                            echo $this->Form->input('hae_wbc', array(
                                'label' => array('class' => 'control-label', 'text' => 'WBC'),
                            ));
                            echo $this->Form->input('hae_hb', array(
                                'label' => array('class' => 'control-label', 'text' => 'HB'),
                            ));
                            echo $this->Form->input('hae_rbc', array(
                                'label' => array('class' => 'control-label', 'text' => 'RBC'),
                            ));
                            echo $this->Form->input('hae_hct', array(
                                'label' => array('class' => 'control-label', 'text' => 'HCT'),
                            ));
                            echo $this->Form->input('hae_mcv', array(
                                'label' => array('class' => 'control-label', 'text' => 'MCV'),
                            ));
                            echo $this->Form->input('hae_mch', array(
                                'label' => array('class' => 'control-label', 'text' => 'MCH'),
                            ));
                            echo $this->Form->input('hae_mchc', array(
                                'label' => array('class' => 'control-label', 'text' => 'MCHC'),
                            ));
                            echo $this->Form->input('hae_plt', array(
                                'label' => array('class' => 'control-label', 'text' => 'PLT'),
                            ));
                        ?>
                      </div>
                      <div class="span6">
                        <?php
                            
                            echo "<h4 class='controls'>Film</h4>";
                            echo $this->Form->input('film_rbc', array(
                                'class' => 'span12', 'label' => array('class' => 'control-label', 'text' => 'RBC'),
                            ));
                            echo $this->Form->input('film_wbc', array(
                                'class' => 'span12', 'label' => array('class' => 'control-label', 'text' => 'WBC'),
                            ));
                            echo $this->Form->input('film_plt', array(
                               'class' => 'span12', 'label' => array('class' => 'control-label', 'text' => 'PLT'),
                            ));
                        ?>
                      </div>
                    </div>
                </div>
                <div class="span6">
                    <?php
                    echo "<h4 class='controls'>Donor blood supernatant:</h4>";
                    echo $this->Form->input('donor_hemolysis', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'donor_hemolysis',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Agglutination </label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][donor_hemolysis]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Present' => 'Present'),
                        ));
                    echo $this->Form->input('donor_hemolysis', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'donor_hemolysis',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.donor_hemolysis\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>
                                </div> </div>',
                          'options' => array('Absent' => 'Absent'),
                        ));
                    echo $this->Form->input('donor_age', array(
                        'label' => array('class' => 'control-label required', 'text' => 'Age of donor pack'), 
                    ));
                    echo $this->Form->input('culture_donor_pack', array(
                        'label' => array('class' => 'control-label required', 'text' => 'Culture donor pack'), 'placeholder' => 'Results'
                    ));
                    echo $this->Form->input('culture_recipient_blood', array(
                        'label' => array('class' => 'control-label required', 'text' => 'Culture recipient blood'), 'placeholder' => 'Results'
                    ));
                    ?>
                </div>            
            </div>
            <hr>

            <p style="padding-left: 15px;">8. Compatibility testing recipient serum (pretransfusion sample) and donor cells (pack) </p>
            <div class="row-fluid">
                <div class="span4">
                    <h4 class="required controls">Compatible</h4>
                    <?php
                        echo $this->Form->input('compatible_saline_rt', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'compatible_saline_rt',
                            'before' => '<div class="control-group"><label class="control-label required">Saline Rt</label><label class="radio controls">',    
                            'after' => '</label></div>',
                            'options' => array('Compatible' => ''),
                        ));
                        echo $this->Form->input('compatible_saline_ii', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'compatible_saline_ii',
                            'before' => '<div class="control-group"><label class="control-label required">Saline 37</label><label class="radio controls">',    
                            'after' => '</label></div>',
                            'options' => array('Compatible' => ''),
                        ));
                        echo $this->Form->input('compatible_ahg', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'compatible_ahg',
                            'before' => '<div class="control-group"><label class="control-label required">AHG</label><label class="radio controls">',    
                            'after' => '</label></div>',
                            'options' => array('Compatible' => ''),
                        ));
                        echo $this->Form->input('compatible_albumin', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'compatible_albumin',
                            'before' => '<div class="control-group"><label class="control-label required">Albumin 37</label><label class="radio controls">',    
                            'after' => '</label></div>',
                            'options' => array('Compatible' => ''),
                        ));
                    ?>
                </div>
                <div class="span4">
                    <h4 class="required controls">Incompatible</h4>
                    <?php
                        echo $this->Form->input('compatible_saline_rt', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'compatible_saline_rt',
                            'before' => '<div class="control-group"><label class="radio controls">',    
                            'after' => '</label></div>',
                            'options' => array('Incompatible' => ''),
                        ));
                        echo $this->Form->input('compatible_saline_ii', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'compatible_saline_ii',
                            'before' => '<div class="control-group"><label class="radio controls" style="padding-top: 3px;">',    
                            'after' => '</label></div>',
                            'options' => array('Incompatible' => ''),
                        ));
                        echo $this->Form->input('compatible_ahg', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'compatible_ahg',
                            'before' => '<div class="control-group"><label class="radio controls" style="padding-top: 3px;">',    
                            'after' => '</label></div>',
                            'options' => array('Incompatible' => ''),
                        ));
                        echo $this->Form->input('compatible_albumin', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'compatible_albumin',
                            'before' => '<div class="control-group"><label class="radio controls" style="padding-top: 3px;">',    
                            'after' => '</label></div>',
                            'options' => array('Incompatible' => ''),
                        ));
                    ?>
                </div>  
                <div class="span4">
                    <?php
                        echo '<div class="control-group"><span class="help-inline" style="padding-top: 15px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.compatible_saline_rt\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span></div>';
                        echo '<div class="control-group"><span class="help-inline" style="padding-top: 15px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.compatible_saline_ii\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span></div>';
                        echo '<div class="control-group"><span class="help-inline" style="padding-top: 15px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.compatible_ahg\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span></div>';
                        echo '<div class="control-group"><span class="help-inline" style="padding-top: 15px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.compatible_albumin\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span></div>';
                    ?>
                </div>            
            </div>
            <hr>

            <div class="row-fluid">
                <div class="span6">
                    <?php 
                        echo '<label class="required" style="padding-left: 15px;">If negative (inconclusive results in 8) set up compatibility with enzyme treated cells </label>';          
                        echo $this->Form->input('negative_result', array(
                            'rows' => 2, 'label' => array('class' => 'control-label required', 'text' => 'Result'), 'placeholder' => 'Result'
                        ));

                        echo '<label class="required" style="padding-left: 15px;">In case of blood group O transfused to A or B or AB individual: Establish from the donor unit </label>';
                        echo $this->Form->input('anti_a', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Anti A titres')
                        ));
                        echo $this->Form->input('anti_b', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Anti B titres')
                        ));
                    ?>
                </div>

                <div class="span6">
                    <?php 
                        echo $this->Form->input('urinalysis', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Urinalysis')
                        ));
                        echo $this->Form->input('evaluation', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Evaluation'), 'placeholder' => 'Diagnosis'
                        ));

                        echo $this->Form->input('adverse_reaction', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'adverse_reaction',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Was the adverse reaction related to transfusion?  </label>  <div class="controls">
                            <input type="hidden" value="" id="TransfusionReactionGeneral_" name="data[Transfusion][adverse_reaction]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Yes' => 'Yes'),
                        )); 
                        echo $this->Form->input('adverse_reaction', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'adverse_reaction',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('No' => 'No')
                        )); 
                        echo $this->Form->input('adverse_reaction', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'adverse_reaction',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.adverse_reaction\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Inconclusive' => 'Inconclusive'),
                        ));
                    ?>
                </div>
            </div>
            <hr>


            
            <?php echo $this->element('multi/attachments', ['model' => 'Transfusion', 'group' => 'attachment']); ?>

            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('reporter_name', array(
                            'div' => array('class' => 'control-group required'),
                            'label' => array('class' => 'control-label required', 'text' => 'Name of Initial reporter <span style="color:red;">*</span>'),
                        ));
                        echo $this->Form->input('reporter_email', array(
                            'type' => 'email',
                            'div' => array('class' => 'control-group required'),
                            'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>')
                        ));
                        
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('designation_id',
                                array('label' => array('class' => 'control-label required', 'text' => 'Cadre/designation '.' <span style="color:red;">*</span>'), 'empty'=>true ));
                        echo $this->Form->input('reporter_phone', array(
                            'div' => array('class' => 'control-group'),
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
                        ));
                        
                        echo $this->Form->input('reporter_date', array(
                            'type' => 'text', 'class' => 'date-pick-field',
                            'label' => array('class' => 'control-label required', 'text' => 'Date of report'),
                        ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
            <table class="table table-bordered  table-condensed table-pvborderless">
                <tbody>
                  <tr>
                    <td width="45%"><h5 class="pull-right text-success">Is the person submitting different from reporter?&nbsp;</h5></td>
                    <td>
                        <?php
                                echo $this->Form->input('person_submitting', array(
                                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'person-submit',
                                    'before' => '<div class="form-inline">
                                                <input type="hidden" value="" id="TransfusionPersonSubmitting_" name="data[Transfusion][person_submitting]">
                                                <label class="radio">',
                                    'after' => '</label>&nbsp;&nbsp;',
                                    'options' => array('Yes' => 'Yes'),
                                ));
                                echo $this->Form->input('person_submitting', array(
                                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'person-submit',
                                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                    'before' => '<label class="radio">', 'after' => '</label> </div>',
                                    'options' => array('No' => 'No'),
                                ));
                        ?>
                    </td>
                    </tr>
                </tbody>
            </table>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('reporter_name_diff', array(
                            'div' => array('class' => 'control-group required'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'Name <span style="color:red;">*</span>'),
                        ));
                        echo $this->Form->input('reporter_email_diff', array(
                            'type' => 'email',
                            'div' => array('class' => 'control-group required'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>')
                        ));
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('reporter_designation_diff', array(
                            'type' => 'select', 'options' => $designations, 'empty' => true, 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'Cadre/designation '.' <span style="color:red;">*</span>'), 'empty'=>true ));
                        echo $this->Form->input('reporter_phone_diff', array(
                            'div' => array('class' => 'control-group'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
                        ));                        
                        echo $this->Form->input('reporter_date_diff', array(
                            'type' => 'text', 'class' => 'date-pick-field', 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'Date of Submission'),
                        ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->

        </div>
        <div class="span2">
            <div class="my-sidebar" data-spy="affix" >
                <div class="awell">
                    <?php
                      echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(
                          'name' => 'saveChanges',
                          'class' => 'btn btn-success mapop',
                          'formnovalidate' => 'formnovalidate',
                          'id' => 'SadrSaveChanges', 'title'=>'Save & continue editing',
                          'data-content' => 'Save changes to form without submitting it.
                                                      The form will still be available for further editing.',
                          'div' => false,
                        ));
                    ?>
                    <br>
                    <hr>
                    <?php
                      echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit', array(
                          'name' => 'submitReport',
                          'onclick'=>"return confirm('Are you sure you wish to submit the protocol review report?');",
                          'class' => 'btn btn-primary btn-block mapop',
                          'id' => 'SiteInspectionSubmitReport', 'title'=>'Save and Submit Report',
                          'data-content' => 'Submit report for peer review and approval.',
                          'div' => false,
                        ));

                    ?>
                    <br>
                    <hr>
                    <?php
                        echo $this->Html->link('<i class="fa fa-times" aria-hidden="true"></i> Cancel', array('controller' => 'users', 'action' => 'dashboard'),
                              array('escape' => false, 'class' => 'btn btn-danger btn-block'));  

                    ?>
                   </div>
                </div>
            </div>
    </div>  

    <?php
        echo $this->Form->end();
    ?>