    
</body>
</html>

<script src="js/jquery-1.11.3-jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="css/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="css/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>
<script src="datetimepicker/jquery.datetimepicker.full.min.js"></script>

<script>
        $('#picker1').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'Y-m-d',                        
            onShow: function(ct){
                this.setOptions({
                    maxDate: $('#picker2').val() ? $('#picker2').val() : false
                })
            }
        })
        $('#picker2').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'Y-m-d',                        
            onShow: function(ct){
                this.setOptions({
                    minDate: $('#picker1').val() ? $('#picker1').val() : false
                })
            }
        })
</script>