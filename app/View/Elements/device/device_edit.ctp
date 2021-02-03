<?php
            echo $this->Session->flash();
            echo $this->Form->create('Device', array(
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
        <div class="span10 formbackd">

            <?php
                echo $this->Form->input('id', array());
                echo $this->Form->input('Device.report_type', array('type' => 'hidden'));                    
                echo $this->Form->input('Device.reference_no', array('type' => 'hidden'));
            ?>
            <p><b>(FOM019/MIP/PMS/SOP/001)</b></p>
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
                        <h5><b>Email:</b> pv@pharmacyboardkenya.org/medicaldevices@pharmacyboardkenya.org</h5>
                        <h5 style="color: red;">MEDICAL DEVICES INCIDENT REPORTING FORM</h5>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span6">
                <p class="controls" id="device_edit_tip"> <span class="label label-important">Tip:</span> Fields marked with <span style="color:red;">*</span> are mandatory</p>
                </div>
                <div class="span6" id="device_edit_form_id">
                  <h5> <?php    echo  'Form ID: '.$this->data['Device']['reference_no']; ?></h5>                  
                </div>
            </div><!--/row-->
            
            <div class="row-fluid">
                <div class="span8">
                    <?php
                        echo $this->Form->input('report_title', array(
                            'label' => array('class' => 'control-label required', 'text' => 'REPORT TITLE'),
                            'placeholder' => 'Report Title' , 
                            // 'after'=>'<p class="help-block" </p></div>',
                            'class' => 'span9',
                        ));
                    ?>
                </div>
                <div class="span4">
                    <div class="control-group">
                        <!-- <label class="control-label required">Report Type: </label> -->
                        <!-- <div class="controls"> -->
                            <span class="input-xlarge uneditable-input">
                            <?php
                                echo $this->request->data['Device']['report_type'];
                                if($this->request->data['Device']['report_type'] = 'Follow-up Report') echo " (Initial Report: ".$this->request->data['Device']['reference_no'].")";
                            ?>
                            </span>
                        <!-- </div>  -->
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    
                    <?php

                        echo $this->Form->input('name_of_institution', array(
                            'label' => array('class' => 'control-label required', 'text' => 'NAME OF INSTITUTION/ ORGANZIATION <span style="color:red;">*</span>'),
                            'placeholder' => 'Name of Institution' ,
                        ));

                        echo $this->Form->input('institution_address', array(
                            'label' => array('class' => 'control-label required', 'text' => 'PHYSICAL ADDRESS'),
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

                        echo $this->Form->input('institution_contact', array(
                            'label' => array('class' => 'control-label required', 'text' => 'CONTACT'),
                            'placeholder' => 'Contact' ,
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

            <h5 style="text-align: center; color: #884805;">PATIENT INFORMATION</h5>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('patient_name', array(
                            'label' => array('class' => 'control-label required', 'text' =>  'PATIENT\'S NAME/ INITIALS <span style="color:red;">*</span>'),                          
                        ));
                        echo $this->Form->input('ip_no', array('label' => array('class' => 'control-label required', 'text' => 'IP/OP NO.'), ));
                    ?>
                    <div class="well-mine" style="background-color: #9FF59F;">
                    <?php
                        echo $this->Form->input('date_of_birth', array('type' => 'text', 'class' => 'date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'DATE OF BIRTH'),));
                    ?>
                    <h5 class="controls"><span style="color:red;">*</span>--OR--</h5>
                    <?php
                        echo $this->Form->input('age_years', array('label' => array('class' => 'control-label required', 'text' => 'Age in years'), ));

                    ?>
                    </div>
                    
                    <?php
                        echo $this->Form->input('allergy', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'allergy',
                            'before' => '<div class="control-group">  <div>  <label class="control-label required">ANY KNOWN ALLERGY</label> </div>
                                            <div class="controls"> <input type="hidden" value="" id="DeviceKnownAllergy_" name="data[Device][allergy]"> <label class="radio inline">',
                            'after' => '</label>',
                            'options' => array('Yes' => 'Yes'),
                            'onclick' => '$("#DeviceAllergySpecify").removeAttr("disabled")',
                        ));
                        echo $this->Form->input('allergy', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'allergy',
                            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio inline">',
                            'after' => '</label> <label><a class="button"
                                        onclick="$(\'.allergy\').removeAttr(\'checked\'); $(\'#DeviceAllergySpecify\').attr(\'disabled\',\'disabled\');" >
                                        <em class="accordion-toggle">clear!</em></a></label> </div> </div>',
                            'options' => array('No' => 'No'),
                            'onclick' => '$("#DeviceAllergySpecify").attr("disabled","disabled")',
                        ));

                        echo $this->Form->input('allergy_specify', array(
                                                    // 'label' => array('class' => 'control-label', 'text' => '(specify)'),
                                                    'label' => false, 'disabled' => true, 'placeholder' => 'If yes, specify',
                                                    'after'=>'<p class="help-block"> (specify) </p></div>'
                                                ));
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('patient_address', array(
                            'label' => array('class' => 'control-label required', 'text' => 'PATIENT ADDRESS '),
                        ));

                        echo $this->Form->input('patient_phone', array(
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NUMBER '),
                            'after'=>'<p class="help-block">    (self or nearest contact) </p></div>'
                        ));                        

                        echo $this->Form->input('gender', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
                            'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">GENDER <span style="color:red;">*</span></label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="DeviceGender_" name="data[Device][gender]"> <label class="radio inline">',
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
                        echo $this->Form->input('patient_weight', array(
                                        'label' => array('class' => 'control-label required', 'text' => 'WEIGHT (kg)'),
                                        'between' => '<div class="controls"><div class="input-append">',
                                        'after' => '<span class="add-on">Kg</span></div></div>'));
                        echo $this->Form->input('patient_height', array(
                                        'label' => array('class' => 'control-label required', 'text' => 'HEIGHT (cm)'),
                                        'between' => '<div class="controls"><div class="input-append">',
                                        'after' => '<span class="add-on">cm</span></div></div>'));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
                <hr>

            <h5 style="text-align: center; color: #884805;">Device/In vitro Diagnostic information</h5>
            <div class="row-fluid">
                <div class="span3">
                    <div class="required"> <label class="required" style="text-align: right;">1. PROBLEM NOTED PRIOR TO USE <span style="color:red;">*</span></label> </div>
                </div>
                <div class="span9">
                    <?php
                        echo $this->Form->input('problem_noted', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'problem_noted',
                         'before' => '<div class="control-group"> 
                                         <div class="">  <input type="hidden" value="" id="ProblemNoted_" name="data[Device][problem_noted]"> <label class="radio inline">',
                         'after' => '</label>',
                         'options' => array('Yes' => 'Yes'),
                        ));
                        echo $this->Form->input('problem_noted', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'problem_noted',
                         'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                         'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                         'before' => '<label class="radio inline">',
                         'after' => '</label> 
                                     <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                                     onclick="$(\'.problem_noted\').removeAttr(\'checked disabled\')">
                                     <em class="accordion-toggle">clear!</em></a> </span>
                                     </div> </div>',
                         'options' => array('No' => 'No'),
                        ));
                    ?>
                </div>
            </div>


            <div class="row-fluid">
                <div class="span6">
                    <?php

                        echo $this->Form->input('brand_name', array(
                            'label' => array('class' => 'control-label required', 'text' => 'BRAND NAME/ COMMERCIAL NAME <span style="color:red;">*</span>'),
                        ));

                        echo $this->Form->input('common_name', array(
                            'label' => array('class' => 'control-label required', 'text' =>  'COMMON NAME'),       
                        'after'=>'<p class="help-block">    (catheter; syringe 5cc,10cc; latex gloves etc.) </p></div>',                    
                        ));


                        echo $this->Form->input('device_model', array(
                            'label' => array('class' => 'control-label required', 'text' => 'MODEL'),
                        ));

                        echo $this->Form->input('manufacturer_name', array(
                            'label' => array('class' => 'control-label required', 'text' => 'NAME OF MANUFACTURER'),
                        ));
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('serial_no', array(
                            'label' => array('class' => 'control-label required', 'text' => 'SERIAL/ LOT NO. <span style="color:red;">*</span>'),
                        ));

                        echo $this->Form->input('catalogue', array(
                            'label' => array('class' => 'control-label required', 'text' => 'CATALOGUE NUMBER'),
                        ));

                        echo $this->Form->input('manufacturer_address', array(
                            'label' => array('class' => 'control-label required', 'text' => 'MANUFACTURER ADDRESS'),
                        ));

                        echo $this->Form->input('manufacture_date', array(
                            'type' => 'text', 'class' => 'date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'DEVICE MANUFACTURE DATE <span style="color:red;">*</span>'),
                            'after'=>'<p class="help-block"> (dd-mm-yyyy) </p></div>'
                        ));

                        echo $this->Form->input('expiry_date', array(
                            'type' => 'text', 'class' => 'date-pick-expire', 'label' => array('class' => 'control-label required', 'text' => 'EXPIRY DATE <span style="color:red;">*</span>'),
                            'after'=>'<p class="help-block"> (dd-mm-yyyy) </p></div>'
                        ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
             <hr>

            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('operator', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'operator',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            2. Operator of the device at time of onset</label>  <div class="controls">
                            <input type="hidden" value="" id="DeviceOperator_" name="data[Device][operator]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Healthcare professional' => 'Healthcare professional'),
                        )); 
                        echo $this->Form->input('operator', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'operator',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Patient' => 'Patient')
                        )); 
                        echo $this->Form->input('operator', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'operator',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Caregiver' => 'Caregiver')
                        )); 
                        echo $this->Form->input('operator', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'operator',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.operator\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Other' => 'Other'),
                        ));

                        echo $this->Form->input('operator_specify', array('label' => array('class' => 'control-label required', 'text' => 'Other (specify)'), 'rows' => 1, 'class' => 'span5'));
                    ?>
                </div>
                <div class="span6">
                    <?php
                        echo $this->Form->input('device_usage', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'device_usage',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            3. Usage of device (choose whichever applies)</label>  <div class="controls">
                            <input type="hidden" value="" id="DeviceUsage_" name="data[Device][device_usage]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Single use' => 'Single use'),
                        )); 
                        echo $this->Form->input('device_usage', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'device_usage',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Reuse of reusable' => 'Reuse of reusable')
                        )); 
                        echo $this->Form->input('device_usage', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'device_usage',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Reuse of single-use' => 'Reuse of single-use')
                        )); 
                        echo $this->Form->input('device_usage', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'device_usage',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.device_usage\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Reserviced/Refurbished' => 'Reserviced/Refurbished'),
                        ));

                    ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <p class="required">4.  How long was the device/ equipment/ machine in use</p>
                </div>
                <div class="span8">
                    <?php
                        echo $this->Form->input('device_duration_type', array(
                            'div' => false, 'before' => false, 'after' => false, 'between' => false, 'class' => 'input-small',
                           'type' => 'select', 'label' => false, 'options' => array('Days' => 'Days', 'Months' => 'Months', 'Years' => 'Years')
                        ));
                        echo '-';
                        echo $this->Form->input('device_duration', array(
                            'label' => false, 'div' => false, 'before' => false, 'after' => false, 'between' => false,
                        ));
                    ?>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <?php
                        echo $this->Form->input('device_availability', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'device_availability',
                         'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">5. Availability of device for evaluation</label> </div>
                                         <div class="controls">  <input type="hidden" value="" id="DeviceAvailability_" name="data[Device][device_availability]"> <label class="radio inline">',
                         'after' => '</label>',
                         'options' => array('Yes' => 'Yes'),
                        ));
                        echo $this->Form->input('device_availability', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'device_availability',
                         'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                         'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                         'before' => '<label class="radio inline">',
                         'after' => '</label> 
                                     <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                                     onclick="$(\'.device_availability,.device_unavailability\').removeAttr(\'checked disabled\')">
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
                        echo $this->Form->input('device_unavailability', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'device_unavailability',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            If No</label>  <div class="controls">
                            <input type="hidden" value="" id="DeviceUnavailability_" name="data[Device][device_unavailability]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Device destroyed' => 'Device destroyed'),
                        )); 
                        echo $this->Form->input('device_unavailability', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'device_unavailability',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Still in use' => 'Still in use')
                        )); 
                        echo $this->Form->input('device_unavailability', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'device_unavailability',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.device_unavailability\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Returned to manufacturer/importer/distributor' => 'Returned to manufacturer/importer/distributor'),
                        ));

                        // echo $this->Form->input('serious_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                    ?>
                </div>
            </div>
            <hr>

            <h5 style="text-align: center; color: #884805;">7. For implants only (e.g. intrauterine devices, pacemakers)</h5>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('implant_date', array(
                            'type' => 'text', 'class' => 'date-pick-field',
                            'label' => array('class' => 'control-label required', 'text' => 'Implant date'),
                            'after'=>'<p class="help-block"> (dd-mm-yyyy) </p></div>'
                        ));

                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('explant_date', array(
                            'type' => 'text', 'class' => 'date-pick-field',
                            'label' => array('class' => 'control-label required', 'text' => 'Explant date'),
                            'after'=>'<p class="help-block"> (dd-mm-yyyy) </p></div>'
                        ));

                    ?>
                </div><!--/span-->
            </div><!--/row-->
            <div class="row-fluid">
                <div class="span5">
                    <p class="required">Duration of implantation <span class="help-block"> (to be filled if the exact implant and explant dates are unknown):</span></p>
                </div>
                <div class="span7">
                    <?php
                        echo $this->Form->input('implant_duration_type', array(
                            'div' => false, 'before' => false, 'after' => false, 'between' => false, 'class' => 'input-small',
                           'type' => 'select', 'label' => false, 'options' => array('Days' => 'Days', 'Months' => 'Months', 'Years' => 'Years')
                        ));
                        echo '-';
                        echo $this->Form->input('implant_duration', array(
                            'label' => false, 'div' => false, 'before' => false, 'after' => false, 'between' => false,
                        ));
                    ?>
                    
                </div>
            </div>

            <hr>
            <h5 style="text-align: center; color: #884805;">8. For diagnostics only (including machines and equipment e.g. rapid diagnostic test kits, glucometer)</h5>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                        echo $this->Form->input('specimen_type', array(
                            'type' => 'text',
                            'label' => array('class' => 'control-label required', 'text' => 'Type of specimen used'),
                            'after'=>'<p class="help-block"> (e.g. blood, saliva, etc): </p></div>'
                        ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
            <div class="row-fluid">
                <div class="span4">
                    <?php                    
                        echo $this->Form->input('patients_involved', array(
                            'class' => 'input-small',
                            'label' => array('class' => 'control-label required', 'text' => 'No. of patients involved'),
                        ));
                        echo $this->Form->input('false_negatives', array(
                            'class' => 'input-small',
                            'label' => array('class' => 'control-label required', 'text' => 'No. of false negatives'),
                        ));
                    ?>
                </div>
                <div class="span4">
                    <?php                    
                        echo $this->Form->input('tests_done', array(
                            'class' => 'input-small',
                            'label' => array('class' => 'control-label required', 'text' => 'No. of tests done'),
                        ));
                        echo $this->Form->input('true_positives', array(
                            'class' => 'input-small',
                            'label' => array('class' => 'control-label required', 'text' => 'No. of true positives'),
                        ));
                    ?>
                </div>
                <div class="span4">
                    <?php                    
                        echo $this->Form->input('false_positives', array(
                            'class' => 'input-small',
                            'label' => array('class' => 'control-label required', 'text' => 'No. of false positives'),
                        ));
                        echo $this->Form->input('true_negatives', array(
                            'class' => 'input-small',
                            'label' => array('class' => 'control-label required', 'text' => 'No. of true negatives'),
                        ));
                    ?>
                </div>
            </div>

            <hr>                       
            <?php echo $this->element('multi/list_of_devices');?>

            <h5 style="text-align: center; color: #884805;">Incident information</h5>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                        echo $this->Form->input('date_onset_incident', array(
                            'type' => 'text', 'class' => 'date-pick-field',
                            'label' => array('class' => 'control-label required', 'text' => 'Date of onset of the incident'),
                            // 'after'=>'<p class="help-block"> (e.g. blood, saliva, etc): </p></div>'
                        ));

                        echo $this->Form->input('serious', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                            Event classification <span style="color:red;">*</span></label>  <div class="controls">
                            <input type="hidden" value="" id="DeviceUnavailability_" name="data[Device][serious]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Fatal' => 'Fatal'),
                        )); 
                        echo $this->Form->input('serious', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Serious' => 'Serious')
                        )); 
                        echo $this->Form->input('serious', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Moderate' => 'Moderate')
                        )); 
                        echo $this->Form->input('serious', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Mild' => 'Mild')
                        )); 
                        echo $this->Form->input('serious', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.serious\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Unknown' => 'Unknown'),
                        ));

                    ?>
                </div><!--/span-->
            </div><!--/row-->
            <div class="row-fluid">
                <div class="span4">
                  <div style="padding-left: 30px;">
                    <p> Reason for seriousness: </p>
                    <?php
                        echo $this->Form->input('serious_yes', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'serious_yes',
                            'before' => '<div class="control-group"> <input type="hidden" value="" id="DeviceSeriousYes_" name="data[Device][serious_yes]"> <label class="radio">',
                            'after' => false,
                            'options' => array('Death' => 'Death'),
                        ));
                        echo "&nbsp;-&nbsp;";
                        echo $this->Form->input('death_date', array(
                            'before' => false, 'div' => false, 'between' => false, 'after' => '</label>', 'placeholder' => '(dd-mm-yyyy)',
                            'type' => 'text', 'class' => 'input-small date-pick-field', 'label' => false,));
                        echo $this->Form->input('serious_yes', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'serious_yes',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Life-threatening' => 'Life-threatening'),
                        ));
                        echo $this->Form->input('serious_yes', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'serious_yes',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Hospitalization or prolongation of existing hospitalization' => 'Hospitalization or prolongation of existing hospitalization'),
                        ));
                        echo $this->Form->input('serious_yes', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'serious_yes',
                            'before' => '<label class="radio">',    'after' => '</label>',
                            'options' => array('Results in persistent or significant disability' => 'Results in persistent or significant disability'),
                        ));
                        echo $this->Form->input('serious_yes', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious_yes',
                            'format' => array('before', 'label', 'between', 'input','error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio">',
                            'after' => '</label>
                                <a class="button"
                                        onclick="$(\'.serious_yes\').removeAttr(\'checked\');" >
                                        <em class="accordion-toggle">clear!</em></a>
                            </div>',
                            'options' => array('Congenital anomaly or birth defect' => 'Congenital anomaly or birth defect'),
                        ));

                    ?>
                  </div><!--/padding-->
                </div><!--/span-->
                <div class="span4">
                    <?php
                        // echo $this->Form->input('death_date', array('type' => 'text', 'class' => 'date-pick-field', 'label' => array('class' => 'control-label', 'text' => 'Date of death'),));

                        echo $this->Form->input('description_of_reaction', array(
                            'between' => false, 'div' => false, 'after'=>'<p class="help-block">     </p>',
                            'label' => array('class' => 'control-label required', 'text' => 'Description of event'),));
                    ?>
                </div>
                <div class="span4">
                    <div style="padding-left: 10px;">                        
                        <?php
                            echo $this->Form->input('remedial_action', array(
                                'rows' => '3',
                                'label' => array('class' => 'required', 'text' => 'Remedial Action/Corrective action/preventive action taken by the healthcare facility relevant to the care of the patient'),
                                'between' => false, 'div' => false,
                                'after'=>'<p class="help-block">     </p>',
                                'class' => 'span10',

                            ));
                        ?>
                    </div>
                </div>
            </div><!--/row-->

            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <!-- <div class="required"><label class="required"><strong>Patient Outcome:</strong><span style="color:red;">*</span></label></div> <br/> -->
                    <?php
                        // echo $this->Form->input('serious', array(
                        //   'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                        //   'class' => 'serious',
                        //   'before' => '<div class="control-group ">   <label class="control-label required">
                        //     Event classification </label>  <div class="controls">
                        //     <input type="hidden" value="" id="DeviceUnavailability_" name="data[Device][serious]"> <label class="radio inline">',
                        //   'after' => '</label>',
                        //   'options' => array('Fatal' => 'Fatal'),
                        // )); 

                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<div class="control-group"> <label class="control-label required"> Patient Outcome <span style="color:red;">*</span></label> <input type="hidden" value="" id="DeviceOutcome_" name="data[Device][outcome]"> 
                                <div class="controls"> <label class="radio inline">',
                            'after' => '</label>',
                            'options' => array('Recovered' => 'Recovered'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio inline">',    'after' => '</label>',
                            'options' => array('Recovering' => 'Recovering'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio inline">',    'after' => '</label>',
                            'options' => array('Recovered with sequalae' => 'Recovered with sequalae'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio inline">',    'after' => '</label>',
                            'options' => array('Not recovered' => 'Not recovered'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                            'before' => '<label class="radio inline">',    'after' => '</label>',
                            'options' => array('Fatal' => 'Fatal'),
                        ));
                        echo $this->Form->input('outcome', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'outcome',
                            'format' => array('before', 'label', 'between', 'input','error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio inline">',
                            'after' => '</label>
                                <a class="button"
                                        onclick="$(\'.outcome\').removeAttr(\'checked\');" >
                                        <em class="accordion-toggle">clear!</em></a>
                            </div></div>',
                            'options' => array('Unknown' => 'Unknown'),
                        ));
                    ?>
                </div><!--/span-->
            </div>
            <hr>            

            <?php echo $this->element('multi/attachments', ['model' => 'Device', 'group' => 'attachment']); ?>
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
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO. <span style="color:red;">*</span>')
                        ));
                        
                        echo $this->Form->input('reporter_date', array(
                            'type' => 'text', 'class' => 'date-pick-field',
                            'label' => array('class' => 'control-label required', 'text' => 'Date <span style="color:red;">*</span>'),
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
                                                <input type="hidden" value="" id="DevicePersonSubmitting_" name="data[Device][person_submitting]">
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
                            'label' => array('class' => 'control-label required', 'text' => 'Name of initial reporter<span style="color:red;">*</span>'),
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
                            'label' => array('class' => 'control-label required', 'text' => 'Designation'.' <span style="color:red;">*</span>'), 'empty'=>true ));
                        echo $this->Form->input('reporter_phone_diff', array(
                            'div' => array('class' => 'control-group'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
                        ));                        
                        echo $this->Form->input('reporter_date_diff', array(
                            'type' => 'text', 'class' => 'date-pick-field diff', 
                            'label' => array('class' => 'control-label required', 'text' => 'Date of Initial report'),
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
                        echo $this->Form->button('<i class="fa fa-trash-o" aria-hidden="true"></i> Cancel', array(
                                'name' => 'cancelReport',
                                'class' => 'btn btn-danger btn-block mapop',
                                'id' => 'SadrCancelReport', 'title'=>'Cancel form',
                                'data-content' => 'Cancel form and go back to home page.',
                                'div' => false,
                            ));

                    ?>
                   </div>
                </div>
            </div>
        </div>
            <?php
                echo $this->Form->end();
            ?>
