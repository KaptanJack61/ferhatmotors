<script src="{{ asset('static/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
<script>
    $("#adverTable").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json"
        },
        order: [[0, 'desc']]
    });

    $(".new_status").on("change", function(){
        var id = $(this).attr('advert-id');
        var status = $(this).val();

        axios.post('{{ route('advert-change-status') }}', {id:id, status:status}).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        });
    });

    $(".saveNote").on("click", function(){
        var note = $("#note"+$(this).attr('advert-id')).val();
        var id   = $(this).attr('advert-id');

        axios.post('{{ route('advert-add-note') }}', {id:id,note:note}).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        });
    });

    $(".saveSell").on("click", function(){
        var id   = $(this).attr('advert-id');
        var amount = $("#amount"+$(this).attr('advert-id')).val();

        axios.post('{{ route('advert-sell') }}', {id:id, amount:amount}).then((res) => {
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
            }
        });
    });


    $(document).ready(function() {
        $('.expenseAmount').inputmask('999.999.999');
    });

    $(document).ready(function() {
        $('.amount').inputmask('999.999.999');
    });

</script>
