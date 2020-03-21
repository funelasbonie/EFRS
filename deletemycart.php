<?php    
    include 'conn.php';
    session_start();        
    $id = $_GET['id'];

    $query = mysqli_query($con, "DELETE FROM CART WHERE ITEM_ID = '".$id."' AND CUST_ID = '".$_SESSION['custid']."'");        
    if($query){
        header("location:mycart.php");
        //echo '<script>alert("Item removed!")</script>';
    }

?>