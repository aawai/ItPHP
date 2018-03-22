<!DOCTYPE html>
<html>
<head>

</head>
<style type="text/css">
html ,body {
	margin:0;
	padding: 0;
	overflow:hidden;
	/* background-color: #FFF500; */
}
.fixed {
	position: fixed;
	width:100%;
	height: 100%;
	text-align: center;
}
.fixed .content {
	display: inline-block;
	max-width: 768px;
	vertical-align: middle;
}
.fixed::after {
	content: ' ';
	width: 0;
	height:100%;
	display:inline-block;
	vertical-align: middle;
}
.back a {
	color:#fff;
	font-size: 18px;
	font-weight: blod;
	padding: 10px 55px;
	border-radius: 3px;
	text-decoration: none;
	
	background-color: #FF5372;
}
.back a:hover { 
	box-shadow: 1px 0 2px silver;
	background-color: #FF6C81;
}
.content h1 {
	font-size: 42px;
	color: #FF5372;
	letter-spacing: 3px;
	margin-bottom:30px;
}
</style>
<title>404</title>
<body>
<div class="fixed">
	<div class="content">
		<!-- <img src="<?php echo __PUBLIC__;?>/logo.png" alt="" class="img404"> -->
		<h1>404 not found</h1>
		<div class="back">
			<a href="<?php echo __ROOT__;?>">HOME</a>
		</div>
	</div>

</div>
</body>
</html>