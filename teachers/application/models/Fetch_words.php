<?php
class Fetch_words extends CI_Model {
	function fetch_word($word2){
		$this->load->database();
		$lang = $this->session->userdata('lang');
		$word = $this->db->query("SELECT * FROM translations WHERE title = '$word2'");
		$word = $word->result();
		if(!$word){
			echo $word2;
		}
		return $word[0]->$lang;
		
	}
	
	
	
	function fetch_all_words(){
		$words = array();
		$this->load->database();
		$lang = $this->session->userdata('lang');
		$all_words = $this->db->query("SELECT * FROM translations");
		$all_words = $all_words->result();
		foreach($all_words as $w){
			$title = $w->title;
			$words[$title] = $this->fetch_words->fetch_word($title);
		}
		
		
		
		
		return $words;
	}
}