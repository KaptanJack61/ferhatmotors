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

    function isNumericKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<script>
    $(function() {
        'use strict';
        //Tinymce editor
        tinymce.init({
            selector: 'textarea#description',
            language: 'tr',
            min_height: 350,
            default_text_color: 'red',
            plugins: [
                'advlist', 'autoresize', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
            image_advtab: true,
            content_css: []
        });
    });

    // Prevent Bootstrap dialog from blocking focusin
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });

</script>
