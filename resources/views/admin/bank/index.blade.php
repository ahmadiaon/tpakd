@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="card-box pb-10">
            <div class="row">
                <div class="col-12">
                    <div class="h5 pd-20 mb-0">Bank
                        <a href="{{ (session('dataUser')->role_id == 1) ?'/bank-group/create':'/admin/bank/create' }}"><button
                                class="btn btn-primary float-right">add</button></a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <table class="data-table table nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus">Bank</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th class="datatable-nosort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banks as $bank)
                            <tr>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">
                                        {{-- <div class="avatar mr-2 flex-shrink-0">
                                            <img src="{{ env('APP_URL') }}vendors/images/photo4.jpg"
                                                class="border-radius-100 shadow" width="40" height="40" alt="" />
                                        </div> --}}
                                        <div class="txt">
                                            <div class="weight-600">{{ $bank->bank_name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $bank->bank_address }}</td>
                                <td>{{ $bank->bank_no_phone }}</td>
                                <td>{{ $bank->bank_date_permission }}</td>

                                <td>
                                    <div class="table-actions">
                                        <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                        <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <div class="d-flex justify-content-end">
                                {{ $banks->links() }}
                            </div> --}}


                        </tbody>
                    </table>
                </div>

            </div>

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