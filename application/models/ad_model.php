<?php
	class Ad_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');
		}
	
		public function get_ad($str)
		{
			$query = $this->db->query('select '.$str.' from ad'); 
			return $query;
		}
		
		public function get_massic($str)
		{
			$query = $this->db->query('select '.$str.' from massic'); 
			return $query;
		}
		
		public function get_contact($str,$id)
		{
			$query = $this->db->query('select '.$str.' from massic where id='.$id); 
			return $query;
		}
	}
?>