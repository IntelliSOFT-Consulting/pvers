<?php
/**
 * JwtAuthenticateTest file
 *
 * PHP 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2015 Ronald Chaplin <rchaplin@t73.biz>
 * @link          https://github.com/t73biz/cakephp2-jwt-auth CakePHP 2 Jwt Authentication
 * @package       JwtAuth.Test.Case.Controller.Component.Auth
 * @since         JwtAuth v 1.0.5
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AuthComponent', 'Controller/Component');
App::uses('JwtTokenAuthenticate', 'JwtAuth.Controller/Component/Auth');
App::uses('AppModel', 'Model');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');
App::uses('Controller', 'Controller');


// A Mock Controller
class JwtControllerTest extends Controller
{
    public $name = "JwtControllerTest";
}
/**
 * Test case for JwtAuthentication
 *
 * @package       JwtAuth.Test.Case.Controller.Component.Auth
 */
class JwtTokenAuthenticateTest extends CakeTestCase
{
    public $fixtures = array('plugin.JwtAuth.user');

    /**
     * @var JwtTokenAuthenticate
     */
    public $auth;

    /**
     * @var Controller
     */
    public $Controller;

    /**
     * @var JWT
     */
    public $Jwt;

    /**
     * @var CakeResponse
     */
    public $response;
    /**
     * setup
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $Collection = new ComponentCollection();
        $this->auth = new JwtTokenAuthenticate($Collection, array(
            'fields' => array(
                'username' => 'name',
                'token' => 'token',
            ),
            'parameter' => '_token',
            'header' => 'X_JSON_WEB_TOKEN',
            'userModel' => 'User',
            'scope' => array(),
            'recursive' => 0,
            'contain' => null,
            'pepper' => '123'
        ));
        $password = Security::hash('12345', null, true);
        $User = ClassRegistry::init('User');
        $User->updateAll(array('password' => $User->getDataSource()->value($password)));
        $this->response = $this->getMock('CakeResponse');
        $this->Jwt = new JWT();
    }

    /**
     * test authenticate token as query parameter
     *
     * @return void
     */
    public function testAuthenticateTokenParameter() {
        $this->auth->settings['_parameter'] = 'token';

        $jwt = $this->_setToken('54321');
        $request = new CakeRequest('posts/index?_token=' . $jwt);

        $result = $this->auth->getUser($request, $this->response);

        $this->assertFalse($result);

        $expected = array(
            'id' => '1',
            'name' => 'mariano',
            'password' => '25f0fa3203ca2ce6e54894b792f904c423601537',
            'token' => '12345',
            'email' => 'mariano@example.com',
            'created' => '2007-03-17 01:16:23',
            'updated' => '2007-03-17 01:18:31'
        );
        $jwt = $this->_setToken('12345');
        $request = new CakeRequest('posts/index?_token=' . $jwt);
        $result = $this->auth->getUser($request, $this->response);
        $this->assertEquals($expected, $result);
    }

    /**
     * test authenticate token as request header
     *
     * @return void
     */
    public function testAuthenticateTokenHeader() {
        $_SERVER['HTTP_X_JSON_WEB_TOKEN'] = $this->_setToken('54321');
        $request = new CakeRequest('posts/index', false);

        $result = $this->auth->getUser($request, $this->response);
        $this->assertFalse($result);

        $expected = array(
            'id' => '1',
            'name' => 'mariano',
            'password' => '25f0fa3203ca2ce6e54894b792f904c423601537',
            'token' => '12345',
            'email' => 'mariano@example.com',
            'created' => '2007-03-17 01:16:23',
            'updated' => '2007-03-17 01:18:31'
        );
        $_SERVER['HTTP_X_JSON_WEB_TOKEN'] = $this->_setToken('12345');
        $result = $this->auth->getUser($request, $this->response);
        $this->assertEquals($expected, $result);
    }

    /**
     * @param string $userToken
     * @return string
     */
    private function _setToken($userToken)
    {
        $key = $this->auth->settings['pepper'];
        $token = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "user" => array(
                'name' => 'mariano',
                'token' => $userToken
            )
        );

        return $this->Jwt->encode($token, $key);
    }
}
