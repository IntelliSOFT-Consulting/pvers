<?php
// foreach($counties as $key => $value) {
	// $tis['county'.$key ] = array('key' => $key , 'value' => $value );
// }
// $xml = Xml::fromArray(array('response' => $tis));// You can use Xml::build()
// echo $xml->asXML();

$xml = Xml::fromArray(array('response' => array('report' => $aefis)));
// $xml = Xml::fromArray($newArray);
echo $xml->asXML();
// pr($newArray);