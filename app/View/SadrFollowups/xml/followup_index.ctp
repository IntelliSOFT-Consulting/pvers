<?php
$xml = Xml::fromArray(array('response' => array('report' => $SadrFollowups)));
echo $xml->asXML();