<?php
/**
* @property UserModel $usermodel
 * 
 */
class UserModel extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function getUser($username) {
        $this->load->library('mongo_db');
        
        $user = $this->mongo_db->get_where('users', array('username' => $username));
        return $user;
    }
    
    function getUserBeers($username) {
        $this->load->library('mongo_db');
        
        $beers = $this->mongo_db->limit(50)->order_by(array('when' => 'DESC'))->get_where('drank', array('username' => $username));
        return $beers;
    }
    
    function getFirehoseBeers() {
        $this->load->library('mongo_db');
        
        $beers = $this->mongo_db->limit(50)->order_by(array('when' => 'DESC'))->get('drank');
        return $beers;
    }
    
    function createUser($username, $password) {
        // First thing we need to do is encrypt the password with our SALT
        $this->load->library('encrypt');
        //$encryptedPassword = $this->encrypt->encode($password);
        
        $this->load->library('mongo_db');
        $user = array('username' => $username,
                'password' => $password);
        
        $this->mongo_db->insert('users', $user);
    }
    
    function drinkBeer($username, $beerName, $when) {
        // First thing we need to do is encrypt the password with our SALT
        $this->load->library('encrypt');
        //$encryptedPassword = $this->encrypt->encode($password);
        
        $this->load->library('mongo_db');
        $user = array('username' => $username,
                'beer' => $beerName,
                'when' => $when);
        
        $this->mongo_db->insert('drank', $user);
    }
    
    
}

?>
