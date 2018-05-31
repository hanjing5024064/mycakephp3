<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Inflector;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 */
class ToolsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize()
    {
        parent::initialize();
//        $this->Auth->allow('createActions');
    }

    //create actions
    public function createActions()
    {
        $connection = ConnectionManager::get('default');
        //get all tables
        $results = $connection->execute('truncate actions');
        $results = $connection->execute('show tables')->fetchAll();

        foreach($results as $result){
            //get each controller
            $controllerName = Inflector::camelize($result[0]);

            //insert into action: index/add/delete/view/edit
            $this->loadModel('Actions');
            $methods = ['index', 'add', 'edit', 'view', 'delete'];
            foreach($methods as $method){
                $action = $this->Actions->newEntity();
                $actionData = [
                    'name' => $controllerName.'-'.$method,
                    'controller' => $controllerName,
                    'action' => $method
                ];
                $action = $this->Actions->patchEntity($action, $actionData);
                $this->Actions->save($action);
            }
        }

        echo 'create actions success';
        exit;
    }

}
