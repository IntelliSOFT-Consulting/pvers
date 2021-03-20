<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
/**
 * Comments Controller
 */
class CommentsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	
    public function report_feedback() {
        if ($this->request->is('post')) {
            $this->Comment->create();
            if ($this->Comment->saveAssociated($this->request->data, array('deep' => true))) {
                
                //******************       Send Email and Notifications to Reporter and Managers          *****************************
                  $this->loadModel('Message');
                  $html = new HtmlHelper(new ThemeView());
                  $message = $this->Message->find('first', array('conditions' => array('name' => 'report_feedback')));
                  $this->loadModel('Sadr');
                  $sadr = $this->Sadr->find('first', array(
                      'contain' => array(),
                      'conditions' => array('Sadr.id' => $this->request->data['Comment']['foreign_key'])
                  ));

                  $users = $this->Sadr->User->find('all', array(
                      'contain' => array(),
                      'conditions' => array('OR' => array('User.id' => $sadr['Sadr']['user_id'], 'User.group_id' => 2))
                  ));
                  foreach ($users as $user) {
                      $actioner = ($user['User']['group_id'] == 2) ? 'manager' : 'reporter';
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $sadr['Sadr']['reference_no'], 
                        'comment_subject' => $this->request->data['Comment']['subject'],
                        'comment_content' => $this->request->data['Comment']['content'],
                        'reference_link' => $html->link($sadr['Sadr']['reference_no'], array('controller' => 'sadrs', 'action' => 'view', $sadr['Sadr']['id'], $actioner => true, 'full_base' => true), 
                          array('escape' => false)),
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $this->request->data['Comment']['foreign_key'], 'user_id' => $user['User']['id'], 'type' => 'report_feedback', 'model' => 'Sadr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );
                      $this->loadModel('Queue.QueuedTask');
                      $this->QueuedTask->createJob('GenericEmail', $datum);
                      $this->QueuedTask->createJob('GenericNotification', $datum);
                  }
                //**********************************    END   *********************************

                $this->Session->setFlash(__('The comment has been sent to the user'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The comment could not be saved. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }
    public function manager_report_feedback() {
        $this->report_feedback();
    }
    public function reporter_report_feedback() {
        $this->report_feedback();
    }
}
