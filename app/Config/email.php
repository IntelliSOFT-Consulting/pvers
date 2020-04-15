<?php
/**
 * This is email configuration file.
 *
 * Use it to configure email transports of Cake.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * In this file you set up your send email details.
 *
 * @package       cake.config
 */
/**
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *		Mail 		- Send using PHP mail function
 *		Smtp		- Send using SMTP
 *		Debug		- Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email.  Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
'host' => 'localhost',
                'from' => array('pv@pharmacyboardkenya.org' => 'The Pharmacy and Poisons Board'),
        'port' => 587,
                'timeout' => 30,
        'username' => 'drugreg.ppb@gmail.com',
        //'password' => 'Pass@2word',
       // 'transport' => 'Smtp',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
	
    public $gmail = array(
	    'host' => 'ssl://smtp.gmail.com',
		'from' => array('regulatory@pharmacyboardkenya.org' => 'The Pharmacy and Poisons Board'),
        'port' => 465,
		'timeout' => 30,
        'username' => 'regulatory@pharmacyboardkenya.org',
        'password' => 'qhYjEMKkv=v35c?*',
        'transport' => 'Smtp'
    );

	public $gmail_old = array(
//        'host' => '41.139.244.106',
//          'host' => 'smtp.safaricombusiness.co.ke',
           'transport' => 'Mail',
           'host' => 'localhost',
		'from' => array('pv@pharmacyboardkenya.org' => 'The Pharmacy and Poisons Board'),
        'port' => 25,
		'timeout' => 30,
        'username' => 'drugreg.ppb@gmail.com',
        //'password' => 'Pass@2word',
//        'transport' => 'Smtp'
    );
	
	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('pv@pharmacyboardkenya.org' => 'My Site'),
		'host' => 'localhost',
		'port' => 587,
		'timeout' => 30,
		'username' => 'drugreg.ppb@gmail.com',
		'password' => 'mikalwetu',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

}
