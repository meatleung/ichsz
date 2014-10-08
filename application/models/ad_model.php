<?php
	class Ad_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	
		public function get_ad($adnum)
		{
			//查询目前共有多少广告
			$qt = $this->db->count_all('ad');
			//创建0到qt的序列数组
			$numbers = range (0,$qt-1); 
			//shuffle 将数组顺序随机打乱 
			shuffle ($numbers);
			$id[$adnum]=array();
			$j=min($adnum,$qt)-1;
			for($i=0;$i<=$j;$i++)
			{
				$id[$i] = $numbers[$i];
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
			if($adnum>$qt)
			{
				for(;$i<=$adnum;$i++)
				{
					$id[$i]=0;
					$altstr[$i]="本广告位虚位以待";
				}
			}
			$result=array($id,$altstr);
			return $result;
		}
	}
?>