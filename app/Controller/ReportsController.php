<?php
App::uses('AppController', 'Controller');
/**
 * PreviousDates Controller
 *
 * @property PreviousDate $PreviousDate
 */
class ReportsController extends AppController {
    public $uses = array('Sadr', 'Aefi', 'Pqmp', 'Device', 'Medication', 'Transfusion', 'Sae', 'DrugDictionary');
    public $components = array(
            // 'Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 
            'Search.Prg', 
            // 'RequestHandler'
            );
    public $paginate = array();
    public $presetVars = true;

    public function beforeFilter() {
        parent::beforeFilter();
        // $this->Auth->allow();
    }

    /**
     * site inspections per month method
     *
     * @return void
    */

    public function index() {

    }

    /**
     * SADR reports methods
     * 
    */
    public function sadrs_by_reporter(){
        // $this->Prg->commonProcess();
        // $criteria = $this->Sadr->parseCriteria($this->passedArgs);
        $criteria['Sadr.submitted'] = array(2, 3);
        $criteria['Sadr.copied !='] = '1';
        $sadrs = $this->Sadr->find('all', 
                  array('conditions' => $criteria, 'limit' => 1000)
            );
                
        $this->set('sadrs', $sadrs);
    }
    
    public function sadrs_by_designation() {
        // $criteria['Sadr.start_date'] = $this->request->data['Report']['start_date'];
        // $criteria['Sadr.end_date'] = $this->request->data['Report']['end_date'];
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('sadrs_by_designation');
    }
    
    public function sadrs_by_age() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
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
            'fields' => array($case.' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('sadrs_by_age');
    }

