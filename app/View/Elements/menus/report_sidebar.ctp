    
    <ul class="nav nav-list sidebar-<?php echo $redir; ?>">
      <li class="text-center <?php echo $this->fetch('reports-home'); ?>">
      	<?php
            echo $this->Html->link('REPORTS',  array('controller' => 'reports', 'action'=>'index', 'prefix' => false ), array('escape' => false, 'class' => 'text-success'));
        ?>
      </li>      
      <li class="divider"></li>
      <li class="nav-header"><i class="fa fa-ambulance" aria-hidden="true"></i> SADRs</li>
      <li class="<?php echo $this->fetch('sadrs-by-designation'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reporter Qualification',  array('controller' => 'reports', 'action'=>'sadrs_by_designation', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('sadrs-by-age'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Age groups',  array('controller' => 'reports', 'action'=>'sadrs_by_age', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('sadrs-by-seriousness'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Seriousness of ADRs',  array('controller' => 'reports', 'action'=>'sadrs_by_seriousness', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('sadrs-by-reason'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reason for Seriousness',  array('controller' => 'reports', 'action'=>'sadrs_by_reason', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-child" aria-hidden="true"></i> AEFIs</li>
      <li class="<?php echo $this->fetch('aefis-by-designation'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reporter Qualification',  array('controller' => 'reports', 'action'=>'aefis_by_designation', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('aefis-by-age'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Age groups',  array('controller' => 'reports', 'action'=>'aefis_by_age', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('aefis-by-seriousness'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Seriousness of ADRs',  array('controller' => 'reports', 'action'=>'aefis_by_seriousness', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('aefis-by-reason'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reason for Seriousness',  array('controller' => 'reports', 'action'=>'aefis_by_reason', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-medkit" aria-hidden="true"></i> PQMPs</li>
      <li class="<?php echo $this->fetch('pqmps-by-designation'); ?>">
      	<?php
	        echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reporter Qualification',  array('controller' => 'reports', 'action'=>'pqmps_by_designation', 'admin' => false ),
	                  array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-stethoscope" aria-hidden="true"></i> Medical Devices</li>
      <li class="<?php echo $this->fetch('devices-by-designation'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reporter Qualification',  array('controller' => 'reports', 'action'=>'devices_by_designation', 'admin' => false ),
                      array('escape' => false));
        ?>                        	
      </li>
      <li class="<?php echo $this->fetch('devices-by-age'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Age groups',  array('controller' => 'reports', 'action'=>'devices_by_age', 'admin' => false ),
                      array('escape' => false));
        ?>                        	
      </li>
      <li class="<?php echo $this->fetch('devices-by-seriousness'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Seriousness of ADRs',  array('controller' => 'reports', 'action'=>'devices_by_seriousness', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('devices-by-reason'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reason for Seriousness',  array('controller' => 'reports', 'action'=>'devices_by_reason', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-chain-broken" aria-hidden="true"></i> Medication Errors</li>
      <li class="<?php echo $this->fetch('medications-by-designation'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reporter Qualification',  array('controller' => 'reports', 'action'=>'medications_by_designation', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('medications-by-age'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Age group',  array('controller' => 'reports', 'action'=>'medications_by_age', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-eyedropper" aria-hidden="true"></i> Blood Transfusion</li>
      <li class="<?php echo $this->fetch('transfusions-by-designation'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Reporter Qualification',  array('controller' => 'reports', 'action'=>'transfusions_by_designation', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('transfusions-by-age'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Age group',  array('controller' => 'reports', 'action'=>'transfusions_by_age', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-thermometer-full" aria-hidden="true"></i> SAEs</li>
      <li class="<?php echo $this->fetch('saes-by-age'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Age group',  array('controller' => 'reports', 'action'=>'saes_by_age', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="divider"></li>
    </ul>