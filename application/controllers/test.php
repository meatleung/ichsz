<?php
class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
  
   function index()
   {
		$this->load->helper('url');
		$this->load->model("Test_model");
		$data['ad']=$this->Test_model->get_ad();
		$this->load->view('testview',$data);
   }
}
?>