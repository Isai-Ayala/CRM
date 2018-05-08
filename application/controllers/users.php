<!-- Controlador para los usuarios !-->
<?php
	class Users extends CI_Controller
	{
		public function register() //funcion para dar de alta un usuario nuevo
		{
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('user', 'User', 'required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('password2', 'Confirm Password','matches[password]');

			$userExists = $this->check_user_exists($this->input->post('user'));

			
			if($this->form_validation->run() === false || $userExists)
			{
				if($userExists)
					echo '*The user already exists. Please try a different user <br>';
				if(null !== $this->input->post('user') && $this->input->post('user') === "")
					echo '*The User field is required <br>';
				if(null !== $this->input->post('name') && $this->input->post('name') === "")
					echo '*The Name field is required <br>';
				if(null !== $this->input->post('password') && $this->input->post('password') === "")
					echo '*The Password field is required <br>';
				if(null !== $this->input->post('password2') && null !== $this->input->post('password') && strcmp($this->input->post('password2'), $this->input->post('password')))
					echo '*The Password and Confirm Password Fields must match <br>';


				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$this->user_model->register();

				$this->session->set_flashdata('user_registered', 'The user ' . $this->input->post('user') . ', has been successfully registered!');

				redirect('posts');
			}
		}

		public function login()
		{
			$data['title'] = 'Login User';

			$this->form_validation->set_rules('user', 'User', 'required|callback_check_user_exists');
			$this->form_validation->set_rules('password','Password','required');
			
			if($this->form_validation->run() === false)
			{
				if(null !== $this->input->post('user') && $this->input->post('user') === "")
					echo '*The User field is required <br>';
				if(null !== $this->input->post('password') && $this->input->post('password') === "")
					echo '*The Password field is required <br>';

				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$username = $this->input->post('user');
				$password = $this->input->post('password');
				$userid = $this->user_model->login($username, $password);

				if($userid)
				{
					$roleid = $this->user_model->get_roleid($userid);
					$user_data = array(
						'userid' => $userid,
						'user' => $username,
						'roleid' => $roleid,
						'logged_in' => true);

					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('user_login', 'The user was successfully logged in!');

					switch($roleid)
					{
						case 1: redirect('admin');
							break;
						case 2: redirect('posts');
							break;
					}
				}
				else
				{
					$this->session->set_flashdata('login_failed', 'login is invalid!');
					$this->session->keep_flashdata('login_failed');

					redirect('users/login');
				}

			}
		}

		public function logout()
		{
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('user');

			$this->session->set_flashdata('logged_out', 'The user was successfully logged out!');

			redirect('users/login');
		}

		public function edit($slug)
		{
			if($slug != $this->session->userdata('userid'))
			{
				if($this->session->userdata('roleid') != 1)
					redirect('posts');
				else
					redirect('admin');
			}
			$data['users'] = $this->user_model->get_users($slug);

			if(empty($data['users']))
			{
				show_404();
			}

			$data['title'] = 'Edit User';

			$this->load->view('templates/header');
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');	
		}

		public function update()
		{
			$this->user_model->update_user();

			$this->session->set_flashdata('user_updated', 'The user has been successfully updated!');

			if($this->session->userdata('roleid') == 1)
				redirect('admin');
			else
				redirect('posts');
		}

		public function check_user_exists($user)
		{
			if($this->user_model->check_user_exists($user))
				return true;
			return false;
		}

		public function check_password_correct($user, $password)
		{
			if($this->user_model->check_password_correct($user, $password))
				return true;
			return false;
		}
	}