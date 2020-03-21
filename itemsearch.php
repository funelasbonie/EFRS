<?php
    include_once('header.php');        
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
?>

<div class="container">
        <div class="input-group" style="z-index: 0">
            <span class="input-group-addon">Search</span>
            <input type="text" class="form-control" id="Search" placeholder="Enter Item Name">
        </div>        
        <hr/>
        <div id="result">
        </div>
</div>

<?php
    include_once('footer.php');
?>

<script>
    $(document).ready(function(){

      load_data();

      function load_data(dito){
        $.ajax({
            url:"itemsearch_fetch.php",
            method:"POST",
            data:{dun:dito},
            success:function(data){
              $('#result').html(data)
            } 
        })  
      }

      $('#Search').keyup(function(){
        var search = $(this).val();

        if(search != ""){
          load_data(search);
        }
        else{
          load_data();
        }
        })  
    })

</script>

