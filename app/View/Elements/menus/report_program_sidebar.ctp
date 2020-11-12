    
    <ul class="nav nav-list sidebar-<?php echo $redir; ?>">
      <li class="text-center <?php echo $this->fetch('reports-home'); ?>">
      	<?php
            echo $this->Html->link('REPORTS',  array('controller' => 'reports', 'action'=>'index', 'prefix' => false ), array('escape' => false, 'class' => 'text-success'));
        ?>
      </li>      
      <li class="divider"></li>
      <li class="nav-header"><i class="fa fa-ambulance" aria-hidden="true"></i> SADRs</li>
      <li class="<?php echo $this->fetch('sadrs-by-medicine'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Suspected Medicine',  array('controller' => 'reports', 'action'=>'sadrs_by_medicine', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-child" aria-hidden="true"></i> AEFIs</li>
      <li class="<?php echo $this->fetch('aefis-by-seriousness'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Seriousness of ADRs',  array('controller' => 'reports', 'action'=>'aefis_by_seriousness', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('aefis-by-vaccine'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> AEFIs by Vaccine',  array('controller' => 'reports', 'action'=>'aefis_by_vaccine', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('aefis-by-gender'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Gender',  array('controller' => 'reports', 'action'=>'aefis_by_gender', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-medkit" aria-hidden="true"></i> PQMPs</li>
      <li class="<?php echo $this->fetch('pqmps-by-brand'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Brand Name',  array('controller' => 'reports', 'action'=>'pqmps_by_brand', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('pqmps-by-manufacturer'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Manufacturer',  array('controller' => 'reports', 'action'=>'pqmps_by_manufacturer', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('pqmps-by-supplier'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Supplier',  array('controller' => 'reports', 'action'=>'pqmps_by_supplier', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('pqmps-by-generic'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Generic Name',  array('controller' => 'reports', 'action'=>'pqmps_by_generic', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-chain-broken" aria-hidden="true"></i> Medication Errors</li>
      <li class="<?php echo $this->fetch('medications-by-producti'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Product (intended)',  array('controller' => 'reports', 'action'=>'medications_by_producti', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('medications-by-productii'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Product (error)',  array('controller' => 'reports', 'action'=>'medications_by_productii', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('medications-by-generici'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Generic (intended)',  array('controller' => 'reports', 'action'=>'medications_by_generici', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('medications-by-genericii'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Generic (error)',  array('controller' => 'reports', 'action'=>'medications_by_genericii', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-thermometer-full" aria-hidden="true"></i> SAEs</li>
      <li class="<?php echo $this->fetch('saes-by-medicine'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Suspected Medicine',  array('controller' => 'reports', 'action'=>'saes_by_medicine', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="<?php echo $this->fetch('saes-by-concomittant'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Concomittant Drug',  array('controller' => 'reports', 'action'=>'saes_by_concomittant', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="divider"></li>
    </ul>