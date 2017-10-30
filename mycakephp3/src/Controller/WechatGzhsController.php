<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WechatGzhs Controller
 *
 * @property \App\Model\Table\WechatGzhsTable $WechatGzhs
 */
class WechatGzhsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $wechatGzhs = $this->paginate($this->WechatGzhs);

        $this->set(compact('wechatGzhs'));
        $this->set('_serialize', ['wechatGzhs']);
    }

    /**
     * View method
     *
     * @param string|null $id Wechat Gzh id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wechatGzh = $this->WechatGzhs->get($id, [
            'contain' => ['UserWechatOpenids']
        ]);

        $this->set('wechatGzh', $wechatGzh);
        $this->set('_serialize', ['wechatGzh']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wechatGzh = $this->WechatGzhs->newEntity();
        if ($this->request->is('post')) {
            $wechatGzh = $this->WechatGzhs->patchEntity($wechatGzh, $this->request->getData());
            if ($this->WechatGzhs->save($wechatGzh)) {
                $this->Flash->success(__('The wechat gzh has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wechat gzh could not be saved. Please, try again.'));
        }
        $this->set(compact('wechatGzh'));
        $this->set('_serialize', ['wechatGzh']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Wechat Gzh id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wechatGzh = $this->WechatGzhs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wechatGzh = $this->WechatGzhs->patchEntity($wechatGzh, $this->request->getData());
            if ($this->WechatGzhs->save($wechatGzh)) {
                $this->Flash->success(__('The wechat gzh has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wechat gzh could not be saved. Please, try again.'));
        }
        $this->set(compact('wechatGzh'));
        $this->set('_serialize', ['wechatGzh']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Wechat Gzh id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wechatGzh = $this->WechatGzhs->get($id);
        if ($this->WechatGzhs->delete($wechatGzh)) {
            $this->Flash->success(__('The wechat gzh has been deleted.'));
        } else {
            $this->Flash->error(__('The wechat gzh could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
