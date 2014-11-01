<!--展示thumbnail尺寸照片-->
<?php 
	for($i=1;$i<$picnum;$i++)
	{
		if($i%4==0) echo "<div style=\"height:10px\"></div><span>&nbsp</span>";
		echo "<span style=\"margin-right:10px;margin-left:10px;margin-top:10px;margin-bottom:10px;\"><a href='javascript:void(0);' rel=\"{gallery: 'gal', smallimage: '".base_url()."image/ic/".$id."/".$id."_b".$i.".jpg',largeimage: '".base_url()."image/ic/".$id."/".$id."_b".$i.".jpg'}\"><img src='".base_url()."image/ic/".$id."/".$id."_b".$i.".jpg' style=\"width:120px;height:90px;\"></a></span>";
	}
?>