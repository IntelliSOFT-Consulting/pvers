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
foreach ($notifications as $notification) :
	$content = '';
	$row = [];
	foreach ($header as $key => $val) {
		if (array_key_exists($key, $notification['Notification'])) {
			$row[$key] = '"' . preg_replace('/"/', '""', $notification['Notification'][$key]) . '"';
		} 


	}
	echo implode(',', $row) . "\n";
endforeach;
