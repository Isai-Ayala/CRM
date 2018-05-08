<?php
	class User_model extends CI_Model
	{
		public function update_user()
		{
			$data = array(
				'user' => $this->input->post('user'),
				'name' => $this->input->post('name'),
				'password' => $this->input->post('password'));

			$this->db->where('userid', $this->session->userdata('userid'));
			$this->db->update('users',$data);
		}

		public function get_users($slug = false)
		{
			$this->db->order_by('userid','DESC');
			if($slug === false)
			{
				$query = $this->db->get('users');
				return $query->result_array();
			}

			$query = $this->db->get_where('users', array('userid' => $slug));
			return $query->row_array();
		}

		public function register() //inserta un usuario a la base de datos
		{
			$adminrole = 1;
			$salesmanrole = 2;
			$clientrole = 3;


			if($this->session->userdata('roleid') == $adminrole)
				$roleid = $salesmanrole;
			else
				$roleid = $clientrole;
			//arreglo que se inserta a base de datos
			$data = array(
				'name' => $this->input->post('name'),
				'user' => $this->input->post('user'),
				'roleid' => $roleid,
				'password' => $this->input->post('password'));

			return $this->db->insert('users', $data);
		}

		public function login($user, $password)
		{
			//crea la sesion del usuario
			$this->db->where('user', $user);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1)
				return $result->row(0)->userid;
			return false;
		}

		public function get_roleid($userid)
		{
			$this->db->where('userid', $userid);
			$result = $this->db->get('users');

			if($result->num_rows() == 1)
				return $result->row(0)->roleid;
			return false;
		}

		public function check_user_exists($user)
		{
			//revisa en base de datos si existe el usuario
			$query = $this->db->get_where('users', array(
				'user' => $user));

			if(!empty($query->row_array()))
				return true;
			return false;
		}

		public function check_password_correct($user, $password)
		{
			//revisa en base de datos si el usuario ingreso la contraseña correcta
			$query = $this->db->get_where('users', array(
				'user' => $user,
				'password' => $password));
			if(!empty($query->row_array()))
				return true;
			return false;
		}
	}