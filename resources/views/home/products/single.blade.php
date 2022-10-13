@extends('layouts.home')
@section('container')
<section id="single-product" class="pb-28">
  <div class="bg-secondary px-4 pb-5 mb-10">
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
        {{-- <img src={{ "/img/product/".$product->thumbnail }} class="rounded-3xl w-full aspect-[3/4] object-cover object-center"> --}}
        <iframe class="rounded-3xl w-full aspect-[3/4] object-cover object-center bg-gray-300" title={{ $product->name }} src="{{ URL::to('/admin/products/view-3d/' . $product->slug)}}" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
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
  </div>
  <div class="container">
    <div class="flex px-4 md:px-3 lg:px-0 mb-3 lg:mb-4">
      <a href="" class="bg-primary px-4 py-3 rounded text-light text-xl">
        Find on Marketplace
      </a>
    </div>
    <div class="flex px-4 md:px-3 lg:px-0 mb-6 lg:mb-7">
      <a href="#" target="_blank" rel="noopener noreferrer" class="w-10 h-10 mr-3 rounded-full flex justify-center items-center bg-primary text-light hover:bg-primary/80">
        <i class="fab fa-whatsapp text-xl"></i>
      </a>
      <a href="#" target="_blank" rel="noopener noreferrer" class="w-10 h-10 mr-3 rounded-full flex justify-center items-center bg-primary text-light hover:bg-primary/80">
        <i class="fab fa-instagram text-xl"></i>
      </a>
      <a href="#" target="_blank" rel="noopener noreferrer" class="w-10 h-10 mr-3 rounded-full flex justify-center items-center bg-primary text-light hover:bg-primary/80">
        <i class="fab fa-facebook-f text-xl"></i>
      </a>
      <a href="#" target="_blank" rel="noopener noreferrer" class="w-10 h-10 mr-3 rounded-full flex justify-center items-center bg-primary text-light hover:bg-primary/80">
        <i class="fab fa-tiktok text-xl"></i>
      </a>
      <a href="#" target="_blank" rel="noopener noreferrer" class="w-10 h-10 mr-3 rounded-full flex justify-center items-center bg-primary text-light hover:bg-primary/80">
        <i class="fab fa-youtube text-xl"></i>
      </a>
      <a href="#" target="_blank" rel="noopener noreferrer" class="w-10 h-10 mr-3 rounded-full flex justify-center items-center bg-primary text-light hover:bg-primary/80">
        <i class="fas fa-globe text-xl"></i>
      </a>
    </div>
    <div class="px-4 md:px-3 lg:px-0 mb-3 lg:mb-4">
      <h1 class="text-primary text-xl font-semibold mb-2">Deskripsi</h1>
      <div><?=$product->description;?></div>
    </div>
  </div>
</section>
@endsection