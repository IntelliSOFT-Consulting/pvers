<?php
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');

class RemindersShell extends AppShell {
  
    public $uses = array('Aefi', 'Sadr', 'Pqmp', 'Device', 'Medication', 'Transfusion', 'Message', 'Reminder');

    public function main() {
        //Get all unsubmitted Aefis without reminders older than -1 day and send reminder
        $aefis = $this->Aefi->find('all',
                array(
                        'conditions' => array('ifnull(Aefi.submitted, 0)' => '0', 'Aefi.created <=' => date("Y-m-d", strtotime('-1 day')), 'reminders.id' => null),
                        'contain' => array('User'),
                        'joins' => array(
                                array('table' => 'reminders', 'type' => 'LEFT', 'conditions' => array('reminders.foreign_key = Aefi.id'))
                            )
                    )
                );
        foreach ($aefis as $aefi) { 
            // $this->out($aefi['Aefi']['reference_no']);
            if (!empty($aefi['Aefi']['reporter_email'])) {
                $html = new HtmlHelper(new ThemeView());
                $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_reminder_email')));
                $variables = array(
                  'name' => $aefi['User']['name'], 'reference_no' => $aefi['Aefi']['reference_no'], 'type' => 'AEFI', 'created' => $aefi['Aefi']['created'],
                  'reference_link' => $html->link($aefi['Aefi']['reference_no'], array('controller' => 'aefis', 'action' => 'edit', $aefi['Aefi']['id'], 'reporter' => true, 'full_base' => true), 
                    array('escape' => false)),
                  'modified' => $aefi['Aefi']['modified']
                  );
                $datum = array(
                    'email' => $aefi['Aefi']['reporter_email'],
                    'user_id' => $aefi['Aefi']['user_id'], 'type' => 'reporter_reminder_email', 'model' => 'Aefi',
                    'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    'message' => CakeText::insert($message['Message']['content'], $variables)
                  );
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);

                $this->Reminder->create();
                $rem = array();
                $rem['foreign_key'] = $aefi['Aefi']['id'];
                $rem['user_id'] = $aefi['Aefi']['user_id'];
                $rem['model'] = 'Aefi';
                $rem['reminder_type'] = 'reporter_reminder_email';
                $this->Reminder->save($rem);
            }            
        }

