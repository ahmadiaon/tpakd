@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-blue h4">Promosi</h4>
                    </div>
                    <div class="col-6">
                        <a href="/superadmin/promosi/create">
                            <button class="btn btn-primary float-right">Tambah Promosi</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="pb-20">
                @if(session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
                @endif


                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">Judul</th>
                            <th>Image</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($newss as $value)
                        <tr>
                            <td class="table-plus">{{ $value->title }}</td>
                            <td>
                                <div class="name-avatar d-flex align-items-center">
                                    <div class="mr-2 flex-shrink-0">
                                        <img src="{{ env('APP_URL').$value->photo_path }}" class=" shadow" width="100"
                                            alt="" />
                                    </div>
                                </div>
                            </td>
                            <td>{{ $value->date }}</td>
                            <td>{{ $value->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="/superadmin/berita/{{ $value->slug }}/edit"><i
                                                class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" onclick="deleteThis('{{ $value->slug }}')" href="#"><i
                                                class="dw dw-edit2"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Simple Datatable End -->

        <div class="footer-wrap pd-20 mb-20 card-box">
            TPAKD web By
            <a href="https://github.com/dropways" target="_blank">TPAKD</a>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">
                    <input type="hidden" name="id_delete" id="id_delete">
                    <input type="hidden" name="urls" id="urls">
                    Are you sure you want to continue?
                </h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                            data-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </button>
                        NO
                    </div>
                    <div class="col-6">
                        <button type="button" onclick="confirmedDelete()"
                            class="btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal">
                            <i class="fa fa-check"></i>
                        </button>
                        YES
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        function deleteThis(id){
            $('#id_delete').val(id)         
            $('#confirmation-modal').modal('show')
        }

        function confirmedDelete(){
            let id_delete = $('#id_delete').val()
            window.location.href = "/superadmin/berita/delete/"+id_delete;
        }
    </script>
@endsection