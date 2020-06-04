<?php
$xml = Xml::fromArray(array('response' => $sadr));
echo $xml->asXML();