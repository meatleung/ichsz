<?php
	class Ic_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');
		}
	
		public function get_icmodel()
		{
			$query = $this->db->query('select id ,model from icdig');     
			return $query;
		}
		
		public function get_icdetail($id,$str)
		{
			$query = $this->db->query('select '.$str.' from icdig where id='.$id);     
			return $query->row();
		}
	}
?>