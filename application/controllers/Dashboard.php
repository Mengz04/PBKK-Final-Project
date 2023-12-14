<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard');
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['content'] = 'Home';
			$data['jml_movie'] = $this->M_Dashboard->get_jml_movie();
			$data['jml_transaction'] = $this->M_Dashboard->get_jml_transaction();
			$data['jml_pengguna'] = $this->M_Dashboard->get_jml_pengguna();
			$data['movie_cat'] = $this->M_Dashboard->get_movie_cat();
			$data['sys_user'] = $this->M_Dashboard->get_sys_user();
			$data['movie_seat'] = $this->M_Dashboard->get_movie_seat();
			$data['sales_p'] = $this->M_Dashboard->get_sales_p();
			$data['get_movie']=$this->M_Dashboard->get_movie();
			$this->load->view('template', $data);

		} else {
			redirect('admin/login');
		}
	}

}

/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */
?>