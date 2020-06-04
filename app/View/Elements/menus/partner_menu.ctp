

    <div class="menu text-center">
    <ul class="nav nav-pills center-pills">
      <li class="<?php echo $this->fetch('Dashboard') ?>">
        <?php
          echo $this->Html->link('<i class="icon-dashboard"></i> Dashboard',
          array('controller' => 'users', 'action'=>'dashboard', 'partner' => true ), array('escape' => false ));
            ?>
       </li>
       <li class="<?php echo $this->fetch('Applications') ?>">
        <?php
          echo $this->Html->link('<i class="icon-file-text"></i> My Applications',
            array('controller' => 'applications', 'action'=>'index', 'partner' => true ), array('escape' => false ));
            ?>
       </li>
       <li class="<?php echo $this->fetch('ContactUs') ?>">
        <?php
          echo $this->Html->link('<i class="icon-comment-alt"></i> My Messages',
            array('controller' => 'feedbacks', 'action'=>'add', 'partner' => false ), array('escape' => false ));
            ?>
       </li>
       <li class="<?php echo $this->fetch('Profile') ?>">
        <?php
          echo $this->Html->link('<i class="icon-user"></i> My Profile',
            array('controller' => 'users', 'action'=>'profile', 'admin' => false ), array('escape' => false ));
            ?>
       </li>
    </ul>

    </div><!-- /.nav-collapse -->
  
