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

    
    	

    public function insert_data(){
    	$DATA['P_IDPEL'] = $this->input->post('idpel');
        $DATA['P_TARIF'] = $this->input->post('iintarif');
        $DATA['P_KDPT ']= $this->input->post('iinKDPT');
        $DATA['P_KDPT_2'] = $this->input->post('iinKDPT2');
        $DATA['PLOGIN'] = $this->input->post('user');
        $DATA['PNO_TIKET'] = $this->input->post('inNotiket');
        $DATA['PJNS_TRANS'] = $this->input->post('pjns');


        $res = $this->mdata1->simpan($DATA);
    //     // $res['datapdl'] = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }


    //  public function insert_pdl(){
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}

public function insert_data_pdl(){
        $DATA['P_THBLMUT'] = $this->input->post('iinTHBLMUT');
        $DATA['P_UNITUPI'] = $this->input->post('iinUNITUPI');
        $DATA['P_UNITAP'] = $this->input->post('iinUNITAP');
        $DATA['P_UNITUP'] = $this->input->post('iinUNITUP');
        $DATA['P_TGLPDL'] = $this->input->post('iinTGLPDL');
        $DATA['P_TGLRUBAH_MK ']= $this->input->post('iinTGLRUBAHMK');
        $DATA['P_KDPROSES'] = $this->input->post('iinKDPROSES');
        $DATA['PLOGIN ']= $this->input->post('user');
        $DATA['PNO_TIKET'] = $this->input->post('inNotiket');


        $res = $this->mdata1->simpanpdl($DATA);
    //     // $res['datapdl'] = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }


    //  public function insert_pdl(){
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}

// public function insert_DIL(){
//     	$this->insert_data();
//     	$this->insert_data_pdl();

// 	}	

}