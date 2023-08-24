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
                    <div class="col-md-4">
                        <label for="type">Tip *</label>
                        <select name="type" id="type" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($vehicleTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="type">Marka *</label>
                        <select name="brand" id="brand" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="type">Model *</label>
                        <select name="model" id="model" class="form-control">
                            <option value="0">Seçiniz..</option>
                        </select>
                    </div>
                    <div class="col-3">
                      <label for="motor" class="form-label">Motor</label>
                      <input type="text" class="form-control" id="motor" name="motor" placeholder="2.0, 3.2, 1.6">
                    </div>
                    <div class="col-3">
                      <label for="pack" class="form-label">Paket</label>
                      <input type="text" class="form-control" id="pack" name="package" placeholder="Elegance, Comfortline">
                    </div>
                    <div class="col-3">
                      <label for="km" class="form-label">KM *</label>
                      <input type="text" class="form-control" id="km" name="km" placeholder="300.000, 450.000 ...">
                    </div>
                    <div class="col-3">
                      <label for="year" class="form-label">Yıl *</label>
                      <input type="text" class="form-control" id="year" name="year" placeholder="2000, 2023 ...">
                    </div>
                    <div class="col-3">
                        <label for="type">Şanzıman</label>
                        <select name="gear" id="gear" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($gears as $gear)
                                <option value="{{ $gear->id }}">{{ $gear->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="type">Yakıt</label>
                        <select name="fuel" id="fuel" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($fuels as $fuel)
                                <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="type">Renk</label>
                        <select name="color" id="color" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="type">Kasa Tipi</label>
                        <select name="case" id="case" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($case_types as $case_type)
                                <option value="{{ $case_type->id }}">{{ $case_type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="type">Satış Türü *</label>
                        <select name="sales_type" id="sales_type" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($sale_types as $sale_type)
                                <option value="{{ $sale_type->id }}">{{ $sale_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="type">Araç Sahibi *</label>
                        <select id="owner" name="owner" class="form-select">
                          <option value="0">Seçin</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->firstname.' '.$user->lastname}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="ownername" id="ownername">
                      </div>

                      <div class="col-4">
                        <label for="sahibinden" class="form-label">Sahibinden.com URL</label>
                        <input type="text" class="form-control" id="sahibinden" name="sahibinden" placeholder="https://www.sahibinden.com/ilan/vasita-otomobil-...">
                      </div>
                      <div class="col-4">
                        <label for="arabam" class="form-label">Arabam.com URL</label>
                        <input type="text" class="form-control" id="arabam" name="arabam" placeholder="https://www.arabam.com/ilan/galeriden-satilik-...">
                      </div>
                      <div class="col-4">
                          <label for="type">Araç Durumu *</label>
                          <select name="status" id="status" class="js-example-basic-single js-states form-control">
                              <option value="0" selected>Seçin</option>
                              @foreach($statuses as $status)
                                  <option value="{{ $status->id }}">{{ $status->name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="col-3">
                        <label for="buy_price" class="form-label">Alış Fiyatı *</label>
                        <input type="text" class="form-control" id="buy_price" name="buy_price" placeholder="500.000">
                      </div>

                      <div class="col-3">
                        <label for="sell_price" class="form-label">Satış Fiyatı</label>
                        <input type="text" class="form-control" id="sell_price" name="sell_price" placeholder="1.000.000">
                      </div>
                      <div class="col-3">
                        <label for="damage" class="form-label">Hasar Kaydı</label>
                        <input type="text" class="form-control" id="damage" name="damage" placeholder="100.000">
                      </div>

                      <div class="col-3">
                        <label for="buy_date" class="form-label">Alım Tarihi</label>
                        <input type="date" class="form-control" id="buy_date" name="buy_date">
                      </div>

                    <div class="col-12">
                      <a href="javascript:;" class="btn btn-primary" id="advertSaveBtn">Kaydet</a>
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
                    <input type="hidden" name="photodata" id="photodata">
                  </div>
            </div>
        </div>
        </div>
        <div class="row mb-3 d-none" id="profitRow">
          <div class="card">
            <div class="card-body">
                <div class="col-12 ">
                    <h2 class="card-title d-flex justify-content-between">Komisyon Oranı</h2>
                    <input type="text" name="profit" id="profit" class="form-control" placeholder="10, 10.000..." value="0">
                    <p class="text-muted mt-2">Yüzdelik kar oranı ya da doğrudan rakam girin.</p>
                  </div>
            </div>
        </div>
        </div>
        <div id="photoLine" class="row d-none">
          <div class="card">
            <div class="card-body" id="photoPreview">
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

        $("#advertSaveBtn").on("click", function(){
            var formData = $("#advertForm").serialize();

            axios.post('/advert/save', formData).then((res)=>{
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
      $("#sales_type").on("change", function(){
        if($(this).val() == 2){
          $("#profitRow").removeClass('d-none');
        }else{
          $("#profitRow").addClass('d-none');
        }
      });



    </script>
@endsection
