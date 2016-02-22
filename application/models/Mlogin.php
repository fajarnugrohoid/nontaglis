<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Mlogin extends CI_Model {
    
    function set_login($username,$password){       
		$sql = "SELECT * FROM MON_USERTAB WHERE ID_USER='$username' AND PASSWD=LOWER(F_MD5('$password')) ";
        $query = $this->db->query($sql);
        return $query->result();
    }	
}
 
/* End of file Auth_model.php */
/* Location: ./application/models/Mlogin.php */