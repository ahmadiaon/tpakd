@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="card-box pd-20">
            <div class="row mb-20">
                <div class="col">
                    <h3>BANK</h3>
                </div>
                <div class="col">

                    @if(session('dataUser')->role_id == 1) {{-- superadmin --}}

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
                                <th>Name</th>
                                <th>Username</th>
                                <th class="datatable-nosort">Actions</th>
                            </tr>
                        </thead>
                        {{-- @dd($banks) --}}
                        <tbody>
                            @foreach($banks as $bank)
                            <tr>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">
                                        <div class="txt">
                                            <div class="weight-600">{{ $bank->bank_name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="table-plus">
                                    <div class="name-avatar d-flex align-items-center">
                                        <div class="txt">
                                            <div class="weight-600">{{ $bank->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="table-actions">
                                     <a href="#" onclick="resetAdminBank('{{$bank->id}}')"  data-color="#e95959">
                                            <button class="btn btn-success">reset pass</button>
                                        </a>
                                        <a href="/bank/edit/{{$bank->id}}"   data-color="#e95959">
                                            <button class="btn btn-warning">edit</button>
                                        </a>
                                        <a href="#" onclick="deleteAdminBank('{{$bank->id}}')"  data-color="#e95959">
                                              <button class="btn btn-danger">hapus</button>
                                        </a>
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

<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                
                <h4 class="padding-top-30 mb-30 weight-500">
                    <input type="hidden" id="id_delete" name="uuid_delete">
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
                        <a href="" id="href-id">  
                         <button   type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn"
                           >
                            <i class="fa fa-check"></i>
                        </button>
                        </a>
                        YES
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reset-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                
                <h4 class="padding-top-30 mb-30 weight-500">
                    <input type="hidden" id="id_delete" name="uuid_delete">
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
                        <a href="" id="href-reset-id">  
                         <button   type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn"
                           >
                            <i class="fa fa-check"></i>
                        </button>
                        </a>
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
function deleteAdminBank(uuid){
            let _url = '/superadmin/database/delete'
            $('#confirm-modal').modal('show')
            $('#href-id').attr('href', '/superadmin/admin-bank/delete/'+uuid)
       }

       function resetAdminBank(uuid){
            let _url = '/superadmin/database/delete'
            $('#reset-modal').modal('show')
            $('#href-reset-id').attr('href', '/superadmin/admin-bank/reset/'+uuid)
       }
</script>
@endsection