<?php
class Test extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
	}
	function index()
	{
		$this->load->helper('url');
		$this->load->model("Ad_model");
		$data['qt']=$this->Ad_model->get_adqt();
		$this->load->view('footer',$data);
	}
}
?>