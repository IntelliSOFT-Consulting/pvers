<?php
    $this->assign('DEV', 'active');
    $this->Html->script('device', array('inline' => false));
 ?>

      <!-- AEFI
    ================================================== -->
<section id="devicesadd">
    <div class="row-fluid">
        <div class="span12">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#" id="device_edit_tab1"><?php    echo 'Initial Report ID: '.$this->data['Device']['reference_no']; ?></a></li>
            <!-- <li id="device_edit_tab2">Follow up Reports()</li> -->
        </ul>

            <?php echo $this->element('device/device_edit');?>

        </div> <!-- /span -->
    </div> <!-- /row -->
</section> <!-- /row -->

