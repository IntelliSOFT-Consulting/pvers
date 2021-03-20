<?php
    $this->Html->script('sadr_descriptions', array('inline' => false));
?>
<h5> 
  <div class="control-group"><div class="controls"> <small><button type="button" class="btn btn-small btn-primary" id="addSadrDescription">Add description</button></small> </div> </div>
</h5>

<div>
  <div id="sadr-descriptions">
    <?php
      if (!empty($this->request->data['SadrDescription'])) {
          for ($i = 0; $i <= count($this->request->data['SadrDescription'])-1; $i++) {
          ?>
          <div class="sadr-description-group">
            <div class="row-fluid">
                <div class="span12">
                <?php
                    // echo $this->Form->input('SadrDescription.'.$i.'.id', ['templates' => 'table_form']);
                    echo $this->Form->input('SadrDescription.'.$i.'.id');
                    echo $this->Form->input('SadrDescription.'.$i.'.description',
                                array('label' => false, 'rows' => 3));
                    

                ?>
              
                </div> 
              <div class="row-fluid">
                <div class="span12">
                  <?php 
                    echo $this->Html->tag('div', '<button id="sadr_descriptionsButton'.$i.'" class="btn btn-small btn-danger removeSadrDescription" type="button">Remove</button>', array(
                        'class' => 'controls', 'escape' => false));
                    echo $this->Html->tag('hr', '', array('id' => 'SadrDescriptionHr'.$i)); 
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
