<?php

require(APPPATH . '/libraries/REST_Controller.php');

class Api extends REST_Controller {

    function user_get() {
        if (!$this->get('username')) {
            $this->response(NULL, 400);
        }
        $user = $this->usermodel->getUser($this->get('username'));

        if ($user) {
            $this->response($user, 200); // 200 being the HTTP response code
        } else {
            $this->response(NULL, 404);
        }
    }

    function user_post() {
        if (!$this->post('username')) {
            $this->response(NULL, 400);
        }
        if (!$this->post('password')) {
            $this->response(NULL, 400);
        }

        $result = $this->usermodel->createUser($this->post('username'), $this->post('password'));

        if ($result === FALSE) {
            $this->response(array('status' => 'failed'));
        } else {
            $this->response(array('status' => 'success'));
        }
    }
    
    function userbeers_get() {
        if (!$this->get('username')) {
            $this->response(NULL, 400);
        }
        $user = $this->usermodel->getUserBeers($this->get('username'));

        if ($user) {
            $this->response($user, 200); // 200 being the HTTP response code
        } else {
            $this->response(NULL, 404);
        }
    }
    
    function firehose_get() {
        
        $beers = $this->usermodel->getFirehoseBeers();

        if ($beers) {
            $this->response($beers, 200); // 200 being the HTTP response code
        } else {
            $this->response(NULL, 404);
        }
    }
    
    function beers_get() {
        if (!$this->get('name')) {
            $this->response(NULL, 400);
        }
        
        $this->load->library('curl');
        $this->curl->create('http://api.playground.brewerydb.com/search/');
        $this->curl->post(array(
            'key' => 'A1029384756B',
            'q' => $this->get('name'),
            'type' => 'beer'
    ));

        $beers = json_decode($this->curl->execute());
        if (isset($beers->status) && $beers->status == 'success') {
           // echo 'User has been updated.';
        } else {
            echo 'Something has gone wrong';
        }
        
        
        if ($beers) {
            $this->response($beers, 200); // 200 being the HTTP response code
        } else {
            $this->response(NULL, 404);
        }
    }
    
    function beers_post() {
        if (!$this->post('username')) {
            $this->response(NULL, 400);
        }
        if (!$this->post('beerName')) {
            $this->response(NULL, 400);
        }
        if (!$this->post('when')) {
            $this->response(NULL, 400);
        }

        $result = $this->usermodel->drinkBeer($this->post('username'), $this->post('beerName'), $this->post('when'));

        if ($result === FALSE) {
            $this->response(array('status' => 'failed'));
        } else {
            $this->response(array('status' => 'success'));
        }
    }

}

?>
