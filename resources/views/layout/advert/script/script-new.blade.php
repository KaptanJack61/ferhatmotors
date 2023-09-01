<script>
    $("#sales_type").on("change", function(){
        if($(this).val() == 2){
            $("#profitRow").removeClass('d-none');
        }else{
            $("#profitRow").addClass('d-none');
        }
    });

    $(document).ready(function() {
        $('#buy_price').inputmask('999.999.999');
        $('#sell_price').inputmask('999.999.999');
        $('#damage').inputmask('999.999.999');

    });
</script>
