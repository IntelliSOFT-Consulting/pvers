<?php
App::uses('String', 'Utility');
App::uses('Sanitize', 'Utility');
App::uses('Router', 'Routing');
config('routes');
App::uses('Shell', 'Console');
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

class GenericEmailShell extends Shell {
    public $uses = array('Notification', 'Message');

    public function perform() {
      $this->initialize();
      $this->{array_shift($this->args)}();
    }

    public function  sendEmail() {
        
        $Email = new CakeEmail();
        //Send Email
        $Email->config('gmail');
        $Email->template('default');
        $Email->emailFormat('html');
        $Email->to($this->args[0]['email']);

        // $Email->subject(String::insert($messages['Message']['subject'], $variables));
        $Email->subject($this->args[0]['subject']);
        // $Email->viewVars(array('message' => String::insert($messages['Message']['content'], $variables)));
        $Email->viewVars(array('message' => $this->args[0]['message']));
        $this->log($Email, 'generic-email');
        if(!$Email->send()) {
            $this->log($Email, 'generic-email');
        }        
    }
}

