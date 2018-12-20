<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Schools Controller
 *
 * @property \App\Model\Table\SchoolsTable $Schools
 *
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchoolsController extends AppController
{
    public function getByCity(){
        $city_id = $this->request->query('city_id');

        $schools = $this->Schools->find('all', [
            'conditions' => ['Schools.city_id' => $city_id],
        ]);
        $this->set('schools', $schools);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $schools = $this->paginate($this->Schools);

        $this->set(compact('schools'));
    }

    /**
     * View method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $school = $this->Schools->get($id, [
            'contain' => ['Cities', 'Tournaments']
        ]);

        $this->set('school', $school);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $school = $this->Schools->newEntity();
        if ($this->request->is('post')) {
            $school = $this->Schools->patchEntity($school, $this->request->getData());
            if ($this->Schools->save($school)) {
                $response = ['result' => 'The school has been saved.'];
            }else{
                $response = ['result' => 'The school could not be saved. Please, try again.'];
            }
            
        }

        $this->set(compact('response'));
    }

    /**
     * Edit method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $data = $this->request->input('json_decode');

        $id = $data->id;
        $school = $this->Schools->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $school = $this->Schools->patchEntity($school, $this->request->getData());
            if ($this->Schools->save($school)) {
                $response = ['result' => 'The school was update.'];
            }else{
                $response = ['result' => 'The school could not be saved. Please, try again.'];
            }
            
        }

        $this->set(compact('response'));
    }

    /**
     * Delete method
     *
     * @param string|null $id School id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $data = $this->request->input('json_decode');

        $id = $data->id;
        $this->request->allowMethod(['post', 'delete']);
        $school = $this->Schools->get($id);
        if ($this->Schools->delete($school)) {
                $response = ['result' => 'The school has been deleted.'];
            }else{
                $response = ['result' => 'The school could not be deleted. Please, try again.'];
            } 
        }

        $this->set(compact('response'));
    }
}
