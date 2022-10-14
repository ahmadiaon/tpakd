@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20 mb-30">
        <div class="card-box pb-10 mb-30">
            <div class="row pd-20" >
                <div class="col-3">
                    <h4 class="text-blue h4">Data {{$jenis_pengajuan}} masuk</h4>
                </div>
                <div class="col-9 text-right">
                    <div class="btn-group">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" href="#">Export</a>                    
                    </div>
                </div>
            </div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Name</th>
                        <th>Tanggal Masuk</th>
                        <th>Email</th>
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
                                <div class="txt">
                                    <div class="weight-600">{{ $data->nama }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $data->date_pending }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->no_telpon }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->status }}</td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="/export-list-pengajuan/kur" method="post">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Export Data {{$jenis_pengajuan}} masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="">Pilih Periode</label>
                <input type="hidden" name="jenis_pengajuan" value="{{$jenis_pengajuan}}" id="">
                <div class="custom-control custom-checkbox mb-5 text-center">
                <button name="isAll" type="submit" value="all" class="btn btn-primary">Eksport Semua</button>
                </div>
                <label class="mt-20 text-center" for="">Atur Waktu</label>
            </div>
            <div class="form-group">            
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Awal Tanggal</label>
                        <input class="form-control" type="date" name="start_date" id="start_date">
                    </div>
                    <div class="col-md-6">
                        <label for="">Akhir Tanggal</label>
                        <input class="form-control" type="date" name="end_date" id="start_date">
                    </div>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Eksport</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')

@endsection