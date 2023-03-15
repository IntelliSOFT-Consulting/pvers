<?php
$this->assign('Home', 'active');
$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
$this->Html->script('home', array('inline' => false));
$this->Html->script('holder/holder', array('inline' => false));
$this->Html->css('landing', false, array('inline' => false));
$this->Html->css('upgrade', false, array('inline' => false));
?>
<hr>
<dev class="clint-logo-wrapper">
    <img class="client_logo" src="/img/coa.png" />
    <span class="title_text"> </span>
</dev>
 
<div class="container marketing">
    <h2 style="text-align: center;">Who can report?</h2><br>
    <div class="row-fluid">
        <div class="span6">
            <h5><i class="fa fa-user-md" aria-hidden="true"></i> Health care workers and professionals</h5>
            <p><img src="/img/health2.png" style="width: 140px; margin-right: 10px;" class="pull-left"> All health care workers are required to <a href="/users/register">register</a> first before they can submit reports. The registration details will be used for communication and follow up.</p>
            <p><a class="btn btn-success " href="/users/register">Register &raquo;</a></p>
        </div>
        <div class="span6">
            <h5><i class="fa fa-users" aria-hidden="true"></i> Any member of the public or patient </h5>
            <p><img src="/img/public2.png" style="width: 140px; margin-right: 10px;" class="pull-left"> Any member of the public is able to report any cases of adverse drug reactions or incidents involving medical devices. For minors, parents/gaurdians can report on their behalf.</p>
            <p><a class="btn btn-primary " href="/users/login">Submit a Report &raquo;</a></p>
        </div>
    </div>

    <hr>
    <br><br>
    <!-- What you can report on -->
    <div class="row-fluid">
      <div class="span4">
        <h4 style="text-align: left;">What can you report on?</h4>
        <p style="text-align: left;"><b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </b>Adverse reactions caused by Drugs</p>
        <p style="text-align: left;"><b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Adverse Events Following Immunization</b></p>
        <p style="text-align: left;"><b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Poor Quality Medical Products</b></p>
        <p style="text-align: left;"><b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Medication Errors</b></p>
        <p style="text-align: left;"><b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Reactions caused by Transfusion</b></p>
        <p style="text-align: left;"><b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Medical Devices Incidences</b></p>
        <br>
        <br>
      <p  style="text-align: left;">  More details can be found <a href="/pages/about">here</a></p>
      </div>
    </div>
</div>