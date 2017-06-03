<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
//use Cake\Error\Debugger;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
		$this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('Cookie', ['expiry' => '1 day']);
		$this->Cookie->configKey('userid', 'encryption', false);			
		$this->Cookie->configKey('loggedIn', 'encryption', false);			
        $this->loadComponent('Auth' , [
            'loginRedirect' => [
               'controller' => 'Boats',
               'action' => 'index'],
			   'logoutRedirect' => [
			   'controller' => 'Boats',
			   'action' => 'index'
			   ]
       ]);
		$this->set('user', $this->Auth->user('username'));
	}
    public function beforeFilter(Event $event)
    {	
		//App::uses('Boats','boats1');

		$this->Auth->allow(['index', 'index2', 'index3', 'pnp05','pnp06','pnp07','view', 'display', 'json','login', 'login2', 'loggedin', 'logout', 'add', 'addlatlon']);
 
//	      $this->Auth->allow(['index2', 'json', 'login', 'login2', 'loginCheck']);
	}    
	/**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */

	 public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
	}

}
