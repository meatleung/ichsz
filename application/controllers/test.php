<?php
class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('table');
		$this->load->model('ad_model');
	}
  
   function index()
	{
		$this->load->view('test');
	}
	
	function detail()
	{
		echo $this->uri->segment(3);
	}
}
?>