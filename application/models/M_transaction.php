<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaction extends CI_Model {

	public function tm_transaction()
	{
		return $this->db->get('user')->result();
	}
	public function cek($movie_code)
	{
		$cek_seat = $this->db->where('movie_code', $movie_code)->get('movie')->row()->seat;
		if($cek_seat == 0 ){
			return 0;
		}else{
			return 1;
		}
	}

	public function check()
	{
		$cek=1;
		for($i=0;$i<count($this->input->post('rowid'));$i++){		
				$seat = $this->db->where('movie_code', $this->input->post('movie_code')[$i])
								->get('movie')
								->row()
								->seat;
				$qty = $this->input->post('qty')[$i];
				$sisa= $seat - $qty;
				if($sisa < 0){
					$oke = 0;
				}else{
					$oke = 1;
				}
				$cek = $oke * $cek;
		}
		return $cek;		
	}

	public function save_cart_db()
	{
		for($i=0; $i<count($this->input->post('rowid')); $i++){
				$seat = $this->db->where('movie_code', $this->input->post('movie_code')[$i])
								 ->get('movie')
								 ->row()
								 ->seat;
				$qty = $this->input->post('qty')[$i];
				$sisa = $seat - $qty;
				$updatestock = array('seat' => $sisa);
				$this->db->where('movie_code', $this->input->post('movie_code')[$i])
						 ->update('movie', $updatestock);
		}

		$object=array(
				'user_code'=>$this->input->post('user_code'),
				'buyer_name'=>$this->input->post('buyer_name'),
				'tgl' => date('Y-m-d'),
				'total'=>$this->input->post('total'),
				'moviename'=>$this->input->post('moviename'),
				'movie_qty'=>$this->input->post('movie_qty'),

			);
		$this->db->insert('transaction', $object);
		$tm_nota=$this->db->order_by('transaction_code','desc')
						  ->where('user_code', $this->input->post('user_code'))
						  ->limit(1)
						  ->get('transaction')
						  ->row();
		for ($i=0; $i < count($this->input->post('rowid')); $i++) { 
			$hasil[]=array(
					'transaction_code'=>$tm_nota->transaction_code,
					'movie_code'=>$this->input->post('movie_code')[$i],
					'amount'=>$this->input->post('qty')[$i]
				);


		}
			$proses=$this->db->insert_batch('transaction_detail',$hasil);
			if ($proses) {
				return $tm_nota->transaction_code;

			}else {
				return 0;
			
		}
	}

	public function detail_note($id_nota)
	{
		return $this->db->where('transaction_code', $id_nota)
						->join('user','user.user_code=transaction.user_code')
						->get('transaction')
						->row();
	}
	
	public function detail_transaction($id_nota)
	{
		return $this->db->where('transaction_code', $id_nota)
						->join('movie', 'movie.movie_code=transaction_detail.movie_code')
						->join('movie_genre', 'movie_genre.genre_code=movie.genre_code')
						->get('transaction_detail')->result();
	}

}

/* End of file M_transaction.php */
/* Location: ./application/models/M_transaction.php */