<script>
    $("#sales_type").on("change", function(){
        if($(this).val() == 2){
            $("#profitRow").removeClass('d-none');
        }else{
            $("#profitRow").addClass('d-none');
        }
    });
</script>
