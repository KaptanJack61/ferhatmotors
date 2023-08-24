@extends('master')

@section('title', 'Yeni İlan')

@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Yeni İlan </h4>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/advert">İlanlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Yeni İlan</li>
    </ol>
</nav>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" id="advertForm">
                  <input type="hidden" name="id" id="id" value="{{$advert->id}}">
                    <div class="col-md-4">
                        <label for="type">Tip *</label>
                        <select name="type" id="type" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($vehicleTypes as $type)
                                @if($type->id == $advert->type->id)
                                    <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                @else
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="brand">Marka *</label>
                        <select name="brand" id="brand" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($vehicleBrands as $brand)
                                @if($brand->id == $advert->brand->id)
                                    <option value="{{ $brand->id }}" selected class="brands">{{ $brand->name }}</option>
                                @else
                                    <option value="{{ $brand->id }}" class="brands">{{ $brand->name }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="model">Model *</label>
                        <select name="model" id="model" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($vehicleModels as $model)
                                @if($model->id == $advert->model->id)
                                    <option value="{{ $model->id }}" selected class="models">{{ $model->name }}</option>
                                @else
                                    <option value="{{ $model->id }}" class="models">{{ $model->name }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                      <label for="motor" class="form-label">Motor</label>
                      <input type="text" class="form-control" id="motor" name="motor" value="{{$advert->motor}}">
                    </div>
                    <div class="col-3">
                      <label for="pack" class="form-label">Paket</label>
                      <input type="text" class="form-control" id="pack" name="package" value="{{$advert->package}}">
                    </div>
                    <div class="col-3">
                      <label for="km" class="form-label">KM *</label>
                      <input type="text" class="form-control" id="km" name="km" value="{{$advert->km}}">
                    </div>
                    <div class="col-3">
                      <label for="year" class="form-label">Yıl *</label>
                      <input type="text" class="form-control" id="year" name="year" value="{{$advert->year}}">
                    </div>
                    <div class="col-3">
                        <label for="gear">Şanzıman</label>
                        <select name="gear" id="gear" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($gears as $gear)
                                @if($gear->id == $advert->gear->id)
                                    <option value="{{ $gear->id }}" selected>{{ $gear->name }}</option>
                                @else
                                    <option value="{{ $gear->id }}">{{ $gear->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3">
                        <label for="fuel">Yakıt</label>
                        <select name="fuel" id="fuel" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($fuels as $fuel)
                                @if($fuel->id == $advert->fuel->id)
                                    <option value="{{ $fuel->id }}" selected>{{ $fuel->name }}</option>
                                @else
                                    <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="color">Renk</label>
                        <select name="color" id="color" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($colors as $color)
                                @if($color->id == $advert->color->id)
                                    <option value="{{ $color->id }}" selected>{{ $color->name }}</option>
                                @else
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="case">Kasa Tipi</label>
                        <select name="case" id="case" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($case_types as $case_type)
                                @if($case_type->id == $advert->caseType->id)
                                    <option value="{{ $case_type->id }}" selected>{{ $case_type->name }}</option>
                                @else
                                    <option value="{{ $case_type->id }}">{{ $case_type->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                      <div class="col-4">
                        <label for="sahibinden" class="form-label">Sahibinden.com URL</label>
                        <input type="text" class="form-control" id="sahibinden" name="sahibinden" value="{{$advert->sahibinden_url}}">
                      </div>
                      <div class="col-4">
                        <label for="arabam" class="form-label">Arabam.com URL</label>
                        <input type="text" class="form-control" id="arabam" name="arabam" value="{{$advert->arabam_url}}">
                      </div>
                      <div class="col-4">
                          <label for="status">Araç Durumu *</label>
                          <select name="status" id="status" class="js-example-basic-single js-states form-control">
                              <option value="0">Seçiniz..</option>
                              @foreach($statuses as $status)
                                  @if($status->id == $advert->status->id)
                                      <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                  @else
                                      <option value="{{ $status->id }}">{{ $status->name }}</option>
                                  @endif

                              @endforeach
                          </select>
                      </div>
                      <div class="col-3">
                        <label for="buy_price" class="form-label">Alış Fiyatı *</label>
                        <input type="text" class="form-control" id="buy_price" name="buy_price" value="{{$advert->buy_price}}">
                      </div>

                      <div class="col-3">
                        <label for="sell_price" class="form-label">Satış Fiyatı</label>
                        <input type="text" class="form-control" id="sell_price" name="sell_price" value="{{$advert->sell_price}}">
                      </div>
                      <div class="col-3">
                        <label for="damage" class="form-label">Hasar Kaydı</label>
                        <input type="text" class="form-control" id="damage" name="damage" value="{{$advert->damage}}">
                      </div>

                      <div class="col-3">
                        <label for="buy_date" class="form-label">Alım Tarihi</label>
                        <input type="date" class="form-control" id="buy_date" name="buy_date" value="{{date('Y-m-d',\Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $advert->buy_date)->timestamp)}}">
                      </div>

                    <div class="col-12">
                      <a href="javascript:;" class="btn btn-primary" id="advertSaveBtn">Güncelle</a>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="row mb-3">
          <div class="card">
            <div class="card-body">
                <div class="col-12 ">
                    <h2 class="card-title d-flex justify-content-between">Fotoğraf
                      <a href="#" class="btn btn-primary btn-sm"><i style="width:12px" data-feather="plus"></i></a>

                    </h2>
                    <input type="file" name="photos[]" id="photo" multiple>
                    <input type="hidden" name="photodata" id="photodata" value="{{$advert->photo}}">
                  </div>
            </div>
        </div>
        </div>
        <div id="photoLine" class="row">
          <div class="card">
            <div class="card-body" id="photoPreview">
              @foreach($photos as $img)
              <div>
              <img src="/storage/{{$img->file}}" class="wd-50 border-5 m-2" alt="...">
              <a href="javascript:;" class="btn btn-danger btn-sm py-0 px-1 delImg" id="{{$img->id}}"><i data-feather="trash" style="width:12px"></i></a>
              </div>
              @endforeach
            </div>
        </div>
        </div>
    </div>
</div>
</form>
</div>
@endsection

@section('script')
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
                axios.get('/type/'+this.value+'/brands')
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
                axios.get('/type/model/'+this.value+'/models')
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

$(document).ready(function(){
    id = $("#id").val();
    axios.post('/upload/get-photos/', {id:id}).then((res) => {

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


        $("#advertSaveBtn").on("click", function(){
            var formData = $("#advertForm").serialize();

            axios.post('/advert/update', formData).then((res)=>{
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/advert/detail/'+res.data.id);
                    }, 1000);
                }
            });
        });

        $("#photo").on("change", function(e) {
          var files = e.target.files;

          console.log(files);

          var formData = new FormData();

          for (var i = 0; i < files.length; i++) {
              formData.append('photos[]', files[i]);
          }

          axios.post('/upload/photos', formData, {
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

      $(".delImg").on("click", function(){
        var id = $(this).attr('id');
        axios.post('/advert/delete/photo', {id:id}).then((res) => {
          if(res.data.status){
            window.location.reload();
          }
        })
      })
    </script>
@endsection
