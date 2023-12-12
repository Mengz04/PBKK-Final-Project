<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_movie','movie');
	}
	public function index()
	{
		$this->load->library('pagination');
		$amount_data = $this->movie->amount_data();
		$data['get_movie']=$this->movie->get_movie();
		$data['genre']=$this->movie->data_genre();
		$data['content']="v_movie";

		$data['total_rows'] = $amount_data;
		$data['per_page'] = 1;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($data);		
		$data['user'] = $this->movie->get_movie($data['per_page'],$from);

		$this->load->view('template', $data, FALSE);
	}
	public function add()
	{
		$this->form_validation->set_rules('movie_title', 'movie_title', 'trim|required');
		$this->form_validation->set_rules('year', 'year', 'trim|required');
		$this->form_validation->set_rules('price', 'price', 'trim|required');
		$this->form_validation->set_rules('category', 'category', 'trim|required');
		$this->form_validation->set_rules('publisher', 'publisher', 'trim|required');
		$this->form_validation->set_rules('seat', 'seat', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			if ($_FILES['gambar']['name']!="") {
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$this->session->set_flashdata('message', $this->upload->display_errors());
				redirect('movie','refresh');
			}
			else{
				if ($this->movie->save_movie($this->upload->data('file_name'))) {
					$this->session->set_flashdata('message', 'movie has been added successfully');
				} else {
					$this->session->set_flashdata('message', 'movie has failed to Add');
				}
				redirect('movie','refresh');
			}
		} else {
			if ($this->movie->save_movie('')) {
				$this->session->set_flashdata('message', 'movie has been added successfully');
			} else {
				$this->session->set_flashdata('message', 'movie has failed to Add');
			}
			redirect('movie','refresh');
		}
	} else {
		$this->session->set_flashdata('message', validation_errors());
		redirect('movie','refresh');
	}
}

	public function edit_movie($id)
	{
		$data=$this->movie->detail($id);
		echo json_encode($data);
	}

	public function movie_update()
	{
		if ($this->input->post('save')) {
			if ($_FILES['gambar']['name']=="") {
				if ($this->movie->movie_update_no_foto()) {
					$this->session->set_flashdata('message', 'movie Details has been updated successfully.');
					redirect('movie');
				} else {
					$this->session->set_flashdata('message', 'Failed to update');
					redirect('movie');
				}
			} else {
				$config['upload_path'] = './assets/gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '100000000';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar')){
					$this->session->set_flashdata('message', 'failed to upload');
					redirect('movie');
				}
				else{
					if ($this->movie->movie_update_dengan_foto($this->upload->data("file_name"))) {
						$this->session->set_flashdata('message', 'Updated successfully!');
						redirect('movie');
					} else {
						$this->session->set_flashdata('message', 'Failed to update');
						redirect('movie');
					}
				}
			}
		}
	}

	public function hapus($movie_code='')
	{
		if ($this->movie->hapus_movie($movie_code)) {
			$this->session->set_flashdata('message', 'movie has been deleted successfully.');
			redirect('movie','refresh');
		} else {
			$this->session->set_flashdata('message', 'Delete Failed');
			redirect('movie','refresh');
		}
	}

}

/* End of file movie.php */
/* Location: ./application/controllers/movie.php */