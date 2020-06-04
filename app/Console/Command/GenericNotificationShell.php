<?php
App::uses('String', 'Utility');
App::uses('Sanitize', 'Utility');
App::uses('Router', 'Routing');
config('routes');
App::uses('Shell', 'Console');
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

class GenericNotificationShell extends Shell {
    public $uses = array('User','Sae', 'Notification', 'Message');
    
    public function perform() {
      $this->initialize();
      $this->{array_shift($this->args)}();
    }

    public function  sendNotification() {
        $save_data = array('Notification' => array(
           'user_id' => $this->args[0]['user_id'],
           'type' => $this->args[0]['type'],
           'model' => $this->args[0]['model'],
           'foreign_key' => $this->args[0]['id'],
           'title' => $this->args[0]['subject'],
           'system_message' => $this->args[0]['message'],
           ),
        );

        $this->log($save_data, 'generic-notification-success');
        //Send notification
        $this->Notification->Create();
        if (!$this->Notification->save($save_data)) {
                 $this->log('Notification '.$save_data['type'].' could not be saved', 'generic-notification-error');
                 $this->log($save_data, 'generic-notification-error');
        }
    }
   
}

