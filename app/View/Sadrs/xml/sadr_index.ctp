<?php
$xml = Xml::fromArray(array('response' => array('report' => $sadrs)));
echo $xml->asXML();