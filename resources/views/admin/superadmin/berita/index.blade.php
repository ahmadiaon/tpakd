@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-blue h4">Berita</h4>
                    </div>
                    <div class="col-6">
                        <a href="/superadmin/berita/create">
                            <button class="btn btn-primary float-right">Tambah Berita</button>
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
                            <th>Judul</th>
                            <th>Description</th>
                            <th>Tanggal</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($newss as $news)
                        <tr>
                            <td class="table-plus">{{ $news->title }}</td>
                            <td>
                                {{ $news->excerpt }}
                            </td>
                            <td>{{ $news->date }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
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
@endsection

@section('js')

@endsection