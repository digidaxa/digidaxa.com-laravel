@extends('layouts.home')
@section('container')
<section id="single-product" class="pb-28">
  <div class="bg-secondary px-4 pb-5 mb-10">
    <div class="container">
      <nav class="flex text-light p-4 justify-between">
        <a href={{ "/" }} class="text-2xl">
          <i class="fas fa-chevron-left"></i>
        </a>
        <h3 class="text-2xl">{{ $product->category->name }}</h3>
        <a href={{ "#" }} class="text-2xl">
          <i class="fas fa-ellipsis-v"></i>
        </a>
      </nav>
      <div class="px-4 md:flex md:flex-wrap md:gap-5">
        <div class="flex relative mb-5 md:w-[calc(50%-1.25rem)]">
          {{-- <img src={{ "/img/product/".$product->thumbnail }} class="rounded-3xl w-full aspect-[3/4] object-cover object-center"> --}}
          <iframe class="rounded-3xl w-full aspect-[3/4] object-cover object-center bg-gray-300 md:aspect-[4/3]" title={{ $product->name }} src="{{ URL::to('/admin/products/view-3d/' . $product->slug)}}" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
          <a href="https://viewar.digidaxa.com/?name={{ $product->name }}&file={{ $product->file }}&url={{url('')}}/products/{{ $product->slug }}"
            class="text-light bg-primary absolute flex rounded-lg w-14 h-14 md:w-11 md:h-11 bottom-5 right-5 md:bottom-3 md:right-3 justify-center items-center">
            <i class="fas fa-cube text-3xl md:text-2xl"></i>
          </a>
        </div>
        <div class="md:w-[calc(50%-1.25rem)]">
          <div class="flex my-4 gap-4 justify-between">
            <h2 class="text-3xl text-light lg:text-4xl">{{ $product->name }}</h2>
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
          <div class="hidden mb-3 lg:mb-4 md:flex">
            <a href="" class="bg-primary px-4 py-3 rounded text-light text-xl">
              Find on Marketplace
            </a>
          </div>
          <div class="hidden mb-6 lg:mb-7 md:flex">
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
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="flex px-4 mb-3 lg:mb-4 md:hidden">
      <a href="" class="bg-primary px-4 py-3 rounded text-light text-xl">
        Find on Marketplace
      </a>
    </div>
    <div class="flex px-4 mb-6 lg:mb-7 md:hidden">
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
    <div class="px-4 mb-3 lg:mb-4">
      <h1 class="text-primary text-xl font-semibold mb-2 md:text-2xl">Deskripsi</h1>
      <div><?=$product->description;?></div>
    </div>
  </div>
</section>
@endsection