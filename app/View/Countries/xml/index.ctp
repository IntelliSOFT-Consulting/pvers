<?php
foreach($countries as $key => $value) {
	$tis['country'.$key ] = array('key' => $key , 'value' => $value );
}
$xml = Xml::fromArray(array('response' => $tis));
echo $xml->asXML();