<?php
	class Test_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	
		public function get_ad()
		{
			$id=array(0=>"0",1=>"1");
			$altstr[2]=array();
			for($i=0;$i<=1;$i++)
			{
				$this->db->select('company');
				$this->db->where('id', $id[$i]);
				$this->db->from('ad');
				$alt=$this->db->get();
				if ($alt->num_rows() > 0)
				{
					$row = $alt->row(); 
					$alt=$row->company;
				}
				$altstr[$i]=$alt;
			}
			return $altstr;
		}
	}
?>