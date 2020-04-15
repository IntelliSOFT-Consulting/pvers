
	<?php 
		// App::import('Vendor', 'dompdf/dompdf.php');
		// App::import('Vendor','phpthumb', array('file' => 'phpThumb' . DS . 'phpthumb.class.php'));
		//App::import('Vendor','dompdf', array('file' => 'dompdf' . DS . 'dompdf.php'));
		require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php');
		$dompdf = new DOMPDF();
		$dompdf->load_html(utf8_decode($this->fetch('content')), Configure::read('App.encoding'));
		$dompdf->render();
		echo $dompdf->output();

			
		// require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
		// $html2pdf = new HTML2PDF('P','A4', 'en');
		
		// echo $content_for_layout;
		// $content = ob_get_clean();

		// require_once(APP . 'Vendor' . DS . 'html2pdf' . DS . 'html2pdf.class.php');
		// $html2pdf = new HTML2PDF('P','A4','en', true, 'UTF-8');
		// $html2pdf->WriteHTML($this->fetch('content'));
		// echo $html2pdf->Output('example.pdf', 'D');
		
		// echo $content_for_layout;
		//echo $this->fetch('content');

    // require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    // $html2pdf = new HTML2PDF('P','A4','fr');
    // $html2pdf->WriteHTML($content_for_layout);
    // $html2pdf->Output('exemple.pdf');
	?>


	

