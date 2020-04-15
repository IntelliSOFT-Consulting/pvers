<?php
$xml = Xml::fromArray(array('response' => $sadrsFollowup));
echo $xml->asXML();