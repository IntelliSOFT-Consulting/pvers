<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'date_of_event' => 'Date of event', 'name_of_institution' => 'Institution',
		'counties' => 'County',
		'patient_name' => 'Patient name', 'date_born' => 'Date of birth',
		'age_years' => 'Age in years', 'gender' => 'Gender',
		'ward' => 'Ward', 'pharmacy' => 'Pharmacy',
		'clinic' => 'Clinic', 
		'process_occur' => 'Process occur error',
		'reach_patient' => 'Error reach patient', 
		'correct_medication' => 'Correct medication',
		'outcome' => 'Outcome',
		'error_cause_inexperience' => 'Inexperienced personnel',
		'error_cause_knowledge' => 'Inadequate knowledge',
		'error_cause_distraction' => 'Distraction',
		'error_cause_sound' => 'Sound alike medication',
		'error_cause_medication' => 'Look alike medication',
		'error_cause_packaging' => 'Look alike packagingn',
		'error_cause_workload' => 'Heavy workload',
		'error_cause_peak' => 'Peak hour',
		'error_cause_stock' => 'Stock arrangements',
		'error_cause_procedure' => 'work procedure',
		'error_cause_abbreviations' => 'Use of abbreviations',
		'error_cause_illegible' => 'Illegible prescriptions',
		'error_cause_inaccurate' => 'Inaccurate information',
		'error_cause_labelling' => 'Wrong labelling',
		'error_cause_computer' => 'Incorrect computer entry',
		'error_cause_other' => 'Others',
		'generic_name_i' => 'Generic product I',
		'generic_name_ii' => 'Generic product II',
		'product_name_i' => 'Brand product I',
		'product_name_ii' => 'Brand product II',
		'manufacturer_i' => 'Manfuacturer I',
		'manufacturer_ii' => 'Manufacturer II',
		'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
		'reporter_phone' => 'Reporter phone', 
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
		);
	
	echo implode(',', $header)."\n";
	foreach ($cmedications as $cmedication):
		$content = '';
		$row = [];
		foreach ($header as $key => $val) {
			if (array_key_exists($key, $cmedication['Medication'])) {
				$row[$key] = '"' . preg_replace('/"/','""',$cmedication['Medication'][$key]) . '"';
			} elseif ($key == 'counties') {
				$row[$key] = '"' . preg_replace('/"/','""',$cmedication['County']['county_name']) . '"';
			} elseif ($key == 'date_born') {
				$dob = ''; $bod = $cmedication['Medication']['date_of_birth'];
				if (!empty($bod['year'])) {
					(!empty($bod['day'])) ? $dob.=$bod['day'].'-' : $dob.='01-';
					(!empty($bod['month'])) ? $dob.=$bod['month'].'-' : $dob.='01-';
					(!empty($bod['year'])) ? $dob.=$bod['year'] : $dob.='1970';
				}				
				($dob) ? $row[$key] = $dob : $row[$key] = '""';
			} elseif ($key == 'generic_name_i') {
				foreach ($cmedication['MedicationProduct'] as $medicationProdUcT) {
					(isset($row[$key])) ? $row[$key] .= '; '.$medicationProdUcT['generic_name_i'] : $row[$key] = $medicationProdUcT['generic_name_i'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'generic_name_ii') {
				foreach ($cmedication['MedicationProduct'] as $medicationProdUcT) {
					(isset($row[$key])) ? $row[$key] .= '; '.$medicationProdUcT['generic_name_ii'] : $row[$key] = $medicationProdUcT['generic_name_ii'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'product_name_i') {
				foreach ($cmedication['MedicationProduct'] as $medicationProdUcT) {
					(isset($row[$key])) ? $row[$key] .= '; '.$medicationProdUcT['product_name_i'] : $row[$key] = $medicationProdUcT['product_name_i'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'product_name_ii') {
				foreach ($cmedication['MedicationProduct'] as $medicationProdUcT) {
					(isset($row[$key])) ? $row[$key] .= '; '.$medicationProdUcT['product_name_ii'] : $row[$key] = $medicationProdUcT['product_name_ii'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'manufacturer_i') {
				foreach ($cmedication['MedicationProduct'] as $medicationProdUcT) {
					(isset($row[$key])) ? $row[$key] .= '; '.$medicationProdUcT['manufacturer_i'] : $row[$key] = $medicationProdUcT['manufacturer_i'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'manufacturer_ii') {
				foreach ($cmedication['MedicationProduct'] as $medicationProdUcT) {
					(isset($row[$key])) ? $row[$key] .= '; '.$medicationProdUcT['manufacturer_ii'] : $row[$key] = $medicationProdUcT['manufacturer_ii'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} 
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>