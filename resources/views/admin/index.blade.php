@extends('layouts.admin')

@section('container')
    <h1 class="h3 mb-4 text-gray-800">Admin</h1>
    <p>Welcome back <b>{{ auth()->user()->name }}</b>, </p>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Uploaded 3D Model
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                {{ $countProduct }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Product Category
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                {{ $countCategory }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
