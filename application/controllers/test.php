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
		$data['field']=array("name","tel","qq","company","business");
		$str=implode(",",$data['field']);
		$results = $this->ad_model->get_ad($str);
	 
		// 清空输出缓冲区
		ob_clean();
		// 载入PHPExcel类库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
		// 创建PHPExcel对象
		$objPHPExcel = new PHPExcel();
		// 设置excel文件属性描述
		$objPHPExcel->getProperties()
					->setTitle("回收IC信息表")
					->setDescription("回收IC信息表");
		// 设置当前工作表
		$objPHPExcel->setActiveSheetIndex(0);
		// 设置表头
		$fields = array('姓名','电话','qq','公司名称','业务范围');
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
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $temp["name"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $temp["tel"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $temp["qq"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $temp["company"]);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $temp["business"]);
			$row++;
		}
		//输出excel文件
		$objPHPExcel->setActiveSheetIndex(0);
		// 第二个参数可取值：CSV、Excel5(生成97-2003版的excel)、Excel2007(生成2007版excel)
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		// 设置HTTP头
		header('Content-Type: application/vnd.ms-excel; charset=utf-8');
		header('Content-Disposition: attachment;filename="'.mb_convert_encoding("回收IC信息表", "GB2312", "UTF-8").'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
	}
	}
?>