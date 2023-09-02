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
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                },
                    {
                        title: 'Test template 2',
                        content: 'Test 2'
                    }
                ],
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
