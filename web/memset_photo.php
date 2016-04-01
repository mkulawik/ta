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

$type="members";
$xtranum=mt_rand();
$image="fvmem".$xtranum."_".$idm."_".date("dmyhms")."_".$_FILES['file']['name'];

if ($_FILES["file"]["error"] > 0)
				{
					$_SESSION['msg']="Error, please try again.";
				}
				else
				{
		
					if (file_exists("members/" .$_FILES["file"]["name"]))
					{
						echo $_FILES["file"]["name"] . " already exists. ";
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"], "members/" .$image);
						mysql_query("update members set image='".$image."' where id=".$idm);
						$_SESSION['msg']="New member photo has been uploaded.".$image."-".$idm;
							
					}
						
						
				}

}

header("location:memset2.php?idm=".$idm);
?>

