@extends('layouts.admin')

@section('container')
  <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
  <div class="row">
    <div class="col-12 col-lg-6 col-md-10 mb-3">
      <form action="{{ '/admin/products/' . $product->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="e.g. Meja TV Minimalis Kekinian Ishana" value="{{ old('name', $product->name ) }}">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="e.g. meja-tv-minimalis-kekinian-ishana" value="{{ old('slug', $product->slug ) }}">
          @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select class="custom-select custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
            <option>Choose Category</option>
            @foreach ($categories as $category)
              @if (old('category_id', $product->category_id) == $category->id))
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="file">3D File</label>
          <div class="custom-file">
            <input type="hidden" name="oldFile" value="{{ $product->file }}">
            <input type="file" class="custom-file-input @error('file') is-invalid @enderror" name="file" id="file" accept=".glb" onchange="previewModel()">
            @error('file')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <small id="fileHelp" class="form-text text-muted">Only accepts <b>.glb</b> file format</small>
            <label class="custom-file-label" for="file">{{ ($product->file) ? substr($product->file, 7) : 'Choose file' }}</label>
          </div>
        </div>
        <a href="{{ '/admin/products/list' }}" class="btn btn-secondary">&larr; Back</a>
        <button type="submit" class="btn btn-primary" id="submitbtn">Update</button>
      </form>
      <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
          fetch('/admin/products/checkSlug?name=' + name.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
        });

        const previewModel = () => {
          const file = document.querySelector('#file');
          const filename = document.querySelector('.custom-file-label');

          filename.textContent = file.files[0].name;
        }
      </script>
    </div>
  </div>
@endsection