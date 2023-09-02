@extends('master')

@section('title', 'İlan Düzenle')

@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">İlan Düzenle </h4>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('advert-all') }}">İlanlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">İlan Düzenle</li>
    </ol>
</nav>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-md-8 col-xl-8 col-xxl-8">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" id="advertForm">
                  <input type="hidden" name="id" id="id" value="{{$advert->id}}">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
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
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
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
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
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
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                      <label for="motor" class="form-label">Motor</label>
                      <input type="text" class="form-control" id="motor" name="motor" value="{{$advert->motor}}">
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                      <label for="pack" class="form-label">Paket</label>
                      <input type="text" class="form-control" id="pack" name="package" value="{{$advert->package}}">
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                      <label for="km" class="form-label">KM *</label>
                      <input type="text" class="form-control" id="km" name="km" value="{{$advert->km}}" maxlength="6" onkeypress="return isNumericKey(event)">
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
                      <label for="year" class="form-label">Yıl *</label>
                      <input type="text" class="form-control" id="year" name="year" value="{{$advert->year}}" maxlength="4" minlength="4" onkeypress="return isNumericKey(event)">
                    </div>
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
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

                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
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
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
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
                    <div class="col-6 col-sm-6 col-lg-3 col-xl-3 col-xxl-3">
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
                      <div class="col-6 col-sm-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="sahibinden" class="form-label">Sahibinden.com URL</label>
                        <input type="text" class="form-control" id="sahibinden" name="sahibinden" value="{{$advert->sahibinden_url}}">
                      </div>
                      <div class="col-6 col-sm-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="arabam" class="form-label">Arabam.com URL</label>
                        <input type="text" class="form-control" id="arabam" name="arabam" value="{{$advert->arabam_url}}">
                      </div>
                      <div class="col-6 col-sm-6 col-lg-6 col-xl-4 col-xxl-4">
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
                      <div class="col-6 col-sm-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label for="buy_price" class="form-label">Alış Fiyatı *</label>
                        <input type="text" class="form-control" id="buy_price" name="buy_price" value="₺{{number_format($advert->buy_price, 2)}}" placeholder="₺0.00"
                               data-inputmask="'alias': 'currency', 'prefix':'₺'" style="text-align: right;">
                      </div>

                      <div class="col-6 col-sm-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label for="sell_price" class="form-label">Satış Fiyatı</label>
                        <input type="text" class="form-control" id="sell_price" name="sell_price" value="₺{{number_format($advert->sell_price, 2)}}" placeholder="₺0.00"
                               data-inputmask="'alias': 'currency', 'prefix':'₺'" style="text-align: right;">
                      </div>
                      <div class="col-6 col-sm-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label for="damage" class="form-label">Hasar Kaydı</label>
                        <input type="text" class="form-control" id="damage" name="damage" value="₺{{number_format($advert->damage, 2)}}" placeholder="₺0.00"
                               data-inputmask="'alias': 'currency', 'prefix':'₺'" style="text-align: right;">
                      </div>

                      <div class="col-6 col-sm-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label for="buy_date" class="form-label">Alım Tarihi</label>
                        <input type="date" class="form-control" id="buy_date" name="buy_date" value="{{\Carbon\Carbon::parse($advert->buy_date)->format('Y-m-d')}}">
                      </div>

                    <div class="col-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                      <a href="javascript:;" class="btn btn-primary" id="advertSaveBtn">Güncelle</a>
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

    @include('layout.advert.script.script-brands')
    @include('layout.advert.script.script-photo-owner')
    @include('layout.advert.script.script-save',['name' => 'advert-update'])
    @include('layout.advert.script.script-edit')

@endsection
