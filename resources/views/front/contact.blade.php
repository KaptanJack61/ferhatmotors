@extends('front.master',['title' => "İletişim"])

@section('content')
    <section class="section section-bg" id="call-to-action" style="background-image: url('{{ asset('car/images/banner-image-1-1920x500.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>İletişim</h2>
                        <p>Araç almak ve ya aracınızı satmak istiyorsanız bizimle iletişime geçebilirsiniz. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>İletişim <em> Bilgileri</em></h2>
                        <img src="{{ asset('car/images/line-dec.png') }}" alt="waves">

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <h5><a href="tel:+905538610029">0553 861 0029</a></h5>

                    <br>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <h5><a href="mailto:ferhatkyn299@gmail.com">ferhatkyn299@gmail.com</a></h5>

                    <br>
                </div>

                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>

                    <h5>Mavi Durak Serdivan / Sakarya</h5>

                    <br>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48334.80927967059!2d30.258557232715226!3d40.78565021214057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14ccad1b5f163f3d%3A0xfde55d9e67a6865c!2sSerdivan%2FSakarya!5e0!3m2!1str!2str!4v1693776465196!5m2!1str!2str" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form section-bg" style="background-image: url('{{ asset('car/images/contact-1-720x480.jpg') }}')">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Adınız*" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Posta Adresiniz*" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="subject" type="text" id="subject" placeholder="Konu">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Mesajınız" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Mesajını Gönder</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->

@endsection
