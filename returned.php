<?php
    include_once('adminheader.php');
?>
<div class="container">
<div style="border-bottom: 1px solid darkgray; padding-bottom: 5px"><label style="font-size: 30px">Returned Items</label></div>
<br/>
    <!-- <div style="display:block">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">  -->
                <?php
                    include 'conn.php';

                    $query = mysqli_query($con, "SELECT DISTINCT(CUST_ID) AS CUST_ID,CUST_NAME, CUST_DEPARTMENT FROM RESERVATION WHERE RES_STATUS = 'RETU'");
                    while($row = mysqli_fetch_array($query)){
                        echo '
                        <div class="container" style="padding: 10px;border:1px solid lightgray"> 
                        <div class="col-xs-4">  
                        <br/>                      
                        <div style="text-align: center"><label style="font-size: 30px"><span class="glyphicon glyphicon-user"></label></div>
                        </div>                    
                        <div class="col-xs-8">
                            <h4>'.$row['CUST_DEPARTMENT'].'</h4>    
                            <p>'.$row['CUST_NAME'].'</p>                                      
                        </div>                                      
                    </div>                   
                    <br/>   
                        ';
                    }
                ?>
<?php
    include_once('footer.php');
?>