<?php

App::uses('HttpSocket', 'Network/Http');

class SaesShell extends AppShell {
    public $uses = array('Sae');

    public function main() {
        //Get max id in our current table
        $res = $this->Sae->find('first', array('contain' => false, 'fields' => array('Sae.id'), 'order' => array('Sae.id' => 'desc')));
        $HttpSocket = new HttpSocket(
            ['ssl_verify_peer' => false, 'ssl_verify_host' => false, 'ssl_verify_peer_name' => false,]
        );
        // string data
        if(empty($res)) {
            $id = 1;
        } else {
            $id = $res['Sae']['id'];
        }
        $this->out($id);
        $results = $HttpSocket->get(
            'https://ctr.pharmacyboardkenya.org/saes/fetch/'.$id.'.json',
            false,
            array('header' => array('umc-client-key' => '5ab835c4-3179-4590-bcd2-ff3c27d6b8ff'))
        );

        if ($results->isOk()) {
            $this->log('got payload');
            $data = json_decode($results->body, true);
            // $this->log($data['response']['data']);
            $this->Sae->saveMany($data['response']['data'], array('deep' => true));
        } else {
            $this->out('Unable to save!!');
            $this->out($results->body);
        }
    }
}

?>