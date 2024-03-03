<div class="">
    <nav class="navbar navbar-expand-lg navbar-dark  bg-danger ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>

                @guest
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    <!-- <li class="nav-item"><a href="#" class="btn btn-outline-light me-2 border-0">Create Company</a></li>
                    <li class="nav-item"><a href="#" class="btn btn-outline-light border-0">Login</a></li> -->
                </ul>
                @else
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item"><a href="#" class="btn btn-outline-light">HK</a></li> -->
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle btn btn-outline-light" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            HK
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                            @if(auth()->user()->comp_id == 1)
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                            @endif
                            @if(auth()->user()->comp_id == 1 || auth()->user()->comp_id == 2)
                                <li><a class="dropdown-item" href="#">Admin and Supervisor</a></li>
                            @endif
                            @if(auth()->user()->comp_id == 1 || auth()->user()->comp_id == 2 || auth()->user()->comp_id == 3)
                                <li><a class="dropdown-item" href="#">Admin and Supervisor and Executive</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>
</div>
