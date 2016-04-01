<?php

function page_setParam($name, $val) {
	global $pageParams;

	$pageParams[$name] = $val;
}


function page_getParam($name, $default='') {
	global $pageParams;

	return isset($pageParams[$name]) ? $pageParams[$name] : $default;
}

function page_addError($sErr) {
	global $pageParams;
	
	$pageParams['ERROR'][] = $sErr;
}

function page_addMessage($sMsg) {
	global $pageParams;
	
	$pageParams['MESSAGE'][] = $sMsg;
}


function &page_getError() {
	global $pageParams;
	return $pageParams['ERROR'];
}

function page_isError() {
	global $pageParams;
	return isset($pageParams['ERROR']) ? count($pageParams['ERROR']) : false;
}

function page_resizeImage($name, $fname, $newW, $newH) {
      $system=explode('.', $name);
	  
	  if(preg_match('/jpg|jpeg/', $system[1])){
	     $srcImg = imagecreatefromjpeg($name);
	  }
	  if(preg_match('/png/', $system[1])){
	     $srcImg = imagecreatefrompng($name);
	  }
	  if(preg_match('/gif/', $system[1])){
	     $srcImg = imagecreatefromgif($name);
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
	     imagepng($dstImg, $fname); 
	  } else {
	     imagejpeg($dstImg, $fname); 
	  }
	  imagedestroy($dstImg); 
	  imagedestroy($srcImg); 
}

?>