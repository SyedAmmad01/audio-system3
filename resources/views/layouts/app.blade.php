<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Dashboard | Graindashboard UI Kit</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('/img/favicon.ico')}}">


    <!-- DEMO CHARTS -->
    <link rel="stylesheet" href="{{asset('/demo/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('/demo/chartist-plugin-tooltip.css')}}">

    <!-- Template -->
    <link rel="stylesheet" href="{{asset('/graindashboard/css/graindashboard.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    {{-- @include('components.navbar') --}}
    @include('components.header')
    <!-- End Header -->

    <main class="main">
        <!-- Sidebar Nav -->
        @include('components.sidebar')
        <!-- End Sidebar Nav -->

        @yield('content')

        {{-- @include('components.footer') --}}

    </main>


    <script src="{{asset('/graindashboard/js/graindashboard.js')}}"></script>
    <script src="{{asset('/graindashboard/js/graindashboard.vendor.js')}}"></script>

    <!-- DEMO CHARTS -->
    <script src="{{asset('/demo/resizeSensor.js')}}"></script>
    <script src="{{asset('/demo/chartist.js')}}"></script>
    <script src="{{asset('/demo/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{asset('/demo/gd.chartist-area.js')}}"></script>
    <script src="{{asset('/demo/gd.chartist-bar.js')}}"></script>
    <script src="{{asset('/demo/gd.chartist-donut.js')}}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @yield('page-scripts')


    <script>
        $.GDCore.components.GDChartistArea.init('.js-area-chart');
        $.GDCore.components.GDChartistBar.init('.js-bar-chart');
        $.GDCore.components.GDChartistDonut.init('.js-donut-chart');
    </script>



</body>

</html>
