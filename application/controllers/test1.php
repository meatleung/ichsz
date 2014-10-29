<?php
class Test1 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ic_model');
	}
   
	function index()
	{
		$data['id']=1;
		$data['field']=array("id","model","brand","lotid","package","print","amount","remarks","name","tel","qq");
		$str=$data['field'][0];
		for($i=1;$i<count($data['field']);$i++) 
		{
			$str=$str.",".$data['field'][$i];
		}
		$data['icdetail'] = $this->ic_model->get_icdetail(1,$str);
		
		$data['icdetail']=$this->load->view('test',$data,true);
		echo $data['icdetail'];
	}
}
?>