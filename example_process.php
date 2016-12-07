<?php
	include "config.php";
	$dat=$_POST['date'];
	$amount=$_POST['amount'];
	
		$sql = "update jqgrid_test set date='".$dat."' and amount=".$amount;
		$res = mysql_query($sql) or die("error: ".mysql_error());
		$row = mysql_fetch_array($res);
	
		if (mysql_num_rows($res)) 
		{
				header("location:example.php");
  			exit;
		} 
		else 
		{
	    header("location:example.php");
  		exit;
		}
	
?>
