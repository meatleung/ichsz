<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico"/>
<link rel="bookmark" href="<?php echo base_url() ?>favicon.ico"/>
<link href="<?php echo base_url() ?>css/navbar.css" rel="stylesheet" type="text/css" /><!--导入导航条CSS样式-->
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.min.js"></script>
<script type="text/javascript"  src="<?php echo base_url() ?>js/nav.js"></script>
<style>
    .longbanner {text-align:center;position:relative;top:17px;} <!--定义首页长banner样式-->
</style>
</head>
<body>
<?php echo $navbar; ?>
<?php echo $content; ?>
<?php echo $footer; ?>
</body>
</html>
