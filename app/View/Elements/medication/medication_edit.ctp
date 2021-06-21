<?php
        echo $this->Session->flash();
        echo $this->Form->create('Medication', array(
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
        <div class="span10 formbackm">
            <?php
                echo $this->Form->input('id', array());
                echo $this->Form->input('Medication.report_type', array('type' => 'hidden'));                    
                echo $this->Form->input('Medication.reference_no', array('type' => 'hidden'));
            ?>
            <p><b>(FOM21/MIP/PMS/SOP/001)</b></p>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                        echo $this->Html->image('confidence.png', array('alt' => 'in confidence', 'class' => 'pull-right'));
                        echo $this->Html->image('coa.png', array('alt' => 'COA', 'style' => 'margin-left: 45%;'));
                   ?>
                   <div class="babayao" style="text-align: center;">
                        <h4>MINISTRY OF HEALTH</h4>
                        <h5>PHARMACY AND POISONS BOARD</h5>
                        <h5>P.O. Box 27663-00506 NAIROBI</h5>
                        <h5>Tel: +254 709 770 100/+254 709 770 xxx (Replace xxx with extension)</h5>
                        <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
                        <h5 style="color: red;">MEDICATION ERROR REPORTING FORM </h5>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span6">
                <p class="controls" id="medication_edit_tip"> <span class="label label-important">Tip:</span> Fields marked with <span style="color:red;">*</span> are mandatory</p>
                </div>
                <div class="span6" id="medication_edit_form_id">
                  <h5> <?php    echo  'Form ID: '.$this->data['Medication']['reference_no']; ?></h5>                  
                </div>
            </div><!--/row-->

            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('date_of_event', array(
                            'type' => 'text',  'class' => 'date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of Event <span style="color:red;">*</span>'),
                            'placeholder' => 'Date of event' , 
                        ));
                    ?>
                </div>
                <div class="span6">
                    <?php
                        echo $this->Form->input('time_of_event', array('type' => 'time', 'timeFormat' => 24, 'interval' => 5, 'class' => 'span4', 'style' => 'display: inline;', 
                            'label' => array('class' => 'control-label required', 'text' => 'Time of Event'),
                            'after' => '<p class="help-block"> 24hr:min </p></div>'
                            )
                        );
                    ?>

                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span6">
                    
                    <?php

                        echo $this->Form->input('name_of_institution', array(
                            'label' => array('class' => 'control-label required', 'text' => 'NAME OF INSTITUTION/ ORGANZIATION <span style="color:red;">*</span>'),
                            'placeholder' => 'Name of Institution' ,
                        ));

                        echo $this->Form->input('institution_contact', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Contact/Tel No.'),
                            'placeholder' => 'Address' ,
                        ));
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php

                        echo $this->Form->input('institution_code', array(
                            'label' => array('class' => 'control-label required', 'text' => 'INSTITUTION CODE'),
                            'placeholder' => 'MFL CODE' ,
                        ));

                        echo $this->Form->input('county_id', array(
                                    'label' => array('class' => 'control-label required',
                                    'text' => 'COUNTY <span style="color:red;">*</span>'),
                                    'empty' => true, 'between' => '<div class="controls ui-widget">',
                                ));

                    ?>
                </div><!--/span-->
            </div><!--/row-->
             <hr>

            <h4 style="text-align: center; color: #884805;">PATIENT INFORMATION</h4>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('patient_name', array(
                            'label' => array('class' => 'control-label required', 'text' =>  'Patient Initials <span style="color:red;">*</span>'),                          
                        ));
                    ?>
                    <div class="well-mine" style="background-color: #B4DDF6;">
                    <?php
                        echo $this->Form->input('date_of_birth', array('type' => 'text', 'class' => 'date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'DATE OF BIRTH'),));
                    ?>
                    <h5 class="controls"> <span style="color:red;">*</span>--OR--</h5>
                    <?php
                        // echo $this->Form->input('age_years', array('label' => array('class' => 'control-label required', 'text' => 'Age in years'), ));
                        echo $this->Form->input('age_years', array(
                            'type' => 'select',
                            'empty' => true,
                            'options' => array(
                                                'neonate'=>'neonate',
                                                'infant' => 'infant',
                                                'child' => 'child',
                                                'adolescent' => 'adolescent',
                                                'adult' => 'adult',
                                                'elderly' => 'elderly',
                                                ),
                            'label' => array('class' => 'control-label required', 'text' => 'Age group'),
                        ));

                    ?>
                    </div>
                   
                </div><!--/span-->
                <div class="span6">
                    <?php                    

                        echo $this->Form->input('gender', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
                            'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">GENDER <span style="color:red;">*</span></label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="MedicationGender_" name="data[Medication][gender]"> <label class="radio inline">',
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


                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<div class="control-group"> <label class="control-label">PREGNANCY STATUS</label>
                                            <div class="controls" id="pregnancy_stati">  <input type="hidden" value="" id="DevicePregnancyStatus_" name="data[Device][pregnancy_status]"> <label class="radio inline">',
                            'after' => '</label>',
                            // 'onclick' => '$(\'#pstati\').show();',
                            'options' => array('Not Applicable' => 'Not Applicable'),
                        ));
                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<label class="radio inline">', 'after' => '</label>',
                            // 'onclick' => '$(\'#pstati\').hide(); $(\'#pstati input:radio\').removeAttr(\'checked\');',
                            'options' => array('Not pregnant' => 'Not pregnant'),
                        ));
                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<br><div><label class="radio inline">',    'after' => '</label>',
                            'options' => array('1st Trimester' => '1st Trimester'),
                        ));
                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<label class="radio inline">', 'after' => '</label>',
                            'options' => array('2nd Trimester' => '2nd Trimester'),
                        ));
                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<label class="radio inline">',
                            'after' => '</label> <label>
                            <a class="button"
                                        onclick="$(\'.pregnancy_status\').removeAttr(\'checked\')" >
                                        <em class="accordion-toggle">clear!</em></a> </label>
                            </div> </div> </div>',
                            'options' => array('3rd Trimester' => '3rd Trimester'),
                        ));

                    ?>
                </div><!--/span-->
            </div><!--/row-->
            <hr>
             <h4 style="text-align: center; color: #884805;">Location of event</h4>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('ward', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Ward'),
                            'after'=>'<p class="help-block"> (Specify: medical, paeds, ortho)  </p></div>',
                        ));
                        echo $this->Form->input('pharmacy', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Pharmacy'),
                            'after'=>'<p class="help-block"> (paeds, main, inpatient, outpatient)   </p></div>',
                        ));
                        echo $this->Form->input('location_other', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Others'),
                            'after'=>'<p class="help-block"> (Please specify)   </p></div>',
                        ));
                    ?>
                </div>
                <div class="span6">
                    <?php
                        echo $this->Form->input('clinic', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Clinic'),
                            'after'=>'<p class="help-block"> (Specify: outpatient, dental, specialist)   </p></div>',
                        ));
                        echo $this->Form->input('accident', array(
                            'label' => array('class' => 'control-label required', 'text' => 'Accident & Emergency/Casualty'),
                            'after'=>'<p class="help-block"> Accident & Emergency/Casualty </p></div>',
                        ));
                    ?>
                </div>
            </div>
            <hr>

            <div class="row-fluid">
                <div class="span12">
                    <div style="padding-left: 10px;">                        
                        <?php
                            echo $this->Form->input('description_of_error', array(
                                'rows' => '3',
                                'label' => array('class' => 'required', 'text' => 'Please describe the error. Include description/ sequence of events and work environment (e.g. change of shift, short staffing, during peak hours). <span style="color:red;">*</span>'),
                                'between' => false, 'div' => false,
                                'after'=>'<p class="help-block">     </p>',
                                'class' => 'span11',

                            ));
                        ?>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row-fluid">
                <div class="span4">
                    <div style="padding-left: 15px;">
                    <div class="required"><label class="required"><strong>In which process did the error occur? </strong><span style="color:red;">*</span></label></div> 
                    <?php
                        echo $this->Form->input('process_occur', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'process_occur',
                            'before' => '<div class="control-group"> <input type="hidden" value="" id="MedicationProcessOccur_" name="data[Medication][process_occur]"> <label class="radio">',
                            'after' => '</label>',
                            'options' => array('Prescribing' => 'Prescribing'),
                        ));
                        echo $this->Form->input('process_occur', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'process_occur',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Dispensing (includes filling)' => 'Dispensing (includes filling)'),
                        ));
                        echo $this->Form->input('process_occur', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'process_occur',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Administration' => 'Administration'),
                        ));
                        echo $this->Form->input('process_occur', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'process_occur',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Transcribing' => 'Transcribing'),
                        ));
                        echo $this->Form->input('process_occur', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'process_occur',
                            'format' => array('before', 'label', 'between', 'input','error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio">',
                            'after' => '</label>
                                <a class="button"
                                        onclick="$(\'.process_occur\').removeAttr(\'checked\');" >
                                        <em class="accordion-toggle">clear!</em></a>
                            </div>',
                            'options' => array('Others' => 'Others'),
                        ));

                        echo $this->Form->input('process_occur_specify', array(
                            'label' => false, 'div' => false, 'before' => false, 'after' => false, 'between' => false, 'placeholder' => '(Specify)',
                        ));
                    ?>
                    </div>
                </div>
                <div class="span4">
                    <?php
                        echo "<label class='required'>Did the error reach the patient?  <span style='color:red;'>*</span></label>";
                        echo $this->Form->input('reach_patient', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reach_patient',
                         'before' => '<div class="control-group"> 
                                         <div class="">  <input type="hidden" value="" id="ProblemNoted_" name="data[Medication][reach_patient]"> <label class="radio inline">',
                         'after' => '</label>',
                         'options' => array('Yes' => 'Yes'),
                        ));
                        echo $this->Form->input('reach_patient', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reach_patient',
                         'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                         'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                         'before' => '<label class="radio inline">',
                         'after' => '</label> 
                                     <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                                     onclick="$(\'.reach_patient\').removeAttr(\'checked disabled\')">
                                     <em class="accordion-toggle">clear!</em></a> </span>
                                     </div> </div>',
                         'options' => array('No' => 'No'),
                        ));

                        /*echo "<label class='required'>Was the correct medication, dose or dosage form administered to or taken by the patient? <span style='color:red;'>*</span></label>";
                        echo $this->Form->input('correct_medication', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'correct_medication',
                         'before' => '<div class="control-group"> 
                                         <div class="">  <input type="hidden" value="" id="ProblemNoted_" name="data[Medication][correct_medication]"> <label class="radio inline">',
                         'after' => '</label>',
                         'options' => array('Yes' => 'Yes'),
                        ));
                        echo $this->Form->input('correct_medication', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'correct_medication',
                         'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                         'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                         'before' => '<label class="radio inline">',
                         'after' => '</label> 
                                     <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                                     onclick="$(\'.correct_medication\').removeAttr(\'checked disabled\')">
                                     <em class="accordion-toggle">clear!</em></a> </span>
                                     </div> </div>',
                         'options' => array('No' => 'No'),
                        ));*/
                    ?>
                </div>
                <div class="span4">
                    <div style="padding-left: 10px;">                        
                        <?php
                            echo $this->Form->input('direct_result', array(
                                'rows' => '3',
                                'label' => array('class' => 'required', 'text' => 'Describe the direct result on the patient (e.g. death, type of harm, additional patient monitoring e.g. BP, heart rate, glucose level etc)'),
                                'between' => false, 'div' => false,
                                'after'=>'<p class="help-block">     </p>',
                                'class' => 'span11',

                            ));
                        ?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <h4 class="controls" style="text-decoration: underline;">Please tick the appropriate Error Outcome Category (Tick one appropriate box below):</h4>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <div style="padding-left: 15px;">
                    <?php
                        echo "<h4>NO ERROR</h4>";
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Potential error, circumstances/events have potential to cause incident' => 'Potential error, circumstances/events have potential to cause incident'),
                        ));
                    ?>
                    </div>
                </div>
                <div class="span6">
                    <?php
                        echo "<h4>ERROR, HARM</h4>";
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Treatment /intervention required-caused temporary harm' => 'Treatment /intervention required-caused temporary harm'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Initial/prolonged hospitalization-caused temporary harm' => 'Initial/prolonged hospitalization-caused temporary harm'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Caused permanent harm' => 'Caused permanent harm'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Near death event' => 'Near death event'),
                        ));
                    ?>
                </div>                    
            </div><!--/row-->

            <hr style="border: 1px solid #cbe5ea;">
            <div class="row-fluid">
                <div class="span6">   
                    <div style="padding-left: 15px;">                 
                    <?php                        
                        echo "<h4>ERROR, NO HARM</h4>";
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Actual error-did not reach patient' => 'Actual error-did not reach patient'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Actual error-caused no harm' => 'Actual error-caused no harm'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Additional monitoring required-caused no harm' => 'Additional monitoring required-caused no harm'),
                        ));
                    ?>
                    </div>
                </div>
                <div class="span6">
                    <?php
                        echo "<h4>ERROR, DEATH</h4>";
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Death' => 'Death'),
                        ));
                    ?>
                </div>
            </div>
             <hr>
            
            <div class="row-fluid">
                <div class="span12">
                    <h4 class="controls" style="text-decoration: underline;">Indicate the possible error cause(s) and contributing factor(s) below (Tick the appropriate box(es):</h4>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <div style="padding-left: 15px;">
                <?php
                    echo "<h4>Staff factors</h4>";
                    echo $this->Form->input('error_cause_inexperience', array(
                            'type' => 'checkbox',  'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_inexperience_" name="data[Medication][error_cause_inexperience]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Inexperienced personnel </label>',));
                    echo $this->Form->input('error_cause_knowledge', array(
                            'type' => 'checkbox',  'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_knowledge_" name="data[Medication][error_cause_knowledge]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Inadequate knowledge </label>',));
                    echo $this->Form->input('error_cause_distraction', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_distraction_" name="data[Medication][error_cause_distraction]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Distraction </label>',));
                    echo "<h4>Medication related</h4>";                    
                    echo $this->Form->input('error_cause_sound', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_sound_" name="data[Medication][error_cause_sound]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Sound alike medication </label>',));
                    echo $this->Form->input('error_cause_medication', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_medication_" name="data[Medication][error_cause_medication]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Look alike medication </label>',));
                    echo $this->Form->input('error_cause_packaging', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_packaging_" name="data[Medication][error_cause_packaging]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Look alike packaging </label>',));
                    echo "<h4>Work and environment</h4>";    
                    echo $this->Form->input('error_cause_workload', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_workload" name="data[Medication][error_cause_workload]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Heavy workload </label>',));
                    echo $this->Form->input('error_cause_peak', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_peak_" name="data[Medication][error_cause_peak]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Peak hour </label>',));
                    echo $this->Form->input('error_cause_stock', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_stock_" name="data[Medication][error_cause_stock]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Stock arrangements/storage problem </label>',));
                ?>
                    </div>
                </div>
                <div class="span6">
                    <?php
                        echo "<h4>Task and technology</h4>";            
                        echo $this->Form->input('error_cause_procedure', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_procedure_" name="data[Medication][error_cause_procedure]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Failure to adhere to work procedure </label>',));
                        echo $this->Form->input('error_cause_abbreviations', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_abbreviations_" name="data[Medication][error_cause_abbreviations]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Use of abbreviations </label>',));
                        echo $this->Form->input('error_cause_illegible', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_illegible_" name="data[Medication][error_cause_illegible]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Illegible prescriptions </label>',));
                        echo $this->Form->input('error_cause_inaccurate', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_inaccurate_" name="data[Medication][error_cause_inaccurate]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Patient information/record unavailable/ inaccurate </label>',));
                        echo $this->Form->input('error_cause_labelling', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_labelling_" name="data[Medication][error_cause_labelling]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Wrong labelling/instruction on dispensing envelope or bottle/container </label>',));
                        echo $this->Form->input('error_cause_computer', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_computer_" name="data[Medication][error_cause_computer]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Incorrect computer entry </label>',));
                        echo $this->Form->input('error_cause_other', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Medication_error_cause_other_" name="data[Medication][error_cause_other]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Others: </label>',));
                        echo $this->Form->input('error_cause_specify', array(
                                'rows' => '2',
                                'label' => false,
                                'between' => false, 'div' => false,
                                'after'=>'<p class="help-block">  (if others, specify)   </p>',
                                'class' => 'span8',

                            ));
                    ?>
                </div>            
            </div>
            <hr>
            <?php echo $this->element('multi/list_of_products');?>

            <div class="row-fluid">
                <div class="span12">
                    <div style="padding-left: 15px;">
                    <?php
                       echo $this->Form->input('recommendations', array(
                                'rows' => '2',
                                'label' => array('class' => 'required', 'text' => 'Suggest any recommendations, or describe policies or procedures you instituted or plan to institute to prevent future similar errors. If available, kindly attach an investigational report e.g. Root Cause Analysis (RCA)'),
                                'between' => false, 'div' => false,
                                'after'=>'<p class="help-block">     </p>',
                                'class' => 'span11',

                            ));
                    ?>
                    </div>
                </div>
            </div>

            
            <?php echo $this->element('multi/attachments', ['model' => 'Medication', 'group' => 'attachment']); ?>
            

            <hr>
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
                            'label' => array('class' => 'control-label required', 'text' => 'Date of report <span style="color:red;">*</span>'),
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
                                                <input type="hidden" value="" id="MedicationPersonSubmitting_" name="data[Medication][person_submitting]">
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
                            'label' => array('class' => 'control-label required', 'text' => 'Name'),
                        ));
                        echo $this->Form->input('reporter_email_diff', array(
                            'type' => 'email',
                            'div' => array('class' => 'control-group required'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS')
                        ));
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('reporter_designation_diff', array(
                            'type' => 'select', 'options' => $designations, 'empty' => true, 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'Cadre/designation'), 'empty'=>true ));
                        echo $this->Form->input('reporter_phone_diff', array(
                            'div' => array('class' => 'control-group'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
                        ));                        
                        echo $this->Form->input('reporter_date_diff', array(
                            'type' => 'text', 'class' => 'date-pick-field diff', 
                            'label' => array('class' => 'control-label required', 'text' => 'Date of Submission'),
                        ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
            
        </div>
        <div class="span2">
            <div class="my-sidebar" data-spy="affix">
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
                          'onclick'=>"return confirm('Are you sure you wish to submit the report?');",
                          'class' => 'btn btn-primary btn-block mapop',
                          'id' => 'SiteInspectionSubmitReport', 'title'=>'Save and Submit Report',
                          'data-content' => 'Submit report for peer review and approval.',
                          'div' => false,
                        ));

                    ?>
                    <br>
                    <hr>
                    <?php
                        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF', array('action'=>'view', 'ext'=> 'pdf', $this->request->data['Medication']['id']),
                            array('escape' => false, 'class' => 'btn btn-info btn-block mapop', 'title'=>'Download PDF',
                            'data-content' => 'Download the pdf version of the report',));
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
