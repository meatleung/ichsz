<?php
class Ad extends CI_Controller {

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
		$data['field']=array("name","tel","qq","company","business");
		$str=implode(",",$data['field']);
		$results = $this->ad_model->get_ad($str);
		$data['results']=array();
		$i=0;
		$data['field']=array("name","tel","company","business");
		foreach($results->result() as $row)
		{
			for($j=0;$j<count($data['field']);$j++,$i++)
			{
				if($data['field'][$j]!="name"){$data['results'][$i]=$row->$data['field'][$j];}
				else
				{
					$data['results'][$i]=$row->$data['field'][$j].(empty($row->qq)?"":"<a target=\"_blank\" href=\"tencent://message/?uin=".$row->qq."&site=qq&menu=yes\"><img border=\"0\" src=\"".base_url()."/image/qqtalk.png\" alt=\"点击这里给我发消息\" title=\"点击这里给我发消息\"/></a>");
				}
			}
		}
		$data['results']=$this->table->make_columns($data['results'], count($data['field']));
		
		//载入表格类
		$this->load->library('table');
		$this->table->set_heading('联系人', '电话', '公司','回收范围');
		$this->table->set_caption('IC回收企业信息表');
		$tmpl = array ('table_open' => '<table class="zebra">');
		$this->table->set_template($tmpl);
				
		$data['title']= "IC回收站-IC呆料集散地";
		$data['head']="
		<!--导入表格CSS-->
		<link rel=\"stylesheet\" href=\"".base_url()."css/table.css\" type=\"text/css\">";
		$data['head']=$this->load->view('head',$data,true);
		$data['navbar']=$this->load->view('navbar','',true);
		$data['content']=$this->load->view('ad',$data,true);
		$data['footer']=$this->load->view('footer','',true);
		$this->load->view('page',$data);
   }
}
?>