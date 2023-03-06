<?php
namespace App\Controller\Institution;

use App\Controller\AppController;
use Cake\Utility\Xml;
use Cake\Filesystem\File;
use Cake\Utility\Hash;

/**
 * Ce2bs Controller
 *
 *
 * @method \App\Model\Entity\Cae2b[] paginate($object = null, array $settings = [])
 */
class Ce2bsController extends AppController
{

    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['add', 'edit']);   
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
            'contain' => ['Attachments', 'RequestReporters', 'RequestEvaluators', 'Committees', 'Reviews', 'Reviews.Users']
        ];
        $query = $this->Ce2bs
            ->find('search', ['search' => $this->request->query])
            ->order(['created' => 'DESC'])
            ->where(['IFNULL(copied, "N") !=' => 'old copy', 'Ce2bs.company_name' => $this->Auth->user('name_of_institution')]);
        $users = $this->Ce2bs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);
        $this->set(compact('query', 'users'));
        if ($this->request->params['_ext'] === 'pdf' || $this->request->params['_ext'] === 'csv') {
            $this->set('ce2bs', $query->contain($this->paginate['contain']));
        } else {
            $this->set('ce2bs', $this->paginate($query));
        } 

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = [ 
                'id', 'user_id', 'messageid', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'company_name', 'reporter_email',
                'status', 'created', 'modified',  
                'committees.comments', 'committees.literature_review', 'committees.references_text', 
                'request_evaluators.system_message', 'request_evaluators.user_message', 
                'request_reporters.system_message', 'request_reporters.user_message', 
                'reviews.system_message', 'reviews.user_message', 
                'attachments.file'
            ];
            $_extract = [
                'id', 'user_id', 'messageid', 'reference_number', 'assigned_to', 'assigned_by', 'assigned_date', 'company_name', 'reporter_email',
                'status', 'created', 'modified',                 
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.comments')); }, //'committees.comments', 
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.literature_review')); }, //'.literature_review', 
                function ($row) { return implode('|', Hash::extract($row['committees'], '{n}.references_text')); }, //'.references_text', 
                function ($row) { return implode('|', Hash::extract($row['request_evaluators'], '{n}.system_message')); }, //'.system_message', 
                function ($row) { return implode('|', Hash::extract($row['request_evaluators'], '{n}.user_message')); }, // '.user_message', 
                function ($row) { return implode('|', Hash::extract($row['request_reporters'], '{n}.system_message')); }, //'.system_message', 
                function ($row) { return implode('|', Hash::extract($row['request_reporters'], '{n}.system_message')); }, //'.user_message', 
                function ($row) { return implode('|', Hash::extract($row['reviews'], '{n}.system_message')); }, //'reviews.system_message', 
                function ($row) { return implode('|', Hash::extract($row['reviews'], '{n}.user_message')); }, //'reviews.user_message', 
                function ($row) { return implode('|', Hash::extract($row['attachments'], '{n}.file')); }, //'attachments.file'
            ];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }

        /*if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'landscape',
                    'filename' => 'summary_ce2bs.pdf'
                ]
            ]);
        }*/
    }

    /**
     * View method
     *
     * @param string|null $id Cae2b id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ce2b = $this->Ce2bs->get($id, [
            'contain' => $this->ce2b_contain, 'withDeleted'
        ]);


        $ekey = 100;
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($ce2b->reviews as $key => $value) {
                if($value['id'] == $this->request->getData('review_id')) {
                    $ekey = $key;
                }
            } 
        }

        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $ce2b->reference_number.'.pdf'
                ]
            ]);
        }

        $evaluators = $this->Ce2bs->Users->find('list', ['limit' => 200])->where(['group_id' => 4]);
        $users = $this->Ce2bs->Users->find('all', ['limit' => 200])->where(['group_id IN' => [2, 4]]);

        $xml = (Xml::toArray(Xml::build($ce2b->e2b_content)));
        $arr = Hash::flatten($xml);

        $this->set(compact('ce2b', 'evaluators', 'users', 'ekey', 'arr'));
        $this->set('_serialize', ['ce2b']);
    }

}
