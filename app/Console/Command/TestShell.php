<?php
App::uses('Sanitize', 'Utility');
App::uses('Router', 'Routing');
config('routes');
App::uses('Shell', 'Console');
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

class TestShell extends AppShell {
    public $uses = array('User', 'Notification', 'Message');
    
    public function main() {
       $this->out('Hello world.');
       $email = new CakeEmail();
       $email->config('gmail'); 
       $email->to('kiprotich.japheth19@gmail.com'); 
       $email->subject('test email'); 
       if(!$email->send('My message to youhouhou')) {
           $this->log($email, 'test_email');
       }
    }
}
