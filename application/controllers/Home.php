<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();		
		// if ($this->session->userdata('logged')<>1) {
		// 	redirect(site_url('auth'));
		// }			
		$this->load->model('mdata1');
		// $this->load->model('OracleModel');
		
	}

	public function index()
	{	
		$data['kosong'] =0;										
		$this->load->view('vmain', $data);	
	}	
	
	public function getdata() {
        //tes
		$id = $this->input->post('inIdpel');
		
        if(empty($id)){
			$data['kosong'] =1;
            $this->load->view('vmain', $data);
        } else {			
			$data['datadil'] = $this->mdata1->get_data($id); 
			$data['datadil1'] = $this->mdata1->get_data1($id); 
			$data['datadil2'] = $this->mdata1->get_data2($id);
			$data['datadil3'] = $this->mdata1->get_data3($id);
			$data['datadil4'] = $this->mdata1->get_data4($id);
			$this->load->view('vmain_get_id', $data);
		}                
    }	

  //   public function getdata1() {
        
		// $id = $this->input->post('inIdpel');
		
  //       if(empty($id)){
		// 	$data['kosong'] =1;
  //           $this->load->view('vmain', $data);
  //       } else {			
		// 	$data['datadil'] = $this->mdata1->get_data1($id); 
		// 	$this->load->view('vmain_get_id', $data);
		// }                
  //   }	

	
	public function save() {
			$res = $this->m_data1->save_data_nontaglis();
			if (!$res) {
				$res['cocok'] = 1;
				$this->load->view('vmain', $res);
			} else if ($res){
				$res['cocok'] = 2;
				$this->load->view('vmain', $res);
			}
			
			
	}       

}

