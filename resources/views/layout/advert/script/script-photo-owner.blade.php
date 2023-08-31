<script>
    $("#photo").on("change", function(e) {
        var files = e.target.files;

        console.log(files);

        var formData = new FormData();

        for (var i = 0; i < files.length; i++) {
            formData.append('photos[]', files[i]);
        }

        axios.post('{{ route('upload-photos') }}', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((res) => {
            toastr[res.data.type](res.data.message);
            if (res.data.status) {
                $("#photodata").val(res.data.paths);
                $("#photoLine").removeClass('d-none');
                for (let i = 0; i < res.data.paths.length; i++) {
                    $("#photoPreview").append('<img src="/storage/'+res.data.paths[i]+'" class="wd-50 border-5 m-2" alt="...">');
                }
            }
        }).catch((error) => {
            console.error(error);
        });
    });

    $("#owner").on("change", function(){
        if($(this).val() != 0){
            $("#ownername").val($("#owner :selected").html());
        }
    });
</script>
