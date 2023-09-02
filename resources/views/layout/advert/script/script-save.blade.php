<script>
    $("#advertSaveBtn").on("click", function(){
        var formData = $("#advertForm").serialize();

        axios.post('{{ route($name) }}', formData)
            .then((res)=>{
            toastr[res.data.type](res.data.message);
            if(res.data.status){
                setInterval(() => {
                    window.location.assign(res.data.link);
                }, 1000);
            }
        });
    });
</script>
