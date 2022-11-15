<?php
App::uses('AppController', 'Controller');
//use HttpSocket
App::uses('HttpSocket', 'Network/Http');
/**
 * AutoDrugs Controller
 *
 * @property AutoDrug $AutoDrug
 * @property PaginatorComponent $Paginator
 */
class AutoDrugsController extends AppController
{

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->AutoDrug->recursive = 0;
		$this->set('autoDrugs', $this->Paginator->paginate());
	}
	public function admin_index()
	{
		$this->AutoDrug->recursive = 0;
		$this->set('autoDrugs', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		if (!$this->AutoDrug->exists($id)) {
			throw new NotFoundException(__('Invalid auto drug'));
		}
		$options = array('conditions' => array('AutoDrug.' . $this->AutoDrug->primaryKey => $id));
		$this->set('autoDrug', $this->AutoDrug->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->AutoDrug->create();
			if ($this->AutoDrug->save($this->request->data)) {
				$this->Flash->success(__('The auto drug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The auto drug could not be saved. Please, try again.'));
			}
		}
	}
	public function admin_add()
	{
		# make api call to get all drugs
		$HttpSocket = new HttpSocket();

		//Request Access Token
		$initiate = $HttpSocket->get(
			'https://umc-ext-dev-apim-01.azure-api.net/global-api/v1/regional-drugs',
			array('header' => array(
				'umc-client-key' => '1f47dbc26c524fbbb8d6f3e2b9244434',
				'umc-license-key' => 801,
				''
			))
		);
		if ($initiate->isOk()) {

			$body = $initiate->body;
			$this->Flash->success($body);
			$this->redirect($this->referer());
		} else {
			$body = $initiate->body;
			$this->Flash->error($body);
			$this->redirect($this->referer());
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null)
	{
		if (!$this->AutoDrug->exists($id)) {
			throw new NotFoundException(__('Invalid auto drug'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AutoDrug->save($this->request->data)) {
				$this->Flash->success(__('The auto drug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The auto drug could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AutoDrug.' . $this->AutoDrug->primaryKey => $id));
			$this->request->data = $this->AutoDrug->find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!$this->AutoDrug->exists($id)) {
			throw new NotFoundException(__('Invalid auto drug'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AutoDrug->delete($id)) {
			$this->Flash->success(__('The auto drug has been deleted.'));
		} else {
			$this->Flash->error(__('The auto drug could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
