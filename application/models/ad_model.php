<?php
	class Ad_model extends CI_Model 
	{
	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	
	public function get_adqt()
	{
		$qt = $this->db->count_all('ad');
		return $qt;
	}
	
	}
?>