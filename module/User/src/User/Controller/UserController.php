<?php

/**
 * Description of UserController
 *
 * @author Deyvison Rodrigo B. Estevam <deyvison_rodrigo@hotmail.com>
 * @date May 24, 2016
 * 
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\ViewModel;

class UserController extends AbstractActionController
{
    protected $userTable;
    
    public function indexAction() {        
        return ViewModel(array(
            'users' => $this->getUserTable()->fetchAll(),
        ));
    }
    
    public function getUserTable() {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('User\Model\UserTable');
        }
        return $this->userTable;
    }
}
