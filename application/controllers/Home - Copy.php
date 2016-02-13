<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();		
		/*if ($this->session->userdata('logged')<>1) {
			redirect(site_url('auth'));
		}	*/		
		$this->load->model('mdata1');
		$this->load->model('OracleModel');
		
	}

	public function index()
	{	
		$data['kosong'] =0;					
		$this->load->view('vmain', $data);	
	}	
	
	public function getdata() {
		$id = $this->input->post('inNoAgenda');

		$id='553000511308190147';
		$res = $this->mdata1->get_data($id);
		print_r($res);  
	}

	/*

	if(empty($id)){
		$data['kosong'] =1;
		$this->load->view('vmain', $data);
	} else {			
		$data['DataNontaglis'] = $this->mdata1->select_data_nontaglis($id);
		$data['DataNontagliss'] = $this->mdata1->select_data_nontagliss($id);
		$data['DataNontaglisss'] = $this->mdata1->select_data_nontaglisss($id);       
		if(empty($data['DataNontaglis'])){		
			$data['kosong'] =1;			
			$this->load->view('vmain', $data);
		} 
		else {	
			$data['kosong'] =0;			
			$this->load->view('vmain_get_nontaglis', $data);						
		}			
	} */                


	public function save() {
		$res = $this->mdata1->save_data_nontaglis();
		if($res){
			redirect('home');
		}else{
			redirect('auth');
		}
	}       

	function cursor(){

		$conn = oci_connect('SECMAN', 'SECMAN', '(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =192.168.10.24)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = cisqa)))');

		if ($conn) {
			echo 'ok';


                // Create the statement and bind the variables (parameter, value, size)
			$stid = oci_parse($conn, 'begin :cursor := BILL52.PKG_INFOAGENDA.CARI("553000511308190147",LCURSOR1,LCURSOR2,LCURSOR3,v); end;');
			/*foreach ($binds as $variable)
			oci_bind_by_name($stid, $variable["parameter"], $variable["value"], $variable["size"]);*/

                // Create the cursor and bind it
			$p_cursor = oci_new_cursor($conn);
			oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

                // Execute the Statement and fetch the data
			oci_execute($stid);
			oci_execute($p_cursor, OCI_DEFAULT);
			oci_fetch_all($p_cursor, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);

                // Return the data
			return $data; 
		}else{
			echo 'erro';
		}
	}

	function manual(){
		$conn = oci_connect('SECMAN', 'SECMAN', '(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =192.168.10.24)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = cisqa)))');
		if (!$conn) {
			$m = oci_error();
			trigger_error(htmlentities($m['message']), E_USER_ERROR);
		}

		/*
		$sql = 'call BILL52.PKG_INFOAGENDA.CARI(:no_agenda,:prm_policy_no,:prm_date_of_loss,:prm_policy_details,:prm_success)';
		$prm_policy_no = 'LCURSOR1';
		$prm_date_of_loss = 'LCURSOR2';


		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}

		$stmt = oci_parse($conn, $sql);
		if (!$stmt)
			print "Error parsing SQL";

		$prm_policy_details = oci_new_cursor($conn);
		$prm_success = '';

		oci_bind_by_name($stmt, ':no_agenda', '553000511308190147') 
		or die('Error binding string');

		oci_bind_by_name($stmt, ':prm_policy_no', $prm_policy_no, -1, OCI_B_CURSOR) 
		or die('Error binding string');

		oci_bind_by_name($stmt, ':prm_date_of_loss', $prm_date_of_loss, -1, OCI_B_CURSOR) 
		or die('Error binding string');

		oci_bind_by_name($stmt, ':prm_policy_details', $prm_policy_details, -1, OCI_B_CURSOR) 
		or die('Error binding cursor');

		oci_bind_by_name($stmt, ':prm_success', $prm_success) 
		or die('Error binding string');

				// Execute Statement
		$execute_return = oci_execute($stmt);
		if (!$execute_return)
			print "Error Execution Stored Procedure";

				//execute the CURSORS (this is one of the weird things about ref cursors
				// w/ Oracle-- they must get EXECUTED

		oci_execute($prm_policy_details);

		print "<pre>";
		print "Returned parameters<br/>\"";
		print_r($prm_policy_details);
		print "\"<br/>";
		print "Sucess Code:" . $prm_success . "<br/>";
		print "</pre>"; */

		//You must asign before.
		
		$p1 = '553000511308190147';
		$p2 = 'LCURSOR1';
		$p3 = 'LCURSOR2';
		$p4 = 'LCURSOR3';
		$p5 = '';

		$stid = oci_parse($conn, 'begin BILL52.PKG_INFOAGENDA.CARI(:p1,:p2,:p3,:p4,:p5); end;');
		$p_cursor1 = oci_new_cursor($conn);
		$p_cursor2 = oci_new_cursor($conn);
		$p_cursor3 = oci_new_cursor($conn);

    //Send parameters variable  value  lenght
		oci_bind_by_name($stid, ':p1', $p1,18) or die('Error binding string1');
		oci_bind_by_name($stid, ':p2', $p_cursor1,-1, OCI_B_CURSOR) or die('Error binding string2');
		oci_bind_by_name($stid, ':p3', $p_cursor2,-1, OCI_B_CURSOR) or die('Error binding string3');
		oci_bind_by_name($stid, ':p4', $p_cursor3,-1, OCI_B_CURSOR) or die('Error binding string4');
		oci_bind_by_name($stid, ':p5', $p5,100, SQLT_CHR) or die('Error binding string5');

    //Bind Cursor     put -1

		//oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

    // Execute Statement
		/*
		
		if (oci_execute($p_cursor1)){
			
			while (($row = oci_fetch_array($p_cursor1, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
				echo $row['NOAGENDA'] . "<br />\n";
			} 
		}*/
		

		

		if(oci_execute($stid)){
			oci_execute($p_cursor1, OCI_DEFAULT);

			oci_fetch_all($p_cursor1, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
			echo '<br>';
			print_r($cursor);  
		}else{
			$e = oci_error($stid);
			echo $e['message'];
		} 


		/*
		if($stid != false){
		    // parsing empty query != false
			if(oci_execute($stid)){
		        // executing empty query != false
				if(oci_fetch_all($stid, $cursor, 0, -1, OCI_FETCHSTATEMENT_BY_ROW) == false){
		            // but fetching executed empty query results in error (ORA-24338: statement handle not executed)
					$e = oci_error($stid);
					echo $e['message'];
				}
			}
			else{
				$e = oci_error($stid);
				echo $e['message'];
			}
		}
		else{
			$e = oci_error($link);
			echo $e['message'];
		}  */

	}



}

