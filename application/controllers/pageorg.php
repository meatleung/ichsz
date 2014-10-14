<?php
class Pageorg extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->helper('url');
	}
  
   function index()
   {
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		$botchar = "/(bot|crawl|spider|slurp|yahoo|sohu-search|lycos|robozilla)/i";
		if(preg_match($botchar, $ua)) 
		{
			$width=900;
			$height=500;
		}
		elseif(!$_GET['width'])
		{
			echo '<script>location=location.href+"?width="+document.body.clientWidth+"&height="+document.body.clientHeight;</script>';
			exit();
		}
		if(!isset($width))
		{
			$width=$_GET['width'];
			$height=$_GET['height'];
		}
		//获取广告图片尺寸，image_size[0]为宽，image_size[1]为高
		$image_size=getimagesize(base_url()."image/ad/0.gif");
		//计算网页宽度可容纳多少列广告
		$data['row']=floor($width/$image_size[0]);	
		//计算网页高度可容纳多少行广告
		$data['line']=floor(($height-130)/$image_size[1]);
		$data['title']= "IC回收站-呆滞IC回收广告展示平台";
		$this->load->model("Ad_model");
		//将页面容纳广告总数传给广告模型，广告模型随机生成并返回需展示的广告图片id、alt信息
		$data['ad']=$this->Ad_model->get_ad($data['row'],$data['line']);
		$data['navbar']=$this->load->view('navbar',true);
		$data['content']=$this->load->view('ad',$data);
		$data['footer']=$this->load->view('footer',true);
		$this->load->view('page',$data);
   }
}
?>