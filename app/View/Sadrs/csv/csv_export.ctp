<?php
	
	$header = array('id' => '#', 'reference_no' => 'Reference No.', 'report_title' => 'Report Title',
		'created' => 'Date Created', 'reporter_date' => 'Report Date'
		);
	
	echo implode(',', $header)."\n";
	foreach ($csadrs as $csadr):
		$content = '';
		$row = [];
		foreach ($header as $key => $val) {
			if (array_key_exists($key, $csadr['Sadr'])) {
				$row[$key] = '"' . preg_replace('/"/','""',$csadr['Sadr'][$key]) . '"';
			} 
		}
		echo implode(',', $row) . "\n";
	endforeach;
?>