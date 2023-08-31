<script>

    const types = $("#type");
    const brands = $("#brand");
    const models = $("#model");
    const gears = $("#gear");
    const fuels = $("#fuel");
    const colors = $("#color");
    const case_types = $("#case");
    const sale_types = $("#sales_type");
    const owner = $("#owner");
    const statuses = $("#status");

    $(document).ready(function() {
        types.select2({
            theme: 'bootstrap-5',
            allowClear: false
        });

        types.on('change', function() {

            const id   = this.value;
            axios.post('{{ route('get-brands') }}', {id:id})
                .then((res)=>{
                    $('.brands').remove();
                    $('.models').remove();
                    if (res.data.length != 0) {
                        $.each(res.data,function(index, brand) {
                            brands.append("<option class='brands' value='"+ brand.id +"'>"+ brand.name +"</option>");
                        });
                    }
                });

        });

        brands.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });

        brands.on('change', function() {
            const id   = this.value;
            axios.post('{{ route('get-models') }}', {id:id})
                .then((res)=>{
                    $('.models').remove();
                    if (res.data.length != 0) {
                        $.each(res.data,function(index, model) {
                            models.append("<option class='models' value='"+ model.id +"'>"+ model.name +"</option>");
                        });
                    }
                });
        });

        models.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });

        gears.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });

        fuels.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });

        colors.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });

        case_types.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });

        sale_types.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });

        owner.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });

        statuses.select2({
            placeholder: 'Seçiniz',
            theme: 'bootstrap-5'
        });
    });
</script>
