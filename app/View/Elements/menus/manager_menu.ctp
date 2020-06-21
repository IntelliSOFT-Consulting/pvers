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


           <li class="dropdown <?php echo $this->fetch('Reports') ?>">
             <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop4" href="#">
                <i class="fa fa-bar-chart" aria-hidden="true"></i> Reports <b class="caret"></b></a>
              <ul aria-labelledby="drop4" role="menu" class="dropdown-menu">
                 <li><?php
                            echo $this->Html->link('<i class="icon-signal"></i> SADRS by Designation',  array('controller' => 'reports', 'action'=>'sadrs_by_designation', 'admin' => false ),
                                      array('escape' => false, 'tabindex' => '-1'));
                        ?>
                </li>
                <li><?php
                            echo $this->Html->link('<i class="icon-signal"></i> AEFIs by Designation',  array('controller' => 'reports', 'action'=>'aefis_by_designation', 'admin' => false ),
                                      array('escape' => false, 'tabindex' => '-1'));
                        ?>
                </li>
                <li><?php
                            echo $this->Html->link('<i class="icon-signal"></i> PQMPs by Designation',  array('controller' => 'reports', 'action'=>'pqmps_by_designation', 'admin' => false ),
                                      array('escape' => false, 'tabindex' => '-1'));
                        ?>
                </li>
                <li><?php
                            echo $this->Html->link('<i class="icon-signal"></i> Devices by Designation',  array('controller' => 'reports', 'action'=>'devices_by_designation', 'admin' => false ),
                                      array('escape' => false, 'tabindex' => '-1'));
                        ?>
                </li>
              <li class="divider"></li>
                 
            </ul>
           </li>

             <li class="<?php echo $this->fetch('NT') ?>">
                <?php
                    echo $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Notifications',
                        array('controller' => 'notifications', 'action'=>'index', 'manager' => true ), array('escape' => false ));
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