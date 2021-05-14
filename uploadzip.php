<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>ZipArchive - BULK PICTURE OR FILE UPLOADING</title>
</head>
<body>

<?php

if ($_POST):

	$source = $_FILES["myzipfile"]["tmp_name"];//we indicate the source of the file
	$type = $_FILES["myzipfile"]["type"];//we specify the type of file
	$filepath = "form/".$_FILES["myzipfile"]["name"];//Here we indicate that my files in zip will be copied under my folder named 'form'. You must enter your own folder to copy.
	//we indicate the allowed formats
	$allowedformats = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');

//File type control
	if (!in_array($type,$allowedformats)):

		echo "Uploaded file is not zip";

	else:
		//file move operations
		
			//lists the files in the zip archive we uploaded and the zip we copied is deleted without saving in the folder.
			$zip = new ZipArchive();
			$open = $zip->open($source);

			//will check if the file has been opened
			if ($open === true):

				$zip->extractTo("form/");//We specify in which folder our zip file will be opened. You must enter your own folder to copy
				$zip->close();
				echo "PROCESS COMPLETED";

			endif;

	endif;

else:

?>
<div class="container">

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-center mx-auto border border-dark mt-3">
					<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center mx-auto m-2 border border-bottom border-dark border-left-0 border-right-0 border-top-0 pb-2">
							<form enctype="multipart/form-data" method="post" action="">
							<strong>Select Zip File</strong> <input type="file" name="myzipfile" />
							</div> 
							
							
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center mx-auto m-2">
							<input type="submit" name="submit" value="UPLOAD" class="btn btn-success btn-block" />
							</form>
							</div> 
					</div> 
		</div> 
	
	</div>

</div>

<?php 
endif;
?>

</body>
</html>