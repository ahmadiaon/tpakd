<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ env('APP_URL') }}assets/img/TPAKD_Logo.png" alt="">
            <!-- <h1 class="d-flex align-items-center"> TPKAD</h1> -->
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/" class="{{ ($active == 'home')?'active':'' }}">Beranda</a></li>
                <li class="dropdown"><a href="/"><span>Tentang TPAKD</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="/latar-belakang">Latar Belakang</a></li>
                        <li><a href="/dasar-pembentukan">Dasar Pembentukan</a></li>
                        <li><a href="/road-map">Roadmap TPAKD</a></li>
                        <li><a href="/tpakd-kalteng">TPAKD Prov. Kalteng</a></li>
                    </ul>
                </li>
                <li><a href="/infografis-keuangan"
                        class="{{ ($active=='infografis-keuangan' )?'active':'' }}">Infografis
                        Keuangan</a></li>
                <li class="dropdown"><a href="#" class="{{($active=='akses_keuangan' )?'active':'' }}"><span>Akses
                            Keuangan</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li class="dropdown"><a href="#"><span>KUR</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="informasi-kur">Informasi KUR</a></li>
                                <li><a href="/pengajuan-kur">Pengajuan KUR</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="/"><span>K/PMR</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="/informasi-kpmr">Informasi K/PMR</a></li>
                                <li><a href="/pengajuan-kpmr">Pengajuan K/PMR</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="/"><span>QRIS</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="/informasi-qris">Informasi QRIS</a></li>
                                <li><a href="/pengajuan-qris">Pengajuan QRIS</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="/"><span>SimPel</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="/informasi-simpel">Informasi SimPel</a></li>
                                <li><a href="/pengajuan-simpel">Pengajuan SimPel</a></li>
                            </ul>
                        </li>
                        <li><a href="/pengajuan-pinjaman" class="active">Pengajuan Pinjaman</a></li>
                        <li><a href="/pengajuan-rekening" class="active">Pembukaan Rekening</a></li>
                        <li><a href="/maps" class="active">Maps</a></li>
                        <li><a href="/pengajuan-saya" class="active">Cek Ajuan</a></li>
                    </ul>
                </li>
                <li><a class="{{ ($active == 'berita')?'active':'' }}" href="/berita">Berita</a></li>
                <li><a class="{{ ($active == 'promosi')?'active':'' }}" href="/promosi">Promosi</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->