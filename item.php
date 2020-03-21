<?php
    include_once('header.php');    

    $itemid = $_GET['itemid'];
    $_SESSION['itemid'] = $itemid;

    include 'conn.php';

    if(isset($_POST['submit']))
    {
        
        $custid = $_POST['custid'];
        $itemimage = $_POST['itemimage'];
        $itemname = $_POST['itemname'];
        $itemid = $_POST['itemid'];

        $query = mysqli_query($con, "SELECT * FROM CART WHERE ITEM_ID='".$itemid."' AND CUST_ID = '".$custid."'");

        if(mysqli_num_rows($query) >= 1){
            echo '<script>alert("Item is already in the cart")</script>';
        }
        else{
            $query1 = mysqli_query($con, "INSERT INTO CART (CUST_ID, ITEM_ID, ITEM_NAME, ITEM_IMAGE) VALUES ('$custid', '$itemid', '$itemname', '$itemimage')");

            if($query1){               
                echo '<script>addtocart();</script>';                
            }       
        }

        
    }
?>

<div class="container">
    <?php
        include 'conn.php';

        $query = mysqli_query($con,"SELECT * FROM ITEM WHERE ITEM_ID='".$_SESSION['itemid']."'");

        while($row = mysqli_fetch_array($query)){     
            echo '
                <form method="POST" action="">
                    <div style="display: none">
                        <input type="text" name="custid" value="'.$_SESSION['custid'].'">
                        <input type="text" name="itemimage" value="'.$row['ITEM_IMAGE'].'">
                        <input type="text" name="itemid" value="'.$row['ITEM_ID'].'">
                        <input type="text" name="itemname" value="'.$row['ITEM_NAME'].'">
                    </div>
                    <div class="container" style="padding: 10px;border:1px solid lightgray"> 
                        <div class="col-xs-4">  
                            <br/>                      
                            <img src="'.$row['ITEM_IMAGE'].'" width="60" height="50">
                        </div>                    
                        <div class="col-xs-8">
                            <h4>'.$row['ITEM_NAME'].'</h4>    
                            <p>'.$row['ITEM_ID'].'</p>                                      
                            <p>'.$row['ITEM_STATUS'].'</p>
                            <input type="submit" name="submit" class="btn btn-info" value="Add to Cart">       
                        </div>                                                 
                    </div> 
                </form>
            ';
        }
    ?>
</div>

<?php
    include_once('footer.php');
?>