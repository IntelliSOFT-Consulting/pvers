<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
    // $this->Html->script('multi/list_of_aefis', array('inline' => false));
  $this->Html->script('list_of_vaccines', array('inline' => false));
?>
    <div class="row-fluid">
      <div class="span12">
        <h3 style="text-align: center;">Vaccines <button  type="button" class="btn btn-success btn-small" id="addAefiVaccine">
                          Add     <i class="icon-plus"></i>
                        </button></h3>
      </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <table id="listOfVaccinesTable"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th colspan="7" style="width: 65%">Details of Vaccines</th>
                    <th colspan="5">Details of Diluents</th>
                  </tr>
                  <tr>
                    <th colspan="2" style="width: 20%"> Name of Vaccine <small class="help-block">(e.g. BCG, DPT-Hib-HeB)</small></th>
                    <th style="width: 7%"> Dose No.</th>
                    <th> Date vaccinated <br><small class="help-block">Format dd-mm-yyyy</small></th>
                    <th> Route,site of vaccination <br><small class="help-block">(i.m.,s.c., i.d.)</small></th>
                    <th style="width: 5%"> Batch/Lot number </th>
                    <th> Manufacturer's Name </th>
                    <th> Expiry date </th>
                    <th> Batch/ Lot Number </th>
                    <th style="width: 10%"> Manufacturer's Name </th>
                    <th> Expiry date </th>
                    <th> # </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // $i = 0;
                    if (!empty($this->request->data['AefiListOfVaccine'])) {
                     for ($i = 0; $i <= count($this->request->data['AefiListOfVaccine'])-1; $i++) {   
                  ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                          echo $this->Form->input('AefiListOfVaccine.'.$i.'.id');
                          echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccine_name', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('AefiListOfVaccine.'.$i.'.dosage', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                        <?php                            
                          echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccination_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                    <td>
                        <?php
                          echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccination_route', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td><?php 
                        echo $this->Form->input('AefiListOfVaccine.'.$i.'.batch_number', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                      ?>
                    </td>
                    <td><?php 
                        echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccine_manufacturer', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                      ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('AefiListOfVaccine.'.$i.'.expiry_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    
                    <td>
                        <?php
                        echo $this->Form->input('AefiListOfVaccine.'.$i.'.diluent_batch_number', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                      <?php
                        echo $this->Form->input('AefiListOfVaccine.'.$i.'.diluent_manufacturer', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $this->Form->input('AefiListOfVaccine.'.$i.'.diluent_expiry_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                      ?>
                    </td>
                    <td>
                        <button  type="button" class="btn btn-danger btn-sm remove-vaccine"  value="<?php if (isset($aefi['AefiListOfVaccine'][$i]['id'])) { echo $aefi['AefiListOfVaccine'][$i]['id']; } ?>" >
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
