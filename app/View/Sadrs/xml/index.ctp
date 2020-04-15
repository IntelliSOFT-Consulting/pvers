<?php
// Do some formatting and manipulation on
// the $recipes array.
$xml = Xml::fromArray(array('response' => $sadrs));
echo $xml->asXML();