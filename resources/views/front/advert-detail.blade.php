@extends('front.master',['title' => $advert->brand->name." / ".$advert->model->name])

@section('content')

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url('{{ asset('car/images/banner-image-1-1920x500.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>{{ $advert->brand->name." / ".$advert->model->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @if(count($advert->photos) != 0)
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        @for($x = 1; $x <= count($advert->photos); $x++)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$x}}"></li>
                        @endfor
                    @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @endif

                </ol>
                <div class="carousel-inner">
                    @if(count($advert->photos) != 0)
                        @php($x=0)
                        @foreach($advert->photos as $photo)
                            <div class="carousel-item {{ $x == 0 ? "active":""}}">
                                <img class="d-block w-100" src="{{ asset('storage/'.$photo->file) }}" alt="Test" >
                            </div>
                        @php($x++)
                        @endforeach
                    @else
                        <img src="{{ asset('/static/assets/images/photo.jpg') }}" alt="" width="100%" height="600">
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Önceki</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Sonraki</span>
                </a>
            </div>

            <br>
            <br>

            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-cog"></i> Araç Özellikleri</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Araç Açıklaması</a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content' style="width: 100%;">
                        <article id='tabs-1'>

                            <div class="row mt-4 mt-sm-4 mt-md-4 mt-lg-0">
                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Araç Tipi</label>

                                    <p>{{ $advert->type->name }}</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Marka</label>

                                    <p>{{ $advert->brand->name }}</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Model</label>

                                    <p>{{ $advert->model->name }}</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Paket</label>

                                    <p>{{ $advert->package }}</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Model Yılı</label>

                                    <p>{{ $advert->year }}</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Kilometre</label>

                                    <p>{{ number_format($advert->km) }} km</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Yakıt</label>

                                    <p>{{ $advert->fuel->name }}</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Motor</label>

                                    <p>{{ $advert->motor }}</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Vites</label>

                                    <p>{{ $advert->gear->name }}</p>
                                </div>

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Renk</label>

                                    <p>{{ $advert->color->name }}</p>
                                </div>
                            </div>
                        </article>
                        <article id='tabs-2'>
                            <p>
                                {!! $advert->description !!}
                            </p>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection

@section('script')


@endsection


