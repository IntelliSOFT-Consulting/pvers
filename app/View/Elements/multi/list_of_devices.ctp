<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ $
 */
    // $this->Html->script('multi/list_of_s', array('inline' => false));
  $this->Html->script('list_of_devices', array('inline' => false));
?>
    <div class="row-fluid">
      <div class="span12">
        <h4 style="text-align: center;">9. List of other/associated devices involved in the event <button  type="button" class="btn btn-success btn-small" id="addDevice">
                          Add     <i class="icon-plus"></i>
                        </button></h4>
      </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <table id="listOfDevicesTable"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th colspan="2" style="width: 15%"> <label class="required">Brand Name/Commercial Name</label></th>
                    <th> <label class="required">Serial/Lot No.</label></th>
                    <th> <label class="required">Common Name</label></th>
                    <th> <label class="required">Manufacturer's Name</label></th>
                    <th> <label class="required">Manufacture Date </label></th>
                    <th> <label class="required">Expiry date </label></th>
                    <th> # </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // $i = 0;
                    if (!empty($this->request->data['ListOfDevice'])) {
                     for ($i = 0; $i <= count($this->request->data['ListOfDevice'])-1; $i++) {   
                  ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                          echo $this->Form->input('ListOfDevice.'.$i.'.id');
                          echo $this->Form->input('ListOfDevice.'.$i.'.brand_name', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('ListOfDevice.'.$i.'.serial_no', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                        <?php                            
                          echo $this->Form->input('ListOfDevice.'.$i.'.common_name', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td> 
                    <td>
                        <?php
                          echo $this->Form->input('ListOfDevice.'.$i.'.manufacturer', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td><?php 
                        echo $this->Form->input('ListOfDevice.'.$i.'.manufacture_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore date-pick-field',));
                      ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('ListOfDevice.'.$i.'.expiry_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore date-pick-expire',));
                        ?>
                    </td>
                    
                    <td>
                        <button  type="button" class="btn btn-danger btn-sm remove-device"  value="<?php if (isset($this->request->data['ListOfDevice'][$i]['id'])) { echo $this->request->data['ListOfDevice'][$i]['id']; } ?>" >
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
