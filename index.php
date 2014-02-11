<?php

include 'qrcode.php';
if(!empty($_POST['url']) && !empty($_POST['size']))
{
	$url = strip_tags($_POST['url']);
	$size = strip_tags($_POST['size']);

	if(filter_var($url,FILTER_VALIDATE_URL) && is_numeric($size) && $size <= 500)
	{
		$qr = new qrcode;
		$filename = uniqid();
		$qr->save($size, 'files/'.$filename);

		header('Content-type:image/png');
		echo file_get_contents('files/'.$filename.'.png');
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>QR CODE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
		body { padding-top: 60px; padding-bottom: 40px; }
	</style>
	<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/images/apple-touch-icon-114x114.png">
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">QR CODE</a>
				<div class="nav-collapse">
					<ul class="nav">

					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">

		<form action="" method="post" class="form-inline">
			<input type="text" name="url" placeholder="Entrez une url">
			<input type="text" name="size" class="span1" placeholder="taille px">
			<input type="submit" class="btn"  value="Générer!">
		</form>

	</div> <!-- /container -->

</body>
</html>


