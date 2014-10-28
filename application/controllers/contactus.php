<?php
class Contactus extends CI_Controller {
   public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	
   function index()
   {
		//载入表格类
		$this->load->library('table');
		$this->table->set_caption('联系方式');
		$tmpl = array (
                    'table_open'          => '<div id="container"><table class="zebra">',

                    'heading_row_start'   => '<thead><tr>',
                    'heading_row_end'     => '</thead><tbody>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</tbody></table></div>'
              );
		$this->table->set_template($tmpl);
		$this->table->add_row('地址', '深圳市龙岗区龙岗大道科伦特大厦4078室');
		$this->table->add_row('电话', '15817454826（李生） 13652368174（梁生）');
		$this->table->add_row('QQ', '13652368174（梁生）');
		
		$data['title']= "联系我们-IC回收站-IC呆料集散地";
		$data['head']="<!--导入表格CSS--><link rel=\"stylesheet\" href=\"".base_url()."css/table.css\" type=\"text/css\">";
		$data['head']=$this->load->view('head',$data,true);
		$data['navbar']=$this->load->view('navbar','',true);
		$data['content']=$this->load->view('contactus',$data,true);
		$data['footer']=$this->load->view('footer','',true);
		$this->load->view('page',$data);
   }
}
?>