.slider{
 }
.camera_wrap a, .camera_wrap img, 
.camera_wrap ol, .camera_wrap ul, .camera_wrap li,
.camera_wrap table, .camera_wrap tbody, .camera_wrap tfoot, .camera_wrap thead, .camera_wrap tr, .camera_wrap th, .camera_wrap td
.camera_thumbs_wrap a, .camera_thumbs_wrap img, 
.camera_thumbs_wrap ol, .camera_thumbs_wrap ul, .camera_thumbs_wrap li,
.camera_thumbs_wrap table, .camera_thumbs_wrap tbody, .camera_thumbs_wrap tfoot, .camera_thumbs_wrap thead, .camera_thumbs_wrap tr, .camera_thumbs_wrap th, .camera_thumbs_wrap td {
	background: none;
	border: 0;
	font: inherit;
	font-size: 100%;
	margin: 0;
	padding: 0;
	vertical-align: baseline;
	list-style: none
}
.camera_wrap {
	display: none;
	float: left;
	position: relative;
	z-index: -1;
}
.camera_wrap img {
	max-width: none!important;
}
.camera_fakehover {
	height: 100%;
	min-height: 60px;
	position: relative;
	width: 100%;
	z-index: 1;
}
.camera_wrap {
	width: 100%;
}
.camera_src {
	display: none;
}
.cameraCont, .cameraContents {
	height: 70%;
	position: relative;
	width: 100%;
	z-index: 1;
}
.cameraSlide {
	bottom: 0;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
	width: 100%;
}
.cameraContent {
	bottom: 0;
	display: none;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
	width: 100%;

}
.camera_target {
	bottom: 0;
	height: 100%;
	left: 0;
	overflow: hidden;
	position: absolute;
	right: 0;
	text-align: left;
	top: 0;
	width: 100%;
	z-index: 0;
}
.camera_overlayer {
	bottom: 0;
	height: 100%;
	left: 0;
	overflow: hidden;
	position: absolute;
	right: 0;
	top: 0;
	width: 100%;
	z-index: 0;
}
.camera_target_content {
	bottom: 0;
	left: 0;
	overflow: hidden;
	position: absolute;
	right: 0;
	top: 0;
	z-index: 2;
}
.camera_target_content .camera_link {
	display: block;
	height: 100%;
	text-decoration: none;
}
.camera_loader {
    background: #fff url(../images/camera-loader.gif) no-repeat center;
	background: rgba(255, 255, 255, 0.9) url(../images/camera-loader.gif) no-repeat center;
	border: 1px solid #ffffff;
	-webkit-border-radius: 18px;
	-moz-border-radius: 18px;
	border-radius: 18px;
	height: 36px;
	left: 50%;
	overflow: hidden;
	position: absolute;
	margin: -18px 0 0 -18px;
	top: 50%;
	width: 36px;
	z-index: 3;
}
.camera_bar {
	bottom: 0;
	left: 0;
	overflow: hidden;
	position: absolute;
	right: 0;
	top: 0;
	z-index: 3;
}
.camera_thumbs_wrap.camera_left .camera_bar, .camera_thumbs_wrap.camera_right .camera_bar {
	height: 100%;
	position: absolute;
	width: auto;
}
.camera_thumbs_wrap.camera_bottom .camera_bar, .camera_thumbs_wrap.camera_top .camera_bar {
	height: auto;
	position: absolute;
	width: 100%;
}
.camera_nav_cont {
	height: 65px;
	overflow: hidden;
	position: absolute;
	right: 9px;
	top: 15px;
	width: 120px;
	z-index: 4;
}
.camera_caption {
	bottom: 0;
	display: block;
	position: absolute;
	width: 100%;
}
.camera_caption > div {
	padding: 10px 20px;
}
.camerarelative {
	overflow: hidden;
	position: relative;
}
.imgFake {
	cursor: pointer;
}
.camera_prevThumbs {
	bottom: 4px;
	cursor: pointer;
	left: 0;
	position: absolute;
	top: 4px;
	visibility: hidden;
	width: 30px;
	z-index: 10;
}
.camera_prevThumbs div {
	background: url(../images/camera_skins.png) no-repeat -160px 0;
	display: block;
	height: 40px;
	margin-top: -20px;
	position: absolute;
	top: 50%;
	width: 30px;
}
.camera_nextThumbs {
	bottom: 4px;
	cursor: pointer;
	position: absolute;
	right: 0;
	top: 4px;
	visibility: hidden;
	width: 30px;
	z-index: 10;
}
.camera_nextThumbs div {
	background: url(../images/camera_skins.png) no-repeat -190px 0;
	display: block;
	height: 40px;
	margin-top: -20px;
	position: absolute;
	top: 50%;
	width: 30px;
}
.camera_command_wrap .hideNav {
	display: none;
}
.camera_command_wrap {
	left: 0;
	position: relative;
	right:0;
	z-index: 4;
}
.camera_wrap .camera_pag .camera_pag_ul {
	list-style: none;
	margin: 0;
	padding: 0;
	text-align:center;
}
.camera_pag_ul li {
	background: #EEE;
}
.camera_wrap .camera_pag .camera_pag_ul li {
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	cursor: pointer;
	display: inline-block;
	height: 16px;
	margin: 20px 5px;
	position: relative;
	text-align: left;
	text-indent: -9999px;
	width: 16px;
}
.camera_commands_emboss .camera_pag .camera_pag_ul li {
}
.camera_wrap .camera_pag .camera_pag_ul li > span {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	height: 8px;
	left: 4px;
	overflow: hidden;
	position: absolute;
	top: 4px;
	width: 8px;
}
.camera_commands_emboss .camera_pag .camera_pag_ul li:hover > span {
	-moz-box-shadow:
		0px 1px 0px rgba(255,255,255,1),
		inset 0px 1px 1px rgba(0,0,0,0.2);
	-webkit-box-shadow:
		0px 1px 0px rgba(255,255,255,1),
		inset 0px 1px 1px rgba(0,0,0,0.2);
	box-shadow:
		0px 1px 0px rgba(255,255,255,1),
		inset 0px 1px 1px rgba(0,0,0,0.2);
}
.camera_wrap .camera_pag .camera_pag_ul li.cameracurrent > span {
	-moz-box-shadow: 0;
	-webkit-box-shadow: 0;
	box-shadow: 0;
}
.camera_wrap .camera_pag .camera_pag_ul li.cameracurrent > span {
	background:#FFAF2C;
}
.camera_pag_ul li img {
	display: none;
	position: absolute;
}
.camera_pag_ul .thumb_arrow {
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 4px solid;
	top: 0;
	left: 50%;
	margin-left: -4px;
	position: absolute;
}
.camera_prev, .camera_next, .camera_commands {
	cursor: pointer;
	height: 40px;
	margin-top: -20px;
	position: absolute;
	top: 50%;
	width: 40px;
	z-index: 2;
}
.camera_prev {
	left:15px;
}
.camera_prev > span {
	background: url(../images/arrows.png) no-repeat 10px 0;
	display: block;
	height:45px;
	width:60px;
}
.camera_next {
	right:35px;
}
.camera_next > span {
	background: url(../images/arrows.png) no-repeat -50px 0;
	display: block;
	height:45px;
	width:60px;
}
.camera_commands {
	right: 41px;
}
.camera_wrap .camera_pag .camera_pag_ul li {
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	cursor: pointer;
	display: inline-block;
	height: 16px;
	margin: 20px 5px;
	position: relative;
	text-indent: -9999px;
	width: 16px;
}
.camera_thumbs_cont {
	-webkit-border-bottom-right-radius: 4px;
	-webkit-border-bottom-left-radius: 4px;
	-moz-border-radius-bottomright: 4px;
	-moz-border-radius-bottomleft: 4px;
	border-bottom-right-radius: 4px;
	border-bottom-left-radius: 4px;
	overflow: hidden;
	position: relative;
	width: 100%;
}
.camera_commands_emboss .camera_thumbs_cont {
	-moz-box-shadow:
		0px 1px 0px rgba(255,255,255,1),
		inset 0px 1px 1px rgba(0,0,0,0.2);
	-webkit-box-shadow:
		0px 1px 0px rgba(255,255,255,1),
		inset 0px 1px 1px rgba(0,0,0,0.2);
	box-shadow:
		0px 1px 0px rgba(255,255,255,1),
		inset 0px 1px 1px rgba(0,0,0,0.2);
}
.camera_thumbs_cont > div {
	float: left;
	width: 100%;
}
.camera_thumbs_cont ul {
	overflow: hidden;
	padding: 3px 4px 8px;
	position: relative;
	text-align: center;
}
.camera_thumbs_cont ul li {
	display: inline;
	padding: 0 4px;
}
.camera_thumbs_cont ul li > img {
	border: 1px solid;
	cursor: pointer;
	margin-top: 5px;
	vertical-align:bottom;
}
.camera_clear {
	display: block;
	clear: both;
}
.showIt {
	display: none;
}
.camera_clear {
	clear: both;
	display: block;
	height: 1px;
	margin: -1px 0 25px;
	position: relative;
}
