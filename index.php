<?php
    include_once('header.php');    

    $_SESSION['custid'] = uniqid();
?>

<div class="container">

    <?php
        include 'conn.php';

        $query = mysqli_query($con,"SELECT * FROM item_type");

        while($row = mysqli_fetch_array($query)){            
        
            echo '<div class="col-xs-12 col-sm-6 col-md-4 type">        
                    <div class="item_category" onclick=location.href="itemsearch.php?id='.$row['TYPE_ID'].'">
                    <span class="badge" style="position: absolute; right: 120px;font-size: 15px;border-radius: 50px; background-color: maroon">';
                    $query2 = mysqli_query($con,"SELECT COUNT(*) AS ITEM FROM ITEM WHERE ITEM_TYPE = '".$row['TYPE_ID']."' AND ITEM_STATUS = 'AVA'");
                    $row2 = mysqli_fetch_array($query2);
                    echo $row2['ITEM'];
                    echo '</span>
                        <img src="'.$row['TYPE_IMAGE'].'"   style="padding-top: 10px">       
                        <br/>
                        <label style="font-size: 35px;">'.$row['TYPE_NAME'].'</label>                     
                    </div>
            </div>  
            ';
        }
    ?>
</div>

<?php
    include_once('footer.php');
?>


