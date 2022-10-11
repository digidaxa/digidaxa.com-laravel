<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container justify-content-start">
    <div class="row">
      <div class="col-12 mb-3">
        <button class="navbar-toggler bg-light px-2 py-1 me-2 rounded-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars fs-6" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand text-light fs-3" href="#">Digidaxa App</a>
      </div>
      <div class="col-12 mb-3">
        {{-- <form role="search">
          <input class="form-control " type="search" placeholder="Search" aria-label="Search">
        </form> --}}
        <form class="input-group flex-nowrap" role="search">
          <span class="input-group-text bg-white border border-0 px-3">
            <i class="fa fa-search text-secondary" aria-hidden="true"></i>
          </span>
          <input type="text" class="form-control border border-0 py-3" type="search" placeholder="Cari Toko atau Produk" aria-label="Search">
        </form>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>