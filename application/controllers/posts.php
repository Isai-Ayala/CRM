<?php
	class Posts extends CI_Controller
	{
		public function index()
		{
			$data['title'] = ucfirst('latest posts');

			$data['posts'] = $this->post_model->get_posts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL)
		{
			$data['posts'] = $this->post_model->get_posts($slug);

			if(empty($data['posts']))
				show_404();

			$this->load->view('templates/header');
			$this->load->view('posts/view',$data);
			$this->load->view('templates/footer');
		}

		public function create()
		{

			$data['title'] = ucfirst('Create Post');

			$this->form_validation->set_rules('post', 'post', 'required');

			if($this->form_validation->run() === false)
			{
				if((null !== $this->input->post('post')) && $this->input->post('post') === "")
					$data['emptyPost'] = '*post is a required field';
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');	
			}
			else
			{
				$this->post_model->create_post();
				redirect('/posts');
			}
		}

		public function delete($id)
		{
			$this->post_model->delete_post($id);
			redirect('/posts');
		}

		public function edit($slug)
		{

			$data['posts'] = $this->post_model->get_posts($slug);

			if(empty($data['posts']))
			{
				show_404();
			}

			$data['title'] = 'Edit Post';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');	
		}

		public function update()
		{
			$this->post_model->update_post();
			redirect('posts');
		}
	}