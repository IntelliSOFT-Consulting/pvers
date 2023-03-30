<?php
$this->assign('Home', 'active');
$this->Html->css('upgrade', false, array('inline' => false));
?>
<dev class="clint-logo-wrapper">
    <img class="client_logo" src="/img/coa.png" />
    <span class="title_text"> </span>
</dev>
<div class="header_text">
    <b style="color: #777777;">Welcome to PvERS</b>
</div>
<div class="home_container">
    <div class="inner_section" style="background-color: #F7F7F7; position: relative; padding: 0; margin: 15; ">
        <a href="/users/mpublic">
            <div class="launch">
                <span style="display: flex; align-items: center; align-self: center; text-align: center;">Public Reporter</span>
            </div>
        </a>
    </div>
    <div class="inner_section" style="background-color: #F7F7F7; position: relative; margin: 15; padding: 0; ">
        <a href="/users/login">
            <div class="launch">
                <span style="display: flex; align-items: center; align-self: center; text-align: center;">Healthcare Provider</span>
            </div>
        </a>
    </div>  <div class="inner_section" style="background-color: #F7F7F7; position: relative; margin: 15; padding: 0; ">
        <a href="/users/login">
            <div class="launch">
                <span style="display: flex; align-items: center; align-self: center; text-align: center;">Market Authorisation Holder</span>
            </div>
        </a>
    </div>
 
</div>