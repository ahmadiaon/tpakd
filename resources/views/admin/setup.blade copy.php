@extends('layout_admin.main')
@section('head')
<style>
    #success_tic .page-body {
        max-width: 300px;
        background-color: #FFFFFF;
        margin: 10% auto;
    }

    #success_tic .page-body .head {
        text-align: center;
    }

    /* #success_tic .tic{
  font-size:186px;
} */
    #success_tic .close {
        opacity: 1;
        position: absolute;
        right: 0px;
        font-size: 30px;
        padding: 3px 15px;
        margin-bottom: 10px;
    }

    #success_tic .checkmark-circle {
        width: 150px;
        height: 150px;
        position: relative;
        display: inline-block;
        vertical-align: top;
    }

    .checkmark-circle .background {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: #1ab394;
        position: absolute;
    }

    #success_tic .checkmark-circle .checkmark {
        border-radius: 5px;
    }

    #success_tic .checkmark-circle .checkmark.draw:after {
        -webkit-animation-delay: 300ms;
        -moz-animation-delay: 300ms;
        animation-delay: 300ms;
        -webkit-animation-duration: 1s;
        -moz-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-timing-function: ease;
        -moz-animation-timing-function: ease;
        animation-timing-function: ease;
        -webkit-animation-name: checkmark;
        -moz-animation-name: checkmark;
        animation-name: checkmark;
        -webkit-transform: scaleX(-1) rotate(135deg);
        -moz-transform: scaleX(-1) rotate(135deg);
        -ms-transform: scaleX(-1) rotate(135deg);
        -o-transform: scaleX(-1) rotate(135deg);
        transform: scaleX(-1) rotate(135deg);
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }

    #success_tic .checkmark-circle .checkmark:after {
        opacity: 1;
        height: 75px;
        width: 37.5px;
        -webkit-transform-origin: left top;
        -moz-transform-origin: left top;
        -ms-transform-origin: left top;
        -o-transform-origin: left top;
        transform-origin: left top;
        border-right: 15px solid #fff;
        border-top: 15px solid #fff;
        border-radius: 2.5px !important;
        content: '';
        left: 35px;
        top: 80px;
        position: absolute;
    }

    @-webkit-keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }

        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }

        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }

        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
    }

    @-moz-keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }

        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }

        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }

        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
    }

    @keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }

        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }

        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }

        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
    }
</style>

@endsection

