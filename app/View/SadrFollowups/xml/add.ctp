<?php
$message['validationErrors'] = $this->validationErrors;
$xml = Xml::fromArray(array('response' => $message));
echo $xml->asXML();