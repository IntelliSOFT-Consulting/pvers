<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'PvERS: the Pharmacovigilance Electronic Reporting System');
?>
<!DOCTYPE html>
<html>

<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $cakeDescription ?>:
    <?php echo $this->fetch('title'); ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php
  echo $this->Html->meta('icon');

  echo $this->Html->css('bootstrap/bootstrap');
  echo $this->Html->css('font-awesome/font-awesome');
  echo $this->Html->css('jquery-ui-themes-1.12.1/jquery-ui');
  echo $this->Html->css('pvers');
  echo $this->Html->css('bootstrap/bootstrap-responsive');

  echo $this->Html->script('jquery/jquery-1.12.4');
  echo $this->Html->script('jquery-ui-1.12.1/jquery-ui');
  echo $this->Html->script('bootstrap/bootstrap.min');
  echo $this->Html->script('pvers');

  echo $this->fetch('meta');
  echo $this->fetch('css');
  echo $this->fetch('script');
  echo $this->Html->meta('icon', $this->webroot . 'img/favicon.ico');
  ?>
</head>

<body class="">
  <div class="navbar navbar-<?php echo $redir; ?> navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img style="float:left; width: 40px; padding-right: 10px;" alt="Pharmacy and Poisons Board" src="/img/coa.png" border="0"><a class="brand" href="#">PvERS</a>
        <div class="nav-collapse collapse">
        
          <ul class="nav pull-right">
            <?php
            if ($this->Session->read('Auth.User')) {
              echo '<li class="' . $this->fetch('Profile') . '">' . $this->Html->link('<i class="fa fa-user-circle-o"></i> ' . $this->Session->read('Auth.User.username'), array('controller' => 'users', 'action' => 'changePassword', 'admin' => false), array('escape' => false)) . '</li>';
              echo '<li class="active">' . $this->Html->link('<i class="fa fa-sign-out"></i> Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false), array('escape' => false)) . '</li>';
            } else {
              echo '<li class="' . $this->fetch('Login') . '">' . $this->Html->link('<i class="fa fa-sign-in"></i> Login', array('controller' => 'users', 'action' => 'login'), array('escape' => false)) . '</li>';
              echo '<li class="' . $this->fetch('Register') . '">' . $this->Html->link('<i class="fa fa-edit"></i> Register', array('controller' => 'users', 'action' => 'register'), array('escape' => false)) . '</li>';
            }
            ?>
          </ul>
          <ul class="nav">
            <li class="<?php echo $this->fetch('Home'); ?>"><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li class="<?php echo $this->fetch('About'); ?>"><a href="/pages/about"><i class="fa fa-book"></i> About</a></li>
            <?php if (!$this->Session->read('Auth.User')) {
                               echo '<li class="' . $this->fetch('PADR') . '">' . $this->Html->link('<i class="fa fa-pencil"></i> Report', array('controller' => 'padrs', 'action' => 'add'), array('escape' => false)) . '</li>';
            }?>
            <!-- <li class="<?php echo $this->fetch('PADR'); ?>"><a href="/padrs/add"><i class="fa fa-pencil" aria-hidden="true"></i> Report</a></li> -->
            <li class="<?php echo $this->fetch('Summaries'); ?>"><a href="/reports/index"><i class="fa fa-bar-chart" aria-hidden="true"></i> Summaries</a></li>
            <li class="<?php echo $this->fetch('Faqs'); ?>"><a href="/pages/faqs"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Faqs</a></li>
            <li class="<?php echo $this->fetch('ContactUs'); ?>"><a href="/feedbacks/add"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Contact us</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div id="content">
      <?php
      if ($this->Session->read('Auth.User.group_id')) {
        if ($this->Session->read('Auth.User.group_id') == '1') echo $this->element('menus/admin_menu');
        if ($this->Session->read('Auth.User.group_id') == '2') echo $this->element('menus/manager_menu');
        if ($this->Session->read('Auth.User.group_id') == '3') echo $this->element('menus/reporter_menu');
        if ($this->Session->read('Auth.User.group_id') == '4') echo $this->element('menus/partner_menu');
        if ($this->Session->read('Auth.User.group_id') == '6') echo $this->element('menus/reviewer_menu');
      }
      ?>
      <?php echo $this->Flash->render(); ?>
      <?php
      echo $this->Session->flash();
      echo $this->Session->flash('auth');
      ?>
      <?php echo $this->fetch('content'); ?>
    </div>

    <hr>

  </div><!--/.fluid-container-->

  <footer class="section footer-classic footer-<?php echo $redir; ?> context-dark bg-image"><!-- 474b35 37462d-->
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span4">
          <div class="pr-xl-4">
            <a class="brand" href="/"><img class="brand-logo-light" src="/img/doktari.png"></a>
            <p> Ensuring Safety, Quality and Efficacy of Medicines.</p>
            <!-- Rights-->
            <p class="rights"><span>&copy; </span><span class="copyright-year"><?php echo date('Y'); ?></span><span> </span><span>Pharmacy and Poisons Board</span><span>. </span><span>All Rights Reserved.</span></p>
          </div>
        </div>
        <div class="span4">
          <h5>Contacts</h5>
          <dl class="contact-list">
            <dt>Address:</dt>
            <dd>Lenana Road, Nairobi</dd>
          </dl>
          <dl class="contact-list">
            <dt>email:</dt>
            <dd><a href="mailto:#">pv@pharmacyboardkenya.org</a></dd>
            <dd><a href="mailto:#">regulatory@pharmacyboardkenya.org</a></dd>
          </dl>
          <dl class="contact-list">
            <dt>Tel:</dt>
            <dd>+254795743049</dd>
          </dl>
        </div>
        <div class="span4 social-inner ">
          <h5>Links</h5>
          <ul class="nav-list">
            <li><a href="#">About</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contacts</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Le javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- <script src="../assets/js/jquery.js"></script> -->
  <?php
  // echo $this->Html->script('bootstrap/bootstrap');
  ?>
</body>

</html>