<header>

    <nav class="navbar bg-success-subtle">
        <div class="container-fluid">
          <a href="{{ route('home') }}" target="_blank" class="navbar-brand">
            <i class="fa-solid fa-globe"></i>
            <span>Vai al sito</span>
          </a>
          <div class="d-flex align-items-center">
            {{-- OLD --}}
            <form action="{{route('admin.projects.index')}}" method="GET" class="d-flex me-3" role="search">
                <input name="toSearch" class="form-control me-2" type="search" placeholder="Cerca" aria-label="Cerca">
                <button class="btn btn-outline-success" type="submit">Cerca</button>
            </form>
            {{-- OLD --}}

            <p class="pt-3 me-3">{{ Auth::user()->name }}</p>

            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
          </div>
        </div>
    </nav>

</header>
