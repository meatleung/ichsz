<?php
class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
  
   function index()
   {
		$this->load->helper('url');
		$this->load->view('testview');
   }
}
?>