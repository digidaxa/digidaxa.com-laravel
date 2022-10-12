<nav id="nav-menu" 
  class="hidden py-5 mb-3 bg-light rounded w-full top-full lg:block lg:static lg:bg-transparent lg:mb-0 lg:max-w-full lg:rounded-none">
  <ul class="block lg:flex">
    <li className="grup">
      <a href={{ "/" }} class="nav-link border-primary active:font-medium transition-all ease-in duration-75">Beranda</a>
    </li>
    <li className="grup">
      <a href={{ "/about" }} class="nav-link border-primary active:font-medium transition-all ease-in duration-75">Tentang Kami</a>
    </li>
    <li className="grup">
      <a href={{ "/blog" }} class="nav-link border-primary active:font-medium transition-all ease-in duration-75">Blog</a>
    </li>
    <li class="hidden lg:block">
      <form method="GET" action="/cari" class="flex bg-light rounded-full">
        @csrf
        <input type="checkbox" id="search-icon" class="sr-only focus:outline-none bg-transparent">
        <input type="text" id="search-input" class="hidden ml-3 focus:outline-none bg-transparent lg:text-sm" name="cari" placeholder="Cari toko atau produk" value="{{ old('keyword') }}">
        <label for="search-icon" class="py-2 px-4 cursor-pointer">
          <i class="fas fa-search text-lg text-secondary" aria-hidden="true"></i>
        </label>
      </form>
    </li>
    <li class="mb-1">
      <a href="https://wa.me/+6285172243818" 
        class="text-base font-semibold mx-6 flex px-6 py-2 justify-center bg-transparent border-[1px] border-primary text-primary lg:border-light lg:text-light lg:hover:border-primary rounded-full hover:bg-primary hover:text-light transition-all ease-in duration-75 lg:mx-4"
      >
        Hubungi Kami
      </a>
    </li>
  </ul>
</nav>

<script>
  const searchIcon = document.getElementById('search-icon')
  const searchInput = document.getElementById('search-input')
  
  // search Icon checked
  searchIcon.addEventListener('click', (e) => {
    if (e.target.checked) {
      searchInput.classList.remove('hidden')
    } else {
      searchInput.classList.add('hidden')
    } 
  })
</script>