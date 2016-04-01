<?php
function fun_getStatusImage($status)
{
	if($status == "I")
		$p= APP_TEMPLATE_ROOT.'/images/icoInactive.gif';
	else
		$p = APP_TEMPLATE_ROOT.'/images/icoActive.gif' ;		
	return $p;
}

function fun_createThumb($name, $fname, $type='', $newW='', $newH='') {
      $system=explode('.', $name);
	  /*
	  if(preg_match('/jpg|jpeg/', $system[count($system) - 1])){
	     $srcImg = imagecreatefromjpeg($name);
	  }
	  if(preg_match('/png/', $system[count($system) - 1])){
	     $srcImg = imagecreatefrompng($name);
	  }
	  if(preg_match('/gif/', $system[count($system) - 1])){
	     $srcImg = imagecreatefromgif($name);
	  }
	  */
	  if($type != ''){
		  if(preg_match('/jpg|jpeg/', $type)){
			 $srcImg = imagecreatefromjpeg($name);
		  }
		  if(preg_match('/png/', $type)){
			 $srcImg = imagecreatefrompng($name);
		  }
		  if(preg_match('/gif/', $type)){
			 $srcImg = imagecreatefromgif($name);
		  }
	  }
	  else{
 			 $srcImg = imagecreatefromjpeg($name);
	  }
	  $ext = '';
	  
	  if(empty($newW) || empty($newH)) {
	     if(preg_match("/png/", $system[1])) {
		    imagepng($srcImg, $fname . '.png');
			$ext = '.png';
	     } else {
		    imagejpeg($srcImg, $fname . '.jpg');
			$ext = '.jpg';
		 }
		 
		 imagedestroy($srcImg);
		 
		 return $ext;
	  }
	  
	  $oldX = imageSX($srcImg);
	  $oldY = imageSY($srcImg);
	  if($oldX > $oldY) {
	     $thumbW = $newW;
		 $thumbH = $oldY * ($newH / $oldX);
	  }
	  if ($oldX < $oldY) {
	     $thumbW = $oldX * ($newW / $oldY);
		 $thumbH = $newH;
	  }
	  if ($oldX == $oldY) {
		 $thumbW = $newW;
		 $thumbH = $newH;
	  }
	  
	  $dstImg=ImageCreateTrueColor($thumbW, $thumbH);
	  imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $thumbW, $thumbH, $oldX, $oldY); 
	  
	  if(preg_match("/png/", $system[1])) {
	     imagepng($dstImg, $fname . '.png');
		 $ext = '.png';
	  } else {
	     imagejpeg($dstImg, $fname . '.jpg');
		 $ext = '.jpg';
	  }
	  imagedestroy($dstImg);
	  imagedestroy($srcImg);
//	  echo $ext;
	  return $ext;
   }
   