@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-20">
                <div class="card-box height-100-p min-height-200px">
                    <div class="d-flex justify-content-between pd-20 ">
                        <div class="h5 mb-0">Berdasarkan Kepemilikan</div>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#modalBerdasarkanKepemilikan"><i
                                        class="icon-copy ion-android-add-circle"></i> Add</a>
                            </div>
                        </div>
                    </div>
                    <table class="data-table  table stripe hover nowrap" id="a">
                        <thead>
                            <tr>
                                <th class="table-plus">Name</th>
                                <th class="datatable-nosort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($bank_owners as $bank_owner)
                            <tr>

                                <td>{{ $bank_owner->bank_owner }}</td>

                                <td>
                                    <div class="table-actions">
                                        <div class="btn-group">
                                            <div class="cta flex-shrink-0 mr-2">
                                                 <a href="#" onclick="editBankOwner({{ $bank_owner->id }})"
                                            class="btn btn-sm btn-outline-primary"><i
                                                class="icon-copy ion-edit"></i></a>
                                                </div>
                                            <div class="cta flex-shrink-0">
                                                  <a href="#" onclick="toDelete('bank-owner',{{ $bank_owner->id }})"
                                            class="btn btn-sm btn-outline-danger"><i
                                                class="icon-copy ion-trash-b"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table> 
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-20">
                <div class="card-box height-100-p   min-height-200px">
                    <div class="d-flex justify-content-between pd-20">
                        <div class="h5 mb-0">Dat I</div>
                        
                    </div>
                    <table class="data-table  table stripe hover nowrap" id="aa">
                        <thead>
                            <tr>
                                <th class="table-plus">Name</th>
                                <th class="datatable-nosort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($dat_i_s as $dat_i)
                            <tr>

                                <td>{{ $dat_i->dat_i_code }} - {{ $dat_i->dat_i_name }}</td>

                                <td>
                                    <div class="table-actions">
                                        <div class="btn-group">
                                            <div class="cta flex-shrink-0 mr-2">
                                                  <a href="#" onclick="editDatI({{ $dat_i->id }})"
                                            class="btn btn-sm btn-outline-primary"><i
                                                class="icon-copy ion-edit"></i></a>
                                                </div>
                                            <div class="cta flex-shrink-0">
                                                  <a href="#" onclick="toDelete('dat-i',{{ $dat_i->id }})"
                                            class="btn btn-sm btn-outline-danger"><i
                                                class="icon-copy ion-trash-b"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table> 
                    
                </div>
            </div>
            <div class="col-lg-7 col-md-6 mb-20">
                <div class="card-box height-100-p  min-height-200px">
                    <div class="d-flex justify-content-between pd-20">
                        <div class="h5 mb-0">Kegiatan Operasional</div>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#modalBankOperational"><i class="icon-copy ion-android-add-circle"></i>
                                    Add</a>
                            </div>
                        </div>
                    </div>  
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus">Name</th>
                                <th class="datatable-nosort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bank_operationals as $bank_operational)
                            <tr>

                                <td>{{ $bank_operational->bank_operational }}</td>

                                <td>
                                    <div class="table-actions">
                                        <div class="btn-group">
                                            <div class="cta flex-shrink-0 mr-2">
                                                  <a href="#" onclick="editBankOperational({{ $bank_operational->id }})"
                                            class="btn btn-sm btn-outline-primary"><i
                                                class="icon-copy ion-edit"></i></a>
                                            </div>
                                            <div class="cta flex-shrink-0">
                                                 <a href="#" onclick="toDelete('bank-operational',{{ $bank_operational->id }})"
                                            class="btn btn-sm btn-outline-danger"><i
                                                class="icon-copy ion-trash-b"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>                 
                </div>
                
            </div>
            <div class="col-lg-5 col-md-6 mb-20">
                <div class="card-box height-100-p pd-20 min-height-200px">
                    <div class="d-flex justify-content-between pb-10">
                        <div class="h5 mb-0">Nama Status Kantor</div>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#modalOfficeStatus"><i class="icon-copy ion-android-add-circle"></i>
                                    Add</a>
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
                                <div class="btn-group">
                                    <div class="cta flex-shrink-0 mr-2">
                                        <a href="#" onclick="editOfficeStatus({{ $office_status->id }})"
                                            class="btn btn-sm btn-outline-primary"><i
                                                class="icon-copy ion-edit"></i></a>
                                    </div>
                                    <div class="cta flex-shrink-0">
                                        <a href="#" onclick="toDelete('office-status',{{ $office_status->id }})"
                                            class="btn btn-sm btn-outline-danger"><i
                                                class="icon-copy ion-trash-b"></i></a>
                                    </div>
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
        <div class="row mb-30">
            <div class="col-md-7">
                <div class="card-box">
                    <div class="row pd-20 ">
                        <div class="col-md-4">
                            <div class="h5  mb-0">Dat II</div>
                        </div>
                        <div class="col-md-8 text-right">
                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalDatII"><i
                                    class="icon-copy ion-android-add-circle"></i>
                                Add</a>
                        </div>
                    </div>


                    <table class="data-table table stripe hover nowrap">
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
                                        <div class="btn-group">
                                            <div class="cta flex-shrink-0 mr-2">
                                                <a href="#" onclick="editDatII({{ $dat_i_i->id }})"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="icon-copy ion-edit"></i></a>
                                            </div>
                                            <div class="cta flex-shrink-0">
                                                <a href="#" onclick="toDelete('dat-i-i',{{ $dat_i_i->id }})"
                                                    class="btn btn-sm btn-outline-danger"><i
                                                        class="icon-copy ion-trash-b"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
            

        </div>
        <div class="footer-wrap pd-20 mb-20 card-box" id="udin">
            TPAKD web By
            <a href="https://github.com/dropways" target="_blank">TPAKD</a>
        </div>
    </div>
</div>

<!-- Modal  Berdasarkan kepemilikan-->
<div class="modal fade" id="modalBerdasarkanKepemilikan" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Berdasarkan Kepemilikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="bank_owner">Kepemilikan Bank</label>
                    <input type="hidden" name="bank_owner_id" id="bank_owner_id">
                    <input type="text" class="form-control" name="bank_owner" id="bank_owner">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" onclick="storeBankOwner()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal  modalBankOperational-->
<div class="modal fade" id="modalBankOperational" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="/superadmin/bank-operational/store" id="form-bank-operational">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bank Operational</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bank_operational">Bank Operational</label>
                        <input type="hidden" name="id" id="bank-operational-id">
                        <input type="text" class="form-control" name="bank_operational" id="bank_operational">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="store('form-bank-operational')"
                        class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal  modalOfficeStatus-->
<div class="modal fade" id="modalOfficeStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="/superadmin/office-status/store" id="form-office-status">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nama Status Kantor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="office_status">Status Kantor</label>
                        <input type="hidden" name="id" id="office-status-id">
                        <input type="text" class="form-control" name="office_status" id="office_status">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="store('form-office-status')" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal  modalDatI-->
<div class="modal fade" id="modalDatI" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="/superadmin/dat-i/store" id="form-dat-i">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Dat I</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dat_i_code">Kode Dat I</label>
                        <input type="hidden" name="id" id="dat-i-id">
                        <input type="text" class="form-control" name="dat_i_code" id="dat_i_code">
                    </div>
                    <div class="form-group">
                        <label for="dat_i_name">Nama Dat</label>
                        <input type="text" class="form-control" name="dat_i_name" id="dat_i_name">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="store('form-dat-i')" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal  modalDatII-->
