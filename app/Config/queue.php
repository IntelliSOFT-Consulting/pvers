<?php

	$config['Queue']['sleeptime'] = 10;
	$config['Queue']['gcprob'] = 10;
	$config['Queue']['defaultworkertimeout'] = 120;
	$config['Queue']['defaultworkerretries'] = 4;
	$config['Queue']['workermaxruntime'] = 700; //Warning: Do not use 0 if you are using a cronjob to permanantly start a new worker once in a while and if you do not exit on idle.
	$config['Queue']['exitwhennothingtodo'] = false;
	$config['Queue']['cleanuptimeout'] = 2592000; // 30 days
	
?>