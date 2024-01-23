{{-- @extends('layouts.admin') --}}
@extends('layouts.modal_list')
@section('title', 'Category')
@section('content')
    @php
        $perpage = app('request')->input('plimit') > 0 ? app('request')->input('plimit') : 10;
    @endphp

    <div class="row HideOnPrint">
        <div class="col-md-6">
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#Product" data-bs-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="?">Category List</a></li>
                        <li style="text-align: right">
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-md-5">
            <div class="page-meta">
                <div class="col-xl-12 col-md-3 col-sm-6" style="margin-right: 20px; text-align: right;">
                    <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Add New
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-1 HideOnPrint" style="text-align: right">
            <div class="page-meta">
                <div class="col-xl-12 col-md-3 col-sm-6" style="margin-right: 20px; text-align: right;">
                    <button class="btn btn-outline-info btn-icon _effect--ripple waves-effect waves-light"
                        onclick="window.print()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-printer">
                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                            <rect x="6" y="14" width="12" height="8"></rect>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
    <div style="margin-top: -70px" class="ShowOnPrint"></div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x close" data-bs-dismiss="alert">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button> <strong>Error!</strong> {{ $error }}
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="widget-content">
            <div class="mixin"></div>
        </div>
    @endif

    @php
        $client_id = Auth::User()->client_id;
    @endphp

    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing HideOnPrint">
            <div class="widget-content widget-content-area br-8">
                <form action="">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" placeholder="name"
                                    value="{{ request()->input('name') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-select form-control-sm">
                                    <option value=""> All </option>
                                    {{-- {!! statusType(request()->input('status')) !!} --}}
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Company Name</label>
                                <input type="text" class="form-control form-control-sm" name="company_name"
                                    placeholder="Company name" value="{{ request()->input('company_name') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Reference Code</label>
                                <input type="text" class="form-control form-control-sm" name="ref_code"
                                    placeholder="ref code" value="{{ request()->input('ref_code') }}">
                            </div>
                        </div> --}}
                        <div class="col-md-1">
                            {{-- <div class="form-group">
                                <label for="">limit</label>
                                <select name="plimit" class="form-control form-control-sm">
                                    {!! pageLimit($perpage) !!}
                                </select>
                            </div> --}}
                        </div>
                        <div class="col-md-6"></div>
                        <div class="form-group col-md-1" style="padding-top: 8px;">
                            <br>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing" style="margin: 0;">
            <div class="widget-content widget-content-area br-8" style="padding-top: 0;" id="ct">
                <div class="table table-responsive">
                    <table class="table table-hover table-striped table-bordered" style="width:100%">
                        <div class="row">
                            <div class="col-md-4" style="padding-top: 12px">
                                <div style="text-align: left;">
                                    <p style="color:black">Category List</p>
                                </div>
                            </div>
                            <div class="col-md-8 HideOnPrint">
                                {{-- <div style="text-align: right">
                                    {{ $data->appends([
                                            'plimit' => $perpage,
                                        ])->links('pagination::bootstrap-5') }}
                                </div> --}}
                            </div>
                        </div>
                        <thead>
                            <tr>
                                {{-- <th>Parent Brand</th> --}}
                                <th>Category</th>
                                <th>Logo</th>
                                <th>Banner</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th class="HideOnPrint">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count() > 0)
                                @foreach ($data as $key => $datas)
                                    @php
                                        if (!empty(@$datas->logo_icon)) {
                                            $logo = @$datas->logo_icon;
                                        } else {
                                            $logo = '/img/default_logo.jpg';
                                        }

                                        if (!empty(@$datas->banner_img)) {
                                            $banner = @$datas->banner_img;
                                        } else {
                                            $banner = '/img/default_banner.jpg';
                                        }
                                    @endphp

                                    <tr>
                                        <td>{{ @$datas->name }}</td>
                                        <td>
                                            <div class="avatar avatar-sm">
                                                <a href="{{ @$logo }}" target="_blank">
                                                    <img alt="avatar" src="{{ $logo }}" class="rounded">
                                                </a>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="avatar avatar-sm">
                                                <a href="{{ @$banner }}" target="_blank">
                                                    <img alt="avatar" src="{{ $banner }}" class="rounded">
                                                </a>

                                            </div>
                                        </td>
                                        <td>
                                            @if (@$datas->status == 1)
                                                <span class="badge badge-light-success">Active</span>
                                            @else
                                                <span class="badge badge-light-danger">Deactive</span>
                                            @endif
                                        </td>
                                        <td>{{ Str::of(@$datas->notes)->limit(20) }} </td>
                                        <td class="HideOnPrint">
                                                <a class="badge badge-light-primary text-start me-2 action-edit"
                                                    data-bs-toggle="modal" data-bs-target="#EditModal-{{ $key }}"
                                                    style="margin-right: 20px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-3">
                                                        <path d="M12 20h9"></path>
                                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                        </path>
                                                    </svg>
                                                </a>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="card-body">
                                        <div class="modal fade" id="EditModal-{{ $key }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form role="form" method="POST"
                                                action="{{ route('productCategory.update', ['id' => $datas->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit -
                                                                {{ @$datas->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-x">
                                                                    <line x1="18" y1="6" x2="6"
                                                                        y2="18">
                                                                    </line>
                                                                    <line x1="6" y1="6" x2="18"
                                                                        y2="18">
                                                                    </line>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="from-group">
                                                                        <label for="">Parent Category</label>
                                                                        <select name="parent_id"
                                                                            class="form-select  form-control-sm"
                                                                            id="select-first" placeholder="Select ...">
                                                                            <option value=""></option>
                                                                            {!! CategoryList(@$datas->parent_id) !!}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="from-group">
                                                                        <label for="">Category Name*</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="name" name="name"
                                                                            value="{{ @$datas->name }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="from-group">
                                                                        <label for="">Logo</label>
                                                                        <input type="file"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="logo"
                                                                            name="attachments[logo_icon]"
                                                                            value="{{ @$datas->logo_icon }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="from-group">
                                                                        <label for="">banner img</label>
                                                                        <input type="file"
                                                                            class="form-control form-control-sm"
                                                                            placeholder="banner img"
                                                                            name="attachments[banner_img]"
                                                                            value="{{ @$datas->banner_img }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="from-group">
                                                                        <label for="">Status </label>
                                                                        <select name="status"
                                                                            class="form-select  form-control-sm"
                                                                            id="select-second" placeholder="Select ..."
                                                                            required>
                                                                            <option value=""></option>
                                                                            {!! statusType(@$datas->status) !!}
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <label for="">Note</label>
                                                                <div class="col-sm-12">
                                                                    <textarea class="form-control" placeholder='Write your additional note' style="height: 88px;" name="notes">{{ @$datas->notes }}</textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-light-dark"
                                                                data-bs-dismiss="modal">Discard</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Edit Modal -->
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="14">
                                        <h5 class="text-center">No Information Found</h5>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form role="form" method="POST" action="{{ route('productCategory.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="display: none">
                            {{-- This section for select --}}
                            <input type="text" id="input-tags">
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="">Parent Category</label>
                                    <select name="parent_id" class="form-select  form-control-sm" id="select-fourth"
                                        placeholder="Select ...">
                                        <option value=""></option>
                                        {!! CategoryList('parent_id') !!}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="">Category Name*</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="name"
                                        name="name" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control form-control-sm" placeholder="logo"
                                        name="attachments[logo_icon]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group">
                                    <label for="">banner img</label>
                                    <input type="file" class="form-control form-control-sm" placeholder="banner img"
                                        name="attachments[banner_img]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="">Note</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" placeholder='Write your additional note' style="height: 88px;" name="notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Modal -->

@endsection
