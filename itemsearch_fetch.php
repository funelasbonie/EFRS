<?php
include 'conn.php';
session_start();

$output = '';

if(isset($_POST["dun"]))
{
	$search = mysqli_real_escape_string($con, $_POST["dun"]);
	$query = "SELECT * FROM ITEM WHERE ITEM_BRAND LIKE '%".$search."%' AND ITEM_TYPE = '".$_SESSION['id']."' AND  ITEM_STATUS = 'AVA'";
}
else
{	
	$query = "SELECT * FROM ITEM WHERE ITEM_TYPE = '".$_SESSION['id']."' AND  ITEM_STATUS = 'AVA'";
}

$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_array($result))
	{
        $output .= '			
                    <div class="container" style="padding: 10px;border:1px solid lightgray" onclick=location.href="item.php?itemid='.$row['ITEM_ID'].'"> 
                        <div class="col-xs-4">  
                        <br/>                      
                        <img src="'.$row['ITEM_IMAGE'].'" width="60" height="50">
                        </div>                    
                        <div class="col-xs-8">
                            <h4>'.$row['ITEM_NAME'].'</h4>    
                            <p>'.$row['ITEM_ID'].'</p>                                      
                        </div>                                      
                    </div>                   
                    <br/>                            
		';
    }

    echo $output;                                                                                                                
    
}
else
{
	echo '<br/>';
	echo 'Data Not Found';
}

?>