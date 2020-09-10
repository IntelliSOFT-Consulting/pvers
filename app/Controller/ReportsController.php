<?php
App::uses('AppController', 'Controller');
/**
 * PreviousDates Controller
 *
 * @property PreviousDate $PreviousDate
 */
class ReportsController extends AppController {
    public $uses = array('Sadr', 'Aefi', 'Pqmp', 'Device', 'Medication', 'Transfusion', 'Sae');
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
        $data = $this->Sadr->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('sadrs_by_designation');
    }
    
    public function sadrs_by_age() {
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
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('sadrs_by_age');
    }

    public function sadrs_by_seriousness() {
        $data = $this->Sadr->find('all', array(
            'fields' => array('ifnull(Sadr.serious, "No") as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array('ifnull(Sadr.serious, "No")'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_reason() {
        $data = $this->Sadr->find('all', array(
            'fields' => array('serious_reason', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array('serious_reason'),
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
        $data = $this->Aefi->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('aefis_by_designation');
    }

    public function aefis_by_age() {
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
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('aefis_by_age');
    }

    public function aefis_by_seriousness() {
        $data = $this->Aefi->find('all', array(
            'fields' => array('ifnull(Aefi.serious, "No") as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array('ifnull(Aefi.serious, "No")'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_reason() {
        $data = $this->Aefi->find('all', array(
            'fields' => array('serious_yes', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array('serious_yes'),
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
        $data = $this->Pqmp->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('pqmps_by_designation');
    }
    

    /**
     * MEDICAL DEVICES reports methods
     * 
    */
    public function devices_by_designation() {
        $data = $this->Device->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => array('Device.submitted' => array(1, 2)),
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('devices_by_designation');
    }    

    public function devices_by_age() {
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
            'conditions' => array('Device.submitted' => array(1, 2)),
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('devices_by_age');
    }

    public function devices_by_seriousness() {
        $data = $this->Device->find('all', array(
            'fields' => array('Device.serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Device.submitted' => array(1, 2)),
            'group' => array('Device.serious'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_reason() {
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

    /**
     * MEDICATION ERROR reports methods
     * 
    */
    public function medications_by_designation() {
        $data = $this->Medication->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => array('Medication.submitted' => array(1, 2)),
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('medications_by_designation');
    }

    public function medications_by_age() {
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
            'conditions' => array('Medication.submitted' => array(1, 2)),
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('medications_by_age');
    }
    

    /**
     * BLOOD TRANSFUSION reports methods
     * 
    */
    public function transfusions_by_designation() {
        $data = $this->Transfusion->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => array('Transfusion.submitted' => array(1, 2)),
            'group' => array('Designation.name'),
            'having' => array('COUNT(*) >' => 0),
        ));        

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('transfusions_by_designation');
    }
    

    public function transfusions_by_age() {
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
            'conditions' => array('Transfusion.submitted' => array(1, 2)),
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('transfusions_by_age');
    }


    /**
     * SAEs reports methods
     * 
    */
    public function saes_by_age() {
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
            // 'conditions' => array('Sae.submitted' => array(1, 2)),
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('saes_by_age');
    }
}
