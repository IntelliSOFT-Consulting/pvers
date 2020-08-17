<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication $aefi
 */
  $this->Html->script('list_of_products', array('inline' => false));
?>
    <div class="row-fluid">
      <div class="span12">
        <h4>Product details: Please complete the following for products involved. Click Add for additional products <button  type="button" class="btn btn-success btn-small" id="addMedicationProduct">
                          Add     <i class="icon-plus"></i>
                        </button>
              <?php
                echo $this->Form->input('list', array('type' => 'hidden', 'value' => ''));
                echo $this->Form->error('Medication.list', array('wrap' => 'span', 'class' => 'control-group required error'));
              ?>
                        </h4>
      </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <table id="listOfMedicationProductsTable"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th></th>
                    <th style="width: 35%"> <label class="required">Product Description</label></th>
                    <th> <label class="required">Product No. 1 (intended) <span style="color:red;">*</span></label></th>
                    <th> Product No. 2 (error) <span style="color:red;">*</span></th>
                    <th> # </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // $i = 0;
                    if (!empty($this->request->data['MedicationProduct'])) {
                      $dr = count($this->request->data['MedicationProduct'])-1;
                    } else {
                      $dr = 0;
                    }
                    for ($i = 0; $i <= $dr; $i++) {   
                  ?>
                  <tr>
                    <td rowspan="8" class="sailor"><?= $i+1; ?></td>
                    <td><?php
                          echo $this->Form->input('MedicationProduct.'.$i.'.id');                          
                        ?>
                        Generic name (active ingredient)
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('MedicationProduct.'.$i.'.generic_name_i', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>                    
                    <td>
                        <?php
                        echo $this->Form->input('MedicationProduct.'.$i.'.generic_name_ii', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                    <td rowspan="8">
                        <button  type="button" class="btn btn-danger btn-sm remove-product"  value="<?php if (isset($this->request->data['MedicationProduct'][$i]['id'])) { echo $this->request->data['MedicationProduct'][$i]['id']; } ?>" >
                              <i class="icon-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td>Brand/ Product Name</td>
                    <td>
                        <?php
                          echo $this->Form->input('MedicationProduct.'.$i.'.product_name_i', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>                    
                    <td>
                        <?php
                        echo $this->Form->input('MedicationProduct.'.$i.'.product_name_ii', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                  </tr>
                  <tr>
                    <td>Dosage form</td>
                    <td>
                        <?php
                          echo $this->Form->input('MedicationProduct.'.$i.'.dosage_form_i', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>                    
                    <td>
                        <?php
                        echo $this->Form->input('MedicationProduct.'.$i.'.dosage_form_ii', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                  </tr>
                  <tr>
                    <td>Dose, frequency, duration, route</td>
                    <td>
                        <?php
                          echo $this->Form->input('MedicationProduct.'.$i.'.dosage_i', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>                    
                    <td>
                        <?php
                        echo $this->Form->input('MedicationProduct.'.$i.'.dosage_ii', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                  </tr>
                  <tr>
                    <td colspan="3"><p><i>Please fill below if error involved look alike (similar) product packaging</i></p></td>
                  </tr>
                  <tr>
                    <td>Manufacturer</td>
                    <td>
                        <?php
                          echo $this->Form->input('MedicationProduct.'.$i.'.manufacturer_i', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>                    
                    <td>
                        <?php
                        echo $this->Form->input('MedicationProduct.'.$i.'.manufacturer_ii', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                  </tr>
                  <tr>
                    <td>Strength/concentration</td>
                    <td>
                        <?php
                          echo $this->Form->input('MedicationProduct.'.$i.'.strength_i', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>                    
                    <td>
                        <?php
                        echo $this->Form->input('MedicationProduct.'.$i.'.strength_ii', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                  </tr>
                  <tr>
                    <td>Type and size of container</td>
                    <td>
                        <?php
                          echo $this->Form->input('MedicationProduct.'.$i.'.container_i', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>                    
                    <td>
                        <?php
                        echo $this->Form->input('MedicationProduct.'.$i.'.container_ii', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                  </tr>
                
                <?php } ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
