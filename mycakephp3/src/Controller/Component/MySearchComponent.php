<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class MySearchComponent extends Component
{
    private $controller;

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->controller = $controller = $this->_registry->getController();

    }

    //初始化系统用户ID和企业从属ID
    public function getSearchCondition(){
        $conditions = array();
        $searchArray  = array();
        $controllerName = $this->controller->request->param('controller');
        $session = $this->controller->request->session();

        //post search
        if($this->controller->request->is('post')){
            //serach array
            $searchArray = [$controllerName => $this->controller->request->data($controllerName)];
            $session->write('searchArray', $searchArray);
            $session->write('test', 'post');
        }
        //get search from session
        elseif($session->check('searchArray.'.$controllerName)){
            $searchArray = [$controllerName => $session->read('searchArray.'.$controllerName)];
            $session->write('test', 'search');
        }

        //organize conditions according to searchArray
        if(array_key_exists($controllerName,$searchArray)){
            foreach($searchArray[$controllerName] as $key => $value){
                if(is_array($value)){
                    //do something, from-to
                    foreach($value as $subType => $subValue){
                        if($subValue === '')continue;
                        switch($subType){
                            case 'from':
                                $conditions[$controllerName.'.'.$key.' >='] = "$subValue";
                                break;
                            case 'to':
                                $conditions[$controllerName.'.'.$key.' <='] = "$subValue";
                                break;
                            default:
                                break;
                        }
                    }
                }else{
                    $conditions[$controllerName.'.'.$key.' like'] = "%$value%";
                }
            }
            $session->write('getSearch', 'ok');
        }

        return $conditions;
    }
}