<?php
foreach($counties as $key => $value) {
	$tis['county'.$key ] = array('key' => $key , 'value' => $value );
}
$xml = Xml::fromArray(array('response' => $tis));
echo $xml->asXML();