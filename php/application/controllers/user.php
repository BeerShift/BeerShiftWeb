<?php

/**
 * @property UserModel $usermodel
 * 
 */
class User extends CI_Controller {

    public function index() {
        $this->curl->create('http://localhost/api/userbeers');

        $this->curl->post(array(
            'username' => 'gshipley',
        ));

        $result = json_decode($this->curl->execute());
echo "<pre>";
        if (isset($result->status) && $result->status == 'success') {
           // echo 'User has been updated.';
        } else {
            echo 'Something has gone wrong';
        }
        print_r($result);
    }

}
