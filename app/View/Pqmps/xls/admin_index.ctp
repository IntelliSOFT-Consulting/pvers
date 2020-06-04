<?php
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

	foreach($pqmps[0]['Pqmp'] as $key => $val) {
		$table[] = array('label' => $key, 'width' => 'auto', 'wrap' => true);
	}
	$attachments = array(
			array('label' => 'Attachments', 'width' => 'auto', 'wrap' => true),
			array('label' => 'basename', 'width' => 'auto', 'wrap' => true),
			array('label' => 'description', 'width' => 'auto', 'wrap' => true),
			array('label' => 'created', 'width' => 'auto', 'wrap' => true),
			array('label' => 'modified', 'width' => 'auto', 'wrap' => true),
	);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true, 'offset' => 0));

// data
foreach ($pqmps as $pqmp) {
	if(is_array($pqmp['Pqmp']['manufacture_date'])) $pqmp['Pqmp']['manufacture_date'] = $pqmp['Pqmp']['manufacture_date']['day'].'-'.$pqmp['Pqmp']['manufacture_date']['month'].'-'.$pqmp['Pqmp']['manufacture_date']['year'];
	$this->PhpExcel->addTableRow(array_values($pqmp['Pqmp']));
	if(!empty($pqmp['Attachment'])) {
		$this->PhpExcel->addTableHeader($attachments, array('name' => 'Cambria', 'bold' => true, 'offset' => 0));
		foreach ($pqmp['Attachment'] as $attachment) {
			$this->PhpExcel->addTableRow(array(
				'',
				$attachment['basename'], 
				$attachment['description'], 
				$attachment['created'],
				$attachment['modified'],
				)
			);		
		}
	}
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output('PQMPS_'.date('Y_m_d_His'));