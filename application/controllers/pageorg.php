<?php
class Pageorg extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
  
   function index()
   {
		$this->load->helper('url');
		$data['title']= "IC回收站-呆滞IC回收广告展示平台";
		$this->load->model("Ad_model");
		$data['adqt']=$this->Ad_model->get_adqt();
		$data['navbar']=$this->load->view('navbar',true);
		$data['content']=$this->load->view('ad',$data);
		$data['footer']=$this->load->view('footer',true);
		$this->load->view('page',$data);
   }
}
?>