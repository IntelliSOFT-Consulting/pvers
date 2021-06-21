<?php                                

	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'counties' => 'County',
		'patient_name' => 'Patient name', 'date_born' => 'Date of birth',
		'gender' => 'Gender',
		'age_group' => 'Age Group', 
		'onset_date' => 'Date of onset', 
		'sadr_vomiting' => 'Vomiting or diarrhoea',
		'sadr_dizziness' => 'Dizziness or drowsiness',
		'sadr_headache' => 'Headache',
		'sadr_joints' => 'Joints and muscle pain',
		'sadr_rash' => 'Rash',
		'sadr_mouth' => 'Pain or bleeding in the mouth',
		'sadr_stomach' => 'Pain in the stomach',
		'sadr_urination' => 'Abnormal changes with urination',
		'sadr_eyes' => 'Red/ painful eyes',
		'sadr_died' => 'Patient died',
		'pqmp_label' => 'The label looks wrong',
		'pqmp_material' => 'Has unusual material in it',
		'pqmp_color' => 'The color is changing',
		'pqmp_smell' => 'The smell is unusual',
		'pqmp_working' => 'The medicine/device is not working',
		'pqmp_bottle' => 'The packet or bottle does not seem to be usual',
		'medicines' => 'Medicines',
		'medicine_source' => 'Medicine source', 
		'manufacturers' => 'Manufacturers',
		'medicines_start_date' => 'Medicines Start Date',
		'medicines_stop_date' => 'Medicines Stop Date',
		'medicines_expiry_date' => 'Medicines Expiry Date',
		'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
		'reporter_phone' => 'Reporter phone', 
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
		);
	
	//Additional free text columns
	$header['description_of_reaction'] = 'Other side effects experienced';
	$header['any_other_comment'] = 'Other wrong things';

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
			} elseif ($key == 'medicines') {
				foreach ($cpadr['PadrListOfMedicine'] as $padrListOfMedicine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfMedicine['product_name'] : $row[$key] = $padrListOfMedicine['product_name'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'medicine_source') {
				foreach ($cpadr['PadrListOfMedicine'] as $padrListOfMedicine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfMedicine['medicine_source'] : $row[$key] = $padrListOfMedicine['medicine_source'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'manufacturers') {
				foreach ($cpadr['PadrListOfMedicine'] as $padrListOfMedicine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfMedicine['manufacturer'] : $row[$key] = $padrListOfMedicine['manufacturer'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'medicines_start_date') {
				foreach ($cpadr['PadrListOfMedicine'] as $padrListOfMedicine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfMedicine['start_date'] : $row[$key] = $padrListOfMedicine['start_date'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'medicines_stop_date') {
				foreach ($cpadr['PadrListOfMedicine'] as $padrListOfMedicine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfMedicine['end_date'] : $row[$key] = $padrListOfMedicine['end_date'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			} elseif ($key == 'medicines_expiry_date') {
				foreach ($cpadr['PadrListOfMedicine'] as $padrListOfMedicine) {
					(isset($row[$key])) ? $row[$key] .= '; '.$padrListOfMedicine['expiry_date'] : $row[$key] = $padrListOfMedicine['expiry_date'];
				}
				(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
			}
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>