@extends('layouts.home')

@section('container')
<section id="Terkini" class="mt-20 pb-24">
  <div class="container">
    <h3 class="text-xl px-4 font-semibold">Terkini</h3>
    <div class="flex flex-wrap px-4 mt-2 gap-5 justify-between">
      <!-- looping for 5 time -->
      <a href={{ '/detail' }} class="w-[calc(50%-1rem)] rounded-lg border shadow-sm overflow-hidden">
        <img 
          src="https://decorunic.id/wp-content/uploads/2022/09/meja-pc-marvell-01.png"
        >
        <div class="relative">
          <div class="m-2 text-left">
            <h3 class="text-sm font-semibold">Marvel Meja PC Space Saving Multifungsi</h3>
            <h4 class="text-xs">Meja</h4>
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