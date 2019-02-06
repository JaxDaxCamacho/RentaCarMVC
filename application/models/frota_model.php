<?php
class frota_model extends CI_Model {

        public function __construct(){
                $this->load->database();
        }


        public function count_carros($slug=null){
                if($slug!=null){
                        $this->db->select('automovel.id,automovel.disponibilidade,automovel.matricula,cor.nome "cor",modelo.nome "modelo",fabricante.nome "fabricante"');
                        $this->db->from('automovel');
                        $this->db->join('modelo', 'modelo.id = automovel.modelo_id');
                        $this->db->join('cor', 'cor.id = automovel.cor_id');
                        $this->db->join('fabricante', 'fabricante.id = modelo.fabricante_id');
                        $this->db->like('cor.nome',$slug);
                        $this->db->or_like('modelo.nome',$slug);
                        $this->db->or_like('fabricante.nome',$slug);
                        $this->db->or_like('automovel.matricula',$slug);
                        return $this->db->count_all_results();
                }else{
                return $this->db->count_all('automovel');
                }
        }

        public function get_modelos(){
                $this->db->select('nome');
                $this->db->from('modelo');
                $modelos=$this->db->get();
                return $modelos->result_array();
        }

        public function get_cores(){
                $this->db->select('nome');
                $this->db->from('cor');
                $cores=$this->db->get();
                return $cores->result_array();
        }


        public function get_frota($slug = "",$limit,$start){
        
        $this->db->limit($limit,$start);

        $this->db->select('automovel.id,automovel.disponibilidade,automovel.matricula,cor.nome "cor",cor.id "cor.id",modelo.nome "modelo",modelo.id "modelo.id",fabricante.nome "fabricante"');
        $this->db->from('automovel');
        $this->db->join('modelo', 'modelo.id = automovel.modelo_id');
        $this->db->join('cor', 'cor.id = automovel.cor_id');
        $this->db->join('fabricante', 'fabricante.id = modelo.fabricante_id');
        $this->db->like('cor.nome',$slug);
        $this->db->or_like('modelo.nome',$slug);
        $this->db->or_like('fabricante.nome',$slug);
        $this->db->or_like('automovel.matricula',$slug);
        $query = $this->db->get();

        return $query->result_array();
        
        }

        public function get_carro($id){

                $this->db->select('automovel.id,automovel.disponibilidade,automovel.matricula,cor.nome "cor",cor.id "cor.id",modelo.nome "modelo",modelo.id "modelo.id",fabricante.nome "fabricante"');
                $this->db->from('automovel');
                $this->db->join('modelo', 'modelo.id = automovel.modelo_id');
                $this->db->join('cor', 'cor.id = automovel.cor_id');
                $this->db->join('fabricante', 'fabricante.id = modelo.fabricante_id');
                $this->db->where('automovel.id',$id);
                $query=$this->db->get();

                return $query->result_array();
        }

        public function set_carro($ID,$modelo,$cor,$disponibilidade,$matricula){


                // $this->db->select('id');
                // $this->db->from('modelo');
                // $this->db->where('modelo.nome',$modelo);
                // $modeloid=$this->db->get();
                // $modeloid=$modeloid->result_array();

                // $this->db->select('id');
                // $this->db->from('cor');
                // $this->db->where('cor.nome',$cor);
                // $corid=$this->db->get();
                // $corid=$corid->result_array();

                $corid=$cor;
                $modeloid=$modelo;
                
                if($modeloid!=null || $corid!=null){
                $data = array(
                        // 'modelo_id' =>$modeloid[0]['id'],
                        // 'cor_id' =>$corid[0]['id'],
                        'modelo_id' =>$modeloid,
                        'cor_id' =>$corid,
                        'disponibilidade' =>$disponibilidade,
                        'matricula' =>$matricula 
                );
                
                $this->db->set($data);
                $this->db->where('automovel.id',$ID);
                $this->db->update('automovel');
                return true;
                }else{
                       return false; 
                }
        }

        public function create_carro($modelo,$cor,$disponibilidade,$matricula){


                $data = array(
                        'modelo_id' =>$modelo,
                        'cor_id' =>$cor,
                        'disponibilidade' =>$disponibilidade,
                        'matricula' =>$matricula 
                );
                
                $this->db->insert('automovel',$data);
                return(array($modelo,$cor));
        }


}
