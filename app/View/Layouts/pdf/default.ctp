<?php 

	require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php');
	$dompdf = new DOMPDF();
	$dompdf->load_html(utf8_decode($this->fetch('content')), Configure::read('App.encoding'));
	$dompdf->render();
	echo $dompdf->output();

?>
