<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SamSheet - Project Entry</title>
 
<link rel="stylesheet" type="text/css" media="screen" href="js/src/css/custom-theme/jquery-ui-1.8.6.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="js/src/css/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" media="screen" href="js/src/css/jquery.searchFilter.css" />
 
<style>
html, body {
    margin: 0;
    padding: 0;
    font-size: 75%;
}
</style>
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/ui.datepicker.js" type="text/javascript"></script> 

<script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="js/jquery.jqGrid.js" type="text/javascript"></script>
<script src="js/jquery.json-2.2.min.js" type="text/javascript"></script>  
<script type="text/javascript">

var currentiRow;
var currentiCol;
var newRowCount = 1;

var str='';
var lastsel;
$(function(){ 

	  jQuery("#grid").jqGrid({
			url:"project_process_get.php",
			datatype: "json",

			colNames:
				[
					'Id',
					'Project Name',
					'LOE',
					'Starting Date',
					'Jan',
					'Feb',
					'Mar',
					'Apr',
					'May',
					'June',
					'July',
					'Aug',
					'Sep',
					'Oct',
					'Nov',
					'Dec'
				],

			colModel:[
		
				{name:'id',index:'id'},
				{name:'name',index:'name', width:50,align:"right",editable:true},
				{name:'loe',index:'loe',width:40,align:"right",editable:true},
				{name:'startdate',index:'startdate',width:40,align:"right",editable:true},
				
				{name:'jan',index:'jan',width:15,align:"right",editable:true},
				{name:'feb',index:'feb',width:15,align:"right",editable:true},
				{name:'mar',index:'mar',width:15,align:"right",editable:true},
				{name:'apr',index:'apr',width:15,align:"right",editable:true},
				{name:'may',index:'may',width:15,align:"right",editable:true},
				{name:'jun',index:'jun',width:15,align:"right",editable:true},
				{name:'jul',index:'jul',width:15,align:"right",editable:true},
				{name:'aug',index:'aug',width:15,align:"right",editable:true},
				{name:'sep',index:'sep',width:15,align:"right",editable:true},
				{name:'oct',index:'oct',width:15,align:"right",editable:true},
				{name:'nov',index:'nov',width:15,align:"right",editable:true},
				{name:'dec',index:'dec',width:15,align:"right",editable:true}
					
			],
			
				editurl:"project_process_set.php?q=1",//used in del
				
				height:300,
				
				width:800,
				
				sortname: 'name',
				
				sortorder: "asc",
				
				caption:"Project Input Screen with project time spanned over months ",
				
				//forceFit : true,
				
				cellEdit: true,
				
				cellsubmit: 'clientArray',
				//
				altRows:true,
				
				loadonce: true, // to enable sorting on client side
				
				sortable: true ,//to enable sorting
				
				pager: jQuery('#pager'),
				
				pgbuttons: false,
				
				pgtext:"",
				
				viewrecords: true,
			
				pginput: true,
				
				//
				rowNum:10000,//show all ,-1 decrements, so use more than max
				
				//rowList:null,//rowList:[10,20,30]
				
				onSelectRow:function(){
			
				},
			
			afterEditCell: function (id,name,val,iRow,iCol){
				currentiRow = iRow;
				currentiCol = iCol;
				//////alert("aftereditcell was called");
				if ((name == "deliverydate") || (name == "startdate")) {
					var dateid = "#"+iRow+"_"+name;
					jQuery(dateid,"#grid").datepicker({dateFormat:"yy-mm-dd"});
				}
			},
			beforeEditCell:function(rowid,name,val,iRow,iCol){
							
								currentiRow = iRow;
								currentiCol = iCol;
							
								if (name == "startdate") {
								
								var loeval;
								if(iCol-1==2) 
								{ 
									loeval=$("#grid").getCell(rowid,iCol-1);
								
								}
								if(loeval>0)
								{
								
							
									$.ajax({
											type: 'POST',
											url: 'project_process_get.php',
				
											data:{loe:loeval},
											success: function(data) {
												
												var obj=$.parseJSON(data);	
if(obj)alert('hi');
													if( typeof obj == "object" ) {
												
															$.each(obj.rows, function(key,val){
																if(typeof val=="object")
																{
												alert("val is obj");
																	$.each(val.cell[0],function(i){
												alert(parseFloat(val.cell[i])+" "+iCol);
																		$("#grid").setCell(rowid,++iCol,loeval*(parseFloat(val.cell[i])),"","",true);
																		
																	});
																}
																
															});
												
														//else
//														{
//															alert("not a json");
//														}
													
													}//end if					
						
//											$("#grid").trigger("reloadGrid");
												}//success																							
											});///endajax*/
									
									}//loeval check
									
									
									}
				}
			
			
		})
		.navGrid(
					'#pager',
					{edit:true,add:true,del:true},
					{id:'myedit'}
					)
		.hideCol("id");
		
		$('#myedit').hide();
		$(".ui-icon-disk").show().hover(function(){a(this).addClass("ui-state-hover")},function(){a(this).removeClass("ui-state-hover")});;
	

		$(".ui-pg-button div:first").removeClass("ui-pg-button").addClass("myclass");
		

		$(function(){ 
			$('<td class="ui-pg-button ui-corner-all" title="Save new row(s)" id="save_grid"><div class="ui-pg-div saverecord"><span class="ui-icon ui-icon-disk"><a href="javascript:void(0)"></a></span></div></td>').hover(function(){$(this).addClass("ui-state-hover");},function(){$(this).removeClass("ui-state-hover")}).insertAfter("#add_grid");
		});
	



		$(".saverecord").click(function(){
		
			$("#grid").saveCell(currentiRow, currentiCol);
		
		
				var l=$("#grid").getChangedCells();
			
				var encoded=$.toJSON(l);
				
					$.ajax({
							type: 'POST',
							url: 'project_process_set.php?q=2',

							data:{o:encoded},
							success: function(data) {
							
						    $("#grid").trigger("reloadGrid");
								}
								
								
							});///endajax*/
					//	}//end if
				//	}//end for loops*/
		});//end save




			$(".myclass").click(function(){
					newRowCount++;
					
					var data={
								id:"newrow_"+newRowCount,
						
								name:"Enter name here",
						
							
							 };
					
					
					
					$("#grid").addRowData('newrow_'+newRowCount,data,'last');
			
		});
			
		
				}); //jquery ready method
	  

</script>
 
</head>
<body>

<table id="grid" class=""></table> 

<div id="pager"></div> 

</body>
</html>
