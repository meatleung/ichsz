<?php
class Notfound extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
  
   function index()
   {
		$data['title']= "页面未找到-IC回收站-IC呆料集散地";
		$data['navbar']=$this->load->view('navbar',true);
		$data['content']=$this->load->view("notfound",true);
		$data['footer']=$this->load->view('footer',true);
		$this->load->view('page',$data);
   }
}
?>