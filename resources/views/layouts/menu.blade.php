<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-10" src="{{ asset('assets/images/logo.png') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> IPUC </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="/" class="side-menu {{ Request::is('/') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="/cultos" class="side-menu {{ Request::is('cultos') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Cultos </div>
            </a>
        </li>
        <li>
            <a href="/hermanos" class="side-menu {{ Request::is('hermanos') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Hermanos </div>
            </a>
        </li>

        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="/usuarios" class="side-menu {{ Request::is('usuarios') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                <div class="side-menu__title"> Usuarios </div>
            </a>
        </li>
    </ul>
</nav>