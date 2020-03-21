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
    



<?php    
    include 'conn.php';    
    $resid = uniqid();

    if(isset($_POST['submit'])){
        $custid = $_POST['custid'];
        $itemid = $_POST['itemid'];
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $email = $_POST['email'];
        $cont = $_POST['cont'];
        $bdate = $_POST['bdate'];
        $rdate = $_POST['rdate'];

        foreach($itemid as $key => $it){
            $query = mysqli_query($con, "INSERT INTO RESERVATION(ITEM_ID, CUST_ID, CUST_NAME, CUST_DEPARTMENT, CUST_EMAIL, CUST_CONTACT, BORROW_DATE, RETURN_DATE,RES_STATUS) 
            VALUES ('$it','$custid[$key]','$name','$dept','$email','$cont','$bdate', '$rdate','RES')");
            if($query){                
                $query2 = mysqli_query($con, "UPDATE ITEM SET ITEM_STATUS = 'NOT AVA' WHERE ITEM_ID = '".$it."'");
                if($query2){
                    echo '<script>rescomplete();</script>';
                }
                
            }
            else{
                
            }
        }
    }
?>
<form method="POST">
<div class="container">
    <div style="display:block">
        <div class="table-responsive">
            <table class="table table-striped table-bordered"> 
    <?php
        include 'conn.php';

        $query = mysqli_query($con, "SELECT * FROM CART WHERE CUST_ID = '".$_SESSION['custid']."'");

        while($row = mysqli_fetch_array($query))
        {
            echo '            
                        <tr>
                            <td>'.$row['CUST_ID'].'</td>
                            <td>'.$row['ITEM_ID'].'</td>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td style="display: none"><input type="text" value="'.$row['CUST_ID'].'" name="custid[]" style="border:none;background-color:transparent"></td>
                            <td style="display: none"><input type="text" value="'.$row['ITEM_ID'].'" name="itemid[]" style="border:none;background-color:transparent"></td>
                        </tr>
                    
            ';
        }        
    ?>        
            </table>
        </div>
    </div>
</div>
<div class="container">
    
        <div>
            <div><label>Name<label></div>
            <input type="text" name="name" class="form-control" autocomplete="off" required>
        </div>
        <div>
            <div><label>Department<label></div>
            <input type="text" name="dept" class="form-control" autocomplete="off" required>
        </div>
        <div>
            <div><label>Email<label></div>
            <input type="email" name="email" class="form-control" autocomplete="off" required>
        </div>    
        <div>
            <div><label>Contact No.<label></div>
            <input type="text" name="cont" class="form-control" autocomplete="off" required>
        </div>  
        <div>
            <div><label>Borrow Date<label></div>
            <input type="text" name="bdate" class="form-control" id="picker1" name="date"  autocomplete="off" required>
            <div><label>Return Date<label></div>
            <input type="text" name="rdate" class="form-control" id="picker2" name="date" autocomplete="off" required>
        </div>  
        <br/>
        <div>
            <input type="submit" name="submit" class="btn btn-success" value="Done">
        </div>
    
</div>
</form>
<?php
    include_once('footer.php'); 
?>



