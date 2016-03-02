<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// version 1.2
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
			
		if(empty($data['datadil'])){
			$data['kosong'] =2;
			$this->load->view('vmain', $data);
		}else{
			$this->load->view('vmain_get_id', $data);
		}

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
        return $res; 


        
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
        return $res; 

    //     // $res['datapdl'] = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }


    //  public function insert_pdl(){
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}

public function insert_data_ftul(){
       $res = $this->mdata1->simpanftul();
       return $res; 
        // $res['datapdl'] = $this->mdata1->simpanpdl();
       // print_r($res);
    // }


    //  public function insert_pdl(){
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }

	
}

public function insert_data_fakmkwh(){
		
        $res = $this->mdata1->simpanfakmkwh();
        return  $res;
    //     // $res['datapdl'] = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }


    //  public function insert_pdl(){
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}


public function insert_data_fakmkvarh(){
	    $res = $this->mdata1->simpanfakmkvarh();
	    return  $res;
    //     // $res['datapdl'] = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }


    //  public function insert_p
    //     $res = $this->mdata1->simpanpdl();
    //     print_r($res);
    // }
	
}

 public function insert_DIL(){
 		$status = true;
	 	// $res_main1 = $this->insert_data();
    	$DODOL='KOSONG';
    	//PRINT('ISI RESMAIN 1 = '.$res_main1);

  //   	if ($res_main1 == 0 ){
  //   		$status = false;
  //   		$DODOL='GAGAL MAIN 1';
  //   			//PRINT('res_main1');
  //   			//print_r($res_main1);
  //   			//exit();
  //   			//PRINT('GAGAL MAIN 1');
  //   	}

    	

  //   	if ($status){
  //   		$res_main2 = $this->insert_data_pdl();
  //   		if ($res_main2==0){
  //   			//PRINT('res_main2');
  //   			$status = false;
  //   			$DODOL='GAGAL MAIN 2';
  //   			//print_r($res_main2);
  //   			//exit();
  //   		}
  //   	}

  //   	//PRINT('LANJUT RESMAIN 3');

		// $DODOL='LANJUT BROOOOOO';
		// PRINT($DODOL);
  //   	if ($status){
  //   		$res_main3 = $this->insert_data_ftul();
  //   		if ($res_main3==0){
  //   			//PRINT('res_main3');
  //   			$status = false;
  //   			$DODOL = 'GAGAL MAIN 3';
  //   			//print_r($res_main3);
  //   			//exit;
  //   		}
  //   	}
  //   	$DODOL = 'tuluy';
  //   	print($DODOL);

    	// if ($status){
    	// 	$res_main4 = $this->insert_data_fakmkwh();
    	// 	if ($res_main4!=1){
    	// 		PRINT('res_main4 ='.$res_main4);
    	// 		$status = false;
    	// 		print_r($res_main4);
    	// 		exit;
    	// 	}
    	// }

    	// if ($status){
    	// 	$res_main5 = $this->insert_data_fakmkvarh();
    	// 	if ($res_main5!=1){
    	// 		PRINT('res_main5 ='. $res_main5);
    	// 		$status = false;
    	// 		print_r($res_main5);
    	// 		exit;
    	// 	}
    	// }

    	//redirect('Home');


    if ($this) {
    		$data['kosong'] =3;
			$this->load->view('vmain', $data);
	    }else{
			$data['kosong'] =4;
	    	$this->load->view('vmain', $data);
		
	    }
	}	

}