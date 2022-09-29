@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="row">

            <div class="col-lg-6 col-md-6 mb-20">
                <div class="card-box height-100-p pd-20 min-height-200px">
                    <div class="d-flex justify-content-between pb-10">
                        <div class="h5 mb-0">Nama Status Kantor</div>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="/bank-group/create"><i class="dw dw-eye"></i> Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="user-list">
                        <ul>
                            @foreach($office_statuses as $office_status)
                            <li class="d-flex align-items-center justify-content-between">
                                <div class="name-avatar d-flex align-items-center pr-2">
                                    {{-- <div class="avatar mr-2 flex-shrink-0">
                                        <img src="{{ env('APP_URL') }}{{ $office_statu->photo_path }}"
                                            class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                    </div> --}}
                                    <div class="txt">
                                        <div class="font-14 weight-600">{{ $office_status->office_status }}</div>

                                    </div>
                                </div>
                                <div class="cta flex-shrink-0">
                                    <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                </div>
                            </li>
                            @endforeach
                            <div class="d-flex justify-content-end">
                                {{ $office_statuses->links() }}
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p pd-20 min-height-200px">
                    <div class="d-flex justify-content-between pb-10">
                        <div class="h5 mb-0">Berdasarkan Kepemilikan</div>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="/bank-group/create"><i class="dw dw-eye"></i> Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="user-list">
                        <ul>
                            @foreach($bank_owners as $bank_owner)
                            <li class="d-flex align-items-center justify-content-between">
                                <div class="name-avatar d-flex align-items-center pr-2">

                                    <div class="txt">
                                        <div class="font-12 weight-500" data-color="#b2b1b6">
                                            {{ $bank_owner->bank_owner }}
                                        </div>
                                    </div>
                                </div>
                                <div class="cta flex-shrink-0">
                                    <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                </div>
                            </li>
                            @endforeach
                            <div class="d-flex justify-content-end">
                                {{ $bank_owners->links() }}
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p pd-20 min-height-200px">
                    <div class="d-flex justify-content-between pb-10">
                        <div class="h5 mb-0">Dat I</div>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="/bank-group/create"><i class="dw dw-eye"></i> Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="user-list">
                        <ul>
                            @foreach($dat_i_s as $dat_i)
                            <li class="d-flex align-items-center justify-content-between">
                                <div class="name-avatar d-flex align-items-center pr-2">
                                    <div class="txt">
                                        <div class="font-14 weight-600">{{ $dat_i->dat_i_code }} - {{ $dat_i->dat_i_name
                                            }}</div>
                                    </div>
                                </div>
                                <div class="cta flex-shrink-0">
                                    <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                </div>
                            </li>
                            @endforeach
                            <div class="d-flex justify-content-end">
                                {{ $dat_i_s->links() }}
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-20">
                <div class="card-box height-100-p pd-20 min-height-200px">
                    <div class="d-flex justify-content-between pb-10">
                        <div class="h5 mb-0">Kegiatan Operasional</div>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="/bank-group/create"><i class="dw dw-eye"></i> Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="user-list">
                        <ul>
                            @foreach($bank_operationals as $bank_operational)
                            <li class="d-flex align-items-center justify-content-between">
                                <div class="name-avatar d-flex align-items-center pr-2">
                                    {{-- <div class="avatar mr-2 flex-shrink-0">
                                        <img src="{{ env('APP_URL') }}{{ $office_statu->photo_path }}"
                                            class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                    </div> --}}
                                    <div class="txt">
                                        <div class="font-14 weight-600">{{ $bank_operational->bank_operational }}</div>

                                    </div>
                                </div>
                                <div class="cta flex-shrink-0">
                                    <a href="#" class="btn btn-sm btn-outline-primary">Schedule</a>
                                </div>
                            </li>
                            @endforeach
                            <div class="d-flex justify-content-end">
                                {{ $bank_operationals->links() }}
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-30">
            <div class="col-7">
                <div class="card-box pb-10">
                    <div class="h5 pd-20 mb-0">Dat II</div>
                    <table class="data-table table nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus">Name</th>
                                <th class="datatable-nosort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dat_i_i_s as $dat_i_i)
                            <tr>

                                <td>{{ $dat_i_i->dat_i_i_code }}-{{ $dat_i_i->dat_i_i_name }}</td>

                                <td>
                                    <div class="table-actions">
                                        <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                        <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <div class="d-flex justify-content-end">
                                {{ $dat_i_i_s->links() }}
                            </div>
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