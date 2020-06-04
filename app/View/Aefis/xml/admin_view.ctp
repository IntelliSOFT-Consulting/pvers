<?php
$xml = Xml::fromArray(array('response' => $aefi));
echo $xml->asXML();