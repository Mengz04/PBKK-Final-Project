<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model {

	public function get_genre()
	{
		$tm_genre=$this->db->get('movie_genre')->result();
		return $tm_genre;
	}

	public function save_kat()
	{
		$object=array(
				'genre_code'=>$this->input->post('genre_code'),
				'genre_name'=>$this->input->post('genre_name')
			);
		return $this->db->insert('movie_genre', $object);;
	}
	public function detail($a)
	{
		return $this->db->where('genre_code', $a)
						->get('movie_genre')
						->row();
	}
	public function edit_kat()
	{
		$object=array(
				'genre_code'=>$this->input->post('genre_code'),
				'genre_name'=>$this->input->post('genre_name')
			);
		return $this->db->where('genre_code', $this->input->post('genre_code_lama'))->update('movie_genre',$object);
	}

	public function hapus_kat($id='')
	{
		return $this->db->where('genre_code', $id)->delete('movie_genre');
	}
}

/* End of file M_genre.php */
/* Location: ./application/models/M_genre.php */