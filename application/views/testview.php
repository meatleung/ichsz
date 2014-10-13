<div style="position:relative;top:-1%; text-align:center">
<?php	
	for($j=1; $j<=$row; $j++)
		{
			$k=($i-1)*$row+$j-1;
			echo "<img src=".$ad[0][$k]." alt=\"".$ad[1][$k]."\" />"; 
		}
		echo "<br>";
?>
</div>