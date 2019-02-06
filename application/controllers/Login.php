<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            $this->load->model('login_model');
            $this->load->library('session');
            $this->load->library('email');
    }

    public function index(){

        $this->load->view('templates/header');
        $this->load->view('session/signIn');
        $this->load->view('templates/footer');
    }

    public function logging(){

        $username=$this->input->post('user');
        $pass=$this->input->post('pass');

        $userlogged=$this->login_model->getLogin($username);
        $data['user']=$pass;

        if($userlogged!=null){

        if(password_verify($pass,$userlogged[0]['password'])){
            $this->session->UID=$userlogged[0]['username'];
            $this->session->Utype=$userlogged[0]['usertype'];
            
            
            $this->load->view('templates/header',$data);
            $this->load->view('pages/home',$data);
            $this->load->view('templates/footer');
            return;
    
            
        }else{
        $data['error']="password errada";
        $this->load->view('templates/header',$data);
        $this->load->view('session/signIn',$data);
        $this->load->view('templates/footer');
        return;
    
        }
        
        }else{
            $data['error']="user errado";
            $this->load->view('templates/header',$data);
            $this->load->view('session/signIn',$data);
            $this->load->view('templates/footer');
            return;
        }

        
    }

    public function mail(){
        $this->load->helper('email');

        $email=$this->input->post('email');
        $title=$this->input->post('title');
        $msg=$this->input->post('text');

        if(valid_email($email)){
             $data['sent']=send_email($email,$title,$msg);
            $this->load->view('templates/header');
            $this->load->view('frota/success',$data);
            $this->load->view('templates/footer');
        }else{
            $data['error']="O email não existe";
            $this->load->view('templates/header');
            $this->load->view('pages/contact',$data);
            $this->load->view('templates/footer');
        }
    }

        public function profile(){

            $userlogged=$this->login_model->getLogin($this->session->userdata('UID'));
            $data['user']=$userlogged[0];

            $this->load->view('templates/header');
            $this->load->view('session/profile',$data);
            $this->load->view('templates/footer');
    }

    public function logout(){

        $this->session->unset_userdata(array('UID','Utype'));
        $this->session->sess_destroy();

        $this->load->view('templates/header');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
    }

}