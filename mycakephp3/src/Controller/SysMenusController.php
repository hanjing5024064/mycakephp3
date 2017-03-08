<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SysMenus Controller
 *
 * @property \App\Model\Table\SysMenusTable $SysMenus
 */
class SysMenusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentSysMenus']
        ];
        $sysMenus = $this->paginate($this->SysMenus);

        $this->set(compact('sysMenus'));
        $this->set('_serialize', ['sysMenus']);
    }

    /**
     * View method
     *
     * @param string|null $id Sys Menu id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sysMenu = $this->SysMenus->get($id, [
            'contain' => ['ParentSysMenus', 'ChildSysMenus']
        ]);

        $this->set('sysMenu', $sysMenu);
        $this->set('_serialize', ['sysMenu']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sysMenu = $this->SysMenus->newEntity();
        if ($this->request->is('post')) {
            $sysMenu = $this->SysMenus->patchEntity($sysMenu, $this->request->getData());
            if ($this->SysMenus->save($sysMenu)) {
                $this->Flash->success(__('The sys menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sys menu could not be saved. Please, try again.'));
        }
        $parentSysMenus = $this->SysMenus->ParentSysMenus->find('list', ['limit' => 200]);
        $this->set(compact('sysMenu', 'parentSysMenus'));
        $this->set('_serialize', ['sysMenu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sys Menu id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sysMenu = $this->SysMenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sysMenu = $this->SysMenus->patchEntity($sysMenu, $this->request->getData());
            if ($this->SysMenus->save($sysMenu)) {
                $this->Flash->success(__('The sys menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sys menu could not be saved. Please, try again.'));
        }
        $parentSysMenus = $this->SysMenus->ParentSysMenus->find('list', ['limit' => 200]);
        $this->set(compact('sysMenu', 'parentSysMenus'));
        $this->set('_serialize', ['sysMenu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sys Menu id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sysMenu = $this->SysMenus->get($id);
        if ($this->SysMenus->delete($sysMenu)) {
            $this->Flash->success(__('The sys menu has been deleted.'));
        } else {
            $this->Flash->error(__('The sys menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
