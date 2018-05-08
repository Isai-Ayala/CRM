<?php
	class admin extends CI_Controller
	{
		public function index()
		{
			$data['title'] = ucfirst('Registered Salesmen');

			$data['salesmen'] = $this->admin_model->get_salesmen();

			$this->load->view('templates/header');
			$this->load->view('admin/index', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id)
		{
			$this->admin_model->delete_salesman($id);

			$this->session->set_flashdata('user_deleted', 'The user has been successfully deleted!');

			redirect('/admin');
		}
	}