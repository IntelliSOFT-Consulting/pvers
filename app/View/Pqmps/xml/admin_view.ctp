<?php
$xml = Xml::fromArray(array('response' => $pqmp));
echo $xml->asXML();