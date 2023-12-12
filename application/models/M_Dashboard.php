<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function get_jml_movie(){
		return $this->db->select('count(*) as jml_movie')
					    ->get('movie')
					    ->row();
	}

	public function get_jml_transaction(){
		return $this->db->select('SUM(total) as jml_transaction')
					    ->get('transaction')
					    ->row();
	}

	public function get_jml_pengguna(){
		return $this->db->select('count(*) as jml_pengguna')
					    ->get('transaction')
					    ->row();
	}

	public function get_movie_cat(){
		return $this->db->select('count(*) as movie_cat')
					    ->get('movie_genre')
					    ->row();
	}

	public function get_sys_user(){
		return $this->db->select('count(*) as sys_user')
					    ->get('user')
					    ->row();
	}

	public function get_movie_seat(){
		return $this->db->select('SUM(seat) as movie_seat')
					    ->get('movie')
					    ->row();
	}

	public function get_sales_p(){
		return $this->db->select('SUM(total) as sales_p')
						->where('tgl > NOW() - INTERVAL 24 HOUR')
					    ->get('transaction')
					    ->row();
	}

	public function get_movie()
	{
		$tm_movie=$this->db->join('movie_genre','movie_genre.genre_code=movie.genre_code')
		->get('movie')->result();
		return $tm_movie;
	}

}
?>