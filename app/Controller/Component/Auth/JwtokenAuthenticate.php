<?php
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

require_once(ROOT . DS . 'app' . DS .'Vendor' . DS  . 'firebase' . DS . 'php-jwt' . DS. 'src' . DS . 'JWT.php');
use Firebase\JWT\JWT;

class JwtokenAuthenticate extends BaseAuthenticate {
    public function authenticate(CakeRequest $request, CakeResponse $response) {
        // Do things for OpenID here.
        // Return an array of user if they could authenticate the user,
        // return false if not
        $user = array('User');
        //return $user;
        return $this->_findUser($request->data['User']['username'], $request->data['User']['password']);
        // return false;
    }

    public function getUser(CakeRequest $request) {
	    // return $this->_findUser('edward', 'adminppb.');
	    // return $this->_findUser($request->data['User']['username'], $request->data['User']['password']);
	    try {
	    	$header = $request->header('authorization');;
	        if ($header && stripos($header, 'bearer') === 0) {
		        $token = str_ireplace('bearer' . ' ', '', $header);
		        
	            $payload = JWT::decode(
	                $token,
	                Configure::read('Security.salt'), 
                    array_keys(JWT::$supported_algs)
	            );

	            $result = ClassRegistry::init('User')->find('first', array(
					'conditions' => array('User.id' => $payload),
					'recursive' => -1,
					'contain' => null,
				));

	            return $result;
            } else {
            	return false;
            }
        } catch (Exception $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            $this->_error = $e;
        }
	}
}

?>
