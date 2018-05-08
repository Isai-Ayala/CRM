<?php
	class Admin_model extends CI_Model //funciones para manipular informacion de los administradores
	{
		public function get_salesmen()
		{
			$this->db->order_by('userid','DESC');
			$this->db->where('roleid', 2);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function delete_salesman($id)
		{
			$this->db->where('userid', $id);
			$this->db->delete('users');
			return true;

		}
	}