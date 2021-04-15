<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'medicinal_product' => 'Medicinal product', 'blood_products' => 'Blood products',
		'herbal_product' => 'Herbal product',
		'medical_device' => 'Medical device',
		'product_vaccine' => 'Vaccine', 'cosmeceuticals' => 'Cosmeceuticals',
		'product_other' => 'Others', 'product_specify' => 'Others',
		'facility_name' => 'Facility Name', 'facility_address' => 'Address',
		'facility_code' => 'Facility Code', 
		'counties' => 'County',
		'brand_name' => 'Brand Name', 'name_of_manufacturer' => 'Manufacturer',
		'generic_name' => 'Generic Name', 
		'country' => 'Country',
		'supplier_name' => 'Supplier', 
		'product_formulation' => 'Product Formulation',
		'product_formulation_specify' => 'Specify',
		'colour_change' => 'Colour change',
		'separating' => 'Separating',
		'powdering' => 'Powdering',
		'caking' => 'Caking',
		'moulding' => 'Moulding',
		'odour_change' => 'Odour change',
		'mislabeling' => 'Mislabeling',
		'incomplete_pack' => 'Incomplete Pack',
		'complaint_other' => 'Complaint Other',
		'packaging' => 'Packaging',
		'labelling' => 'Labelling',
		'sampling' => 'Sampling',
		'mechanism' => 'Mechanism',
		'electrical' => 'Electrical',
		'device_data' => 'Data',
		'software' => 'Software',
		'environmental' => 'Environmental',
		'failure_to_calibrate' => 'Failure to calibrate',
		'results' => 'Results',
		'readings' => 'Readings',
		'require_refrigeration' => 'Refrigeration',
		'product_at_facility' => 'Paralysis', 
		'returned_by_client' => 'Returned by client',
		'stored_to_recommendations' => 'Recommendations',
		// 'reporter_name' => 'Reporter', 'reporter_email' => 'Reporter email',
		// 'reporter_phone' => 'Reporter phone', 
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
	);
	if($this->Session->read('Auth.User.user_type') != 'Public Health Program') {
		$header['reporter_name'] = 'Reporter';
		$header['reporter_email'] = 'Reporter email';
		$header['reporter_phone'] = 'Reporter phone';
		// $header['patient_name'] = 'Patient name';
	}

	//Additional free text columns
	$header['other_details'] = 'Other details';
	$header['comments'] = 'Comments';

	echo implode(',', $header)."\n";
	foreach ($cpqmps as $cpqmp):
		$content = '';
		$row = [];
		foreach ($header as $key => $val) {
			if (array_key_exists($key, $cpqmp['Pqmp'])) {
				$row[$key] = '"' . preg_replace('/"/','""',$cpqmp['Pqmp'][$key]) . '"';
			} elseif ($key == 'counties') {
				$row[$key] = '"' . preg_replace('/"/','""',$cpqmp['County']['county_name']) . '"';
			} elseif ($key == 'country') {
				$row[$key] = '"' . preg_replace('/"/','""',$cpqmp['Country']['name']) . '"';
			}
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>