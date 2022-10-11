@include('layout_admin.head')
@yield('head')
</head>

<body>


    @include('layout_admin.header')
    @if(session('dataUser')->role == 'superadmin')

    @include('layout_admin.superadmin_sidebar')

    @elseif(session('dataUser')->role == 'admin-bank')

    @include('layout_admin.admin_sidebar')

    @else

    @include('layout_admin.bank_sidebar')

    @endif


    <div class="mobile-menu-overlay"></div>

    @yield('content')

    <!-- welcome modal end -->
    @include('layout_admin.js_core')
    @yield('js')

</body>

</html>