        //SADRS
        $sadrs = $this->Sadr->find('all',
                array(
                        'conditions' => array('ifnull(Sadr.submitted, 0)' => '0', 'Sadr.created <=' => date("Y-m-d", strtotime('-1 day')), 'reminders.id' => null),
                        'contain' => array('User'),
                        'joins' => array(
                                array('table' => 'reminders', 'type' => 'LEFT', 'conditions' => array('reminders.foreign_key = Sadr.id'))
                            )
                    )
                );
        foreach ($sadrs as $sadr) { 
            // $this->out($sadr['Sadr']['reference_no']);
            if (!empty($sadr['Sadr']['reporter_email'])) {
                $html = new HtmlHelper(new ThemeView());
                $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_reminder_email')));
                $variables = array(
                  'name' => $sadr['User']['name'], 'reference_no' => $sadr['Sadr']['reference_no'], 'type' => 'SADR', 'created' => $sadr['Sadr']['created'],
                  'reference_link' => $html->link($sadr['Sadr']['reference_no'], array('controller' => 'sadrs', 'action' => 'edit', $sadr['Sadr']['id'], 'reporter' => true, 'full_base' => true), 
                    array('escape' => false)),
                  'modified' => $sadr['Sadr']['modified']
                  );
                $datum = array(
                    'email' => $sadr['Sadr']['reporter_email'],
                    'user_id' => $sadr['Sadr']['user_id'], 'type' => 'reporter_reminder_email', 'model' => 'Sadr',
                    'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    'message' => CakeText::insert($message['Message']['content'], $variables)
                  );
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);

                $this->Reminder->create();
                $rem = array();
                $rem['foreign_key'] = $sadr['Sadr']['id'];
                $rem['user_id'] = $sadr['Sadr']['user_id'];
                $rem['model'] = 'Sadr';
                $rem['reminder_type'] = 'reporter_reminder_email';
                $this->Reminder->save($rem);
            }            
        }


        //PQMPS
        $pqmps = $this->Pqmp->find('all',
                array(
                        'conditions' => array('ifnull(Pqmp.submitted, 0)' => '0', 'Pqmp.created <=' => date("Y-m-d", strtotime('-1 day')), 'reminders.id' => null),
                        'contain' => array('User'),
                        'joins' => array(
                                array('table' => 'reminders', 'type' => 'LEFT', 'conditions' => array('reminders.foreign_key = Pqmp.id'))
                            )
                    )
                );
        foreach ($pqmps as $pqmp) { 
            // $this->out($pqmp['Pqmp']['reference_no']);
            if (!empty($pqmp['Pqmp']['reporter_email'])) {
                $html = new HtmlHelper(new ThemeView());
                $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_reminder_email')));
                $variables = array(
                  'name' => $pqmp['User']['name'], 'reference_no' => $pqmp['Pqmp']['reference_no'], 'type' => 'PQMP', 'created' => $pqmp['Pqmp']['created'],
                  'reference_link' => $html->link($pqmp['Pqmp']['reference_no'], array('controller' => 'pqmps', 'action' => 'edit', $pqmp['Pqmp']['id'], 'reporter' => true, 'full_base' => true), 
                    array('escape' => false)),
                  'modified' => $pqmp['Pqmp']['modified']
                  );
                $datum = array(
                    'email' => $pqmp['Pqmp']['reporter_email'],
                    'user_id' => $pqmp['Pqmp']['user_id'], 'type' => 'reporter_reminder_email', 'model' => 'Pqmp',
                    'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    'message' => CakeText::insert($message['Message']['content'], $variables)
                  );
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);

                $this->Reminder->create();
                $rem = array();
                $rem['foreign_key'] = $pqmp['Pqmp']['id'];
                $rem['user_id'] = $pqmp['Pqmp']['user_id'];
                $rem['model'] = 'Pqmp';
                $rem['reminder_type'] = 'reporter_reminder_email';
                $this->Reminder->save($rem);
            }            
        }


        //DEVICES
        $devices = $this->Device->find('all',
                array(
                        'conditions' => array('ifnull(Device.submitted, 0)' => '0', 'Device.created <=' => date("Y-m-d", strtotime('-1 day')), 'reminders.id' => null),
                        'contain' => array('User'),
                        'joins' => array(
                                array('table' => 'reminders', 'type' => 'LEFT', 'conditions' => array('reminders.foreign_key = Device.id'))
                            )
                    )
                );
        foreach ($devices as $device) { 
            // $this->out($device['Device']['reference_no']);
            if (!empty($device['Device']['reporter_email'])) {
                $html = new HtmlHelper(new ThemeView());
                $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_reminder_email')));
                $variables = array(
                  'name' => $device['User']['name'], 'reference_no' => $device['Device']['reference_no'], 'type' => 'DEVICE', 'created' => $device['Device']['created'],
                  'reference_link' => $html->link($device['Device']['reference_no'], array('controller' => 'devices', 'action' => 'edit', $device['Device']['id'], 'reporter' => true, 'full_base' => true), 
                    array('escape' => false)),
                  'modified' => $device['Device']['modified']
                  );
                $datum = array(
                    'email' => $device['Device']['reporter_email'],
                    'user_id' => $device['Device']['user_id'], 'type' => 'reporter_reminder_email', 'model' => 'Device',
                    'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    'message' => CakeText::insert($message['Message']['content'], $variables)
                  );
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);

                $this->Reminder->create();
                $rem = array();
                $rem['foreign_key'] = $device['Device']['id'];
                $rem['user_id'] = $device['Device']['user_id'];
                $rem['model'] = 'Device';
                $rem['reminder_type'] = 'reporter_reminder_email';
                $this->Reminder->save($rem);
            }            
        }

        //MEDICATIONS
        $medications = $this->Medication->find('all',
                array(
                        'conditions' => array('ifnull(Medication.submitted, 0)' => '0', 'Medication.created <=' => date("Y-m-d", strtotime('-1 day')), 'reminders.id' => null),
                        'contain' => array('User'),
                        'joins' => array(
                                array('table' => 'reminders', 'type' => 'LEFT', 'conditions' => array('reminders.foreign_key = Medication.id'))
                            )
                    )
                );
        foreach ($medications as $medication) { 
            // $this->out($medication['Medication']['reference_no']);
            if (!empty($medication['Medication']['reporter_email'])) {
                $html = new HtmlHelper(new ThemeView());
                $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_reminder_email')));
                $variables = array(
                  'name' => $medication['User']['name'], 'reference_no' => $medication['Medication']['reference_no'], 'type' => 'MEDICATION', 'created' => $medication['Medication']['created'],
                  'reference_link' => $html->link($medication['Medication']['reference_no'], array('controller' => 'medications', 'action' => 'edit', $medication['Medication']['id'], 'reporter' => true, 'full_base' => true), 
                    array('escape' => false)),
                  'modified' => $medication['Medication']['modified']
                  );
                $datum = array(
                    'email' => $medication['Medication']['reporter_email'],
                    'user_id' => $medication['Medication']['user_id'], 'type' => 'reporter_reminder_email', 'model' => 'Medication',
                    'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    'message' => CakeText::insert($message['Message']['content'], $variables)
                  );
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);

                $this->Reminder->create();
                $rem = array();
                $rem['foreign_key'] = $medication['Medication']['id'];
                $rem['user_id'] = $medication['Medication']['user_id'];
                $rem['model'] = 'Medication';
                $rem['reminder_type'] = 'reporter_reminder_email';
                $this->Reminder->save($rem);
            }            
        }


        //TRANSFUSIONS
        $transfusions = $this->Transfusion->find('all',
                array(
                        'conditions' => array('ifnull(Transfusion.submitted, 0)' => '0', 'Transfusion.created <=' => date("Y-m-d", strtotime('-1 day')), 'reminders.id' => null),
                        'contain' => array('User'),
                        'joins' => array(
                                array('table' => 'reminders', 'type' => 'LEFT', 'conditions' => array('reminders.foreign_key = Transfusion.id'))
                            )
                    )
                );
        foreach ($transfusions as $transfusion) { 
            // $this->out($transfusion['Transfusion']['reference_no']);
            if (!empty($transfusion['Transfusion']['reporter_email'])) {
                $html = new HtmlHelper(new ThemeView());
                $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_reminder_email')));
                $variables = array(
                  'name' => $transfusion['User']['name'], 'reference_no' => $transfusion['Transfusion']['reference_no'], 'type' => 'TRANSFUSION', 'created' => $transfusion['Transfusion']['created'],
                  'reference_link' => $html->link($transfusion['Transfusion']['reference_no'], array('controller' => 'transfusions', 'action' => 'edit', $transfusion['Transfusion']['id'], 'reporter' => true, 'full_base' => true), 
                    array('escape' => false)),
                  'modified' => $transfusion['Transfusion']['modified']
                  );
                $datum = array(
                    'email' => $transfusion['Transfusion']['reporter_email'],
                    'user_id' => $transfusion['Transfusion']['user_id'], 'type' => 'reporter_reminder_email', 'model' => 'Transfusion',
                    'subject' => CakeText::insert($message['Message']['subject'], $variables),
                    'message' => CakeText::insert($message['Message']['content'], $variables)
                  );
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);

                $this->Reminder->create();
                $rem = array();
                $rem['foreign_key'] = $transfusion['Transfusion']['id'];
                $rem['user_id'] = $transfusion['Transfusion']['user_id'];
                $rem['model'] = 'Transfusion';
                $rem['reminder_type'] = 'reporter_reminder_email';
                $this->Reminder->save($rem);
            }            
        }
    }
}

?>