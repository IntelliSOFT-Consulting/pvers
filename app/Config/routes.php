<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::parseExtensions('json', 'pdf', 'xml', 'xlsx', 'csv');
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	//REPORTER ROUTING: DASHBOARD PAGE
	Router::connect('/reporter', array('controller' => 'users', 'action' => 'dashboard', 'reporter' => true));	
	//PARTNER ROUTING: DASHBOARD PAGE
	Router::connect('/partner', array('controller' => 'users', 'action' => 'dashboard', 'partner' => true));	
	//MANAGER ROUTING: DASHBOARD PAGE
	Router::connect('/manager', array('controller' => 'users', 'action' => 'dashboard', 'manager' => true));		
	//ADMIN ROUTING: DASHBOARD PAGE
	Router::connect('/admin', array('controller' => 'users', 'action' => 'dashboard', 'admin' => true));	
	//API ROUTING: DASHBOARD PAGE
	Router::connect('/api', array('controller' => 'users', 'action' => 'dashboard', 'api' => true));	

	// Add the mini manager role
	Router::connect('/reviewer', array('controller' => 'users', 'action' => 'dashboard', 'reviewer' => true));	

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
