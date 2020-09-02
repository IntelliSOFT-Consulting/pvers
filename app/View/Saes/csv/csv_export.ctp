<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'report_type' => 'Type', 'patient_initials' => 'Patient Initials',
		'patient_died' => 'patient_died', 'date_of_birth' => 'date_of_birth',
		'prolonged_hospitalization' => 'prolonged_hospitalization', 'age_years' => 'age_years',
		'incapacity' => 'incapacity', 'enrollment_date' => 'Enrollment date',
		'life_threatening' => 'life_threatening', 'administration_date' => 'administration_date',
		'reaction_other' => 'reaction_other', 'latest_date' => 'latest_date',
		'reaction_onset' => 'reaction_onset', 'reaction_end_date' => 'reaction_end_date',
		'gender' => 'Gender',
		'causality' => 'causality', 'reaction_description' => 'reaction_description',
		'drugs' => 'Suspected drugs', 'concomittant_drugs' => 'Concomittant drugs',
		'manufacturer_name' => 'manufacturer_name', 'mfr_no' => 'mfr_no',
		'source_study' => 'source_study', 'manufacturer_date' => 'manufacturer_date',
		'source_health_professional' => 'source_health_professional',
		'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
		'reporter_phone' => 'Reporter phone', 
		'created' => 'Date Created'
		);
	
	echo implode(',', $header)."\n";
	foreach ($csaes as $csae):
		$content = '';
		$row = [];
		foreach ($header as $key => $val) {
			if (array_key_exists($key, $csae['Sae'])) {
				$row[$key] = '"' . preg_replace('/"/','""',$csae['Sae'][$key]) . '"';
			} elseif ($key == 'counties') {
				$row[$key] = '"' . preg_replace('/"/','""',$csae['County']['county_name']) . '"';
			} elseif ($key == 'drugs') {
				foreach ($csae['SuspectedDrug'] as $suspectedDrug) {
					(isset($row[$key])) ? $row[$key] .= '; '.$suspectedDrug['generic_name'] : $row[$key] = $suspectedDrug['generic_name'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}  elseif ($key == 'concomittant_drugs') {
				foreach ($csae['ConcomittantDrug'] as $concomittantDrug) {
					(isset($row[$key])) ? $row[$key] .= '; '.$concomittantDrug['generic_name'] : $row[$key] = $concomittantDrug['generic_name'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} 
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>