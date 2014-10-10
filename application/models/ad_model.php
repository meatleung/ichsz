<?php
	class Ad_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');
		}
	
		public function get_ad($row,$line)
		{
			$allad=$row*$line;//30
			$id[$allad]=array();//$id[30]
			
			$adspline=1;//设置收费广告行数为1行
			$adspnum=$adspline*$row;//6
			//查询目前共有多少收费广告
			$qt = $this->db->count_all('adsp');//1
			//创建0到qt的序列数组
			$numbers = range (0,$qt-1); 
			//shuffle 将数组顺序随机打乱
			shuffle ($numbers);
			$j=min($adspnum,$qt)-1;//0
			for($i=0;$i<=$j;$i++)
			{
				$id[$i] = base_url()."image/adsp/".$numbers[$i].".gif";
				$this->db->select('company');
				$this->db->where('id', $numbers[$i]); 
				$this->db->from('adsp');
				$alt=$this->db->get();
				if ($alt->num_rows() > 0)
				{
					$temp = $alt->row(); 
					$alt=$temp->company;
				}
				$altstr[$i]=$alt;
			}
			if($adspnum>$qt)
			{
				for(;$i<$adspnum;$i++)
				{
					$id[$i]=base_url()."image/adsp/0.gif";
					$altstr[$i]="本广告位虚位以待";
				}
			}
			
			$oadnum=$allad-$adspnum;
			//查询目前共有多少普通广告
			$qt = $this->db->count_all('ad');
			//创建0到qt的序列数组
			$numbers = range (0,$qt-1); 
			//shuffle 将数组顺序随机打乱
			shuffle ($numbers);
			$j=min($oadnum,$qt)-1;
			for($idtemp=$adspnum,$i=0;$i<=$j;$i++,$idtemp++)
			{
				$id[$idtemp] = base_url()."image/ad/".$numbers[$i].".gif";
				$this->db->select('company');
				$this->db->where('id', $numbers[$i]); 
				$this->db->from('ad');
				$alt=$this->db->get();
				if ($alt->num_rows() > 0)
				{
					$temp = $alt->row(); 
					$alt=$temp->company;
				}
				$altstr[$idtemp]=$alt;
			}
			for(;$idtemp<$allad;$idtemp++)
			{
				$id[$idtemp]=base_url()."image/ad/0.gif";
				$altstr[$idtemp]="本广告位虚位以待";
			}
			$result=array($id,$altstr);
			return $result;
		}
	}
?>