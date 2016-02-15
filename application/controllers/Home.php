<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();		
        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }			
		$this->load->model('mdata1');
		
    }

	public function index()
	{	
		$data['kosong'] =0;					
		$this->load->view('vmain', $data);	
	}	
	
    public function getdata() {

		$id = $this->input->post('inNoAgenda');
		
        if(empty($id)){
			$data['kosong'] =1;
            $this->load->view('vmain', $data);
        } else {			
			$data['DataNontaglis'] = $this->mdata1->select_data_nontaglis($id);
			$data['DataNontagliss'] = $this->mdata1->select_data_nontagliss($id);
			$data['DataNontaglisss'] = $this->mdata1->select_data_nontaglisss($id);       
			if(empty($data['DataNontaglis'])){		
				$data['kosong'] =1;			
				$this->load->view('vmain', $data);
			} 
			else {	
				$data['kosong'] =0;			
				$this->load->view('vmain_get_nontaglis', $data);						
			}			
		}                
    }		
	
    public function save() {
    	$res = $this->mdata1->save_data_nontaglis();
        if($res){
            redirect('home');
		}else{
			redirect('home');
		}
	}              
        
        
    	
}

