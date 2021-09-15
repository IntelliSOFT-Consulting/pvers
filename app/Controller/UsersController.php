<?php
App::uses('AppController', 'Controller');
App::uses('Validation', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');

// use Firebase\JWT\JWT;
// App::import('Vendor', 'firebase/php-jwt/src/JWT');
// App::uses('JWT', 'JWT');
require_once(ROOT . DS . 'app' . DS .'Vendor' . DS  . 'firebase' . DS . 'php-jwt' . DS. 'src' . DS . 'JWT.php');
// use JWT;

// App::import('Vendor', 'JWT', array('file' => 'firebase/phpa-jwt/src/JWT.php'));
use Firebase\JWT\JWT;

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    public $components = array('Search.Prg');
    public $uses = array('User', 'Message');
    public $paginate = array();
    public $presetVars = true;

    public $helpers = array('Tools.Captcha' => array('type' => 'active'));
    
    public function beforeFilter() {
        parent::beforeFilter();
        // remove initDb
        $this->Auth->allow('register', 'login', 'api_register', 'api_token', 'activate_account', 'forgotPassword', 'resetPassword', 'logout', 'initDB');
    }


    public function login() {
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash('You are logged in!', 'alerts/flash_success');
            $this->redirect('/', null, false);
        }

        if ($this->request->is('post')) {
            if (Validation::email($this->request->data['User']['username'])) {                
                $this->Auth->authenticate = array(
                    'Form' => ['fields' => ['username' => 'email']]
                );
                $this->Auth->constructAuthenticate();
                $this->request->data['User']['email'] = $this->request->data['User']['username'];
                unset($this->request->data['User']['username']);
            }

            if ($this->Auth->login()) {

                if($this->Auth->User('is_active') == 0) {
                    $this->Session->setFlash('Your account is not activated! If you have just registered, please click the activation link
                        sent to your email. Remember to check you spam folder too!', 'alerts/flash_error');
                    $this->redirect($this->Auth->logout());
                } elseif ($this->Auth->User('deactivated') == 1) {
                    $this->Session->setFlash('Your account has been deactivated! Please contact PPB.', 'alerts/flash_error');
                    $this->redirect($this->Auth->logout());
                }

                 
                // $this->redirect($this->Auth->redirect());
                // if(strlen($this->Auth->redirect()) > 12) {
                //     return $this->redirect($this->Auth->redirect());           
                // }
                if($this->Auth->User('group_id') == '1') $this->redirect(array('controller' => 'users', 'action' => 'dashboard', 'admin' => true));
                if($this->Auth->User('group_id') == '2') $this->redirect(array('controller' => 'users', 'action' => 'dashboard', 'manager' => true));
                if($this->Auth->User('group_id') == '3') $this->redirect(array('controller' => 'users', 'action' => 'dashboard', 'reporter' => true));
                if($this->Auth->User('group_id') == '4') $this->redirect(array('controller' => 'users', 'action' => 'dashboard', 'partner' => true));
            } else {
                $this->Session->setFlash('Your username or password is incorrect.', 'alerts/flash_error');
            }
        }

    }

    public function api_restricted() {
        $user = $this->Auth->User('User.id');
        $this->set([
                'success' => false,
                'data' => $user,
                '_serialize' => ['success', 'data']
            ]);
    }

    public function api_login() {
        // if (!class_exists('JWT')) {
        //     throw new RuntimeException('Your desired vendor library cannot be found');
        // }
        if ($this->request->is('post')) {
            if($this->Auth->login()) {
                $user = $this->Auth->User();
                $token = JWT::encode($user['id'], Configure::read('Security.salt'));;
                if($user) {
                    $this->set('user', $user);
                    $this->set('token', $token);
                    $this->set('_serialize', array('user', 'token'));
                } else {
                    $this->set([
                            'success' => false,
                            'data' => $this->request->data,
                            '_serialize' => ['success', 'data']
                        ]);
                }
            } else {
                throw new UnauthorizedException('Invalid username or password');
            }            
        } else {
            throw new MethodNotAllowedException();
        }
    }

    public function api_token() {
        // Find user using username and hashed password
        // return user object for now
        //$user = $this->User->find('first', array('conditions' => array('User.username' => $this->request->data['User']['username'])));
        /*$user = ($this->Auth->login());
        $token = 'Token';
        if($user) {
            $this->set('user', $this->Auth->User());
            $this->set('token', $token);
            $this->set('_serialize', array('user', 'token'));
        } else {
            $this->set([
                    'success' => false,
                    'data' => $this->request->data,
                    '_serialize' => ['success', 'data']
                ]);
        }*/
        $this->set([
                'aefi' => $this->User->Aefi->find('first', array('conditions' => array('Aefi.id' => 619))), 
                // 'aefi' => $this->User->find('first', array('conditions' => array('User.id' => 2397), 'recursive' => -1, 'contian' => null)), 
                '_serialize' => ['aefi']]);
    }

    public function apis_login() {
        if ($this->request->is('post')) {

            if (Validation::email($this->request->data['User']['username'])) {              
                $this->Auth->authenticate = array(
                    'Form' => ['fields' => ['username' => 'email']]
                );
                $this->Auth->constructAuthenticate();
                $this->request->data['User']['email'] = $this->request->data['User']['username'];
                unset($this->request->data['User']['username']);
            }

            if ($this->Auth->login()) {

                // if($this->Auth->User('is_active') == 0) {
                //     $this->Session->setFlash('Your account is not activated! If you have just registered, please click the activation link
                //         sent to your email. Remember to check you spam folder too!', 'alerts/flash_error');
                //     $this->redirect($this->Auth->logout());
                // } elseif ($this->Auth->User('deactivated') == 1) {
                //     $this->Session->setFlash('Your account has been deactivated! Please contact PPB.', 'alerts/flash_error');
                //     $this->redirect($this->Auth->logout());
                // }

                $this->set([
                    'status' => 'success',
                    'user' => $this->Auth->User('username'),
                    'data' => [
                        'token' => JWT::encode(
                            [
                                'sub' => $user['id'],
                                // 'exp' =>  time() + 604800
                            ],
                            Security::salt()
                        )
                    ],
                    '_serialize' => ['status', 'user', 'data']
                ]);

            } else {
                // $this->Session->setFlash('Your username or password is incorrect.', 'alerts/flash_error');
                $this->set([
                    'status' => 'failed',
                    'message' => 'Failed to register user',
                    'validation' => $this->User->validationErrors,
                    '_serialize' => ['status', 'message', 'validation']
                ]);
            }
        }
        /*if ($this->Auth->login()) {
            $user = $this->Auth->user();
            $token = JWT::encode($user, Configure::read('Security.salt'));
            $this->set('user', $user);
            $this->set('token', $token);
            $this->set('_serialize', array('user', 'token'));
        } else {
            throw new NotAcceptableException(__('Email or password is wrong.'));
        }*/

    }

    public function logout() {
        $this->Session->setFlash('Good-Bye','flash_info');
        $this->redirect($this->Auth->logout());
    }

    public function changePassword() {
        if (!$this->Auth->User('id')) {
            $this->Session->setFlash(__('You are NOT logged in! Please login to change your password'), 'flash_info');
            $this->redirect('/', null, false);
        }
        if ($this->request->is('post')  || $this->request->is('put')) {
            $this->request->data['User']['id'] = $this->Session->read('Auth.User.id');
            unset($this->User->validate['email']);
            $this->User->create();
            if ($this->User->save($this->request->data, array('fieldList' => array('old_password', 'password', 'confirm_password')))) {
                $this->Session->setFlash(__('The password has been changed'), 'flash_success');
                $this->redirect(array('action' => 'changePassword'));
            } else {
                $this->Session->setFlash(__('The password could not be changed.'), 'flash_error');
                // pr($this->request->data);
            }
        }
        $this->User->Designation->recursive = -1;
        $this->set('designation', $this->User->Designation->findById($this->Auth->user('designation_id'), array('name')));
        $this->User->County->recursive = -1;
        $this->set('county', $this->User->County->findById($this->Auth->user('county_id'), array('county_name')));
    }

    public function forgotPassword() {
        if ($this->Auth->user('id')) {
            $this->Session->setFlash(__('You are logged in! Please logout to request password change'), 'flash_info');
            $this->redirect('/', null, false);
        }
        if ($this->request->is('post')) {
            $user = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
            if ($user) {
                $this->User->id = $user['User']['id'];
                $this->User->saveField('forgot_password', 1);
                //******************       Send Email and Notifications to Reporter and Managers          *****************************
                $this->loadModel('Message');
                $html = new HtmlHelper(new ThemeView());
                $user_email = $this->Message->find('first', array('conditions' => array('name' => 'forgot_password')));
                $variables = array(
                        'name' => $user['User']['name'], 'username' => $user['User']['username'], 
                        'email' => $user['User']['email'], 
                        'reset_link' => $html->link('RESET', array('controller' => 'users', 'action' => 'resetPassword', $user['User']['id'], 'full_base' => true), 
                          array('escape' => false)),
                        'password' => date('Ymdhis', strtotime($user['User']['created'])),
                      );
                $datum = array(
                    'email' => $user['User']['email'], 'cc' => ((!empty($user['User']['sponsor_email'])) ? $user['User']['sponsor_email'] : null),
                    'id' => $user['User']['id'], 'user_id' => $user['User']['id'], 'type' => 'user_registration', 'model' => 'User',
                    'subject' => CakeText::insert($user_email['Message']['subject'], $variables),
                    'message' => CakeText::insert($user_email['Message']['content'], $variables)
                );
                // In your controller
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);
                //
                $this->Session->setFlash(__('A new password has been sent to the requested email address.'), 'flash_success');
                $this->redirect('/');
            } else {
                $this->Session->setFlash(__('Could not verify your email address.'), 'flash_error');
            }
        }
    }

    /*public function resetPassword($id) {
        //confirm user id hash for authenticity
        //reset password to autogenerated string (e.g use luhn checksum (5) of id with simple replace e.g 2=>eh)
        $this->User->id = $this->User->Luhn_Verify($id, 7);
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Could not verify the user ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        } else {
            // $this->User->save('forgot_password', 0);
            $user = $this->User->read(null);
            if ($user['User']['forgot_password'] != 2) {
                $this->Session->setFlash(__('The password has not been reset.'), 'flash_error');
                $this->redirect('/');
            }
            if($this->User->save(
                                array('User' => array('password' =>  $id, 'confirm_password' => $id))
                                , array('fieldList' =>  array('password', 'confirm_password'))
            )) {
                $this->Session->setFlash(__('The password has been reset. You may now login using your new password.'), 'flash_success');
            } else {
                $this->Session->setFlash(__('The password has not been reset. Please contact PPB for further help'), 'flash_error');
            }
            $this->redirect('/');
        }
    }*/

    public function resetPassword($id = null) {
        //confirm user id hash for authenticity
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Could not verify the user ID. Please ensure the ID is correct.'), 'alerts/flash_error');
            $this->redirect('/');
        } else {
            $this->User->recursive = -1;
            // $user = $this->User->read(null, $id);
            $user = $this->User->find('first', array('conditions' => array('User.id' => $id)));
            if ($user['User']['forgot_password'] != 1) {
                $this->Session->setFlash(__('The password has not been reset.'), 'alerts/flash_error');
                $this->redirect('/');
            }
                $password = date('Ymdhis', strtotime($user['User']['created']));
            if($this->User->save(
                                array('User' => array('password' =>  $password, 'confirm_password' => $password, 'forgot_password' => 0))
                                , array('fieldList' =>  array('password', 'confirm_password', 'forgot_password'))
            )) {
                $this->Session->setFlash(__('The password has been reset. You may login using your new password.'), 'alerts/flash_success');
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            } else {
                $this->Session->setFlash(__('The password has not been reset. Please contact PPB for further help'), 'alerts/flash_error');
            }
            $this->redirect('/');
        }
    }

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function admin_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
        $criteria = $this->User->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('User.created' => 'desc');
        $this->User->recursive = -1;

        $this->set('users', $this->paginate());
    }

    public function partner_index() {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
        $criteria = $this->User->parseCriteria($this->passedArgs);
        $criteria['User.name_of_institution'] = $this->Auth->User('name_of_institution');       
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('User.created' => 'desc');
        $this->User->recursive = -1;

        $this->set('users', $this->paginate());
    }

    public function admin_user_activate($id = null) {
        if ($id) {
            $this->User->id = $id;
            if ($this->User->saveField('is_active', 1)) {
                return $this->redirect(array( 'controller' => 'users', 'action' => 'index', 'admin' => true ));
            }
        }
    }
