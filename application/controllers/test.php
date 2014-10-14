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
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		$botchar = "/(bot|crawl|spider|slurp|yahoo|sohu-search|lycos|robozilla)/i";
		if(preg_match($botchar, $ua)) 
		{
			$data['str']="robot";
		}
		else
		{
			$data['str']="Norobot";
		}
		$this->load->view('testview',$data);
   }
}
?>