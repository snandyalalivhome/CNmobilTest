 <?php
if (isset($_FILES['files'])) {

    $name = $_FILES["files"]["name"][0];
	$tmp_name= $_FILES["files"]["tmp_name"][0];
echo 'tempname ' .$tmp_name;
echo 'name of file '. $name;
	$uploads_dir= $_SERVER['DOCUMENT_ROOT'] . "\\CareNetworkMobileSite\\Uploads\\".$name ;
  echo filesize($tmp_name);
	  //echo $uploads_dir;

 if(move_uploaded_file($tmp_name, $uploads_dir))
	{
 echo 'successful';
	}
else
	{
 echo 'failed to upload';
	}
}
else
echo 'fail';
?>