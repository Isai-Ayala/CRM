<?php
	class User_model extends CI_Model
	{
		public function register()
		{
			//arreglo que se inserta a base de datos
			$data = array(
				'name' => $this->input->post('name'),
				'user' => $this->input->post('user'),
				'password' => $this->input->post('password'));

			return $this->db->insert('users', $data);
		}
	}