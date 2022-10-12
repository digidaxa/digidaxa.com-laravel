@extends('layouts.home')
@section('container')

@include('partials.home.hero')
<section id="terkini" class="mt-20 pb-28">
  <div class="container">
    <h3 class="text-xl px-4 font-semibold">Terkini</h3>
    <div class="flex flex-wrap px-4 mt-2 gap-x-5 gap-y-6 justify-start">
      <!-- looping for 5 time -->
      @foreach ($products as $product)
        <a href={{ '/products' .$product->slug }} class="w-[calc(50%-.8rem)] rounded-lg border shadow-sm overflow-hidden md:w-[calc((100%/3)-1rem)] lg:w-[calc(25%-1rem)]">
          <img 
            src={{ "/img/product/" . $product->thumbnail }}
            class="object-cover aspect-[4/3] w-full"
          >
          <div class="relative">
            <div class="m-2 text-left">
              <h3 class="text-sm font-semibold">{{ $product->name }}</h3>
              <h4 class="text-xs">{{ $product->category->name }}</h4>
            </div>
            {{-- love icon --}}
            <div class=" absolute top-1/2 right-5">
              <label for="like">
                <i id="like-icon" class="fas fa-heart opacity-50"></i>
              </label>
              <input type="checkbox" id="like" class="sr-only">
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

<script>
  const likeButton = document.getElementById("like");
  const likeIcon = document.getElementById("like-icon");

  likeButton.addEventListener('click', (e) => {
    if (e.target.checked) {
      likeIcon.classList.remove('opacity-50');
      likeIcon.classList.add('text-red-600');
    } else {
      likeIcon.classList.add('opacity-50');
      likeIcon.classList.remove('text-red-600');
    } 
  })
</script>
@endsection