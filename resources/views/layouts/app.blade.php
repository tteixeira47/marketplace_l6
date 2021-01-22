<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"
        integrity="sha512-ubuT8Z88WxezgSqf3RLuNi5lmjstiJcyezx34yIU2gAHonIi27Na7atqzUZCOoY4CExaoFumzOsFQ2Ch+I/HCw=="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/0268508860.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Marketplace L6</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @auth
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('admin/stores')) active @endif" aria-current="page"
                            href="{{ route('admin.stores.index') }}">Lojas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('admin/products')) active @endif"
                            href="{{ route('admin.products.index') }}">Produtos</a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#"
                                onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                            <form action="{{route('logout')}}" class="logout" method="post" style="display:none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endauth
        </div>
    </nav>
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
</body>

</html>