/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('You could not be registered. Please try again.'), 'flash_error');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('You could not be registered. Please try again.'), 'flash_error');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
        $designations = $this->User->Designation->find('list');
        $this->set(compact('designations'));
        $counties = $this->User->County->find('list');
        $this->set(compact('counties'));
    }

/**
 * register method
 *
 * @return void
 */

    public function register() {
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash('You are logged in!', 'alerts/flash_warning');
            $this->redirect('/', null, false);
        }
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['group_id'] = 3;
            $this->User->Behaviors->attach('Tools.Captcha');
            if (empty($this->data['User']['bot_stop']) && $this->User->save($this->request->data)) {
                $id = $this->User->id;
                $user['User'] = array_merge($this->request->data['User'], array('id' => $id));
                
                //******************       Send Email and Notifications to Reporter and Managers          *****************************
                $this->loadModel('Message');
                $html = new HtmlHelper(new ThemeView());
                $user_email = $this->Message->find('first', array('conditions' => array('name' => 'user_registration')));
                $manager_nt = $this->Message->find('first', array('conditions' => array('name' => 'manager_registration')));
                $variables = array(
                        'name' => $user['User']['name'], 'username' => $user['User']['username'], 
                        'email' => $user['User']['email'], 
                        'reference_link' => $html->link('Activate', array('controller' => 'users', 'action' => 'activate_account', $id, $this->Auth->password($user['User']['email']), 'full_base' => true), 
                          array('escape' => false)),
                      );
                $datum = array(
                    'email' => $user['User']['email'],
                    'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'user_registration', 'model' => 'User',
                    'subject' => CakeText::insert($user_email['Message']['subject'], $variables),
                    'message' => CakeText::insert($user_email['Message']['content'], $variables)
                );
                // In your controller
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);
                $this->QueuedTask->createJob('GenericNotification', $datum);
                // CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                //Notify Managers
                $managers = $this->User->find('all', array(
                    'contain' => array(),
                    'conditions' => array('group_id' => 2)
                ));
                foreach ($managers as $manager) {
                    $variables = array(
                        'name' => $user['User']['name'], 'username' => $user['User']['username'], 
                        'email' => $user['User']['email'], 
                        'reference_link' => $html->link('Activate', array('controller' => 'users', 'action' => 'activate_account', $id, $this->Auth->password($user['User']['email']), 'full_base' => true), 
                          array('escape' => false)),
                    );
                    $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $manager['User']['id'], 'user_id' => $manager['User']['id'], 'type' => 'manager_registration', 'model' => 'User',
                        'subject' => CakeText::insert($manager_nt['Message']['subject'], $variables),
                        'message' => CakeText::insert($manager_nt['Message']['content'], $variables)
                    );

                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                }
                $this->Session->setFlash(__('You have successfully registered. Please click on the link sent to your email address to
                    activate your account. <small><span class="label label-info">Note</span> Check your spam folder if you
                    don\'t see it in your inbox.</small>'), 'alerts/flash_success');
                $this->redirect('/');
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        }
        $counties = $this->User->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $designations = $this->User->Designation->find('list');
        $this->set(compact('designations'));
    }


    public function api_register() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['group_id'] = 3;
            if ($this->User->save($this->request->data)) {
                $id = $this->User->id;
                $user['User'] = array_merge($this->request->data['User'], array('id' => $id));
                
                //******************       Send Email and Notifications to Reporter and Managers          *****************************
                $this->loadModel('Message');
                $html = new HtmlHelper(new ThemeView());
                $user_email = $this->Message->find('first', array('conditions' => array('name' => 'user_registration')));
                $manager_nt = $this->Message->find('first', array('conditions' => array('name' => 'manager_registration')));
                $variables = array(
                        'name' => $user['User']['name'], 'username' => $user['User']['username'], 
                        'email' => $user['User']['email'], 
                        'reference_link' => $html->link('Activate', array('controller' => 'users', 'action' => 'activate_account', 'prefix' => false, $id, $this->Auth->password($user['User']['email']), 'full_base' => true), 
                          array('escape' => false)),
                      );
                $datum = array(
                    'email' => $user['User']['email'],
                    'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'user_registration', 'model' => 'User',
                    'subject' => CakeText::insert($user_email['Message']['subject'], $variables),
                    'message' => CakeText::insert($user_email['Message']['content'], $variables)
                );
                // In your controller
                $this->loadModel('Queue.QueuedTask');
                $this->QueuedTask->createJob('GenericEmail', $datum);
                $this->QueuedTask->createJob('GenericNotification', $datum);
                // CakeResque::enqueue('default', 'GenericEmailShell', array('sendEmail', $datum));
                // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                //Notify Managers
                $managers = $this->User->find('all', array(
                    'contain' => array(),
                    'conditions' => array('group_id' => 2)
                ));
                foreach ($managers as $manager) {
                    $variables = array(
                        'name' => $user['User']['name'], 'username' => $user['User']['username'], 
                        'email' => $user['User']['email'], 
                        'reference_link' => $html->link('Activate', array('controller' => 'users', 'action' => 'activate_account', $id, $this->Auth->password($user['User']['email']), 'full_base' => true), 
                          array('escape' => false)),
                    );
                    $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $manager['User']['id'], 'user_id' => $manager['User']['id'], 'type' => 'manager_registration', 'model' => 'User',
                        'subject' => CakeText::insert($manager_nt['Message']['subject'], $variables),
                        'message' => CakeText::insert($manager_nt['Message']['content'], $variables)
                    );

                    $this->QueuedTask->createJob('GenericNotification', $datum);
                    // CakeResque::enqueue('default', 'GenericNotificationShell', array('sendNotification', $datum));
                }
                $this->set([
                    'status' => 'success',
                    'user' => $this->request->data,
                    '_serialize' => ['status', 'user']
                ]);
            } else {                
                $this->set([
                    'status' => 'failed',
                    'user' => $this->request->data,
                    'validation' => $this->Aefi->validationErrors,
                    '_serialize' => ['status', 'user', 'validation']
                ]);
            }
        }
        $counties = $this->User->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $designations = $this->User->Designation->find('list');
        $this->set(compact('designations'));
    }

    public function activate_account($id = null, $activation_key = null) {
        if($activation_key) {
            $user = $this->User->find('first', array('conditions' => array('User.id' => $id), 'contain' => array()));
            if($user) {
                $this->User->create();
                $data['User'] = array('id' => $user['User']['id'], 'is_active' => 1);
                if($this->User->save($data, true, array('id', 'is_active'))) {
                    $this->Session->setFlash(__('You have successfully activated your account. Please login to continue.'),
                        'alerts/flash_success');
                    $this->redirect(array('action' => 'login'));
                } else {
                    $this->Session->setFlash(__('Unable to activate account.'), 'alerts/flash_error');
                    $this->redirect('/');
                }
            } else {
                $this->Session->setFlash(__('Invalid activation token.'), 'alerts/flash_error');
                $this->redirect('/');
            }
        } else {
            $this->Session->setFlash(__('Invalid activation token.'), 'alerts/flash_error');
            $this->redirect('/');
        }
    }

    // Dashboard Methods
    public function reporter_dashboard() {
        $sadrs = $this->User->Sadr->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Sadr.id','Sadr.user_id', 'Sadr.created', 'Sadr.report_title', 'Sadr.submitted', 'Sadr.reference_no', 'Sadr.created', 'Sadr.serious'),
            'order' => array('Sadr.created' => 'desc'),
            'conditions' => array('Sadr.user_id' => $this->Auth->User('id')),
        ));
        $this->set('sadrs', $sadrs);        

        $aefis = $this->User->Aefi->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Aefi.id','Aefi.user_id', 'Aefi.created', 'Aefi.submitted', 'Aefi.reference_no', 'Aefi.created', 'Aefi.serious'),
            'contain' => array('AefiListOfVaccine'),
            'order' => array('Aefi.created' => 'desc'),
            'conditions' => array('Aefi.user_id' => $this->Auth->User('id')),
        ));
        $this->set('aefis', $aefis);        

        $pqmps = $this->User->Pqmp->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Pqmp.id','Pqmp.user_id', 'Pqmp.created', 'Pqmp.submitted', 'Pqmp.brand_name', 'Pqmp.reference_no', 'Pqmp.created', 'Pqmp.product_formulation', 'Pqmp.therapeutic_ineffectiveness', 'Pqmp.particulate_matter'),
            'order' => array('Pqmp.created' => 'desc'),
            'conditions' => array('Pqmp.user_id' => $this->Auth->User('id')),
        ));
        $this->set('pqmps', $pqmps);        

        $devices = $this->User->Device->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Device.id','Device.user_id', 'Device.created', 'Device.submitted', 'Device.report_title', 'Device.reference_no', 'Device.created', 'Device.serious'),
            'order' => array('Device.created' => 'desc'),
            'conditions' => array('Device.user_id' => $this->Auth->User('id')),
        ));
        $this->set('devices', $devices);        

        $medications = $this->User->Medication->find('all', array(
            'limit' => 7, 'contain' => array('MedicationProduct'),
            'fields' => array('Medication.id','Medication.user_id', 'Medication.submitted', 'Medication.created', 'Medication.reference_no', 'Medication.created'),
            'order' => array('Medication.created' => 'desc'),
            'conditions' => array('Medication.user_id' => $this->Auth->User('id')),
        ));
        $this->set('medications', $medications);        

        $transfusions = $this->User->Transfusion->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Transfusion.id','Transfusion.user_id', 'Transfusion.reference_no', 'Transfusion.diagnosis', 'Transfusion.submitted', 'Transfusion.created', 'Transfusion.created'),
            'order' => array('Transfusion.created' => 'desc'),
            'conditions' => array('Transfusion.user_id' => $this->Auth->User('id')),
        ));
        $this->set('transfusions', $transfusions);        

        $this->set('notifications', $this->User->Notification->find('all', array(
            'conditions' => array('Notification.user_id' => $this->Auth->User('id')), 'order' => 'Notification.created DESC', 'limit' => 12
            )));
        $this->set('messages', $this->Message->find('list', array('fields' => array('name', 'style'))));
        

    }

    public function manager_dashboard() {
        $sadrs = $this->User->Sadr->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Sadr.id','Sadr.user_id', 'Sadr.report_title', 'Sadr.submitted', 'Sadr.reference_no', 'Sadr.created', 'Sadr.serious'),
            'order' => array('Sadr.created' => 'desc'),
            'conditions' => array('Sadr.submitted >' => 1),
        ));
        $this->set('sadrs', $sadrs);

        $aefis = $this->User->Aefi->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Aefi.id','Aefi.user_id', 'Aefi.submitted', 'Aefi.reference_no', 'Aefi.created', 'Aefi.serious'),
            'contain' => array('AefiListOfVaccine'),
            'order' => array('Aefi.created' => 'desc'),
            'conditions' => array('Aefi.submitted >' => 1),
        ));
        $this->set('aefis', $aefis);        

        $pqmps = $this->User->Pqmp->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Pqmp.id','Pqmp.user_id', 'Pqmp.submitted', 'Pqmp.brand_name', 'Pqmp.reference_no', 'Pqmp.created', 'Pqmp.product_formulation', 'Pqmp.therapeutic_ineffectiveness', 'Pqmp.particulate_matter'),
            'order' => array('Pqmp.created' => 'desc'),
            'conditions' => array('Pqmp.submitted >' => 1),
        ));
        $this->set('pqmps', $pqmps);        

        $devices = $this->User->Device->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Device.id','Device.user_id', 'Device.submitted', 'Device.report_title', 'Device.reference_no', 'Device.created', 'Device.serious'),
            'order' => array('Device.created' => 'desc'),
            'conditions' => array('Device.submitted >' => 1),
        ));
        $this->set('devices', $devices);        

        $medications = $this->User->Medication->find('all', array(
            'limit' => 7, 'contain' => array('MedicationProduct'),
            'fields' => array('Medication.id','Medication.user_id', 'Medication.submitted', 'Medication.reference_no', 'Medication.created'),
            'order' => array('Medication.created' => 'desc'),
            'conditions' => array('Medication.submitted >' => 1),
        ));
        $this->set('medications', $medications);        

        $transfusions = $this->User->Transfusion->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Transfusion.id','Transfusion.user_id', 'Transfusion.reference_no', 'Transfusion.diagnosis', 'Transfusion.submitted', 'Transfusion.created', 'Transfusion.created'),
            'order' => array('Transfusion.created' => 'desc'),
            'conditions' => array('Transfusion.submitted >' => 1),
        ));
        $this->set('transfusions', $transfusions);

        $padrs = $this->User->Padr->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Padr.id', 'Padr.reporter_name', 'Padr.patient_name', 'Padr.reference_no', 'Padr.created'),
            'order' => array('Padr.created' => 'desc'),
        ));
        $this->set('padrs', $padrs);

        $saes = $this->User->Sae->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Sae.id', 'Sae.form_type', 'Sae.reference_no', 'Sae.created'),
            'order' => array('Sae.created' => 'desc'),
        ));
        $this->set('saes', $saes);

        $this->set('notifications', $this->User->Notification->find('all', array(
            'conditions' => array('Notification.user_id' => $this->Auth->User('id')), 'order' => 'Notification.created DESC', 'limit' => 12
            )));
        $this->set('messages', $this->Message->find('list', array('fields' => array('name', 'style'))));
    }

    public function partner_dashboard() {
        $sadrs = $this->User->Sadr->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Sadr.id','Sadr.user_id', 'Sadr.created', 'Sadr.report_title', 'Sadr.submitted', 'Sadr.reference_no', 'Sadr.created', 'Sadr.serious'),
            'order' => array('Sadr.created' => 'desc'),
            'conditions' => array('Sadr.name_of_institution' => $this->Auth->User('name_of_institution')),
        ));
        $this->set('sadrs', $sadrs);        

        $aefis = $this->User->Aefi->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Aefi.id','Aefi.user_id', 'Aefi.created', 'Aefi.submitted', 'Aefi.reference_no', 'Aefi.created', 'Aefi.serious'),
            'contain' => array('AefiListOfVaccine'),
            'order' => array('Aefi.created' => 'desc'),
            'conditions' => array('Aefi.name_of_institution' => $this->Auth->User('name_of_institution')),
        ));
        $this->set('aefis', $aefis);        

        $pqmps = $this->User->Pqmp->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Pqmp.id','Pqmp.user_id', 'Pqmp.created', 'Pqmp.submitted', 'Pqmp.brand_name', 'Pqmp.reference_no', 'Pqmp.created', 'Pqmp.product_formulation', 'Pqmp.therapeutic_ineffectiveness', 'Pqmp.particulate_matter'),
            'order' => array('Pqmp.created' => 'desc'),
            'conditions' => array('Pqmp.facility_name' => $this->Auth->User('name_of_institution')),
        ));
        $this->set('pqmps', $pqmps);        

        $devices = $this->User->Device->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Device.id','Device.user_id', 'Device.created', 'Device.submitted', 'Device.report_title', 'Device.reference_no', 'Device.created', 'Device.serious'),
            'order' => array('Device.created' => 'desc'),
            'conditions' => array('Device.name_of_institution' => $this->Auth->User('name_of_institution')),
        ));
        $this->set('devices', $devices);        

        $medications = $this->User->Medication->find('all', array(
            'limit' => 7, 'contain' => array('MedicationProduct'),
            'fields' => array('Medication.id','Medication.user_id', 'Medication.submitted', 'Medication.created', 'Medication.reference_no', 'Medication.created'),
            'order' => array('Medication.created' => 'desc'),
            'conditions' => array('Medication.name_of_institution' => $this->Auth->User('name_of_institution')),
        ));
        $this->set('medications', $medications);        

        $transfusions = $this->User->Transfusion->find('all', array(
            'limit' => 7, 'contain' => array(),
            'fields' => array('Transfusion.id','Transfusion.user_id', 'Transfusion.reference_no', 'Transfusion.diagnosis', 'Transfusion.submitted', 'Transfusion.created', 'Transfusion.created'),
            'order' => array('Transfusion.created' => 'desc'),
            'conditions' => array('Transfusion.user_id' => $this->Auth->User('id')),
        ));
        $this->set('transfusions', $transfusions);        

        $this->set('notifications', $this->User->Notification->find('all', array(
            'conditions' => array('Notification.user_id' => $this->Auth->User('id')), 'order' => 'Notification.created DESC', 'limit' => 12
            )));
        $this->set('messages', $this->Message->find('list', array('fields' => array('name', 'style'))));
    }

    public function admin_dashboard() {
        $this->request->data['Feedback']['user_id'] = $this->Auth->User('id');
        $this->User->Feedback->recursive = -1;
        $this->set('previous_messages' , $this->User->Feedback->find('all', array('limit' => 3, 'order' => array('id' => 'desc'))));
    }
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('The user does not exist.'), 'flash_info');
            $this->redirect('/', null, false);
        }
        if ($this->Auth->User('id') != $id) {
            $this->Session->setFlash(__('You do not have permission to edit this user!'), 'flash_info');
            $this->redirect('/', null, false);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            // $this->request->data['User']['group_id'] = 2;
            unset($this->User->validate['username']);
            unset($this->User->validate['password']);
            unset($this->User->validate['confirm_password']);
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your details have been updated'), 'flash_success');
                $this->redirect(array('action' => 'changePassword', $this->id));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $designations = $this->User->Designation->find('list');
        $this->set(compact('designations'));
        $counties = $this->User->County->find('list');
        $this->set(compact('counties'));
    }

    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('The user '.$id.' does not exist.'), 'flash_error');
            $this->redirect('/', null, false);
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            // unset($this->User->validate['username']);
            // unset($this->User->validate['password']);
            // unset($this->User->validate['confirm_password']);
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your details have been updated'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_error');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
            unset($this->request->data['User']['confirm_password']);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
        $designations = $this->User->Designation->find('list');
        $this->set(compact('designations'));
        $counties = $this->User->County->find('list');
        $this->set(compact('counties'));
    }

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**/public function initDB() {
        $group = $this->User->Group;
        //Allow admins to everything
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        //Allow managers to some
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Users/manager_dashboard'); 
        $this->Acl->allow($group, 'controllers/Sadrs');
        $this->Acl->allow($group, 'controllers/Aefis');
        $this->Acl->allow($group, 'controllers/SadrFollowups');
        $this->Acl->allow($group, 'controllers/Pqmps');
        $this->Acl->allow($group, 'controllers/Devices');
        $this->Acl->allow($group, 'controllers/Medications');
        $this->Acl->allow($group, 'controllers/Transfusions');
        $this->Acl->allow($group, 'controllers/Padrs');
        $this->Acl->allow($group, 'controllers/Saes');
        $this->Acl->allow($group, 'controllers/Attachments');
        $this->Acl->allow($group, 'controllers/Counties');
        $this->Acl->allow($group, 'controllers/Countries');
        $this->Acl->allow($group, 'controllers/Designations');
        $this->Acl->allow($group, 'controllers/Doses');
        $this->Acl->allow($group, 'controllers/DrugDictionaries');
        $this->Acl->allow($group, 'controllers/FacilityCodes');
        $this->Acl->allow($group, 'controllers/Feedbacks');
        $this->Acl->allow($group, 'controllers/Frequencies');
        $this->Acl->allow($group, 'controllers/HelpInfos');
        $this->Acl->allow($group, 'controllers/Messages');
        $this->Acl->allow($group, 'controllers/Routes');
        $this->Acl->allow($group, 'controllers/SadrListOfDrugs');
        $this->Acl->allow($group, 'controllers/SadrListOfMedicines');
        $this->Acl->allow($group, 'controllers/AefiListOfVaccines');
        $this->Acl->allow($group, 'controllers/ListOfDevices');
        $this->Acl->allow($group, 'controllers/MedicationProducts');
        $this->Acl->allow($group, 'controllers/Pints');
        $this->Acl->allow($group, 'controllers/WhoDrugs');
        $this->Acl->allow($group, 'controllers/Pages');
        $this->Acl->allow($group, 'controllers/Users/changePassword');
        $this->Acl->allow($group, 'controllers/Users/edit');
        $this->Acl->allow($group, 'controllers/Users/admin_index');
        $this->Acl->allow($group, 'controllers/Users/admin_add');
        $this->Acl->allow($group, 'controllers/Notifications');
        $this->Acl->allow($group, 'controllers/Comments');
        $this->Acl->allow($group, 'controllers/Reports');

        //Allow reporters to some
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Users/reporter_dashboard'); 
        $this->Acl->allow($group, 'controllers/Users/edit');
        $this->Acl->allow($group, 'controllers/Sadrs/sadrIndex');
        $this->Acl->allow($group, 'controllers/Sadrs/reporter_index');
        $this->Acl->allow($group, 'controllers/Sadrs/reporter_add');
        $this->Acl->allow($group, 'controllers/Sadrs/reporter_followup');
        $this->Acl->allow($group, 'controllers/Sadrs/reporter_edit');
        $this->Acl->allow($group, 'controllers/Sadrs/reporter_view');
        $this->Acl->allow($group, 'controllers/Sadrs/institutionCodes');
        $this->Acl->allow($group, 'controllers/Aefis/aefiIndex');
        $this->Acl->allow($group, 'controllers/Aefis/institutionCodes');
        $this->Acl->allow($group, 'controllers/Aefis/reporter_index');
        $this->Acl->allow($group, 'controllers/Aefis/reporter_add');
        $this->Acl->allow($group, 'controllers/Aefis/reporter_followup');
        $this->Acl->allow($group, 'controllers/Aefis/reporter_edit');
        $this->Acl->allow($group, 'controllers/Aefis/reporter_view');
        $this->Acl->allow($group, 'controllers/Pqmps/reporter_index');
        $this->Acl->allow($group, 'controllers/Pqmps/reporter_add');
        $this->Acl->allow($group, 'controllers/Pqmps/reporter_edit');
        $this->Acl->allow($group, 'controllers/Pqmps/reporter_view');
        $this->Acl->allow($group, 'controllers/Devices/reporter_index');
        $this->Acl->allow($group, 'controllers/Devices/reporter_add');
        $this->Acl->allow($group, 'controllers/Devices/reporter_followup');
        $this->Acl->allow($group, 'controllers/Devices/reporter_edit');
        $this->Acl->allow($group, 'controllers/Devices/reporter_view');
        $this->Acl->allow($group, 'controllers/Medications/reporter_index');
        $this->Acl->allow($group, 'controllers/Medications/reporter_add');
        $this->Acl->allow($group, 'controllers/Medications/reporter_followup');
        $this->Acl->allow($group, 'controllers/Medications/reporter_edit');
        $this->Acl->allow($group, 'controllers/Medications/reporter_view');
        $this->Acl->allow($group, 'controllers/Transfusions/reporter_index');
        $this->Acl->allow($group, 'controllers/Transfusions/reporter_add');
        $this->Acl->allow($group, 'controllers/Transfusions/reporter_followup');
        $this->Acl->allow($group, 'controllers/Transfusions/reporter_edit');
        $this->Acl->allow($group, 'controllers/Transfusions/reporter_view');
        $this->Acl->allow($group, 'controllers/SadrFollowups/sadrIndex');
        $this->Acl->allow($group, 'controllers/SadrFollowups/followupIndex');
        $this->Acl->allow($group, 'controllers/Pqmps/pqmpIndex');
        $this->Acl->allow($group, 'controllers/Users/changePassword');
        $this->Acl->allow($group, 'controllers/Notifications/reporter_index');
        $this->Acl->allow($group, 'controllers/Notifications/delete');
        $this->Acl->allow($group, 'controllers/SadrListOfDrugs/delete');
        $this->Acl->allow($group, 'controllers/SadrListOfMedicines/delete');
        $this->Acl->allow($group, 'controllers/AefiListOfVaccines/delete');
        $this->Acl->allow($group, 'controllers/ListOfDevices/delete');
        $this->Acl->allow($group, 'controllers/MedicationProducts/delete');
        $this->Acl->allow($group, 'controllers/Pints/delete');
        $this->Acl->allow($group, 'controllers/Comments');
        $this->Acl->allow($group, 'controllers/Reports');

        //Allow institution administrators to some
        $group->id = 4;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Users/partner_dashboard'); 
        $this->Acl->allow($group, 'controllers/Sadrs/sadrIndex');
        $this->Acl->allow($group, 'controllers/Sadrs/institutionCodes');
        $this->Acl->allow($group, 'controllers/Sadrs/partner_index');
        $this->Acl->allow($group, 'controllers/Sadrs/partner_view');
        $this->Acl->allow($group, 'controllers/Sadrs/institutionCodes');
        $this->Acl->allow($group, 'controllers/Aefis/aefiIndex');
        $this->Acl->allow($group, 'controllers/Aefis/institutionCodes');
        $this->Acl->allow($group, 'controllers/Aefis/partner_index');
        $this->Acl->allow($group, 'controllers/Aefis/partner_view');
        $this->Acl->allow($group, 'controllers/SadrFollowups/sadrIndex');
        $this->Acl->allow($group, 'controllers/SadrFollowups/followupIndex');
        $this->Acl->allow($group, 'controllers/Pqmps/pqmpIndex');
        $this->Acl->allow($group, 'controllers/Pqmps/partner_index');
        $this->Acl->allow($group, 'controllers/Pqmps/partner_view');
        $this->Acl->allow($group, 'controllers/Devices/partner_index');
        $this->Acl->allow($group, 'controllers/Devices/partner_view');
        $this->Acl->allow($group, 'controllers/Medications/partner_index');
        $this->Acl->allow($group, 'controllers/Medications/partner_view');
        $this->Acl->allow($group, 'controllers/Transfusions/partner_index');
        $this->Acl->allow($group, 'controllers/Transfusions/partner_view');
        $this->Acl->allow($group, 'controllers/Users/changePassword');
        $this->Acl->allow($group, 'controllers/Users/edit');
        $this->Acl->allow($group, 'controllers/Users/partner_index');
        $this->Acl->allow($group, 'controllers/Notifications/partner_index');
        $this->Acl->allow($group, 'controllers/Notifications/delete');
        $this->Acl->allow($group, 'controllers/Comments');
        $this->Acl->allow($group, 'controllers/Reports');

        echo "all done";
        exit;
    }
}
