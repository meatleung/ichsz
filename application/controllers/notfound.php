<?php
class Notfound extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
  
   function index($title="页面未找到-IC回收站-呆滞IC回收广告展示平台",$content="notfound")
   {
		$this->load->helper('url');
		$data['title']= $title;
		$data['navbar']=$this->load->view('navbar',true);
		$data['content']=$this->load->view($content,true);
		$data['footer']=$this->load->view('footer',true);
		$this->load->view('page',$data);
   }
}
?>