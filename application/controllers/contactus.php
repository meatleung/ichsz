<?php
class Contactus extends CI_Controller {
   function index($title="联系我们-IC回收站-呆滞IC回收广告展示平台",$content="contactus")
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