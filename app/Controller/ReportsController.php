<?php

use JetBrains\PhpStorm\Deprecated;

App::uses('AppController', 'Controller');
/**
 * PreviousDates Controller
 *
 * @property PreviousDate $PreviousDate
 */
class ReportsController extends AppController
{
    public $uses = array('Sadr', 'Aefi', 'Pqmp', 'Device', 'Medication', 'Transfusion', 'Sae', 'DrugDictionary');
    public $components = array(
        // 'Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 
        'Search.Prg',
        // 'RequestHandler'
    );
    public $paginate = array();
    public $presetVars = true;
    public $is_mobile = false;

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow(
            'index',
            'summary',
            'sadrs_by_age',
            'sadrs_by_medicine',
            'sadrs_by_gender',
            'sadrs_by_county',
            'sadrs_by_month',
            'sadrs_by_year',
            'aefis_by_age',
            'aefis_by_vaccine',
            'aefis_by_gender',
            'aefis_by_county',
            'aefis_by_month',
            'aefis_by_year',
            'pqmps_by_brand',
            'pqmps_by_generic',
            'pqmps_by_county',
            'pqmps_by_country',
            'pqmps_by_month',
            'pqmps_by_year',
            'devices_by_age',
            'devices_by_brand',
            'devices_by_gender',
            'devices_by_county',
            'devices_by_month',
            'devices_by_year',
            'medications_by_age',
            'medications_by_gender',
            'medications_by_producti',
            'medications_by_productii',
            'medications_by_generici',
            'medications_by_genericii',
            'medications_by_county',
            'medications_by_month',
            'medications_by_year',
            'transfusions_by_age',
            'transfusions_by_gender',
            'transfusions_by_county',
            'transfusions_by_month',
            'transfusions_by_year',
            'saes_by_age',
            'saes_by_month',
            'saes_by_year',
            'saes_by_gender',
            'saes_by_medicine',
            'saes_by_concomittant',
            'landing'
        );
        if ($this->RequestHandler->isMobile()) {
            // $this->layout = 'Emails/html/default';
            $this->is_mobile = true;
        }
        $this->set('is_mobile', $this->is_mobile);
    }



    /**
     * site inspections per month method
     *
     * @return void
     */

    public function landing()
    {
        $vaccine = $this->request->data['Report']['vaccine_name'];
        $this->loadModel('SadrListOfDrug');
        $sadr_ids = $this->SadrListOfDrug->find('list', array(
            'conditions' => array('SadrListOfDrug.drug_name LIKE' => '%' . $vaccine . '%'),
            'fields' => array('SadrListOfDrug.sadr_id')
        ));
        // return unique sadr ids alongside the vaccine name
        $sadr_ids = array_unique($sadr_ids);
        // create an array of reaction and count
        // debug($sadr_ids);
        $data = null;
        $count = 0;
        foreach ($sadr_ids as $key => $value) {
            $count++;
            // get the reaction for each sadr id
            $reaction = $this->Sadr->find('first', array(
                'conditions' => array('Sadr.id' => $value),
                'fields' => array('Sadr.reaction')
            ));
            // get the count of each reaction
            $data[$reaction['Sadr']['reaction']] = $this->Sadr->find('count', array(
                'conditions' => array('Sadr.reaction' => $reaction['Sadr']['reaction'])
            ));
        }
        // $criteria['Sadr.submitted'] = array(2, 3);
        $criteria['Sadr.id'] = $sadr_ids;
        $county = $this->Sadr->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        //    Age Group
        $case = "((case 
    when trim(age_group) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_group
    when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
    when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
    when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
    when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
    when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
    else 'unknown'
   end))";

        $age = $this->Sadr->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // SEX
        $sex = $this->Sadr->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // YEAR
        $year = $this->Sadr->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set('_serialize', 'data');
        $this->Session->write('results', true);
        $this->set(compact('data', 'vaccine', 'count', 'county', 'age','sex','year'));
        $this->set('_serialize', 'data');
    }

    public function index()
    {
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));

        //check if user is logged in
        if ($this->Auth->loggedIn()) {
            $this->set('user', $this->Auth->user());
        } else {
            // check if user has checked the agreement checkbox
            if ($this->request->is('post')) {

                if ($this->request->data['agree'] == 1) {
                    $this->Session->write('agree', true);
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('You must agree to the terms and conditions to access the search function'), 'flash_error');
                }
            }
            // get the agree session variable
            $agree = $this->Session->read('agree');
            if ($agree == true) {
                $this->Session->write('results', false);
                $this->render('landing');
            } else {

                $this->render('public');
            }

            //clear the session variable
            $this->Session->delete('agree');
        }
    }

    /**
     * SADR reports methods
     * 
     */
    public function sadrs_by_reporter()
    {
        // $this->Prg->commonProcess();
        // $criteria = $this->Sadr->parseCriteria($this->passedArgs);
        $criteria['Sadr.submitted'] = array(2, 3);
        $criteria['Sadr.copied !='] = '1';
        $sadrs = $this->Sadr->find(
            'all',
            array('conditions' => $criteria, 'limit' => 1000)
        );

        $this->set('sadrs', $sadrs);
    }

    public function sadrs_by_designation()
    {
        // $criteria['Sadr.start_date'] = $this->request->data['Report']['start_date'];
        // $criteria['Sadr.end_date'] = $this->request->data['Report']['end_date'];
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));


        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('sadrs_by_designation');
    }
    public function summary()
    {

        // Load Data for Counties
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $geo = $this->Sadr->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        //get all the counties in the system without any relation
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));


        // Get All SADRs by Gender
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $sex = $this->Sadr->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // GET SUMMARY BY AGE GROUP
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when trim(age_group) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_group
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $age = $this->Sadr->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));


        $this->set(compact('counties'));
        $this->set(compact('geo'));
        $this->set(compact('sex'));
        $this->set(compact('age'));

        $this->set('_serialize', 'geo', 'counties', 'sex', 'age');
        $this->render('upgrade/summary');
    }
    public function sadrs_by_age()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when trim(age_group) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_group
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Sadr->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('sadrs_by_age');
    }

    public function sadrs_by_seriousness()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('IF(Sadr.serious IS NULL or Sadr.serious = "", "No", Sadr.serious) as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('IF(Sadr.serious IS NULL or Sadr.serious = "", "No", Sadr.serious)'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_reason()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        $criteria['Sadr.serious_reason !='] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('serious_reason', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('serious_reason'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_medicine()
    {
        $criteria['SadrListOfDrug.created >'] = '2020-04-01 08:08:08';
        $criteria['SadrListOfDrug.drug_name >'] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['SadrListOfDrug.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['SadrListOfDrug.sadr_id'] = $this->Sadr->find('list', array('conditions' => array('Sadr.submitted' => '2', 'Sadr.copied !=' => '1', 'Sadr.report_type !=' => 'Followup', 'Sadr.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['SadrListOfDrug.sadr_id'] = $this->Sadr->find('list', array('conditions' => array('Sadr.submitted' => '2', 'Sadr.copied !=' => '1', 'Sadr.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }

        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'SadrListOfDrug.drug_name IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criteria[] = $subQueryExpression;
            // $conditions[] = $subQueryExpression;
            // $this->User->find('all', compact('conditions'));
        }
        $data = $this->Sadr->SadrListOfDrug->find('all', array(
            'fields' => array('SadrListOfDrug.drug_name as drug_name', 'COUNT(distinct SadrListOfDrug.sadr_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('SadrListOfDrug.drug_name'),
            'having' => array('COUNT(distinct SadrListOfDrug.sadr_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_gender()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_outcome()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_facility()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_county()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_month()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") ', 'Sadr.id'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_year()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * AEFI reports methods
     * 
     */
    public function aefis_by_designation()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('aefis_by_designation');
    }

    public function aefis_by_age()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when age_months > 0 and age_months < 1 then 'neonate'
                when age_months < 13 then 'infant'
                when age_months > 13 then 'child'
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Aefi->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('aefis_by_age');
    }

    public function aefis_by_seriousness()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('IF(Aefi.serious IS NULL or Aefi.serious = "", "No", Aefi.serious) as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('IF(Aefi.serious IS NULL or Aefi.serious = "", "No", Aefi.serious)'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_reason()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        $criteria['Aefi.serious_yes !='] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('serious_yes', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('serious_yes'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_vaccine()
    {
        $criteria['Vaccine.id >'] = 0;
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['AefiListOfVaccine.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        else
            $criteria['AefiListOfVaccine.created >'] = '2020-04-01 08:00:00';

        // if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['AefiListOfVaccine.aefi_id'] = $this->Aefi->find('list', array('conditions' => array('Aefi.submitted' => '2', 'Aefi.copied !=' => '1', 'Aefi.report_type !=' => 'Followup', 'Aefi.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['AefiListOfVaccine.aefi_id'] = $this->Aefi->find('list', array('conditions' => array('Aefi.submitted' => '2', 'Aefi.copied !=' => '1', 'Aefi.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Aefi->AefiListOfVaccine->find('all', array(
            'fields' => array('Vaccine.vaccine_name as vaccine_name', 'COUNT(distinct AefiListOfVaccine.aefi_id) as cnt'),
            'contain' => array('Vaccine'), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('Vaccine.vaccine_name', 'Vaccine.id'),
            'having' => array('COUNT(distinct AefiListOfVaccine.aefi_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_gender()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_outcome()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_facility()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_county()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_month()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y") as month', 'month(created) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(created)', 'Aefi.id'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_year()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('year(created) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(created)'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * PQHPT reports methods
     * 
     */
    public function pqmps_by_designation()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('pqmps_by_designation');
    }


    public function pqmps_by_facility()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('facility_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('facility_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function pqmps_by_formulation()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('product_formulation', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('product_formulation'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_brand()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('brand_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('brand_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_generic()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'Pqmp.generic_name IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criteria[] = $subQueryExpression;
            // $conditions[] = $subQueryExpression;
            // $this->User->find('all', compact('conditions'));
        }
        $data = $this->Pqmp->find('all', array(
            'fields' => array('generic_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('generic_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_manufacturer()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('name_of_manufacturer', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_manufacturer'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function pqmps_by_supplier()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('supplier_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('supplier_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_county()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_country()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('Country.name', 'COUNT(*) as cnt'),
            'contain' => array('Country'),
            'conditions' => $criteria,
            'group' => array('Country.name', 'Country.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_month()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") ', 'Pqmp.id'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_year()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_category()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when medicinal_product = 1 then 'Medicinal Product'
                when blood_products = 1 then 'Blood and blood products'
                when herbal_product = 1 then 'Herbal product'
                when medical_device = 1 then 'Medical device'
                when product_vaccine = 1 then 'Vaccine'
                when cosmeceuticals = 1 then 'Cosmeceuticals'
                else 'Others'
               end))";

        $data = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as category', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_complaint()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when colour_change = 1 then 'Colour change'
                when separating = 1 then 'Separating'
                when powdering = 1 then 'Powdering'
                when caking = 1 then 'Caking'
                when moulding = 1 then 'Moulding'
                when odour_change = 1 then 'Odour change'
                when mislabeling = 1 then 'Mislabeling'
                when incomplete_pack = 1 then 'Incomplete pack'
                when therapeutic_ineffectiveness = 1 then 'Therapeutic ineffectiveness'
                when particulate_matter = 1 then 'Particulate matter'
                else 'Others'
               end))";

        $data = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as complaint', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_device()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        $criteria['(Pqmp.packaging + Pqmp.labelling + Pqmp.sampling + Pqmp.mechanism + Pqmp.electrical + Pqmp.device_data + Pqmp.software + Pqmp.environmental + Pqmp.failure_to_calibrate + Pqmp.results + Pqmp.readings) > '] = 0;
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when packaging = 1 then 'Packaging'
                when labelling = 1 then 'Labelling'
                when sampling = 1 then 'Sampling'
                when mechanism = 1 then 'Mechanism'
                when electrical = 1 then 'Electrical'
                when device_data = 1 then 'Data'
                when software = 1 then 'Software'
                when environmental = 1 then 'Environmental'
                when failure_to_calibrate = 1 then 'Failure to calibrate'
                when results = 1 then 'Results'
                when readings = 1 then 'Readings'
                else 'N/A'
               end))";

        $data = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as device', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * MEDICAL DEVICES reports methods
     * 
     */
    public function devices_by_designation()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('devices_by_designation');
    }

    public function devices_by_age()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when age_years > 0 and age_years < 1 then 'infant'
                when age_years > 1 then 'child'
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Device->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('devices_by_age');
    }

    public function devices_by_seriousness()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('Device.serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('Device.serious'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_reason()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('serious_yes', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('submitted' => array(1, 2)),
            'group' => array('serious_yes'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_brand()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->ListOfDevice->find('all', array(
            'fields' => array('ListOfDevice.brand_name as brand_name', 'COUNT(distinct ListOfDevice.device_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('ListOfDevice.created >' => '2020-04-01 08:08:08'),
            'group' => array('ListOfDevice.brand_name'),
            'having' => array('COUNT(distinct ListOfDevice.device_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_gender()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_outcome()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_facility()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_county()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_month()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") '),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_year()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * MEDICATION ERROR reports methods
     * 
     */
    public function medications_by_designation()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('medications_by_designation');
    }

    public function medications_by_age()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when age_years > 0 and age_years < 1 then 'infant'
                when age_years > 1 then 'child'
                when year(now()) - year(date_of_birth) between 0 and 1 then 'infant'
                when year(now()) - year(date_of_birth) between 1 and 10 then 'child'
                when year(now()) - year(date_of_birth) between 18 and 65 then 'adult'
                when year(now()) - year(date_of_birth) between 10 and 18 then 'adolescent'
                when year(now()) - year(date_of_birth) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Medication->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('medications_by_age');
    }


    public function medications_by_gender()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_facility()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_process()
    {
        //TODO: add process_occur_specify
        // $criteria['Medication.submitted'] = array(1, 2);
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('process_occur', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('process_occur'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_producti()
    {

        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['MedicationProduct.product_name_i >'] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        // if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.product_name_i as product_name_i', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('MedicationProduct.product_name_i'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_productii()
    {
        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['MedicationProduct.product_name_ii >'] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));

        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.product_name_ii as product_name_ii', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('MedicationProduct.product_name_ii'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_generici()
    {
        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['MedicationProduct.generic_name_i >'] = '';
        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'MedicationProduct.generic_name_i IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criteria[] = $subQueryExpression;
        }

        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.generic_name_i as generic_name_i', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('MedicationProduct.generic_name_i'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_genericii()
    {
        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['MedicationProduct.generic_name_ii >'] = '';
        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'MedicationProduct.generic_name_ii IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criteria[] = $subQueryExpression;
        }

        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.generic_name_ii as generic_name_ii', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('MedicationProduct.generic_name_ii'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_county()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_month()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") '),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_year()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_error()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when outcome in ('Potential error, circumstances/events have potential to cause incident') then 'NO ERROR'
                when outcome in ('Treatment /intervention required-caused temporary harm', 'Initial/prolonged hospitalization-caused temporary harm', 'Caused permanent harm', 'Near death event') then 'ERROR, HARM'
                when outcome in ('Actual error-did not reach patient', 'Actual error-caused no harm', 'Additional monitoring required-caused no harm') then 'ERROR, NO HARM'
                when outcome in ('Death') then 'ERROR, DEATH'
                else 'N/A'
               end))";

        $data = $this->Medication->find('all', array(
            'fields' => array($case . ' as error', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_factors()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when error_cause_inexperience = 1 or error_cause_knowledge = 1 or error_cause_distraction = 1 then 'Staff factors'
                when error_cause_medication = 1 or error_cause_packaging = 1 or error_cause_sound = 1 then 'Medication related'
                when error_cause_workload = 1 or error_cause_peak = 1 or error_cause_stock = 1 then 'Work and environment'
                when error_cause_procedure = 1 or error_cause_abbreviations = 1 or error_cause_illegible = 1 or error_cause_inaccurate = 1 or error_cause_labelling = 1 or error_cause_computer = 1 or error_cause_other = 1  then 'Task and technology'
                else 'N/A'
               end))";

        $data = $this->Medication->find('all', array(
            'fields' => array($case . ' as factor', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * BLOOD TRANSFUSION reports methods
     * 
     */
    public function transfusions_by_designation()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('transfusions_by_designation');
    }

    public function transfusions_by_age()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when age_years > 0 and age_years < 1 then 'infant'
                when age_years > 1 then 'child'
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Transfusion->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('transfusions_by_age');
    }


    public function transfusions_by_gender()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_reaction()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('adverse_reaction', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('adverse_reaction'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_county()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_month()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") '),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_year()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function transfusions_by_rtype()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when reaction_fever is not null then 'Fever'
                when reaction_chills is not null then 'Chills/Rigors'
                when reaction_flushing is not null then 'Flushing'
                when reaction_vomiting is not null then 'Nausea/Vomiting'
                when reaction_dermatological is not null then reaction_dermatological
                when reaction_chest is not null then 'Chest pain'
                when reaction_dyspnoea is not null then 'Dyspnoea'
                when reaction_hypotension is not null then 'Hypotension'
                when reaction_tachycardia is not null then 'Tachycardia'
                when reaction_dark is not null then 'Haemoglobinuria- Dark urine'
                when reaction_oliguria is not null then 'Oliguria'
                when reaction_anuria is not null then 'Anuria'
                when reaction_haematological is not null then 'Unexplained bleeding'
                when reaction_other is not null then 'Others'
                else 'N/A'
               end))";

        $data = $this->Transfusion->find('all', array(
            'fields' => array($case . ' as rtype', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function transfusions_by_ptransfusion()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('previous_transfusion', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2), 'Transfusion.previous_transfusion !=' => ''),
            'group' => array('previous_transfusion'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function transfusions_by_preaction()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('previous_reactions', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2), 'Transfusion.previous_reactions !=' => ''),
            'group' => array('previous_reactions'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    /**
     * SAEs reports methods
     * 
     */
    public function saes_by_age()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $case = "((case 
                when age_years > 0 and age_years < 1 then 'infant'
                when age_years > 1 then 'child'
                when year(now()) - year(date_of_birth) between 0 and 1 then 'infant'
                when year(now()) - year(date_of_birth) between 1 and 10 then 'child'
                when year(now()) - year(date_of_birth) between 18 and 65 then 'adult'
                when year(now()) - year(date_of_birth) between 10 and 18 then 'adolescent'
                when year(now()) - year(date_of_birth) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Sae->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('saes_by_age');
    }

    public function saes_by_month()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('monthname(created) as month', 'month(created) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(created)'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_year()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('year(created) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(created)'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_outcome()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $case = "((case 
                when patient_died = 1 then 'Patient died'
                when prolonged_hospitalization = 1 then 'Prolonged hospitalization'
                when incapacity = 1 then 'Significant disability'
                when life_threatening = 1 then 'Life threatening'
                else 'Other'
               end))";

        $data = $this->Sae->find('all', array(
            'fields' => array($case . ' as outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_causality()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('causality', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'group' => array('causality'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_gender()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_manufacturer()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('manufacturer_name as manufacturer', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'group' => array('manufacturer_name'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_application()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('application_id as application', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'group' => array('application_id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_medicine()
    {
        $data = $this->Sae->SuspectedDrug->find('all', array(
            'fields' => array('SuspectedDrug.generic_name as generic_name', 'COUNT(distinct SuspectedDrug.sae_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            // 'conditions' => array('SuspectedDrug.created >' => '2020-04-01 08:08:08'),
            'group' => array('SuspectedDrug.generic_name'),
            'having' => array('COUNT(distinct SuspectedDrug.sae_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_concomittant()
    {
        $data = $this->Sae->ConcomittantDrug->find('all', array(
            'fields' => array('ConcomittantDrug.generic_name as generic_name', 'COUNT(distinct ConcomittantDrug.sae_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            // 'conditions' => array('ConcomittantDrug.created >' => '2020-04-01 08:08:08'),
            'group' => array('ConcomittantDrug.generic_name'),
            'having' => array('COUNT(distinct ConcomittantDrug.sae_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function agreenment()
    {


        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
}
