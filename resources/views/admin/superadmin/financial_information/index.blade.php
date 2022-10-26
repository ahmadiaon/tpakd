@extends('layout_admin.main')
@section('content')
<div class="main-container">
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Financial</h4>

        </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Service</th>
                        <th>Title</th>
                        <th>Little Description</th>
                        <th>Image</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($financialInformations as $value)
                    <tr>
                        <td class="table-plus">{{ $value->financial }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ Illuminate\Support\Str::limit($value->litte_description, 20, $end='...') }}</td>
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
                                    <a class="dropdown-item"
                                        href="/superadmin/financial-information/{{ $value->slug }}/edit"><i
                                            class="dw dw-edit2"></i> Edit</a>
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
@endsection

@section('js')

@endsection