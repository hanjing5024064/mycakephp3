<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Moments Controller
 *
 * @method \App\Model\Entity\Moment[] paginate($object = null, array $settings = [])
 */
class TestController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->Auth->allow();
    }

    public function bootstrap(){
        $this->viewBuilder()->setLayout('pc_bootstrap');
    }
}
