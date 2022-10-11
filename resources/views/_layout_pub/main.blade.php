@include('layout_pub.head')
@yield('css')
</head>

<body class="page-index">

    <!-- ======= Header ======= -->
    @include('layout_pub.header')

    <!-- ======= Hero Section ======= -->


    @yield('content')

    <!-- ======= Footer ======= -->
    @include('layout_pub.footer')
    <!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    @include('layout_pub.js')
    @yield('js')

</body>

</html>