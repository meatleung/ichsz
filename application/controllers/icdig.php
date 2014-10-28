<?php
class Icdig extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ic_model');
	}
	
   function index()
   {
		$data['icmodel'] = $this->ic_model->get_icmodel();
		
		//载入表格类
		$this->load->library('table');
		$this->table->set_heading('ID', '型号');
		$this->table->set_caption('IC呆料表');
		$tmpl = array (
                    'table_open'          => '<table id="icdig" class="zebra">',

                    'heading_row_start'   => '<thead><tr>',
                    'heading_row_end'     => '</thead><tbody>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td><div style="cursor:pointer;">',
                    'cell_end'            => '</div></td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td><div style="cursor:pointer;">',
                    'cell_alt_end'        => '</div></td>',

                    'table_close'         => '</tbody></table>'
              );
		$this->table->set_template($tmpl);
		
		$data['title']= "淘IC-IC回收站-IC呆料集散地";
		$data['head']= "
		<!--从百度CDN导入jquery-->
		<script src=\"http://libs.baidu.com/jquery/1.10.2/jquery.js\"></script>
		<!--导入jqzoom的js、css文件-->
		<script src=\"".base_url()."js/jqzoom/jquery.jqzoom-core.js\"type=\"text/javascript\"></script>
		<link rel=\"stylesheet\" href=\"".base_url()."css/jquery.jqzoom.css\" type=\"text/css\">
		<!--导入icdig的js文件-->
		<script src=\"".base_url()."js/icdig.js\" type=\"text/javascript\"></script>
		<!--导入frameCSS-->
		<link rel=\"stylesheet\" href=\"".base_url()."css/frame.css\" type=\"text/css\">
		<!--导入斑马表格CSS-->
		<link rel=\"stylesheet\" href=\"".base_url()."css/table.css\" type=\"text/css\">";
		$data['head']=$this->load->view('head',$data,true);
		$data['navbar']=$this->load->view('navbar',true);
		$data['content']=$this->load->view('icdig',true);
		$data['footer']=$this->load->view('footer',true);
		$this->load->view('page',$data);
   }
   
   function detail()
   {
		$id=$_GET['id'];
		$data['icdetail'] = $this->ic_model->get_icdetail($id);
		$data['icdetail']=$this->load->view('icdetail',$data,true);
		echo $data['icdetail'];
   }
}
?>