<?php 
	class M_login extends CI_Model{
		
		function cek_login($select,$table,$where){
			$this->db->select($select);
			$this->db->from($table);
			$this->db->where($where);
		//select $select from $table where $where
		//select 'id' from tb_admin where username = 'admin' AND password = password_hash('abcd1234', PASSWORD_BCRYPT);
			return $this->db->get();
		}
	}
 ?>