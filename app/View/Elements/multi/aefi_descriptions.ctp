<?php
    $this->Html->script('aefi_descriptions', array('inline' => false));
?>
<h5> <small>
<button type="button" class="btn btn-small btn-primary" id="addAefiDescription">Add description</button></small> </h5>

<div>
  <div id="aefi-descriptions">
    <?php
      if (!empty($this->request->data['AefiDescription'])) {
          for ($i = 0; $i <= count($this->request->data['AefiDescription'])-1; $i++) {
          ?>
          <div class="aefi-description-group">
            <div class="row-fluid">
                <div class="span12">
                <?php
                    // echo $this->Form->input('AefiDescription.'.$i.'.id', ['templates' => 'table_form']);
                    echo $this->Form->input('AefiDescription.'.$i.'.id');
                    echo $this->Form->input('AefiDescription.'.$i.'.description',
                    // make if fit the entire width of the form
                    // ['templates' => 'table_form', 'label' => false, 'div' => false, 'class' => 'span12']);
                                array('label' => false, 'rows' => 3,'class' => 'span12 autocomplete'));

                ?>
              
                </div> 
              <div class="row-fluid">
                <div class="span12">
                  <?php 
                    echo $this->Html->tag('div', '<button id="aefi_descriptionsButton'.$i.'" class="btn btn-small btn-danger removeAefiDescription" type="button">Remove</button>', array(
                        'class' => 'controls', 'escape' => false));
                    echo $this->Html->tag('hr', '', array('id' => 'AefiDescriptionHr'.$i)); 
                  ?>
                </div>
              </div>
            </div>
          </div>
                <?php
                }
            }
        ?>
  </div>
</div>
