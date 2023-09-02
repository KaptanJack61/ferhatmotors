@extends('master')

@section('title', 'Yeni İlan')

@section('header')

@endsection

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
    <div class="col-12 col-sm-12 col-md-8 col-xl-8 col-xxl-8">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" id="advertForm">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="type">Tip *</label>
                        <select name="type" id="type" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                            @foreach($vehicleTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="type">Marka *</label>
                        <select name="brand" id="brand" class="js-example-basic-single js-states form-control">
                            <option value="0">Seçiniz..</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="type">Model *</label>
                        <select name="model" id="model" class="form-control">
                            <option value="0">Seçiniz..</option>
                        </select>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                      <label for="motor" class="form-label">Motor</label>
                      <input type="text" class="form-control" id="motor" name="motor" placeholder="2.0, 3.2, 1.6">
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                      <label for="pack" class="form-label">Paket</label>
                      <input type="text" class="form-control" id="pack" name="package" placeholder="Elegance, Comfortline">
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                      <label for="km" class="form-label col-xl-3 col-xxl-3">KM *</label>
                      <input type="text" class="form-control" id="km" name="km" placeholder="300.000, 450.000 ..." maxlength="6" onkeypress="return isNumericKey(event)">
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                      <label for="year" class="form-label">Yıl *</label>
                      <input type="text" class="form-control" id="year" name="year" placeholder="2000, 2023 ..." maxlength="4" minlength="4" onkeypress="return isNumericKey(event)">
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                        <label for="type">Şanzıman</label>
                        <select name="gear" id="gear" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($gears as $gear)
                                <option value="{{ $gear->id }}">{{ $gear->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                        <label for="type">Yakıt</label>
                        <select name="fuel" id="fuel" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($fuels as $fuel)
                                <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                        <label for="type">Renk</label>
                        <select name="color" id="color" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                        <label for="type">Kasa Tipi</label>
                        <select name="case" id="case" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($case_types as $case_type)
                                <option value="{{ $case_type->id }}">{{ $case_type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6 col-sm-6 col-lg-6 col-xl-4 col-xxl-4">
                        <label for="type">Satış Türü *</label>
                        <select name="sales_type" id="sales_type" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($sale_types as $sale_type)
                                <option value="{{ $sale_type->id }}">{{ $sale_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-6 col-xl-4 col-xxl-4">
                        <label for="type">Araç Sahibi *</label>
                        <select id="owner" name="owner" class="form-select">
                          <option value="0">Seçin</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->firstname.' '.$user->lastname}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="ownername" id="ownername">
                      </div>

                    <div class="col-6 col-sm-6 col-lg-6 col-xl-4 col-xxl-4">
                        <label for="type">Araç Durumu *</label>
                        <select name="status" id="status" class="js-example-basic-single js-states form-control">
                            <option value="0" selected>Seçin</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12 d-none" id="profitRow">
                        <h2 class="card-title d-flex justify-content-between">Komisyon Oranı</h2>
                        <input type="text" name="profit" id="profit" class="form-control" placeholder="10, 10.000..." value="0">
                        <p class="text-muted mt-2">Yüzdelik kar oranı ya da doğrudan rakam girin.</p>
                    </div>

                      <div class="col-6 col-sm-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="sahibinden" class="form-label">Sahibinden.com URL</label>
                        <input type="text" class="form-control" id="sahibinden" name="sahibinden" placeholder="https://www.sahibinden.com/ilan/vasita-otomobil-...">
                      </div>
                      <div class="col-6 col-sm-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="arabam" class="form-label">Arabam.com URL</label>
                        <input type="text" class="form-control" id="arabam" name="arabam" placeholder="https://www.arabam.com/ilan/galeriden-satilik-...">
                      </div>

                      <div class="col-6 col-sm-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label for="buy_price" class="form-label">Alış Fiyatı *</label>
                        <input type="text" class="form-control" id="buy_price" name="buy_price" placeholder="₺0.00"
                               data-inputmask="'alias': 'currency', 'prefix':'₺'" style="text-align: right;">
                      </div>

                      <div class="col-6 col-sm-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label for="sell_price" class="form-label">İstenen Fiyat</label>
                        <input type="text" class="form-control" id="sell_price" name="sell_price" placeholder="₺0.00"
                               data-inputmask="'alias': 'currency', 'prefix':'₺'" style="text-align: right;">
                      </div>
                      <div class="col-6 col-sm-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label for="damage" class="form-label">Hasar Kaydı</label>
                        <input type="text" class="form-control" id="damage" name="damage" placeholder="₺0.000"
                               data-inputmask="'alias': 'currency', 'prefix':'₺'" style="text-align: right;">
                      </div>

                      <div class="col-6 col-sm-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label for="buy_date" class="form-label">Alım Tarihi</label>
                        <input type="date" class="form-control" id="buy_date" name="buy_date">
                      </div>

                    <div class="col-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">

                        <textarea id="description" name="description"></textarea>

                    </div>

                    <div class="col-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                      <a href="javascript:;" class="btn btn-primary" id="advertSaveBtn">Kaydet</a>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-xl-4 col-xxl-4">
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
        <div class="row mb-3 d-none">
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
    <script src="{{ asset('static/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/lmwpmtpkipcql77nmijrtonl0qf33143mj9k5s7thzmsvpy9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>




    @include('layout.advert.script.script-brands')
    @include('layout.advert.script.script-photo-owner')
    @include('layout.advert.script.script-save',['name' => 'advert-save'])
    @include('layout.advert.script.script-new')

@endsection
