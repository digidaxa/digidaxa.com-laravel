<section id="hero" class="bg-secondary relative w-full pt-8 pb-20">
  <div class="absolute w-full lg:block">
    <div class="container">
      <h2 class="text-xl text-light px-4 font-semibold">Kategori</h2>
      <div class="flex flex-row px-4 mt-3 gap-5 owl-carousel">
        @foreach($categories as $category)
        <div class="transition-all flex duration-100 bg-primary text-light rounded w-full h-24 group hover:brightness-125 items-center">
          <div class="flex flex-wrap m-3 p-1 w-full">
            <img class="invert max-w-[48px] aspect-square object-left" src={{"/img/category/".$category->icon }}>
            <div class="w-full flex items-center justify-between">
              <h3 class="text-sm">{{ $category->name }}</h3>
              <a href={{ "/products/categories/". $category->slug }} >
                <i class="fas fa-arrow-right pt-1.5 group-hover:animate-bounce" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      loop: true,
      nav: false,
      dots: false,
      rewind:true,
      animateOut: 'fadeOut',
      animateIn:'fadeIn',
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: false,
      smartSpeed:1000,
      margin:10,
      responsiveClass:true,
      responsive:{
        0:{
            items:2,
        },
        600:{
            items:3,
            margin:12
        },
        1000:{
            items:6,
            margin:16
        }
      }
    });
  });
</script>