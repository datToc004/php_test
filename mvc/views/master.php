<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Datpro - Administrator</title>
<base href="http://localhost:8080/php_test/">
<link href="public/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="public/admin/css/datepicker3.css" rel="stylesheet">
<link href="public/admin/css/bootstrap-table.css" rel="stylesheet">
<link href="public/admin/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="public/admin/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
		
	<?php require_once "./mvc/views/components/header.php"; ?>	
	<?php require_once "./mvc/views/components/sidebar.php"; ?>	
	
	<?php
        require_once "./mvc/views/pages/film/".$data['pages'].".php";
    ?>

	<script src="public/admin/js/jquery-1.11.1.min.js"></script>
	<script src="public/admin/js/bootstrap.min.js"></script>	
	<script src="public/admin/js/bootstrap-table.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</body>

</html>