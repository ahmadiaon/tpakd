@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20 mb-30">
        <div class="card-box pb-10 mb-30">
            <div class="row pd-20" >
                <div class="col-3">
                    <h4 class="text-blue h4">Data Pengajuan masuk</h4>
                </div>
            </div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Jenis Pengajuan</th>
                        <th>Jumlah Masuk</th>
                        <th>Jumlah Pending</th>
                        <th>Jumlah Selesai</th>
                        <th>Pergi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="txt">
                                    <div class="weight-600">KUR</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $done_kur+$pending_kur }}</td>
                        <td>{{ $pending_kur }}</td>
                        <td>{{ $done_kur }}</td>
                        <td><a href="/list-pengajuan/kur" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a></td>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="txt">
                                    <div class="weight-600">K/PMR</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $done_kpmr+$pending_kpmr }}</td>
                        <td>{{ $pending_kpmr }}</td>
                        <td>{{ $done_kpmr }}</td>
                        <td><a href="/list-pengajuan/kpmr" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a></td>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="txt">
                                    <div class="weight-600">Pinjaman</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $done_pinjaman+$pending_pinjaman }}</td>
                        <td>{{ $pending_pinjaman }}</td>
                        <td>{{ $done_pinjaman }}</td>
                        <td><a href="/list-pengajuan/pinjaman" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a></td>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="txt">
                                    <div class="weight-600">Rekening Baru</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $done_baru+$pending_baru }}</td>
                        <td>{{ $pending_baru }}</td>
                        <td>{{ $done_baru }}</td>
                        <td><a href="/list-pengajuan/baru" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a></td>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="txt">
                                    <div class="weight-600">QRIS</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $done_qris+$pending_qris }}</td>
                        <td>{{ $pending_qris }}</td>
                        <td>{{ $done_qris }}</td>
                        <td><a href="/list-pengajuan/kpmr" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a></td>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="txt">
                                    <div class="weight-600">SIMPEL</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $done_simpel+$pending_simpel }}</td>
                        <td>{{ $pending_simpel }}</td>
                        <td>{{ $done_simpel }}</td>
                        <td><a href="/list-pengajuan/kpmr" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a></td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer-wrap pd-20 mb-20 card-box">
            TPAKD web By
            <a href="https://github.com/dropways" target="_blank">TPAKD</a>
        </div>
    </div>
</div>


@endsection

@section('js')

@endsection