@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="card-box pd-20">
            <div class="row mb-20">
                <div class="col">
                    <h3>Admin BANK</h3>
                </div>
                <div class="col">

                    @if(session('dataUser')->role_id == 1) {{-- superadmin --}}
                    <a href="{{ (session('dataUser')->role_id == 1) ?'/bank-group/create':'/admin/bank/create' }}">
                        <button class="btn btn-primary float-right">Tambah Bank Group</button>
                    </a>
                    @else
                    <a href="{{ (session('dataUser')->role_id == 1) ?'/bank-group/create':'/admin/bank/create' }}"><button
                            class="btn btn-primary float-right">Tambah Bank</button></a>
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if(session()->has('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
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

@endsection