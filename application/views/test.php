<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://libs.baidu.com/jquery/1.6.0/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("p").click(function(){
		var a = this.att('id');
		alert("a");
	})
})
</script>
</head>
<body>
<p>aaaaaaaaaaaaa</p>
</body>
</html>
