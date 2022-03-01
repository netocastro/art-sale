<nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-outline-dark text-start" href="{{route('web.home')}}"
                        style="border: none;">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-outline-info text-start" href="{{route('web.portifolio')}}"
                        style="border: none;">Portifolio</a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-outline-info text-start" href="{{route('web.contact')}}"
                        style="border: none;">Contato</a>
                </li>
                <!--<li class="nav-item ">
                            <a class="nav-link text-light btn btn-outline-info text-start" href="" style="border: none;">Compra</a>
                      </li> -->
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-outline-info text-start" href="{{route('web.store')}}"
                        style="border: none;">Loja</a>
                </li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user h4"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{route('web.login')}}" style="border: none;">Login</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('web.register')}}" style="border: none;">Registro</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
