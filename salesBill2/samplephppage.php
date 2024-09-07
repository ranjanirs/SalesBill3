<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Film Details</title>
<link rel="stylesheet" type="text/css" href="CSS/Style1.css" />
<script type="text/javascript" src="./JS/Global.js" ></script>
<script src="jquery-1.10.2.js"></script>

<script type="text/javascript"> 

function checkPic(){  
         var picPath=document.getElementById("picPath").value;  
        var type=picPath.substring(picPath.lastIndexOf(".")+1,picPath.length).toLowerCase();  
         document.getElementById("Preview").style.display="block";  
         return true;  
    }  
	
	function DisplayImage(divImage,input,width,height)
	{
		var objappVersion = navigator.appVersion;
		var objAgent = navigator.userAgent;
		var objbrowserName  = navigator.appName;
		var objfullVersion  = ''+parseFloat(navigator.appVersion); 
		var objBrMajorVersion = parseInt(navigator.appVersion,10);
		var objOffsetName,objOffsetVersion,ix;
		var Preview;
		
		if ((objOffsetVersion=objAgent.indexOf("Chrome"))!=-1) 
		{
			if (input.files && input.files[0])
			{
				var reader = new FileReader();
				reader.onload = function (e) {
				$('#prevImage').attr('src', e.target.result);
				$('#prevImage').css({"display":"block" });
				}					  
				reader.readAsDataURL(input.files[0]);
			}	
		}
		else if((objOffsetVersion=objAgent.indexOf("Firefox"))!=-1) 
		{
			if(document.all)
				document.getElementById('prevImage').src = input.value;
			else
				document.getElementById('prevImage').src = input.files.item(0).getAsDataURL();
			if(document.getElementById('prevImage').src.length > 0) 
			{
				document.getElementById('prevImage').style.display = 'block';
			}	
		}
		// In Microsoft internet explorer
		else if ((objOffsetVersion=objAgent.indexOf("MSIE"))!=-1) 
		{
				if(checkPic()){  
					 Preview = document.getElementById("Preview");  
						  Preview.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = input.value;  
						  Preview.style.width = width;  
						  Preview.style.height = height;
			}
		}

	}
	
	
	
</script>

</head>

<body>
	<!--Div - ContentWrapper-->
	<div  Class="ContentWrapperAdmin" align="center">
		<!--Div - divContent-->
		<div class="divContentAdminFilm">
			<form id="frmFilmDetails" name="frmFilmDetails" method="post"  action="FilmDetailsSave.php" enctype="multipart/form-data"
			   onsubmit="return ValidateFilmDetails(this)">
				<!--Div - divOuterFeesSetup-->
				<div class="divOuterDailyAttdSe">
					<div class="divLogin" align="center">Film Details</div>
					
					<div class="divlblEmpHeader">Film Details</div>
					
					
					<div class="divDriverDetOuter"> 						
					
						<div class="divlblEmpname1">Film Name</div>
						<div class="divtxtEmpName1" >
							<textarea name="txtFilmName" rows="3"></textarea>
						</div>
						
						<div class="divlblGender1">Genere</div>
						<div class="divSelEmpName1" >
							<?php
								include_once 'Config.php';
								$query = "SELECT * FROM tblgenerename order by Genere";
								
								$result = mysql_query($query);
								if (!$result) die ("Database access failed: " . mysql_error());
								
								echo "<select name='SelGenere' >";
								echo "<option value='select'>Select</option>";	
								while ($row = mysql_fetch_array($result))
								{
										echo "<option value='" . $row['GenereId'] . "'>" . $row['Genere'] . "</option>";
								}	
								echo "</select>";
						 ?>
						</div>
						
						<div class="divMLMPhotoOuter">
									<div class="divlblPhoto1">Photo</div>
									<div class="divPhoto1">
										<div class="divImgbut">
											<input type="file" id="picPath" name="picPath" onchange="DisplayImage('prevImage',this,100,100);" 
											onkeydown="checkKey('frmStudentRegDet','txtFatherName')" />
										</div>
										<div class="divImgDis">
											<img alt="Image Display Here" id="prevImage" src="#" height="100px" width="100px" style="display:none;" />
											<div id="Preview" style="filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale);">
											</div>
										</div>	
									</div>		
			</div>
						
						
						<div class="divlblExp2">Abstract</div>
						<div class="divtxtExp2" >
							
							<textarea name="txtAbstract" rows="7" cols="30"></textarea>
						</div>
						

					</div><!-- End of Driver Details Outer Div -->
					
					
					<div class="divlblEmpHeader">Film Roles</div>
					<div class="divDriverDetOuter">
					
						<div class="divlblEmpname1">Role</div>
						<div class="divtxtEmpName2" >
							<?php
								$query1 = "SELECT * FROM tblrole order by role";
								
								$result1 = mysql_query($query1);
								if (!$result1) die ("Database access failed: " . mysql_error());
								
								echo "<select name='SelRole' >";
								echo "<option value='select'>Select</option>";	
								while ($row1 = mysql_fetch_array($result1))
								{
										echo "<option value=". $row1['RoleId'].">" . $row1['Role'] . "</option>";
								}	
								echo "</select>";
						 ?>
						</div>

						<div class="divlblGender1">Person Name</div>
						<div class="divSelEmpName2" >
							<textarea name="txtPersonName" rows="3"></textarea>
						</div>
						
						<div style="float:left; padding-top:30px;">
							<input type="button" name="btnAdd" Value="Add" onclick="GetFilmDetails();" />
						</div>
						
						
						<div  style="margin-top:50px">
						<div class='divSearchDet1'>
							<table WIDTH="700" border="1" CELLPADDING="0" cellspacing="00">
								<tr>
									<th width="300">Role</th>
									<th width="300">Person Name</th>
								</tr>
							</table>
							</div>
						</div>

					
					</div>
					
					
				   <div class="divLoginButton" align="center">
						  <input type="submit" name="btnSave"  value="Save" />
				   </div>
				   
					<div class="divBackHome">
						<a href="CashierMenu1.php">Back to Cashier Menu</a>
					</div>
			  </div><!--End of divOuter  -->
			</form>
		</div><!--End of divContent  -->
	</div><!--End of ContentWrapper-->

</body>
</html>
