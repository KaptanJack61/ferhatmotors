@extends('master')

@section('title', 'Araç Detayları')

@section('style')
<link rel="stylesheet" href="{{ asset('/static/assets/vendors/owl.carousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('/static/assets/vendors/owl.carousel/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('/static/assets/vendors/animate.css/animate.min.css') }}">
@endsection

@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Araç Detayları</h4>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('advert-all') }}">Araçlar</a></li>
        <li class="breadcrumb-item" aria-current="page">Araç Detayları</li>
        <li class="breadcrumb-item active" aria-current="page"># {{$advert->id}}</li>
    </ol>
</nav>
</div>


<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-outline-secondary"><b>Tip: </b> {{$advert->type->name}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Marka: </b> {{$advert->brand->name}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Model: </b> {{$advert->model->name}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Paket: </b> {{$advert->package ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Motor: </b> {{$advert->motor ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>KM: </b> {{$advert->km}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Yıl: </b> {{$advert->year}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Şanzıman: </b> {{$advert->gear->name ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Yakıt: </b> {{$advert->fuel->name ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Renk: </b> {{$advert->color->name ?? "-"}}</button>
                <button type="button" class="btn btn-outline-secondary"><b>Kasa: </b> {{$advert->caseType->name ?? "-"}}</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">

                            <li class="list-group-item active justify-content-between d-flex
                                    @if ($advert->status_id == 1)
                                        bg-warning
                                        border-warning
                                    @elseif($advert->status_id == 2)
                                        bg-primary
                                        border-primary
                                    @elseif($advert->status_id == 3)
                                        bg-info
                                        border-info
                                    @elseif($advert->status_id == 4)
                                        bg-danger
                                        border-danger
                                    @elseif($advert->status_id == 5)
                                        bg-danger
                                        border-danger
                                    @elseif($advert->status_id == 6)
                                        bg-primary
                                        border-primary
                                    @elseif($advert->sstatus_id == 7)
                                        bg-success
                                        border-success
                                    @else
                                        bg-secondary
                                        border-secondary
                                    @endif
                            ">
                                <b>Araç Durumu: </b>
                                 {{ $advert->status->name }}
                            </li>
                            <li class="list-group-item justify-content-between d-flex">
                                <b>Satış Tipi: </b>
                                @if($advert->saleType->profit)
                                    <b>{{ $profit }}</b><span class="badge bg-primary">{{ $advert->saleType->name }}</span>
                                @else
                                    <span class="badge bg-primary">{{ $advert->saleType->name }}</span>
                                @endif
                            </li>
                            <li class="list-group-item justify-content-between d-flex"><b>Araç Sahibi: </b> {{ $advert->Owner->firstname.' '.$advert->Owner->lastname }}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>Alım Tarihi: </b> {{\Carbon\Carbon::parse($advert->buy_date)->format('d.m.Y')}}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>İlan Tarihi: </b>  {{\Carbon\Carbon::parse($advert->created_at)->format('d.m.Y')}}</li>
                            @if($advert->sold_date)
                                <li class="list-group-item justify-content-between d-flex"><b>Satış Tarihi: </b>
                                    {{\Carbon\Carbon::parse($advert->sold_date)->format('d.m.Y')}}
                                </li>
                            @endif
                          </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between d-flex"><b>Alış Fiyatı: </b> ₺{{currency_format($advert->buy_price)}}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>Toplam Harcama: </b> ₺{{currency_format($totalExpense)}}</li>
                            <li class="list-group-item justify-content-between d-flex text-danger fw-bold"><b>Toplam Maliyet: </b> ₺{{currency_format($advert->buy_price + $totalExpense)}}</li>
                            <li class="list-group-item justify-content-between d-flex"><b>İstenen Fiyat: </b> ₺{{currency_format($advert->sell_price) ?? "-"}}</li>
                            @if($advert->sold_price)
                                <li class="list-group-item justify-content-between d-flex"><b>Satış Tutarı: </b> {{$advert->sold_price}} ₺</li>
                            @endif
                            @if($advert->sold_price)
                                <li class="list-group-item justify-content-between d-flex"><b>Bilanço: </b>
                                    @if($advert->sold_price - $advert->buy_price + $totalExpense > 0)
                                        <span class="fw-bold text-success">
                                        {{(currency_format($advert->sold_price - $advert->buy_price + $totalExpense))." Kazanç"}}
                                    </span>
                                    @elseif($advert->sold_price - $advert->buy_price + $totalExpense == 0 )
                                        <span class="fw-bold text-primary">
                                        {{(currency_format($advert->sold_price - $advert->buy_price + $totalExpense))." Başa Baş"}}
                                    </span>
                                    @else
                                        <span class="fw-bold text-danger">
                                        {{(currency_format($advert->sold_price - $advert->buy_price + $totalExpense))." Zarar"}}
                                    </span>
                                    @endif
                                </li>
                            @endif
                          </ul>
                    </div>
                </div>
            </div>
        </div>

        @if ($advert->status->sold == false)
            @if($advert->sahibinden_url != null or $advert->arabam_url != null)
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                @if($advert->sahibinden_url != null)
                                    <a href="{{$advert->sahibinden_url}}" target="_blank" class="btn text-white btn-warning w-100 mb-2">SAHİBİNDEN.COM</a>
                                @endif

                                @if($advert->arabam_url != null)
                                    <a href="{{$advert->arabam_url}}" target="_blank" class="btn btn-danger w-100">ARABAM.COM</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if ($advert->status->sold == true)
                        <div class="alert alert-primary" role="alert">
                            Bu ilan <b>{{date('d.m.Y',\Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $advert->sold_date)->timestamp)}}</b> tarihinde <u>Satıldı</u> olarak işaretlendiği için değişiklik yapamazsınız.
                        </div>
                        @else
                        <a href="{{ route('advert-edit',$advert->id) }}" class="btn text-white btn-primary w-100 mb-2">İlanı Düzenle</a>

                        @if ($system->add_expense == 0)
                            <a href="javascript:;" class="btn text-white btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addExpense{{$advert->id}}">Masraf Ekle</a>

                        @else
                            @if(Auth::user()->id == $advert->user_id)
                            <a href="javascript:;" class="btn text-white btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addExpense{{$advert->id}}">Masraf Ekle</a>
                            @endif
                        @endif


                        <a href="javascript:;" class="btn btn-info w-100 mb-2" data-bs-toggle="modal" data-bs-target="#changeStatusModal{{$advert->id}}">İlan Durumunu Değiştir</a>
                        <a href="javascript:;" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addNote{{$advert->id}}">İlana Not Ekle</a>
                        <a href="javascript:;" class="btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#sell{{$advert->id}}">Satıldı Olarak İşaretle</a>
                        <a href="javascript:;" class="btn btn-danger w-100 mb-2" id="delete" data-id="{{$advert->id}}">İlanı Sil</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 col-xxl-8">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="owl-carousel owl-theme owl-fadeout">
                      @if ($advert->Photos->count() > 0)
                        @foreach ($advert->Photos as $photo)
                        <div class="item">
                            <img src="{{ asset('storage/'.$photo->file) }}" alt="item-image" style="max-height: 50vh; width: 100%; object-fit: cover;">
                        </div>
                        @endforeach
                        @else
                        <div class="item">
                            <img src="{{ asset('/static/assets/images/photo.jpg') }}" alt="item-image" style="max-height: 50vh; width: 100%; object-fit: cover;">
                          </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Harcamalar</h2>
                        @if ($advert->Expense->count() > 0)
                        <ul class="list-group">
                            @foreach ($advert->Expense as $item)
                                <li class="list-group-item text-center d-flex align-items-center justify-content-between align-center">
                                    <p class="px-4 w-50 text-start " >{{$item->type}}</p>


                                    <span class="text-muted text-center">
                                        {{$item->User->firstname.' '.$item->User->lastname}}
                                        <br>
                                        {{date_format($item->created_at,"d.m.Y")}}
                                    </span>
                                    <p class="px-4" >₺{{currency_format($item->amount)}}</p>
                                </li>
                            @endforeach
                            <li class="list-group-item text-center bg-light d-flex align-items-center justify-content-between align-center">
                                    <p class="px-4 w-50 text-start fw-bold" >Toplam Harcama: </p>


                                    <span class="text-muted text-center">

                                    </span>
                                    <p class="px-4 fw-bold text-danger" >₺{{currency_format($totalExpense) }}</p>

                                </li>
                          </ul>
                        @else
                        <div class="alert alert-primary" role="alert">
                            Bu araç için henüz bir harcama yapılmamış...
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Notlar</h2>
                        @if ($advert->Note->count() > 0)
                        <ul class="list-group">
                            @foreach ($advert->Note as $item)
                                <li class="list-group-item text-start d-flex align-items-center justify-content-between align-center">
                                    <p class="border-end px-4" style="width:80%">{{$item->note}}</p>
                                    <span class="text-muted text-center">
                                        {{$item->User->firstname.' '.$item->User->lastname}}
                                        <br>
                                        {{date_format($item->created_at,"d.m.Y")}}
                                    </span>
                                </li>
                            @endforeach
                          </ul>
                        @else
                        <div class="alert alert-primary" role="alert">
                            Bu araç için henüz bir not eklenmemiş...
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('layout.advert.modal.modal-change-status',['id' => $advert->id, 'advertStatusId' => $advert->status->id])
    @include('layout.advert.modal.modal-add-note',['id' => $advert->id])
    @include('layout.advert.modal.modal-sale',['id' => $advert->id])
    @include('layout.advert.modal.modal-add-expense',['id' => $advert->id])

  <div class="modal fade" id="addExpense" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Harcama Ekle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="expenseType" class="form-label">Masraf Türü</label>
                <input type="text" class="form-control" id="expenseType" placeholder="Noter, Tamir, Evrak...">
              </div>
              <div class="mb-3">
                <label for="expenseAmount" class="form-label">Masraf Tutarı</label>
                <input type="text" class="form-control" id="expenseAmount" placeholder="5.000, 2.000 ...">
              </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="saveExpense" advert-id="{{$advert->id}}"> Kaydet</button>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('/static/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/static/assets/vendors/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('/static/assets/js/carousel.js') }}"></script>
    <script src="{{ asset('static/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>

    @include('layout.advert.script.script-list')
    <script>

        $(".saveExpense").on("click", function(){
            var id   = $(this).attr('advert-id');
            var type = $("#expenseType"+id).val();
            var amount = $("#expenseAmount"+id).val();

            axios.post('{{ route('advert-add-expense') }}', {id:id, type:type, amount:amount}).then((res) => {
                toastr[res.data.type](res.data.message);
                if(res.data.status){
                    setInterval(() => {
                        window.location.reload();
                    }, 500);
                }
            });
        });

    $("#delete").on("click", function(){
        var id = $(this).attr('data-id');
        Swal.fire({
        title: 'Silmek istediğine emin misin?',
        text: "Bu ilanı sildiğinizde onunla birlikte ilişkili olan diğer tüm veriler sistemden kalıcı olarak silinecek. Bu işlem geri alınamaz!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Evet, Sil!'
        }).then((result) => {
        if (result.isConfirmed) {

            axios.post('{{ route('advert-delete') }}', {id:id}).then((res) => {
                Swal.fire(
                    res.data.title,
                    res.data.message,
                    res.data.type
                )
                if(res.data.status){
                    setInterval(() => {
                        window.location.assign('{{ route('advert-all') }}');
                    }, 500);
                }
            })
        }
        })
    });

        $(document).ready(function() {
            $('#expenseAmount{{$advert->id}}').inputmask('999.999.999');
            $('#amount{{$advert->id}}').inputmask('999.999.999');

        });
    </script>
@endsection
