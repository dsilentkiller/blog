<nav class=" navbar navbar-expand navbar navbar-info  bg-info  sticky-top">
    {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-info"> --}}
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-navbar-info"> --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">

        {{-- <a class="navbar-brand" href="#">KBZ</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-outline-success me-4" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Banner
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('banner.create') }}">Banner Form</a>
                        <a class="dropdown-item" href="{{ route('banner.index') }}">Banner List</a>
                        <div class="dropdown-divider"></div>

                    </div>
                </li>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-outline-success me-4" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Blog
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('blog.create') }}">Blog Form</a>
                        <a class="dropdown-item" href="{{ route('blog.index') }}">Blog List</a>
                        <div class="dropdown-divider"></div>

                    </div>
                </li>


            </ul>

        </div>
    </nav>




    </li>

    </ul>
</nav>
<!-- /.navbar -->
