<?php

$header = array(
	'id' => '#', 'reference_no' => 'Reference No.', 'report_type' => 'Type', 'report_title' => 'Report Title',
	'report_sadr' => 'Report on SADR', 'report_therapeutic' => 'Therapeutic Ineffectiveness',
	'medicinal_product' => 'Medicinal product', 'blood_products' => 'Blood products',
	'herbal_product' => 'Herbal product', 'cosmeceuticals' => 'Cosmeceuticals',
	'product_other' => 'Others', 'product_specify' => 'Specify product',
	'name_of_institution' => 'Institution',
	'institution_code' => 'Institution code',
	'counties' => 'County',
	//'patient_name' => 'Patient name', 
	'date_born' => 'Date of birth',
	'gender' => 'Gender',
	'age_group' => 'Age Group', 'pregnancy_status' => 'Pregnancy Status',
	'known_allergy' => 'Known allergy', 'known_allergy_specify' => 'Allergy',
	'onset_date' => 'Date of onset', 'drugs' => 'Generic names',
	'brands' => 'Brand names', 'batch_no' => 'Batch Number', 'manufacturers' => 'Manufacturers', 'start_date' => 'Start Date', 'end_date' => 'End Date','drug_indication'=>'Indication','suspected_drug'=>'Suspected Drug',
	'med_drug_name' => 'Medicine Drug Name', 'med_brand_name' => 'Medicine Brand Name', 'med_batch_no' => 'Medicine Batch Number', 'med_manufacturer' => 'Medicine Manufacturer', 'med_dose' => 'Medicine Dose', 'med_start_date' => 'Medicine Start Date', 'med_stop_date' => 'Medicine Stop Date', 'med_indication' => 'Medicine Indication',
	'indications' => 'Indications', 'reaction_resolve' => 'Rechallenge',
	'reaction_reappear' => 'Reaction reappear', 'severity' => 'Severity',
	'serious' => 'Reaction serious', 'serious_reason' => 'Reason for seriousness',
	'action_taken' => 'Action taken', 'outcome' => 'Outcome',
	'designations' => 'Reporter designation',
	//'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
	// 'reporter_phone' => 'Reporter phone', 
	'device' => 'Sending Device',
	'created' => 'Date Created',
	'reporter_date' => 'Report Date'
);
if ($this->Session->read('Auth.User.user_type') != 'Public Health Program') {
	$header['reporter_name'] = 'Reporter';
	$header['reporter_email'] = 'Reporter email';
	$header['reporter_phone'] = 'Reporter phone';
	$header['patient_name'] = 'Patient name';
}

//Additional free text columns
$header['diagnosis'] = 'Diagnosis';
$header['description_of_reaction'] = 'Brief description of reaction';
$header['medical_history'] = 'Medical history';
$header['lab_investigation'] = 'Lab investigations';
$header['any_other_comment'] = 'Any other comment';

