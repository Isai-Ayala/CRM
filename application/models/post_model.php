<?php
	class Post_model extends CI_Model
	{
		public function __construtct()
		{
			$this->load->database();
		}

		public function get_posts($slug = false)
		{
			$this->db->order_by('postsid','DESC');
			if($slug === false)
			{
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('postsid' => $slug));
			return $query->row_array();
		}

		public function create_post()
		{
			$data = array(
				'post' => $this->input->post('post'),
				'date' => date("Y-m-d H:i:s"),
				'userid' => $this->session->userdata('userid'));

			return $this->db->insert('posts',$data);
		}

		public function delete_post($id)
		{
			$this->db->where('postsid', $id);
			$this->db->delete('posts');
			return true;

		}

		public function update_post()
		{
			$data = array(
				'post' => $this->input->post('post'));

			$this->db->where('postsid', $this->input->post('postsid'));
			$this->db->update('posts',$data);
		}
	}