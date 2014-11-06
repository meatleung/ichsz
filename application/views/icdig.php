<div style="text-align:center;">
<p id="nav">
<span>仓库的IC呆料卖不掉？</span>
<span><?php echo anchor('contactus', '点击此处');?></span>
<span>联系我们,将呆料信息放在IC回收站展示，本服务永久免费。</span>
</p>
</div>
<table style="width:960px;margin:0 auto;">
<tr>
<td rowspan="2" style="width:300px;height:500px;overflow-y:auto;overflow-x:hidden;">
<?php echo $this->table->generate($results);?>
<div style="height:240px;"></div>
</td>
<td id="spic" style="width:450px;height:320px">
<p id="guide" style="">&nbsp &nbsp 点击左边的ID或型号，即可查看详细信息。</p>
</td>
<td id="descrip" rowspan="2" style="width:180px;height:500px;padding-top:0px"></td>
</tr><tr>
<td id="tpic" style="width:450px;">
</td></tr>
</table>

