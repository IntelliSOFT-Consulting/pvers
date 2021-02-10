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
        <h3 style="text-align: center;">Suspected Vaccine(s) <button  type="button" class="btn btn-success btn-small" id="addAefiVaccine">
                          Add     <i class="icon-plus"></i>
                        </button></h3>
      </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
        <?php
          $routes = ['Intramuscular' => 'Intramuscular', 'Subcutaneous' => 'Subcutaneous', 'Intradermal' => 'Intradermal'];
          echo $this->Form->input('liboso', array('type' => 'select', 'options' => $vaccines, 'empty' => true, 'label' => false, 'style' => 'display: none;'));
          echo $this->Form->input('mlishi', array('type' => 'select', 'options' => $routes, 'empty' => true, 'label' => false, 'style' => 'display: none;'));
        ?>
            <table id="listOfVaccinesTable"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th colspan="8" style="width: 70%"><label class="required">Details of Vaccines</label>
                      <?php
                        echo $this->Form->input('list', array('type' => 'hidden', 'value' => ''));
                        echo $this->Form->error('Aefi.list', array('wrap' => 'span', 'class' => 'control-group required error'));                       
          
                      ?>
                    </th>
                    <th colspan="4"><label class="required">Details of Diluents</label></th>
                  </tr>
                  <tr>
                    <th colspan="2" style="width: 20%"> <label class="required">Name of Vaccine <span style="color:red;">*</span></label><small class="help-block">(e.g. BCG, DPT-Hib-HeB)</small></th>
                    <th style="width: 7%"> <label>Dose No.</label></th>
                    <th style="width: 10%"> <label class="required"> Date & Time vaccinated <span style="color:red;">*</span><br><small class="help-block">(dd-mm-yyyy 24Hr:Min)</small></label></th>
                    <th> Route of vaccination <br><small class="help-block">(i.m.,s.c., i.d.)</small></th>
                    <th style="width: 5%"> <label>Site of vaccination </label></th>
                    <th style="width: 5%"> <label>Batch/Lot number </label></th>
                    <th> <label>Manufacturer's Name </label></th>
                    <th> <label>Expiry date </label></th>
                    <th style="width: 7%"> <label>Batch/ Lot Number </label></th>
                    <th style="width: 8%">Manufacturer's Name</th>
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
                          // echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccine_name', array(
                          //   'label' => false, 'between' => false,
                          //   'after' => false, 'class' => 'span11 autosave-ignore vaxname',));
                          echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccine_id', array(
                              'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
                              'type' => 'select',
                              'error' => array('attributes' => array( 'class' => 'help-block')),
                              'options' => $vaccines,
                          ));
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
                            'after' => false, 'class' => 'span11 autosave-ignore date-pick-field',));
                        ?>
                    </td> 
                    <td>
                        <?php
                          // echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccination_route', array(
                          //   'label' => false, 'between' => false,
                          //   'after' => false, 'class' => 'span11 autosave-ignore',));
                          echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccination_route', array(
                              'empty' => true, 'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore',
                              'type' => 'select',
                              'error' => array('attributes' => array( 'class' => 'help-block')),
                              'options' => $routes,
                          ));
                        ?>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('AefiListOfVaccine.'.$i.'.vaccination_site', array(
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
                            'after' => false, 'class' => 'span11 autosave-ignore date-pick-expire',));
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
                            'after' => false, 'class' => 'span11 autosave-ignore date-pick-expire',));
                      ?>
                    </td>
                    <td>
                        <button  type="button" class="btn btn-danger btn-sm remove-vaccine"  value="<?php if (isset($this->request->data['AefiListOfVaccine'][$i]['id'])) { echo $this->request->data['AefiListOfVaccine'][$i]['id']; } ?>" >
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
