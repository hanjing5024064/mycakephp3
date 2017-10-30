<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserWechatOpenids Controller
 *
 * @property \App\Model\Table\UserWechatOpenidsTable $UserWechatOpenids
 */
class UserWechatOpenidsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserWechats', 'WechatGzhs']
        ];
        $userWechatOpenids = $this->paginate($this->UserWechatOpenids);

        $this->set(compact('userWechatOpenids'));
        $this->set('_serialize', ['userWechatOpenids']);
    }

    /**
     * View method
     *
     * @param string|null $id User Wechat Openid id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userWechatOpenid = $this->UserWechatOpenids->get($id, [
            'contain' => ['UserWechats', 'WechatGzhs']
        ]);

        $this->set('userWechatOpenid', $userWechatOpenid);
        $this->set('_serialize', ['userWechatOpenid']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userWechatOpenid = $this->UserWechatOpenids->newEntity();
        if ($this->request->is('post')) {
            $userWechatOpenid = $this->UserWechatOpenids->patchEntity($userWechatOpenid, $this->request->getData());
            if ($this->UserWechatOpenids->save($userWechatOpenid)) {
                $this->Flash->success(__('The user wechat openid has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user wechat openid could not be saved. Please, try again.'));
        }
        $userWechats = $this->UserWechatOpenids->UserWechats->find('list', ['limit' => 200]);
        $wechatGzhs = $this->UserWechatOpenids->WechatGzhs->find('list', ['limit' => 200]);
        $this->set(compact('userWechatOpenid', 'userWechats', 'wechatGzhs'));
        $this->set('_serialize', ['userWechatOpenid']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Wechat Openid id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userWechatOpenid = $this->UserWechatOpenids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userWechatOpenid = $this->UserWechatOpenids->patchEntity($userWechatOpenid, $this->request->getData());
            if ($this->UserWechatOpenids->save($userWechatOpenid)) {
                $this->Flash->success(__('The user wechat openid has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user wechat openid could not be saved. Please, try again.'));
        }
        $userWechats = $this->UserWechatOpenids->UserWechats->find('list', ['limit' => 200]);
        $wechatGzhs = $this->UserWechatOpenids->WechatGzhs->find('list', ['limit' => 200]);
        $this->set(compact('userWechatOpenid', 'userWechats', 'wechatGzhs'));
        $this->set('_serialize', ['userWechatOpenid']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Wechat Openid id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userWechatOpenid = $this->UserWechatOpenids->get($id);
        if ($this->UserWechatOpenids->delete($userWechatOpenid)) {
            $this->Flash->success(__('The user wechat openid has been deleted.'));
        } else {
            $this->Flash->error(__('The user wechat openid could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
