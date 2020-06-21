<?php
App::uses('AppController', 'Controller');
/**
 * PreviousDates Controller
 *
 * @property PreviousDate $PreviousDate
 */
class ReportsController extends AppController {
    public $uses = array('Sadr', 'Aefi', 'Pqmp', 'Device');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    /**
     * site inspections per month method
     *
     * @return void
    */
    
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

}
