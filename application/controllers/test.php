<?php
class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ic_model');
	}
  
   function index()
   {
		$field=array("id"=>"id","型号"=>"model","品牌"=>"brand","批号"=>"lotid","封装"=>"package","丝印"=>"print","数量"=>"amount","备注"=>"remarks","联系人"=>"name","电话"=>"tel","qq"=>"qq");
		echo $field['数量'];
   }

}
?>