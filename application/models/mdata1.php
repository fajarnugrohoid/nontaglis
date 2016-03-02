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

        // echo $P_IDPEL.'<br>';
        // echo $P_TARIF.'<br>';
        // echo $P_KDPT.'<br>';
        // echo $P_KDPT_2.'<br>';
        // echo $PLOGIN.'<br>';
        // echo $PNO_TIKET.'<br>' ;
        // echo $PJNS_TRANS.'<br>';


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_MAIN ( :P_IDPEL, :P_TARIF, :P_KDPT, :P_KDPT_2, :PLOGIN, :PNO_TIKET, :PJNS_TRANS, :OUT_ROWCOUNT, :MSGERROR);END;');
        oci_bind_by_name($stid, ':P_IDPEL', $P_IDPEL) or die('Error binding string5');
        oci_bind_by_name($stid, ':P_TARIF', $P_TARIF) or die('Error binding string1');
        oci_bind_by_name($stid, ':P_KDPT', $P_KDPT) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_KDPT_2', $P_KDPT_2) or die('Error binding string3');
        oci_bind_by_name($stid, ':PLOGIN', $PLOGIN) or die('Error binding string2');
        oci_bind_by_name($stid, ':PNO_TIKET', $PNO_TIKET) or die('Error binding string3');
        oci_bind_by_name($stid, ':PJNS_TRANS', $PJNS_TRANS) or die('Error binding string3');
        oci_bind_by_name($stid, ':OUT_ROWCOUNT', $OUT_ROWCOUNT) or die('Error binding string17');       
        oci_bind_by_name($stid, ':MSGERROR', $MSGERROR,1000, SQLT_CHR) or die('Error binding string18');
        
        if(oci_execute($stid)){
          //$results = $stid;
          //print_r($OUT_ROWCOUNT);
          // print $MSGERROR;
          // print_r($MSGERROR);
          //PRINT('BERHASIL = '.$OUT_ROWCOUNT.'  PESAN = '.$MSGERROR);
        }else{
          //print $MSGERROR;
           //print "Kesalahan Kirim data save_data_koreksi_pkg ";
           //$this->session->set_flashdata('message', 'Data Gagal Disimpan '.$stid);
          // $results = "sory cenah.........";
          //echo("GAGAL");
          //PRINT('gagal = '.$OUT_ROWCOUNT.' PESAN = '.$MSGERROR);
        } 
 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);
        //$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
        //redirect('home');

        return $OUT_ROWCOUNT; 
    }  


    public function simpanpdl($DATA){
      $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        
        // $P_THBLMUT = $DATA['P_THBLMUT'];
        // $P_UNITUPI =  $DATA['P_UNITUPI'];
        // $P_UNITAP = $DATA['P_UNITAP'] ;
        // $P_UNITUP = $DATA['P_UNITUP'] ;
        // $P_TGLRUBAH_MK = $DATA['P_TGLRUBAH_MK'];
        // $P_KDPROSES = $DATA['P_KDPROSES'];
        // $PLOGIN = $DATA['PLOGIN'];
        // $PNO_TIKET = $DATA['PNO_TIKET'];
        // $PJNS_TRANS = $DATA['PJNS_TRANS'];
        // $OUT_ROWCOUNT = '';
        // $MSGERROR = ''; 

        $P_THBLMUT = $this->input->post('iinTHBLMUT');
        $P_UNITUPI =  $this->input->post('iinUNITUPI');
        $P_UNITAP = $this->input->post('iinUNITAP');
        $P_UNITUP = $this->input->post('iinUNITUP');
        $P_UNITKJ = '';
        $P_TGLRUBAH_MK = $this->input->post('iinTGLRUBAHMK');
        $P_JENIS_MK = $this->input->post('iinJENISMK');
        $P_IDPEL = $this->input->post('idpel');
        $P_KDPROSES = $this->input->post('iinKDPROSES'); 
        $PLOGIN = $this->input->post('user');
        $PNO_TIKET = $this->input->post('inNotiket');
        $PJNS_TRANS = $this->input->post('pjns');
        $OUT_ROWCOUNT = '';
        $MSGERROR = '';


        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_PDL ( :P_THBLMUT, :P_UNITUPI, :P_UNITAP, :P_UNITUP, :P_UNITKJ, :P_TGLRUBAH_MK, :P_JENIS_MK, :P_IDPEL, :P_KDPROSES, :PLOGIN, :PNO_TIKET, :PJNS_TRANS, :OUT_ROWCOUNT, :MSGERROR );END;');
        oci_bind_by_name($stid, ':P_THBLMUT', $P_THBLMUT) or die('Error binding string5');
        oci_bind_by_name($stid, ':P_UNITUPI', $P_UNITUPI) or die('Error binding string1');
        oci_bind_by_name($stid, ':P_UNITAP', $P_UNITAP) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_UNITUP', $P_UNITUP) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_UNITKJ', $P_UNITKJ) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_TGLRUBAH_MK', $P_TGLRUBAH_MK) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_JENIS_MK', $P_JENIS_MK) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_IDPEL', $P_IDPEL) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_KDPROSES', $P_KDPROSES) or die('Error binding string3');
        oci_bind_by_name($stid, ':PLOGIN', $PLOGIN) or die('Error binding string3');
        oci_bind_by_name($stid, ':PNO_TIKET', $PNO_TIKET) or die('Error binding string3');
        oci_bind_by_name($stid, ':PJNS_TRANS', $PJNS_TRANS) or die('Error binding string3');
        oci_bind_by_name($stid, ':OUT_ROWCOUNT', $OUT_ROWCOUNT, SQLT_INT) or die('Error binding string17');       
        oci_bind_by_name($stid, ':MSGERROR', $MSGERROR,1000, SQLT_CHR) or die('Error binding string18');
        

        if(oci_execute($stid)){
          //$results = $stid;
           //print $OUT_ROWCOUNT;
          // print $MSGERROR;
          
        }else{
          //print_r(MSGERROR);
           //print "Kesalahan Kirim data save_data_koreksi_pkg ";
          // $this->session->set_flashdata('message', 'Data Gagal Disimpan '.$stid);
          // $results = "sory cenah.........";
        }  
 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);
        // // redirect('home');
        return $OUT_ROWCOUNT; 
    }  


    public function simpanftul(){
      $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $P_IDPEL =  $this->input->post('idpel');
        $P_KDAM =  $this->input->post('iinKDAM');
        $P_KDDK = $this->input->post('iinKDDK');
        $P_KDBACAMETER = $this->input->post('iinKDBACAMETER');
        $P_KDKLP = $this->input->post('iinKDKLP');
        $P_KOGOL = $this->input->post('iinKOGOL');
        $P_SUBKOGOL =$this->input->post('iinSUBKOGOL');
        $P_KDPPJ = $this->input->post('iinKDPPJ');
        $P_PEMDA =  $this->input->post('iinPEMDA');
        $PLOGIN= $this->input->post('user');
        $PNO_TIKET= $this->input->post('inNotiket');
        $PJNS_TRANS= $this->input->post('pjns');

        $OUT_ROWCOUNT = '';
        $MSGERROR = '';

        // echo $P_IDPEL.'<br>';
        // echo $P_KDAM.'<br>';
        // echo $P_KDDK.'<br>';
        // echo $P_KDBACAMETER.'<br>';
        // echo $P_KDKLP.'<br>';
        // echo $P_KOGOL.'<br>';
        // echo $P_SUBKOGOL.'<br>' ;
        // echo $P_KDPPJ.'<br>';
        // echo $P_PEMDA.'<br>'; 
        // echo $PLOGIN.'<br>';
        // echo $PNO_TIKET.'<br>' ;
        // echo $PJNS_TRANS.'<br>';
        
        // MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_FTUL235 ( 
        //   '514530883165', 
        //   'A', 
        //   'BBATBBN18100', 
        //   'ED', 
        //   'A', 
        //   '0', 
        //   'G', 
        //   'P', 
        //   '0', 
        //   'CEP', 
        //   '12345', 
        //   'DIL', OUT_ROWCOUNT, MSGERROR );
  
        // $P_IDPEL = '514530883165';
        // $P_KDAM =  'M';
        // $P_KDDK = 'BBATBBN18600';
        // $P_KDBACAMETER = 'ED';
        // $P_KDKLP = 'A';
        // $P_KOGOL = '0';
        // $P_SUBKOGOL =  'G';
        // $P_KDPPJ= 'P';
        // $P_PEMDA= '0';
        // $PLOGIN='CEP';
        // $PNO_TIKET='123456';
        // $PJNS_TRANS= 'DIL';
        // $OUT_ROWCOUNT = '';
        // $MSGERROR = '';
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_FTUL235 (:P_IDPEL, :P_KDAM, :P_KDDK, :P_KDBACAMETER, :P_KDKLP, :P_KOGOL, :P_SUBKOGOL, :P_KDPPJ, :P_PEMDA, :PLOGIN, :PNO_TIKET, :PJNS_TRANS, :OUT_ROWCOUNT, :MSGERROR );END;');
        oci_bind_by_name($stid, ':P_IDPEL', $P_IDPEL) or die('Error binding string5');
        oci_bind_by_name($stid, ':P_KDAM', $P_KDAM) or die('Error binding string1');
        oci_bind_by_name($stid, ':P_KDDK', $P_KDDK) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_KDBACAMETER', $P_KDBACAMETER) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_KDKLP', $P_KDKLP) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_KOGOL', $P_KOGOL) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_SUBKOGOL', $P_SUBKOGOL) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_KDPPJ', $P_KDPPJ) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_PEMDA', $P_PEMDA) or die('Error binding string3');
        oci_bind_by_name($stid, ':PLOGIN', $PLOGIN) or die('Error binding string3');
        oci_bind_by_name($stid, ':PNO_TIKET', $PNO_TIKET) or die('Error binding string3');
        oci_bind_by_name($stid, ':PJNS_TRANS', $PJNS_TRANS) or die('Error binding string3');
        oci_bind_by_name($stid, ':OUT_ROWCOUNT', $OUT_ROWCOUNT,1000, SQLT_INT) or die('Error binding string17');       
        oci_bind_by_name($stid, ':MSGERROR', $MSGERROR,1000, SQLT_CHR) or die('Error binding string18');
        
        if(oci_execute($stid)){
          // $results = $stid;
          // print $OUT_ROWCOUNT;
          //  // print $MSGERROR;
          
        }else{
        //     print_r (MSGERROR);
        //    print "Kesalahan Kirim data save_data_koreksi_pkg ";
        //    //$this->session->set_flashdata('message', 'Data Gagal Disimpan '.$stid);
        //   // $results = "sory cenah.........";
        //   echo("GAGAL");
        } 
 
        // oci_free_statement($stid);
        // oci_close($this->pblmig_db->conn_id);
        //$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
        //redirect('home');
        return $OUT_ROWCOUNT; 
    } 

    public function simpanfakmkwh(){
      $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $P_IDPEL = $this->input->post('idpel');
        $P_CT_PRIMER_KWH =  $this->input->post('iinCTPRIMER');
        $P_CT_SEKUNDER_KWH = $this->input->post('iinCTSEKUNDER');
        $P_PT_PRIMER_KWH = $this->input->post('iinPTPRIMER');
        $P_PT_SEKUNDER_KWH = $this->input->post('iinPTSEKUNDER');
        $P_KONSTANTA_KWH = $this->input->post('iinKONSTANTA');
        $P_FAKMKWH =  $this->input->post('iinFAKMKWH');
        $PLOGIN= $this->input->post('user');
        $PNO_TIKET= $this->input->post('inNotiket');
        $PJNS_TRANS= $this->input->post('pjns');
        $OUT_ROWCOUNT = '';
        $MSGERROR = '';
        
        // echo $P_IDPEL.'<br>';
        // echo $P_CT_PRIMER_KWH.'<br>';
        // echo $P_CT_SEKUNDER_KWH.'<br>';
        // echo $P_PT_PRIMER_KWH.'<br>';
        // echo $P_PT_SEKUNDER_KWH.'<br>';
        // echo $P_KONSTANTA_KWH.'<br>';
        // echo $P_FAKMKWH.'<br>';
        // echo $PLOGIN.'<br>';
        // echo $PNO_TIKET.'<br>' ;
        // echo $PJNS_TRANS.'<br>';

        // $P_IDPEL = '514530883165';
        // $P_CT_PRIMER_KWH =  '1';
        // $P_CT_SEKUNDER_KWH = '4';
        // $P_PT_PRIMER_KWH = '7';
        // $P_PT_SEKUNDER_KWH = '4';
        // $P_KONSTANTA_KWH = '6';
        // $P_FAKMKWH =  '6';
        // $PLOGIN= 'cepmang';
        // $PNO_TIKET= '1234';
        // $PJNS_TRANS= 'dil';
        // $OUT_ROWCOUNT = '';
        // $MSGERROR = '';
                  
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_FAKMKWH ( :P_IDPEL, :P_CT_PRIMER_KWH, :P_CT_SEKUNDER_KWH, :P_PT_PRIMER_KWH, :P_PT_SEKUNDER_KWH, :P_KONSTANTA_KWH, :P_FAKMKWH, :PLOGIN, :PNO_TIKET, :PJNS_TRANS, :OUT_ROWCOUNT, :MSGERROR );END;');
        oci_bind_by_name($stid, ':P_IDPEL', $P_IDPEL) or die('Error binding string5');
        oci_bind_by_name($stid, ':P_CT_PRIMER_KWH', $P_CT_PRIMER_KWH) or die('Error binding string1');
        oci_bind_by_name($stid, ':P_CT_SEKUNDER_KWH', $P_CT_SEKUNDER_KWH) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_PT_PRIMER_KWH', $P_PT_PRIMER_KWH) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_PT_SEKUNDER_KWH', $P_PT_SEKUNDER_KWH) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_KONSTANTA_KWH', $P_KONSTANTA_KWH) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_FAKMKWH', $P_FAKMKWH) or die('Error binding string3');
        oci_bind_by_name($stid, ':PLOGIN', $PLOGIN) or die('Error binding string3');
        oci_bind_by_name($stid, ':PNO_TIKET', $PNO_TIKET) or die('Error binding string3');
        oci_bind_by_name($stid, ':PJNS_TRANS', $PJNS_TRANS) or die('Error binding string3');
        oci_bind_by_name($stid, ':OUT_ROWCOUNT', $OUT_ROWCOUNT,1000, SQLT_INT) or die('Error binding string17');       
        oci_bind_by_name($stid, ':MSGERROR', $MSGERROR,1000, SQLT_CHR) or die('Error binding string18');
        
        //print_r(oci_execute($stid));

        
        if(oci_execute($stid)){
          // $results = $stid;
          // print $OUT_ROWCOUNT;
          // print $;
          // print_r($OUT_ROWCOUNT);
        }else{
          //   print_r($MSGERROR);
          // print "Kesalahan Kirim data save_data_koreksi_pkg ";
           // $this->session->set_flashdata('message', 'Data Gagal Disimpan '.$stid);
          // $results = "sory cenah.........";
          
        } 
 
        // oci_free_statement($stid);
        // oci_close($this->pblmig_db->conn_id);
        // $this->session->set_flashdata('message', 'Data Berhasil Disimpan');
        // redirect('home');
        return $OUT_ROWCOUNT; 
    }

 public function simpanfakmkvarh(){
      $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }


