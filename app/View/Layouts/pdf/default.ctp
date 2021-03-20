<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- <link rel="STYLESHEET" href="http://localhost/css/pdf.css" type="text/css" /> -->
   <?php
        //echo $this->Html->css('bootstrap', null,array('fullBase' => true));
        //echo $this->Html->css('ctr-fix', null,array('fullBase' => true));
        echo $this->Html->css('pdf', null,array('fullBase' => true));
   ?>
   <style type="text/css">
      * {
      font-family: "DejaVu Sans";
      font-size: 10px;
    }
    </style>
<title></title>
</head>
      <body>
            <?php    echo $this->fetch('content'); ?>
      </body>
</html>
