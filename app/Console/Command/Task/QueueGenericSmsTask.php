<?php
/**
 * @author MGriesbach@gmail.com
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link http://github.com/MSeven/cakephp_queue
 */
App::uses('QueueTask', 'Queue.Console/Command/Task');

App::uses('Shell', 'Console');
// App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');

/**
 * A Simple QueueTask example.
 *
 */
class QueueGenericSmsTask extends QueueTask {

/**
 * ZendStudio Codecomplete Hint
 *
 * @var QueuedTask
 */
	public $QueuedTask;

/**
 * Timeout for run, after which the Task is reassigned to a new worker.
 *
 * @var int
 */
	public $timeout = 10;

/**
 * Number of times a failed instance of this task should be restarted before giving up.
 *
 * @var int
 */
	public $retries = 1;

/**
 * Stores any failure messages triggered during run()
 *
 * @var string
 */
	public $failureMessage = '';

/**
 * Example add functionality.
 * Will create one example job in the queue, which later will be executed using run();
 *
 * @return void
 */
	public function add() {
		$this->out('CakePHP Queue Example task.');
		$this->hr();
		$this->out('This is a very simple example of a QueueTask.');
		$this->out('I will now add an example Job into the Queue.');
		$this->out('This job will only produce some console output on the worker that it runs on.');
		$this->out(' ');
		$this->out('To run a Worker use:');
		$this->out('	cake Queue.Queue runworker');
		$this->out(' ');
		$this->out('You can find the sourcecode of this task in: ');
		$this->out(__FILE__);
		$this->out(' ');
		/*
		 * Adding a task of type 'example' with no additionally passed data
		 */
		if ($this->QueuedTask->createJob('Example', null)) {
			$this->out('OK, job created, now run the worker');
		} else {
			$this->err('Could not create Job');
		}
	}

/**
 * Example run function.
 * This function is executed, when a worker is executing a task.
 * The return parameter will determine, if the task will be marked completed, or be requeued.
 *
 * @param array $data The array passed to QueuedTask->createJob()
 * @param int $id The id of the QueuedTask
 * @return bool Success
 */
	public function run($data, $id = null) {
		
		$HttpSocket = new HttpSocket();
        // string data
        $payload = 'username='.Configure::read('africastalking_username').'&to=%2B'.$data['phone'].'&message='.urlencode($data['sms']).'&from='.Configure::read('africastalking_from');
        $this->log($payload, 'debug');
        $results = $HttpSocket->post(
            Configure::read('africastalking_api'),
            $payload,
            array('header' => array('Accept' => 'application/json' ,'Content-Type' => 'application/x-www-form-urlencoded', 'apiKey' => Configure::read('africastalking_key')))
        );
        $this->log($results->body, 'debug');
        if (!$results->isOk()) {
            $body = $results->body;
            $this->log($body, 'generic-sms');
        }   

		return true;
	}
}
