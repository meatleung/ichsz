<?php
class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->helper('url');
	}
  
   function index()
   {
		$this->load->view('testview');
   }
}
?>