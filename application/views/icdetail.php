<!--展示small尺寸照片-->
<div class="clearfix" id="content" style="margin-top:-20%;margin-left:30px;">
<a href="<?php echo base_url()?>image/ic/<?php echo $id?>/<?php echo $id?>_b1.jpg" rel='gal' class="jqzoom" title="<?php echo $icdetail->model;?>" alt="<?php echo $icdetail->model;?>">
<img src="<?php echo base_url()?>image/ic/<?php echo $id?>/<?php echo $id?>_b1.jpg"  title="<?php echo $icdetail->model;?>" alt="<?php echo $icdetail->model;?>" style="border:4px solid green;width:308px;height:247px;">
</a>
<!--本单元格展示文字信息-->
<div style="position:absolute;right:30%;top:18%;">
	<h1><?php echo $icdetail->model?></h3>
	<p style="font-size:120%;line-height:180%">
	<?php
		for($i=2;$i<count($field);$i++)
		{
			echo $fieldname[$i].": ".$icdetail->$field[$i]."<BR>";
		}
	?>
	</p>
</div>
<!--本单元格展示thumbnail尺寸照片-->
<div class="clearfix" style="width:400px;height:90px;position:relative;top:20px;margin-right:20px;overflow-x:auto;">
	<ul id="thumblist" class="clearfix">
		<?php 
			for($i=1;$i<$picnum;$i++)
			{
			echo "<li style=\"margin-right:20px;\"><a href='javascript:void(0);' rel=\"{gallery: 'gal', smallimage: '".base_url()."image/ic/".$id."/".$id."_b".$i.".jpg',largeimage: '".base_url()."image/ic/".$id."/".$id."_b".$i.".jpg'}\"><img src='".base_url()."image/ic/".$id."/".$id."_b".$i.".jpg' alt=\"".$icdetail->model."\" style=\"width:120px;height:90px;\"></a></li>";
			}
		?>
	</ul>
</div>
</div>