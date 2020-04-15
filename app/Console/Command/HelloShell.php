<?php
class HelloShell extends AppShell {
    public $uses = array('User', 'Sadr');

    public function show() {
        // $user = $this->User->findById($this->args[0]);
        // $this->out(print_r($user, true));

        $sadrs = $this->Sadr->find('all', array(
            'fields' => array('Sadr.id', 'Sadr.reporter_email', 'Sadr.notified'),
            'conditions' => array('Sadr.notified <' => 2, 'Sadr.submitted' => 0, 'Sadr.modified <' => date("Y-m-d H:i:s", strtotime("-1 day"))),
            'recursive' => -1
          ));
//        $this->out(print_r($sadrs, true));
 $this->Sadr->set(array('Sadr' => array('reporter_email' => 'wagwan@oke.co.ke')));
 if ($this->Sadr->validates(array('fieldList' => array('reporter_email')))) $this->out('eureka! wa gwan');

        // $email = new CakeEmail();
        // foreach ($sadrs as $sadr) {
        //   $this->id = $this->Luhn_Verify($sadr['Sadr']['id']);
        //   if($this->saveField('notified', $sadr['Sadr']['notified'] + 1)){
        //     $email->config('gmail');
        //     $email->template('notify_sadr');
        //     $email->emailFormat('html');
        //     $email->to($sadr['Sadr']['reporter_email']);
        //     $email->subject(Configure::read('Emails.notify_sadr.subject').$sadr['Sadr']['id']);
        //     $email->viewVars(array('ID' => $sadr['Sadr']['id'], 'root' => Configure::read('Domain.root')));
        //     if(!$email->send()){
        //       $this->log($email, 'debug');
        //     }
        //   }
        // }
    }
    function testMail() {
        Configure::load('appwide');
        $this->out('Start TEST!!');
        $Email = new CakeEmail();
        $Email->config('gmail');
        $Email->from(array('pv@pharmacyboardkenya.org' => 'PV Site'));
        $Email->to('eddieokemwa@gmail.com');
        $Email->subject('EUREKA Subject');
$mySend = $Email->send('Shukran is my message');
        $this->log($mySend, 'debug');

        // Configure::load('appwide');
        // $email = new CakeEmail();

        // $email->config('gmail');
        // $email->template('new_sadr');
        // $email->emailFormat('html');
        // $email->to($val);
        //           $email->cc(array('pv@pharmacyboardkenya.org', 'info@pharmacyboardkenya.org'));
        // $email->subject(Configure::read('Emails.new_sadr.subject').$key);
        // $email->viewVars(array('ID' => $key, 'root' => Configure::read('Domain.root')));
        // if(!$email->send()) {
        //     $this->log($email, 'debug');
        // }
    }   
}
