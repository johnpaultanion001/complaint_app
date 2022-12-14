<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="baseURL" content="{{ url('/') }}">

    <title>@yield('sub-title') | {{ trans('panel.site_title') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('public/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('public/assets/css/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    @yield('style') 
</head>

<body>

    <div class="container h-100">

        <!-- Content -->
        @yield('content')
        

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('public/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('public/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('public/assets/js/sb-admin-2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    @yield('script') 
</body>

</html>