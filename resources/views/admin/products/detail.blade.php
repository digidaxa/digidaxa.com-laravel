@extends('layouts.admin')

@section('container')
  <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
  <div class="row">
    {{-- <div class="col-12 col-md-12 col-lg-8 mb-3"> --}}
    <div class="col-12 mb-3">
      <div class="card shadow mb-3">
			  <div class="row no-gutters">
			    <div class="col-lg-5" style="min-height: 60vh">
						<iframe class="card-img w-100 h-100" style="object-fit: cover" title={{ $product->name }} src="{{ URL::to('/admin/products/view-3d/' . $product->slug)}}" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
			    </div>
			    <div class="col-lg-7">
						<div class="card-header small text-muted d-flex">
							@php
									function TimeFormater($time) { return date('h:i, d/m/Y',strtotime($time));}
							@endphp
							Dibuat {{ TimeFormater($product->created_at) }} &bull; Diperbarui {{ TimeFormater($product->updated_at) }}
							<a href="{{ '/admin/products/publishers/'. $product->publisher->username }}" class="ml-auto">{{ $product->publisher->name; }}</a>
						</div>
						<div class="card-body">
			        <h3 class="card-title">
                {{ $product->name }}
							</h3><a href="{{ '/admin/products/categories/'. $product->category->slug  }}" class="badge badge-light">{{ $product->category->name }}</a>
			        <p class="card-text">
								<div class="row">
									<div class="col-12">
										<nav>
											<div class="nav nav-tabs" id="nav-tab" role="tablist">
												<a class="nav-item nav-link active" id="nav-view-3d-tab" data-toggle="tab" href="#nav-view-3d" role="tab" aria-controls="nav-view-3d" aria-selected="true">3D Model Embed</a>
												<a class="nav-item nav-link" id="nav-view-ar-tab" data-toggle="tab" href="#nav-view-ar" role="tab" aria-controls="nav-view-ar" aria-selected="false">3D Model + AR ULR</a>
											</div>
										</nav>
										<div class="tab-content" id="nav-tabContent">
											<link rel="stylesheet" href="{{ '/vendor/prism/prism.css' }}">
											<div class="tab-pane fade show active" id="nav-view-3d" role="tabpanel" aria-labelledby="nav-view-3d-tab">
												<pre>
													<code class="language-html">&lt;iframe title="{{ $product->name }}" src="{{ URL::to('/admin/products/view-3d/' . $product->slug)}}" frameborder="0" allowfullscreen="allowfullscreen" style="width:100%; height:264px">&lt;/iframe&gt;</code>
												</pre>
												<a href="{{ '/admin/products/view-3d/'. $product->slug }}" target="_blank" rel="noreferrer" class="btn btn-info"><i class="fas fa-eye"></i> New Tab</a>
											</div>
											<div class="tab-pane fade" id="nav-view-ar" role="tabpanel" aria-labelledby="nav-view-ar-tab">
												{{-- <pre>
													<code class="language-html">&lt;iframe title="{{ $product->name }}" src="{{ URL::to('/admin/products/view-ar/' . $product->slug)}}" frameborder="0" allowfullscreen="allowfullscreen" style="width:100%; height:264px">&lt;/iframe&gt;</code>
												</pre> --}}
												<a href="https://viewar.digidaxa.com/?name={{ $product->name }}&file={{ $product->file }}&url={{url('')}}/products/{{ $product->slug }}" target="_blank" rel="noreferrer" class="btn btn-info mt-2">
													<i class="fas fa-eye"></i> New Tab
												</a>
											</div>
											<script src="{{ '/vendor/prism/prism.js' }}"></script>
										</div>
									</div>
								</div>
              <p>
			      </div>
						<div class="card-footer">
							<a href="{{ '/admin/products/'. $product->slug . '/edit' }}" class="btn btn-warning">
									<i class="fas fa-pencil-alt"></i>
							</a>
							<form action="{{ '/admin/products/'. $product->id }}" method="post" class="d-inline">
								@method('delete')
								@csrf
								<button class="btn btn-danger b-0" onclick="return confirm('Are you sure?')">
										<i class="fas fa-trash"></i>
								</button>
							</form>
						</div>
			    </div>
			  </div>
			</div>
    </div>
		<div class="col-12">
			<a href="{{ './list' }}" class="btn btn-secondary">&larr; Back</a>
		</div>
	</div>
@endsection
