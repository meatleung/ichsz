<div style="height:40px"></div>

<div>
	<ul style="left: 28%;">
		<li style="width:200px">
			想让有呆料的人联系你吗？
		</li>
		<li id="navp">
			<?php echo anchor('contactus', '点击此处联系我们');?>
		</li>
		<li style="width:400px">
			，将您的企业信息留在IC回收站，本服务永久免费。
		</li>
		<li id="navp">
			<?php echo anchor('adservice', '点我了解服务详情');?>
		</li>
	</ul>
</div>
<div id="container">  
	<?php	
		echo $this->table->generate($results);
	?>
</div>
<div style="height:20px"></div>

<div>
	<ul style="left: 35%;">
		<?php
		echo $this->pagination->create_links();
	?>
	</ul>
</div>