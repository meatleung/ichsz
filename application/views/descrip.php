<!--展示文字信息-->
<div style="padding-top:0px">
<h1><?php echo $icdetail->model?></h3>
<p style="font-size:120%;line-height:180%">
<?php
	for($i=2;$i<count($field);$i++)
	{
		if(!empty($icdetail->$field[$i]))
		{
			echo $fieldname[$i].": ".$icdetail->$field[$i];
			if($field[$i]=="qq")
			echo "<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&uin=".$icdetail->$field[$i]."&site=qq&menu=yes\"><img src=".base_url()."image/qqtalk.png alt=\"点击这里给我发消息\" title=\"点击这里给我发消息\"/></a>";
			echo "<br>";
		}
	}
?>
</p>
</div>