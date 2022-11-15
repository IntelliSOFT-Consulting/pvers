<?php
$this->assign('PADR', 'active');
$this->Html->script('jquery/combobox', array('inline' => false));
$this->Html->script('padr', array('inline' => false));
$this->Html->css('padr', false, array('inline' => false));
?>

<!-- PADR
    ================================================== -->
<section id="padrsadd">

    <?php
    echo $this->Session->flash();
    echo $this->Form->create('Padr', array(
        'type' => 'file',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'div' => array('class' => 'control-group'),
            'label' => array('class' => 'control-label'),
            'between' => '<div class="controls">',
            'after' => '</div>',
            'class' => '',
            'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
            'error' => array('attributes' => array('class' => 'controls help-block')),
        ),
    ));
    ?>
    <div class="row-fluid">
        <div class="span10 pformback">

            <?php
            echo $this->Form->input('Padr.id', array());
            ?>

            <div class="row-fluid">
                <div class="span12" style="text-align: center;">
                    <?php
                    echo $this->Html->image('confidence.png', array('alt' => 'COA'));
                    ?>
                </div>
            </div>

            <div style="background-color: #aad7d4;">
                <h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE PERSON REPORTING</h5>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                    echo $this->Form->input('reporter_name', array(
                        'div' => array('class' => 'control-group required'),
                        'label' => array('class' => 'control-label required', 'text' => 'Name of Person Reporting <span style="color:red;">*</span>'),
                    ));

                    ?>
                </div>
                <!--/span-->
                <div class="span6">
                    <?php
                    echo $this->Form->input('relation', array(
                        'type' => 'select', 'empty' => true,
                        'label' => array('class' => 'control-label required', 'text' => 'Relation'),
                        'options' => array('Self' => 'Self', 'Parent' => 'Parent', 'Guardian' => 'Guardian', 'Other' => 'Other')
                    ));
                    echo $this->Form->input('county_id', array(
                        'label' => array(
                            'class' => 'control-label required',
                            'text' => 'County <span style="color:red;">*</span>'
                        ),
                        'empty' => true, 'between' => '<div class="controls ui-widget">',
                    ));

                    ?>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <div style="background-color: #d3d3d352; padding-top: 7px;">
                <div class="row-fluid">
                    <div class="span5">
                        <?php
                        echo $this->Form->input('reporter_email', array(
                            'type' => 'email',
                            'div' => array('class' => 'control-group required'), 'required' => false,
                            'label' => array('class' => 'control-label required', 'text' => 'Email Address')
                        ));

                        ?>
                    </div>
                    <div class="span1"><label class="required text-warning tooltipper" style="padding-top: 5px; text-align: right;" data-original-title="Enter either email/phone or both">--OR--</label></div>
                    <div class="span6">
                        <?php
                        echo $this->Form->input('reporter_phone', array(
                            'div' => array('class' => 'control-group'), 'required' => false,
                            'label' => array('class' => 'control-label required', 'text' => 'Mobile No.')
                        ));
                        ?>
                    </div>
                </div>
            </div>

            <div style="background-color: lightblue;">
                <h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE PATIENT</h5>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                    echo $this->Form->input('patient_name', array(
                        'label' => array('class' => 'control-label required', 'text' =>  'Patient\'s Name <span style="color:red;">*</span>'),
                        // 'after'=>'<span class="muted"> or initials e.g E.O.O </span></div>',
                        'placeholder' => 'Name or Initials', 'class' => 'tooltipper',
                    ));
                    ?>
                </div>
                <!--/span-->
                <div class="span6">
                    <?php

                    echo $this->Form->input('gender', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
                        'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Gender </label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="PadrGender_" name="data[Padr][gender]"> <label class="radio inline">',
                        'after' => '</label>',
                        'options' => array('Male' => 'Male'),
                    ));
                    echo $this->Form->input('gender', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                        'before' => '<label class="radio inline">',
                        'after' => '</label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.gender\').removeAttr(\'checked disabled\')">
                                        <em class="accordion-toggle">clear!</em></a> 
                                        </div> </div>',
                        'options' => array('Female' => 'Female'),
                    ));

                    ?>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <div class="row-fluid">
                <div class="span7">

                    <?php

                    echo $this->Form->input('date_of_birth', array(
                        'type' => 'date',
                        // 'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                        'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
                        'label' => array('class' => 'control-label required', 'text' => 'Date of Birth'),
                        'title' => 'select beginning of the month if unsure', 'data-content' => 'If selected, year is mandatory.',
                        'after' => ' <a style="font-weight:normal" onclick="$(\'.birthdate\').removeAttr(\'disabled\'); $(\'.birthdate\').val(\'\');
                                $(\'#PadrAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#PadrAgeGroup\').val(\'\');" >
                                <em class="accordion-toggle">clear!</em></a>
                                <p class="help-block">  If selected, year is mandatory.  </p></div>',
                        'class' => 'tooltipper span3',
                    ));

                    ?>

                    <div class="controls">
                        <h5 class="text-success">--OR--</h5>
                    </div>

                    <?php
                    echo $this->Form->input('age_group', array(
                        'type' => 'select',
                        'empty' => true,
                        'options' => array(
                            'neonate' => 'neonate [0-1 month]',
                            'infant' => 'infant [1 month-1 year]',
                            'child' => 'child [1 year - 11 years]',
                            'adolescent' => 'adolescent [12-17 years]',
                            'adult' => 'adult [18-64 years]',
                            'elderly' => 'elderly [>65 years]',
                        ),
                        'label' => array('class' => 'control-label required', 'text' => 'Age Group'),
                        'after' => '<a onclick="$(\'#PadrAgeGroup\').removeAttr(\'disabled\'); $(\'#PadrAgeGroup\').val(\'\');
                                    $(\'.birthdate\').attr(\'disabled\',\'disabled\'); $(\'.birthdate\').val(\'\');" >
                                <em class="accordion-toggle">clear!</em></a> </div>',
                    ));

                    ?>
                </div>
                <div class="span5">
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <table class="table table-bordered table-condensed">
                        <tbody>
                            <tr class="success">
                                <td><label class="required" style="text-align: right;">Select type of report:</label> </td>
                                <td>
                                    <?php
                                    echo $this->Form->input('report_sadr', array(
                                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'person-submit',
                                        'before' => '<div class="form-inline">
                                        <input type="hidden" value="" id="SadrPersonSubmitting_" name="data[Padr][report_sadr]">
                                        <label class="radio">',
                                        'after' => '</label>&nbsp;&nbsp;',
                                        'options' => array('Adverse Reaction' => 'Adverse Reaction'),
                                    ));
                                    echo $this->Form->input('report_sadr', array(
                                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'person-submit',
                                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                                        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                        'before' => '<label class="radio">', 'after' => '</label> </div>',
                                        'options' => array('Poor Quality Medicine' => 'Poor Quality Medicine'),
                                    ));
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="sadr">
                <!-- yellow form -->

                <div style="background-color: #fffd77;">
                    <h5 style="text-align: center; text-decoration: underline;">SIDE EFFECT</h5>
                </div>
                <div style="padding: 10px;">
                    <div class="row-fluid">
                        <div class="span4">
                            <?php

                            echo "<h6>Select all side effects experienced</h6>";
                            echo $this->Form->input('sadr_vomiting', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_vomiting_" name="data[Padr][sadr_vomiting]">
                                                                    <label class="checkbox">',
                                'after' => 'Vomiting or diarrhoea </label>',
                            ));
                            echo $this->Form->input('sadr_dizziness', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_dizziness_" name="data[Padr][sadr_dizziness]">
                                                                    <label class="checkbox">',
                                'after' => 'Dizziness or drowsiness </label>',
                            ));
                            echo $this->Form->input('sadr_headache', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_headache_" name="data[Padr][sadr_headache]">
                                                                    <label class="checkbox">',
                                'after' => 'Headache </label>',
                            ));
                            echo $this->Form->input('sadr_joints', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_joints_" name="data[Padr][sadr_joints]">
                                                                    <label class="checkbox">',
                                'after' => 'Joints and muscle pain </label>',
                            ));
                            echo $this->Form->input('sadr_rash', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_rash_" name="data[Padr][sadr_rash]">
                                                                    <label class="checkbox">',
                                'after' => 'Rash, itching, swelling on skin </label>',
                            ));
                            echo $this->Form->input('sadr_mouth', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_mouth_" name="data[Padr][sadr_mouth]">
                                                                    <label class="checkbox">',
                                'after' => 'Pain or bleeding in the mouth </label>',
                            ));
                            echo $this->Form->input('sadr_stomach', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_stomach_" name="data[Padr][sadr_stomach]">
                                                                    <label class="checkbox">',
                                'after' => 'Pain in the stomach </label>',
                            ));
                            echo $this->Form->input('sadr_urination', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_urination_" name="data[Padr][sadr_urination]">
                                                                    <label class="checkbox">',
                                'after' => 'Abnormal changes with urination </label>',
                            ));
                            echo $this->Form->input('sadr_eyes', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_eyes_" name="data[Padr][sadr_eyes]">
                                                                    <label class="checkbox">',
                                'after' => 'Red, painful eyes </label>',
                            ));
                            echo $this->Form->input('sadr_died', array(
                                'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                'between' => '<input type="hidden" value="0" id="Medication_sadr_died_" name="data[Padr][sadr_died]">
                                                                    <label class="checkbox">',
                                'after' => 'Patient died </label>',
                            ));



                            // echo $this->Form->input('User.reactors', array('multiple' => 'checkbox', 'options' => ['red yes' => 'red eyes', 'vomitting' => 'vomitting']));
                            ?>
                        </div>
                        <!--/span-->
                        <div class="span4">
                            <?php
                            echo $this->Form->input('description_of_reaction', array(
                                'class' => 'span11', 'rows' => '1', 'between' => false, 'div' => false,
                                'label' => array('class' => 'required', 'text' => 'Other side effects experienced'),
                                'after' => '<span class="help-block">What were the signs of the side effect?</span>',
                            ));
                            ?>
                        </div>
                        <div class="span4">
                            <?php
                            /*echo $this->Form->input('date_of_end_of_reaction', array(
                                'type' => 'date', 'between' => false, 'div' => false, 'after' => false,
                                'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
                                'label' => array('class' => 'required', 'text' => 'When did the reaction end? <span class="muted">(if it ended)</span>'),
                                'class' => 'span4',
                            ));*/
                            echo $this->Form->input('date_of_onset_of_reaction', array(
                                'type' => 'date', 'between' => false, 'div' => false, 'after' => false,
                                'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
                                'label' => array('class' => 'required', 'text' => 'When did the reaction start? '),
                                'class' => 'span4',
                            ));
                            echo $this->Form->input('reaction_on', array(
                                'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reaction_on',
                                'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Is the reaction still on? </div>
                                            <div class="controls">  <input type="hidden" value="" id="PadrReactionOn_" name="data[Padr][reaction_on]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Yes' => 'Yes'),
                            ));
                            echo $this->Form->input('reaction_on', array(
                                'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reaction_on',
                                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.reaction_on\').removeAttr(\'checked disabled\')">
                                        <em class="accordion-toggle">clear!</em></a> 
                                        </div> </div>',
                                'options' => array('No' => 'No'),
                            ));
                            ?>
                        </div>
                    </div>
                    <!--/row-->
                </div>
            </div>


            <div id="pqmp" style="padding: 10px;">
                <div style="background-color: lightpink;">
                    <h5 style="text-align: center; text-decoration: underline;">POOR QUALITY MEDICINE</h5>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <?php

                        echo "<h6>Select all issues with the medicine/device</h6>";
                        echo $this->Form->input('pqmp_label', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                            'between' => '<input type="hidden" value="0" id="Medication_pqmp_label_" name="data[Padr][pqmp_label]">
                                                                    <label class="checkbox">',
                            'after' => 'The label looks wrong </label>',
                        ));
                        echo $this->Form->input('pqmp_material', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                            'between' => '<input type="hidden" value="0" id="Medication_pqmp_material_" name="data[Padr][pqmp_material]">
                                                                    <label class="checkbox">',
                            'after' => 'Has unusual material in it </label>',
                        ));
                        echo $this->Form->input('pqmp_color', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                            'between' => '<input type="hidden" value="0" id="Medication_pqmp_color_" name="data[Padr][pqmp_color]">
                                                                    <label class="checkbox">',
                            'after' => 'The color is changing </label>',
                        ));
                        echo $this->Form->input('pqmp_smell', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                            'between' => '<input type="hidden" value="0" id="Medication_pqmp_smell_" name="data[Padr][pqmp_smell]">
                                                                    <label class="checkbox">',
                            'after' => 'The smell is unusual </label>',
                        ));
                        echo $this->Form->input('pqmp_working', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                            'between' => '<input type="hidden" value="0" id="Medication_pqmp_working_" name="data[Padr][pqmp_working]">
                                                                    <label class="checkbox">',
                            'after' => 'The medicine/device is not working </label>',
                        ));
                        echo $this->Form->input('pqmp_bottle', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                            'between' => '<input type="hidden" value="0" id="Medication_pqmp_bottle_" name="data[Padr][pqmp_bottle]">
                                                                    <label class="checkbox">',
                            'after' => 'The packet or bottle does not seem to be usual or complete </label>',
                        ));



                        // echo $this->Form->input('User.reactors', array('multiple' => 'checkbox', 'options' => ['red yes' => 'red eyes', 'vomitting' => 'vomitting']));
                        ?>
                    </div>
                    <!--/span-->
                    <div class="span6">
                        <?php
                        echo $this->Form->input('any_other_comment', array(
                            'class' => 'span11', 'rows' => '2', 'between' => false, 'div' => false,
                            'label' => array('class' => 'required', 'text' => 'Other wrong things'),
                            'after' => '<span class="help-block">Additional wrong things?</span>',
                        ));
                        ?>
                    </div>
                </div>
                <!--/row-->
            </div>

            <?php echo $this->element('multi/padr_list_of_medicines'); ?>
            <!-- Section to show the outcome -->
            <div style="background-color: lightblue;">
                <h5 style="text-align: center; text-decoration: underline;">OUTCOME DETAILS</h5>
            </div>
            <?php
            echo $this->Form->input('outcome', array(
                'type' => 'select',
                'empty' => true,
                'options' => array(
                    'recovered/resolved' => 'Recovered/resolved',
                    'recovering/resolving' => 'Recovering/resolving',
                    'recovered/resolved with sequelae' => 'Recovered/resolved with sequelae',
                    'not recovered/not resolved' => 'Not recovered/not resolved',
                    'fatal' => 'Fatal',
                    'unknown' => 'Unknown',
                ),
                'label' => array('class' => 'control-label required', 'text' => 'Outcome'),
                'after' => '<a onclick="$(\'#PadrOutcome\').removeAttr(\'disabled\'); $(\'#PadrOutcome\').val(\'\');" >
                                <em class="accordion-toggle">clear!</em></a> </div>',
            ));

            ?>
            <!-- End of outcome section -->
            <?php echo $this->element('multi/attachments', ['model' => 'Padr', 'group' => 'attachment']); ?>

            <div class="row-fluid">
                <div class="span4">
                    <label class="required pull-right" style="color: purple; padding-top: 4px;">Please solve the riddle <i class="fa fa-smile-o" aria-hidden="true"></i></label>
                </div>
                <div class="span8">
                    <?php
                    echo $this->Captcha->input('Padr', array('label' => false, 'type' => 'number'));
                    ?>
                </div>
            </div>

        </div> <!-- /span -->
        <div class="span2">
            <div class="my-sidebar" data-spy="affix">
                <div class="awell">
                    <?php
                    echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit Report', array(
                        'name' => 'saveChanges',
                        'class' => 'btn btn-primary mapop',
                        'id' => 'PadrSaveChanges',
                        'onclick' => "return confirm('Are you sure you wish to submit the report?');",
                        'div' => false,
                    ));
                    ?>
                    <br>
                    <hr>
                    <?php

                    echo $this->Html->link(
                        '<i class="fa fa-times" aria-hidden="true"></i> Cancel',
                        array('controller' => 'pages', 'action' => 'home'),
                        array('escape' => false, 'class' => 'btn btn-block btn-danger')
                    );
                    ?>
                </div>
            </div>
        </div>
    </div> <!-- /row -->
    <?php echo $this->Form->end(); ?>
</section> <!-- /row -->