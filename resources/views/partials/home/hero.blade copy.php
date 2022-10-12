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
        {{-- <a href="#" class="transition-all duration-100 bg-primary text-light rounded w-1/3 h-24 group hover:brightness-125">
          <div class="flex flex-wrap m-3 gap-1">
            <img class="invert w-12 -ml-2" src="/img/furniture.png">
            <div class="w-full flex items-center justify-between">
              <h3 class="text-sm">Furniture</h3>
              <i class="fas fa-arrow-right pt-1.5 group-hover:animate-bounce" aria-hidden="true"></i>
            </div>
          </div>
        </a> --}}

        <div class="max-w-4xl mx-auto relative" x-data="{
          activeSlide: 1,
          slides: {{ $categories }},
          {{-- loop() {
            setInterval(() => {this.activeSlide = this.activeSlide === 5 ? 1 : this.activeSlide + 1 }, 2000);
          } --}}
        }"
        {{-- x-init="loop" --}}
        >
          {{-- data loop --}}
          <template x-for="slide in slides" :key="slide.id">
            <div x-show="activeSlide === slide.id" class="p-24 h-80 flex items-center bg-slate-500 text-light rounded-lg">
              <div>
                <h2 class="text-2xl font-bold" x-text="slide.name"></h2>
                <p class="text-base" x-text="slide.body"></p>
              </div>
            </div>
          </template>

          {{-- Prev/Next --}}
          <div class="absolute inset-0 flex">
            <div class="flex items-center justify-start w-1/2">
              <button
                x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1" 
                class="bg-slate-100 text-slate-500 font-bold rounded-full w-12 h-12 shadow flex justify-center items-center -ml-16">
                <i class="fas fa-chevron-left"></i>
              </button>
            </div>
            <div class="flex items-center justify-end w-1/2">
              <button 
              x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1" 
                class="bg-slate-100 text-slate-500 font-bold rounded-full w-12 h-12 shadow flex justify-center items-center -mr-16">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>