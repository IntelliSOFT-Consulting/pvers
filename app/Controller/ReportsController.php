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

    public function sadrs_by_medicine() {
        $data = $this->Sadr->SadrListOfDrug->find('all', array(
            'fields' => array('SadrListOfDrug.drug_name as drug_name', 'COUNT(distinct SadrListOfDrug.sadr_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('SadrListOfDrug.created >' => '2020-04-01 08:08:08'),
            'group' => array('SadrListOfDrug.drug_name'),
            'having' => array('COUNT(distinct SadrListOfDrug.sadr_id) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_gender() {
        $data = $this->Sadr->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_outcome() {
        $data = $this->Sadr->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_facility() {
        $data = $this->Sadr->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function sadrs_by_county() {
        $data = $this->Sadr->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_month() {
        $data = $this->Sadr->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Sadr.submitted' => array(1, 2)),
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_year() {
        $data = $this->Sadr->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Sadr.submitted' => array(1, 2)),
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

    public function aefis_by_vaccine() {
        $data = $this->Aefi->AefiListOfVaccine->find('all', array(
            'fields' => array('AefiListOfVaccine.vaccine_name as vaccine_name', 'COUNT(distinct AefiListOfVaccine.aefi_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('AefiListOfVaccine.created >' => '2020-04-01 08:08:08'),
            'group' => array('AefiListOfVaccine.vaccine_name'),
            'having' => array('COUNT(distinct AefiListOfVaccine.aefi_id) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_gender() {
        $data = $this->Aefi->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_outcome() {
        $data = $this->Aefi->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_facility() {
        $data = $this->Aefi->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function aefis_by_county() {
        $data = $this->Aefi->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_month() {
        $data = $this->Aefi->find('all', array(
            'fields' => array('monthname(created) as month', 'month(created) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Aefi.submitted' => array(1, 2)),
            'group' => array('monthname(created)'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_year() {
        $data = $this->Aefi->find('all', array(
            'fields' => array('year(created) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Aefi.submitted' => array(1, 2)),
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
    

    public function pqmps_by_facility() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('facility_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('facility_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    

    public function pqmps_by_formulation() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('product_formulation', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('product_formulation'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_brand() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('brand_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('brand_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_generic() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('generic_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('generic_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_manufacturer() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('name_of_manufacturer', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('name_of_manufacturer'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    

    public function pqmps_by_supplier() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('supplier_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('supplier_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function pqmps_by_county() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function pqmps_by_country() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('Country.name', 'COUNT(*) as cnt'),
            'contain' => array('Country'),
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('Country.name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_month() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_year() {
        $data = $this->Pqmp->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Pqmp.submitted' => array(1, 2)),
            'group' => array('year(ifnull(reporter_date, created))'),
            'order' => array('year'),
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

    public function devices_by_brand() {
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
        $data = $this->Device->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Device.submitted' => array(1, 2)),
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_outcome() {
        $data = $this->Device->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Device.submitted' => array(1, 2)),
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_facility() {
        $data = $this->Device->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Device.submitted' => array(1, 2)),
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function devices_by_county() {
        $data = $this->Device->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => array('Device.submitted' => array(1, 2)),
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_month() {
        $data = $this->Device->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Device.submitted' => array(1, 2)),
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_year() {
        $data = $this->Device->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Device.submitted' => array(1, 2)),
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
    

    public function medications_by_gender() {
        $data = $this->Medication->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Medication.submitted' => array(1, 2)),
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_facility() {
        $data = $this->Medication->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Medication.submitted' => array(1, 2)),
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function medications_by_producti() {
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.product_name_i as product_name_i', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('MedicationProduct.created >' => '2020-04-01 08:08:08'),
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
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.generic_name_i as generic_name_i', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('MedicationProduct.created >' => '2020-04-01 08:08:08'),
            'group' => array('MedicationProduct.generic_name_i'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function medications_by_genericii() {
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.generic_name_ii as generic_name_ii', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('MedicationProduct.created >' => '2020-04-01 08:08:08'),
            'group' => array('MedicationProduct.generic_name_ii'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_county() {
        $data = $this->Medication->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => array('Medication.submitted' => array(1, 2)),
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_month() {
        $data = $this->Medication->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Medication.submitted' => array(1, 2)),
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_year() {
        $data = $this->Medication->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Medication.submitted' => array(1, 2)),
            'group' => array('year(ifnull(reporter_date, created))'),
            'order' => array('year'),
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


    public function transfusions_by_gender() {
        $data = $this->Transfusion->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2)),
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    
    public function transfusions_by_county() {
        $data = $this->Transfusion->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => array('Transfusion.submitted' => array(1, 2)),
            'group' => array('County.county_name'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_month() {
        $data = $this->Transfusion->find('all', array(
            'fields' => array('monthname(ifnull(reporter_date, created)) as month', 'month(ifnull(reporter_date, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2)),
            'group' => array('monthname(ifnull(reporter_date, created))'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_year() {
        $data = $this->Transfusion->find('all', array(
            'fields' => array('year(ifnull(reporter_date, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2)),
            'group' => array('year(ifnull(reporter_date, created))'),
            'order' => array('year'),
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

    public function saes_by_month() {
        $data = $this->Sae->find('all', array(
            'fields' => array('monthname(created) as month', 'month(created) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            // 'conditions' => array('Sae.submitted' => array(1, 2)),
            'group' => array('monthname(created)'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_year() {
        $data = $this->Sae->find('all', array(
            'fields' => array('year(created) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            // 'conditions' => array('Sae.submitted' => array(1, 2)),
            'group' => array('year(created)'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        )); 

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
}
