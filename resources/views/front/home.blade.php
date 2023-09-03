@extends('front.master', ['title' => config('app.name')])

@section('content')

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('car/images/video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <!-- <h6>Lorem ipsum dolor sit amet</h6> -->
                <h2>En iyi <em>araba</em> satıcısı!</h2>
                <div class="main-button">
                    <a href="{{ route('contact') }}">İletişime geç</a> &nbsp; <a href="{{ route('adverts') }}">Araçlar</a>
                </div>

            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Yeni Eklenen <em>Araçlar</em></h2>
                        <img src="{{ asset('car/images/line-dec.png') }}" alt="">
                        <p>Yeni eklenen araçlarımızı görmediniz mi? Hemen inceleyin.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($adverts as $advert)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                @if(count($advert->photos) != 0)
                                    @foreach($advert->photos as $photo)
                                        <img src="{{ asset("storage/".$photo->file) }}" alt="" width="320" height="214">
                                        @break
                                    @endforeach
                                @else
                                    <img src="{{ asset('/static/assets/images/photo.jpg') }}" alt="" width="320" height="214">
                                @endif

                            </div>
                            <div class="down-content">
                            <span class="font-weight-bold">
                                ₺{{ currency_format($advert->sell_price) }}
                            </span>

                                <h4>{{ $advert->brand->name." / ". $advert->model->name }}</h4>

                                <p>
                                    <i class="fa fa-dashboard"></i> {{ number_format($advert->km) }} km &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cube"></i> {{ $advert->motor }} motor &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cog"></i> {{ $advert->gear->name }} &nbsp;&nbsp;&nbsp;
                                </p>

                                <p class="text-center">
                                    <span class="text-dark font-weight-bold mt-0">
                                        {{date('d.m.Y',$advert->created_at->timestamp)}}
                                    </span>
                                </p>

                                <ul class="social-icons">
                                    <li><a href="{{ route('front-advert-detail',$advert->id) }}">+ Araç Detaylarını Görüntüle</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <br>

            <div class="main-button text-center">
                <a href="{{ route('adverts') }}">TÜM ARAÇLAR</a>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Bizimle <em>İletişime Geçin</em></h2>
                        <p>İletişim formunu doldurarak ya da telefonla arayarak bizimle iletişime geçebilirsiniz.</p>
                        <div class="main-button">
                            <a href="contact.html">İletişim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

@endsection
