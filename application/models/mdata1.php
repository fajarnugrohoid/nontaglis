<?php if(!defined('BASEPATH')) exit('No direct script allowed');



    class mdata1 extends CI_Model{
    	
    	function __construct()
      {
        parent::__construct();
      }  

    public function get_data($id){
      if(!empty($id)){
            $this->db->where('IDPEL', $id);
        }        
        $query = $this->db->get('BILL52.DIL_MAIN');
    
        return $query->result();   


       // if(!empty($id)){
       //   $query = $this->db->query("select * from Bill52.Dil_main where idpel ='$id'"  );
       //  }        
       //  return $query->result();   
       }


    public function get_data1($id){
      if(!empty($id)){
            $this->db->where('IDPEL', $id);
        }        
        $query = $this->db->get('BILL52.DIL_PDL');
    
        return $query->result();   

  //   public function get_data2($id){
  //       $results = '';
  //       $this->pblmig_db = $this->load->database('pblmig', true);
  //       if (!$this->pblmig_db) {
  //         $m = oci_error();
  //         trigger_error(htmlentities($m['message']), E_USER_ERROR);
      }



    public function get_data2($id){
      if(!empty($id)){
            $this->db->where('IDPEL', $id);
        }        
        $query = $this->db->get('BILL52.DIL_FTUL235');
    
        return $query->result();   

  //   public function get_data2($id){
  //       $results = '';
  //       $this->pblmig_db = $this->load->database('pblmig', true);
  //       if (!$this->pblmig_db) {
  //         $m = oci_error();
  //         trigger_error(htmlentities($m['message']), E_USER_ERROR);
      }



      public function get_data3($id){
      if(!empty($id)){
            $this->db->where('IDPEL', $id);
        }        
        $query = $this->db->get('BILL52.DIL_FAKMKWH');
    
        return $query->result();   

  //   public function get_data2($id){
  //       $results = '';
  //       $this->pblmig_db = $this->load->database('pblmig', true);
  //       if (!$this->pblmig_db) {
  //         $m = oci_error();
  //         trigger_error(htmlentities($m['message']), E_USER_ERROR);
      }



      public function get_data4($id){
      if(!empty($id)){
            $this->db->where('IDPEL', $id);
        }        
        $query = $this->db->get('BILL52.DIL_FAKMKVARH');
    
        return $query->result();   

  //   public function get_data2($id){
  //       $results = '';
  //       $this->pblmig_db = $this->load->database('pblmig', true);
  //       if (!$this->pblmig_db) {
  //         $m = oci_error();
  //         trigger_error(htmlentities($m['message']), E_USER_ERROR);
      }

      
    
  //       $p1 = $id;
  //       $v = '';

  //       $stid = oci_parse($this->pblmig_db->conn_id, 'begin BILL52.PKG_INFOAGENDA.CARI(:p1,:p_cursor1,:p_cursor2,:p_cursor3,:v); end;');
  //       $p_cursor1 = oci_new_cursor($this->pblmig_db->conn_id);
  //       $p_cursor2 = oci_new_cursor($this->pblmig_db->conn_id);
  //       $p_cursor3 = oci_new_cursor($this->pblmig_db->conn_id);

  //       //Send parameters variable  value  lenght
  //       oci_bind_by_name($stid, ':p1', $p1,18) or die('Error binding string1');
  //       oci_bind_by_name($stid, ':p_cursor1', $p_cursor1,-1, OCI_B_CURSOR) or die('Error binding string2');
  //       oci_bind_by_name($stid, ':p_cursor2', $p_cursor2,-1, OCI_B_CURSOR) or die('Error binding string3');
  //       oci_bind_by_name($stid, ':p_cursor3', $p_cursor3,-1, OCI_B_CURSOR) or die('Error binding string4');
  //       oci_bind_by_name($stid, ':v', $v,100, SQLT_CHR) or die('Error binding string5');
  //       //Bind Cursor     put -1

  //       if(oci_execute($stid)){
  //         oci_execute($p_cursor2, OCI_DEFAULT);
  //         oci_fetch_all($p_cursor2, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
  //         //echo '<br>';
  //         $results = $cursor;
  //         //print_r($cursor);  
  //       }else{
  //         $e = oci_error($stid);
  //         $results =  $e['message'];
  //       } 
  //       oci_free_statement($stid);
  //       oci_close($this->pblmig_db->conn_id);

  //       return $results;

  //   }

  //   public function get_data3($id){
  //       $results = '';
  //       $this->pblmig_db = $this->load->database('pblmig', true);
  //       if (!$this->pblmig_db) {
  //         $m = oci_error();
  //         trigger_error(htmlentities($m['message']), E_USER_ERROR);
  //       }

  //       $p1 = $id;
  //       $v = '';

  //       $stid = oci_parse($this->pblmig_db->conn_id, 'begin BILL52.PKG_INFOAGENDA.CARI(:p1,:p_cursor1,:p_cursor2,:p_cursor3,:v); end;');
  //       $p_cursor1 = oci_new_cursor($this->pblmig_db->conn_id);
  //       $p_cursor2 = oci_new_cursor($this->pblmig_db->conn_id);
  //       $p_cursor3 = oci_new_cursor($this->pblmig_db->conn_id);

  //       //Send parameters variable  value  lenght
  //       oci_bind_by_name($stid, ':p1', $p1,18) or die('Error binding string1');
  //       oci_bind_by_name($stid, ':p_cursor1', $p_cursor1,-1, OCI_B_CURSOR) or die('Error binding string2');
  //       oci_bind_by_name($stid, ':p_cursor2', $p_cursor2,-1, OCI_B_CURSOR) or die('Error binding string3');
  //       oci_bind_by_name($stid, ':p_cursor3', $p_cursor3,-1, OCI_B_CURSOR) or die('Error binding string4');
  //       oci_bind_by_name($stid, ':v', $v,100, SQLT_CHR) or die('Error binding string5');
  //       //Bind Cursor     put -1

  //       if(oci_execute($stid)){
  //         oci_execute($p_cursor3, OCI_DEFAULT);
  //         oci_fetch_all($p_cursor3, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
  //         //echo '<br>';
  //         $results = $cursor;
  //         //print_r($cursor);  
  //       }else{
  //         $e = oci_error($stid);
  //         $results =  $e['message'];
  //       } 
  //       oci_free_statement($stid);
  //       oci_close($this->pblmig_db->conn_id);

  //       return $results;

  //   } 

    function save_data_nontaglis() {        
    $idpel = $this->input->post('idpel');           
    $user = $this->input->post('inUser');  
    $tiket = $this->input->post('iinNotiket'); 
    $tarif  = $this->input->post('iintarif');
    $kdpt   =$this->input->post('iinKDPT');
    $kdpt2  =$this->input->post('iinKDPT2');
    $thblmut  =$this->input->post('iinTHBLMUT');
    $unitupi  =$this->input->post('iinUNITUPI');
    $unitap  =$this->input->post('iinUNITAP');
    $unitup  =$this->input->post('iinUNITUP');
    $tglrubahmk  =$this->input->post('iinTGLRUBAHMK');
    $kdproses  =$this->input->post('iinKDPROSES');
    $kdam  =$this->input->post('iinKDAM');
    $kddk  =$this->input->post('iinKDDK');
    $kdbcameter  =$this->input->post('iinKDBACAMETER');
    $kdlp =$this->input->post('iinKDLP');
    $kogol =$this->input->post('iinKOGOL');
    $subkogol =$this->input->post('iinSUBKOGOL');
    $kdppj =$this->input->post('iinKDPPJ');
    $pemda =$this->input->post('iinPEMDA');
    $ctprimer =$this->input->post('iinCTPRIMER');
    $ctsekunder =$this->input->post('iinCTSEKUNDER');
    $ptprimer =$this->input->post('iinPTPRIMER');
    $ptsekunder =$this->input->post('iinPTSEKUNDER');
    $konstanta =$this->input->post('iinKONSTANTA');
    $fakmkwh =$this->input->post('iinFAKMKWH');
    $ctprimer =$this->input->post('iinCTPRIMER');
    $ctprimerkvarh =$this->input->post('iinCT_PRIMER_KVARH');
    $ctsekunderkv=$this->input->post('iinCTSEKUNDERKV');
    $ptprimerkv=$this->input->post('iinPTPRIMERKV');
    $ptsekunderkv=$this->input->post('iinPTSEKUNDERKV');
    $konstantakv=$this->input->post('iinKONSTANTAKV');
   
    $query = $this->db->query("BEGIN BILL52.FLAGMANUAL('$idpel', '$user', 'iinNotiket', 'iintarif', 'iinKDPT', 'iinKDPT', 'iinKDPT2', 'iinTHBLMUT', 'iinUNITUPI', 'iinUNITAP', 'iinUNITUP', 'iinTGLRUBAHMK'
                              , 'iinKDPROSES', 'iinKDAM', 'iinKDDK', 'iinKDBACAMETER', 'iinKDLP', 'iinKDAM', 'iinKOGOL', 'iinSUBKOGOL', 'iinKDPPJ', 'iinPEMDA', 'iinCTPRIMER', 'iinCTSEKUNDER', 'iinPTPRIMER', 'iinPTSEKUNDER'
                              , 'iinKONSTANTA', 'iinFAKMKWH', 'iinCTPRIMER', 'iinCT_PRIMER_KVARH','iinCTSEKUNDERKV','iinPTPRIMERKV','iinPTSEKUNDERKV','iinKONSTANTAKV'); END;");       
    return $query->result();

  } 
  end ==>    
}