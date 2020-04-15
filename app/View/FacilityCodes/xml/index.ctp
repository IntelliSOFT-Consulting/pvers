<?php
$xml = Xml::fromArray(array('response' => array('report' => $facilityCodes)));
echo $xml->asXML();