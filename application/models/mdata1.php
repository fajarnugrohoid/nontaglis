<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdata1 extends CI_Model{
	
	function __construct()
  {
    parent::__construct();
  }

  function select_data_nontaglis($id = NULL) {
    $noagenda = $id;   
    
    $query = $this->db->query("BEGIN BILL52.PKG_INFOAGENDA.CARI('$noagenda',LCURSOR1,LCURSOR2,LCURSOR3,v); END;");
    return $query->result();   
  }   


  function select_data_nontaglis2($id = NULL) {
    $noagenda = $id;   
    
    $query = $this->db->query("DECLARE 
      v VARCHAR2(100);
      LCURSOR1 SYS_REFCURSOR;
      LCURSOR2 SYS_REFCURSOR;
      LCURSOR3 SYS_REFCURSOR; 

      BEGIN 
      BILL52.PKG_INFOAGENDA.CARI('553000511308190147',LCURSOR1,LCURSOR2,LCURSOR3,v); 
      :to_grid := LCURSOR1;
      END;");
    return $query->result();   
  }   

  function save_data_nontaglis() {		
    $noagenda = $this->input->post('inNoAgenda');			
    $user = $this->input->post('inUser');	

    $query = $this->db->query("BEGIN BILL52.FLAGMANUAL('$noagenda', '$user'); END;");		
    print_r($query);

  }	


  public function get_data($no_agenda){
    $results = '';
    $this->pblmig_db = $this->load->database('pblmig', true);
    if (!$this->pblmig_db) {
      $m = oci_error();
      trigger_error(htmlentities($m['message']), E_USER_ERROR);
    }

    $p1 = $no_agenda;
    $v = '';

    $stid = oci_parse($this->pblmig_db->conn_id, 'begin BILL52.PKG_INFOAGENDA.CARI(:p1,:p_cursor1,:p_cursor2,:p_cursor3,:v); end;');
    $p_cursor1 = oci_new_cursor($this->pblmig_db->conn_id);
    $p_cursor2 = oci_new_cursor($this->pblmig_db->conn_id);
    $p_cursor3 = oci_new_cursor($this->pblmig_db->conn_id);

    //Send parameters variable  value  lenght
    oci_bind_by_name($stid, ':p1', $p1,18) or die('Error binding string1');
    oci_bind_by_name($stid, ':p_cursor1', $p_cursor1,-1, OCI_B_CURSOR) or die('Error binding string2');
    oci_bind_by_name($stid, ':p_cursor2', $p_cursor2,-1, OCI_B_CURSOR) or die('Error binding string3');
    oci_bind_by_name($stid, ':p_cursor3', $p_cursor3,-1, OCI_B_CURSOR) or die('Error binding string4');
    oci_bind_by_name($stid, ':v', $v,100, SQLT_CHR) or die('Error binding string5');
    //Bind Cursor     put -1

    if(oci_execute($stid)){
      oci_execute($p_cursor1, OCI_DEFAULT);
      oci_fetch_all($p_cursor1, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
      //echo '<br>';
      $results = $cursor;
      //print_r($cursor);  
    }else{
      $e = oci_error($stid);
      $results =  $e['message'];
    } 
    oci_free_statement($stid);
    oci_close($this->pblmig_db->conn_id);

    return $results;

  } 

  /*end ==>*/    
}