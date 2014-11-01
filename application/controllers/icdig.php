<?php
class Icdig extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ic_model');
		$this->load->library('table');
	}
	
   function index()
   {
		$data['field']=array("id","model");
		$str=implode(",",$data['field']);
		$results = $this->ic_model->get_icmodel($str);
		$data['results']=array();
		$i=0;
		foreach($results->result() as $row)
		{
			for($j=0;$j<count($data['field']);$j++,$i++)
			{
				$data['results'][$i]="<div id=\"index".$row->id."\" style=\"cursor:pointer;\">".$row->$data['field'][$j]."</div>";
			}
		}
		$data['results']=$this->table->make_columns($data['results'], count($data['field']));
		
		//载入表格类
		$this->load->library('table');
		$this->table->set_heading('ID', '型号');
		$this->table->set_caption('OEM/ODM呆料信息');
		$tmpl = array ('table_open' => '<table class="zebra" style="width:300px;">');
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
		$str=implode(",",$data['field']);
		$data['icdetail'] = $this->ic_model->get_icdetail($data['id'],$str);
		
		//获取该IC照片的后缀名和数量
		$dir = opendir("image/ic/".$data['id']);
		for($i=1;($file = readdir($dir)) !== false;$i++);
		closedir($dir);
		$data['pictype']=pathinfo($file,PATHINFO_EXTENSION);
		$data['picnum']=$i-2;
		
		$data['spic']=$this->load->view('spic',$data,true);
		$data['tpic']=$this->load->view('tpic',$data,true);
		$data['descrip']=$this->load->view('descrip',$data,true);
		$result = array('spic'=>$data['spic'],'tpic'=>$data['tpic'],'descrip'=>$data['descrip']);
		$result = json_encode($result); 
		echo $result;
   }
}
?>