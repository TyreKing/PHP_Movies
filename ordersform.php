<html><bod>
<h2>Best Produce&Trade;</h2>
<?php
$oranges =$_POST['oranges'];
$apples =$_POST['apples'];
$bananas = $_POST['bananas'];
if($oranges>0|| $apples>0||$bananas>0){
	echo"<b>Thanks for placing your order of </b>\n";
	if($oranges >0)echo"<li>$oranges oranges";
	if($apples >0)echo"<li>$apples apples";
	if($bananas >0)echo"<li>$bananas bananas";
}
else
	echo"<b>No produce was ordered.</b><br/>";
?>

<p><a style="text-decoration:none" href="orders.html">
	<input type="submit"value="Back to Orders"/></a></p>
</body></html>