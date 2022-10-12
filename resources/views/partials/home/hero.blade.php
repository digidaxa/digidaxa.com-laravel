<section id="hero" class="bg-secondary relative w-full pt-8 pb-20">
  <div class="absolute w-full lg:block">
    <div class="container">
      <h2 class="text-xl text-light px-4 font-semibold">Kategori</h2>
      <div class="flex flex-row px-4 mt-3 gap-5">
        {{-- @foreach ($categories as $category)
        <a href="#" class="transition-all duration-100 bg-primary text-light rounded w-1/3 h-24 group hover:brightness-125">
          <div class="flex flex-wrap m-3 gap-1">
            <img class="invert w-12 -ml-2" src="/img/furniture.png">
            <div class="w-full flex items-center justify-between">
              <h3 class="text-sm">{{ $category->name }}</h3>
              <i class="fas fa-arrow-right pt-1.5 group-hover:animate-bounce" aria-hidden="true"></i>
            </div>
          </div>
        </a>
        @endforeach --}}
        <a href="#" class="transition-all duration-100 bg-primary text-light rounded w-1/3 h-24 group hover:brightness-125">
          <div class="flex flex-wrap m-3 gap-1">
            <img class="invert w-12 -ml-2" src="/img/furniture.png">
            <div class="w-full flex items-center justify-between">
              <h3 class="text-sm">Furniture</h3>
              <i class="fas fa-arrow-right pt-1.5 group-hover:animate-bounce" aria-hidden="true"></i>
            </div>
          </div>
        </a>
        <a href="#" class="transition-all duration-100 bg-primary text-light rounded w-1/3 h-24 group hover:brightness-125">
          <div class="flex flex-wrap m-3 gap-1">
            <img class="invert w-12 -ml-2" src="/img/furniture.png">
            <div class="w-full flex items-center justify-between">
              <h3 class="text-sm">Furniture</h3>
              <i class="fas fa-arrow-right pt-1.5 group-hover:animate-bounce" aria-hidden="true"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>