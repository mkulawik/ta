<?php 
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */
include "app/config.php";
include "app/detect.php";
include_once "analyticstracking.php";

if ($page_name=='') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='index.html') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='about.php') {
	include $browser_t.'/about.php';
	}
elseif ($page_name=='gallery.php') {
	include $browser_t.'/gallery.html';
	}
elseif ($page_name=='services.php') {
	include $browser_t.'/services.html';
	}
elseif ($page_name=='contact.php') {
	include $browser_t.'/contact.html';
	}
elseif ($page_name=='contact-post.php') {
	include $browser_t.'/contact.html';
	include 'app/contact.php';
	}
else
	{
		include $browser_t.'/404.html';
	}

?>