<?php
class Adservice extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	
   function index()
   {		
		//载入表格类
		$this->load->library('table');
		$this->table->set_heading('广告位置', '展示效果', '收费标准');
		$this->table->set_caption('广告收费标准');
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
		$this->table->add_row('表格非第一行位置', '从所有免费广告中随机抽取展示', '0元/月');
		$this->table->add_row('表格第一行', '固定在信息表的第一行,与免费广告相比位置更好，并且展示次数有保证', '<a href='.base_url().'contactus>点击此处联系客服</href>');
		
		$data['title']= "广告收费标准-IC回收站-IC呆料集散地";
		$data['head']="<!--导入表格CSS--><link rel=\"stylesheet\" href=\"".base_url()."css/table.css\" type=\"text/css\">";
		$data['head']=$this->load->view('head',$data,true);
		$data['navbar']=$this->load->view('navbar','',true);
		$data['content']=$this->load->view('adservice',$data,true);
		$data['footer']=$this->load->view('footer','',true);
		$this->load->view('page',$data);
   }
}
?>