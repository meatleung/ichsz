<?php
	class Ad_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');
		}
	
		public function get_ad($num, $offset)
		{
			$this->db->from('ad')->limit($num, $offset);
			$query = $this->db->get();       
			return $query;
		}
	}
?>