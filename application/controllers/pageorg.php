<?php
class Pageorg extends CI_Controller {
   function index()
   {
		$this->load->helper('url');
		$data['title']= "IC回收站-呆滞IC回收广告展示平台";
		$data['navbar']=$this->load->view('navbar',true);
		$data['content']=$this->load->view('content',true);
		$data['footer']=$this->load->view('footer',true);
		$this->load->view('page',$data);
   }
   
   function redirect()
   {
		$this->load->view('navbar');
   }
}
?>