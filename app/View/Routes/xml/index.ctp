<?php
foreach($routes as $key => $value) {
	$tis['route'.$key ] = array('key' => $key , 'value' => $value );
}
$xml = Xml::fromArray(array('response' => $tis));
echo $xml->asXML();