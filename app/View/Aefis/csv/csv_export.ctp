<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.',  'name_of_institution' => 'Institution','report_type' => 'Type',
		'counties' => 'County','sub_counties' => 'Sub-County', 		
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
		'times_aefi_started' => 'Time AEFI started', 
		'vaccines' => 'Vaccines',
		'vaccination_doses' => 'Vaccination doses',
		'vaccination_dates' => 'Vaccination dates',
		'vaccination_times' => 'Vaccination times',
		'vaccination_routes' => 'Vaccination routes',
		'vaccination_sites' => 'Vaccination sites',
		'vaccination_batch' => 'Batch/Lot No.',
		'manufacturers' => 'Vaccine Manufacturers',
		'vaccination_expiry' => 'Vaccine expiry',
		'diluent_batch' => 'Diluent batch',
		'diluent_manufacturers' => 'Diluent manufacturers',
		'diluent_expiry' => 'Diluent expiry',
		'serious' => 'Reaction serious', 'serious_yes' => 'Reason for seriousness',
		'outcome' => 'Outcome',
		'designations' => 'Reporter designation', 
		'device' => 'Sending Device', 
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
		);
	
	if($this->Session->read('Auth.User.user_type') != 'Public Health Program') {
		$header['reporter_name'] = 'Reporter';
		$header['reporter_email'] = 'Reporter email';
		$header['reporter_phone'] = 'Reporter phone';
		$header['patient_name'] = 'Patient name';
	}
	
	//Additional free text columns
	$header['aefi_symptoms'] = 'Describe AEFI';
	$header['description_of_reaction'] = 'Brief details on the event';
	$header['medical_history'] = 'Past medical history';
	$header['treatment_given'] = 'Treatment given';


	// if header has patient_name then order it to follow the sub_counties
	if(isset($header['patient_name'])) {
		$patient_name = $header['patient_name'];
		unset($header['patient_name']);
		$header = array_slice($header, 0, 6, true) + array('patient_name' => $patient_name) + array_slice($header, 6, count($header) - 1, true);
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
			} elseif ($key == 'sub_counties') {
				$row[$key] = '"' . preg_replace('/"/','""',$caefi['SubCounty']['sub_county_name']) . '"';
			}  elseif ($key == 'designations') {
							$row[$key] = '"' . preg_replace('/"/','""',$caefi['Designation']['name']) . '"';
			} elseif ($key == 'date_born') {
				$dob = ''; $bod = $caefi['Aefi']['date_of_birth'];
				if (!empty($bod['year'])) {
					(!empty($bod['day'])) ? $dob.=$bod['day'].'-' : $dob.='01-';
					(!empty($bod['month'])) ? $dob.=$bod['month'].'-' : $dob.='01-';
					(!empty($bod['year'])) ? $dob.=$bod['year'] : $dob.='1970';
				}				
				($dob) ? $row[$key] = $dob : $row[$key] = '""';
			} elseif ($key == 'times_aefi_started') {
				$tas = ''; $sat = $caefi['Aefi']['time_aefi_started'];
				if (isset($sat['hour'])) {
					$tas.=$sat['hour'].':';
					$tas.=$sat['min'];
				}				
				($tas) ? $row[$key] = $tas : $row[$key] = '""';
			} elseif ($key == 'vaccines') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					$val = (!empty($aefiListOfVaccine['Vaccine']['vaccine_name'])) ? $aefiListOfVaccine['Vaccine']['vaccine_name'] : '';
					(isset($row[$key])) ? $row[$key] .= '; '.$val : $row[$key] = $val;
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'vaccination_doses') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['dosage'] : $row[$key] = $aefiListOfVaccine['dosage'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'vaccination_dates') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['vaccination_date'] : $row[$key] = $aefiListOfVaccine['vaccination_date'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'vaccination_times') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					if(isset($aefiListOfVaccine['vaccination_time']['hour'])) (isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['vaccination_time']['hour'].':'.$aefiListOfVaccine['vaccination_time']['hour'] : $row[$key] = $aefiListOfVaccine['vaccination_time']['hour'].':'.$aefiListOfVaccine['vaccination_time']['hour'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'vaccination_routes') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['vaccination_route'] : $row[$key] = $aefiListOfVaccine['vaccination_route'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'vaccination_sites') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['vaccination_site'] : $row[$key] = $aefiListOfVaccine['vaccination_site'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'vaccination_batch') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['batch_number'] : $row[$key] = $aefiListOfVaccine['batch_number'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'manufacturers') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['vaccine_manufacturer'] : $row[$key] = $aefiListOfVaccine['vaccine_manufacturer'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}  elseif ($key == 'vaccination_expiry') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['expiry_date'] : $row[$key] = $aefiListOfVaccine['expiry_date'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}  elseif ($key == 'diluent_batch') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['diluent_batch_number'] : $row[$key] = $aefiListOfVaccine['diluent_batch_number'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}  elseif ($key == 'diluent_manufacturers') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['diluent_manufacturer'] : $row[$key] = $aefiListOfVaccine['diluent_manufacturer'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}  elseif ($key == 'diluent_expiry') {
				foreach ($caefi['AefiListOfVaccine'] as $aefiListOfVaccine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$aefiListOfVaccine['diluent_expiry_date'] : $row[$key] = $aefiListOfVaccine['diluent_expiry_date'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>