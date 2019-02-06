<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frota extends CI_Controller {

        
    
    public function __construct()
        {
                parent::__construct();
                $this->load->model('frota_model');
                $this->load->library('form_validation');
                $this->load->helper('url_helper');
                $this->load->library("pagination");
                $this->load->library('session');
        }

        
        
        public function index()
{       
            $pconfig=array();
            $pconfig["base_url"]= base_url()."frota";
            $pconfig["total_rows"]=$this->frota_model->count_carros();
            $pconfig["per_page"]=20;
            $pconfig["uri_segment"]=2;

            $this->pagination->initialize($pconfig);

            $page = $this->uri->segment(2, 0);

             $data["links"] = $this->pagination->create_links();

            $slug="";
            
            $data['frota'] = $this->frota_model->get_frota($slug,$pconfig["per_page"],$page);
            $data['title'] = 'frota archive';
            $data['pages']=$pconfig["total_rows"];
        
            if($this->session->userdata('Utype')==1){
            $this->load->view('templates/header', $data);
            $this->load->view('frota/index', $data);
            $this->load->view('templates/footer');
            }else  if($this->session->userdata('Utype')==0){
                $this->load->view('templates/header', $data);
                $this->load->view('cliente/index', $data);
                $this->load->view('templates/footer'); 
            }
}


public function search($cage=0)
        {
            $olslug=$this->session->userdata('slug');
            if($cage>0){
                $slug=$olslug;
            }else{
                $slug=$this->input->post('search');
            }
            $pconfig=array();
            $pconfig["base_url"]= base_url()."search";
            $pconfig["total_rows"]=$this->frota_model->count_carros($slug);
            $pconfig["per_page"]=20;
            $pconfig["uri_segment"]=2;
            
            $choice = $pconfig["total_rows"] / $pconfig["per_page"];
            $pconfig["num_links"] = round($choice);

            $this->pagination->initialize($pconfig);

            $page = $cage;

            $data["links"] = $this->pagination->create_links();

            $data['pages']=$pconfig["total_rows"];
            $data['frota_item'] = $this->frota_model->get_frota($slug,$pconfig["per_page"],$page);
            $this->session->slug=$slug;
    
            $data['title'] = 'frota search';
    
            if($this->session->userdata('Utype')==1){
            $this->load->view('templates/header', $data);
            $this->load->view('frota/view', $data);
            $this->load->view('templates/footer');
        }else  if($this->session->userdata('Utype')==0){
            $this->load->view('templates/header', $data);
            $this->load->view('cliente/view', $data);
            $this->load->view('templates/footer'); 
        }
    }


    public function editar($ID){

        $data['modelos'] = $this->frota_model->get_modelos();
        $data['cores'] = $this->frota_model->get_cores();

        $data['carro']=$this->frota_model->get_carro($ID);
        $data['ID']=$ID;

        $this->load->view('templates/header', $data);
        $this->load->view('frota/editar', $data);
        $this->load->view('templates/footer');
    }

    public function editado($ID){

        

        $modelo=$this->input->post('modelo');
        $cor=$this->input->post('cor');
        $disponibilidade=$this->input->post('disponibilidade');
        $matricula=$this->input->post('matricula');

        $data['carro']=$this->frota_model->set_carro($ID,$modelo,$cor,$disponibilidade,$matricula);
        $data['ID']=$ID;
        
        if($data['carro']==false){
            $data['erro']="edição do carro falhou!".$cor."/".$modelo."/".$matricula."/".$disponibilidade;
            $this->load->view('templates/header', $data);
            $this->load->view('frota/fail', $data);
            $this->load->view('templates/footer');
        }else{
        $this->load->view('templates/header', $data);
        $this->load->view('frota/success', $data);
        $this->load->view('templates/footer');
        }
    }


    public function delete($ID){

        $data['carro']=$this->frota_model->get_carro($ID);
        $this->db->delete('automovel', array('id' => $ID));

        $this->load->view('templates/header', $data);
        $this->load->view('frota/success', $data);
        $this->load->view('templates/footer');
    }

       
    
    public function create()
    {

        $modelo=$this->input->post('modelo');
        $cor=$this->input->post('cor');
        $disponibilidade=$this->input->post('disponibilidade');
        $matricula=$this->input->post('matricula');

        $data['modelos'] = $this->frota_model->get_modelos();
        $data['cores'] = $this->frota_model->get_cores();

        $this->form_validation->set_rules('modelo', 'modelo', 'required');
        $this->form_validation->set_rules('cor', 'cor', 'required');
        $this->form_validation->set_rules('matricula', 'matricula', 'required');
        $this->form_validation->set_rules('disponibilidade', 'disponibilidade', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('frota/create', $data);
            $this->load->view('templates/footer');

        }
        else
        {
            $this->load->view('templates/header', $data);
            $data['carro']=$this->frota_model->create_carro($modelo,$cor,$disponibilidade,$matricula);
            $this->load->view ('frota/success',$data);
            $this->load->view('templates/footer');
        }
    }
}