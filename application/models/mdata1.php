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

   
 
}