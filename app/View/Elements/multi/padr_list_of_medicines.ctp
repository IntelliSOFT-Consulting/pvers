<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication $aefi
 */
  $this->Html->script('padr_list_of_medicines', array('inline' => false));
?>
    <div class="row-fluid">
      <div class="span12">
        <h5>Medicine details: Please complete the following for medicines involved. Click Add for additional medicines <button  type="button" class="btn btn-success btn-small" id="addPadrlistofMedicine">
                          Add     <i class="icon-plus"></i>
                        </button>
              <?php
                echo $this->Form->input('list', array('type' => 'hidden', 'value' => ''));
                echo $this->Form->error('Medication.list', array('wrap' => 'span', 'class' => 'control-group required error'));
              ?>
                        </h5>
      </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <table id="listOfPadrlistofMedicinesTable"  class="table table-bordered table-condensed table-pvborder">
                <tbody>
                  <?php
                    // $i = 0;
                    if (!empty($this->request->data['PadrlistofMedicine'])) {
                      $dr = count($this->request->data['PadrlistofMedicine'])-1;
                    } else {
                      $dr = 0;
                    }
                    for ($i = 0; $i <= $dr; $i++) {   
                  ?>
                  <tr>
                    <td rowspan="3" class="sailor"><?= $i+1; ?></td>
                    <td><?php
                          echo $this->Form->input('PadrlistofMedicine.'.$i.'.id', array('type' => 'hidden'));                          
                        ?>
                        Name of Medicine
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrlistofMedicine.'.$i.'.product_name', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td>
                    <td>
                      Manufacturer
                    </td>                 
                    <td>
                        <?php
                        echo $this->Form->input('PadrlistofMedicine.'.$i.'.manufacturer', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td> 
                    <td rowspan="3">
                        <button  type="button" class="btn btn-danger btn-sm remove-product"  value="<?php if (isset($medication['PadrlistofMedicine'][$i]['id'])) { echo $medication['PadrlistofMedicine'][$i]['id']; } ?>" >
                              <i class="icon-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td>When did you start taking the medicine?</td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrlistofMedicine.'.$i.'.start_date', array(
                            'type' => 'text', 'label' => false, 'between' => false, 'class' => 'datepickers',
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td>
                    <td>When did you stop taking the medicine?</td>
                    <td>
                        <?php
                        echo $this->Form->input('PadrlistofMedicine.'.$i.'.end_date', array(
                            'type' => 'text', 'label' => false, 'between' => false, 'class' => 'datepickers',
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                  </tr>
                  <tr>
                    <td>Expiry date of the medicine</td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrlistofMedicine.'.$i.'.expiry_date', array(
                            'label' => false, 'between' => false, 'class' => 'datepickers',
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td>                    
                    <td>  </td> 
                    <td>  </td> 
                  </tr>

                
                <?php } ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
