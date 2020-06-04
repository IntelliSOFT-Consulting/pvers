<?php
foreach($frequencies as $key => $value) {
	$tis['frequency'.$key ] = array('key' => $key , 'value' => $value );
}
$xml = Xml::fromArray(array('response' => $tis));
echo $xml->asXML();