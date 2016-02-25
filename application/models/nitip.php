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

     function save_data_nontaglisxx() {        
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $plogin = $this->input->post('user');           
        $pno_tiket = $this->input->post('inNotiket');  
        $pjns_trans =  $this ->input->post('pjns');
        $pidpel = $this ->input->post('idpel');
        $ptable = $this ->input->post('check1');
        $pcol = $this ->input->post('tbTarif1');
        $prow = $this ->input->post('tbTarif');
        $msg_out = '';
        $r = '';

// declare
// out_massage varchar2(50);
// x integer;

// begin
//     x := pkg_kirim_ok.getrubah_dilpaskabayar('cep yudi', '1234','514530883140','koreksi DIL','DIL_MAIN','KDPT','3',out_massage);
// end;
 

        //$stid = oci_parse($this->pblmig_db->conn_id, "begin :r := pkg_kirim_ok.getrubah_dilpaskabayar(:plogin, :pno_tiket,:pidpel,:pjns_trans,:ptable,:pcol,:prow,:msg_out); end;");
        $stid = oci_parse($this->pblmig_db->conn_id, "BEGIN :r := MONAP2T.PKG_KIRIM_OKAH.getrubah_dilpaskabayar('cep yudi', '1234','514530883140','koreksi DIL','DIL_MAIN','KDPT','3',:msg_out); END;");
        //$stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN :r := MONAP2T.PKG_OPHAR_GLOBAL.GETRUBAH_DILPRABAYAR(:plogin, :pno_tiket, :pjns_trans, :pno_meter, :pprosppj, :pidpel, :puniup, :pkdtrf); END;');

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':plogin', $plogin) or die('Error binding string1');
        oci_bind_by_name($stid, ':pno_tiket', $pno_tiket) or die('Error binding string2');
        oci_bind_by_name($stid, ':pjns_trans', $pjns_trans) or die('Error binding string3');
        oci_bind_by_name($stid, ':pidpel', $pidpel) or die('Error binding string4');
        oci_bind_by_name($stid, ':ptable', $ptable) or die('Error binding string5');
        oci_bind_by_name($stid, ':pcol', $pcol) or die('Error binding string6');
        oci_bind_by_name($stid, ':prow', $prow) or die('Error binding string7');
        oci_bind_by_name($stid, ':msg_out', $msg_out,100, SQLT_CHR) or die('Error binding string8');        
        oci_bind_by_name($stid, ':r', $r) or die('Error binding string9');

        if(oci_execute($stid)){
          // $results = $msg_out;
          print_r($msg_out);
        }else{
          $results = "Sorry, I can't do that...";
        } 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
 
}


 public function save_data_nontaglis(){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        // $plogin = $this->input->post('user');           
        // $pno_tiket = $this->input->post('inNotiket');  
        // $pjns_trans =  $this ->input->post('pjns');
        // $pidpel = $this ->input->post('idpel');
        // $ptable = $this ->input->post('check1');
        // $pcol = $this ->input->post('tbTarif1');
        // $prow = $this ->input->post('tbTarif');
        // $msg_out = '';
        // $r = '';

        $plogin='a';
        $pno_tiket=345;
        $pidpel=514530883140;
        $ptable='koreksi DIL';
        $pcol = 'DIL_MAIN';
        $prow = '3';
        $msg_out = '';
        $r = '';        



        
          // insert role
          //$role = $this->input->post('role');

        //$stid = oci_parse($this->pblmig_db->conn_id, "BEGIN :r := MONAP2T.PKG_KIRIM_OKAH.getrubah_dilpaskabayar('cep yudi', '1234','514530883140','koreksi DIL','DIL_MAIN','KDPT','3',:msg_out); END;");
        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN :r := MONAP2T.PKG_KIRIM_OKAH.GETRUBAH_DILPRABAYAR(:plogin, :pno_tiket, :pidpel, :pjns_trans, :ptable, :pcol, :prow, :msg_out); END;');

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':plogin', $plogin) or die('Error binding string1');
        oci_bind_by_name($stid, ':pno_tiket', $pno_tiket) or die('Error binding string2');
        oci_bind_by_name($stid, ':pjns_trans', $pjns_trans) or die('Error binding string3');
        oci_bind_by_name($stid, ':pidpel', $pidpel) or die('Error binding string4');
        oci_bind_by_name($stid, ':ptable', $ptable) or die('Error binding string5');
        oci_bind_by_name($stid, ':pcol', $pcol) or die('Error binding string6');
        oci_bind_by_name($stid, ':prow', $prow) or die('Error binding string7');
        //oci_bind_by_name($stid, ':msg_out', $msg_out,1000, SQLT_CHR) or die('Error binding string8');        
        oci_bind_by_name($stid, ':msg_out', $msg_out,100, SQLT_CHR) or die('Error binding string8');        
        oci_bind_by_name($stid, ':r', $r,100, SQLT_CHR) or die('Error binding string9');
        //Bind param     put -1 
        if(oci_execute($stid)){
          //$results = $out_message;
            print_r($r);
        }else{
          print "Sorry, I can't do that Dave...";
        } 
 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);
          $this->session->set_flashdata('message', 'Data Berhasil Disimpan');
        // $this->load->view('vmain'); 
        //redirect('home');
    }

 
}