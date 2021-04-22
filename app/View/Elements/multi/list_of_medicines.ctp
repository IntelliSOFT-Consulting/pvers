<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ $
 */
    // $this->Html->script('multi/list_of_s', array('inline' => false));
  $this->Html->script('list_of_medicines', array('inline' => false));
?>
    <div class="row-fluid">
      <div class="span12">
        <h5 style="text-align: center;">Past medication history (List all medicines used in the last 3 months including OTC, herbals, if pregnant indicate medicines used in the 1st trimester) <button  type="button" class="btn btn-success btn-small" id="addMedicine">
                          Add     <i class="icon-plus"></i>
                        </button></h5>
      </div>
    </div>                  

    <div class="row-fluid">
        <div class="span12">
            <table id="listOfMedicinesTable"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th colspan="2" style="width: 15%"> <label class="required">INN/Generic Name</label></th>
                    <th> <label>Brand Name</label></th>
                    <th> <label>Batch/ Lot No.</label></th>
                    <th> <label>Manufacturer</label></th>
                    <th colspan="2" style="width: 13%;">
                      <label class="required">DOSE <span style="color:red;">*</span></label>
                    </th>
                    <th colspan="2" style="width: 15%;">
                      <label class="required">ROUTE AND FREQUENCY <span style="color:red;">*</span></label>
                    </th>
                    <th style="width: 20%;" colspan="2">
                      <h6>Treatment Period <span class="help-block"> (dd-mm-yyyy) </span></h6>
                      <label class="required pull-left">Start Date <span style="color:red;">*</span></label>          
                      <span class="pull-right" style="padding-right: 10px;">Stop Date</span>
                    </th>
                    <th> Indication </th>
                    <th>  </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // $i = 0;
                    if (!empty($this->request->data['SadrListOfMedicine'])) {
                     for ($i = 0; $i <= count($this->request->data['SadrListOfMedicine'])-1; $i++) {   
                  ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.id');
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.drug_name', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td>
                    <td><?php
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.brand_name', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.batch_no', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.manufacturer', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td>
                    <td>
                        <?php                            
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.dose', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td> 
                    <td>
                        <?php                            
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.dose_id', array(
                            'empty' => true, 'label' => false, 'between' => false, 'class' => 'span12',
                            'type' => 'select',
                            'error' => array('attributes' => array( 'class' => 'help-block')),
                            'options' => $dose,
                          ));
                        ?>
                    </td> 
                    <td>
                        <?php                            
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.route_id', array(
                            'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12',
                            'type' => 'select',
                            'error' => array('attributes' => array( 'class' => 'help-block')),
                            'options' => $routes,
                          ));
                        ?>
                    </td>
                    <td>
                        <?php                            
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.frequency_id', array(
                              'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12',
                              'type' => 'select',
                              'options' => $frequency,
                              'error' => array('attributes' => array( 'class' => 'help-block')),
                          ));
                        ?>
                    </td> 
                    <td><?php 
                        echo $this->Form->input('SadrListOfMedicine.'.$i.'.start_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span12 date-pick-from',));
                      ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('SadrListOfMedicine.'.$i.'.stop_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span12 date-pick-to',));
                        ?>
                    </td>
                    
                    <td>
                        <?php                            
                          echo $this->Form->input('SadrListOfMedicine.'.$i.'.indication', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span12',));
                        ?>
                    </td> 

                    <td>
                        <button  type="button" class="btn btn-danger btn-sm remove-medicine"  value="<?php if (isset($this->request->data['SadrListOfMedicine'][$i]['id'])) { echo $this->request->data['SadrListOfMedicine'][$i]['id']; } ?>" >
                              <i class="icon-minus"></i>
                        </button>
                    </td>
                  </tr>
                
                <?php }} ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
