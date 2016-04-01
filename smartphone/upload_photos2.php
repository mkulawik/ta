<? 
@ob_start();
@session_start();
include("chksession.php");
include("db/dbcon.php");
ini_set('upload_max_filesize', '100M');  
ini_set('post_max_size', '100M');  
ini_set('max_input_time', 600);  
ini_set('max_execution_time', 600);  
ini_set("memory_limit","100M");
set_time_limit(600); 

if(is_numeric($_GET['idm'])){
$idm=$_GET['idm'];
$type=$_GET['type'];
if($type=="actor"){
$field="id_actor";
}
if($type=="character"){
$field="id_character";
}
if($type=="movie"){
$field="id_movie";
}
$image=$idm."_".date("dmyhms")."_".$_FILES['file']['name'];


if ($_FILES["file"]["error"] > 0)
				{
					$_SESSION['msg']="Error, please try again.";
				}
				else
				{
		
					if (file_exists("photos/" .$_FILES["file"]["name"]))
					{
						$_SESSION['msg'] = $_FILES["file"]["name"] . " already exists. ";
					}

					elseif (preg_match("/php$/",$_FILES["file"]["name"],$matches))

					{

					       $_SESSION['msg']="ERROR: Invalid image file"; //****** Check for PHP file extension used in exploit
					}

					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"], "photos/" .$image);
						mysql_query("insert into photos set id_member=".$_SESSION['idm'].",".$field."=".$idm.", image='".$image."', posted_date='".date("Y-m-d")."'");
						$_SESSION['msg']="Photo has been uploaded.";
							
					}
						
						
				}

}

header("location:upload_photos.php?idm=".$idm."&type=".$type);
?>

