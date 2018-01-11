<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 *
 * @method \App\Model\Entity\Notification[] paginate($object = null, array $settings = [])
 */
class NotificationsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index', 'restore']
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Messages'],
            'order' => ['Notifications.created' => 'DESC']
        ];
        $withDeleted = ($this->request->getQuery('deleted')) ? 'withDeleted' : '';
        $query = $this->Notifications
            ->find('search', ['search' => $this->request->query, $withDeleted ]);

        $this->set('notifications', $this->paginate($query));
    }

    /**
     * View method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('notification', $notification);
        $this->set('_serialize', ['notification']);
    }

}
