<?php

			include_once("dbconfig.php");
			
if($_POST['o'])
{
			$data=json_decode ($_POST['o']);

			foreach($data as $d) 
			{
				$local_id=$d->id; $local_id=explode("_", $local_id);

				if($local_id[0]=="newrow")
				{
				
					SaveRecord($d);	
				
				}//end if $d->id
				else
				{
					UpdateRecord($d);
				}
				
			}///endforeach

		
}//end $_POST[o]
				function UpdateRecord($d)
				{
						$query=" update `projects` set ";

						$colname="`highlevelideano`='".$d->highlevelideano."'";

						$colname.=",`name`='".$d->name."'";

						$colname.=",`projectno`='".$d->projectno."'";
						
						if($colname!='')
						{
					
								$query=$query.$colname." where `id`=".$d->id;
								
								//$db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error()); 
								$db = mysql_connect("sql212.hostfree.pw", "epree_27217354", "recall123") or die("Connection Error: " . mysql_error()); 
								
								//mysql_select_db("samproject") or die("Error conecting to db.");
								mysql_select_db("epree_27217354_openproblems") or die("Error conecting to db.");
											
								if(mysql_query($query))
								{
									echo $query;
									//header("location:index.html");
								}	
								else 
								{
									echo "else of update:".$query;
									
								}
						}//colname endif
				}//end update function
				
				
				if($_GET['q']==1)
				{
					
					 if($_POST['oper']=="del")
						{
				
							if($_POST["id"]>0)
							$id=$_POST['id'];
						
							$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error()); 
													
										mysql_select_db($database) or die("Error conecting to db.");
											
							$sql="delete from projects where id=".$id;
							if(mysql_query($sql))
							{
								echo "true:deleted successfully";
							}
							else
							{
								echo "false:error deleting data - ".mysql_error();
							}
						}//end del
						
				}//end get q
				
				function SaveRecord($d)
				{
							$query="INSERT INTO `projects` (`highlevelideano`, `name`, `projectno`) VALUES('".$d->highlevelideano."','".$d->name."','".$d->projectno."','".$aprov."','".$d->subprojectno."','".$d->ba."',')";

								$db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error()); 
											
								mysql_select_db("samproject") or die("Error conecting to db.");
											
								if(mysql_query($query))
								{
									echo $query;
									//header("location:index.html");
								}	
								else 
								{
									echo 'else of insertion'.$query;

								}
				
				}//end function saverecord
				
				
				?>