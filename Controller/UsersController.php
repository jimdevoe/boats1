<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$this->set('header','users - index');
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('header','user - view');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('header','user - add');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('header','user - edit');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->set('header','user - delete');
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


 public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
    //    $this->Auth->allow(['add', 'logout']);
//		$this->Auth->logoutRedirect = getenv('HTTP_REFERER');
    }
	
public function loggedin()
{
//echo(session_save_path()); 
//echo(session_name());
//die();
//var_dump($this->request->session()->id());
//var_dump($_SESSION); die();

		$this->autoRender = false;
		if($this->Auth->user()){
			$loggedIn = $this->Auth->user('username');
		} else {
			$loggedIn = '';
		}
	echo $loggedIn;
}

public function login()
    {
//		$this->autoRender = false;
		if ($this->request->is('get')){
			$this->request->session()->write('referer',getenv('HTTP_REFERER'));
		}
		if ($this->request->is('post')){
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);		
				$this->Cookie->configKey('userloggedin', [
	//				'path' => '/',
					'encryption' => false
				]);		
				$this->Cookie->write('userloggedin', true);

				$this->Cookie->configKey('username', [
	//				'path' => '/',
					'encryption' => false
				]);		
				$this->Cookie->write('username', $user['username']);
				$referer = $this->request->session()->read('referer');
//				$referer = '/boats/pnp05';
				return $this->redirect($referer);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
	}

public function login2()
    {
		$this->autoRender = false;

		if ($this->request->is('post')){
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);		
				$this->Cookie->configKey('userloggedin', [
	//				'path' => '/',
					'encryption' => false
				]);		
				$this->Cookie->write('userloggedin', true);

				$this->Cookie->configKey('username', [
	//				'path' => '/',
					'encryption' => false
				]);		
				$this->Cookie->write('username', $user['username']);
//				$referer = $this->request->session()->read('referer');
				$referer = '/boats/pnp07';
				return $this->redirect($referer);
            }
			else {
				return $this->redirect($referer);

            }
//			$this->Flash->error(__('Invalid username or password, try again'));
        }
	}

public function logout()
    {
		$this->Auth->logout();

		$this->Cookie->configKey('userloggedin', [
//			'path' => '/',
			'encryption' => false
		]);		
		$this->Cookie->write('userloggedin', false);

		$this->Cookie->configKey('username', [
//			'path' => '/',
			'encryption' => false
		]);		
		$this->Cookie->write('username', '');

		
 	return $this->redirect(getenv('HTTP_REFERER'));
	}

}