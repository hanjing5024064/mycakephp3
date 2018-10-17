<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Inflector;
use Cake\ORM\Query;

class MySearchV2Component extends Component
{
    private $_DEBUG = false;

    private $_controller;
    private $_session;
    private $_controllerName;
    private $_mainModel;

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->_controller = $controller = $this->_registry->getController();
//        $this->_session = $this->_controller->request->getSession();
        $this->_session = $this->_session = $this->_controller->request->session();
        $this->_controllerName = $this->_controller->request->getParam('controller');
        $this->_mainModel = $this->_controller->{$this->_controllerName};
    }

    public function getDataQuery(){
        $searchArray = $this->getSearchArray();

        //根据查询条件获取query
        if($searchArray){
            return $this->getDataQueryFromSearchArray($searchArray);
        }
        return $this->_mainModel->find();
    }

    //初始化系统用户ID和企业从属ID
    private function getSearchArray()
    {
        //todo 测试时清空session
        if($this->_DEBUG)$this->_session->delete('s'.$this->_controllerName);

        $searchArray = [];//post的search

        //post查询
        if ($this->_controller->request->is('post')) {
            $searchArray = $this->_controller->request->data($this->_controllerName);
        } //没有post则历史查询
        elseif ($this->_session->check('s.' . $this->_controllerName)) {
            $searchArray = $this->getConditionFromSession();
        }

        //更新历史查询
        $this->setConditionToSession($searchArray);

        return $searchArray;
    }

    //获取保存在session中的历史查询
    private function getConditionFromSession()
    {
        return 'session condition';
    }

    //将查询保存到session中
    private function setConditionToSession($conditions = '')
    {
        $this->_session->write('s' . $this->_controllerName, $conditions);
    }

    private function getDataQueryFromSearchArray(array $searchArray = []){
        $query =  $this->_mainModel->find();
        $whereCondition = [];
        $matchCondition = [];

        foreach ($searchArray as $key => $value) {
            if(!$value)continue;
            $tmp = explode('-', $key);
            $type = $tmp[0];

            switch($type){
                case 'string'://当前model的字符字段查询, string-name
                    if(count($tmp) === 2){
                        $whereCondition[] = [$this->_controllerName.'.'.$tmp[1].' like' => "%$value%"];
                    }
                    break;
                case 'foreignString'://关联model的字符查询, foreignString-EntityProjects-MaterialAreas-name
                    array_shift($tmp);//去掉类别元素
                    $fieldName = array_pop($tmp);//获得最后一个元素
                    $foreignTableLink = implode('.',$tmp);
                    $foreignTable = array_pop($tmp);
                    $matchCondition[] = [$foreignTableLink, $foreignTable.'.'.$fieldName.' like', "%$value%"];
                    break;
                case 'isNotNull'://当前model的字段非空查询, isNotNull-project_contract_sub_id
                    if(count($tmp) === 2){
                        $whereCondition[] = [$this->_controllerName.'.'.$tmp[1].' is not' => null];
                    }
                    break;
                case 'isNull'://当前model的字段非空查询, isNull-project_contract_sub_id
                    if(count($tmp) === 2){
                        $whereCondition[] = [$this->_controllerName.'.'.$tmp[1].' is' => null];
                    }
                    break;
                case 'foreignDateRegion'://关联model时间区间查询, foreignDateRegion-ProjectContractSubs-signed-start, []-end
                    if(count($tmp) > 2){
                        array_shift($tmp);//去掉类别元素
                        $dateLabel = array_pop($tmp);//获得最后一个元素, start or end
                        $fieldName = array_pop($tmp);//获得最后一个元素, 字段名称
                        $foreignTableLink = implode('.',$tmp);
                        $foreignTable = array_pop($tmp);
                        if($dateLabel === 'start') $flag = '>=';
                        if($dateLabel === 'end') $flag = '<=';
                        $matchCondition[] = [$foreignTableLink, $foreignTable.'.'.$fieldName.' '.$flag, "%$value%"];
                    }
                    break;
                case 'foreignList'://关联model列表查询
                    array_shift($tmp);//去掉类别元素
                    $foreignTableLink = implode('.',$tmp);
                    $foreignTable = array_pop($tmp);
                    $matchCondition[] = [$foreignTableLink, $foreignTable.'.id =', $value];
                    break;
                default:
                    break;
            }
        }

//        if($this->_DEBUG)var_dump($whereCondition);
        if($this->_DEBUG)var_dump($matchCondition);
        if($whereCondition)$query = $query->where($whereCondition);
        if($matchCondition){
            foreach($matchCondition as $matching){
                $query = $query->matching($matching[0], function ($q) use ($matching) {
                    return $q->where([$matching[1] => $matching[2]]);
                });
            }
        }

        return $query;
    }

    //根据post的查询条件构建condition
    private function createConditions(array $searchArray = [])
    {
        $conditions = [];
        $contains = [];

        foreach ($searchArray as $key => $value) {
            $tmp = explode('_', $key);
            $type = $tmp[0];

            switch($type){
                case 'string'://当前model的字符字段查询
                    if(count($tmp) === 2){
                        $conditions[] = [$this->_controllerName.'.'.$tmp[1].' like' => "%$value%"];
                    }
                    break;
                case 'foreignString'://外部关联model的字符查询
                    if(count($tmp) > 2){
                        array_shift($tmp);
//                        $fieldName = array_pop($tmp);
                        $foreignKey = implode('.',$tmp);
                        $conditions[] = [$this->_controllerName.'.'.$foreignKey.' like' => "%$value%"];
//                        $tableName = array_pop($tmp);
//                        $contains[$foreignKey] = function (Query $q) use($tableName, $fieldName, $value){
//                            return $q->where([$tableName.'.'.$fieldName => $value]);
//                        };
                    }
                    break;
                default:
                    break;
            }
        }

        return ['conditions' => $conditions, 'contains' => $contains];
    }

}
