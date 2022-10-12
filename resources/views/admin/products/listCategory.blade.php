@extends('layouts.admin')

@section('container')
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                @endphp
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ '/admin/products/categories/'. $category->slug }}">{{ $category->name }}</a></td>
                                    <td>{{ $category->slug }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
