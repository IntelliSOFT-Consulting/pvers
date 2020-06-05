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
       //$email->template('default');
       //$email->emailFormat('html');
       //$email->from(array('eddyokemwa@gmail.com' => 'My test'));
       $email->to('eddyokemwa@gmail.com');
       // $email->subject(Configure::read('Emails.registration.subject'));
       $email->subject('test email');
       //$email->viewVars(array('message' => 'This is a dummy message. seen'));
       if(!$email->send('My message to youhouhou')) {
           $this->log($email, 'test_email');
       }
    }
}
