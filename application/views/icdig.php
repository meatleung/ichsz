<div style="height:40px"></div>

<div>
	<ul style="left: 32%;">
		<li style="width:200px">
			仓库的IC呆料卖不掉？
		</li>
		<li id="navp">
			<?php echo anchor('contactus', '点击此处联系我们');?>
		</li>
		<li style="width:400px">
			，将呆料信息放在IC回收站展示，本服务永久免费。
		</li>
	</ul>
</div>

<div style="height:60px"></div>

<table style="width:960px;height:600px;margin:0 auto;">
<tr>
<td>
	<div style="width:280px;height:600px;overflow-x:hidden;overflow-y:auto;valign:top">
	<?php
		echo $this->table->generate($icmodel);
	?>
	</div>
</td>
<td id="icdetail" style="width:680px"></td>
</tr>
</table>

