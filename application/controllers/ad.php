<?php
class Ad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
  
   function index()
   {
		$this->load->library('pagination');
		$config['base_url'] = site_url('ad/index/');
		$config['total_rows'] = $this->db->count_all('ad');
		$config['per_page'] = 10;
		$config['num_links'] = 1;
		$config['uri_segment'] = 3;  // 表示第 3 段 URL 为当前页数
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = '第一页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['last_link'] = '最后一页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
					
		//载入广告模型，获取广告信息
		$this->load->model('ad_model');
		$data['results'] = $this->ad_model->get_ad($config['per_page'],$this->uri->segment(3));
					
		//载入表格类
		$this->load->library('table');
		$this->table->set_heading('联系人', '电话', 'QQ','公司名称','公司地址','备注');
		$this->table->set_caption('IC回收企业信息表');
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
				
		$data['title']= "IC回收站-IC呆料集散地";
		$data['head']="<!--导入表格CSS--><link rel=\"stylesheet\" href=\"".base_url()."css/table.css\" type=\"text/css\">";
		$this->load->model("Ad_model");
		$data['head']=$this->load->view('head',$data,true);
		$data['navbar']=$this->load->view('navbar','',true);
		$data['content']=$this->load->view('ad',$data,true);
		$data['footer']=$this->load->view('footer','',true);
		$this->load->view('page',$data);
   }
}
?>