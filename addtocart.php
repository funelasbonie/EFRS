<?php
    include 'conn.php';

    if(isset($_POST['submit']))
    {
        $custid = $_POST['custid'];
        $itemimage = $_POST['itemimage'];
        $itemname = $_POST['itemname'];
        $itemid = $_POST['itemid'];

        $query = mysqli_query($con, "INSERT INTO CART (CUST_ID, ITEM_ID, ITEM_NAME, ITEM_IMAGE) VALUES ('$custid', '$itemid', '$itemname', '$itemimage')");

        if($query){
            $queryy = mysqli_query($con, "UPDATE ITEM SET ITEM_STATUS = 'NOT_AVA' WHERE ITEM_ID = '$itemid'");
            if($queryy){
                header('location:main.php');
            }    
        }       

        

    }

?>