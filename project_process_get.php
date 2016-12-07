
<?php
ob_start();
			include_once("dbconfig.php");
			$page = $_GET['page']; // get the requested page
			$limit = $_GET['rows']; // get how many rows we want to have into the grid
			if($limit<1)$limit=1;
			$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
			
			$sord = $_GET['sord']; // get the direction
			if(!$sidx) $sidx =1;
			if($sord<1)$sord=1;
			// connect to the database
			
			$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error()); 
			
			mysql_select_db($database) or die("Error conecting to db.");
			$loe=$_POST['loe'];
			if($loe!='')
			{
		
			$result=mysql_query("select `monthscount`  from sys_months where `maxval`>=".$loe." and `minval`<=".$loe ." limit 1");
		
		
			
			

			}
			else
			{
			
			$result = mysql_query("SELECT 0 as monthscount");
			}
			$row = mysql_fetch_array($result,MYSQL_ASSOC);
			$count = $row['monthscount'];
			
			
			if( $count >0 ) {
				$total_pages = ceil($count/$limit);
			} else {
				$total_pages = 0;
			}
			if ($page > $total_pages) $page=$total_pages;
			$start = $limit*$page - $limit; // do not put $limit*($page - 1)
			
			
			if($loe>0)
			{
				$query="SELECT id,factor FROM `sys_multiplefactors` where sys_months=(select monthscount from sys_months                      inner join sys_attributes sa on sys_months.sys_attributes_id=sa.sys_attributes_id where maxval>=".$loe." and minval<=".$loe." order by maxval desc limit 1)";
			echo $query;
				$result=mysql_query( $query ) or die("Couldn t execute query.".mysql_error());		
			$i=0;
			$responce->page = $page;
				$responce->total = $total_pages;
				
				$responce->records = $count;
			while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
					
			$responce->rows[$i]['id']=$row['id'];
				$responce->rows[$i]['cell']=array(
												$row['id'],
													$row['factor']
													
													);
				$i++;
			}  
			   
			echo json_encode($responce);
			
			
			}
			else
			{
			
				$SQL ="select * from projects";
			 
				$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
			

				$responce->page = $page;
				$responce->total = $total_pages;
				$responce->records = $count;
				

			
			$i=0;
			
			while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
				$responce->rows[$i]['id']=$row['id'];
				$responce->rows[$i]['cell']=array(
													$row['id'],
													$row['name'],
													);
				$i++;
			}  
			   
			echo json_encode($responce);
			}
			
	
//query to get factors
		

?>

