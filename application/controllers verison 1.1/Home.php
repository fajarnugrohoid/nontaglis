<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// version 1.1
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
        $DATA['P_TGLRUBAH_MK']= $this->input->post('iinTGLRUBAHMK');
        $DATA['P_KDPROSES'] = $this->input->post('iinKDPROSES');
        $DATA['PLOGIN']= $this->input->post('user');
        $DATA['PNO_TIKET'] = $this->input->post('inNotiket');
        $DATA['PJNS_TRANS'] = $this->input->post('pjns');


        $res = $this->mdata1->simpanpdl($DATA);
    //     // $res['datapdl'] = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }


    //  public function insert_pdl(){
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}

public function insert_data_ftul(){
		$DATA['P_IDPEL'] = $this->input->post('idpel');
		$DATA['P_KDAM'] = $this->input->post('iinKDAM');
        $DATA['P_KDDK'] = $this->input->post('iinKDDK');
        $DATA['P_KDBACAMETER'] = $this->input->post('iinKDBACAMETER');
        $DATA['P_KDKLP'] = $this->input->post('iinKDKLP');
        $DATA['P_KOGOL']= $this->input->post('iinKOGOL');
        $DATA['P_SUBKOGOL'] = $this->input->post('iinSUBKOGOL');
        $DATA['P_KDPPJ']= $this->input->post('iinKDPPJ');
        $DATA['P_PEMDA'] = $this->input->post('iinPEMDA');
        $DATA['PLOGIN']= $this->input->post('user');
        $DATA['PNO_TIKET']=$this->input->post('inNotiket');
        $DATA['PJNS_TRANS'] = $this->input->post('pjns');


        

        $res = $this->mdata1->simpanftul($DATA);
        
        // $res['datapdl'] = $this->mdata1->simpanpdl();
       // print_r($res);
    // }


    //  public function insert_pdl(){
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}

public function insert_data_fakmkwh(){
		$DATA['P_IDPEL'] = $this->input->post('idpel');
        $DATA['P_CT_PRIMER_KWH'] = $this->input->post('iinCTPRIMER');
        $DATA['P_CT_SEKUNDER_KWH'] = $this->input->post('iinCTSEKUNDER');
        $DATA['P_PT_PRIMER_KWH'] = $this->input->post('iinPTPRIMER');
        $DATA['P_PT_SEKUNDER_KWH'] = $this->input->post('iinPTSEKUNDER');
        $DATA['P_KONSTANTA_KWH']= $this->input->post('iinKONSTANTA');
        $DATA['P_FAKMKWH'] = $this->input->post('iinFAKMKWH');
        $DATA['PLOGIN']= $this->input->post('user');
        $DATA['P_PNO_TIKET']=$this->input->post('inNotiket');
        $DATA['P_PJNS_TRANS'] = $this->input->post('pjns');


        $res = $this->mdata1->simpanftul($DATA);
    //     // $res['datapdl'] = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }


    //  public function insert_pdl(){
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}


public function insert_data_fakmkvarh(){
		$DATA['P_IDPEL'] = $this->input->post('idpel');
        $DATA['P_CT_PRIMER_KVARH'] = $this->input->post('iinCTPRIMERKVARH');
        $DATA['P_CT_SEKUNDER_KVARH'] = $this->input->post('iinCTSEKUNDERKV');
        $DATA['P_PT_PRIMER_KVARH'] = $this->input->post('iinPTSEKUNDERKV');
        $DATA['P_PT_SEKUNDER_KVARH'] = $this->input->post('iinPTSEKUNDERKV');
        $DATA['P_KONSTANTA_KVARH']= $this->input->post('iinKONSTANTAKV');
        $DATA['P_FAKMKVARH'] = $this->input->post('iinFAKMTRKVR51');
        $DATA['PLOGIN']= $this->input->post('user');
        $DATA['P_PNO_TIKET']=$this->input->post('inNotiket');
        $DATA['P_PJNS_TRANS'] = $this->input->post('pjns');


        $res = $this->mdata1->simpanfakmkvarh($DATA);
    //     // $res['datapdl'] = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }


    //  public function insert_p
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}

 public function insert_DIL(){
    	// $this->insert_data_pdl();
    	// $this->insert_data();
    	$this->insert_data_ftul();
    	// $this->insert_data_fakmkwh();
    	// $this->insert_data_fakmkvarh();
	}	

}