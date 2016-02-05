<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdata1 extends CI_Model{
	
	function __construct()
    {
        parent::__construct();
    }

    function select_data_nontaglis($id = NULL) {
        $noagenda = $this->input->post('inNoAgenda');   
        
        $query = $this->db->query("BEGIN BILL52.PKG_INFOAGENDA.CARI('$noagenda',LCURSOR1,LCURSOR2,LCURSOR3,v); END;");
        return $query->result();   
    }   

    function save_data_nontaglis() {		
		$noagenda = $this->input->post('inNoAgenda');			
		$user = $this->input->post('inUser');	
					
		$query = $this->db->query("BEGIN BILL52.FLAGMANUAL('$noagenda', '$user'); END;");		
		print_r($query);
              
    }	
         
    /*end ==>*/    
}