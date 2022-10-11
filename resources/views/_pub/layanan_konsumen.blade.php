@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Latar Belakang</h2>
            <ol>
                <li><a href="/">Tentang TPAKD</a></li>
                <li>Latar Belakang</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog contact">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="row gy-5 posts-list">

                        <div class="col-lg-12">
                            <article class="d-flex flex-column">

                                <div class="row gy-12" data-aos="fade-up">
                                    <img src="{{ env('APP_URL') }}assets/i/img/pintasan1.jpeg" class="img-fluid" alt="">
                                </div>


                                <div class="content">
                                    <p style="text-align:justify">Kontak 157 disediakan oleh Otoritas Jasa Keuangan
                                        (OJK) sesuai kewenangannya pada Undang - Undang Nomor 21 Tahun 2011 tentang OJK.
                                        OJK berkomitmen untuk memberikan informasi dan edukasi kepada masyarakat dan
                                        Konsumen terkait produk dan layanan di sektor jasa keuangan. Selain itu, OJK
                                        juga menyediakan fasilitas penangan pengaduan Konsumen agar dapat
                                        ditindaklanjuti sesuai ketentuan yang berlaku. Kontak 157 OJK memiliki 3 layanan
                                        berupa :&nbsp;<br />
                                        &bull;&nbsp;&nbsp; &nbsp;Layanan Pemberian Informasi (Pertanyaan)<br />
                                        &bull;&nbsp;&nbsp; &nbsp;Layanan Penerimaan Informasi (Laporan)<br />
                                        &bull;&nbsp;&nbsp; &nbsp;Layanan Pengaduan</p>
                                </div>

                                <br>

                                <div class="row gy-12" data-aos="fade-up">
                                    <img src="{{ env('APP_URL') }}assets/i/img/pintasan2.jpg" class="img-fluid" alt="">
                                </div>


                                <div class="content">
                                    <p style="text-align:justify">Sistem Layanan Informasi Keuangan atau SLIK sendiri
                                        merupakan sistem informasi yang pengelolaannya dibawah tanggung jawab OJK yang
                                        bertujuan untuk melaksanakan tugas pengawasan dan pelayanan informasi keuangan,
                                        yang salah satunya berupa penyediaan informasi debitur (iDeb). SLIK berfungsi
                                        untuk Membantu mempercepat proses analisis dan pengambilan keputusan pemberian
                                        Kredit Tanpa Agunan atau kartu kredit.</p>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                    </div><!-- End blog posts list -->



                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="250">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama"
                                style="font-size: 14px;  border-radius: 0; height: 44px" maxlength="60" required />
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukan E-Mail" style="font-size: 14px;  border-radius: 0; height: 44px"
                                required maxlength="60" />
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Masukan Pesan"
                                style="font-size: 14px;  border-radius: 0;   padding: 10px 12px;" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                    </form>

                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection