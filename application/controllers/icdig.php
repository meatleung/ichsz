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
		<!--从百度CDN导入jquery(jqzoom需要jquery为1.6.0版本)-->
		<script src=\"http://libs.baidu.com/jquery/1.6.0/jquery.js\"></script>
		<!--导入jqzoom的js、css文件-->
		<script src=\"".base_url()."js/jqzoom/jquery.jqzoom-core.js\"type=\"text/javascript\"></script>
		<link rel=\"stylesheet\" href=\"".base_url()."css/jquery.jqzoom.css\" type=\"text/css\">
		<!--导入icdig的js文件-->
		<script src=\"".base_url()."js/icdig.js\" type=\"text/javascript\"></script>
		<!--导入淘IC图片CSS-->
		<link rel=\"stylesheet\" href=\"".base_url()."css/icdetail.css\" type=\"text/css\">
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
		$data['id']=$_GET['id'];
		//定义要取得哪些信息，并传递给ic_model
		$data['field']=array("id","model","brand","lotid","package","print","amount","remarks","name","tel","qq");
		$data['fieldname']=array("id","型号","品牌","批号","封装","丝印","数量","备注","联系人","电话","qq");
		$str=$data['field'][0];
		for($i=1;$i<count($data['field']);$i++) 
		{
			$str=$str.",".$data['field'][$i];
		}
		$data['icdetail'] = $this->ic_model->get_icdetail($data['id'],$str);
		
		//获取该IC照片的后缀名和数量
		$dir = opendir("image/ic/".$data['id']);
		for($i=1;(($file = readdir($dir)) !== false);$i++);
		closedir($dir);
		$data['pictype']=pathinfo($file,PATHINFO_EXTENSION);
		$data['picnum']=$i-2;
		
		$data['icdetail']=$this->load->view('icdetail',$data,true);
		echo $data['icdetail'];
   }
}
?>