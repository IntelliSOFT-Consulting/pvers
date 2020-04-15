<?php
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
// $table = array(
	// array('label' => __('id'), 'width' => 'auto', 'filter' => true),
	// array('label' => __('created'), 'width' => 50, 'wrap' => true),
	// array('label' => __('Modified'), 'width' => 'auto')
// );
	foreach($sadrs[0]['Sadr'] as $key => $val) {
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
foreach ($sadrs as $sadr) {
	if(is_array($sadr['Sadr']['date_of_onset_of_reaction'])) $sadr['Sadr']['date_of_onset_of_reaction'] = $sadr['Sadr']['date_of_onset_of_reaction']['day'].'-'.$sadr['Sadr']['date_of_onset_of_reaction']['month'].'-'.$sadr['Sadr']['date_of_onset_of_reaction']['year'];
	if(is_array($sadr['Sadr']['date_of_birth'])) $sadr['Sadr']['date_of_birth'] = $sadr['Sadr']['date_of_birth']['day'].'-'.$sadr['Sadr']['date_of_birth']['month'].'-'.$sadr['Sadr']['date_of_birth']['year'];
	$this->PhpExcel->addTableRow(array_values($sadr['Sadr']));
	if(!empty($sadr['SadrListOfDrug'])) {
		$this->PhpExcel->addTableHeader($listOfDrugs, array('name' => 'Cambria', 'bold' => true, 'offset' => 0));
		foreach ($sadr['SadrListOfDrug'] as $sadrListOfDrug) {
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
	if(!empty($sadr['Attachment'])) {
		$this->PhpExcel->addTableHeader($attachments, array('name' => 'Cambria', 'bold' => true, 'offset' => 0));
		foreach ($sadr['Attachment'] as $attachment) {
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
$this->PhpExcel->output('SADRS_'.date('Y_m_d_His'));