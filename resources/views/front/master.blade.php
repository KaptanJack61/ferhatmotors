<!DOCTYPE html>
<html lang="tr">

@include('front.partial.header')

<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


@include('front.partial.navbar')

@yield('content')

@include('front.partial.footer')

<!-- jQuery -->
<script src="{{ asset('car/js/jquery-2.1.0.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('car/js/popper.js') }}"></script>
<script src="{{ asset('car/js/bootstrap.min.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('car/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('car/js/waypoints.min.js') }}"></script>
<script src="{{ asset('car/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('car/js/imgfix.min.js') }}"></script>
<script src="{{ asset('car/js/mixitup.js') }}"></script>
<script src="{{ asset('car/js/accordions.js') }}"></script>

<!-- Global Init -->
<script src="{{ asset('car//js/custom.js')}}"></script>

@yield('script')

</body>
</html>
