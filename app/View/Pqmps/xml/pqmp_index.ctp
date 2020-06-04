<?php
$xml = Xml::fromArray(array('response' => array('report' => $pqmps)));
echo $xml->asXML();