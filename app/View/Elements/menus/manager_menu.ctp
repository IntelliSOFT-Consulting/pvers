    <div class="menu text-center">

        <ul class="nav nav-pills center-pills">
            <li class="<?php echo $this->fetch('Dashboard') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard',
                    array('controller' => 'users', 'action'=>'dashboard', 'manager' => true ), array('escape' => false ));
                    ?>
             </li>
             <li class="<?php echo $this->fetch('SADR') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-ambulance" aria-hidden="true"></i> SADRs',
                        array('controller' => 'sadrs', 'action'=>'index', 'manager' => true ), array('escape' => false ));
                    ?>
             </li>             
             <li class="<?php echo $this->fetch('AEFI') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-child" aria-hidden="true"></i> AEFIs',
                        array('controller' => 'aefis', 'action'=>'index', 'manager' => true ), array('escape' => false ));
                    ?>
             </li>
             <li class="<?php echo $this->fetch('PQMP') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-medkit" aria-hidden="true"></i> PQMPs',
                        array('controller' => 'pqmps', 'action'=>'index', 'manager' => true ), array('escape' => false ));
                    ?>
             </li>
             <li class="<?php echo $this->fetch('DEV') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-stethoscope" aria-hidden="true"></i> Devices',
                        array('controller' => 'devices', 'action'=>'index', 'manager' => true ), array('escape' => false ));
                    ?>
             </li>
             <li class="<?php echo $this->fetch('MED') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-chain-broken" aria-hidden="true"></i> Medication Errors',
                        array('controller' => 'medications', 'action'=>'index', 'manager' => true ), array('escape' => false ));
                    ?>
             </li>
             <li class="<?php echo $this->fetch('TRN') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-eyedropper" aria-hidden="true"></i> Transfusion Reactions',
                        array('controller' => 'transfusions', 'action'=>'index', 'manager' => true ), array('escape' => false ));
                    ?>
             </li>
             <?php /* ?><?php */ ?>
             <li class="<?php echo $this->fetch('ContactUs') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-envelope-o" aria-hidden="true"></i> My Messages',
                        array('controller' => 'feedbacks', 'action'=>'add', 'manager' => false ), array('escape' => false ));
                    ?>
             </li>
             <li class="dropdown <?php echo $this->fetch('Profile') ?>">
                <?php
                    // echo $this->Html->link('<i class="icon-user"></i> My Profile',
                        // array('controller' => 'users', 'action'=>'profile', 'admin' => false ), array('escape' => false ));
                ?>
             </li>
        </ul>
        
    </div>

<hr class="soften">