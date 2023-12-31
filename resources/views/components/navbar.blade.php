<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid row">
        <div class="container accenti col">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav-text ">
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item mx-4">
                        <a class="accenti mx-2 presto fs-2" href="{{ Route('homepage') }}">Presto<span style="color:#D2360F;">.</span>it</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder" href="{{ Route('ads.index') }}">{{__('messages.ads')}}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('ads.search') }}" method="GET" class="d-flex ms-3">
                            <input type="search" name="searched" class="form-control me-2" placeholder="{{__('messages.search')}}"
                                aria-label="Cerca">
                            <button class="btn btn-presto" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </li>
                    <li class="nav-item mx-2">
                        <x-_locale lang='it' nation='it'/>
                    </li>
                    <li class="nav-item mx-2">
                        <x-_locale lang='gb' nation='gb'/>
                    </li>
                    <li class="nav-item mx-2">
                        <x-_locale lang='de' nation='de'/>
                    </li>
                    <li class="nav-item dropdown d-block d-md-none">
                        <a class="nav-link dropdown-toggle fw-bolder" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ Route('ads.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

            </div>
        </div>



        <div class="d-flex justify-content-end col align-items-center">
            @auth

            <div class="dropdown me-5 pe-3">
                <a style="color:#D2360F" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('messages.hello')}}, {{ Auth::user()->name }} <i class="bi bi-caret-down-fill"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ Route('ads.create') }}">{{__('messages.sell')}}</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ Route('profile.index') }}">{{__('messages.your_ads')}}</a>
                    </li>
                        @if (Auth::user() && Auth::user()->is_revisor)
                        <li>
                            <a class="dropdown-item position-relative"
                                href="{{ Route('revisor.index') }}">{{__('messages.review_area')}}
                                <span class="m-1 badge rounded-pill"
                                    style="background-color: #D2360F;">
                                    {{ App\Models\Ad::toBeRevisionedCount() }}
                                    <span class="visually-hidden">Non letti</span>
                                </span>
                            </a>
                        </li>
                    @endif
                    <li class="">
                        <form class="dropdown-item m-0 p-0" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="btn dropdown-item nav-logout m-0" onclick="event.preventDefault(); this.closest('form').submit();">Esci</a>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a class="btn btn-presto accenti mx-2" href='{{ Route('login') }}'>{{__('messages.login')}}</a>
            <a class="btn btn-presto accenti mx-2" href='{{ Route('register') }}'>{{__('messages.register')}}</a>
        @endauth
    </div>
</div>

</nav>



{{-- seconda navbar con solo categorie --}}
<nav class="py-2 template-navbar">
    <div class="container d-flex justify-content-center">
        <ul class="nav justify-content-evenly">
            @foreach ($categories as $category)
                <li class="nav-item nav2" @if ($category->id == 1) style="border-left-style: none;" @endif>
                    <a href="{{ Route('ads.search', ['searched' => strtolower($category->name)]) }}"
                        class="nav-link link-body-emphasis text-white" aria-current="page">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
