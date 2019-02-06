<?php
class login_model extends CI_Model {
    private static $logs=0;


    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function getLogin($user){
        

        $this->db->select('nome,username,email,password,usertype');
        $this->db->from('utilizador');
        $this->db->where('username',$user);
        $logged=$this->db->get();
        return $logged->result_array();
    }
}
