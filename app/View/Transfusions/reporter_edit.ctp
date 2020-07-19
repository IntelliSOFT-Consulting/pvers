<?php
    $this->assign('TRN', 'active');
    $this->Html->script('transfusion', array('inline' => false));
 ?>

      <!-- TRN
    ================================================== -->
<section id="medicationsadd">
    <div class="row-fluid">
        <div class="span12">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#" id="medication_edit_tab1"><?php    echo 'Initial Report ID: '.$this->data['Transfusion']['reference_no']; ?></a></li>
            <!-- <li id="medication_edit_tab2">Follow up Reports()</li> -->
        </ul>

            <?php echo $this->element('transfusion/transfusion_edit');?>

        </div> <!-- /span -->
    </div> <!-- /row -->
</section> <!-- /row -->