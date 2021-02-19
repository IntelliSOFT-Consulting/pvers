<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication $aefi
 */
  $this->Html->script('padr_list_of_medicines', array('inline' => false));
?>
  <div style="background-color: #f5f5a4;"><h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE MEDICINE/VACCINE/DEVICE THAT CAUSED THE REACTION <br><em>(Include all medications)</em></h5></div>

    <div class="row-fluid">
        <div class="span12">
            <table id="listOfPadrListOfMedicinesTable"  class="table table-bordered table-condensed table-pvborder">
                <tbody>
                  <?php
                    // $i = 0;
                    if (!empty($this->request->data['PadrListOfMedicine'])) {
                      $dr = count($this->request->data['PadrListOfMedicine'])-1;
                    } else {
                      $dr = 0;
                    }
                    for ($i = 0; $i <= $dr; $i++) {   
                  ?>
                  <tr>
                    <td rowspan="3" class="sailor"><?= $i+1; ?></td>
                    <td><?php
                          echo $this->Form->input('PadrListOfMedicine.'.$i.'.id', array('type' => 'hidden'));                          
                        ?>
                        Name of Medicine/Vaccine/Device 
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrListOfMedicine.'.$i.'.product_name', array(
                            'label' => false, 'between' => false, 'div' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td>
                    <td>
                      Manufacturer
                    </td>                 
                    <td>
                        <?php
                        echo $this->Form->input('PadrListOfMedicine.'.$i.'.manufacturer', array(
                            'type' => 'text', 'label' => false, 'between' => false, 'div' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                    </td> 
                    <td rowspan="3">
                        <button  type="button" class="btn btn-danger btn-small remove-padr-product"  value="<?php if (isset($medication['PadrListOfMedicine'][$i]['id'])) { echo $medication['PadrListOfMedicine'][$i]['id']; } ?>" >
                              <i class="icon-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td>When did you start taking the medicine/vaccine/device? </td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrListOfMedicine.'.$i.'.start_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,  'div' => false,
                            'class' => 'date-pick-from span11',
                            'after' => false));
                        ?>
                    </td>
                    <td>When did you stop taking the medicine/vaccine? <span class="help-block">(dd-mm-yyyy)</span> </td>
                    <td>
                        <?php
                        echo $this->Form->input('PadrListOfMedicine.'.$i.'.end_date', array(
                            'type' => 'text', 'label' => false, 'between' => false, 
                             'div' => false, 'class' => 'date-pick-to span11',
                            'after' => false));
                        ?>
                    </td> 
                  </tr>
                  <tr>
                    <td>Expiry date of the medicin/vaccine</td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrListOfMedicine.'.$i.'.expiry_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,  'div' => false, 'class' => 'date-pick-field span11',
                            'after' => false));
                        ?>
                    </td>                    
                    <td>Where did you buy the medicine/vaccine?  </td> 
                    <td> <?php
                        echo $this->Form->input('PadrListOfMedicine.'.$i.'.medicine_source', array(
                            'type' => 'text', 'label' => false, 'between' => false, 'div' => false,
                            'after' => false, 'class' => 'span11',));
                        ?>
                   </td> 
                  </tr>

                
                <?php } ?>
                <tr><td colspan="6"><label class="required"> For additional medicines, click <button  type="button" class="btn btn-success btn-mini" id="addPadrListOfMedicine"> Add <i class="fa fa-plus-square" aria-hidden="true"></i>  </button> </label>  </td></tr>
                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->

