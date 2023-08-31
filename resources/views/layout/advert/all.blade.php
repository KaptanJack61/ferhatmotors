@extends('master')

@section('title', 'Tüm Araçlar')

@section('content')
<div class="page-content">
<div class="d-flex justify-content-between">
    <h4 class="page-title">Tüm Araçlar </h4>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/advert">Araçlar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tüm Araçlar</li>
    </ol>
</nav>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table" id="adverTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Yıl</th>
                        <th scope="col">Satış Tipi</th>
                        <th scope="col">Sahibi</th>
                        <th scope="col">Durumu</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($adverts as $advert)
                            <tr>
                                <td><a class="text-decoration-underline" href="{{ route('advert-detail', $advert->id) }}">{{$advert->id}}</a></td>
                                <td><a class="fw-bold text-dark" href="{{ route('advert-detail', $advert->id) }}">{{$advert->brand->name}}</a></td>
                                <td><a class="fw-bold text-dark" href="{{ route('advert-detail', $advert->id) }}">{{$advert->model->name}}</a></td>
                                <td><a class="fw-bold text-dark" href="{{ route('advert-detail', $advert->id) }}">{{$advert->package ?? "-"}}</a></td>
                                <td><a class="fw-bold text-dark" href="{{ route('advert-detail', $advert->id) }}">{{$advert->year}}</a></td>
                                <td>
                                    @if($advert->sale_type_id == 1)
                                        <span class="badge bg-primary"><a class="fw-bold text-white" href="{{ route('advert-detail', $advert->id) }}">{{ $advert->saleType->name }}</a></span>
                                    @else
                                        <span class="badge bg-warning"><a class="fw-bold text-white" href="{{ route('advert-detail', $advert->id) }}">{{ $advert->saleType->name }}</a></span>
                                    @endif
                                </td>
                                <td>{!! $advert->Owner != "" ? $advert->Owner->firstname.' '.$advert->Owner->lastname : '<strike class="text-danger">'.$advert->ownername.'</strike>' !!}</td>
                                <td>
                                    {{ $advert->status->name }}
                                </td>
                                <td>

                                    <div class="dropdown">

                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                                            style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                            İşlem
                                    </button>

                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{ route('advert-detail', $advert->id) }}">Görüntüle</a></li>
                                          <li><a class="dropdown-item" href="{{ route('advert-edit', $advert->id) }}">Düzenle</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changeStatusModal{{$advert->id}}" href="javascript:;">Durumu Değiştir</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addExpense{{$advert->id}}" href="javascript:;">Harcama Ekle</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addNote{{$advert->id}}" href="javascript:;">Not Ekle</a></li>
                                          <li><hr class="dropdown-divider"></li>

                                            @if(!$advert->status->sold)
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#sell{{$advert->id}}" href="javascript:;">Satış Yap</a></li>
                                            @endif


                                        </ul>
                                      </div>
                                </td>
                            </tr>

                                @include('layout.advert.modal.modal-add-expense',['id' => $advert->id])
                                @include('layout.advert.modal.modal-change-status',['id' => $advert->id, 'advertStatusId' => $advert->status->id])
                                @include('layout.advert.modal.modal-add-note',['id' => $advert->id])

                                @if(!$advert->status->sold)
                                    @include('layout.advert.modal.modal-sale',['id' => $advert->id])
                                @endif

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
    </script>
@endsection
