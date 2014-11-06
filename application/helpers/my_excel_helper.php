<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function excelread()
{
    $CI = get_instance();
    if(!isset($CI->excel))
    {
		//此处是reader.php文件的相对路径，根据项目自行修改
        require_once 'excelreader/reader.php';
        $CI->excel = new Spreadsheet_Excel_Reader();
        $CI->excel->setOutputEncoding('utf-8');
    }
    return $CI->excel;
}