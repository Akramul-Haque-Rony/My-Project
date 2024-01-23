@extends('layouts.modal_list')
@section('title', 'Dashboard')
@section('content')

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <div class="text-center">
        <h2 style="font-family: 'Times New Roman', Times, serif">
            {{-- <b>Session {{ $data->session }}</b>  --}}
        </h2>
    </div>
    <br>

    
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card bg-info">
                <div class="card-body">
                    <h5 class="card-title">Offer Letter</h5>
                    <p class="mb-0">This is some text within a Info card body.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mx-auto">
            <div class="card bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Payments</h5>
                    <p class="mb-0">This is some text within a Danger card body.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mx-auto">
            <div class="card bg-dark">
                <div class="card-body">
                    <h5 class="card-title">Test</h5>
                    <p class="mb-0">This is some text within a Dark card body.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
