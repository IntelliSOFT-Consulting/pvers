<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 
		// 'patient_name' => 'Patient name',
		'date_born' => 'Date of birth',
		'age_years' => 'Age in years',
		'gender' => 'Gender',
		'ward' => 'Ward', 'diagnosis' => 'Diagnosis',
		'transfusion_reason' => 'Reason for transfusion',
		'diagnosis' => 'Diagnosis',
		'previous_transfusion' => 'Previous Transfusion',
		'previous_reactions' => 'Previous Reactions',
		'reaction_general' => 'Reaction General',
		'reaction_dermatological' => 'Dermatological',
		'reaction_cardiac' => 'Cardiac/Respiratory',
		'reaction_renal' => 'Renal',
		'reaction_haematological' => 'Haematological',
		'component_types' => 'Component types',
		'component_pints' => 'Component pints',
		'lab_hemolysis' => 'Hemolysis',
		'lab_hemolysis_present' => 'Hemolysis present',
		'recipient_blood' => 'Recipient Agglutination',
		'donor_hemolysis' => 'Donor Agglutination',
		// 'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
		// 'reporter_phone' => 'Reporter phone',
		'designations' => 'Reporter designation',
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
		);
	

	if($this->Session->read('Auth.User.user_type') != 'Public Health Program') {
		$header['reporter_name'] = 'Reporter';
		$header['reporter_email'] = 'Reporter email';
		$header['reporter_phone'] = 'Reporter phone';
		$header['patient_name'] = 'Patient name';
	}
	
	echo implode(',', $header)."\n";
	foreach ($ctransfusions as $ctransfusion):
		$content = '';
		$row = [];
		foreach ($header as $key => $val) {
			if (array_key_exists($key, $ctransfusion['Transfusion'])) {
				$row[$key] = '"' . preg_replace('/"/','""',$ctransfusion['Transfusion'][$key]) . '"';
			} elseif ($key == 'date_born') {
				$dob = ''; $bod = $ctransfusion['Transfusion']['date_of_birth'];
				if (!empty($bod['year'])) {
					(!empty($bod['day'])) ? $dob.=$bod['day'].'-' : $dob.='01-';
					(!empty($bod['month'])) ? $dob.=$bod['month'].'-' : $dob.='01-';
					(!empty($bod['year'])) ? $dob.=$bod['year'] : $dob.='1970';
				}				
				($dob) ? $row[$key] = $dob : $row[$key] = '""';
			} elseif ($key == 'designations') {
				$row[$key] = '"' . preg_replace('/"/','""',$ctransfusion['Designation']['name']) . '"';
			} elseif ($key == 'component_types') {
				foreach ($ctransfusion['Pint'] as $transfusionProdUcT) {
					(isset($row[$key])) ? $row[$key] .= '; '.$transfusionProdUcT['component_type'] : $row[$key] = $transfusionProdUcT['component_type'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'component_pints') {
				foreach ($ctransfusion['Pint'] as $transfusionProdUcT) {
					(isset($row[$key])) ? $row[$key] .= '; '.$transfusionProdUcT['pint_no'] : $row[$key] = $transfusionProdUcT['pint_no'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} 
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>