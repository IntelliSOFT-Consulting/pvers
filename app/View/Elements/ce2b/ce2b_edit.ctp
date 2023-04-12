<?php
$this->assign('CE2B', 'active');
$this->Html->script('jquery/combobox', array('inline' => false));
$this->Html->script('ce2b', array('inline' => false));
?>

<!-- SADR
    ================================================== -->
<section id="sadrsadd">

    <?php
    echo $this->Session->flash();
    echo $this->Form->create('Ce2b', array(
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
        <div class="span10 formbackc">

            <?php
            echo $this->Form->input('Ce2b.id', array());
            echo $this->Form->input('Ce2b.reference_no', array('type' => 'hidden'));
            ?>

            <p><b>(FOM001/HPT/VMS/SOP/001)</b></p>
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
                        <h5>Tel: +254795743049</h5>
                        <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
                        <h5 style="color: red;">CE2B FORM</h5>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row-fluid">
                <div class="span8">
                    <?php
                    echo $this->Form->input('company_name', array(
                        'label' => array('class' => 'control-label required', 'text' => 'Company Name<span style="color:red;">*</span>'),
                        'placeholder' => ' ', 'title' => 'Company Name',
                        'data-content' => '',
                        'after' => '<p class="help-block"> </p></div>',
                        'class' => 'span9',
                    ));
                    echo $this->Form->input('comment', array(
                        'class' => 'span9',
                        'rows' => '2', 
                        'label' => array(
                            'class' => 'control-label',
                            'text' => 'COMMENT(s)'
                        )
                    ));
                    echo $this->Form->input('e2b_file_data', array(
                        'label' => array(
                            'class' => 'control-label required', 
                            'text' => 'XML File <span style="color:red;">*</span>'),
                        'type' => 'file',
                        'text'=>'XML File'
                    ));
                    ?>
                </div>
            </div>
            <hr> 
            <?php echo $this->element('multi/attachments', ['model' => 'Ce2b', 'group' => 'attachment']); ?>

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
                </div>
                <!--/span-->
                <div class="span6">
                    <?php
                    echo $this->Form->input(
                        'designation_id',
                        array('label' => array('class' => 'control-label required', 'text' => 'DESIGNATION' . ' <span style="color:red;">*</span>'), 'empty' => true)
                    );
                    echo $this->Form->input('reporter_phone', array(
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.' . ' <span style="color:red;">*</span>')
                    ));

                    echo $this->Form->input('reporter_date', array(
                        'type' => 'text', 'class' => 'date-pick-field',
                        'label' => array('class' => 'control-label required', 'text' => 'Date <span style="color:red;">*</span>'),
                    ));
                    ?>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <table class="table table-bordered  table-condensed table-pvborderless">
                <tbody>
                    <tr>
                        <td width="45%">
                            <h5 class="pull-right text-success">Is the person submitting different from reporter?&nbsp;</h5>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->input('person_submitting', array(
                                'type' => 'radio',    'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'person-submit',
                                'before' => '<div class="form-inline">
												<input type="hidden" value="" id="SadrPersonSubmitting_" name="data[Ce2b][person_submitting]">
												<label class="radio">',
                                'after' => '</label>&nbsp;&nbsp;',
                                'options' => array('Yes' => 'Yes'),
                            ));
                            echo $this->Form->input('person_submitting', array(
                                'type' => 'radio',    'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'person-submit',
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
                </div>
                <!--/span-->
                <div class="span6">
                    <?php
                    echo $this->Form->input('reporter_designation_diff', array(
                        'type' => 'select', 'options' => $designations, 'empty' => true, 'class' => 'diff',
                        'label' => array('class' => 'control-label required', 'text' => 'Designation' . ' <span style="color:red;">*</span>'), 'empty' => true
                    ));
                    echo $this->Form->input('reporter_phone_diff', array(
                        'div' => array('class' => 'control-group'), 'class' => 'diff',
                        'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.' . ' <span style="color:red;">*</span>')
                    ));
                    echo $this->Form->input('reporter_date_diff', array(
                        'type' => 'text', 'class' => 'date-pick-field diff',
                        'label' => array('class' => 'control-label required', 'text' => 'Date'),
                    ));
                    ?>
                </div>
                <!--/span-->
            </div>
            <!--/row-->


        </div> <!-- /span -->
        <div class="span2">
            <div class="my-sidebar" data-spy="affix">
                <div class="awell">
                    <?php
                    echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(
                        'name' => 'saveChanges',
                        'class' => 'btn btn-success mapop',
                        'formnovalidate' => 'formnovalidate',
                        'id' => 'SadrSaveChanges', 'title' => 'Save & continue editing',
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
                        'onclick' => "return confirm('Are you sure you wish to submit the report?');",
                        'class' => 'btn btn-primary btn-block mapop',
                        'id' => 'SiteInspectionSubmitReport', 'title' => 'Save and Submit Report',
                        'data-content' => 'Submit report for peer review and approval.',
                        'div' => false,
                    ));

                    ?>
                    <br>
                    <hr>
                    <?php
                    echo $this->Html->link(
                        '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF',
                        array('action' => 'view', 'ext' => 'pdf', $this->request->data['Ce2b']['id']),
                        array(
                            'escape' => false, 'class' => 'btn btn-info btn-block mapop', 'title' => 'Download PDF',
                            'data-content' => 'Download the pdf version of the report',
                        )
                    );
                    ?>
                    <br>
                    <hr>
                    <?php

                    echo $this->Html->link(
                        '<i class="fa fa-times" aria-hidden="true"></i> Cancel',
                        array('controller' => 'users', 'action' => 'dashboard'),
                        array('escape' => false, 'class' => 'btn btn-danger btn-block')
                    );
                    ?>
                </div>
            </div>
        </div>
    </div> <!-- /row -->
    <?php echo $this->Form->end(); ?>
</section> <!-- /row -->