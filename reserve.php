<?php
    include_once('adminheader.php');
    session_start();
    include 'conn.php';

    $custid = $_GET['custid'];
?>
<div class="container">    
    <?php
        $query = mysqli_query($con, "SELECT * FROM RESERVATION WHERE CUST_ID = '".$custid."'");
        $row = mysqli_fetch_array($query);
            echo '<div>
                    <label>'.$row['CUST_ID'].'</label>
                    <label style="float: right">'.$row['CUST_DEPARTMENT'].'</label><br/>
                    <div style="text-align: center"><label style="font-size: 30px"><span class="glyphicon glyphicon-user" style="padding-right: 10px;padding-top: 10px;"></span>' .$row['CUST_NAME'].'</label></div>
                    <div style="text-align: center">
                        <p>'.$row['CUST_EMAIL'].'</p>
                        <p>'.$row['CUST_CONTACT'].'</p>
                        <p><b>Borrow Date: </b>'.$row['BORROW_DATE'].'</p>
                        <p><b>Return Date: </b>'.$row['RETURN_DATE'].'</p>
                    </div>
                  </div>  
                    ';
    ?>
    <hr/>
    <div style="display:block">
        <div class="table-responsive">
            <table class="table table-striped table-bordered"> 
                <tr>
                    <th colspan="2">ITEM</th>                    
                </tr>
                <?php
                
                    $query = mysqli_query($con, "SELECT * FROM RESERVATION INNER JOIN ITEM ON RESERVATION.ITEM_ID = ITEM.ITEM_ID WHERE CUST_ID = '".$custid."'");
                    while($row = mysqli_fetch_array($query)){
                        echo '
                            <tr style="text-align: center">
                                <td><img src='.$row['ITEM_IMAGE'].' width="60" height="50"></td>
                                <td>
                                    <label style="font-size: 20px">'.$row['ITEM_BRAND'].'</label><br/>
                                    <p>'.$row['ITEM_NAME'].'</p>
                                </td>
                            </tr>
                        ';
                    }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
    include_once('footer.php');
?>