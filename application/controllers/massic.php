<?php
class Massic extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('table');
		$this->load->model('ad_model');
		//$this->load->model('ic_model');
		$this->load->helper('download');
	}
	
   function index()
   {
		$data['field']=array("name","tel","qq","company","business","id");
		$str=implode(",",$data['field']);
		$results = $this->ad_model->get_massic($str);
		$data['results']=array();
		$i=0;
		$data['field']=array("name","tel","company","business","id");
		foreach($results->result() as $row)
		{
			for($j=0;$j<count($data['field']);$j++,$i++)
			{
				if(($data['field'][$j]!="name")&($data['field'][$j]!="id"))
				{$data['results'][$i]=$row->$data['field'][$j];}
				elseif($data['field'][$j]=="name")
				{
					$data['results'][$i]=$row->$data['field'][$j].(empty($row->qq)?"":"<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&uin=".$row->qq."&site=qq&menu=yes\"><img src=".base_url()."image/qqtalk.png alt=\"点击这里给我发消息\" title=\"点击这里给我发消息\"/></a>");
				}
				elseif($data['field'][$j]=="id")
				{
					$data['results'][$i]='<a class="download" href='.base_url('excel/'.$row->id.'.xls').'>下载</a>';
				}
			}
		}
		$data['results']=$this->table->make_columns($data['results'], count($data['field']));
		
		//载入表格类
		$this->load->library('table');
		$this->table->set_heading('联系人', '电话','公司','呆料内容','呆料清单');
		$this->table->set_caption('批量呆料信息表');
		$tmpl = array ('table_open' => '<table class="zebra" style="width:960px;margin:0 auto">');
		$this->table->set_template($tmpl);
				
		$data['title']= "批量呆料-IC回收站-IC呆料集散地";
		$data['head']="
		<!--导入表格CSS-->
		<link rel=\"stylesheet\" href=\"".base_url()."css/table.css\" type=\"text/css\">
		<!--导入jquery文件-->
		<script src=\"http://libs.baidu.com/jquery/2.0.3/jquery.min.js\"></script>
		<!--导入icdig的js文件-->
		<script src=\"".base_url()."js/massic.js\" type=\"text/javascript\"></script>";
		$data['head']=$this->load->view('head',$data,true);
		$data['navbar']=$this->load->view('navbar',true);
		$data['content']=$this->load->view('massic',true);
		$data['footer']=$this->load->view('footer',true);
		$this->load->view('page',$data);
   }
   
	function excel()
	{
		$data['id']=$this->uri->segment(3);
		$data['field']=array("model","brand","lotid","package","print","amount","remarks");
		$str=implode(",",$data['field']);
		$results = $this->ic_model->get_massiclist($str,$data['id']);
		
		// 清空输出缓冲区
		ob_clean();
		// 载入PHPExcel类库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
		// 创建PHPExcel对象
		$objPHPExcel = new PHPExcel();
		// 设置excel文件属性描述
		$objPHPExcel->getProperties()
					->setTitle("IC呆料清单")
					->setDescription("IC呆料清单");
		// 设置当前工作表
		$objPHPExcel->setActiveSheetIndex(0);
		// 设置表头
		$fields = array('型号','品牌','批号','封装','丝印','数量','备注');
		// 列编号从0开始，行编号从1开始
		$col = 0;
		$row = 1;
		foreach($fields as $field)
		{
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $field);
			$col++;
		}
		// 从第二行开始输出数据内容
		$row = 2;
		foreach($results->result_array() as $temp)
		{
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $temp["model"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $temp["brand"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $temp["lotid"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $temp["package"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $temp["print"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $row, $temp["amount"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $row, $temp["remarks"]);
			$row++;
		}
		//输出excel文件
		$objPHPExcel->setActiveSheetIndex(0);
		// 第二个参数可取值：CSV、Excel5(生成97-2003版的excel)、Excel2007(生成2007版excel)
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		$contact = $this->ad_model->get_massic("name,tel",$data['id']);
		$temp = $contact->row();
		// 设置HTTP头
		header('Content-Type: application/vnd.ms-excel; charset=utf-8');
		header('Content-Disposition: attachment;filename="'.mb_convert_encoding($temp->name."(".$temp->tel.")的IC清单", "GB2312", "UTF-8").'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	}
}
?>