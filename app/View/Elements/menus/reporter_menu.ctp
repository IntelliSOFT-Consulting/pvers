<div class="menu ">

<ul class="nav nav-pills center-pills">
    <li class="<?php echo $this->fetch('Dashboard') ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard',
            array('controller' => 'users', 'action'=>'dashboard', 'reporter' => true ), array('escape' => false ));
            ?>
     </li>
    <?php if($this->Session->read('Auth.User.user_type') != 'County Pharmacist') { ?>
     <li class="<?php echo $this->fetch('SADR') ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-ambulance" aria-hidden="true"></i> SADRs',
                array('controller' => 'sadrs', 'action'=>'index', 'reporter' => true ), array('escape' => false ));
            ?>
     </li>             
     <li class="<?php echo $this->fetch('AEFI') ?>">
        <?php
        if($this->Session->read('Auth.User.health_program')!="Cancer/Oncology program"){
            echo $this->Html->link('<i class="fa fa-child" aria-hidden="true"></i> AEFIs',
                array('controller' => 'aefis', 'action'=>'index', 'reporter' => true ), array('escape' => false ));
         } ?>
     </li>
     <li class="<?php echo $this->fetch('PQMP') ?>">
        <?php
         if($this->Session->read('Auth.User.health_program')!="Cancer/Oncology program"){
            echo $this->Html->link('<i class="fa fa-medkit" aria-hidden="true"></i> PQMPs',
                array('controller' => 'pqmps', 'action'=>'index', 'reporter' => true ), array('escape' => false ));
          } ?>
     </li>
     <li class="<?php echo $this->fetch('DEV') ?>">
        <?php
            if($this->Session->read('Auth.User.user_type') != 'Public Health Program') echo $this->Html->link('<i class="fa fa-stethoscope" aria-hidden="true"></i> Devices',
                array('controller' => 'devices', 'action'=>'index', 'reporter' => true ), array('escape' => false ));
            ?>
     </li>
     <li class="<?php echo $this->fetch('MED') ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-chain-broken" aria-hidden="true"></i> Medication Errors',
                array('controller' => 'medications', 'action'=>'index', 'reporter' => true ), array('escape' => false ));
            ?>
     </li>
     <li class="<?php echo $this->fetch('TRN') ?>">
        <?php
            if($this->Session->read('Auth.User.user_type') != 'Public Health Program') echo $this->Html->link('<i class="fa fa-eyedropper" aria-hidden="true"></i> Transfusion Reactions',
                array('controller' => 'transfusions', 'action'=>'index', 'reporter' => true ), array('escape' => false ));
            ?>
     </li>
     <li class="<?php echo $this->fetch('NT') ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Notifications',
                array('controller' => 'notifications', 'action'=>'index', 'reporter' => true ), array('escape' => false ));
            ?>
     </li>
     <?php } ?>
     <?php if($this->Session->read('Auth.User.user_type') == 'County Pharmacist' || $this->Session->read('Auth.User.user_type') == 'Public Health Program') { ?>             
     <li class="<?php echo $this->fetch('Reports') ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-bar-chart" aria-hidden="true"></i> Reports',
                array('controller' => 'reports', 'action'=>'index', 'manager' => false ), array('escape' => false ));
            ?>
     </li>
     <?php } ?>

     <li class="dropdown <?php echo $this->fetch('Profile') ?>">
         <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop7" href="#">
            <i class="fa fa-user-secret" aria-hidden="true"></i> My Profile <b class="caret"></b></a>
          <ul aria-labelledby="drop7" role="menu" class="dropdown-menu">
             <li>
             <?php
              echo $this->Html->link('<i class="icon-user"></i> '.$this->Session->read('Auth.User.name'),
                array('controller' => 'users', 'action'=>'changePassword', 'admin' => false ), array('escape' => false ));
              ?>
            </li>
          <li class="divider"></li>
             <li>
              <?php
              echo $this->Html->link('<i class="fa fa-university" aria-hidden="true"></i> '.$this->Session->read('Auth.User.name_of_institution'),
                array('controller' => 'users', 'action'=>'edit', $this->Session->read('Auth.User.id'), 'reporter' => false ), array('escape' => false ));
              ?>
            </li>
        </ul>
     </li>
</ul>

</div>

<hr class="soften">