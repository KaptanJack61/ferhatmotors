<script>
    $(document).ready(function(){
        id = $("#id").val();
        axios.post('{{ route('get-photos') }}', {id:id}).then((res) => {

            var photoArray = res.data.map(item => item.file);

            // Diziyi virgül ile ayırıp tek bir string haline getir
            var photoDataString = photoArray.join(',');

            // Elde edilen string'i #photodata inputuna yazdır
            $("#photodata").val(photoDataString);

            // Dizideki resim yollarını önizleme olarak eklemek için döngü
            for (let i = 0; i < res.data.length; i++) {
                // $("#photoPreview").append('<img src="/storage/'+res.data[i].file+'" class="wd-50 border-5 m-2" alt="...">');
            }
        });
    });

    $(".delImg").on("click", function(){
        var id = $(this).attr('id');
        axios.post('{{ route('advert-delete-photo') }}', {id:id}).then((res) => {
            if(res.data.status){
                window.location.reload();
            }
        })
    });

    $(document).ready(function() {
        $('#buy_price').inputmask('999.999.999');
        $('#sell_price').inputmask('999.999.999');
        $('#damage').inputmask('999.999.999');

    });
</script>