//---$name is name of html control(<input type='file' name) comming in request and $newName is the name that u wants to save with-----
function fun_uploadImage($name,$newName,$dirName = '')
{
		$fName = $_FILES[$name]['name'];
		$tmpName = $_FILES[$name]['tmp_name'];
		$mimType = $_FILES[$name]['type'];
		$size = $_FILES[$name]['size'];
//		echo '<br>';		print_r($_FILES);
		if($tmpName != '')//if file found
		{		
			if(!fun_imageMimeTypeValidation($mimType))
			{
				page_addError('Not valid Mim Type of Image');
				return false;
			}
			if($size == 0)
			{
				page_addError('File is empty');
				return false;		
			}
	
			if($size > MAX_FILE_SIZE)
			{
				page_addError('File too large');
				return false;		
			}
			
			$ext = substr($fName,strrpos($fName,"."));		
			$ext = strtolower($ext);
			if(!($ext == '.jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'bmp'))
			{
				page_addError('Wrong File Extention');
				return false;		
			}
			$newName =  $newName.$ext;		
			 $dest = UPLOAD_DIR_ROOT."/".$dirName.'/'.$newName;		
			if(move_uploaded_file ( $tmpName, $dest))
			{
//				print "<br>$newName is successfull saved<br>";
				return $newName;
			}
		}
	return false;
}
///=------------------------------------------------------------------------------------------------
function fun_imageMimeTypeValidation($type)
{
		  if(preg_match('/jpg|jpeg/', $type) || preg_match('/png/', $type) || preg_match('/gif/', $type))
		  {
		  	return true;
		 }
		 else
		 {			
		 	return false;
		 }
}
 //----------this function will copy the small image from already saved image from the server you just have to give image name 
 //on the UPLOAD_DIR_ROOT directory onward it will handel----------
function fun_createSmallImage($savedFileName,$dirName='')
{
	$src = UPLOAD_DIR_ROOT."/".$dirName.'/'. $savedFileName;
	if(file_exists($src)) 
	{
		$pos = strrpos($savedFileName,".");
		$newName = substr($savedFileName,0,$pos);//without extention
		fun_createThumb($src, UPLOAD_DIR_ROOT."/".$dirName.'/small/'. $newName, '', UPLOAD_SMALL_IMAGE_WIDTH, UPLOAD_SMALL_IMAGE_HEIGHT);	
	}
}
//-----------------------same as upper--------------------------------------
function fun_createMediumImage($savedFileName,$dirName='')
{
	$src = UPLOAD_DIR_ROOT."/".$dirName.'/'. $savedFileName;
	if(file_exists($src)) 
	{
		$pos = strrpos($savedFileName,".");
		$newName = substr($savedFileName,0,$pos);//without extention
		fun_createThumb($src, UPLOAD_DIR_ROOT."/".$dirName.'/medium/'. $newName, '', UPLOAD_MEDIUM_IMAGE_WIDTH, UPLOAD_MEDIUM_IMAGE_HEIGHT);	
	}
}
function fun_removeImagesFromFile($oldImage)
{
	$src=UPLOAD_DIR_ROOT.'/'.$oldImage;
	if(is_file($src)) 
	{
		unlink($src);
	}
	$src = UPLOAD_DIR_ROOT.'/small/'.$oldImage;
	if(is_file($src)) 
	{
		unlink($src);
	}
	$src = UPLOAD_DIR_ROOT.'/medium/'.$oldImage;
	if(is_file($src)) 
	{
		unlink($src);
	}
}
//-----------------------------------------
function fun_setPage($sql,$curFileName,$MaxRecInPage=5)
{
	$MaxPages = 20;
	$nextPageNo = isset($_REQUEST['nextPageNo']) ? $_REQUEST['nextPageNo'] : '1';	
	$startCount = ($nextPageNo-1) * $MaxRecInPage;
	$curPageNo = $nextPageNo;
	$rs = db_query($sql);
	$totalRec = @mysql_num_rows($rs);
	$totalPages = ceil($totalRec/$MaxRecInPage);
	
	$sql = "$sql limit $startCount,$MaxRecInPage";
	page_setParam('totalPages', $totalPages);
	page_setParam('curPageNo', $curPageNo);
	page_setParam('curFileName', $curFileName);	
	//print "Total Records := $totalRec<br>Total Pages := $totalPages<br>From:- $startCount - To - $MaxRecInPage<br>";
	return db_query($sql);	
}
//-----------------------------------------------------
//========================multiple files uploading================/
function uploadfiles($image,$i){	
	
	
	if($image != ""){	
		$count = 1;
		$ext = strrchr($image,".");
		$length = strlen($image) - strlen($ext);
	 	$image_name = substr($image,0,$length);
//===========================		
		if ($handle = opendir(UPLOAD_DIR_ROOT)) {//reading dir		    

		while (false !== ($file = readdir($handle))) { 
		
		$dirFile = strrchr($file,"_");
		$lengthFile = strlen($file) - strlen($dirFile);
		$file = substr($file,0,$lengthFile);
			if((strcmp($image_name,$file)) == 0){
				$count = $count + 1;				
			}			
	      	  
    }//end of while
}// end of if
	

//-=============================================================
		$uploaddir = UPLOAD_DIR_ROOT.'/';
// 		$ext = strrchr($image,".");
//		$length = strlen($image) - strlen($ext);
	 	$image = substr($image,0,$length). "_".$count.$ext;
		$uploadfile = $uploaddir . basename(trim($image));	
		if(move_uploaded_file($_FILES["image_".$i]['tmp_name'],$uploadfile)){
			page_addMessage($image." "."uploaded successfully");
			return $image;
			
		
		}
		else
		{
			page_addError($image." "."uploading failure");
		}
	}
 }// end of if	
//----------------------
function fun_mkDIR($dirName){
	if(!is_dir($dirName)){
		mkdir($dirName,0777);
		chmod($dirName,0777);
//		$dirName = . "/". $formData['name'];
		mkdir($dirName."/small",0777);
		chmod($dirName."/small",0777);
		
		mkdir($dirName."/medium",0777);
		chmod($dirName."/medium",0777);
		
		mkdir($dirName."/source",0777);
		chmod($dirName."/source",0777);
	}

}
//=================================
function fun_createSourceFile($name,$savedFileName,$dirName='')
{
	$src = UPLOAD_DIR_ROOT."/".$dirName.'/'. $savedFileName;
	if(file_exists($src)) 
	{
		 $tmpName = $_FILES[$name]['tmp_name'];
		$pos = strrpos($savedFileName,".");
		 $newName = substr($savedFileName,0,$pos);//without extention
		 $dest =  UPLOAD_DIR_ROOT."/".$dirName.'/source/'.$newName . '.flv';
		if(move_uploaded_file ( $tmpName, $dest)){
			
		}
		

	}
}

function selfURL() {
	$s = empty($_SERVER["HTTPS"]) ? ''
		: ($_SERVER["HTTPS"] == "on") ? "s"
		: "";
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? ""
		: (":".$_SERVER["SERVER_PORT"]);
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}
function strleft($s1, $s2) {
	return substr($s1, 0, strpos($s1, $s2));
}

?>
