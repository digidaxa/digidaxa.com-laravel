@extends('layouts.home')
@section('container')
<section id="single-product" class="pb-28">
  <div class="bg-secondary px-4 pb-10">
    <div class="container">
      <nav class="flex text-light py-4 justify-between">
        <a href={{ "/" }} class="text-2xl">
          <i class="fas fa-chevron-left"></i>
        </a>
        <h3 class="text-2xl">{{ $product->category->name }}</h3>
        <a href={{ "#" }} class="text-2xl">
          <i class="fas fa-ellipsis-v"></i>
        </a>
      </nav>
      <div class="flex relative mb-5">
        <img src={{ "/img/product/".$product->thumbnail }} class="rounded-3xl w-full aspect-[3/4] object-cover object-center">
        <a href="#" class="text-light bg-primary absolute p-3 rounded-lg w-14 h-14 bottom-5 right-5">
          <i class="fas fa-cube text-3xl"></i>
        </a>
      </div>
      <div class="flex my-4 gap-4 justify-between">
        <h2 class="text-3xl text-light">{{ $product->name }}</h2>
        <a href="#" class="text-light">
          <i class="fas fa-heart text-3xl"></i>
        </a>
      </div>
      <div class="flex my-4 w-28">
        <i class="fas fa-star text-xl w-full text-light"></i>
        <i class="fas fa-star text-xl w-full text-light"></i>
        <i class="fas fa-star text-xl w-full text-light"></i>
        <i class="fas fa-star text-xl w-full text-light"></i>
      </div>
    </div>
  </>
  <div class="container">
  </div>
</section>
@endsection