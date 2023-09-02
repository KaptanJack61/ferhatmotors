@extends('front.master',['title' => 'Araçlar'])

@section('content')
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url('{{ asset('car/images/banner-image-1-1920x500.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><em>Araçlarımız</em></h2>
                        <p>Ferhat MOTORS araç portföyü</p>
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


            <div class="row">

                @foreach($adverts as $advert)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">

                                @if(count($advert->photos) != 0)
                                    @foreach($advert->photos as $photo)
                                        <img src="{{ asset($photo->file) }}" alt="" width="320" height="214">
                                        @break
                                    @endforeach
                                @else
                                    <img src="{{ asset('/static/assets/images/photo.jpg') }}" width="320" height="214">
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
                                    </span>
                                </p>
                                <ul class="social-icons">
                                    <li><a href="{{ route('front-advert-detail', $advert->id) }}">+ Araç Detaylarını Görüntüle</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <br>


                {{ $adverts->links('vendor.pagination.custom-link') }}

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection
