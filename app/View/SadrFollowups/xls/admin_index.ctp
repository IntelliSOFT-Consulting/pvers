<?php
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

	foreach($SadrFollowups[0]['SadrFollowup'] as $key => $val) {
		$table[] = array('label' => $key, 'width' => 'auto', 'wrap' => true);
	}
	$listOfDrugs = array(
			array('label' => 'List of Drugs', 'width' => 'auto', 'wrap' => true),
			array('label' => 'drug_name', 'width' => 'auto', 'wrap' => true),
			array('label' => 'brand_name', 'width' => 'auto', 'wrap' => true),
			array('label' => 'Dose', 'width' => 'auto', 'wrap' => true),
			array('label' => 'Route', 'width' => 'auto', 'wrap' => true),
			array('label' => 'frequency', 'width' => 'auto', 'wrap' => true),
			array('label' => 'start_date', 'width' => 'auto', 'wrap' => true),
			array('label' => 'stop_date', 'width' => 'auto', 'wrap' => true),
			array('label' => 'indication', 'width' => 'auto', 'wrap' => true),
			array('label' => 'suspected_drug', 'width' => 'auto', 'wrap' => true),
			array('label' => 'created', 'width' => 'auto', 'wrap' => true),
			array('label' => 'modified', 'width' => 'auto', 'wrap' => true),
	);
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
foreach ($SadrFollowups as $SadrFollowup) {
	$this->PhpExcel->addTableRow(array_values($SadrFollowup['SadrFollowup']));
	if(!empty($SadrFollowup['SadrListOfDrug'])) {
		$this->PhpExcel->addTableHeader($listOfDrugs, array('name' => 'Cambria', 'bold' => true, 'offset' => 0));
		foreach ($SadrFollowup['SadrListOfDrug'] as $sadrListOfDrug) {
			$this->PhpExcel->addTableRow(array(
				'',
				$sadrListOfDrug['drug_name'], 
				$sadrListOfDrug['brand_name'], 
				$sadrListOfDrug['dose'].' - '.$dose[$sadrListOfDrug['dose_id']], 
				$routes[$sadrListOfDrug['route_id']], 
				$frequency[$sadrListOfDrug['frequency_id']], 
				$sadrListOfDrug['start_date'], 
				$sadrListOfDrug['indication'], 
				$sadrListOfDrug['suspected_drug'],
				$sadrListOfDrug['created'],
				$sadrListOfDrug['modified'],
				)
			);		
		}
	}
	if(!empty($SadrFollowup['Attachment'])) {
		$this->PhpExcel->addTableHeader($attachments, array('name' => 'Cambria', 'bold' => true, 'offset' => 0));
		foreach ($SadrFollowup['Attachment'] as $attachment) {
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
$this->PhpExcel->output('SADRFOLLOWUPS_'.date('Y_m_d_His'));