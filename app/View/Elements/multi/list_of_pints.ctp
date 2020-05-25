<?php
/**
 * @var \App\View\AppView $this
 */
  $this->Html->script('list_of_pints', array('inline' => false));
?>
    <div class="row-fluid">
      <div class="span12">
        <h5 style="text-align: center;">COMPONENT INFORMATION <button  type="button" class="btn btn-success btn-small" id="addPint">
                          Add     <i class="icon-plus"></i>
                        </button>
              <?php
                echo $this->Form->input('list', array('type' => 'hidden', 'value' => ''));
                echo $this->Form->error('Transfusion.list', array('wrap' => 'span', 'class' => 'control-group required error'));
              ?>
                        </h5>
      </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <table id="listOfPintsTable"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th></th>
                    <th style="width: 35%"> <label class="required">Type of component</label></th>
                    <th> <label>Pint No.</label></th>
                    <th> Expiry Date</th>
                    <th> Volume Transfused </th>
                    <th> # </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // $i = 0;
                    if (!empty($this->request->data['Pint'])) {
                     for ($i = 0; $i <= count($this->request->data['Pint'])-1; $i++) {   
                  ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                          echo $this->Form->input('Pint.'.$i.'.id');
                          echo $this->Form->input('Pint.'.$i.'.component_type', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('Pint.'.$i.'.pint_no', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>                    
                    <td>
                        <?php
                        echo $this->Form->input('Pint.'.$i.'.expiry_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore date-pick-expire',));
                        ?>
                    </td>
                    
                    <td>
                        <?php
                        echo $this->Form->input('Pint.'.$i.'.volume_transfused', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                        <button  type="button" class="btn btn-danger btn-sm remove-pint"  value="<?php if (isset($transfusion['Pint'][$i]['id'])) { echo $transfusion['Pint'][$i]['id']; } ?>" >
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
