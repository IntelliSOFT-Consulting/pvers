<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'report_title' => 'Report Title', 'name_of_institution' => 'Name of Institution',
		'counties' => 'County',
		// 'patient_name' => 'Patient name', 'date_born' => 'Date of birth',
		'gender' => 'Gender',
		'problem_noted' => 'Problem noted prior', 
		'brand_name' => 'Brand Name', 
		'common_name' => 'Common Name',
		'device_model' => 'Model', 
		'manufacturer_name' => 'Manufacturer',
		'serial_no' => 'Serial No.', 
		'catalogue' => 'Catalogue',
		'manufacture_date' => 'Manufacture Date',
		'expiry_date' => 'Expiry Date',
		'operator' => 'Operator',
		'device_usage' => 'Device Usage',
		'device_duration' => 'Device duration',
		'device_duration_type' => 'Duration type',
		'device_availability' => 'Device availability',
		'device_unavailability' => 'If unavailable',
		'implant_date' => 'Implant date',
		'explant_date' => 'Explant date',
		'implant_duration' => 'Implant duration',
		'implant_duration_type' => 'Duration type',
		'specimen_type' => 'Specimen type',
		'patients_involved' => 'Patients involved',
		'false_negatives' => 'False negatives',
		'tests_done' => 'Tests done',
		'true_positives' => 'True positives',
		'false_positives' => 'False positives',
		'true_negatives' => 'True negatives',
		'devices' => 'Other device names',
		'commons' => 'Other commons',
		'manufacturers' => 'Other manufacturers',
		'date_onset_incident' => 'Date of onset',
		'serious' => 'Event classification',
		'serious_yes' => 'Reason for seriousness', 
		'outcome' => 'Patient outcome',
		'designations' => 'Reporter designation',
		// 'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
		// 'reporter_phone' => 'Reporter phone', 
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
	);
	

	if($this->Session->read('Auth.User.user_type') != 'Public Health Program') {
		$header['reporter_name'] = 'Reporter';
		$header['reporter_email'] = 'Reporter email';
		$header['reporter_phone'] = 'Reporter phone';
		$header['patient_name'] = 'Patient name';
	}
	
	//Additional free text columns
	$header['description_of_reaction'] = 'Description of event';
	$header['remedial_action'] = 'Remedial action';
	$header['operator_specify'] = 'Other operator';

	echo implode(',', $header)."\n";
	foreach ($cdevices as $cdevice):
		$content = '';
		$row = [];
		foreach ($header as $key => $val) {
			if (array_key_exists($key, $cdevice['Device'])) {
				$row[$key] = '"' . preg_replace('/"/','""',$cdevice['Device'][$key]) . '"';
			} elseif ($key == 'counties') {
				$row[$key] = '"' . preg_replace('/"/','""',$cdevice['County']['county_name']) . '"';
			} elseif ($key == 'designations') {
				$row[$key] = '"' . preg_replace('/"/','""',$cdevice['Designation']['name']) . '"';
			} elseif ($key == 'date_born') {
				$dob = ''; $bod = $cdevice['Device']['date_of_birth'];
				if (!empty($bod['year'])) {
					(!empty($bod['day'])) ? $dob.=$bod['day'].'-' : $dob.='01-';
					(!empty($bod['month'])) ? $dob.=$bod['month'].'-' : $dob.='01-';
					(!empty($bod['year'])) ? $dob.=$bod['year'] : $dob.='1970';
				}				
				($dob) ? $row[$key] = $dob : $row[$key] = '""';
			} elseif ($key == 'devices') {
				foreach ($cdevice['ListOfDevice'] as $listofDeviCe) {
					(isset($row[$key])) ? $row[$key] .= '; '.$listofDeviCe['brand_name'] : $row[$key] = $listofDeviCe['brand_name'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'commons') {
				foreach ($cdevice['ListOfDevice'] as $listofDeviCe) {
					(isset($row[$key])) ? $row[$key] .= '; '.$listofDeviCe['common_name'] : $row[$key] = $listofDeviCe['common_name'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'manufacturers') {
				foreach ($cdevice['ListOfDevice'] as $listofDeviCe) {
					(isset($row[$key])) ? $row[$key] .= '; '.$listofDeviCe['manufacturer'] : $row[$key] = $listofDeviCe['manufacturer'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>