    public function sadrs_by_seriousness() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('ifnull(Sadr.serious, "No") as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('ifnull(Sadr.serious, "No")'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_reason() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
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

    public function sadrs_by_medicine() {
        $criteria['SadrListOfDrug.created >'] = '2020-04-01 08:08:08';
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['SadrListOfDrug.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        // if($this->Auth->User('user_type') == 'Public Health Program') $criteria['SadrListOfDrug.drug_name'] = $this->Auth->User('health_program');
        if($this->Auth->User('user_type') == 'Public Health Program') {
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

    public function sadrs_by_gender() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
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

    public function sadrs_by_outcome() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
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

    public function sadrs_by_facility() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
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
    
    public function sadrs_by_county() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_month() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_year() {
        $criteria['Sadr.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(reporter_date, created))'),
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
    public function aefis_by_designation() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('aefis_by_designation');
    }

    public function aefis_by_age() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
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
            'fields' => array($case.' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('aefis_by_age');
    }

    public function aefis_by_seriousness() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('ifnull(Aefi.serious, "No") as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('ifnull(Aefi.serious, "No")'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_reason() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
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

    public function aefis_by_vaccine() {
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['AefiListOfVaccine.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        else 
            $criteria['AefiListOfVaccine.created'] = '2020-04-01 08:00:00';
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->AefiListOfVaccine->find('all', array(
            'fields' => array('AefiListOfVaccine.vaccine_name as vaccine_name', 'COUNT(distinct AefiListOfVaccine.aefi_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('AefiListOfVaccine.vaccine_name'),
            'having' => array('COUNT(distinct AefiListOfVaccine.aefi_id) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_gender() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
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

    public function aefis_by_outcome() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
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

    public function aefis_by_facility() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
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
    
    public function aefis_by_county() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_month() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
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

    public function aefis_by_year() {
        $criteria['Aefi.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
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
     * PQMP reports methods
     * 
    */
    public function pqmps_by_designation() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('pqmps_by_designation');
    }
    

    public function pqmps_by_facility() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
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
    

    public function pqmps_by_formulation() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
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

    public function pqmps_by_brand() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
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

    public function pqmps_by_generic() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        if($this->Auth->User('user_type') == 'Public Health Program') {
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

    public function pqmps_by_manufacturer() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
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
    

    public function pqmps_by_supplier() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
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
    
    public function pqmps_by_county() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function pqmps_by_country() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('Country.name', 'COUNT(*) as cnt'),
            'contain' => array('Country'),
            'conditions' => $criteria,
            'group' => array('Country.name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_month() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_year() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(reporter_date, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function pqmps_by_category() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
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
            'fields' => array($case.' as category', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_complaint() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
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
            'fields' => array($case.' as complaint', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_device() {
        $criteria['Pqmp.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Pqmp.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
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
            'fields' => array($case.' as device', 'COUNT(*) as cnt'),
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
    public function devices_by_designation() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('devices_by_designation');
    }    

    public function devices_by_age() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
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
            'fields' => array($case.' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('devices_by_age');
    }

    public function devices_by_seriousness() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
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

    public function devices_by_reason() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
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

    public function devices_by_brand() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
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

    public function devices_by_gender() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
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

    public function devices_by_outcome() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
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

    public function devices_by_facility() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
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
    
    public function devices_by_county() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
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

    public function devices_by_month() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_year() {
        $criteria['Device.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Device.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(reporter_date, created))'),
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
    public function medications_by_designation() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('medications_by_designation');
    }

    public function medications_by_age() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
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
            'fields' => array($case.' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('medications_by_age');
    }
    

    public function medications_by_gender() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
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

    public function medications_by_facility() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
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

    public function medications_by_process() {
        //TODO: add process_occur_specify
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
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
    
    public function medications_by_producti() {

        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
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
    
    public function medications_by_productii() {
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.product_name_ii as product_name_ii', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('MedicationProduct.created >' => '2020-04-01 08:08:08'),
            'group' => array('MedicationProduct.product_name_ii'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function medications_by_generici() {
        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        if($this->Auth->User('user_type') == 'Public Health Program') {
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
    
    public function medications_by_genericii() {
        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        if($this->Auth->User('user_type') == 'Public Health Program') {
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

    public function medications_by_county() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_month() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_year() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(reporter_date, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_error() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when outcome in ('Potential error, circumstances/events have potential to cause incident') then 'NO ERROR'
                when outcome in ('Treatment /intervention required-caused temporary harm', 'Initial/prolonged hospitalization-caused temporary harm', 'Caused permanent harm', 'Near death event') then 'ERROR, HARM'
                when outcome in ('Actual error-did not reach patient', 'Actual error-caused no harm', 'Additional monitoring required-caused no harm') then 'ERROR, NO HARM'
                when outcome in ('Death') then 'ERROR, DEATH'
                else 'N/A'
               end))";

        $data = $this->Medication->find('all', array(
            'fields' => array($case.' as error', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_factors() {
        $criteria['Medication.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Medication.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when error_cause_inexperience = 1 or error_cause_knowledge = 1 or error_cause_distraction = 1 then 'Staff factors'
                when error_cause_medication = 1 or error_cause_packaging = 1 or error_cause_sound = 1 then 'Medication related'
                when error_cause_workload = 1 or error_cause_peak = 1 or error_cause_stock = 1 then 'Work and environment'
                when error_cause_procedure = 1 or error_cause_abbreviations = 1 or error_cause_illegible = 1 or error_cause_inaccurate = 1 or error_cause_labelling = 1 or error_cause_computer = 1 or error_cause_other = 1  then 'Task and technology'
                else 'N/A'
               end))";

        $data = $this->Medication->find('all', array(
            'fields' => array($case.' as factor', 'COUNT(*) as cnt'),
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
    public function transfusions_by_designation() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('transfusions_by_designation');
    }
    
    public function transfusions_by_age() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
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
            'fields' => array($case.' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('transfusions_by_age');
    }


    public function transfusions_by_gender() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
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

    public function transfusions_by_reaction() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
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
    
    public function transfusions_by_county() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_month() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_year() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(reporter_date, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function transfusions_by_rtype() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when reaction_general is not null then 'General'
                when reaction_dermatological is not null then 'Dermatological'
                when reaction_cardiac is not null then 'Cardiac'
                when reaction_renal is not null then 'Renal'
                when reaction_haematological is not null then 'Haematological'
                when reaction_other is not null then 'Others'
                else 'N/A'
               end))";

        $data = $this->Transfusion->find('all', array(
            'fields' => array($case.' as rtype', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function transfusions_by_ptransfusion() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
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


    public function transfusions_by_preaction() {
        $criteria['Transfusion.submitted'] = array(1, 2);
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Transfusion.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
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
    public function saes_by_age() {
        $criteria = array();
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
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
            'fields' => array($case.' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('saes_by_age');
    }

    public function saes_by_month() {
        $criteria = array();
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
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

    public function saes_by_year() {
        $criteria = array();
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
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

    public function saes_by_outcome() {
        $criteria = array();
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
                $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $case = "((case 
                when patient_died = 1 then 'Patient died'
                when prolonged_hospitalization = 1 then 'Prolonged hospitalization'
                when incapacity = 1 then 'Significant disability'
                when life_threatening = 1 then 'Life threatening'
                else 'Other'
               end))";

        $data = $this->Sae->find('all', array(
            'fields' => array($case.' as outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_causality() {
        $criteria = array();
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
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

    public function saes_by_gender() {
        $criteria = array();
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
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

    public function saes_by_manufacturer() {
        $criteria = array();
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
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

    public function saes_by_application() {
        $criteria = array();
        if(!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) 
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

    public function saes_by_medicine() {
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

    public function saes_by_concomittant() {
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
}
