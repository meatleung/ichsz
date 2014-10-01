<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>123</title>
<link href="<?php echo base_url() ?>css/navbar.css" rel="stylesheet" type="text/css" /><!--导入导航条CSS样式-->
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.min.js"></script>
<script type="text/javascript"  src="<?php echo base_url() ?>js/nav.js"></script>
<style>
    .longbanner {text-align:center;position:relative;top:17px;} <!--定义首页长banner样式-->
</style>
</head>
<body>
<div id="top_bg">
	<div class="top">
		<div class="nav_z">
			<ul id="navul" class="cl">
				<li>
					<?php echo anchor('/', '首页'); ?>
				</li>
				<li>
					<?php echo anchor('adservice', '广告服务');?>
				</li>
				<li>
					<a href="#">关于我们</a>
				</li>
				<li>
					<a href="#">联系方式</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>
