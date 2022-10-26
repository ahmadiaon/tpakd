@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-blue h4">TPAKD Kalteng</h4>
                </div>
                <div class="col-md-6 text-right">
                    <div class="btn-group">
                        <div class="btn-group dropdown">
                            <a href="/superadmin/tpakd-kalteng/create" >
                           <button type="button" class="btn btn-success" >
                                Tambah <i class="icon-copy fi-plus"></i>
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Name</th>
                        <th>Image</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tpakd_kaltengs as $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>
                            <div class="name-avatar d-flex align-items-center">
                                <div class="mr-2 flex-shrink-0">
                                    <img src="{{ env('APP_URL').$value->path_image }}" class=" shadow" width="100"
                                        alt="" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="/superadmin/tpakd-kalteng/edit/{{ $value->slug }}"><i
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
</div>
<!-- Modal HTML -->


{{-- modal confirm --}}
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
            window.location.href = "/superadmin/tpakd-kalteng/delete/"+id_delete;
        }
    </script>
@endsection