<div class="modal fade" id="modalDatII" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="/superadmin/dat-i-i/store" id="form-dat-i-i">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Dat II</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dat_i_i_code">Kode Dat II</label>
                        <input type="hidden" name="id" id="dat-i-i-id">
                        <input type="text" class="form-control" name="dat_i_i_code" id="dat_i_i_code">
                    </div>
                    <div class="form-group">
                        <label for="dat_i_i_name">Nama Dat</label>
                        <input type="text" class="form-control" name="dat_i_i_name" id="dat_i_i_name">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="store('form-dat-i-i')" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal  success-->
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h3 class="mb-20">Data Berhasil diubah</h3>
                <div class="mb-30 text-center">
                    <img src="/vendors/images/success.png" />
                </div>
             Data Berhasil
            </div>
            <div class="modal-footer justify-content-center">
                <button onclick="goto()" type="button" class="btn btn-primary" data-dismiss="modal">
                    Done
                </button>
            </div>
        </div>
    </div>
</div>
{{-- modal gagal --}}
<div class="modal fade" id="alert-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content bg-danger text-white">
            <div class="modal-body text-center">
                <h3 class="text-white mb-15">
                    <i class="fa fa-exclamation-triangle"></i> Alert
                </h3>
                <p>
                 Data Berhasil
                </p>
                <button type="button" class="btn btn-light" data-dismiss="modal">
                    Ok
                </button>
            </div>
        </div>
    </div>
</div>
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
                        <button type="submit" onclick="confirmedDelete()"
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
    var udin = ` <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>`;
    $('#udin').append(udin);
   

    function storeBankOwner(){
        let _token   = $('meta[name="csrf-token"]').attr('content');
		let _url = "/superadmin/setup/bank-owner/store";
        $('#modalBerdasarkanKepemilikan').modal('hide');
        $.ajax({
              url: _url,
              type: "POST",
              data: {
                id :$('#bank_owner_id').val(),
				bank_owner: $('#bank_owner').val(),
                _token: _token
              },
              success: function(response) {
                $('#success-modal').modal('show');
                
              },
              error: function(response) {
                console.log(response)
                $('#alert-modal').modal('show')
              }
            });
    }
    function goto(){
        window.location.href = "/superadmin/setup"
    }
    function editBankOwner(id){
        $.get("/superadmin/setup/bank-owner/"+id+"/get", function(data){
            var item = data.data
            console.log(item.bank_owner)
            $('#bank_owner').val(item.bank_owner) 
            $('#bank_owner_id').val(item.id)
            $('#modalBerdasarkanKepemilikan').modal('show')
            
        });
    }
    function editDatI(id){
        $.get("/superadmin/setup/dat-i/"+id+"/get", function(data){
            var item = data.data
            $('#dat_i_code').val(item.dat_i_code) 
            $('#dat_i_name').val(item.dat_i_name) 
            $('#dat-i-id').val(item.id)
            $('#modalDatI').modal('show')
            
        });
    }
    function editDatII(id){
        $.get("/superadmin/setup/dat-i-i/"+id+"/get", function(data){
            var item = data.data
            $('#dat_i_i_code').val(item.dat_i_i_code) 
            $('#dat_i_i_name').val(item.dat_i_i_name) 
            $('#dat-i-i-id').val(item.id)
            $('#modalDatII').modal('show')
            
        });
    }
    function editOfficeStatus(id){
        $.get("/superadmin/setup/office-status/"+id+"/get", function(data){
            var item = data.data
            $('#office_status').val(item.office_status) 
            $('#office-status-id').val(item.id)
            $('#modalOfficeStatus').modal('show')
            
        });
    }
    function editBankOperational(id){
        $.get("/superadmin/setup/bank-operational/"+id+"/get", function(data){
            var item = data.data
            console.log(item)
            $('#bank_operational').val(item.bank_operational) 
            $('#bank-operational-id').val(item.id)
            $('#modalBankOperational').modal('show')
            
        });
    }

    function store(formId){
        var form = $('#'+formId)[0];
        var _url = $('#'+formId).attr('action');
        var data = new FormData(form);
        console.log(_url)
        $.ajax({
            url: _url,
            type: "POST",
              
            processData: false,
            contentType: false,
              data: data,
              success: function(response) {
                console.log(response)
                $('#success-modal').modal('show');
                
              },
              error: function(response) {
                console.log(response)
                $('#alert-modal').modal('show')
              }
            });
        

    }

    function toDelete(url,id){
        $('#id_delete').val(id)
        $('#urls').val(url)
        console.log(url)
        
        $('#confirmation-modal').modal('show')

    }

    function confirmedDelete(){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let id = $('#id_delete').val();
        let _url = $('#urls').val();
        _url = '/superadmin/'+_url+'/delete'
         $.ajax({
            url: _url,
            type: "POST",
              
              data: {
                id :id,
                _token: _token
              },
              success: function(response) {
                console.log(response)
                $('#success-modal').modal('show');
                
              },
              error: function(response) {
                console.log(response)
                $('#alert-modal').modal('show')
              }
            }); 
        $('#confirmation-modal').modal('hide');
       
    }
</script>

@endsection