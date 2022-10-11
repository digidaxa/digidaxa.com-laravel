<header class="top-0 left-0 flex w-full items-center bg-secondary pb-5 lg:pb-0">
  <div class="container">
    <div class="relative flex flex-wrap items-center justify-between">
      <div class="px-4 flex items-center gap-2">
        <button 
          id="hamburger" 
          class="block text-base font-semibold px-2 py-1 bg-light rounded hover:text-primary lg:hidden"
          onclick="toggleSidebar()"
        >
          <i class="fas fa-bars" aria-hidden="true"></i>
        </button>
        <a href="/" class="flex items-center py-6 text-lg text-primary">
          <img
            src="/img/logo.webp"
            alt="Logo Digidaxa"
            class="mr-2 h-8 w-8 hidden lg:block"
          />
          <span class="text-2xl text-light lg:text-xl">
            Digidaxa Web
          </span>
        </a>
      </div>
      <div class="flex w-full items-center justify-center px-4 lg:w-auto lg:flex-row-reverse">
        @include('partials.home.navbar')
      </div>
      <div class="px-4 w-full lg:hidden">
        <form method="GET" action="/cari" class="flex bg-light rounded py-5 px-4">
          @csrf
          <label for="search-input">
            <i class="fas fa-search text-lg mr-1 text-secondary" aria-hidden="true"></i>
          </label>
          <input type="text" class="pl-2 focus:outline-none bg-transparent lg:text-sm" name="cari" placeholder="Cari toko atau produk" value="{{ old('keyword') }}">
        </form>
      </div>
    </div>
  </div>
</header>

<script>
  const hamburger = document.getElementById('hamburger');
  const navMenu = document.getElementById('nav-menu');

  function toggleSidebar() {
    hamburger.classList.toggle('is-active');
    navMenu.classList.toggle('hidden');

    // if is-active class exists
    if (hamburger.classList.contains('is-active')) {
      hamburger.innerHTML = `<i class="fas fa-times" aria-hidden="true"></i>`;
    } else {
      hamburger.innerHTML = `<i class="fas fa-bars" aria-hidden="true"></i>`;
    }

  }
</script>