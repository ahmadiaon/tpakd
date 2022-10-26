@extends('layout_pub.main')
@section('content')
@include('layout_pub.hero')
<main id="main">

    <!-- ======= Why Choose Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Produk Keuangan</h2>

            </div>

            <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

                <!-- <div class="col-xl-5 img-bg" style="background-image: url('assets/img/why-us-bg.jpg')"></div> -->
                <div class="col-xl-7 features slides position-relative">
                    <div class="slides-1 swiper"> <br> <br> <br>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pasar1.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div><!-- End slide item -->

                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pasar1.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div><!-- End slide item -->

                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pasar3.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div><!-- End slide item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

                <div class="col-xl-5 features slides ">
                    <div class="details">
                        <div class="container" data-aos="fade-up" data-aos-delay="300">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Kredit Usaha Rakyat (KUR)</h5>
                                    <p>Program Kredit Usaha Rakyat (KUR) adalah salah satu program pemerintah dalam
                                        meningkatkan akses pembiayaan kepada Usaha Mikro, Kecil, dan Menengah (UMKM)
                                        yang disalurkan melalui lembaga keuangan dengan pola penjaminan.</p>
                                    <a href="/pengajuan-kur" class="btn-get-started">Ajukan KUR</a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Kredit/Pembiayaan Melawan Rentenir (K/PMR)</h5>
                                    <p>K/PMR adalah kredit/pembiayaan yang diberikan pleh Lembaga Jasa Keuangan
                                        formal kepada pelaku Usaha Mikro dan Kecil (UMK) dengan proses cepat, mudah,
                                        dan berbiaya rendah, untuk mengurangi ketergantungan serta pengaruh entitas
                                        kredit informasi ilegal.</p>
                                    <a href="/pengajuan-kpmr" class="btn-get-started">Ajukan K/PMR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Why Choose Us Section -->

    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Infografis Keuangan Terbaru</h2>
            </div>
            <div class="portfolio-isotope text-center" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">
                <div class="row">
                    <div class="col-5 mr-30">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-5">
                        <canvas id="myChart2" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Berita Terbaru</h2>
            </div>

            <div class="row gy-5">
                @foreach($newss as $news)
                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ env('APP_URL') }}{{ $news->photo_path }}"
                                style="height: 200px; width: 300px;" class="img-fluid" alt=""></div>
                        <div class="meta">
                            <span class="post-date">{{ $news->date }}</span>
                        </div>
                        <h3 class="post-title">{{ $news->title }}</h3>
                        <!-- <p>Illum voluptas ab enim placeat. Adipisci enim velit nulla. Vel omnis laudantium. Asperiores eum ipsa est officiis. Modi qui magni est...</p> -->
                        <a href="/berita/{{ $news->slug }}" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Recent Blog Posts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Kutipan</h2>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                Akses keuangan merupakan hak dasar bagi seluruh masyarakat dan memiliki peran
                                penting dalam meningkatkan taraf hidup masyarakat.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ env('APP_URL') }}assets/img/user.png" class="testimonial-img" alt="">
                                <h3>Faisal Rahman</h3>
                                <h4>Mahasiswa</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                Program TPAKD ini mampu mempercepat akses keuangan di daerah dalam rangka
                                menciptakan pertumbuhan ekonomi yang lebih merata, partisipatif, dan inklusif.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ env('APP_URL') }}assets/img/user.png" class="testimonial-img" alt="">
                                <h3>Reza Ghaniyy Rosadi</h3>
                                <h4>Mahasiwa</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                Untuk itu, OJK dan Kementerian Dalam Negeri serta institusi terkait lainnya
                                membentuk Tim Percepatan Akses Keuangan Daerah atau yang disingkat dengan TPAKD.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ env('APP_URL') }}assets/img/user.png" class="testimonial-img" alt="">
                                <h3>Jhosua Kristian Maranatha</h3>
                                <h4>Mahasiwa</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                Dalam berbagai forum kebijakan publik, isu akses keuangan sering dikaitkan dengan
                                upaya untuk mendorong UMKM dan sektor produktif.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ env('APP_URL') }}assets/img/user.png" class="testimonial-img" alt="">
                                <h3>Eldo Siahaan</h3>
                                <h4>Karyawan</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->


                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->
@endsection

@section('js')
<script>
    // var label_name = {{ $grafik1->name}}
    var ctx = document.getElementById("myChart").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["{{ $grafik1->name_value_1 }}", "{{ $grafik1->name_value_2 }}", "{{ $grafik1->name_value_3 }}", "{{ $grafik1->name_value_4 }}"],
          datasets: [
            {
              label: "{{ $grafik1->name}}",
              data: [{{ $grafik1->value_1 }}, {{ $grafik1->value_2 }}, {{ $grafik1->value_3 }}, {{ $grafik1->value_4 }}],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
              ],
              borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
</script>
<script>
    var ctx = document.getElementById("myChart2").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["{{ $grafik2->name_value_1 }}", "{{ $grafik2->name_value_2 }}", "{{ $grafik2->name_value_3 }}", "{{ $grafik2->name_value_4 }}"],
          datasets: [
            {
              label:  "{{ $grafik2->name}}",
              data: [{{ $grafik2->value_1 }}, {{ $grafik2->value_2 }}, {{ $grafik2->value_3 }}, {{ $grafik2->value_4 }}],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
              ],
              borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
</script>
@endsection