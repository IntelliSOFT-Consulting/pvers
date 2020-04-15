<?php
class EmailShell extends AppShell {
    public $uses = array('Sadr', 'Pqmp', 'SadrFollowup', 'User', 'Message');

	public function main() {
		$this->Sadr->sendEmail();
		$this->Pqmp->sendEmail();
		$this->SadrFollowup->sendEmail();
        // $this->out('wach nango bwana?');
		// $sadrs = $this->Sadr->find('list', array(
			// 'fields' => array('Sadr.id', 'Sadr.reporter_email'),
			// 'conditions' => array('Sadr.emails' => 0),
			// 'recursive' => -1
		// ));
		// foreach ($sadrs as $key => $val) {
			// $this->out($this->Sadr->sendEmail($key, $val));
		// }
 		// $this->out("finish email send");
   }

   public function sendNewSadrEmail(){
		$this->Sadr->sendEmail();
   }

   public function sendNewPqmpEmail(){
		$this->Pqmp->sendEmail();
   }

   public function sendNewSadrFollowupEmail(){
		$this->SadrFollowup->sendEmail();
   }

   public function sendSubmitEmail() {
        $this->Sadr->sendSubmitEmail();
        $this->Pqmp->sendSubmitEmail();
        $this->SadrFollowup->sendSubmitEmail();
   }

   public function sendSubmitSadrEmail() {
        $this->Sadr->sendSubmitEmail();
   }

   public function sendNotifySadrEmail() {
        $this->Sadr->sendNotifyEmail();
   }

   public function sendSubmitPqmpEmail() {
        $this->Pqmp->sendSubmitEmail();
   }

   public function sendNotifyPqmpEmail() {
        $this->Pqmp->sendNotifyEmail();
   }

   public function sendSubmitSadrFollowupEmail() {
        $this->SadrFollowup->sendSubmitEmail();
   }

   public function sendNotifySadrFollowupEmail() {
        $this->SadrFollowup->sendNotifyEmail();
   }

   public function sendMessages() {
		$this->Message->sendEmail();
   }

   public function sendReports() {
		$this->Message->sendAllReportsEmail();
   }

   public function sendForgotEmail() {
        $this->User->sendForgotEmail();
   }
}
