<?php
    $this->assign('AEFI', 'active');
    $this->Html->script('jquery.ui.core', array('inline' => false));
    $this->Html->script('jquery.ui.widget', array('inline' => false));
    $this->Html->script('jquery.ui.mouse', array('inline' => false));
    $this->Html->script('jquery.ui.draggable', array('inline' => false));
    $this->Html->script('jquery.ui.button', array('inline' => false));
    $this->Html->script('jquery.ui.position', array('inline' => false));
    $this->Html->script('jquery.ui.autocomplete', array('inline' => false));
    $this->Html->script('jquery.ui.dialog', array('inline' => false));
    $this->Html->script('widgets', array('inline' => false));
    $this->Html->script('device', array('inline' => false));
    $this->Html->css('jquery.datetimepicker', null, array('inline' => false));
    $this->Html->script('jquery.datetimepicker.full', array('inline' => false));
    // $this->AssetCompress->addScript(array(
    //      'jquery.ui.core.js', 'jquery.ui.widget.js', 'jquery.ui.mouse.js', 'jquery.ui.draggable.js', 'jquery.ui.button.js',
    //      'jquery.ui.position.js', 'jquery.ui.autocomplete.js', 'jquery.ui.dialog.js', 'widgets.js', 'device.js'), 'device-edit.js'
    // );
 ?>

      <!-- AEFI
    ================================================== -->
<section id="devicesadd">
    <div class="row-fluid">
        <div class="span12">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#" id="device_edit_tab1"><?php    echo 'Initial Report ID: '.$this->data['Device']['id']; ?></a></li>
            <!-- <li id="device_edit_tab2">Follow up Reports()</li> -->
        </ul>

            <?php echo $this->element('device/device_edit');?>

        </div> <!-- /span -->
    </div> <!-- /row -->
</section> <!-- /row -->

