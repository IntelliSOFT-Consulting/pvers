<?php
    $this->assign('CE2B', 'active');        
    echo $this->Session->flash();
?>

<?php 
  echo $this->element('ce2b/ce2b_edit'); 
?>
