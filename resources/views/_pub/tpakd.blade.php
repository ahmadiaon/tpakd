@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>TPAKD Provinsi Kalimantan Tengah</h2>
            <ol>
                <li><a href="/">Tentang TPAKD</a></li>
                <li>TPAKD Provinsi Kalimantan Tengah</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="services-cards" class="services-cards">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">


                @foreach($tpkad_kaltengs as $tpkad_kalteng)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-3">
                                <img src="{{ env('APP_URL') }}{{ $tpkad_kalteng->path_image }}"
                                    class="rounded float-left" alt=""
                                    style="height: 150px; width: 120px; margin-top: 25px; margin-left: 25px; margin-bottom: 25px;">
                            </div>
                            <div class="col-xl-9 d-flex align-items-center">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $tpkad_kalteng->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                @endforeach

            </div>

        </div>
    </section><!-- End Services Cards Section -->

</main><!-- End #main -->

@endsection