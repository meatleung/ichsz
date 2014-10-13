<?php
class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
  
   function index()
   {
		$this->load->helper('url');
		if(!$_GET["width"]) 
		{
			echo '<script>location=location.href+"?width="+document.body.clientWidth+"&height="+document.body.clientHeight;</script>';
			exit;
		}
		$width=$_GET['width']; 
		$height=$_GET['height'];
		//获取广告图片尺寸，image_size[0]为宽，image_size[1]为高
		$image_size=getimagesize(base_url()."image/ad/0.gif");
		//计算网页宽度可容纳多少列广告
		$data['row']=floor($width/$image_size[0]);	
		//计算网页高度可容纳多少行广告
		$data['line']=floor(($height-30)/$image_size[1]);
		$this->load->model("Test_model");
		$data['ad']=$this->Test_model->get_ad($data['row'],$data['line']);
		$this->load->view('testview',$data);
   }
}
?>