
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- LEFT --}}
    <ul class="navbar-nav">

        {{-- BUTTON TOGGLE SIDEBAR --}}
        <li class="nav-item">

            <a class="nav-link"
                data-widget="pushmenu"
                href="#"
                role="button">

                <i class="fas fa-bars"></i>

            </a>

        </li>

    </ul>


    {{-- RIGHT --}}
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">

            <form action="/logout"
                method="POST">

                @csrf

                <button class="btn btn-danger btn-sm">

                    <i class="fas fa-sign-out-alt mr-1"></i>

                    Logout

                </button>

            </form>

        </li>

    </ul>

</nav>