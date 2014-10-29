<head>
		<!--从百度CDN导入jquery(jqzoom需要jquery为1.6.0版本)-->
		<script src="http://libs.baidu.com/jquery/1.6.0/jquery.js"></script>
		<!--导入jqzoom的js、css文件-->
		<script src="<?php echo base_url()?>js/jqzoom/jquery.jqzoom-core.js"type="text/javascript"></script>
		<link rel="stylesheet" href="<?php echo base_url()?>css/jquery.jqzoom.css" type="text/css">
		<!--导入icdig的js文件-->
		<script src="<?php echo base_url()?>js/test.js" type="text/javascript"></script>
		<!--导入淘IC图片CSS-->
		<link rel="stylesheet" href="<?php echo base_url()?>css/icdetail.css" type="text/css">
		<!--导入斑马表格CSS-->
		<link rel="stylesheet" href="<?php echo base_url()?>css/table.css" type="text/css">
</head>
<body>
<table id="icdig">
<tr>
<td>点我！</td>
</tr>
</table>
<a href="<?php echo base_url()?>image/ic/1/1_b1.jpg" class="jqzoom"   title="triumph" >
<img src="<?php echo base_url()?>image/ic/1/1_b1.jpg"  title="triumph"  style="width:320px;height:240px;border: 4px solid #666;">
</a>
<br>
<div id="icdetail">

</div>
</body>