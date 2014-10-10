<?php
	class Test_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');
		}
	
		public function get_ad($row,$line)
		{
			$adnum=$row*$line;
			$id[$adnum]=array();
			//查询目前共有多少收费广告
			$qt = $this->db->count_all('adsp');
			//创建0到qt的序列数组
			$numbers = range (0,$qt-1); 
			//shuffle 将数组顺序随机打乱
			shuffle ($numbers);
			$j=min($row,$qt)-1;
			for($i=0;$i<=$j;$i++)
			{
				$id[$i] = base_url()."image/adsp/".$numbers[$i].".gif";
				$this->db->select('company');
				$this->db->where('id', $numbers[$i]); 
				$this->db->from('adsp');
				$alt=$this->db->get();
				if ($alt->num_rows() > 0)
				{
					$row = $alt->row(); 
					$alt=$row->company;
				}
				$altstr[$i]=$alt;
			}
			if($row>$qt)
			{
				for(;$i<=$row;$i++)
				{
					$id[$i]=base_url()."image/adsp/0.gif";
					$altstr[$i]="本广告位虚位以待";
				}
			}
			$result=array($id,$altstr);
			return $result;
		}
	}
?>