// DECLARE 
//   P_IDPEL VARCHAR2(12);
//   P_CT_PRIMER_KVARH NUMBER;
//   P_CT_SEKUNDER_KVARH NUMBER;
//   P_PT_PRIMER_KVARH NUMBER;
//   P_PT_SEKUNDER_KVARH NUMBER;
//   P_KONSTANTA_KVARH NUMBER;
//   P_FAKMKVARH NUMBER;
//   PLOGIN VARCHAR2(32767);
//   PNO_TIKET NUMBER;
//   PJNS_TRANS VARCHAR2(32767);
//   OUT_ROWCOUNT NUMBER;
//   MSGERROR VARCHAR2(32767);

// BEGIN

        $P_IDPEL = $this->input->post('idpel');
        $P_CT_PRIMER_KVARH =  (int)$this->input->post('iinCTPRIMERKVARH');
        $P_CT_SEKUNDER_KVARH = (int)$this->input->post('iinCTSEKUNDERKV');
        $P_PT_PRIMER_KVARH = (int)$this->input->post('iinPTPRIMERKV');
        $P_PT_SEKUNDER_KVARH = (int)$this->input->post('iinPTSEKUNDERKV');
        $P_KONSTANTA_KVARH = (int)$this->input->post('iinKONSTANTAKV');
        $P_FAKMKVARH =  (int)$this->input->post('iinFAKMKVARH');
        $PLOGIN= $this->input->post('user');
        $PNO_TIKET= (int)$this->input->post('inNotiket');
        $PJNS_TRANS= $this->input->post('pjns');
        $OUT_ROWCOUNT = '';
        $MSGERROR = '';

        // echo $P_IDPEL.'<br>';
        // echo $P_CT_PRIMER_KVARH.'<br>';
        // echo $P_CT_SEKUNDER_KVARH.'<br>';
        // echo $P_PT_PRIMER_KVARH.'<br>';
        // echo $P_PT_SEKUNDER_KVARH.'<br>';
        // echo $P_KONSTANTA_KVARH.'<br>';
        // echo $P_FAKMKVARH.'<br>';
        // echo $PLOGIN.'<br>';
        // echo $PNO_TIKET.'<br>' ;
        // echo $PJNS_TRANS.'<br>';

          // MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_FAKMKVARH ( 
          //   '514530883165',
          //   '2', 
          //   '1', 
          //   '4',
          //   '3',
          //   '5',
          //   '4',
          //   'BANECP', 
          //   '134', 
          //   'DIL',
          //   OUT_ROWCOUNT,
          //   MSGERROR );

        // $P_IDPEL = '514530883165';
        // $P_CT_PRIMER_KVARH =  '2';
        // $P_CT_SEKUNDER_KVARH = '1';
        // $P_PT_PRIMER_KVARH = '4';
        // $P_PT_SEKUNDER_KVARH = '3';
        // $P_KONSTANTA_KVARH = '5';
        // $P_FAKMKVARH =  '4';
        // $PLOGIN= 'BANECP';
        // $PNO_TIKET= '134';
        // $PJNS_TRANS= 'DIL';
        // $OUT_ROWCOUNT = '';
        // $MSGERROR = '';
                      
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN MONAP2T.PKG_OPHAR_GLOBAL.UPDATE_DIL_FAKMKVARH (:P_IDPEL,:P_CT_PRIMER_KVARH,:P_CT_SEKUNDER_KVARH,:P_PT_PRIMER_KVARH,:P_PT_SEKUNDER_KVARH,:P_KONSTANTA_KVARH,:P_FAKMKVARH, :PLOGIN,:PNO_TIKET,:PJNS_TRANS,:OUT_ROWCOUNT,:MSGERROR);END;');
        oci_bind_by_name($stid, ':P_IDPEL', $P_IDPEL) or die('Error binding string5');
        oci_bind_by_name($stid, ':P_CT_PRIMER_KVARH', $P_CT_PRIMER_KVARH) or die('Error binding string1');
        oci_bind_by_name($stid, ':P_CT_SEKUNDER_KVARH', $P_CT_SEKUNDER_KVARH) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_PT_PRIMER_KVARH', $P_PT_PRIMER_KVARH) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_PT_SEKUNDER_KVARH', $P_PT_SEKUNDER_KVARH) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_KONSTANTA_KVARH', $P_KONSTANTA_KVARH) or die('Error binding string3');
        oci_bind_by_name($stid, ':P_FAKMKVARH', $P_FAKMKVARH) or die('Error binding string3');
        oci_bind_by_name($stid, ':PLOGIN', $PLOGIN) or die('Error binding string3');
        oci_bind_by_name($stid, ':PNO_TIKET', $PNO_TIKET) or die('Error binding string3');
        oci_bind_by_name($stid, ':PJNS_TRANS', $PJNS_TRANS) or die('Error binding string3');
        oci_bind_by_name($stid, ':OUT_ROWCOUNT', $OUT_ROWCOUNT,1000, SQLT_INT) or die('Error binding string17');       
        oci_bind_by_name($stid, ':MSGERROR', $MSGERROR,1000, SQLT_CHR) or die('Error binding string18');

        //oci_bind_by_name( $stmt, ":errcode", $errcode, 12, SQLT_INT );
        
        print_r(oci_execute($stid));

        if(oci_execute($stid)){
          // $results = $OUT_ROWCOUNT;
          // print $OUT_ROWCOUNT;
          // print $MSGERROR;

        }else{
         // print_r($MSGERROR);

            //print "Kesalahan Kirim data save_data_koreksi_pkg ";
           //$this->session->set_flashdata('message', 'Data Gagal Disimpan '.$stid);
          // $results = "sory cenah.........";
          // echo("GAGAL");
        } 
 
        // oci_free_statement($stid);
        // oci_close($this->pblmig_db->conn_id);
        // $this->session->set_flashdata('message', 'Data Berhasil Disimpan');
        // redirect('home');
        return $OUT_ROWCOUNT; 
    }


  }