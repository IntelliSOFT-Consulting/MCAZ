<?php
namespace App\Controller\Institution;


use App\Controller\Base\UsersBaseController;

class UsersController extends UsersBaseController
{
    public function index() {
        $this->paginate = [
            'contain' => ['Designations', 'Groups']
        ];

        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        $this->set(compact('groups', 'designations'));
        $query = $this->Users
            ->find('search', ['search' => $this->request->query])
            ->where([['OR' => ['Users.id' => $this->Auth->user('id'), 'Users.name_of_institution' => $this->Auth->user('name_of_institution')]]]);

        $this->set('users', $this->paginate($query));

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id', 'name', 'username', 'email', 'Phone Number', 'name_of_institution', 
                        'institution_address', 'institution_code'];
            $_extract = ['id', 'name', 'username', 'email',  
                        'phone_no', 'name_of_institution', 'institution_address', 'institution_code',
            ];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }
    }

    public function dashboard() {
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
        $this->loadModel('Ce2bs');
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->paginate = [
            'limit' => 5,
        ];

        // pr($user);

        $sadrs = $this->paginate($this->Sadrs->find('all')->where(['submitted' => 2, 'status NOT IN' => ['UnSubmitted'], 'IFNULL(copied, "N") !=' => 'old copy', 'Sadrs.name_of_institution' => $this->Auth->user('name_of_institution')]), ['scope' => 'sadr', 'order' => ['Sadrs.id' => 'desc'],
                                    'fields' => ['Sadrs.id', 'Sadrs.created', 'Sadrs.reference_number', 'Sadrs.submitted', 'Sadrs.assigned_to']]);
        $adrs = $this->paginate($this->Adrs->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy', 'Adrs.name_of_institution' => $this->Auth->user('name_of_institution')]), ['scope' => 'adr', 'order' => ['Adrs.status' => 'asc', 'Adrs.id' => 'desc'],
                                    'fields' => ['Adrs.id', 'Adrs.created', 'Adrs.reference_number', 'Adrs.assigned_to']]);
        $aefis = $this->paginate($this->Aefis->find('all')->where(['submitted' => 2, 'status NOT IN' => ['UnSubmitted'], 'IFNULL(copied, "N") !=' => 'old copy', 'Aefis.reporter_institution' => $this->Auth->user('name_of_institution')]), ['scope' => 'aefi', 'order' => ['Aefis.status' => 'asc', 'Aefis.id' => 'desc'],
                                    'fields' => ['Aefis.id', 'Aefis.created', 'Aefis.reference_number', 'Aefis.assigned_to']]);
        $saefis = $this->paginate($this->Saefis->find('all')->where(['submitted' => 2, 'status NOT IN' => ['UnSubmitted'], 'IFNULL(copied, "N") !=' => 'old copy', 'Saefis.name_of_vaccination_site' => $this->Auth->user('name_of_institution')]), ['scope' => 'saefi', 'order' => ['Saefis.status' => 'asc', 'Saefis.id' => 'desc'],
                                    'fields' => ['Saefis.id', 'Saefis.created', 'Saefis.reference_number', 'Saefis.assigned_to']]);
        $ce2bs = $this->paginate($this->Ce2bs->find('all')->where(['submitted' => 2, 'status NOT IN' => ['UnSubmitted'], 'IFNULL(copied, "N") !=' => 'old copy', 'Ce2bs.company_name' => $this->Auth->user('name_of_institution')]), ['scope' => 'ce2b', 'order' => ['Ce2bs.status' => 'asc', 'Ce2bs.id' => 'desc'],
                                    'fields' => ['Ce2bs.id', 'Ce2bs.created', 'Ce2bs.reference_number', 'Ce2bs.assigned_to', 'Ce2bs.e2b_file']]);

        // $evaluators = $this->Sadrs->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);

        $this->set(compact('sadrs', 'adrs', 'aefis', 'saeifs'));
        $this->set(compact('saefis', 'ce2bs'));
    }

    public function deactivate($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user) {
                $query = $this->Users->query();
                $query->update()
                    ->set(['is_confirmed' => 0])
                    ->where(['id' => $user->id])
                    ->execute();
                $this->set([
                        'message' => 'Deactivation successful.', 
                        '_serialize' => ['message']]);
            } else {             
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'Unable to get user', 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
            }
        }
    }

    public function activate($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user) {
                $query = $this->Users->query();
                $query->update()
                    ->set(['is_confirmed' => 1])
                    ->where(['id' => $user->id])
                    ->execute();
                $this->set([
                        'message' => 'Confirmation successful.', 
                        '_serialize' => ['message']]);
            } else {             
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'Unable to get user', 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
            }
        }
    }
}