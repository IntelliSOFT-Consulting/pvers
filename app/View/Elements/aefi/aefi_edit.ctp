<?php
    $this->assign('AEFI', 'active');
    $this->Html->script('jquery/combobox', array('inline' => false));
    $this->Html->script('aefi', array('inline' => false));
?>

<?php
        echo $this->Session->flash();
        echo $this->Form->create('Aefi', array(
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
        <div class="span10 formbacka">

            <?php
                echo $this->Form->input('id', array());
                echo $this->Form->input('Aefi.report_type', array('type' => 'hidden'));                    
                echo $this->Form->input('Aefi.reference_no', array('type' => 'hidden'));
            ?>

            <div class="row-fluid">
                <div class="span2">
                    <?php
                        echo $this->Html->image('header-object.png', array('alt' => 'AEFI'));    
                    ?>
                </div>
                <div class="span8" style="text-align: center;">
                    <h2>MINISTRY OF HEALTH</h2>
                    <p class="lead">National Vaccines and Immunization Program</p>
                    <h3>AEFI Reporting Form</h3>
                </div>
                <div class="span2">
                    <?php
                        echo $this->Html->image('vaccinate.png', array('alt' => 'AEFI', 'style' => 'max-width: 40%;'));
                    ?>
                </div>
            </div><br>
            <div class="row-fluid">
                <div class="span8">
                <p class="controls" id="aefi_edit_tip"> <span class="label label-important">Tip:</span> Fields marked with <span style="color:red;">*</span> are mandatory</p>
                <?php
                    echo $this->Form->input('name_of_institution', array(
                        'label' => array('class' => 'control-label required', 'text' => 'INSTITUTION NAME <span style="color:red;">*</span>'),
                        'placeholder' => 'Reporting Institution' , 
                        // 'after'=>'<p class="help-block" </p></div>',
                        'class' => 'span9',
                    ));
                 ?>
                </div>
                <div class="span4" id="aefi_edit_form_id">
                  <h5> <?php    echo  'Form ID: '.$this->data['Aefi']['reference_no']; ?></h5>
                  <h6><span class="label label-important">Important</span> Unique Form ID</h6>  
                </div>
            </div><!--/row-->
            
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label required">REPORT TYPE: </label>
                        <div class="controls">
                            <span class="input-xlarge uneditable-input">
                            <?php
                                echo $this->request->data['Aefi']['report_type'];
                                if($this->request->data['Aefi']['report_type'] = 'Follow-up Report') echo " (Initial Report: ".$this->request->data['Aefi']['reference_no'].")";
                            ?>
                            </span>
                        </div>              
                    </div>
                    <?php
                        echo $this->Form->input('institution_code', array(
                            'label' => array('class' => 'control-label required', 'text' => 'INSTITUTION CODE'),
                            'placeholder' => 'MFL CODE' ,
                        ));

                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('county_id', array(
                                    'label' => array('class' => 'control-label required',
                                    'text' => 'COUNTY <span style="color:red;">*</span>'),
                                    'empty' => true, 'between' => '<div class="controls ui-widget">',
                                ));
                        echo $this->Form->input('sub_county_id', array(
                                    'options' => $sub_counties,
                                    'label' => array('class' => 'control-label required', 'text' => 'SUB-COUNTY'),
                                    'empty' => true, 'between' => '<div class="controls ui-widget">',
                                ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
             <hr class="darker">

            <h4 style="text-align: center;">PATIENT DETAILS</h4>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('patient_name', array(
                            'label' => array('class' => 'control-label required', 'text' =>  'PATIENT\'S NAME <span style="color:red;">*</span>'),                          
                        ));
                        echo $this->Form->input('ip_no', array('label' => array('class' => 'control-label required', 'text' => 'IP/OP NO.'), ));
                    ?>
                    <div class="well-mine" style="background-color: #e6e6dfcc;">
                    <?php
                        echo $this->Form->input('date_of_birth', array(
                            'type' => 'date', 
                            'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(choose day)', 'month' => '(choose month)', 'year' => '(choose year)'),
                            'label' => array('class' => 'control-label required', 'text' => 'DATE OF BIRTH <span style="color:red;">*</span>'),
                            //'title'=> 'Year is mandatory. Pick first day of the month if unsure.', 
                            'after'=>' <a style="font-weight:normal" onclick="$(\'.birthdate\').removeAttr(\'disabled\'); $(\'.birthdate\').val(\'\');
                                $(\'#AefiAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#AefiAgeGroup\').val(\'\');" >
                                <em class="accordion-toggle">clear!</em></a>
                                <p class="help-block">  If selected, year is mandatory. </p></div>',
                            'class' => 'tooltipper birthdate autosave-ignore ',
                        ));

                    ?>
                    <h5 class="controls">--OR--</h5>
                    <?php
                        echo $this->Form->input('age_months', array('label' => array('class' => 'control-label required', 'text' => 'Age in months'), ));

                    ?>
                    </div>
                    
                    <?php
                        echo $this->Form->input('patient_county', array(
                                    'options' => $counties,
                                    'label' => array('class' => 'control-label required', 'text' => 'COUNTY'),
                                    'empty' => true, 
                                ));
                        echo $this->Form->input('vaccination_center', array(
                            'label' => array('class' => 'control-label required', 'text' => 'VACCINATION CENTRE'),
                            'class' => 'span11'
                        ));
                        echo $this->Form->input('vaccination_type', array(
                                    'options' => array('static' => 'static', 'mass' => 'mass', 'outreach' => 'outreach'),
                                    'label' => array('class' => 'control-label required', 'text' => 'TYPE OF VACCINATION SERVICE <span style="color:red;">*</span>'),
                                    'empty' => true,
                                    'after'=>'<p class="help-block">    (static, mass, outreach) </p></div>'
                                ));
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('guardian_name', array(
                            'label' => array('class' => 'control-label required', 'text' =>  'NAME OF GUARDIAN'),       
                        'after'=>'<p class="help-block">    (If patient is a child) </p></div>',                    
                        ));

                        echo $this->Form->input('patient_address', array(
                            'label' => array('class' => 'control-label required', 'text' => 'ADDRESS '),
                        ));

                        echo $this->Form->input('patient_phone', array(
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NUMBER '),
                            'after'=>'<p class="help-block">    (self or nearest contact) </p></div>'
                        ));

                        echo $this->Form->input('patient_village', array(
                            'label' => array('class' => 'control-label required', 'text' => 'VILLAGE'),
                        ));

                        echo $this->Form->input('patient_ward', array('label' => array('class' => 'control-label required', 'text' => 'WARD'),));
                        

                        echo $this->Form->input('gender', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
                            'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">GENDER <span style="color:red;">*</span></label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="AefiGender_" name="data[Aefi][gender]"> <label class="radio inline">',
                            'after' => '</label>',
                            'options' => array('Male' => 'Male'),
                        ));
                        echo $this->Form->input('gender', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
                            'before' => '<label class="radio inline">', 'after' => '</label>',
                            'options' => array('Female' => 'Female'),
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
                            'options' => array('Unknown' => 'Unknown'),
                        ));

                        echo $this->Form->input('patient_sub_county', array(
                                    'options' => $sub_counties,
                                    'label' => array('class' => 'control-label required', 'text' => 'SUB-COUNTY'),
                                    'empty' => true, 
                                ));

                        echo $this->Form->input('vaccination_county', array(
                                    'options' => $counties,
                                    'label' => array('class' => 'control-label required', 'text' => 'COUNTY OF VACCINATION CENTRE'),
                                    'empty' => true, 
                                ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
                <hr class="darker">

            <h4 style="text-align: center;">TYPE OF AEFI</h4>
            <div class="row-fluid">
                <div class="span4">
                  <div style="padding-left: 30px;">
                    <!-- <p class="help-block"> (please tick) </p> -->
                    <?php
                        echo $this->Form->input('bcg', array(
                            'type' => 'checkbox',   'before' => '<div class="control-group">',
                                                    'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiBcg_" name="data[Aefi][bcg]">
                                                                    <label class="checkbox">',
                                                    'after' => 'BCG Lymphadenitis </label>',));
                        echo $this->Form->input('convulsion', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiConvulsion_" name="data[Aefi][convulsion]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Convulsion  </label>',));
                        echo $this->Form->input('urticaria', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiUrticaria_" name="data[Aefi][urticaria]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Generalized urticaria (hives) </label>',));
                        echo $this->Form->input('high_fever', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiHighFever_" name="data[Aefi][high_fever]">
                                                                    <label class="checkbox">',
                                                    'after' => 'High Fever  </label>',));
                        echo $this->Form->input('abscess', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiAbscess_" name="data[Aefi][abscess]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Injection site abscess </label>',));
                        echo $this->Form->input('local_reaction', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiLocalReaction_" name="data[Aefi][local_reaction]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Severe Local Reaction   </label>',));
                        
                        echo $this->Form->input('anaphylaxis', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiAnaphylaxis_" name="data[Aefi][anaphylaxis]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Anaphylaxis </label>',));
                        echo $this->Form->input('meningitis', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiMeningitis_" name="data[Aefi][meningitis]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Encephalopathy, Encephalitis/Meningitis</label>',));
                        echo $this->Form->input('paralysis', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiParalysis_" name="data[Aefi][paralysis]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Paralysis</label>',));
                        echo $this->Form->input('toxic_shock', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiToxicShock_" name="data[Aefi][toxic_shock]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Toxic shock </label>',));
                        echo $this->Form->input('complaint_other', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="AefiComlaintOther_" name="data[Aefi][complaint_other]">
                                                                    <label class="checkbox">',
                                // 'onclick' => '$("#AefiComplaintOtherSpecify").removeAttr("disabled")',
                                                    'after' => 'Other   </label>',
                                                    ));
                        echo $this->Form->input('complaint', array('type' => 'hidden', 'value' => ''));
                        echo $this->Form->error('Aefi.complaint', array('wrap' => 'span', 'class' => 'control-group required error'));
                        echo $this->Form->input('complaint_other_specify', array(
                                                    'class' => 'span6',  'rows' => '3', 'label' => false, 'between' => false,
                                                    'after'=>'<p class="help-block">  </p></div>',
                                                    'disabled' => true, 'placeholder' => 'If other, specify', ));

                    ?>
                  </div><!--/padding-->
                </div><!--/span-->
                <div class="span4">
                    <?php
                        echo $this->Form->input('date_aefi_started', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'DATE AEFI STARTED'),));
                        echo $this->Form->input('time_aefi_started', array('type' => 'time', 'timeFormat' => 24, 'interval' => 5, 'class' => 'span4', 'style' => 'display: inline;', 
                            'label' => array('class' => 'control-label required', 'text' => 'TIME'),));
                        // echo $this->Form->input('aefi_symptoms', array('label' => array('class' => 'control-label required', 'text' => 'Describe AEFI (Signs & Symptoms)'),));
                        echo $this->Form->input('aefi_symptoms', array(
                                'label' => array('class' => 'required', 'text' => 'Describe AEFI <span style="color:red;">*</span>'),
                                'between' => false, 'div' => false,
                                'after'=>'<p class="help-block">  (Signs & Symptoms) </p>',
                                'class' => 'span12', 'rows' => '1'
                            ));
                    ?>
                </div>
                <div class="span4">
                    <div style="padding-left: 10px;">                        
                        <?php
                            echo $this->Form->input('description_of_reaction', array(
                                'rows' => '7',
                                'label' => array('class' => 'required', 'text' => 'Brief details on the event <span style="color:red;">*</span>'),
                                'between' => false, 'div' => false,
                                'title'=> 'Description of reaction', 'data-content' => 'Description of reaction',
                                'after'=>'<p class="help-block">    (including timeline of occurrence) </p>',
                                'class' => 'span8',

                            ));
                        ?>
                    </div>
                </div>
            </div><!--/row-->
            <hr>

            <?php echo $this->element('multi/list_of_vaccines');?>

            <div class="row-fluid">
                <div class="span12">
                    <?php
                        echo $this->Form->input('medical_history', array('class' => 'span11',  'rows' => '3', 
                            'label' => array('class' => 'control-label required', 'text' => 'Past medical history'),
                            'after'=>'<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
             <hr class="darker">

            <div class="row-fluid">
                <div class="span12">
                    <?php
                        echo $this->Form->input('serious', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'serious',
                         'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">SERIOUS <span style="color:red;">*</span></label> </div>
                                         <div class="controls">  <input type="hidden" value="" id="Serious_" name="data[Aefi][serious]"> <label class="radio inline">',
                         'after' => '</label>',
                         'options' => array('Yes' => 'Yes'),
                        ));
                        echo $this->Form->input('serious', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious',
                         'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                         'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                         'before' => '<label class="radio inline">',
                         'after' => '</label> 
                                     <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                                     onclick="$(\'.serious,.serious_yes\').removeAttr(\'checked disabled\')">
                                     <em class="accordion-toggle">clear!</em></a> </span>
                                     </div> </div>',
                         'options' => array('No' => 'No'),
                        ));
                    ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                        echo $this->Form->input('serious_yes', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_yes',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            If Yes</label>  <div class="controls">
                            <input type="hidden" value="" id="AefiSerious_" name="data[Aefi][serious_yes]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Death' => 'Death'),
                        )); 
                        echo $this->Form->input('serious_yes', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_yes',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Life threatening' => 'Life threatening')
                        )); 
                        echo $this->Form->input('serious_yes', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_yes',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Persistent or significant disability' => 'Persistent or significant disability')
                        )); 
                        echo $this->Form->input('serious_yes', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_yes',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Missing cost or prolonged hospitalization' => 'Missing cost or prolonged hospitalization')
                        )); 
                        echo $this->Form->input('serious_yes', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_yes',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Congenital anomaly' => 'Congenital anomaly')
                        )); 
                        echo $this->Form->input('serious_yes', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious_yes',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a id="serious_yes_clear" class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.serious_yes\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Other important medical event' => 'Other important medical event'),
                        ));

                        echo $this->Form->input('serious_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                    ?>
                </div>
            </div>
            <hr class="darker">
            <div class="row-fluid">             
                <div class="span6">
                    <h5 style="text-align: center;">Action Taken:</h5>
                    <?php
                        echo $this->Form->input('treatment_given', array(
                            'div' => array('class' => 'control-group required'),
                            'label' => array('class' => 'control-label required', 'text' => 'Treatment given'),
                            'after'=>'<p class="help-block"> (specify) </p></div>'
                        ));
                        echo $this->Form->input('specimen_collected', array(
                            'div' => array('class' => 'control-group required'),
                            'label' => array('class' => 'control-label required', 'text' => 'Specimen collected'),
                            'after'=>'<p class="help-block"> Specimen collected for investigation (specify type(s) of specimen) </p></div>'
                        ));

                    ?>
                </div><!--/span-->
                <div class="span6">
                    <div class="required"><label class="required"><strong>AEFI Outcome:</strong><span style="color:red;">*</span></label></div> <br/>
                    <!-- <h5>OUTCOME:</h5>  <br> -->
                    <?php
                        //Recovered/Resolved, Recovering/Resolving, Not recovered/Not resolved/Ongoing, Recovered/Resolved with sequelae, Fatal, unknown
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<div class="control-group"> <input type="hidden" value="" id="AefiOutcome_" name="data[Aefi][outcome]"> <label class="radio">',
                            'after' => '</label>',
                            'options' => array('Recovered/Resolved' => 'Recovered/Resolved'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Recovering/Resolving' => 'Recovering/Resolving'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Not recovered/Not resolved/Ongoing' => 'Not recovered/Not resolved/Ongoing'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Recovered/Resolved with sequelae' => 'Recovered/Resolved with sequelae'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Fatal' => 'Fatal'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'outcome',
                            'format' => array('before', 'label', 'between', 'input','error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio">',
                            'after' => '</label>
                                <a class="button"
                                        onclick="$(\'.outcome\').removeAttr(\'checked\');" >
                                        <em class="accordion-toggle">clear!</em></a>
                            </div>',
                            'options' => array('Unknown' => 'Unknown'),
                        ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->

            <?php echo $this->element('multi/attachments', ['model' => 'Aefi', 'group' => 'attachment']); ?>

            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('reporter_name', array(
                            'div' => array('class' => 'control-group required'),
                            'label' => array('class' => 'control-label required', 'text' => 'Name of Person Reporting <span style="color:red;">*</span>'),
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
                                array('label' => array('class' => 'control-label required', 'text' => 'DESIGNATION'.' <span style="color:red;">*</span>'), 'empty'=>true ));
                        echo $this->Form->input('reporter_phone', array(
                            'div' => array('class' => 'control-group'),
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
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
                        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF', array('action'=>'view', 'ext'=> 'pdf', $this->request->data['Aefi']['id']),
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