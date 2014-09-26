<?php
class Pageorg extends CI_Controller {
   function index($title="IC回收站-呆滞IC回收广告展示平台",$content="ad")
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