echo implode(',', $header) . "\n";
foreach ($csadrs as $csadr) :
	$content = '';
	$row = [];
	foreach ($header as $key => $val) {
		if (array_key_exists($key, $csadr['Sadr'])) {
			$row[$key] = '"' . preg_replace('/"/', '""', $csadr['Sadr'][$key]) . '"';
		} elseif ($key == 'counties') {
			$row[$key] = '"' . preg_replace('/"/', '""', $csadr['County']['county_name']) . '"';
		} elseif ($key == 'designations') {
			$row[$key] = '"' . preg_replace('/"/', '""', $csadr['Designation']['name']) . '"';
		} elseif ($key == 'date_born') {
			$dob = '';
			$bod = $csadr['Sadr']['date_of_birth'];
			if (!empty($bod['year'])) {
				(!empty($bod['day'])) ? $dob .= $bod['day'] . '-' : $dob .= '01-';
				(!empty($bod['month'])) ? $dob .= $bod['month'] . '-' : $dob .= '01-';
				(!empty($bod['year'])) ? $dob .= $bod['year'] : $dob .= '1970';
			}
			($dob) ? $row[$key] = $dob : $row[$key] = '""';
		} elseif ($key == 'onset_date') {
			$rod = '';
			$dor = $csadr['Sadr']['date_of_onset_of_reaction'];
			if (!empty($dor['year'])) {
				(!empty($dor['day'])) ? $rod .= $dor['day'] . '-' : $rod .= '01-';
				(!empty($dor['month'])) ? $rod .= $dor['month'] . '-' : $rod .= '01-';
				(!empty($dor['year'])) ? $rod .= $dor['year'] : $rod .= '1970';
			}
			($rod) ? $row[$key] = $rod : $row[$key] = '""';
		} elseif ($key == 'drugs') {
			foreach ($csadr['SadrListOfDrug'] as $sadrListOfDrug) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $sadrListOfDrug['drug_name'] : $row[$key] = $sadrListOfDrug['drug_name'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'brands') {
			foreach ($csadr['SadrListOfDrug'] as $sadrListOfDrug) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $sadrListOfDrug['brand_name'] : $row[$key] = $sadrListOfDrug['brand_name'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'batch_no') {
			foreach ($csadr['SadrListOfDrug'] as $sadrListOfDrug) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $sadrListOfDrug['batch_no'] : $row[$key] = $sadrListOfDrug['batch_no'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'manufacturers') {
			foreach ($csadr['SadrListOfDrug'] as $sadrListOfDrug) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $sadrListOfDrug['manufacturer'] : $row[$key] = $sadrListOfDrug['manufacturer'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'start_date') {
			foreach ($csadr['SadrListOfDrug'] as $sadrListOfDrug) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $sadrListOfDrug['start_date'] : $row[$key] = $sadrListOfDrug['start_date'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'end_date') {
			foreach ($csadr['SadrListOfDrug'] as $sadrListOfDrug) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $sadrListOfDrug['stop_date'] : $row[$key] = $sadrListOfDrug['stop_date'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'drug_indication') {
			foreach ($csadr['SadrListOfDrug'] as $sadrListOfDrug) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $sadrListOfDrug['indication'] : $row[$key] = $sadrListOfDrug['indication'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		}
		elseif ($key == 'suspected_drug') {
			foreach ($csadr['SadrListOfDrug'] as $sadrListOfDrug) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $sadrListOfDrug['suspected_drug'] : $row[$key] = $sadrListOfDrug['suspected_drug'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		}
		// Start of Medicines
		//  `med_drug_name`, `med_brand_name`, `med_batch_no`, `med_manufacturer`, `med_dose`, `med_start_date`, `med_stop_date`, `med_indication`
		elseif ($key == 'med_drug_name') {
			foreach ($csadr['SadrListOfMedicine'] as $med) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $med['drug_name'] : $row[$key] = $med['drug_name'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'med_brand_name') {
			foreach ($csadr['SadrListOfMedicine'] as $med) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $med['brand_name'] : $row[$key] = $med['brand_name'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'med_batch_no') {
			foreach ($csadr['SadrListOfMedicine'] as $med) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $med['batch_no'] : $row[$key] = $med['batch_no'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'med_manufacturer') {
			foreach ($csadr['SadrListOfMedicine'] as $med) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $med['manufacturer'] : $row[$key] = $med['manufacturer'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'med_dose') {
			foreach ($csadr['SadrListOfMedicine'] as $med) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $med['dose'] : $row[$key] = $med['dose'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'med_start_date') {
			foreach ($csadr['SadrListOfMedicine'] as $med) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $med['start_date'] : $row[$key] = $med['start_date'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'med_stop_date') {
			foreach ($csadr['SadrListOfMedicine'] as $med) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $med['stop_date'] : $row[$key] = $med['stop_date'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		} elseif ($key == 'med_indication') {
			foreach ($csadr['SadrListOfMedicine'] as $med) {
				(isset($row[$key])) ? $row[$key] .= '; ' . $med['indication'] : $row[$key] = $med['indication'];
			}
			(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/', '""', $row[$key]) . '"' : $row[$key] = '""';
		}
		// End of medicines


	}
	echo implode(',', $row) . "\n";
endforeach;
