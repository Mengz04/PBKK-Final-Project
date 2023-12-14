<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_movie extends CI_Model {

	public function get_movie()
	{
		$tm_movie=$this->db->join('movie_genre','movie_genre.genre_code=movie.genre_code')
		->get('movie')->result();
		return $tm_movie;
	}
	public function amount_data(){
		return $this->db->get('movie')->num_rows();
	}
	public function data_genre()
	{
		return $this->db->get('movie_genre')->result();
	}
	public function save_movie($nama_file)
	{
		if ($nama_file=="") {
				$object=array(
						'movie_title'=>$this->input->post('movie_title'),
						'year'=>$this->input->post('year'),
						'price'=>$this->input->post('price'),
						'genre_code'=>$this->input->post('category'),
						'publisher'=>$this->input->post('publisher'),
						'director'=>$this->input->post('director'),
						'seat'=>$this->input->post('seat')

					);
			}	else {
				$object=array(
						'movie_title'=>$this->input->post('movie_title'),
						'year'=>$this->input->post('year'),
						'price'=>$this->input->post('price'),
						'genre_code'=>$this->input->post('category'),
						'movie_img'=>$nama_file,
						'publisher'=>$this->input->post('publisher'),
						'director'=>$this->input->post('director'),
						'seat'=>$this->input->post('seat'),

					);
			}
			return $this->db->insert('movie', $object);
		}

		public function detail($a)
		{
			$tm_movie=$this->db->join('movie_genre', 'movie_genre.genre_code=movie.genre_code')
			->where('movie_code',$a)
			->get('movie')
			->row();
			return $tm_movie;
		}

		public function movie_update_no_foto()
		{
			$object=array(
					'movie_title'=>$this->input->post('movie_title'),
						'year'=>$this->input->post('year'),
						'price'=>$this->input->post('price'),
						'genre_code'=>$this->input->post('genre'),
						'publisher'=>$this->input->post('publisher'),
						'director'=>$this->input->post('director'),
						'seat'=>$this->input->post('seat')
				);
			return $this->db->where('movie_code', $this->input->post('movie_code'))
							->update('movie',$object);

		}
		public function movie_update_dengan_foto($nama_foto='')
		{
			$object=array(
						'movie_title'=>$this->input->post('movie_title'),
						'year'=>$this->input->post('year'),
						'price'=>$this->input->post('price'),
						'genre_code'=>$this->input->post('genre'),
						'movie_img'=>$nama_foto,
						'publisher'=>$this->input->post('publisher'),
						'director'=>$this->input->post('director'),
						'seat'=>$this->input->post('seat'),

					);
			return $this->db->where('movie_code', $this->input->post('movie_code'))
							->update('movie',$object);

		}
		public function hapus_movie($movie_code='')
		{
			return $this->db->where('movie_code', $movie_code)->delete('movie');
		}

}

/* End of file M_book.php */
/* Location: ./application/models/M_book.php */