<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<script src="js/jquery-1.11.3-jquery.min.js"></script> 
	<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

	<script src="package/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="package/dist/sweetalert2.min.css">

    <title>EFRS</title>

    <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot');
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
        }
    </style>

<script>
	function addtocart(){
				swal({
 					title: 'Added to cart',
  					type: 'success',
  					showCancelButton: false,
      				confirmButtonColor: 'rgb(28,146,72)',
     				cancelButtonColor: '#d33',
  					confirmButtonText: 'Ok'
					}).then((result) => {
	     				if (result.value) {
    						window.location.href= 'itemsearch.php?id=<?php echo $_SESSION['id'];?>';
 						}
					})
				}
    function rescomplete(){
				swal({
 					title: 'Done',
  					type: 'success',
  					showCancelButton: false,
      				confirmButtonColor: 'rgb(28,146,72)',
     				cancelButtonColor: '#d33',
  					confirmButtonText: 'Ok'
					}).then((result) => {
	     				if (result.value) {
    						window.location.href= 'index.php';
 						}
					})
				}            
</script>
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">EFRS</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="main.php">Home</a></li>
                    <li><a href="mycart.php">My Cart</a></li>
                    <li><a href="adminlogin.php">Admin</a></li>
                    <li><a href="index.php">Exit</a></li>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                    </li>-->
                </ul>                
            </div>
        </div>
    </nav>
    <br/><br/><br/><br/>
    

