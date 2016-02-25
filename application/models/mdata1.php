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


    public function simpan($DATA){
      $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        
        $P_IDPEL = $DATA['P_IDPEL'];
        $P_TARIF =  $DATA['P_TARIF'];
        $P_KDPT =  $DATA['P_KDPT '];
        $P_KDPT_2 = $DATA['P_KDPT_2'];
        $PLOGIN = $DATA['PLOGIN'];
        $PNO_TIKET = $DATA['PNO_TIKET'];
        $PJNS_TRANS = $DATA['PJNS_TRANS'];
        $OUT_ROWCOUNT = '';
        $MSGERROR = '';

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_MAIN ( :P_IDPEL, :P_TARIF, :P_KDPT, :P_KDPT_2, :PLOGIN, :PNO_TIKET, :PJNS_TRANS, :OUT_ROWCOUNT, :MSGERROR);END;');
        oci_bind_by_name($stid, ':P_IDPEL', $P_IDPEL) or die('Error binding string5');
        oci_bind_by_name($stid, ':P_TARIF', $P_TARIF) or die('Error binding string1');
        oci_bind_by_name($stid, ':P_KDPT', $P_KDPT) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_KDPT_2', $P_KDPT_2) or die('Error binding string3');
        oci_bind_by_name($stid, ':PLOGIN', $PLOGIN) or die('Error binding string2');
        oci_bind_by_name($stid, ':PNO_TIKET', $PNO_TIKET) or die('Error binding string3');
        oci_bind_by_name($stid, ':PJNS_TRANS', $PJNS_TRANS) or die('Error binding string3');
        oci_bind_by_name($stid, ':OUT_ROWCOUNT', $OUT_ROWCOUNT,1000, SQLT_CHR) or die('Error binding string17');       
        oci_bind_by_name($stid, ':MSGERROR', $MSGERROR,1000, SQLT_CHR) or die('Error binding string18');
        
        if(oci_execute($stid)){
          //$results = $stid;
          print $OUT_ROWCOUNT;
          // print $MSGERROR;
          // print_r($MSGERROR);
        }else{

           //print "Kesalahan Kirim data save_data_koreksi_pkg ";
           //$this->session->set_flashdata('message', 'Data Gagal Disimpan '.$stid);
          // $results = "sory cenah.........";
          echo("GAGAL");
        } 
 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);
        //$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
        //redirect('home');
        // return $results; 
    }  


    public function simpanpdl($DATA){
      $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        
        $P_THBLMUT = $DATA['P_THBLMUT'];
        $P_UNITUPI =  $DATA['P_UNITUPI'];
        $P_UNITAP = $DATA['P_UNITAP'] ;
        $P_UNITUP = $DATA['P_UNITUP'] ;
        $P_TGLPDL = '' ;
        $P_TGLRUBAH_MK ='';
        $P_KDPROSES =$DATA['P_KDPROSES'];
        $PLOGIN = $DATA['PLOGIN'];
        $PNO_TIKET = $DATA['PNO_TIKET'];
        $OUT_ROWCOUNT = '';
        $MSGERROR = '';

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_PDL ( :P_THBLMUT, :P_UNITUPI, :P_UNITAP, :P_UNITUP,:P_TGLPDL, :PLOGIN, :P_TGLRUBAH_MK, :P_KDPROSES, :PLOGIN, :PNO_TIKET,:OUT_ROWCOUNT, MSGERROR );END;');
        oci_bind_by_name($stid, ':P_THBLMUT', $P_THBLMUT) or die('Error binding string5');
        oci_bind_by_name($stid, ':P_UNITUPI', $P_TARIF) or die('Error binding string1');
        oci_bind_by_name($stid, ':P_UNITAP', $P_KDPT) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_UNITUP', $P_KDPT_2) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_TGLPDL', $P_TGLPDL) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_TGLRUBAH_MK', $P_TGLRUBAH_MK) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_KDPROSES', $P_KDPROSES) or die('Error binding string3');
        oci_bind_by_name($stid, ':PNO_TIKET', $PNO_TIKET) or die('Error binding string3');
        oci_bind_by_name($stid, ':PJNS_TRANS', $PJNS_TRANS) or die('Error binding string3');
        oci_bind_by_name($stid, ':OUT_ROWCOUNT', $OUT_ROWCOUNT,1000, SQLT_CHR) or die('Error binding string17');       
        oci_bind_by_name($stid, ':MSGERROR', $MSGERROR,1000, SQLT_CHR) or die('Error binding string18');
        
        if(oci_execute($stid)){
          // $results = $stid;
           print $OUT_ROWCOUNT;
          // print $MSGERROR;
          // print_r($MSGERROR);
        }else{

           print "Kesalahan Kirim data save_data_koreksi_pkg ";
          // $this->session->set_flashdata('message', 'Data Gagal Disimpan '.$stid);
          // $results = "sory cenah.........";
        } 
 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);
        // redirect('home');
        // return $results; 
    }  

  }