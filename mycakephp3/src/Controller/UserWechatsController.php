<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserWechats Controller
 *
 * @property \App\Model\Table\UserWechatsTable $UserWechats
 *
 * @method \App\Model\Entity\UserWechat[] paginate($object = null, array $settings = [])
 */
class UserWechatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userWechats = $this->paginate($this->UserWechats);

        $this->set(compact('userWechats'));
        $this->set('_serialize', ['userWechats']);
    }

    /**
     * View method
     *
     * @param string|null $id User Wechat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userWechat = $this->UserWechats->get($id, [
            'contain' => ['Users', 'UserWechatOpenids']
        ]);

        $this->set('userWechat', $userWechat);
        $this->set('_serialize', ['userWechat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userWechat = $this->UserWechats->newEntity();
        if ($this->request->is('post')) {
            $userWechat = $this->UserWechats->patchEntity($userWechat, $this->request->getData());
            if ($this->UserWechats->save($userWechat)) {
                $this->Flash->success(__('The user wechat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user wechat could not be saved. Please, try again.'));
        }
        $users = $this->UserWechats->Users->find('list', ['limit' => 200]);
        $this->set(compact('userWechat', 'users'));
        $this->set('_serialize', ['userWechat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Wechat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userWechat = $this->UserWechats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userWechat = $this->UserWechats->patchEntity($userWechat, $this->request->getData());
            if ($this->UserWechats->save($userWechat)) {
                $this->Flash->success(__('The user wechat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user wechat could not be saved. Please, try again.'));
        }
        $users = $this->UserWechats->Users->find('list', ['limit' => 200]);
        $this->set(compact('userWechat', 'users'));
        $this->set('_serialize', ['userWechat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Wechat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userWechat = $this->UserWechats->get($id);
        if ($this->UserWechats->delete($userWechat)) {
            $this->Flash->success(__('The user wechat has been deleted.'));
        } else {
            $this->Flash->error(__('The user wechat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
