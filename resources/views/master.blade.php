<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="{{env('APP_DESCRIPTION')}}">
	<meta name="author" content="{{env('APP_AUTHOR')}}">
	<meta name="keywords" content="{{env('APP_TAGS')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') - {{env('APP_NAME')}}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('icon/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}">
  @yield('style')
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->

        @include('src.sidebar')

		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			@include('src.topbar')
			<!-- partial -->

            @yield('content')


			<!-- partial:partials/_footer.html -->
			@include('src.footer')
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
    <script src="{{ asset('js/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
	<!-- endinject -->


    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    @yield('script')
	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>
