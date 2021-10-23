<?php
App::uses('Sanitize', 'Utility');
App::uses('Router', 'Routing');
config('routes');
App::uses('Shell', 'Console');
App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');

class GenericSmsShell extends Shell {
    public $uses = array('Notification', 'Message');

    public function perform() {
      $this->initialize();
      $this->{array_shift($this->args)}();
    }

    public function  sendSms() {
        $HttpSocket = new HttpSocket();
        // string data
        $payload = 'username='.Configure::read('africastalking_username').'&to=%2B254729932475&message=Uwinguni&from='.Configure::read('africastalking_from');
        $results = $HttpSocket->post(
            Configure::read('africastalking_api'),
            $payload,
            array('header' => array('Accept' => 'application/json' ,'Content-Type' => 'application/x-www-form-urlencoded', 'apiKey' => Configure::read('africastalking_key')))
        );
        if (!$results->isOk()) {
            $body = $results->body;
            $this->log($body, 'generic-sms');
        }     
    }
}

