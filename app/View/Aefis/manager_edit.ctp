<?php
    $this->assign('AEFI', 'active');
    // $this->Html->script('jquery.ui.core', array('inline' => false));
    // $this->Html->script('jquery.ui.widget', array('inline' => false));
    // $this->Html->script('jquery.ui.mouse', array('inline' => false));
    // $this->Html->script('jquery.ui.draggable', array('inline' => false));
    // $this->Html->script('jquery.ui.button', array('inline' => false));
    // $this->Html->script('jquery.ui.position', array('inline' => false));
    // $this->Html->script('jquery.ui.autocomplete', array('inline' => false));
    // $this->Html->script('jquery.ui.dialog', array('inline' => false));
    // $this->Html->script('widgets', array('inline' => false));
    $this->Html->script('aefi', array('inline' => false));
    $this->Html->css('jquery.datetimepicker', null, array('inline' => false));
    $this->Html->script('jquery/jquery.datetimepicker.full', array('inline' => false));
    // $this->AssetCompress->addScript(array(
    //      'jquery.ui.core.js', 'jquery.ui.widget.js', 'jquery.ui.mouse.js', 'jquery.ui.draggable.js', 'jquery.ui.button.js',
    //      'jquery.ui.position.js', 'jquery.ui.autocomplete.js', 'jquery.ui.dialog.js', 'widgets.js', 'aefi.js'), 'aefi-edit.js'
    // );
 ?>

      <!-- AEFI
    ================================================== -->
    <section id="aefisadd">
    <div class="row-fluid">
        <div class="span12">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#" id="aefi_edit_tab1"><?php    echo 'Initial Report ID: '.$this->data['Aefi']['reference_no']; ?></a></li>
            <!-- <li id="aefi_edit_tab2">Follow up Reports()</li> -->
        </ul>

            <?php echo $this->element('aefi/aefi_edit');?>

        </div> <!-- /span -->
    </div> <!-- /row -->
</section> <!-- /row -->

