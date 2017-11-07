<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Actions Controller
 *
 * @property \App\Model\Table\ActionsTable $Actions
 *
 * @method \App\Model\Entity\Action[] paginate($object = null, array $settings = [])
 */
class ActionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $actions = $this->paginate($this->Actions);

        $this->set(compact('actions'));
        $this->set('_serialize', ['actions']);
    }

    /**
     * View method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $action = $this->Actions->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('action', $action);
        $this->set('_serialize', ['action']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $action = $this->Actions->newEntity();
        if ($this->request->is('post')) {
            $action = $this->Actions->patchEntity($action, $this->request->getData());
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The action could not be saved. Please, try again.'));
        }
        $roles = $this->Actions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('action', 'roles'));
        $this->set('_serialize', ['action']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $action = $this->Actions->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $action = $this->Actions->patchEntity($action, $this->request->getData());
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The action could not be saved. Please, try again.'));
        }
        $roles = $this->Actions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('action', 'roles'));
        $this->set('_serialize', ['action']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $action = $this->Actions->get($id);
        if ($this->Actions->delete($action)) {
            $this->Flash->success(__('The action has been deleted.'));
        } else {
            $this->Flash->error(__('The action could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
