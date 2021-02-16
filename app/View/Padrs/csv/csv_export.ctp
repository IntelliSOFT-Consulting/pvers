<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'counties' => 'County',
		'patient_name' => 'Patient name', 'date_born' => 'Date of birth',
		'gender' => 'Gender',
		'age_group' => 'Age Group', 
		'onset_date' => 'Date of onset', 'medicines' => 'Medicines',
		'medicine_source' => 'Medicine source', 'manufacturers' => 'Manufacturers',
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
			}
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>