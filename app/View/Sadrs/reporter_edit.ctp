<?php
    $this->assign('SADR', 'active');        
    echo $this->Session->flash();
?>

<?php 
  echo $this->element('sadr/sadr_edit'); 
?>
