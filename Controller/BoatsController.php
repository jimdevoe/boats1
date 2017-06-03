<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Boats Controller
 *
 * @property \App\Model\Table\BoatsTable $Boats
 */
class BoatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	public function json()
    {
// the query looks within a bounding box ("ne" x "sw"), returns any points that fall within there sorted by distance (jd_distance)
// the distance is calculated in reference to a "ctr" point which is also passed in.  
// it also limits the total returned to $count - so if zoomed way out but only requesting 10 points you'll get a cluster in the center only
		$swlat = $this->request->query('swlat');
		$nelat = $this->request->query('nelat');
		$swlon = $this->request->query('swlon');
		$nelon = $this->request->query('nelon');
		$ctrlat = $this->request->query('ctrlat');
		$ctrlon = $this->request->query('ctrlon');
		$count  = $this->request->query('count');
		$type = $this->request->query('type');
		$distance = 50;
		
		$query = $this->Boats
// this i sconfigured to NOT select specific fields, so whatever is in the table is what will go back to client in JSON format
			->find()->contain(['Sources'])
			//->select(['id', 'name', 'lat','lon', 'state'])
// this is the bounding box
			->where    (['lat >'  =>  $swlat ])
			->andWhere (['lat <'  =>  $nelat ])
			->andWhere (['lon >'  =>  $swlon ])
			->andWhere (['lon <'  =>  $nelon ])
			->andWhere (['type =' =>  $type ])
			
// the is the distance from center sort line
// jd_distance is a user-defined function that MUST RESIDE  on the MySQL server being used
// It determines the distance between two pairs use trigonemtric functions
//			->order	(['jd_distance(lat,lon,'.$ctrlat.','.$ctrlon.')' => 'ASC'])
			->order (['(((acos(sin(('.$ctrlat.'*pi()/180)) * sin((lat*pi()/180)) + cos(('.$ctrlat.'*pi()/180)) * cos((lat*pi()/180)) * cos((('.$ctrlon.' - lon)*pi()/180))))*180/pi())*60*1.1515) ASC'])

// this is the $count limiter 
			->limit ($count)
		;
	
		$this->set([
			'boats' => $query, 
			'_serialize' => 'boats']
		);

		$this->RequestHandler->renderAs($this, 'json');
        
	}
	public function addlatlon()
    {
	if($_SESSION['Auth']){
		$this->log('appears logged in, going to insert new point into database', 'debug');
		$lat = $this->request->query('lat');
		$lon = $this->request->query('lon');
		$name = $this->request->query('name'); 
		$type = $this->request->query('type');
		$query = $this->Boats->query();
		$nowtime = date('Y-m-d H:i:s'); 
		$query->insert(['name', 'lat', 'lon', 'type', 'created', 'revised'])
			->values([
			'name' => $name,
			'lat' => $lat,
			'lon' => $lon,
			'type' => $type,
			'created' => $nowtime,
			'revised' => $nowtime
		])->execute();
	}
	else {
		$this->log('appears not logged in, not going to insert new point into database', 'debug');				
	}
	$this->RequestHandler->renderAs($this, 'json');
	}

	public function updatelatlon()
    {
	if($_SESSION['Auth']){
		$this->log('appears logged in, going to insert new point into database', 'debug');
		$id = $this->request->query('id');
		$name = $this->request->query('name'); 
		$lat = $this->request->query('lat');
		$lon = $this->request->query('lon');
		$type = $this->request->query('type');
		$town = $this->request->query('town'); 
		$state = $this->request->query('state'); 
		$zip = $this->request->query('zip'); 
		$comment = $this->request->query('comment'); 
		$url = $this->request->query('url'); 
		$description = $this->request->query('description'); 
		$json= $this->request->query('json'); 
		$nowtime = date('Y-m-d H:i:s'); 

		$query = $this->Boats->query();
		$query->update()
			->set([
				'name' => $name,
				'lat' => $lat,
				'lon' => $lon,
				'type' => $type,
				'town' => $town,
				'state' => $state,
				'zip' => $zip,
				'comment' => $comment,
				'url' => $url,
				'description' => $description,
				'json' => $json,
				'revised' => $nowtime
			])
			->where(['id' => $id])
			->execute();
	}
	else {
		$this->log('appears not logged in, not going to insert new point into database', 'debug');				
	}
		$this->RequestHandler->renderAs($this, 'json');
	}

    public function index()
    {
		// this is for the boat view
		$search = $this->request->query('search');
		$type = $this->request->query('type');
		if (!$type) {
			$type="boat";
		};
		$this->request->session()->write('type',$type);
		$this->set('header','boats - index');
		$this->paginate = [
		'limit' => 15,
		'order' => [
            'Boats.created' => 'desc'
        ]
		];
//		$boats = $this->paginate($this->Boats->getNearest());
//		$boats = $this->paginate($this->Boats->getRecent());
//		$boats = $this->paginate($this->Boats->find());
		$boats = $this->paginate($this->Boats->find()
			->where([
				'type' => $type, 
			    'OR' =>[
					['name LIKE' 		=> 	'%'.$search.'%'],
					['town LIKE' 		=> 	'%'.$search.'%'],
					['description LIKE' => 	'%'.$search.'%'],
					['state LIKE' 		=>	'%'.$search.'%']
				]
			])
		);
		
        $this->set(compact('boats'));
        $this->set('_serialize', ['boats']);
    }

