@extends('front.master',['title' => $advert->brand->name." / ".$advert->model->name])

@section('style')
    <link rel="stylesheet" href="{{ asset('/static/assets/vendors/owl.carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/static/assets/vendors/owl.carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/static/assets/vendors/animate.css/animate.min.css') }}">
@endsection

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
            <div class="row mt-4">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="owl-carousel owl-theme owl-loaded owl-drag front-owl">
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

            <div class="row mt-4" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-cog"></i> Araç Özellikleri</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Araç Açıklaması</a></li>
                    </ul>
                    <ul class="mt-4">
                        @if($advert->sahibinden_url != null)
                            <li><a href="{{$advert->sahibinden_url}}" target="_blank"><i class="fa fa-link"></i>sahibinden.com</a></li>
                        @endif

                        @if($advert->arabam_url != null)
                            <li><a href="{{$advert->arabam_url}}" target="_blank"><i class="fa fa-link"></i>arabam.com</a></li>
                        @endif
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

                                <div class="col-6 col-sm-6 col-md-4">
                                    <label>Hasar Kaydı</label>

                                    <p>
                                        @if($advert->damage != 0.00)
                                            ₺{{ currency_format($advert->damage) }}
                                        @else
                                            Yok
                                        @endif

                                    </p>
                                </div>
                            </div>
                        </article>
                        <article id='tabs-2'>
                            <div class="row mt-4 mt-sm-4 mt-md-4 mt-lg-0">
                                <div class="description">
                                    {!! $advert->description !!}
                                </div>

                            </div>

                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection

@section('script')
    <script src="{{ asset('/static/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/static/assets/js/carousel.js') }}"></script>
@endsection


