<?php
foreach($doses as $key => $value) {
	$tis['dose'.$key ] = array('key' => $key , 'value' => $value );
}
$xml = Xml::fromArray(array('response' => $tis));
echo $xml->asXML();