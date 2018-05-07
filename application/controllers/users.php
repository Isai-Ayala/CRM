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

			
			if($this->form_validation->run() === false)
			{
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
				$this->session->set_flashdata('user_registered', 'The user ' . $this->input->post('user') . ', has been successfully registered!');

				redirect('posts');
			}
		}
	}