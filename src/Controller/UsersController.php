<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeRender(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('user');
    }
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
        $visitorIp = $this->request->clientIp();
        $visitorIps = \Cake\ORM\TableRegistry::getTableLocator()->get('VisitorIps');
        $visitorIpEntity = $visitorIps->newEntity([
            'ip_address' => $visitorIp
        ]);
        $visitorIps->save($visitorIpEntity);
    }

    public function dashboard()
    {
        $visitorIps = \Cake\ORM\TableRegistry::getTableLocator()->get('VisitorIps');
        $this->set('newUserCount', $this->Users->find()->where(['created >' => new \DateTime('-7 days')])->count());
        $this->set('activeUserCount', $this->Users->find()->where(['last_login >' => new \DateTime('-30 days')])->count());
        $this->set('uniqueIpCount', $visitorIps->find()->select(['ip_address'])->distinct(['ip_address'])->count());
        $this->set('userCount', $this->Users->find()->count());
        $this->set('user', $this->Authentication->getIdentity());
    }

    public function login()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, if user is logged in then redirect them to their dashboard
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/users/dashboard';
            $userEntity = $this->Users->get($this->Auth->user('id'));
            $userEntity->last_login = new \DateTime();
            return $this->redirect($target);
        }
        // deal with failed login attempts
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        $this->Flash->success('You have been logged out.');
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }
}
