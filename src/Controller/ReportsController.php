<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use Exception;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['publicReports',  'publicSadrsPerYear', 'publicSaefisPerYear', 'publicAefisPerYear', 'publicSaePerYear', 'sadrsPerDesignation', 'aefisPerDesignation', 'saefisPerDesignation', 'adrsPerDesignation', 'publicSadrsPerMonth', 'publicSaePerMonth', 'publicSaefisPerMonth', 'publicAefisPerMonth', 'publicSadrsPerInstitution', 'publicSaePerInstitution', 'publicAefisPerInstitution', 'publicSaefisPerInstitution', 'sadrsPerMedicine', 'aefisPerMedicine', 'saefisPerMedicine', 'adrPerMedicine', 'publicSadrsPerProvince', 'publicAefisPerProvince', 'publicSaefisPerProvince']);
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
    }

    // Added Reports

    // PER YEAR DATA
    public function publicSadrsPerYear()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count'],
                'color' => '#7f7fff'
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADR per year',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function publicSaefisPerYear()
    {
        $this->loadModel('Saefis');
        $sadr_stats = $this->Saefis->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Saefis->find('all')->func()->count('*')

        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count'],
                'color' =>  '#ff92c9'
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAEFIS per year',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function publicAefisPerYear()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count'], 'color' => '#ff92c9'
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFI per year',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function publicSaePerYear()
    {
        $this->loadModel('Adrs');
        $sadr_stats = $this->Adrs->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count'], 'color' => '#71C7A0'
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAE per year',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    //PER MONTH DATA
    public function publicSadrsPerMonth()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([
            'year' => 'date_format(created,"%b")',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count'],
                'color' => '#7f7fff'
            ];
        }

        $data = $this->generate_from_current_month($data);
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADR per month',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function publicSaePerMonth()
    {
        $this->loadModel('Adrs');
        $sadr_stats = $this->Adrs->find('all')->select([
            'year' => 'date_format(created,"%b")',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count'],
                'color' => '#71C7A0'
            ];
        }

        $data = $this->generate_from_current_month($data);
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAE per month',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function publicAefisPerMonth()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')->select([
            'year' => 'date_format(created,"%b")',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count'], 'color' => '#ff92c9'
            ];
        }

        $data = $this->generate_from_current_month($data);
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFI per month',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function publicSaefisPerMonth()
    {
        $this->loadModel('Saefis');
        $sadr_stats = $this->Saefis->find('all')->select([
            'year' => 'date_format(created,"%b")',
            'count' => $this->Saefis->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count'], 'color' => '#ff92c9'
            ];
        }

        $data = $this->generate_from_current_month($data);
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAEFI per month',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function generate_from_current_month($data)
    {
        // generate a list of months from the current month to the last month of the year 
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $months[] = date('M', strtotime("-$i months"));
        }
        // loop through the months and check if the month is in the data array
        // if it is not, add it to the data array with a value of 0
        foreach ($months as $month) {
            $new_data[] = [];;
            foreach ($data as $key => $value) {
                if ($value['name'] == $month) {
                    $new_data[]  = [
                        'name' => $value['name'],
                        'y' => $value['y'],
                        'color' => $value['color']
                    ];
                }
            }
        }
        // revers the $new_data
        return $new_data = array_reverse($new_data);
    }
    // PER INSTITUTION DATA 
    public function publicSadrsPerInstitution()
    {
        function outer_rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')
            ->select([
                'facility_name' => 'facility_name',
                'count' => $this->Sadrs->find('all')->func()->count('distinct facility_name')
            ])
            ->join([
                'table' => 'facilities',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.facility_code = institution_code'
            ])
            ->group('facility_name')
            ->where(['institution_code!="" ', 'institution_code IS NOT' => null])
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['facility_name'], 'color' => outer_rand_color()];
            $columns[] = [$value['facility_name']];
        }

        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADR by Institution',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }
    public function publicSaePerInstitution()
    {
        function sae_outer_rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $this->loadModel('Adrs');
        $sadr_stats = $this->Adrs->find('all')
            ->select([
                'facility_name' => 'facility_name',
                'count' => $this->Adrs->find('all')->func()->count('distinct facility_name')
            ])
            ->join([
                'table' => 'facilities',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.facility_code = institution_code'
            ])
            ->group('facility_name')
            ->where(['institution_code!="" ', 'institution_code IS NOT' => null])
            ->hydrate(false);
        $data[] = [];
        $columns[] = [];


        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['facility_name'], 'color' => sae_outer_rand_color()];
            $columns[] = [$value['facility_name']];
        }


        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADR by Institution',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }
    public function publicAefisPerInstitution()
    {
        $this->loadModel('Aefis');
        function inner_rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $sadr_stats = $this->Aefis->find('all')
            ->select([
                'facility_name' => 'facility_name',
                'count' => $this->Aefis->find('all')->func()->count('distinct facility_name')
            ])
            ->join([
                'table' => 'facilities',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.facility_name = reporter_institution'
            ])
            ->group('facility_name')
            ->where(['reporter_institution!="" ', 'reporter_institution IS NOT' => null])
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['facility_name'], 'color' => inner_rand_color()];
            $columns[] = [$value['facility_name']];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFI by Institution',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }
    public function publicSaefisPerInstitution()
    {
        $this->loadModel('Saefis');
        function inners_rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $sadr_stats = $this->Saefis->find('all')
            ->select([
                'facility_name' => 'facility_name',
                'count' => $this->Saefis->find('all')->func()->count('distinct facility_name')
            ])
            ->join([
                'table' => 'facilities',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.facility_name = reporter_institution'
            ])
            ->group('facility_name')
            ->where(['reporter_institution!="" ', 'reporter_institution IS NOT' => null])
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['facility_name'], 'color' => inners_rand_color()];
            $columns[] = [$value['facility_name']];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAEFIS by Institution',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    // PER MEDICINE DATA
    public function sadrsPerMedicine()
    {

        $this->loadModel('Sadrs');
        function minor_rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $sadr_stats = $this->Sadrs->find('all')
            ->select([
                'drug_name' => 'drug_name',
                'count' => $this->Sadrs->find('all')->func()->count('distinct drug_name')
            ])
            ->join([
                'table' => 'sadr_list_of_drugs',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.sadr_id = Sadrs.id'
            ])
            ->group('drug_name')
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['drug_name'], 'color' => minor_rand_color()];
            $columns[] = [$value['drug_name']];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADR per Medicine',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    public function aefisPerMedicine()
    {

        $this->loadModel('Aefis');
        function aefi_rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $sadr_stats = $this->Aefis->find('all')
            ->select([
                'vaccine_name' => 'vaccine_name',
                'count' => $this->Aefis->find('all')->func()->count('*')
            ])
            ->join([
                'table' => 'aefi_list_of_vaccines',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.aefi_id = Aefis.id'
            ])
            ->group('vaccine_name')
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['vaccine_name'], 'color' => aefi_rand_color()];
            $columns[] = [$value['vaccine_name']];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFI per Medicine',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    public function saefisPerMedicine()
    {

        $this->loadModel('Saefis');
        function saefis_rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $sadr_stats = $this->Saefis->find('all')
            ->select([
                'vaccine_name' => 'vaccine_name',
                'count' => $this->Saefis->find('all')->func()->count('*')
            ])
            ->join([
                'table' => 'saefi_list_of_vaccines',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.saefi_id = Saefis.id'
            ])
            ->group('vaccine_name')
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['vaccine_name'], 'color' => saefis_rand_color()];
            $columns[] = [$value['vaccine_name']];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAEFIS per Medicine',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }
    public function adrPerMedicine()
    {

        $this->loadModel('Adrs');
        function adr_rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        $sadr_stats = $this->Adrs->find('all')
            ->select([
                'drug_name' => 'drug_name',
                'count' => $this->Adrs->find('all')->func()->count('*')
            ])
            ->join([
                'table' => 'adr_list_of_drugs',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.adr_id = Adrs.id'
            ])
            ->group('drug_name')
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['drug_name'], 'color' => adr_rand_color()];
            $columns[] = [$value['drug_name']];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAEs per Medicine',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    // End of Reports

    public function publicReports()
    {
        $this->loadModel('ReportSettings');
        try {
            $report = $this->ReportSettings->get(1, [
                'contain' => []
            ]);
        } catch (Exception $e) {

            $report = $this->ReportSettings->newEntity();
            $this->ReportSettings->save($report);
        }
        $this->set(compact('report'));
        $this->set('_serialize', ['report']);
    }


    // PER DESIGNATION 
    public function sadrsPerDesignation()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([
            'Designations.name',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['designation_id IS NOT' => null, 'submitted' => 2])
            ->group('Designations.name')
            ->contain(['Designations'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['designation']['name'])) ? $value['designation']['name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADRs by designation',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }


    public function aefisPerDesignation()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')->select([
            'Designations.name',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['designation_id IS NOT' => null, 'submitted' => 2])
            ->group('Designations.name')
            ->contain(['Designations'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['designation']['name'])) ? $value['designation']['name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFIs by designation',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function adrsPerDesignation()
    {
        $this->loadModel('Adrs');
        $sadr_stats = $this->Adrs->find('all')->select([
            'Designations.name',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            ->where(['designation_id IS NOT' => null, 'submitted' => 2])
            ->group('Designations.name')
            ->contain(['Designations'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['designation']['name'])) ? $value['designation']['name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAEs by designation',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function saefisPerDesignation()
    {
        $this->loadModel('Saefis');
        $sadr_stats = $this->Saefis->find('all')->select([
            'Designations.name',
            'count' => $this->Saefis->find('all')->func()->count('*')
        ])
            ->where(['designation_id IS NOT' => null, 'submitted' => 2])
            ->group('Designations.name')
            ->contain(['Designations'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['designation']['name'])) ? $value['designation']['name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFIs Investigational by designation',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    public function sadrReports()
    {
    }
    public function aefiReports()
    {
    }
    public function adrReports()
    {
    }
    public function saefiReports()
    {
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('ReportSettings');
        try {
            $report = $this->ReportSettings->get(1, [
                'contain' => []
            ]);
        } catch (Exception $e) {

            $report = $this->ReportSettings->newEntity();
            $this->ReportSettings->save($report);
        }
        $this->set(compact('report'));
        $this->set('_serialize', ['report']);
    }
    public function updateSettings($id = null)
    {
        $this->loadModel('ReportSettings');
        $reportSetting = $this->ReportSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reportSetting = $this->ReportSettings->patchEntity($reportSetting, $this->request->getData());
            if ($this->ReportSettings->save($reportSetting)) {
                $this->Flash->success(__('The report setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report setting could not be saved. Please, try again.'));
        }
        $this->set(compact('reportSetting'));
    }
    /**
     * View method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function sadrsPerProvince()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([
            'Provinces.province_name',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['province_id IS NOT' => null])
            ->group('Provinces.province_name')
            ->contain(['Provinces'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['province']['province_name'])) ? $value['province']['province_name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADRS by provinces',
                'data' => $data, //Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'), //$data, 
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function aefisPerProvince()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')->select([
            'Provinces.province_name',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['province_id IS NOT' => null])
            ->group('Provinces.province_name')
            ->contain(['Provinces'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['province']['province_name'])) ? $value['province']['province_name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFIs by provinces',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }


    // PER PROVINCE DATA
    public function publicSadrsPerProvince()
    {
        # code...
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([
            'Provinces.province_name',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['province_id IS NOT' => null])
            ->group('Provinces.province_name')
            ->contain(['Provinces'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['province']['province_name'])) ? $value['province']['province_name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADRs by provinces',
                'data' => $data, //Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'), //$data, 
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    

    public function publicAefisPerProvince()
    {
        # code...
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')->select([
            'Provinces.province_name',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['province_id IS NOT' => null])
            ->group('Provinces.province_name')
            ->contain(['Provinces'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['province']['province_name'])) ? $value['province']['province_name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFIs by provinces',
                'data' => $data, //Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'), //$data, 
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }
    public function publicSaefisPerProvince()
    {
        # code...
        $this->loadModel('Saefis');
        $sadr_stats = $this->Saefis->find('all')->select([
            'Provinces.province_name',
            'count' => $this->Saefis->find('all')->func()->count('*')
        ])
            ->where(['province_id IS NOT' => null])
            ->group('Provinces.province_name')
            ->contain(['Provinces'])
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['province']['province_name'])) ? $value['province']['province_name'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAEFIs by provinces',
                'data' => $data, //Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'), //$data, 
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    public function sadrsPerYear()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADRS per year',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    public function aefisPerYear()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['year'],
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFIs per year',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    public function sadrsPerCausality()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')
            ->leftJoinWith('Reviews')
            //->contain(['Provinces', 'Reviews'])
            // ->select(['reference_number', 'Reviews.id'])
            ->select([
                'reviewed' => 'case when ifnull(Reviews.id, 0) = 0 then "Not Reviewed" else "Reviewed" end',
                'count' => $this->Sadrs->find('all')->func()->count('*')
            ])
            //->where(['province_id IS NOT' => null])
            ->group('reviewed')
            ->hydrate(false);
        // debug($sadr_stats->toArray());
        // return;
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['reviewed'])) ? $value['reviewed'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADRS by causality assessment',
                'data' => $data, //Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'), //$data, 
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    public function aefisPerCausality()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')
            ->leftJoinWith('Reviews')
            ->select([
                'reviewed' => 'case when ifnull(Reviews.id, 0) = 0 then "Not Reviewed" else "Reviewed" end',
                'count' => $this->Aefis->find('all')->func()->count('*')
            ])
            ->group('reviewed')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => (!empty($value['reviewed'])) ? $value['reviewed'] : 'Unknown',
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AEFIS by causality assessment',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    public function saefisPerMonth()
    {
        $this->loadModel('Saefis');
        $sadr_stats = $this->Saefis->find('all')->select([
            'mnth' => 'date_format(created,"%b")',
            'count' => $this->Saefis->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('mnth')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['mnth'],
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAEFIS by month',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }

    public function adrsPerMonth()
    {
        $this->loadModel('Adrs');
        $sadr_stats = $this->Adrs->find('all')->select([
            'mnth' => 'date_format(created,"%b")',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            // ->where(['province_id IS NOT' => null])
            ->group('mnth')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = [
                'name' => $value['mnth'],
                'y' => $value['count']
            ];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'SAES by month',
                'data' => $data,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }


    public function total()
    {
        $this->loadModel('Adrs');
        $this->loadModel('Sadrs');
        $this->loadModel('Aefis');
        //'amr' =>  $this->Adrs->find('all')->func()->sum('sae_type'),
        $adr_stats = $this->Adrs->find('all')->select([
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            ->where(['sae_type IS NOT' => null, 'sae_type IS NOT' => 'Any other important medical event.', 'sae_type IS NOT' => ''])
            //->group('amr')
            ->hydrate(false);
        $sadr_stats = $this->Sadrs->find('all')->select([
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['severity_reason IS NOT' => null, 'severity_reason IS NOT' => 'Other Medically Important Reason', 'severity_reason IS NOT' => ''])
            //->group('amr')
            ->hydrate(false);
        $aefi_stats = $this->Aefis->find('all')->select([
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['serious_yes IS NOT' => null, 'serious_yes IS NOT' => ''])
            //->group('amr')
            ->hydrate(false);

        foreach ($adr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#71C7A0'];
            $columns[] = ['SAE'];
        }

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#7f7fff'];
            $columns[] = ['ADR'];
        }

        foreach ($aefi_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#ff92c9'];
            $columns[] = ['AEFI'];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'AMR Total',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    public function hospitalizationsPerYear()
    {
        $this->loadModel('Adrs');
        $this->loadModel('Sadrs');
        $this->loadModel('Aefis');
        $total = 0;
        //'amr' =>  $this->Adrs->find('all')->func()->sum('sae_type'),
        $adr_stats = $this->Adrs->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            ->where(['sae_type IS ' => 'Caused or prolonged hospitalization (non-elective).',])
            ->group('year')
            ->hydrate(false);
        $sadr_stats = $this->Sadrs->find('all')->select([ //'amr' => 'severity_reason',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['severity_reason IS ' => 'Hospitalization/Prolonged',])
            //->group('amr')
            ->hydrate(false);
        $aefi_stats = $this->Aefis->find('all')->select([ //'amr' => 'serious_yes',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['serious_yes IS ' => 'Hospitalization'])
            //->group('amr')
            ->hydrate(false);

        foreach ($adr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#71C7A0'];
            $columns[] = ['SAE'];
        }

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#7f7fff'];
            $columns[] = ['ADR'];
        }

        foreach ($aefi_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#ff92c9'];
            $columns[] = ['AEFI'];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Hospitalization Cases',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    public function hospitalizationsAefi()
    {
        $this->loadModel('Aefis');
        $aefi_stats = $this->Aefis->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['serious_yes IS ' => 'Hospitalization'])
            ->group('year')
            ->hydrate(false);

        foreach ($aefi_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['year'], 'color' => '#ff92c9'];
            $columns[] = [$value['year']];;
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Hospitalization Cases AEFI',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    public function hospitalizationsAdr()
    {
        $this->loadModel('Sadrs');
        $total = 0;
        $sadr_stats = $this->Sadrs->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['severity_reason IS ' => 'Hospitalization/Prolonged',])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['year'], 'color' => '#7f7fff'];
            $columns[] = [$value['year']];;
        }

        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Hospitalization Cases ADR',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    public function hospitalizationsSae()
    {
        $this->loadModel('Adrs');
        $total = 0;
        //'amr' =>  $this->Adrs->find('all')->func()->sum('sae_type'),
        $adr_stats = $this->Adrs->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            ->where(['sae_type IS ' => 'Caused or prolonged hospitalization (non-elective).',])
            ->group('year')
            ->hydrate(false);


        foreach ($adr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['year'], 'color' => '#71C7A0'];
            $columns[] = [$value['year']];;
        }

        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Hospitalization Cases SAE',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }


    public function deathsPerYear()
    {
        $this->loadModel('Adrs');
        $this->loadModel('Sadrs');
        $this->loadModel('Aefis');
        $total = 0;
        //'amr' =>  $this->Adrs->find('all')->func()->sum('sae_type'),
        $adr_stats = $this->Adrs->find('all')->select([ //'amr' => 'sae_type',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            ->where(['sae_type IS ' => 'Fatal',])
            //->group('amr')
            ->hydrate(false);
        $sadr_stats = $this->Sadrs->find('all')->select([ //'amr' => 'severity_reason',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['severity_reason IS ' => 'Death',])
            //->group('amr')
            ->hydrate(false);
        $aefi_stats = $this->Aefis->find('all')->select([ //'amr' => 'serious_yes',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['serious_yes IS ' => 'Death'])
            //->group('amr')
            ->hydrate(false);

        foreach ($adr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#71C7A0'];
            $columns[] = ['SAE'];
        }

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#7f7fff'];
            $columns[] = ['ADR'];
        }

        foreach ($aefi_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'color' => '#ff92c9'];
            $columns[] = ['AEFI'];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Death Cases',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }


    public function deathSae()
    {
        $this->loadModel('Adrs');
        $sadr_stats = $this->Adrs->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            ->where(['sae_type' => 'Fatal', 'created IS NOT' => null])
            ->group('year')
            ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['year'], 'color' => '#7f7fff'];
            $columns[] = [$value['year']];
        }

        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Death Cases SAE',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }


    public function deathAdr()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['severity_reason IS ' => 'Death',])
            ->group('year')
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['year'], 'color' => '#7f7fff'];
            $columns[] = [$value['year']];
        }

        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Death Cases ADR',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }


    public function deathAefi()
    {
        $this->loadModel('Aefis');
        $aefi_stats = $this->Aefis->find('all')->select([
            'year' => 'date_format(created,"%Y")',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['serious_yes IS ' => 'Death'])
            ->group('year')
            ->hydrate(false);

        foreach ($aefi_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['year'], 'color' => '#ff92c9'];
            $columns[] = [$value['year']];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Death Cases AEFI',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }


    public function adrPerFacility()
    {
        $this->loadModel('Sadrs');

        function rand_color()
        {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }

        $sadr_stats = $this->Sadrs->find('all')
            ->select([
                'facility_name' => 'facility_name',
                'count' => $this->Sadrs->find('all')->func()->count('distinct facility_name')
            ])
            ->join([
                'table' => 'facilities',
                'alias' => 'f',
                'type' => 'INNER',
                'conditions' => 'f.facility_code = institution_code'
            ])
            ->group('facility_name')
            ->where(['institution_code!="" ', 'institution_code IS NOT' => null])
            ->hydrate(false);

        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['facility_name'], 'color' => rand_color()];
            $columns[] = [$value['facility_name']];
        }
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'ADR by Facilities',
                'data' => $data,
                'columns' => $columns,
                '_serialize' => ['message', 'data', 'columns', 'title']
            ]);
            return;
        }
    }

    public function genderReports()
    {
        $this->loadModel('Adrs');
        $this->loadModel('Sadrs');
        $this->loadModel('Aefis');
        $total_male = 0;
        $total_female = 0;
        $aefi_stats = $this->Aefis->find('all')->select([
            'gender' => 'gender',
            'count' => $this->Aefis->find('all')->func()->count('*')
        ])
            ->where(['gender!="" ', 'gender IS NOT' => null])
            ->group('gender')
            ->hydrate(false);
        foreach ($aefi_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['gender']];
            if ($value['gender'] == "Male") {
                $total_male += $value['count'];
            } else {
                $total_female += $value['count'];
            }
        }

        $adr_stats = $this->Sadrs->find('all')->select([
            'gender' => 'gender',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['gender!="" ', 'gender IS NOT' => null])
            ->group('gender')
            ->hydrate(false);
        foreach ($adr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['gender']];
            if ($value['gender'] == "Male") {
                $total_male += $value['count'];
            } else {
                $total_female += $value['count'];
            }
        }

        $sae_stats = $this->Adrs->find('all')->select([
            'gender' => 'gender',
            'count' => $this->Adrs->find('all')->func()->count('*')
        ])
            ->where(['gender!="" ', 'gender IS NOT' => null])
            ->group('gender')
            ->hydrate(false);
        foreach ($sae_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['gender']];
            if ($value['gender'] == "Male") {
                $total_male += $value['count'];
            } else {
                $total_female += $value['count'];
            }
        }
        $total[] = ['y' => $total_male, 'name' => 'Male'];
        $total[] = ['y' => $total_female, 'name' => 'Female'];
        if ($this->request->is('json')) {
            $this->set([
                'message' => 'Success',
                'title' => 'Gender Demographics',
                //'data' => $data,
                'data' => $total,
                '_serialize' => ['message', 'data', 'title']
            ]);
            return;
        }
    }



    public function ageReports()
    {
        $this->loadModel('Adrs');
        $this->loadModel('Sadrs');
        $this->loadModel('Aefis');

        $total_neonatal = 0;
        $total_infant = 0;
        $total_child = 0;
        $total_adolescent = 0;
        $total_adult = 0;
        $total_elderly = 0;


        $adr_stats = $this->Sadrs->find('all')->select([
            'age_group' => 'age_group',
            'count' => $this->Sadrs->find('all')->func()->count('*')
        ])
            ->where(['age_group!="" ', 'age_group IS NOT' => null])
            ->group('age_group')
            ->hydrate(false);
        foreach ($adr_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'], 'name' => $value['age_group']];
            if ($value['age_group'] == "neonatal") {
                $total_neonatal += $value['count'];
            } elseif ($value['age_group'] == "infant") {
                $total_infant += $value['count'];
            } elseif ($value['age_group'] == "child") {
                $total_child += $value['count'];
            } elseif ($value['age_group'] == "adolescent") {
                $total_adolescent += $value['count'];
            } elseif ($value['age_group'] == "adult") {
                $total_adult += $value['count'];
            } elseif ($value['age_group'] == "elderly") {
                $total_elderly += $value['count'];
            }
        }
        /*
        $aefi_stats = $this->Aefis->find('all')->select([ 'gender' => 'gender',
                                                                  'count' => $this->Aefis->find('all')->func()->count('*')
                                                                ])
                                                        ->where(['gender!="" ','gender IS NOT' => null])
                                                        ->group('gender')
                                                        ->hydrate(false);
                foreach ($aefi_stats->toArray() as $key => $value) {
                    $data[] = ['y' => $value['count'],'name'=> $value['gender']];
                    if($value['gender']=="Male"){
                        $total_male += $value['count'];
                    }else{
                        $total_female += $value['count'];
                    }
                }
        $sae_stats = $this->Adrs->find('all')->select([ 'gender' => 'gender',
                                                          'count' => $this->Adrs->find('all')->func()->count('*')
                                                        ])
                                                ->where(['gender!="" ','gender IS NOT' => null])
                                                ->group('gender')
                                                ->hydrate(false);
        foreach ($sae_stats->toArray() as $key => $value) {
            $data[] = ['y' => $value['count'],'name'=> $value['gender']];
            if($value['gender']=="Male"){
                $total_male += $value['count'];
            }else{
                $total_female += $value['count'];
            }
        }
        */
        $total[] = ['y' => $total_elderly, 'name' => 'elderly'];
        $total[] = ['y' => $total_adult, 'name' => 'adult'];
        $total[] = ['y' => $total_adolescent, 'name' => 'adolescent'];
        $total[] = ['y' => $total_child, 'name' => 'child'];
        $total[] = ['y' => $total_infant, 'name' => 'infant'];
        $total[] = ['y' => $total_neonatal, 'name' => 'adult'];
        if ($this->request->is('json'))
            $this->set([
                'message' => 'Success',
                'title' => 'ADR Age Group Demographics',
                //'data' => $data,
                'data' => $total,
                '_serialize' => ['message', 'data', 'title']
            ]);
        return;
    }
}
