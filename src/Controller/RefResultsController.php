<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RefResults Controller
 *
 * @property \App\Model\Table\RefResultsTable $RefResults
 *
 * @method \App\Model\Entity\RefResult[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefResultsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $refResults = $this->paginate($this->RefResults);

        $this->set(compact('refResults'));
    }

    /**
     * View method
     *
     * @param string|null $id Ref Result id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refResult = $this->RefResults->get($id, [
            'contain' => []
        ]);

        $this->set('refResult', $refResult);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refResult = $this->RefResults->newEntity();
        if ($this->request->is('post')) {
            $refResult = $this->RefResults->patchEntity($refResult, $this->request->getData());
            if ($this->RefResults->save($refResult)) {
                $this->Flash->success(__('The result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $this->set(compact('refResult'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ref Result id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refResult = $this->RefResults->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refResult = $this->RefResults->patchEntity($refResult, $this->request->getData());
            if ($this->RefResults->save($refResult)) {
                $this->Flash->success(__('The result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $this->set(compact('refResult'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ref Result id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refResult = $this->RefResults->get($id);
        if ($this->RefResults->delete($refResult)) {
            $this->Flash->success(__('The result has been deleted.'));
        } else {
            $this->Flash->error(__('The result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
