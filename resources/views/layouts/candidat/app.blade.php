<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('/plugins/fullcalendar/main.css' )}}">
  <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script><!-- SDK cynetpays -->

    <!-- design de l'espace de paiment-->
    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <!-- scripte de paiment-->
    <script>
        function checkout() {
            CinetPay.setConfig({
                apikey: '2184549095dee6b69e2ccb0.42548544',//   YOUR APIKEY
                site_id: '950803',//YOUR_SITE_ID
                notify_url: 'http://fbi.ci/candidats/notify',
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(),
                amount: 100,
                currency: 'XOF',
                channels: 'ALL',
                description: 'Frais d\'inscription au Programme Bourse d\'Excellence',   
                 //Fournir ces variables pour le paiements par carte bancaire
                customer_name:"{{$infocandidat->nom}} {{$infocandidat->prenom}}",//Le nom du client
                customer_surname:"{{Auth::user()->name}}",//Le prenom du client
                customer_email: "{{Auth::user()->email}}",//l'email du client
                customer_phone_number: "{{$infocandidat->phone}}",//l'email du client
                //customer_address : "BP 0024",//addresse du client
                //customer_city: "Antananarivo",// La ville du client
                //customer_country : "CM",// le code ISO du pays
                //customer_state : "CM",// le code ISO l'état
                //customer_zip_code : "06510", // code postal

            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    if (alert("Votre paiement a été effectué avec succès")) {
                        window.location.reload();
                    }
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('sweetalert::alert')
        
        @include('layouts.candidat.header')

        @include('layouts.candidat.sidebar')

        @yield('content')

        @include('layouts.candidat.footer')

    </div>
</body>
</html>
