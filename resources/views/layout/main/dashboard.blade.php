@extends('master')

@section('title', 'Pano')

@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Pano</h4>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">#</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pano</li>
    </ol>
</nav>
</div>

<div class="row">
    <div class="col-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam Kullanıcı</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["user"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam Müşteri</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["customer"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam İlan</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["advert"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<div class="row">
    <div class="col-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Satıştaki İlan</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["advert_sell"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Satılan İlan</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{$count["advert_sold"]}}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam Harcama</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{currency_format($count["expense"])}} ₺</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-4">Toplam Kazanç</h6>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="mb-2">{{currency_format($count["gain"])}} ₺</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Son 10 İlan</h2>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marka/Model</th>
                        <th scope="col">Satış Tipi</th>
                        <th scope="col">Sahibi</th>
                        <th scope="col">Durum</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($lastTenAdverts as $item)
                            <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td><a class="fw-bold text-dark" href="{{ route('advert-detail', $item->id) }}">{{$item->brand->name.'/'.$item->model->name}}</a></td>
                            <td>
                                    @if($item->sale_type == 1)
                                        <span class="badge bg-primary"><a class="fw-bold text-white" href="{{ route('advert-detail', $item->id) }}">{{ $item->saleType->name }}</a></span>
                                    @else
                                        <span class="badge bg-warning"><a class="fw-bold text-white" href="{{ route('advert-detail', $item->id) }}">{{ $item->saleType->name }}</a></span>
                                    @endif
                            </td>
                            <td>{!! $item->Owner->firstname.' '.$item->Owner->lastname !!}</td>
                            <td>
                                <span class="badge bg-primary">{{ $item->status->name }}</span>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
    <script></script>
@endsection
