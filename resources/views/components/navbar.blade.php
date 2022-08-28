<nav class="navbar blue ">
    <div class="container-fluid blue">
        <a class="navbar-brand blue" href="#"><b>SIAR</b>UM</a>
        <button class="blue navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class=""><i class="bi bi-list"></i></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SIARUM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            @guest
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('login.index') }}"><button
                                    class="w-100  btn mt-3  btn-lg btn-warning" type="submit">Login</button></a>
                        </li>
                    </ul>
                </div>
            @endguest


            @auth

                <div class="offcanvas-body">
                    @php
                        $gambar = auth()->user()->link_gambar;
                        if ($gambar) {
                            $link = 'img/' . $gambar;
                        } else {
                            $link = 'img/talent.jpg';
                        }

                    @endphp
                    <img src="{{ asset($link) }}" class="rounded-circle img-fluid" alt="Foto Profil">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                        <h5 class="text-center mt-3">
                            <b>{{ auth()->user()->nama }}</b>

                        </h5>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('kegiatans.index') }}">Kegiatan</a>
                        </li>
                        @can('admin')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('events.index') }}">Admin</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="w-100  btn mt-3  btn-lg btn-danger" type="submit">Logout</button>
                            </form>
                        </li>

                    </ul>
                @endauth
            </div>
        </div>
    </div>
</nav>
