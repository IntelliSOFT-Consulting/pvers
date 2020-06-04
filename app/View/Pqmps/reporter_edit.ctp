<?php
    $this->assign('PQMP', 'active');        
    echo $this->Session->flash();
?>

<?php 
  echo $this->element('pqmp/pqmp_edit'); 
?>
