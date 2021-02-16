<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'report_type' => 'Type', 'report_title' => 'Report Title',
		'report_padr' => 'Report on PADR', 'report_therapeutic' => 'Therapeutic Ineffectiveness',
		'medicinal_product' => 'Medicinal product', 'blood_products' => 'Blood products',
		'herbal_product' => 'Herbal product', 'cosmeceuticals' => 'Cosmeceuticals',
		'product_other' => 'Others', 'product_specify' => 'Specify product',
		'name_of_institution' => 'Institution', 'counties' => 'County',
		'patient_name' => 'Patient name', 'date_born' => 'Date of birth',
		'gender' => 'Gender',
		'age_group' => 'Age Group', 'pregnancy_status' => 'Pregnancy Status',
		'known_allergy' => 'Known allergy', 'known_allergy_specify' => 'Allergy',
		'onset_date' => 'Date of onset', 'drugs' => 'Generic names',
		'brands' => 'Brand names', 'manufacturers' => 'Manufacturers',
		'indications' => 'Indications', 'reaction_resolve' => 'Rechallenge',
		'reaction_reappear' => 'Reaction reappear', 'severity' => 'Severity',
		'serious' => 'Reaction serious', 'serious_reason' => 'Reason for seriousness',
		'action_taken' => 'Action taken', 'outcome' => 'Outcome',
		'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
		'reporter_phone' => 'Reporter phone', 
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
		);
	
	echo implode(',', $header)."\n";
	foreach ($cpadrs as $cpadr):
		$content = '';
		$row = [];
		foreach ($header as $key => $val) {
			if (array_key_exists($key, $cpadr['Padr'])) {
				$row[$key] = '"' . preg_replace('/"/','""',$cpadr['Padr'][$key]) . '"';
			} elseif ($key == 'counties') {
				$row[$key] = '"' . preg_replace('/"/','""',$cpadr['County']['county_name']) . '"';
			} elseif ($key == 'date_born') {
				$dob = ''; $bod = $cpadr['Padr']['date_of_birth'];
				if (!empty($bod['year'])) {
					(!empty($bod['day'])) ? $dob.=$bod['day'].'-' : $dob.='01-';
					(!empty($bod['month'])) ? $dob.=$bod['month'].'-' : $dob.='01-';
					(!empty($bod['year'])) ? $dob.=$bod['year'] : $dob.='1970';
				}				
				($dob) ? $row[$key] = $dob : $row[$key] = '""';
			} elseif ($key == 'onset_date') {
				$rod = ''; $dor = $cpadr['Padr']['date_of_onset_of_reaction'];
				if (!empty($dor['year'])) {
					(!empty($dor['day'])) ? $rod.=$dor['day'].'-' : $rod.='01-';
					(!empty($dor['month'])) ? $rod.=$dor['month'].'-' : $rod.='01-';
					(!empty($dor['year'])) ? $rod.=$dor['year'] : $rod.='1970';
				}				
				($rod) ? $row[$key] = $rod : $row[$key] = '""';
			} elseif ($key == 'drugs') {
				foreach ($cpadr['PadrListOfDrug'] as $padrListOfDrug) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfDrug['drug_name'] : $row[$key] = $padrListOfDrug['drug_name'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'brands') {
				foreach ($cpadr['PadrListOfDrug'] as $padrListOfDrug) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfDrug['brand_name'] : $row[$key] = $padrListOfDrug['brand_name'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'manufacturers') {
				foreach ($cpadr['PadrListOfDrug'] as $padrListOfDrug) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfDrug['manufacturer'] : $row[$key] = $padrListOfDrug['manufacturer'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'indications') {
				foreach ($cpadr['PadrListOfDrug'] as $padrListOfDrug) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfDrug['indication'] : $row[$key] = $padrListOfDrug['indication'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} 
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>