<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'report_type' => 'Type', 'name_of_institution' => 'Institution',
		'counties' => 'County',
		//'patient_name' => 'Patient name', 
		'date_born' => 'Date of birth',
		'age_months' => 'Age in months', 'gender' => 'Gender',
		'patient_county' => 'Patient county', 'vaccination_center' => 'Vaccination center',
		'vaccination_type' => 'Vaccination service', 'vaccination_county' => 'Vaccination county',
		'bcg' => 'BCG Lymphadenitis', 'convulsion' => 'Convulsion',
		'urticaria' => 'Generalized urticaria', 'high_fever' => 'High Fever',
		'abscess' => 'Injection site abscess', 'local_reaction' => 'Severe Local Reaction',
		'anaphylaxis' => 'Anaphylaxis', 'meningitis' => 'Encephalopathy',
		'paralysis' => 'Paralysis', 'toxic_shock' => 'Toxic shock',
		'complaint_other' => 'Other', 'complaint_other_specify' => 'Specify',
		'date_aefi_started' => 'Date AEFI started', 
		'vaccines' => 'Vaccines',
		'manufacturers' => 'Manufacturers',
		'serious' => 'Reaction serious', 'serious_yes' => 'Reason for seriousness',
		'outcome' => 'Outcome',
		//'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
		//'reporter_phone' => 'Reporter phone', 
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
		);
	
	if($this->Session->read('Auth.User.user_type') != 'Public Health Program') {
		$header['reporter_name'] = 'Reporter';
		$header['reporter_email'] = 'Reporter email';
		$header['reporter_phone'] = 'Reporter phone';
		$header['patient_name'] = 'Patient name';
	}
	echo implode(',', $header)."\n";
	foreach ($caefis as $caefi):
		$content = '';
		$row = [];
		foreach ($header as $key => $val) {
			if (array_key_exists($key, $caefi['Aefi'])) {
				$row[$key] = '"' . preg_replace('/"/','""',$caefi['Aefi'][$key]) . '"';
			} elseif ($key == 'counties') {
				$row[$key] = '"' . preg_replace('/"/','""',$caefi['County']['county_name']) . '"';
			} elseif ($key == 'date_born') {
				$dob = ''; $bod = $caefi['Aefi']['date_of_birth'];
				if (!empty($bod['year'])) {
					(!empty($bod['day'])) ? $dob.=$bod['day'].'-' : $dob.='01-';
					(!empty($bod['month'])) ? $dob.=$bod['month'].'-' : $dob.='01-';
					(!empty($bod['year'])) ? $dob.=$bod['year'] : $dob.='1970';
				}				
				($dob) ? $row[$key] = $dob : $row[$key] = '""';
			} elseif ($key == 'vaccines') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['vaccine_name'] : $row[$key] = $aefiListOfVaccine['vaccine_name'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'manufacturers') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['vaccine_manufacturer'] : $row[$key] = $aefiListOfVaccine['vaccine_manufacturer'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}  
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>