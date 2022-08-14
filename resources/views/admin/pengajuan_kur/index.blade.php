@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">Pengajuan KUR</div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Bank</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>NIK</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                {{-- <div class="avatar mr-2 flex-shrink-0">
                                    <img src="{{ env('APP_URL') }}vendors/images/photo4.jpg"
                                        class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div> --}}
                                <div class="txt">
                                    <div class="weight-600">{{ $data->bank_name }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $data->kur_nama }}</td>
                        <td>{{ $data->kur_no_telepon }}</td>

                        <td>{{ $data->kur_nik }}</td>
                        <td>Pending</td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
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
@include('layout_admin.js_datatable')

@endsection