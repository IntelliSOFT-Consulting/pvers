<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package     app.Controller
 * @link        https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Acl',
        // 'Auth' => array(
        //     'authorize' => array(
        //         'Actions' => array('actionPath' => 'controllers')
        //     )
        // ),
        // 'Auth' => array('Jwtoken'),
        // 'Auth',
        'RequestHandler' => array('viewClassMap' => array('csv' => 'CsvView.Csv')), 
        'Session',
        'Flash',
        'DebugKit.Toolbar'
    );

    public $helpers = array('Html', 'Form', 'Session');

    public function isAuthorized($user = null) {
        // Any registered user can access public functions
        if (!empty($user)) {
            return (bool) ($user['group_id'] == '3');
        }
        // return true;
        return false;        
    }
    public function beforeFilter() {
        $redir = 'default';
        if (isset($this->request->prefix) && $this->request->prefix == 'api') {
            // $this->Auth->authenticate['JwtAuth.JwtToken'] = array(
            //     'fields' => array(
            //         'username' => 'username',
            //         'password' => 'password',
            //         'token' => 'public_key',
            //     ),
            //     'parameter' => '_token',
            //     'userModel' => 'User',
            //     // 'scope' => array('User.is_active' => 1),
            //     'pepper' => Configure::read('API.token.pepper'),
            // );
            $this->Auth = $this->Components->load('Auth');
            $this->Auth->authenticate = array('Jwtoken');
            $this->Auth->authorize = array('Controller');
            // $this->Auth->sessionKey = false;
            AuthComponent::$sessionKey = false;
            $this->Auth->initialize($this);
            $this->Auth->authError = 'Not allowed!!';
            /*$this->Auth = $this->Components->load(
                'Auth',
                array('authenticate' => 'Jwtoken', 'authorize' => array('Controller'))
            );*/
            // $this->Auth->authenticate = array(
            //     'Form' => array('userModel' => 'Member')
            // );
            
            $this->set('redir', 'api');
            $this->set('root', '/');
        } else {
            $this->Auth = $this->Components->load('Auth');
            $this->Auth->authorize = array(
                'Actions' => array('actionPath' => 'controllers')
            );
            $this->Auth->initialize($this);
            $this->Auth->allow('display');
            //Configure AuthComponent
            // $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
            // $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
            // $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'home', 'admin' => false);
            // $this->Auth->authenticate = array(
            //     'all' => array (
            //         'scope' => array('User.is_active' => 1)   
            //     ),  
            //     'Form' 
            // );
            
            $this->Auth->authError = __('<div class="alert alert-error">
                                            <button data-dismiss="alert" class="close">&times;</button>
                                            <h4><strong>Sorry!</strong> You don\'t have sufficient permissions to access the location.</h4>
                                         </div>', true);
            // $this->Auth->loginError = __('Invalid e-mail / password combination.  Please try again', true);
            $this->Auth->loginError = __('<div class="alert alert-error">
                                            <button data-dismiss="alert" class="close">&times;</button>
                                            <h4>Invalid e-mail / password combination.  Please try again.</h4>
                                         </div>', true);
            
            if($this->Auth->User('group_id') == '1')  $redir = 'admin';
            if($this->Auth->User('group_id') == '2')  $redir = 'manager';
            if($this->Auth->User('group_id') == '3')  $redir = 'reporter';
            if($this->Auth->User('group_id') == '4')  $redir = 'partner';

              $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
              $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => false);
              $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard', $redir => true);

            $this->Auth->authError = __('<div class="alert alert-error">
                          <button data-dismiss="alert" class="close">&times;</button>
                          <h4><strong>Sorry!</strong> You don\'t have sufficient permissions to access the location.</h4>
                         </div>', true);
            $this->Auth->loginError = __('<div class="alert alert-error">
                          <button data-dismiss="alert" class="close">&times;</button>
                          <h4>Invalid e-mail / password combination.  Please try again.</h4>
                         </div>', true);
            $this->set('redir', $redir);
            $this->set('root', '/');
        }
    }



    protected function _attachments($model = null){
        if (!empty($this->request->data['Attachment'])) {
            for ($i = 0; $i <= count($this->request->data['Attachment'])-1; $i++) { 
                $this->request->data['Attachment'][$i]['model'] = $model;

                $file = explode(',', $this->request->data['Attachment'][$i]['file']);
                //data:image/jpeg;base64
                $mystring = $file[0];
                $end = strpos($mystring, ';');
                $start2 = strpos($mystring, '/');
                $start3 = strpos($mystring, ':');
                $fileExt = substr($mystring, $start2+1, $end - $start2-1); //jpeg
                $fileType = substr($mystring, $start3+1, $end - $start3-1); //image/jpeg

                //decode it
                $data = base64_decode($file[1]);

                $filename =  (isset($this->request->data['Attachment'][$i]['filename'])) ? uniqid().'-'. $this->request->data['Attachment'][$i]['filename'] :  uniqid().'.' . $fileExt;
                $file_dir = WWW_ROOT . 'files' .DS. 'Attachments' .DS. 'file' .DS. $filename;
                // $file_dir = MEDIA_TRANSFER .DS. $filename;
                //file create
                file_put_contents($file_dir, $data);
                chmod($file_dir, 0777);

                //not necessarily. I write it for use delete function this plugin
                $filesize = filesize($file_dir);

                //after base64 decode ,file delete
                $this->request->data['Attachment'][$i]['file'] = null;

                $this->request->data['Attachment'][$i]['file']['name'] = $filename;
                $this->request->data['Attachment'][$i]['file']['type'] = $fileType;
                $this->request->data['Attachment'][$i]['file']['tmp_name'] = $file_dir;
                $this->request->data['Attachment'][$i]['file']['error'] = 0;
                $this->request->data['Attachment'][$i]['file']['size'] = $filesize;
                $this->request->data['Attachment'][$i]['group'] = 'attachment';
           }
        }        
    }

}
