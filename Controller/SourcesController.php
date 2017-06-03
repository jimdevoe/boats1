<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sources Controller
 *
 * @property \App\Model\Table\SourcesTable $Sources
 */
class SourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$type = $this->request->session()->read('type');
		$search = $this->request->query('search');
		$this->set('header','sources - index');
		$this->paginate = [
		'order' => [
            'Sources.created' => 'desc'
        ]
		];
		
        $sources = $this->paginate($this->Sources->find()
			->where([
				'type' => $type,
			    'OR' =>[
					['state LIKE' 		=> 	'%'.$search.'%'],
					['name LIKE' 		=> 	'%'.$search.'%'],
					['description LIKE' => 	'%'.$search.'%'],
					['URL LIKE' 		=>	'%'.$search.'%']
				]
			])
		);

        $this->set(compact('sources'));
        $this->set('_serialize', ['sources']);
    }

    /**
     * View method
     *
     * @param string|null $id Source id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('header','sources - view');
        $source = $this->Sources->get($id, [
            'contain' => ['Boats']
        ]);

        $this->set('source', $source);
        $this->set('_serialize', ['source']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$type = $this->request->session()->read('type');
		$this->set('type',$type);
		$this->set('header','sources - add');
        $source = $this->Sources->newEntity();
        if ($this->request->is('post')) {
            $source = $this->Sources->patchEntity($source, $this->request->data);
            if ($this->Sources->save($source)) {
                $this->Flash->success(__('The source has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The source could not be saved. Please, try again.'));
            }
        }
        $boats = $this->Sources->Boats->find('list', ['limit' => 200]);
        $this->set(compact('source', 'boats'));
        $this->set('_serialize', ['source']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Source id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('header','sources - edit');
        $source = $this->Sources->get($id, [
            'contain' => ['Boats']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $source = $this->Sources->patchEntity($source, $this->request->data);
            if ($this->Sources->save($source)) {
                $this->Flash->success(__('The source has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The source could not be saved. Please, try again.'));
            }
        }
        $boats = $this->Sources->Boats->find('list', ['limit' => 200]);
        $this->set(compact('source', 'boats'));
        $this->set('_serialize', ['source']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Source id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->set('header','sources - delete');
        $this->request->allowMethod(['post', 'delete']);
        $source = $this->Sources->get($id);
        if ($this->Sources->delete($source)) {
            $this->Flash->success(__('The source has been deleted.'));
        } else {
            $this->Flash->error(__('The source could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