public function index4()
    {
		// messing with JSON output
		$search = $this->request->query('search');
		$type = $this->request->query('type');
		if (!$type) {
			$type="boat";
		};
		$this->request->session()->write('type',$type);
		$this->set('header','boats - index');
		$this->paginate = [
		'limit' => 15,
		'order' => [
            'Boats.created' => 'desc'
        ]
		];
//		$boats = $this->paginate($this->Boats->getNearest());
//		$boats = $this->paginate($this->Boats->getRecent());
//		$boats = $this->paginate($this->Boats->find());
		$boats = $this->paginate($this->Boats->find()
			->where([
				'type' => $type, 
			    'OR' =>[
					['name LIKE' 		=> 	'%'.$search.'%'],
					['town LIKE' 		=> 	'%'.$search.'%'],
					['description LIKE' => 	'%'.$search.'%'],
					['state LIKE' 		=>	'%'.$search.'%']
				]
			])
		);
		
        $this->set(compact('boats'));
//        $this->set('_serialize', ['boats']);
		$this->set(code,'<a href=http://jimdevoe.com>jim</a>');
		$this->RequestHandler->renderAs($this, 'json');
    }

    public function index2()
    {
		$this->modelClass = false;
		
//        $boats = $this->paginate($this->Boats);
//        $this->set(compact('boats'));
//        $this->set('_serialize', ['boats']);
//		$this->RequestHandler->renderAs($this, 'json'); to return JSON
    }
    
	public function pnp05()
    {
		$this->modelClass = false;
//		$this->autoRender = false;
//		$this->viewBuilder()->layout('b') ;
		$this->viewBuilder()->layout('') ;
		$this->render('/Boats/pnp05');
//        $boats = $this->paginate($this->Boats);
//        $this->set(compact('boats'));
//        $this->set('_serialize', ['boats']);
//		$this->RequestHandler->renderAs($this, 'json'); to return JSON
    }
	public function pnp06()
    {
		$this->modelClass = false;
		$this->viewBuilder()->layout('') ;
		$this->render('/Boats/pnp06');
    }
	
	public function pnp07()
    {
		$this->modelClass = false;
		$this->viewBuilder()->layout('') ;
		$this->render('/Boats/pnp07');
    }
    
    public function view($id = null)
    {
		$this->set('header','boats - view');
        $boat = $this->Boats->get($id, [
            'contain' => ['Sources']
        ]);

        $this->set('boat', $boat);
        $this->set('_serialize', ['boat']);
}

    public function add()
    {
		$type = $this->request->session()->read('type');
		$this->set('type',$type);

		$this->set('header','boats - add');
        $boat = $this->Boats->newEntity();
        if ($this->request->is('post')) {
            $boat = $this->Boats->patchEntity($boat, $this->request->data);
            if ($this->Boats->save($boat)) {
                $this->Flash->success(__('The boat has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The boat could not be saved. Please, try again.'));
            }
        }
        $sources = $this->Boats->Sources->find('list', ['limit' => 200]);
        $this->set(compact('boat', 'sources'));
        $this->set('_serialize', ['boat']);
		//$this->redirect($this->referer);

    }

    public function edit($id = null)
    {
		$this->set('header','boats - edit');
        $boat = $this->Boats->get($id, [
            'contain' => ['Sources']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $boat = $this->Boats->patchEntity($boat, $this->request->data);
            if ($this->Boats->save($boat)) {
                $this->Flash->success(__('The boat has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The boat could not be saved. Please, try again.'));
            }
        }
        $sources = $this->Boats->Sources->find('list', ['limit' => 200]);
        $this->set(compact('boat', 'sources'));
        $this->set('_serialize', ['boat']);
    }
    
	public function delete($id = null)
    {
		$this->set('header','boat - delete');
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Boats->get($id);
        if ($this->Boats->delete($user)) {
        } else {
            $this->Flash->error(__('The boat could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
    public function deleteJson()
    {
//        $this->request->allowMethod(['post', 'delete']);
		if($_SESSION['Auth']){
			$id = $this->request->query('id');
			$boat = $this->Boats->get($id);
			if ($this->Boats->delete($boat)) {} else 	{};
			$this->RequestHandler->renderAs($this, 'json');
		}
	}
}
