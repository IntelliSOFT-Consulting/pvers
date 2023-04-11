<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

/**
 * Saes Controller
 *
 * @property Sae $Sae
 */
class SaesController extends AppController {
    public $paginate = array();
    public $components = array('Search.Prg');
    public $presetVars = true; // using the model configuration

    
    public function manager_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Sae->parseCriteria($this->passedArgs);
        if (!isset($this->passedArgs['approved'])) $criteria['Sae.approved'] = array(0, 1, 2);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sae.created' => 'desc');
        $this->paginate['contain'] = array('SuspectedDrug', 'ConcomittantDrug');
        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Sae->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export

        $this->set('page_options', $page_options);
        $this->set('saes', Sanitize::clean($this->paginate(), array('encode' => false)));
    }
    public function reviewer_index()
    {
        # code...
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Sae->parseCriteria($this->passedArgs);
        if (!isset($this->passedArgs['approved'])) $criteria['Sae.approved'] = array(0, 1, 2);
        $criteria['Sae.assigned_to'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sae.created' => 'desc');
        $this->paginate['contain'] = array('SuspectedDrug', 'ConcomittantDrug');
        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Sae->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export

        $this->set('page_options', $page_options);
        $this->set('saes', Sanitize::clean($this->paginate(), array('encode' => false)));
    }
    private function csv_export($csaes = ''){
        $this->response->download('SAEs_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->set(compact('csaes'));
        $this->layout = false;
        $this->render('csv_export');
    }

    public function manager_view($id = null) {
        $this->Sae->id = $id;
        if (!$this->Sae->exists()) {
            throw new NotFoundException(__('Invalid sae'));
        }
        $sae = $this->Sae->read(null, $id);
        if ($sae['Sae']['approved'] < 1) {
            $this->Session->setFlash(__('The sae has not been submitted'), 'alerts/flash_info');
        }

        $this->set('sae', $this->Sae->find('first', array(
            'contain' => array('SuspectedDrug', 'SuspectedDrug.Route', 'ConcomittantDrug', 'ConcomittantDrug.Route'),
            'conditions' => array('Sae.id' => $id)
            )
        ));
        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SAE_' . $id .'.pdf',  'orientation' => 'portrait');
        }
    }
}
