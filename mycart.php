<?php
    include_once('header.php');        
?>
<div class="container">
    <?php
        include 'conn.php';

        $query = mysqli_query($con, "SELECT * FROM CART WHERE CUST_ID = '".$_SESSION['custid']."'");

        if(mysqli_num_rows($query) !=0){
            while($row = mysqli_fetch_array($query))
            {
                echo '                                        
                            <div class="container" style="padding: 10px;border:1px solid lightgray">                             
                                <div class="col-xs-4">  
                                    <br/>                      
                                    <img src="'.$row['ITEM_IMAGE'].'" width="60" height="50">
                                </div>                    
                                <div class="col-xs-5">
                                    <h4>'.$row['ITEM_NAME'].'</h4>    
                                    <p>'.$row['ITEM_ID'].'</p>                                      
                                </div>  
                                <div class="col-xs-3">
                                    <br/>
                                    <button class="btn btn-sm btn-danger" onclick=location.href="deletemycart.php?id='.$row['ITEM_ID'].'" style="float:right"><span class="glyphicon glyphicon-trash"></span></button>
                                </div>                                    
                            </div>                             
                                
                        <br/>  ';
            }        
            echo '<button class="btn btn-info" onclick=location.href="completeorder.php">Complete</button>';
        }
        else{
            echo '<h3 style="text-align: center">Your cart is empty!</h3>';
        }
    ?>
        
</div>
<?php
    include_once('footer.php');  
?>



